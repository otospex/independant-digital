<?php

define('V_VERSION', 'test');

$file = __DIR__ . '/../system/lead-notifier.php';
if (! is_file($file)) {
    fwrite(STDERR, "FAIL: lead notifier is missing.\n");
    exit(1);
}

require_once $file;

use Vvveb\Plugins\LeadPlatformConnector\System\LeadNotifier;

$failures = 0;

function check(bool $ok, string $message): void {
    global $failures;
    if (! $ok) {
        fwrite(STDERR, "FAIL: $message\n");
        $failures++;
    }
}

// Recipient: default, override, and an explicit empty value disables mail.
putenv('LEAD_NOTIFY_EMAIL');
check(LeadNotifier::recipient() === LeadNotifier::DEFAULT_RECIPIENT, 'without configuration the default recipient is used.');
putenv('LEAD_NOTIFY_EMAIL=ventes@example.test');
check(LeadNotifier::recipient() === 'ventes@example.test', 'LEAD_NOTIFY_EMAIL overrides the recipient.');
putenv('LEAD_NOTIFY_EMAIL=');
check(LeadNotifier::recipient() === '', 'an empty LEAD_NOTIFY_EMAIL disables notifications.');
putenv('LEAD_NOTIFY_EMAIL');

$payload = [
    'full_name'   => 'Claire Martin',
    'name'        => 'Claire Martin',
    'email'       => 'claire@example.test',
    'phone'       => '+33 6 12 34 56 78',
    'company'     => 'Mairie de Lyon',
    'need_type'   => 'Sortir de Microsoft 365',
    'message'     => "Deux lignes\net un accent : é",
    'campaign'    => 'independant-digital-intake',
    'source_page' => '/contact',
    'utm_params'  => ['utm_source' => 'google', 'gclid' => 'abc'],
    'privacy_acknowledgement' => '1',
];

$mail = LeadNotifier::compose($payload, ['status' => 'pending', 'complete' => true, 'id' => 42]);

check(str_contains($mail['subject'], 'Claire Martin'), 'the subject names the contact.');
check(str_contains($mail['subject'], 'Mairie de Lyon'), 'the subject names the company.');
check(! preg_match('/[\r\n]/', $mail['subject']), 'the subject is a single line.');
check($mail['reply_to'] === 'claire@example.test', 'Reply-To is the visitor so a reply reaches them.');
check(str_contains($mail['body'], 'Téléphone : +33 6 12 34 56 78'), 'the body carries the phone number under its French label.');
check(str_contains($mail['body'], 'Entreprise : Mairie de Lyon'), 'known fields get French labels.');
check(str_contains($mail['body'], "Deux lignes\net un accent : é"), 'free text is kept verbatim.');
check(str_contains($mail['body'], 'utm_source : google'), 'nested UTM parameters are flattened.');
check(substr_count($mail['body'], 'Claire Martin') === 1, 'the duplicated name/full_name pair is shown once.');
check(! str_contains($mail['body'], 'privacy_acknowledgement'), 'internal flags are not shown.');
check(str_contains($mail['body'], '#42'), 'the body references the submission id.');
check(str_contains($mail['body'], 'module=plugins/lead-platform-connector/submissions'), 'the body links to the admin list.');

// An incomplete diagnostic is labelled as such.
$partial = LeadNotifier::compose(['full_name' => 'Paul', 'email' => 'paul@example.test'], ['status' => 'pending', 'complete' => false]);
check(str_contains($partial['subject'], 'incomplet'), 'an abandoned diagnostic is flagged in the subject.');

// Header injection: a crafted e-mail address or name must never reach a header.
$evil = LeadNotifier::compose([
    'full_name' => "Eve\r\nBcc: victim@example.test",
    'email'     => "eve@example.test\r\nBcc: victim@example.test",
], ['status' => 'pending', 'complete' => true]);
check($evil['reply_to'] === '', 'an invalid e-mail is dropped from Reply-To.');
check(! preg_match('/[\r\n]/', $evil['subject']), 'CR/LF in the name cannot split the subject.');

$headers = LeadNotifier::headers('leads@example.test', $evil['reply_to']);
check(! str_contains($headers, 'Bcc'), 'headers carry no injected fields.');
check(str_contains($headers, 'Content-Type: text/plain; charset=UTF-8'), 'the mail is UTF-8 plain text.');

// Wiring: every settled lead notifies, and the flush job notifies abandoned ones.
$controller = (string) file_get_contents(__DIR__ . '/../app/controller/submit.php');
check(substr_count($controller, '$this->notify(') >= 7, 'submit notifies on every settled branch (4 one-shot, 3 staged).');
$flush = (string) file_get_contents(__DIR__ . '/../../../scripts/flush-partial-leads.php');
check(str_contains($flush, 'LeadNotifier::send('), 'the flush job notifies abandoned diagnostics.');

if ($failures > 0) {
    fwrite(STDERR, "lead-notifier tests: FAIL ($failures issue(s))\n");
    exit(1);
}

echo "lead-notifier tests: PASS\n";
