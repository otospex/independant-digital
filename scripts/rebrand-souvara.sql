-- =====================================================================
-- Rebrand an already-seeded database from Indépendant Digital to Souvara.
--
-- seed.dokploy.sql carries the new brand for fresh installs; this script
-- applies the same substitutions to a live database that was seeded before
-- 2026-09-24. Idempotent: running it twice changes nothing the second time.
--
-- Run it against the site database (phpMyAdmin on cPanel, or
-- `mysql <db> < scripts/rebrand-souvara.sql`) AFTER deploying the templates
-- with the same commit, and clear the page cache afterwards
-- (scripts/lib/cache-invalidator.php or Admin > Tools > Clear cache).
--
-- Order matters: the elided form "d'Indépendant Digital" must become
-- "de Souvara" before the bare name is replaced. The lead endpoint slug
-- `independant-digital-intake` and the post_meta namespace
-- `independant_digital` are functional identifiers and are left alone.
-- =====================================================================

-- Page and post content, in every language.
UPDATE post_content SET
  name             = REPLACE(REPLACE(REPLACE(name,             'd&rsquo;Indépendant Digital', 'de Souvara'), 'd’Indépendant Digital', 'de Souvara'), 'Indépendant Digital', 'Souvara'),
  content          = REPLACE(REPLACE(REPLACE(content,          'd&rsquo;Indépendant Digital', 'de Souvara'), 'd’Indépendant Digital', 'de Souvara'), 'Indépendant Digital', 'Souvara'),
  excerpt          = REPLACE(REPLACE(REPLACE(excerpt,          'd&rsquo;Indépendant Digital', 'de Souvara'), 'd’Indépendant Digital', 'de Souvara'), 'Indépendant Digital', 'Souvara'),
  meta_keywords    = REPLACE(meta_keywords,    'Indépendant Digital', 'Souvara'),
  meta_description = REPLACE(meta_description, 'Indépendant Digital', 'Souvara');

UPDATE post_content SET
  content          = REPLACE(REPLACE(content,          'www.independantdigital.fr', 'www.souvara.fr'), 'independantdigital.fr', 'souvara.fr'),
  excerpt          = REPLACE(excerpt,          'independantdigital.fr', 'souvara.fr'),
  meta_description = REPLACE(meta_description, 'independantdigital.fr', 'souvara.fr');

-- Solution directory metadata (reviewer badge).
UPDATE post_meta SET value = REPLACE(value, 'Indépendant Digital', 'Souvara')
  WHERE `key` = 'reviewer' AND value LIKE '%Indépendant Digital%';

-- Taxonomy (categories, directory terms) copy.
UPDATE taxonomy_item_content SET
  name             = REPLACE(name,             'Indépendant Digital', 'Souvara'),
  content          = REPLACE(REPLACE(content,  'd&rsquo;Indépendant Digital', 'de Souvara'), 'Indépendant Digital', 'Souvara'),
  meta_title       = REPLACE(meta_title,       'Indépendant Digital', 'Souvara'),
  meta_description = REPLACE(meta_description, 'Indépendant Digital', 'Souvara');

UPDATE taxonomy_content SET
  name             = REPLACE(name,             'Indépendant Digital', 'Souvara'),
  content          = REPLACE(content,          'Indépendant Digital', 'Souvara'),
  meta_description = REPLACE(meta_description, 'Indépendant Digital', 'Souvara');

-- Site settings JSON: homepage <title>/meta per language, contact addresses.
UPDATE site SET settings = REPLACE(REPLACE(settings, 'Indépendant Digital', 'Souvara'), 'independantdigital.fr', 'souvara.fr')
  WHERE site_id = 1;
