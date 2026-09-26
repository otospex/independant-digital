<?php

namespace Vvveb\Plugins\LeadPlatformConnector\System;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Issues a roadmap for a completed diagnostic: store the answers, e-mail the
 * visitor a private link, and return the link for the team notification.
 * Never throws: a failed roadmap must not turn a saved lead into an error.
 */
final class RoadmapService {

	/** @return array{url:string, sent:bool}|null */
	public static function issue(array $payload, ?int $leadId): ?array {
		try {
			$email = trim((string) ($payload['email'] ?? ''));
			if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return null;
			}
			$content = RoadmapBuilder::content();
			$answers = RoadmapBuilder::answers($payload);
			$issued  = RoadmapStore::create($leadId, $answers, (string) $content['version'], (int) $content['link_days']);
			$url     = self::siteUrl() . '/feuille-de-route?t=' . $issued['token'];

			$roadmap = RoadmapBuilder::build($answers, $content);
			$options = self::options($url, $issued['expires_at']);
			$sent    = RoadmapMailer::send(
				$email,
				(string) $content['email']['subject'],
				RoadmapRenderer::emailText($roadmap, $options),
				RoadmapRenderer::emailHtml($roadmap, $options),
				(string) $content['email']['from_name'],
				(string) $content['email']['from_address']
			);
			if ($sent && $issued['id']) {
				RoadmapStore::markSent($issued['id']);
			}

			return ['url' => $url, 'sent' => $sent];
		} catch (\Throwable $e) {
			return null;
		}
	}

	/** Links and labels shared by the page and the e-mails. */
	public static function options(string $roadmapUrl = '', string $expiresAt = '', bool $admin = false): array {
		$content = RoadmapBuilder::content();
		$site    = self::siteUrl();
		$css     = DIR_ROOT . 'public/themes/souverainete-digitale/css/souverainete.css';

		return [
			'site_url'    => $site,
			'roadmap_url' => $roadmapUrl,
			'booking_url' => self::bookingUrl($content),
			'css_url'     => '/themes/souverainete-digitale/css/souverainete.css?v=' . (is_file($css) ? filemtime($css) : '1'),
			'logo_url'    => '/media/souvara-logo.png?v=1',
			'expires'     => $expiresAt !== '' ? date('d/m/Y', strtotime($expiresAt . ' UTC')) : '',
			'generated'   => date('d/m/Y'),
			'admin'       => $admin,
		];
	}

	public static function bookingUrl(array $content): string {
		$env = getenv('ROADMAP_BOOKING_URL');
		$url = trim($env !== false && $env !== '' ? $env : (string) ($content['booking_url'] ?? ''));

		return filter_var($url, FILTER_VALIDATE_URL) ? $url : '';
	}

	public static function siteUrl(): string {
		if (defined('CANONICAL_URL')) {
			return rtrim((string) CANONICAL_URL, '/');
		}

		return rtrim((string) (getenv('CANONICAL_URL') ?: 'https://souvara.fr'), '/');
	}
}
