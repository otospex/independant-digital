<?php
// Personalised roadmap: content file, rules, rendering and mail, without a database.

define('V_VERSION', 'test');
define('DIR_ROOT', dirname(__DIR__, 3) . '/');

$root = dirname(__DIR__);
foreach (['roadmap-builder', 'roadmap-renderer', 'roadmap-mailer', 'roadmap-service'] as $class) {
    require_once $root . '/system/' . $class . '.php';
}

use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapBuilder;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapMailer;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapRenderer;
use Vvveb\Plugins\LeadPlatformConnector\System\RoadmapService;

$failures = 0;
function check(bool $ok, string $message): void {
    global $failures;
    if (! $ok) {
        fwrite(STDERR, "FAIL: $message\n");
        $failures++;
    }
}

$content  = RoadmapBuilder::content();
$fixtures = require $root . '/roadmap/fixtures.php';

// ---------- content file ----------
check(trim((string) $content['version']) !== '', 'content needs a version.');
$facts = $content['general_price_facts'];
foreach ($content['tools'] as $tool => $entry) {
    foreach ($entry['facts'] as $fact) { $facts[] = $fact + ['_where' => $tool]; }
    check($entry['directory'] === '' || str_starts_with($entry['directory'], '/annuaire'), "tool $tool: directory link must be an /annuaire page.");
}
foreach ($facts as $fact) {
    check(trim($fact['text']) !== '', 'every fact needs a text.');
    check($fact['source'] === '' || preg_match('#^https://#', $fact['source']) === 1, 'fact sources must be https URLs: ' . substr($fact['text'], 0, 50));
    check((bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', (string) ($fact['checked'] ?? '')), 'every fact needs a checked date: ' . substr($fact['text'], 0, 50));
}
foreach ($content['constraints'] as $name => $entry) {
    check($entry['source'] === '' || str_starts_with($entry['source'], 'https://'), "constraint $name: source must be https.");
}
foreach ($content['funding'] as $scheme) {
    check(str_starts_with($scheme['url'], 'https://'), 'funding ' . $scheme['name'] . ' needs an https link.');
}
$flat = json_encode($content, JSON_UNESCAPED_UNICODE);
check(! str_contains($flat, '—'), 'content must not use em-dashes.');
foreach ($content['use_cases'] as $use => $entry) {
    check(str_starts_with($entry['directory'], '/annuaire'), "use case $use: directory link must be an /annuaire page.");
    foreach ($entry['options'] as $option) {
        if (stripos($option['name'], 'AIFEL') !== false) {
            check(($option['min_size'] ?? 0) >= 100, 'AIFEL serves organisations of 100 seats or more: set min_size to 100.');
        }
    }
}

// Every option the diagnostic form offers has content, so a new form option
// cannot silently produce an empty roadmap section.
$form = (string) file_get_contents(DIR_ROOT . 'public/themes/souverainete-digitale/content/contact.fr.html');
$formValues = static function (string $name) use ($form): array {
    preg_match_all('#name="' . preg_quote($name, '#') . '\[\]" value="([^"]+)"#', $form, $m);
    return array_map(static fn ($v) => html_entity_decode($v, ENT_QUOTES | ENT_HTML5, 'UTF-8'), $m[1]);
};
foreach ($formValues('current_tools') as $tool) {
    check($tool === 'Autre' || isset($content['tools'][$tool]), "form tool '$tool' has no entry in roadmap/content.fr.php.");
}
foreach ($formValues('use_cases') as $use) {
    check(isset($content['use_cases'][$use]), "form use case '$use' has no entry in roadmap/content.fr.php.");
}
foreach ($formValues('constraints') as $constraint) {
    check(isset($content['constraints'][$constraint]), "form constraint '$constraint' has no entry in roadmap/content.fr.php.");
}
preg_match('#<select id="contact-size"[^>]*>(.*?)</select>#s', $form, $sizeSelect);
preg_match_all('#<option>([^<]+)</option>#', $sizeSelect[1] ?? '', $sizes);
foreach ($sizes[1] as $size) {
    $size = html_entity_decode($size, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $normalised = RoadmapBuilder::answers(['company_size' => $size])['company_size'];
    check(isset($content['costs']['users_by_size'][$normalised]), "form headcount '$size' has no users_by_size entry.");
    check(RoadmapBuilder::sizeRange($size)[0] !== null, "headcount '$size' cannot be parsed.");
}

// ---------- rules ----------
check(RoadmapBuilder::sizeRange('< 50') === [1, 49], 'sizeRange < 50.');
check(RoadmapBuilder::sizeRange('100–249') === [100, 249], 'sizeRange 100–249.');
check(RoadmapBuilder::sizeRange("1\u{00A0}000–4\u{00A0}999") === [1000, 4999], 'sizeRange with non-breaking spaces.');
check(RoadmapBuilder::sizeRange("≥ 5\u{00A0}000") === [5000, null], 'sizeRange open-ended.');

$names = static function (array $roadmap): array {
    $out = [];
    foreach ($roadmap['options'] as $group) { foreach ($group['options'] as $o) { $out[] = $o['name']; } }
    return $out;
};
$pme = RoadmapBuilder::build($fixtures['pme']);
check($pme['costs'] && ! $pme['costs']['quote'] && $pme['costs']['saving'] > 0, 'an SME on Microsoft 365 gets a priced saving.');
check($pme['urgent'] !== null, 'a deadline under 3 months adds the urgent note.');
check(in_array('Prêt Boost Transformation numérique (Bpifrance)', array_column($pme['funding'], 'name'), true), 'an SME under 50 staff sees the Prêt Boost.');
check($pme['funding_note'] !== null, 'asking about funding adds the funding note.');
check(! array_filter($pme['answers'], static fn ($v, $k) => in_array($k, ['email', 'phone'], true), ARRAY_FILTER_USE_BOTH), 'answers never keep e-mail or phone.');

$eti = RoadmapBuilder::build($fixtures['eti']);
check(in_array('AIFEL', $names($eti), true), 'AIFEL is suggested for visio at 250–999 seats.');
check($eti['costs'] && $eti['costs']['quote'], 'above 300 users the cost section asks for a quote instead of a misleading figure.');
check((bool) array_filter($eti['phases'][1]['items'], static fn ($i) => str_contains($i, 'VMware et Oracle')), 'VMware and Oracle users get the re-tender step.');
check(in_array('NIS2', array_column($eti['obligations'], 'name'), true), 'NIS2 obligation is listed.');

$small = RoadmapBuilder::build($fixtures['petite-visio']);
check(! in_array('AIFEL', $names($small), true), 'AIFEL is not suggested under 100 seats.');
check($small['costs'] === null, 'no cost section without a priced suite.');

$public = RoadmapBuilder::build(['company_size' => "1\u{00A0}000–4\u{00A0}999"] + $fixtures['public']);
check($public['costs'] !== null, 'a headcount sent with non-breaking spaces still maps to a user count.');
check(! in_array('Diag Cybersécurité (Bpifrance)', array_column($public['funding'], 'name'), true), 'Bpifrance SME schemes are not offered to local authorities.');

// ---------- rendering ----------
$evil = $fixtures['pme'];
$evil['company'] = '<script>alert(1)</script>';
$evil['full_name'] = 'Eve <img src=x onerror=alert(1)>';
$opts = RoadmapService::options('https://souvara.fr/feuille-de-route?t=' . str_repeat('a', 48), '2027-03-25 00:00:00');
$page = RoadmapRenderer::page(RoadmapBuilder::build($evil), $opts);
check(! str_contains($page, '<script>alert(1)</script>') && str_contains($page, '&lt;script&gt;'), 'the page escapes answers.');
check(str_contains($page, 'noindex'), 'the page is noindex.');
check(str_contains($page, 'Télécharger en PDF') && str_contains($page, '@media print'), 'the page offers a PDF download with a print stylesheet.');
$html = RoadmapRenderer::emailHtml(RoadmapBuilder::build($evil), $opts);
check(! str_contains($html, '<img src=x'), 'the HTML e-mail escapes the name.');
$text = RoadmapRenderer::emailText(RoadmapBuilder::build($fixtures['pme']), $opts);
check(str_contains($text, 'feuille-de-route?t='), 'the text e-mail carries the link.');

// ---------- mail ----------
$sent = [];
RoadmapMailer::$transport = static function ($to, $subject, $body, $headers) use (&$sent) { $sent[] = compact('to', 'subject', 'body', 'headers'); return true; };
check(RoadmapMailer::send('claire@example.test', 'Votre feuille de route', 'texte', '<p>html</p>', 'Souvara', 'contact@souvara.fr'), 'a valid message is sent.');
check(str_contains($sent[0]['headers'] ?? '', 'multipart/alternative'), 'the e-mail is multipart (text + HTML).');
check(! RoadmapMailer::send("claire@example.test\r\nBcc: x@example.test", 's', 't', 'h', 'Souvara', 'contact@souvara.fr'), 'header injection in the address is refused.');
check(count($sent) === 1, 'a refused message is not sent.');
RoadmapMailer::$transport = null;

// ---------- wiring ----------
check(str_contains((string) file_get_contents($root . '/app/controller/submit.php'), 'RoadmapService::issue('), 'completed submissions issue a roadmap.');
check(str_contains((string) file_get_contents(DIR_ROOT . 'config/app-routes.php'), "'/feuille-de-route'"), 'the /feuille-de-route route exists.');

if ($failures > 0) {
    fwrite(STDERR, "roadmap tests: FAIL ($failures issue(s))\n");
    exit(1);
}
echo "roadmap tests: PASS\n";
