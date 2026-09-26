<?php

namespace Vvveb\Plugins\LeadPlatformConnector\System;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Stores issued roadmaps: the answers (encrypted, same key as the lead queue),
 * a hash of the link token and its expiry. The roadmap itself is rebuilt from
 * the answers and the current content file on every view, so content fixes
 * reach roadmaps already sent. The table is created on first use.
 */
final class RoadmapStore {

	private static bool $ready = false;

	public static function ensureTable(): void {
		if (self::$ready) {
			return;
		}
		$engine = defined('DB_ENGINE') ? DB_ENGINE : 'mysqli';
		if ($engine === 'pgsql') {
			$sql = 'CREATE TABLE IF NOT EXISTS lead_roadmap (
				lead_roadmap_id SERIAL PRIMARY KEY, lead_submission_id INTEGER NULL,
				token_hash CHAR(64) NOT NULL UNIQUE, answers_enc TEXT NOT NULL,
				content_version VARCHAR(32) NOT NULL DEFAULT \'\', created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
				expires_at TIMESTAMP NOT NULL, sent_at TIMESTAMP NULL, viewed_at TIMESTAMP NULL)';
		} elseif ($engine === 'sqlite') {
			$sql = 'CREATE TABLE IF NOT EXISTS lead_roadmap (
				lead_roadmap_id INTEGER PRIMARY KEY AUTOINCREMENT, lead_submission_id INTEGER NULL,
				token_hash TEXT NOT NULL UNIQUE, answers_enc TEXT NOT NULL,
				content_version TEXT NOT NULL DEFAULT \'\', created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
				expires_at TEXT NOT NULL, sent_at TEXT NULL, viewed_at TEXT NULL)';
		} else {
			$sql = 'CREATE TABLE IF NOT EXISTS lead_roadmap (
				lead_roadmap_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, lead_submission_id INT UNSIGNED NULL,
				token_hash CHAR(64) NOT NULL, answers_enc LONGTEXT NOT NULL,
				content_version VARCHAR(32) NOT NULL DEFAULT \'\', created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
				expires_at DATETIME NOT NULL, sent_at DATETIME NULL, viewed_at DATETIME NULL,
				UNIQUE KEY token_hash_unique (token_hash), KEY lead_submission_id (lead_submission_id)
			) DEFAULT CHARSET=utf8mb4';
		}
		Repo::exec($sql);
		self::$ready = true;
	}

	public static function hashToken(string $token): string {
		return hash('sha256', $token);
	}

	/** @return array{id:int, token:string, expires_at:string} */
	public static function create(?int $leadId, array $answers, string $version, int $days): array {
		self::ensureTable();
		$token   = bin2hex(random_bytes(24));
		$expires = gmdate('Y-m-d H:i:s', time() + max(1, $days) * 86400);
		Repo::exec(
			'INSERT INTO lead_roadmap (lead_submission_id, token_hash, answers_enc, content_version, created_at, expires_at)
			 VALUES (:lead, :hash, :answers, :version, CURRENT_TIMESTAMP, :expires)',
			[
				'lead'    => $leadId,
				'hash'    => self::hashToken($token),
				'answers' => Crypto::encrypt((string) json_encode($answers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)),
				'version' => mb_substr($version, 0, 32),
				'expires' => $expires,
			]
		);

		return ['id' => (int) (Repo::db()->insert_id ?? 0), 'token' => $token, 'expires_at' => $expires];
	}

	/** A live roadmap for this link token, answers decrypted; null if unknown or expired. */
	public static function findByToken(string $token): ?array {
		if (! preg_match('/^[a-f0-9]{48}$/', $token)) {
			return null;
		}
		self::ensureTable();
		$row = Repo::one('SELECT * FROM lead_roadmap WHERE token_hash = :hash LIMIT 1', ['hash' => self::hashToken($token)]);
		if (! $row || strtotime((string) $row['expires_at'] . ' UTC') < time()) {
			return null;
		}

		return self::withAnswers($row);
	}

	/** The latest roadmap issued for a lead (admin view). */
	public static function findByLead(int $leadId): ?array {
		self::ensureTable();
		$row = Repo::one('SELECT * FROM lead_roadmap WHERE lead_submission_id = :lead ORDER BY lead_roadmap_id DESC LIMIT 1', ['lead' => $leadId]);

		return $row ? self::withAnswers($row) : null;
	}

	public static function markSent(int $id): void {
		Repo::exec('UPDATE lead_roadmap SET sent_at = CURRENT_TIMESTAMP WHERE lead_roadmap_id = :id', ['id' => $id]);
	}

	public static function markViewed(int $id): void {
		Repo::exec('UPDATE lead_roadmap SET viewed_at = CURRENT_TIMESTAMP WHERE lead_roadmap_id = :id AND viewed_at IS NULL', ['id' => $id]);
	}

	private static function withAnswers(array $row): ?array {
		try {
			$answers = json_decode(Crypto::decrypt((string) $row['answers_enc']), true);
		} catch (\Throwable $e) {
			return null;
		}
		if (! is_array($answers)) {
			return null;
		}
		unset($row['answers_enc']);
		$row['answers'] = $answers;

		return $row;
	}
}
