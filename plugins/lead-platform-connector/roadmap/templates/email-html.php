<?php
/*
 * E-mail HTML envoyé avec la feuille de route (même contenu que email-text.php).
 * Styles en ligne : les messageries ignorent les feuilles de style.
 * Variables : $r, $o, $h, $n (voir page.php).
 */
$first = \Vvveb\Plugins\LeadPlatformConnector\System\RoadmapRenderer::firstName($r['answers']['full_name']);
$steps = [];
foreach ($r['phases'] as $phase) {
	if ($phase['items']) {
		$steps[] = [$phase['title'], $phase['items'][0]];
	}
}
$btn = 'display:inline-block;padding:12px 18px;background:#1d5fbf;color:#ffffff;font-weight:700;text-decoration:none;';
?><!DOCTYPE html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Votre feuille de route</title></head>
<body style="margin:0;padding:0;background:#f5f8fc;font-family:Arial,Helvetica,sans-serif;color:#0b2233;line-height:1.55;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f5f8fc;"><tr><td align="center" style="padding:24px 12px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background:#ffffff;border:1px solid #d5dfea;">
<tr><td style="background:#042335;padding:16px 24px;color:#ffffff;font-weight:800;letter-spacing:0.08em;">SOUVARA</td></tr>
<tr><td style="padding:24px;">
<p style="margin:0 0 12px;">Bonjour<?php echo $first !== '' ? ' ' . $h($first) : ''; ?>,</p>
<p style="margin:0 0 16px;">Merci pour votre demande. Votre feuille de route personnalisée est prête.</p>
<p style="margin:0 0 20px;"><a href="<?php echo $h($o['roadmap_url']); ?>" style="<?php echo $btn; ?>">Voir ma feuille de route</a></p>
<?php if ($o['expires']) { ?><p style="margin:0 0 20px;font-size:13px;color:#5b6f80;">Lien valable jusqu&rsquo;au <?php echo $h($o['expires']); ?>. Vous pouvez aussi la télécharger en PDF depuis la page.</p><?php } ?>
<p style="margin:0 0 8px;font-weight:700;">En résumé</p>
<ul style="margin:0 0 16px;padding-left:18px;">
<?php foreach ($steps as $step) { ?><li style="margin-bottom:8px;"><strong><?php echo $h($step[0]); ?></strong><br><?php echo $h($step[1]); ?></li><?php } ?>
</ul>
<?php if ($r['costs'] && ! $r['costs']['quote'] && $r['costs']['saving'] > 0) { ?><p style="margin:0 0 16px;">Ordre de grandeur&nbsp;: environ <strong><?php echo $h($n($r['costs']['saving'])); ?>&nbsp;€ HT d&rsquo;économie</strong> sur <?php echo (int) $r['costs']['years']; ?> ans en passant de <?php echo $h($r['costs']['current']); ?> à <?php echo $h($r['costs']['target']); ?>, migration comprise.</p><?php } ?>
<p style="margin:0 0 16px;"><?php echo $h($r['next_step']['text']); ?></p>
<?php if ($o['booking_url'] !== '') { ?><p style="margin:0 0 20px;"><a href="<?php echo $h($o['booking_url']); ?>" style="<?php echo $btn; ?>"><?php echo $h($r['next_step']['button']); ?></a></p>
<?php } else { ?><p style="margin:0 0 20px;"><?php echo $h($r['next_step']['fallback_text']); ?></p><?php } ?>
<p style="margin:0;font-size:13px;color:#5b6f80;">Cette feuille de route est une première lecture automatique, à valider ensemble.</p>
</td></tr>
<tr><td style="padding:16px 24px;border-top:1px solid #d5dfea;font-size:13px;color:#5b6f80;">Houssam Rihane · Souvara · <a href="https://souvara.fr" style="color:#5b6f80;">souvara.fr</a> · contact@souvara.fr</td></tr>
</table></td></tr></table>
</body></html>
