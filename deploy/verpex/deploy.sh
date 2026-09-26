#!/bin/sh
# Deploy origin/master on the Verpex account, from ~/souvara-site.
#
#   deploy/verpex/deploy.sh          # code, lead-schema migration, caches
#   deploy/verpex/deploy.sh --seed   # also re-apply deploy/seed.sql
#
# --seed rewrites the French content of every page the seed manages, so
# admin edits to those pages are lost. Take a database export first.
set -eu

ROOT=$(cd "$(dirname "$0")/../.." && pwd)
cd "$ROOT"

git pull --ff-only origin master

if [ "${1:-}" = "--seed" ]; then
	MYSQL=$(command -v mariadb || command -v mysql)
	deploy/verpex/with-db-env.sh sh -c \
		'MYSQL_PWD="$DB_PASSWORD" "$0" -h "$DB_HOST" -u "$DB_USER" --default-character-set=utf8mb4 "$DB_DATABASE" < deploy/seed.sql' \
		"$MYSQL"
	echo "seed applied"
fi

deploy/verpex/with-db-env.sh php scripts/migrate-lead-schema.php

# Page cache, bundled assets, compiled templates and cached routes/settings.
find public/page-cache public/assets-cache -mindepth 1 -delete 2>/dev/null || true
find storage/compiled-templates storage/cache -maxdepth 1 -type f -delete

git log --oneline -1
