<?php

declare(strict_types=1);

/**
 * Konstanta monolit GDPlayer untuk analisis statis subrepo.
 *
 * Monolit mendefinisikan konstanta ini dari `.env` saat runtime
 * (`src/Bootstrap/Env.php`), jadi CI subrepo tak bisa mendapatkannya tanpa
 * checkout monolit. Tipe nilai mengikuti aturan cast Env: JSON_KEYS -> array,
 * INT_KEYS -> int, BOOL_KEYS -> bool, BASE_DIR -> path, sisanya string.
 * Nilainya dummy (hanya bentuk/tipe yang penting).
 */

\defined('BASE_DIR') || \define('BASE_DIR', __DIR__ . DIRECTORY_SEPARATOR);
\defined('BASE_URL') || \define('BASE_URL', 'dummy');
\defined('SECURE_SALT') || \define('SECURE_SALT', 'dummy');
\defined('EXTRA_IP') || \define('EXTRA_IP', []);
\defined('ADMIN_DIR') || \define('ADMIN_DIR', 'dummy');
\defined('USER_AGENT') || \define('USER_AGENT', 'dummy');
\defined('BUFFER_SIZE') || \define('BUFFER_SIZE', 65_536);
\defined('SMALL_BUFFER_SIZE') || \define('SMALL_BUFFER_SIZE', 65_536);
\defined('MAX_DOWNLOAD_SPEED') || \define('MAX_DOWNLOAD_SPEED', 65_536);
\defined('DB_DRIVER') || \define('DB_DRIVER', 'dummy');
\defined('DB_MASTER') || \define('DB_MASTER', ['host' => '127.0.0.1', 'port' => 3306, 'database' => 'gdplayer', 'username' => 'u', 'password' => 'p', 'charset' => 'utf8mb4']);
\defined('DB_REPLICA') || \define('DB_REPLICA', []);
\defined('DB_ATTR_PERSISTENT') || \define('DB_ATTR_PERSISTENT', false);
\defined('DB_ATTR_PREFETCH') || \define('DB_ATTR_PREFETCH', 65_536);
\defined('DB_ATTR_TIMEOUT') || \define('DB_ATTR_TIMEOUT', 65_536);
\defined('DB_CACHE_TIMEOUT') || \define('DB_CACHE_TIMEOUT', 65_536);
\defined('DB_CACHE_TIMEOUT_MIN') || \define('DB_CACHE_TIMEOUT_MIN', 65_536);
\defined('DB_CACHE_TIMEOUT_SETTINGS') || \define('DB_CACHE_TIMEOUT_SETTINGS', 65_536);
\defined('DB_CACHE_TIMEOUT_VIDEOS') || \define('DB_CACHE_TIMEOUT_VIDEOS', 65_536);
\defined('CACHE_DRIVER') || \define('CACHE_DRIVER', 'dummy');
\defined('CACHE_TIMEOUT') || \define('CACHE_TIMEOUT', 3_600);
\defined('REDIS_CONFIG') || \define('REDIS_CONFIG', ['scheme' => 'tcp', 'host' => '127.0.0.1', 'port' => 6379]);
\defined('DB_DEBUG') || \define('DB_DEBUG', false);
\defined('DNS_SERVERS') || \define('DNS_SERVERS', ['1.1.1.1']);
\defined('DEFAULT_ADMIN_PASSWORD') || \define('DEFAULT_ADMIN_PASSWORD', 'dummy');
\defined('DEFAULT_DEMO_PASSWORD') || \define('DEFAULT_DEMO_PASSWORD', 'dummy');
