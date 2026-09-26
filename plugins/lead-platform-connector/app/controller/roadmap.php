<?php

namespace Vvveb\Plugins\LeadPlatformConnector\Controller;

use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapBuilder;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapRenderer;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapService;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapStore;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Public roadmap page: /feuille-de-route?t=<token>.
 *
 * The token travels in the query string on purpose: the page cache never
 * stores URLs with a query string, so a private roadmap is never cached.
 */
#[\AllowDynamicProperties]
class Roadmap {

	function __construct() {}

	function index() {
		header('Cache-Control: no-store, private');
		header('X-Robots-Tag: noindex, nofollow');
		header('Referrer-Policy: no-referrer');

		$token = isset($_GET['t']) ? (string) $_GET['t'] : '';
		$row   = null;
		try {
			$row = RoadmapStore::findByToken($token);
		} catch (\Throwable $e) {
			$row = null;
		}

		if (! $row) {
			http_response_code(404);
			header('Content-Type: text/html; charset=utf-8');
			echo '<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex"><title>Lien expiré | Souvara</title></head>'
				. '<body style="font-family:sans-serif;max-width:40rem;margin:4rem auto;padding:0 1rem;line-height:1.6">'
				. '<h1>Ce lien a expiré ou n&rsquo;existe pas</h1><p>Les feuilles de route restent accessibles pendant plusieurs mois. Pour en obtenir une nouvelle, décrivez votre situation&nbsp;: le premier échange est gratuit.</p>'
				. '<p><a href="/diagnostic-souverainete">Faire le point sur ma situation</a> · <a href="mailto:contact@souvara.fr">contact@souvara.fr</a></p></body></html>';
			exit;
		}

		RoadmapStore::markViewed((int) $row['lead_roadmap_id']);
		$roadmap = RoadmapBuilder::build($row['answers']);
		$options = RoadmapService::options('', (string) $row['expires_at']);

		header('Content-Type: text/html; charset=utf-8');
		echo RoadmapRenderer::page($roadmap, $options);
		exit;
	}
}
