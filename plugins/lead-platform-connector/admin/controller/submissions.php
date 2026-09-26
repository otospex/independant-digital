<?php

namespace Vvveb\Plugins\LeadPlatformConnector\Controller;

use Vvveb\Controller\Listing;
use Vvveb\Plugins\LeadPlatformConnector\System\Crypto;
use function Vvveb\url;

class Submissions extends Listing {

	protected $type = 'lead_submission';

	protected $modelName = 'Plugins\LeadPlatformConnector\LeadSubmission';

	protected $list = 'lead_submission';

	protected $listController = 'submissions';

	protected $controller = 'submissions';

	protected $module = 'plugins/lead-platform-connector';

	function index() {
		parent::index();

		if (! isset($this->view->lead_submission) || ! is_array($this->view->lead_submission)) {
			return;
		}

		// Contact details live only in the encrypted copy; decrypt them for the
		// signed-in admin. Rows already forwarded to the platform keep just the
		// stripped audit payload.
		foreach ($this->view->lead_submission as $index => &$row) {
			$fields = null;
			if (! empty($row['payload_enc'])) {
				try {
					$fields = json_decode(Crypto::decrypt((string) $row['payload_enc']), true);
				} catch (\Throwable $e) {
					$fields = null;
				}
			}
			$encrypted = is_array($fields);
			if (! $encrypted) {
				$fields = json_decode((string) ($row['payload'] ?? ''), true);
				$fields = is_array($fields) ? $fields : [];
			}

			// fetch_all keys rows by their id and the id column is not always
			// in the row itself, so the number falls back to the key.
			$row['ref']             = (string) ($row['lead_submission_id'] ?? $index);
			$row['contact_name']    = (string) ($fields['full_name'] ?? $fields['name'] ?? '');
			$row['contact_email']   = $encrypted ? (string) ($fields['email'] ?? '') : '';
			$row['contact_phone']   = $encrypted ? (string) ($fields['phone'] ?? '') : '';
			$row['contact_mailto']  = $row['contact_email'] !== '' ? 'mailto:' . $row['contact_email'] : '';
			$row['contact_company'] = (string) ($fields['company'] ?? '');
			$row['details']         = $this->details($fields);
			$row['roadmap_url']     = url(['module' => $this->module . '/roadmap', 'lead_submission_id' => $row['ref']]);
			unset($row['payload_enc']);
		}
		unset($row);
	}

	private function details(array $fields, string $indent = ''): string {
		$lines = [];
		foreach ($fields as $key => $value) {
			if (in_array($key, ['privacy_acknowledgement', 'name'], true)) {
				continue;
			}
			if (is_array($value)) {
				$lines[] = $indent . $key . ' :';
				$lines[] = $this->details($value, $indent . '  ');
			} elseif ($value !== null && $value !== '') {
				$lines[] = $indent . $key . ' : ' . $value;
			}
		}

		return implode("\n", $lines);
	}
}
