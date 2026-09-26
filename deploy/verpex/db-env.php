<?php
// Print config/db.php's default connection as shell assignments (DB_HOST=…),
// for with-db-env.sh to eval. Values are shell-quoted.
$config = include $argv[1];
$db     = $config['connections'][$config['default']];

foreach (['host', 'port', 'database', 'user', 'password'] as $key) {
	echo 'DB_' . strtoupper($key) . '=' . escapeshellarg((string) ($db[$key] ?? '')) . "\n";
}
