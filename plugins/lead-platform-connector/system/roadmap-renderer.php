<?php

namespace Vvveb\Plugins\LeadPlatformConnector\System;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Renders a built roadmap (RoadmapBuilder::build) with the templates in
 * roadmap/templates/: page.php (web page, also printed to PDF), email-text.php
 * and email-html.php. Templates receive $r (the roadmap), $o (links and
 * options) and the helpers $h (escape) and $n (French number format).
 */
final class RoadmapRenderer {

	public static function page(array $roadmap, array $options): string {
		return self::render('page.php', $roadmap, $options);
	}

	public static function emailText(array $roadmap, array $options): string {
		return self::render('email-text.php', $roadmap, $options);
	}

	public static function emailHtml(array $roadmap, array $options): string {
		return self::render('email-html.php', $roadmap, $options);
	}

	/** First name for a greeting, or '' when none can be told apart. */
	public static function firstName(string $fullName): string {
		$parts = preg_split('/\s+/u', trim($fullName)) ?: [];

		return $parts[0] ?? '';
	}

	private static function render(string $template, array $r, array $o): string {
		$o += [
			'site_url'     => 'https://souvara.fr',
			'roadmap_url'  => '',
			'booking_url'  => '',
			'css_url'      => '',
			'logo_url'     => '',
			'expires'      => '',
			'generated'    => '',
			'admin'        => false,
		];
		$h = static function ($value): string {
			return htmlspecialchars((string) $value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
		};
		$n = static function ($value): string {
			return number_format((float) $value, 0, ',', "\u{202F}");
		};
		ob_start();
		include dirname(__DIR__) . '/roadmap/templates/' . $template;

		return (string) ob_get_clean();
	}
}
