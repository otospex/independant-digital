<?php
/*
 * Page web de la feuille de route, aussi utilisée pour le PDF (impression du
 * navigateur, feuille de style @media print en bas).
 * Variables : $r (feuille de route), $o (liens), $h (échappement), $n (nombres).
 */
$a = $r['answers'];
$who = trim($a['company']) !== '' ? $a['company'] : $a['full_name'];
$booking = $o['booking_url'];
$section = 0;
?><!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Votre feuille de route | Souvara</title>
<?php if ($o['css_url']) { ?><link rel="stylesheet" href="<?php echo $h($o['css_url']); ?>"><?php } ?>
<style>
  body { margin: 0; background: var(--color-paper, #f5f8fc); color: var(--color-ink, #0b2233); font-family: var(--font-body, sans-serif); line-height: 1.6; }
  .rm-bar { background: var(--color-nav, #042335); padding: 0.9rem 1rem; }
  .rm-bar-in, .rm-main { max-width: 52rem; margin: 0 auto; }
  .rm-bar-in { display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap; }
  .rm-bar img { height: 1.6rem; width: auto; display: block; }
  .rm-main { padding: 2rem 1rem 4rem; }
  .rm-main h1 { font-family: var(--font-display, sans-serif); font-stretch: var(--display-stretch, 100%); font-size: clamp(1.9rem, 4vw, 2.6rem); line-height: 1.1; margin: 0 0 0.4rem; }
  .rm-meta { color: var(--color-muted, #5b6f80); font-size: 0.9rem; margin: 0 0 1.5rem; }
  .rm-intro { border-left: 3px solid var(--color-mark-top, #ea4a36); padding: 0.75rem 1rem; background: var(--color-panel-raised, #fff); }
  .rm-section { margin-top: 2.5rem; }
  .rm-section h2 { font-family: var(--font-display, sans-serif); font-size: 1.35rem; margin: 0 0 0.75rem; display: flex; gap: 0.6rem; align-items: baseline; }
  .rm-num { font-family: var(--font-mono, monospace); font-size: 0.85rem; color: var(--color-accent, #1d5fbf); }
  .rm-section h3 { font-size: 1.05rem; margin: 1.25rem 0 0.4rem; }
  .rm-facts { list-style: none; padding: 0; margin: 0; display: grid; gap: 0.6rem; }
  .rm-facts li { padding: 0.75rem 1rem; background: var(--color-panel-raised, #fff); border: 1px solid var(--color-rule, #d5dfea); }
  .rm-src { font-size: 0.8rem; color: var(--color-muted, #5b6f80); }
  .rm-action { font-weight: 600; margin: 0.4rem 0 0; }
  .rm-phase { border: 1px solid var(--color-rule, #d5dfea); background: var(--color-panel-raised, #fff); padding: 1rem 1.25rem; margin-bottom: 0.75rem; }
  .rm-phase h3 { margin-top: 0; }
  .rm-phase ul { margin: 0; padding-left: 1.1rem; }
  .rm-urgent { padding: 0.75rem 1rem; border: 1px solid var(--color-mark-top, #ea4a36); background: var(--color-panel-raised, #fff); margin-bottom: 0.75rem; }
  .rm-table { width: 100%; border-collapse: collapse; background: var(--color-panel-raised, #fff); }
  .rm-table th, .rm-table td { text-align: left; padding: 0.55rem 0.75rem; border-bottom: 1px solid var(--color-rule, #d5dfea); }
  .rm-table td.rm-n { text-align: right; font-variant-numeric: tabular-nums; white-space: nowrap; }
  .rm-cta { margin-top: 1rem; }
  .rm-btn { display: inline-block; padding: 0.8rem 1.2rem; background: var(--color-accent, #1d5fbf); color: #fff; font-weight: 700; text-decoration: none; clip-path: polygon(0 0, calc(100% - 0.625rem) 0, 100% 0.625rem, 100% 100%, 0 100%); border: 0; cursor: pointer; font: inherit; font-weight: 700; }
  .rm-btn-light { background: #fff; color: var(--color-nav, #042335); }
  .rm-foot { margin-top: 3rem; padding-top: 1rem; border-top: 1px solid var(--color-rule, #d5dfea); color: var(--color-muted, #5b6f80); font-size: 0.85rem; }
  .rm-answers { display: grid; grid-template-columns: max-content 1fr; gap: 0.3rem 1rem; margin: 0; }
  .rm-answers dt { color: var(--color-muted, #5b6f80); }
  .rm-answers dd { margin: 0; }
  @media (max-width: 560px) { .rm-answers { grid-template-columns: 1fr; } .rm-answers dd { margin-bottom: 0.5rem; } }
  @media print {
    @page { margin: 16mm 14mm; }
    body { background: #fff; font-size: 10.5pt; }
    .rm-bar { background: #fff; border-bottom: 2px solid #042335; padding: 0 0 6mm; }
    .rm-bar img { filter: invert(1) hue-rotate(180deg); }
    .rm-noprint { display: none !important; }
    .rm-main { padding: 6mm 0 0; max-width: none; }
    .rm-facts li, .rm-phase, .rm-urgent, .rm-table tr { break-inside: avoid; }
    .rm-section { break-inside: auto; }
    .rm-section h2, .rm-section h3 { break-after: avoid; }
    a { color: inherit; }
    .rm-src a::after, .rm-print-url::after { content: " (" attr(href) ")"; word-break: break-all; }
  }
</style>
</head>
<body>
<header class="rm-bar">
  <div class="rm-bar-in">
    <a href="<?php echo $h($o['site_url']); ?>/"><?php if ($o['logo_url']) { ?><img src="<?php echo $h($o['logo_url']); ?>" alt="Souvara" width="409" height="60"><?php } else { ?><strong style="color:#fff">SOUVARA</strong><?php } ?></a>
    <button type="button" class="rm-btn rm-btn-light rm-noprint" onclick="window.print()">Télécharger en PDF</button>
  </div>
</header>
<main class="rm-main">
  <h1>Votre feuille de route</h1>
  <p class="rm-meta">Préparée pour <?php echo $h($who); ?><?php if ($o['generated']) { ?> · <?php echo $h($o['generated']); ?><?php } ?></p>
  <p class="rm-intro"><?php echo $h($r['intro']); ?></p>

  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Votre situation</h2>
    <dl class="rm-answers">
      <?php foreach ([
        'Organisation' => $a['company'], 'Fonction' => $a['job_title'], 'Type' => $a['org_type'], 'Effectif' => $a['company_size'],
        'Outils actuels' => implode(', ', $a['current_tools']), 'Usages concernés' => implode(', ', $a['use_cases']),
        'Contraintes' => implode(', ', $a['constraints']), 'Élément déclencheur' => $a['trigger'], 'Échéance' => $a['timeline'],
      ] as $label => $value) { if ($value === '') { continue; } ?>
        <dt><?php echo $h($label); ?></dt><dd><?php echo $h($value); ?></dd>
      <?php } ?>
    </dl>
  </section>

  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Ce que vous payez, et ce qui peut changer</h2>
    <ul class="rm-facts">
      <?php foreach ($r['prices']['general'] as $fact) { ?>
        <li><?php echo $h($fact['text']); ?><?php if ($fact['source']) { ?> <span class="rm-src"><a href="<?php echo $h($fact['source']); ?>" rel="noopener" target="_blank">Source</a></span><?php } ?></li>
      <?php } ?>
    </ul>
    <?php foreach ($r['prices']['tools'] as $tool) { ?>
      <h3><?php echo $h($tool['tool']); ?></h3>
      <?php if ($tool['facts']) { ?><ul class="rm-facts">
        <?php foreach ($tool['facts'] as $fact) { ?>
          <li><?php echo $h($fact['text']); ?><?php if ($fact['source']) { ?> <span class="rm-src"><a href="<?php echo $h($fact['source']); ?>" rel="noopener" target="_blank">Source</a></span><?php } ?></li>
        <?php } ?>
      </ul><?php } ?>
      <?php if ($tool['action']) { ?><p class="rm-action"><?php echo $h($tool['action']); ?></p><?php } ?>
    <?php } ?>
  </section>

  <?php if ($r['obligations']) { ?>
  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Vos obligations</h2>
    <ul class="rm-facts">
      <?php foreach ($r['obligations'] as $ob) { ?>
        <li><strong><?php echo $h($ob['name']); ?>.</strong> <?php echo $h($ob['text']); ?><?php if ($ob['source']) { ?> <span class="rm-src"><a href="<?php echo $h($ob['source']); ?>" rel="noopener" target="_blank">Source</a></span><?php } ?>
          <?php if ($ob['action']) { ?><p class="rm-action"><?php echo $h($ob['action']); ?></p><?php } ?></li>
      <?php } ?>
    </ul>
  </section>
  <?php } ?>

  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Votre feuille de route en trois étapes</h2>
    <?php if ($r['urgent']) { ?><p class="rm-urgent"><?php echo $h($r['urgent']); ?></p><?php } ?>
    <?php foreach ($r['phases'] as $phase) { if (! $phase['items']) { continue; } ?>
      <div class="rm-phase">
        <h3><?php echo $h($phase['title']); ?></h3>
        <ul><?php foreach ($phase['items'] as $item) { ?><li><?php echo $h($item); ?></li><?php } ?></ul>
      </div>
    <?php } ?>
  </section>

  <?php if ($r['options']) { ?>
  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Options à étudier</h2>
    <p>Nous retenons la solution la plus adaptée à votre cas, partenaire ou non. Ces pistes sont un point de départ, à comparer sur votre usage réel.</p>
    <?php foreach ($r['options'] as $group) { ?>
      <h3><?php echo $h($group['use_case']); ?></h3>
      <?php if ($group['options']) { ?><ul><?php foreach ($group['options'] as $opt) { ?><li><strong><?php echo $h($opt['name']); ?></strong> : <?php echo $h($opt['text']); ?></li><?php } ?></ul><?php } ?>
      <?php if ($group['directory']) { ?><p><a class="rm-print-url" href="<?php echo $h($o['site_url'] . $group['directory']); ?>">Voir les solutions comparées dans l&rsquo;annuaire</a></p><?php } ?>
    <?php } ?>
  </section>
  <?php } ?>

  <?php if ($r['costs'] && $r['costs']['quote']) { ?>
  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Ordre de grandeur des coûts</h2>
    <p><?php echo $h($r['costs']['note']); ?></p>
    <p class="rm-src"><a class="rm-print-url" href="<?php echo $h($o['site_url']); ?>/calculateur">Faire une première estimation dans le calculateur</a></p>
  </section>
  <?php } elseif ($r['costs']) { $c = $r['costs']; ?>
  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Ordre de grandeur des coûts</h2>
    <p>Pour environ <?php echo $h($n($c['users'])); ?> utilisateurs, sur <?php echo (int) $c['years']; ?> ans, avec une hausse de <?php echo (int) round($c['growth'] * 100); ?> % par an chez le fournisseur actuel et une migration outillée&nbsp;:</p>
    <table class="rm-table">
      <tr><td>Rester sur <?php echo $h($c['current']); ?></td><td class="rm-n"><?php echo $h($n($c['stay'])); ?> € HT</td></tr>
      <tr><td>Passer à <?php echo $h($c['target']); ?>, changement compris (<?php echo $h($n($c['one_off'])); ?> €)</td><td class="rm-n"><?php echo $h($n($c['switch'])); ?> € HT</td></tr>
      <tr><td><strong><?php echo $c['saving'] >= 0 ? 'Économie' : 'Surcoût'; ?></strong></td><td class="rm-n"><strong><?php echo $h($n(abs($c['saving']))); ?> € HT</strong></td></tr>
      <?php if ($c['payback']) { ?><tr><td>Retour sur investissement</td><td class="rm-n"><?php echo (int) $c['payback']; ?> mois</td></tr><?php } ?>
    </table>
    <p class="rm-src">Hypothèse&nbsp;: offre <?php echo $h($c['current']); ?>. <a class="rm-print-url" href="<?php echo $h($o['site_url']); ?>/calculateur">Ajuster dans le calculateur</a></p>
  </section>
  <?php } ?>

  <?php if ($r['funding'] || $r['funding_note']) { ?>
  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span>Financements possibles</h2>
    <?php if ($r['funding']) { ?><ul class="rm-facts">
      <?php foreach ($r['funding'] as $f) { ?><li><strong><?php echo $h($f['name']); ?>.</strong> <?php echo $h($f['text']); ?> <span class="rm-src"><a href="<?php echo $h($f['url']); ?>" rel="noopener" target="_blank">En savoir plus</a></span></li><?php } ?>
    </ul><?php } ?>
    <?php if ($r['funding_note']) { ?><p><?php echo $h($r['funding_note']); ?></p><?php } ?>
  </section>
  <?php } ?>

  <section class="rm-section">
    <h2><span class="rm-num"><?php echo sprintf('%02d', ++$section); ?></span><?php echo $h($r['next_step']['title']); ?></h2>
    <p><?php echo $h($r['next_step']['text']); ?></p>
    <?php if ($booking) { ?><p class="rm-cta"><a class="rm-btn rm-print-url" href="<?php echo $h($booking); ?>"><?php echo $h($r['next_step']['button']); ?></a></p>
    <?php } else { ?><p><?php echo $h($r['next_step']['fallback_text']); ?></p><?php } ?>
  </section>

  <p class="rm-foot"><?php echo $h($r['disclaimer']); ?> Souvara · contact@souvara.fr · version <?php echo $h($r['version']); ?><?php if ($o['expires']) { ?> · lien valable jusqu&rsquo;au <?php echo $h($o['expires']); ?><?php } ?></p>
</main>
</body>
</html>
