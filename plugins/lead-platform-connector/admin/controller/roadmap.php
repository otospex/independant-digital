<?php

namespace Vvveb\Plugins\LeadPlatformConnector\Controller;

use Vvveb\Controller\Base;
use Vvveb\Plugins\LeadPlatformConnector\System\Crypto;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapBuilder;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapRenderer;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapService;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapStore;
use Vvveb\Plugins\LeadPlatformConnector\System\Repo;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Admin view of a lead's roadmap: the one that was sent, or, for leads that
 * predate roadmaps, one built now from the lead's encrypted answers.
 */
class Roadmap extends Base {

	function index() {
		$leadId = (int) ($this->request->get['lead_submission_id'] ?? 0);
		$answers = null;
		$expires = '';

		$row = $leadId ? RoadmapStore::findByLead($leadId) : null;
		if ($row) {
			$answers = $row['answers'];
			$expires = (string) $row['expires_at'];
		} elseif ($leadId) {
			$lead = Repo::one('SELECT payload_enc FROM lead_submission WHERE lead_submission_id = :id LIMIT 1', ['id' => $leadId]);
			if ($lead && ! empty($lead['payload_enc'])) {
				try {
					$payload = json_decode(Crypto::decrypt((string) $lead['payload_enc']), true);
					$answers = is_array($payload) ? RoadmapBuilder::answers($payload) : null;
				} catch (\Throwable $e) {
					$answers = null;
				}
			}
		}

		header('Cache-Control: no-store, private');
		header('Content-Type: text/html; charset=utf-8');
		if (! $answers) {
			http_response_code(404);
			echo '<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Feuille de route introuvable</title></head><body style="font-family:sans-serif;margin:3rem">'
				. '<p>Aucune feuille de route pour cette demande, et ses réponses ne sont plus disponibles.</p></body></html>';
			exit;
		}

		echo RoadmapRenderer::page(RoadmapBuilder::build($answers), RoadmapService::options('', $expires, true));
		exit;
	}
}
