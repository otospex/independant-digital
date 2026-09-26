# Feuille de route personnalisée

Quand un visiteur termine le diagnostic (les trois étapes), Souvara lui envoie
par e-mail un lien privé vers une feuille de route construite à partir de ses
réponses : prix et conditions de ses outils, obligations, trois étapes, options
à étudier, ordre de grandeur des coûts, financements, prochaine étape. La page
se télécharge en PDF (bouton « Télécharger en PDF », impression du navigateur).

## Ce qu'on modifie, et où

| Pour changer… | Fichier |
|---|---|
| Un fait, un prix, une source, une action, une option, un financement, un texte | `roadmap/content.fr.php` |
| Le lien de prise de rendez-vous (TidyCal) | `booking_url` dans `content.fr.php`, ou la variable d'environnement `ROADMAP_BOOKING_URL` |
| La mise en page de la page (et du PDF) | `roadmap/templates/page.php` |
| L'e-mail | `roadmap/templates/email-text.php` et `email-html.php` |
| Qui voit quoi (conditions, calculs) | `system/roadmap-builder.php` |
| Les profils d'exemple | `roadmap/fixtures.php` |

La feuille de route est reconstruite à chaque consultation à partir des réponses
enregistrées et du `content.fr.php` actuel : une correction s'applique aussi aux
liens déjà envoyés. Changez `version` dans `content.fr.php` à chaque modification
de fond ; elle apparaît en pied de page.

## Vérifier une modification

```
php scripts/roadmap-preview.php            # écrit storage/roadmap-preview/*.html et les e-mails
php scripts/roadmap-preview.php eti        # un seul profil
php plugins/lead-platform-connector/tests/roadmap-test.php
```

Ouvrez les fichiers `.html` dans un navigateur ; imprimez la page pour voir le PDF.
Le test échoue si une option du formulaire n'a pas de contenu, si un fait n'a pas
de source https ou de date de vérification, si AIFEL apparaît sous 100 postes,
ou si une réponse n'est pas échappée.

## Règles à garder

- Un fait chiffré = une source et une date (`checked`). Attribuer les chiffres
  contestés (« selon le CISPE »).
- AIFEL ne s'affiche qu'à partir de 100 postes (`min_size`).
- Les options suivent la règle éditoriale : la meilleure solution, partenaire ou non.
- Pas de promesse de résultat : c'est une « première lecture, à valider ensemble ».

## Fonctionnement technique

- `app/controller/submit.php` appelle `RoadmapService::issue()` quand une demande
  aboutit ; le lien est ajouté à l'e-mail envoyé à leads@souvara.fr.
- `system/roadmap-store.php` enregistre les réponses chiffrées (table
  `lead_roadmap`, créée au premier usage) et l'empreinte du jeton ; le lien est
  `/feuille-de-route?t=<jeton>`, valable `link_days` jours. L'URL porte le jeton
  en paramètre pour que le cache de pages ne l'enregistre jamais.
- Admin : lien « Feuille de route » dans Lead Platform → Submissions.
- Les feuilles de route sont purgées avec les demandes (`scripts/purge-leads.php`).
- Évolution possible : un PDF généré côté serveur (pièce jointe) à partir de
  `RoadmapRenderer::page()`, qui produit déjà un document autonome.
