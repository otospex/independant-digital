<?php
// Preview the personalised roadmap without submitting a form or sending mail.
//
//   php scripts/roadmap-preview.php              # every profile in roadmap/fixtures.php
//   php scripts/roadmap-preview.php eti          # one profile
//
// Writes, for each profile, the web page and both e-mails to
// storage/roadmap-preview/<profile>{.html,-email.html,-email.txt}. Open the
// .html file in a browser; print it to check the PDF layout.
if (PHP_SAPI !== 'cli') {
	fwrite(STDERR, "CLI only.\n");
	exit(1);
}
if (! defined('V_VERSION')) {
	define('V_VERSION', 'cli');
}
if (! defined('DIR_ROOT')) {
	define('DIR_ROOT', dirname(__DIR__) . '/');
}

$plugin = DIR_ROOT . 'plugins/lead-platform-connector/';
require_once $plugin . 'system/roadmap-builder.php';
require_once $plugin . 'system/roadmap-renderer.php';
require_once $plugin . 'system/roadmap-service.php';

use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapBuilder;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapRenderer;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapService;

$fixtures = require $plugin . 'roadmap/fixtures.php';
$only     = $argv[1] ?? '';
if ($only !== '' && ! isset($fixtures[$only])) {
	fwrite(STDERR, "Unknown profile '$only'. Profiles: " . implode(', ', array_keys($fixtures)) . "\n");
	exit(1);
}

$outDir = DIR_ROOT . 'storage/roadmap-preview/';
if (! is_dir($outDir)) {
	mkdir($outDir, 0775, true);
}

$expires = gmdate('Y-m-d H:i:s', time() + 180 * 86400);
foreach ($fixtures as $name => $answers) {
	if ($only !== '' && $name !== $only) {
		continue;
	}
	$roadmap = RoadmapBuilder::build($answers);
	// Absolute links so the files open straight from disk.
	$options = RoadmapService::options('https://souvara.fr/feuille-de-route?t=apercu', $expires);
	$options['css_url']  = 'https://souvara.fr' . $options['css_url'];
	$options['logo_url'] = 'https://souvara.fr' . $options['logo_url'];

	file_put_contents($outDir . $name . '.html', RoadmapRenderer::page($roadmap, $options));
	file_put_contents($outDir . $name . '-email.html', RoadmapRenderer::emailHtml($roadmap, $options));
	file_put_contents($outDir . $name . '-email.txt', RoadmapRenderer::emailText($roadmap, $options));
	fwrite(STDOUT, sprintf("%-14s %s.html  (version %s, %d tool sections, %d options, costs: %s)\n",
		$name, $outDir . $name, $roadmap['version'], count($roadmap['prices']['tools']),
		array_sum(array_map(static fn ($g) => count($g['options']), $roadmap['options'])),
		! $roadmap['costs'] ? 'none' : ($roadmap['costs']['quote'] ? 'quote' : number_format($roadmap['costs']['saving'], 0, ',', ' ') . ' €')));
}
