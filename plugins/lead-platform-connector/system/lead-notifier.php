<?php

namespace Vvveb\Plugins\LeadPlatformConnector\System;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * E-mails each settled lead to the team inbox.
 *
 * The notification is a copy, never the record: the lead is already stored
 * (or delivered) before this runs, and a mail failure is swallowed so it can
 * never turn a saved lead into an error for the visitor.
 *
 * Recipient: LEAD_NOTIFY_EMAIL (constant or environment), else
 * DEFAULT_RECIPIENT. An explicitly empty value disables notifications.
 */
final class LeadNotifier {

	public const DEFAULT_RECIPIENT = 'leads@souvara.fr';

	private const ADMIN_PATH = '/admin/index.php?module=plugins/lead-platform-connector/submissions';

	/** Keys that are plumbing, not answers. */
	private const HIDDEN = ['privacy_acknowledgement', 'consent_timestamp', 'consent_text_version'];

	private const LABELS = [
		'full_name'      => 'Nom',
		'name'           => 'Nom',
		'email'          => 'E-mail',
		'phone'          => 'Téléphone',
		'company'        => 'Entreprise',
		'job_title'      => 'Fonction',
		'company_size'   => 'Taille',
		'industry'       => 'Secteur',
		'need_type'      => 'Besoin',
		'timeline'       => 'Échéance',
		'budget'         => 'Budget',
		'message'        => 'Message',
		'provider_introduction_requested' => 'Mise en relation demandée',
		'provider_slug'  => 'Fournisseur',
		'campaign'       => 'Formulaire',
		'source_page'    => 'Page',
	];

	public static function recipient(): string {
		if (defined('LEAD_NOTIFY_EMAIL')) {
			return trim((string) LEAD_NOTIFY_EMAIL);
		}
		$env = getenv('LEAD_NOTIFY_EMAIL');

		return $env === false ? self::DEFAULT_RECIPIENT : trim($env);
	}

	/**
	 * Build subject, body and Reply-To for one lead.
	 *
	 * $meta: status (sent|pending|duplicate), complete (bool: the visitor
	 * finished the form), id (lead_submission_id, optional).
	 */
	public static function compose(array $payload, array $meta): array {
		$name    = self::line((string) ($payload['full_name'] ?? $payload['name'] ?? ''));
		$company = self::line((string) ($payload['company'] ?? ''));
		$email   = trim((string) ($payload['email'] ?? ''));
		$replyTo = (! preg_match('/[\r\n]/', $email) && filter_var($email, FILTER_VALIDATE_EMAIL)) ? $email : '';

		$who     = $name !== '' ? $name : ($replyTo !== '' ? $replyTo : 'contact sans nom');
		$subject = (empty($meta['complete']) ? 'Diagnostic incomplet' : 'Nouvelle demande') . ' : ' . $who;
		if ($company !== '') {
			$subject .= ' (' . $company . ')';
		}

		$lines = [];
		foreach (self::flatten($payload) as $key => $value) {
			if (in_array($key, self::HIDDEN, true)) {
				continue;
			}
			// buildPayload() copies full_name into name for the platform.
			if ($key === 'name' && isset($payload['full_name']) && $payload['full_name'] === $value) {
				continue;
			}
			$lines[] = (self::LABELS[$key] ?? $key) . ' : ' . $value;
		}

		$status = [
			'sent'      => 'transmise à la plateforme',
			'duplicate' => 'déjà connue de la plateforme',
		][$meta['status'] ?? ''] ?? 'enregistrée sur le site';

		$body  = (empty($meta['complete'])
			? "Diagnostic commencé puis abandonné : seules les premières réponses sont connues.\n"
			: "Nouvelle demande reçue sur le site.\n");
		$body .= 'Statut : ' . $status . (isset($meta['id']) ? ' (#' . (int) $meta['id'] . ')' : '') . "\n\n";
		$body .= implode("\n", $lines) . "\n\n";
		if (! empty($meta['roadmap_url'])) {
			$body .= 'Feuille de route ' . (! empty($meta['roadmap_sent']) ? 'envoyée au contact' : 'créée (e-mail non envoyé)') . ' : ' . $meta['roadmap_url'] . "\n";
		}
		$body .= "Toutes les demandes : " . self::siteUrl() . self::ADMIN_PATH . "\n";
		if ($replyTo !== '') {
			$body .= "Répondre à ce message écrit directement au contact.\n";
		}

		return ['subject' => $subject, 'body' => $body, 'reply_to' => $replyTo];
	}

	public static function headers(string $from, string $replyTo): string {
		$headers = [
			'From: Souvara <' . $from . '>',
			'MIME-Version: 1.0',
			'Content-Type: text/plain; charset=UTF-8',
			'Content-Transfer-Encoding: 8bit',
		];
		if ($replyTo !== '') {
			$headers[] = 'Reply-To: ' . $replyTo;
		}

		return implode("\r\n", $headers);
	}

	/** Send; returns false (never throws) when disabled or on failure. */
	public static function send(array $payload, array $meta): bool {
		try {
			$to = self::recipient();
			if ($to === '' || ! filter_var($to, FILTER_VALIDATE_EMAIL)) {
				return false;
			}
			$mail    = self::compose($payload, $meta);
			$subject = function_exists('mb_encode_mimeheader')
				? mb_encode_mimeheader($mail['subject'], 'UTF-8', 'B', "\r\n")
				: $mail['subject'];

			return @mail($to, $subject, $mail['body'], self::headers($to, $mail['reply_to']), '-f' . $to);
		} catch (\Throwable $e) {
			return false;
		}
	}

	private static function line(string $value): string {
		return trim(preg_replace('/[\r\n\t]+/', ' ', $value));
	}

	/** Nested groups (utm_params, tool_answers) are listed by their inner keys. */
	private static function flatten(array $data): array {
		$out = [];
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$out += self::flatten($value);
			} elseif ($value !== null && $value !== '') {
				$out[(string) $key] = (string) $value;
			}
		}

		return $out;
	}

	private static function siteUrl(): string {
		if (defined('CANONICAL_URL')) {
			return rtrim((string) CANONICAL_URL, '/');
		}

		return rtrim((string) (getenv('CANONICAL_URL') ?: 'https://souvara.fr'), '/');
	}
}
