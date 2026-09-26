<?php

namespace Vvveb\Plugins\LeadPlatformConnector\System;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Turns diagnostic answers into a personalised roadmap.
 *
 * Pure: no database, no HTML, no clock except the date passed in. The words
 * live in roadmap/content.fr.php; this class only decides which of them apply.
 * RoadmapRenderer turns the result into a page or an e-mail.
 */
final class RoadmapBuilder {

	/** Answer keys kept from the lead payload (never e-mail or phone). */
	public const ANSWER_KEYS = [
		'full_name', 'company', 'job_title', 'org_type', 'company_size',
		'current_tools', 'use_cases', 'constraints', 'trigger', 'timeline',
		'budget', 'financing_interest', 'ai_platform_interest',
	];

	public static function content(): array {
		static $content = null;
		if ($content === null) {
			$content = require dirname(__DIR__) . '/roadmap/content.fr.php';
		}

		return $content;
	}

	/** Keep only the answers the roadmap uses, with list fields as lists. */
	public static function answers(array $payload): array {
		$answers = [];
		foreach (self::ANSWER_KEYS as $key) {
			$value = $payload[$key] ?? null;
			if (in_array($key, ['current_tools', 'use_cases', 'constraints'], true)) {
				$value = array_values(array_filter(array_map('strval', is_array($value) ? $value : ($value === null || $value === '' ? [] : [$value])), 'strlen'));
			} else {
				$value = is_scalar($value) ? trim((string) $value) : '';
				// The form writes '1&nbsp;000': compare on plain spaces.
				$value = preg_replace('/[\x{00A0}\x{202F}]/u', ' ', $value);
			}
			$answers[$key] = $value;
		}

		return $answers;
	}

	/** Headcount range from a form label: '< 50', '100–249', '≥ 5 000'. */
	public static function sizeRange(string $label): array {
		$label = trim($label);
		if ($label === '') {
			return [null, null];
		}
		preg_match_all('/\d[\d\s\x{00A0}\x{202F}]*/u', $label, $m);
		$numbers = array_map(static function ($n) {
			return (int) preg_replace('/\D/', '', $n);
		}, $m[0]);
		if (str_contains($label, '<')) {
			return [1, isset($numbers[0]) ? $numbers[0] - 1 : null];
		}
		if (str_contains($label, '≥') || str_contains($label, '>')) {
			return [$numbers[0] ?? null, null];
		}
		if (count($numbers) >= 2) {
			return [$numbers[0], $numbers[1]];
		}

		return [$numbers[0] ?? null, $numbers[0] ?? null];
	}

	/** Does a 'when' condition from the content file hold for these answers? */
	public static function matches(?array $when, array $answers, array $content): bool {
		if (! $when) {
			return true;
		}
		$tools = $answers['current_tools'];
		$uses  = $answers['use_cases'];
		$cons  = $answers['constraints'];

		$result = true;
		if (isset($when['tools_any'])) {
			$result = $result && (bool) array_intersect($when['tools_any'], $tools);
		}
		if (isset($when['constraints_any'])) {
			$result = $result && (bool) array_intersect($when['constraints_any'], $cons);
		}
		if (isset($when['use_cases_any'])) {
			$hit = (bool) array_intersect($when['use_cases_any'], $uses);
			if (isset($when['or_trigger'])) {
				$hit = $hit || in_array($answers['trigger'], $when['or_trigger'], true);
			}
			if (! empty($when['or_ai_interest'])) {
				$hit = $hit || $answers['ai_platform_interest'] !== '';
			}
			$result = $result && $hit;
		}
		if (isset($when['trigger_price'])) {
			$priceTrigger = in_array($answers['trigger'], $content['price_triggers'], true) || $answers['timeline'] === '< 3 mois';
			$result = $result && ($priceTrigger === (bool) $when['trigger_price']);
		}
		if (isset($when['has_use_case'])) {
			$result = $result && ((bool) $uses === (bool) $when['has_use_case']);
		}

		return $result;
	}

	/**
	 * Build the roadmap sections.
	 *
	 * @return array{version:string, answers:array, intro:string, prices:array,
	 *   obligations:array, phases:array, options:array, costs:?array,
	 *   funding:array, next_step:array, urgent:?string, disclaimer:string}
	 */
	public static function build(array $answers, ?array $content = null): array {
		$content = $content ?? self::content();
		$answers = self::answers($answers);
		[$sizeMin] = self::sizeRange($answers['company_size']);

		// Prices: general facts, then each ticked tool that has something to say.
		$prices = ['general' => $content['general_price_facts'], 'tools' => []];
		foreach ($answers['current_tools'] as $tool) {
			$entry = $content['tools'][$tool] ?? null;
			if ($entry && ($entry['facts'] || $entry['action'])) {
				$prices['tools'][] = ['tool' => $tool] + $entry;
			}
		}

		$obligations = [];
		foreach ($answers['constraints'] as $constraint) {
			if (isset($content['constraints'][$constraint])) {
				$obligations[] = ['name' => $constraint] + $content['constraints'][$constraint];
			}
		}

		// Phases: keep the items whose condition holds, fill the placeholders.
		$heavy = array_values(array_intersect(['VMware', 'Oracle'], $answers['current_tools']));
		$vars  = [
			'{first_use_case}' => $answers['use_cases'][0] ?? '',
			'{heavy_tools}'    => implode(' et ', $heavy),
		];
		$phases = [];
		foreach ($content['phases'] as $phase) {
			$items = [];
			foreach ($phase['items'] as $item) {
				if (self::matches($item['when'] ?? null, $answers, $content)) {
					$items[] = strtr($item['text'], $vars);
				}
			}
			$phases[] = ['title' => $phase['title'], 'items' => $items];
		}

		// Options per use case; an option with min_size only above that headcount.
		$options = [];
		foreach ($answers['use_cases'] as $use) {
			$entry = $content['use_cases'][$use] ?? null;
			if (! $entry) {
				continue;
			}
			$list = [];
			foreach ($entry['options'] as $option) {
				if (isset($option['min_size']) && ($sizeMin === null || $sizeMin < $option['min_size'])) {
					continue;
				}
				$list[] = ['name' => $option['name'], 'text' => $option['text']];
			}
			$options[] = ['use_case' => $use, 'directory' => $entry['directory'], 'options' => $list];
		}

		$funding = [];
		foreach ($content['funding'] as $scheme) {
			if (! self::rangeOverlaps($answers['company_size'], $scheme)) {
				continue;
			}
			if ($scheme['org_types'] && $answers['org_type'] !== '' && ! in_array($answers['org_type'], $scheme['org_types'], true)) {
				continue;
			}
			if (! self::matches($scheme['when'] ?? null, $answers, $content)) {
				continue;
			}
			$funding[] = ['name' => $scheme['name'], 'text' => $scheme['text'], 'url' => $scheme['url']];
		}

		return [
			'version'     => (string) $content['version'],
			'answers'     => $answers,
			'intro'       => $content['intro'],
			'prices'      => $prices,
			'obligations' => $obligations,
			'urgent'      => $answers['timeline'] === '< 3 mois' ? $content['urgent_note'] : null,
			'phases'      => $phases,
			'options'     => $options,
			'costs'       => self::costs($answers, $content),
			'funding'     => $funding,
			'funding_note' => $answers['financing_interest'] !== '' ? $content['funding_interest_note'] : null,
			'next_step'   => $content['next_step'],
			'disclaimer'  => $content['disclaimer'],
		];
	}

	/** True when the headcount range and the scheme's range overlap (unknown size: true). */
	private static function rangeOverlaps(string $sizeLabel, array $scheme): bool {
		[$min, $max] = self::sizeRange($sizeLabel);
		if ($min === null) {
			return true;
		}
		$max = $max ?? PHP_INT_MAX;
		$sMin = $scheme['min_size'] ?? 0;
		$sMax = $scheme['max_size'] ?? PHP_INT_MAX;

		return $min <= $sMax && $max >= $sMin;
	}

	/** Same arithmetic as /calculateur, lean scenario, for the ticked suite. */
	public static function costs(array $answers, array $content): ?array {
		$cfg = $content['costs'];
		$suite = null;
		foreach ($cfg['current'] as $tool => $current) {
			if (in_array($tool, $answers['current_tools'], true)) {
				$suite = $current;
				break;
			}
		}
		$users = $cfg['users_by_size'][$answers['company_size']] ?? null;
		if (! $suite || ! $users) {
			return null;
		}
		$target = null;
		foreach ($cfg['targets'] as $candidate) {
			if ($candidate['max_users'] === null || $users <= $candidate['max_users']) {
				$target = $candidate;
				break;
			}
		}
		if (! $target) {
			return ['quote' => true, 'note' => (string) ($cfg['quote_note'] ?? ''), 'current' => $suite['name'], 'users' => $users];
		}

		$years  = (int) $cfg['years'];
		$oneOff = $users * ($cfg['migration_per_user'] + $cfg['training_per_user']) + $users * $suite['price'] * $cfg['overlap_months'];
		$stay   = 0.0;
		$switch = $oneOff;
		for ($y = 1; $y <= $years; $y++) {
			$stay   += $users * $suite['price'] * 12 * pow(1 + $cfg['growth_us'], $y - 1);
			$switch += $users * $target['price'] * 12 * pow(1 + $cfg['growth_eu'], $y - 1);
		}
		$payback = null;
		$cum = 0.0;
		for ($m = 1; $m <= 120; $m++) {
			$y = (int) ceil($m / 12);
			$cum += $users * ($suite['price'] * pow(1 + $cfg['growth_us'], $y - 1) - $target['price'] * pow(1 + $cfg['growth_eu'], $y - 1));
			if ($cum >= $oneOff) {
				$payback = $m;
				break;
			}
		}

		return [
			'quote'    => false,
			'users'    => $users,
			'current'  => $suite['name'],
			'target'   => $target['name'],
			'years'    => $years,
			'stay'     => round($stay),
			'switch'   => round($switch),
			'one_off'  => round($oneOff),
			'saving'   => round($stay - $switch),
			'payback'  => $payback,
			'growth'   => $cfg['growth_us'],
		];
	}
}
