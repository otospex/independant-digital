<?php

namespace Vvveb\Plugins\LeadPlatformConnector\System;

if (! defined('V_VERSION')) {
	die('Invalid request!');
}

/**
 * Sends the roadmap e-mail as multipart/alternative (text + HTML) through
 * PHP mail(). Tests set $transport to capture messages instead of sending.
 */
final class RoadmapMailer {

	/** @var callable|null fn(string $to, string $subject, string $body, string $headers): bool */
	public static $transport = null;

	public static function send(string $to, string $subject, string $text, string $html, string $fromName, string $fromAddress): bool {
		$to = trim($to);
		if (preg_match('/[\r\n]/', $to . $fromAddress . $fromName) || ! filter_var($to, FILTER_VALIDATE_EMAIL) || ! filter_var($fromAddress, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		$boundary = 'sv-' . bin2hex(random_bytes(12));
		$headers  = implode("\r\n", [
			'From: ' . self::encode($fromName) . ' <' . $fromAddress . '>',
			'Reply-To: ' . $fromAddress,
			'MIME-Version: 1.0',
			'Content-Type: multipart/alternative; boundary="' . $boundary . '"',
		]);
		$body = '--' . $boundary . "\r\n"
			. "Content-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n"
			. chunk_split(base64_encode($text)) . "\r\n"
			. '--' . $boundary . "\r\n"
			. "Content-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n"
			. chunk_split(base64_encode($html)) . "\r\n"
			. '--' . $boundary . "--\r\n";
		$subject = self::encode($subject);

		try {
			if (self::$transport) {
				return (bool) call_user_func(self::$transport, $to, $subject, $body, $headers);
			}

			return @mail($to, $subject, $body, $headers, '-f' . $fromAddress);
		} catch (\Throwable $e) {
			return false;
		}
	}

	private static function encode(string $value): string {
		return function_exists('mb_encode_mimeheader') ? mb_encode_mimeheader($value, 'UTF-8', 'B', "\r\n") : $value;
	}
}
