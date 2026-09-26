<?php
/*
 * E-mail texte envoyé avec la feuille de route. Court : le détail est sur la page.
 * Variables : $r, $o, $n (voir page.php). Pas d'échappement HTML ici.
 */
$first = \Vvveb\Plugins\LeadPlatformConnector\System\RoadmapRenderer::firstName($r['answers']['full_name']);
$steps = [];
foreach ($r['phases'] as $phase) {
	if ($phase['items']) {
		$steps[] = $phase['title'] . "\n  " . $phase['items'][0];
	}
}
?>
Bonjour<?php echo $first !== '' ? ' ' . $first : ''; ?>,

Merci pour votre demande. Votre feuille de route personnalisée est prête :
<?php echo $o['roadmap_url']; ?>

<?php if ($o['expires']) { ?>Le lien reste valable jusqu'au <?php echo $o['expires']; ?>. Vous pouvez aussi la télécharger en PDF depuis la page.
<?php } ?>

En résumé :
<?php foreach ($steps as $step) { ?>
- <?php echo $step . "\n"; ?>
<?php } ?>

<?php if ($r['costs'] && ! $r['costs']['quote'] && $r['costs']['saving'] > 0) { ?>
Ordre de grandeur : environ <?php echo $n($r['costs']['saving']); ?> € HT d'économie sur <?php echo (int) $r['costs']['years']; ?> ans en passant de <?php echo $r['costs']['current']; ?> à <?php echo $r['costs']['target']; ?>, migration comprise.

<?php } ?>
<?php echo $r['next_step']['text']; ?>

<?php echo $o['booking_url'] !== '' ? $o['booking_url'] : $r['next_step']['fallback_text']; ?>


Cette feuille de route est une première lecture automatique, à valider ensemble.

Houssam Rihane
Souvara · https://souvara.fr · contact@souvara.fr
