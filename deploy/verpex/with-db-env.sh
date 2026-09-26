#!/bin/sh
# Run a command with DB_HOST, DB_PORT, DB_DATABASE, DB_USER and DB_PASSWORD
# exported from config/db.php, from the site root. The CLI jobs (flush,
# purge, lead-schema migration) read DB_* from the environment, and on shared
# hosting cron has no other source for them.
#
#   deploy/verpex/with-db-env.sh php scripts/flush-partial-leads.php
set -eu

ROOT=$(cd "$(dirname "$0")/../.." && pwd)

eval "$(php "$ROOT/deploy/verpex/db-env.php" "$ROOT/config/db.php")"
export DB_HOST DB_PORT DB_DATABASE DB_USER DB_PASSWORD

cd "$ROOT"
exec "$@"
