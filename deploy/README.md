# Deploying Souvara

Production runs on **Verpex shared hosting** (cPanel, LiteSpeed, MariaDB 11.4),
account `independantdigit`, server 209.42.31.63. `souvara.fr` is the account's
primary domain; `independantdigital.fr` and both `www.` hosts are aliases that
`public/.htaccess` redirects to `https://souvara.fr`.

| Path | What it is |
|---|---|
| `seed.sql` | Pages, solutions directory, taxonomies, form endpoint. Idempotent; used by every host. |
| `verpex/` | Deploy script, DB-env wrapper and crontab for the live site. |
| `docker/` | The former Dokploy image (Dockerfile, compose, nginx, init, seed runner). Not used in production; `scripts/tests/deploy-overlay-test.php` still checks that it ships every fork-authored file. |

## Layout on the server

```
~/souvara-site/            git checkout of master (the repo root)
~/public_html -> souvara-site/public   document root, so only public/ is served
~/backups/                 database and file backups
```

cPanel does not let the primary domain's document root change, hence the
symlink. `public/.well-known/` holds the AutoSSL challenge directory.

## Deploy

```sh
ssh independantdigit@209.42.31.63
~/souvara-site/deploy/verpex/deploy.sh           # code + migration + caches
~/souvara-site/deploy/verpex/deploy.sh --seed    # also re-apply seed.sql
```

`--seed` rewrites the French content of every page the seed manages. Export the
database first (phpMyAdmin, or `mariadb-dump` through `with-db-env.sh`), and
follow it with `scripts/rebrand-souvara.sql` only on a database seeded before
2026-09-24.

## Scheduled jobs

`crontab ~/souvara-site/deploy/verpex/crontab` installs the hourly flush of
abandoned diagnostics and the daily 12-month lead purge. Output lands in
`storage/logs/cron.log`.

## Mail

Mailboxes live in cPanel (Email Accounts): `leads@souvara.fr` receives a copy
of every lead (`LEAD_NOTIFY_EMAIL`, see the lead-platform-connector README),
`contact@souvara.fr` is the public address. MX, SPF, DKIM and DMARC for
souvara.fr are served by the Verpex nameservers.

## Database notes

The tables use `utf8mb4_0900_ai_ci`, and so does the database default since
2026-09-26. The seed's temporary tables inherit the database default, and a
mismatch breaks their joins with "Illegal mix of collations".
