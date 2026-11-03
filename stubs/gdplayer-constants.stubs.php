<?php

declare(strict_types=1);

/**
 * Konstanta monolit GDPlayer untuk analisis statis subrepo.
 *
 * Monolit men-definisikan konstanta ini dari `.env` saat runtime (`src/Bootstrap/Env.php`),
 * jadi CI subrepo tidak bisa mendapatkannya tanpa checkout monolit. Nilai di sini dummy --
 * hanya bentuknya yang penting. Dibuat dari daftar kunci `.env.example`;
 * jangan diedit tangan, regenerasi bersama berkas stub.
 */

\defined('BASE_URL') || \define('BASE_URL', 'dummy');
\defined('SECURE_SALT') || \define('SECURE_SALT', 'dummy');
\defined('EXTRA_IP') || \define('EXTRA_IP', 'dummy');
\defined('ADMIN_DIR') || \define('ADMIN_DIR', 'dummy');
\defined('USER_AGENT') || \define('USER_AGENT', 'dummy');
\defined('BUFFER_SIZE') || \define('BUFFER_SIZE', 'dummy');
\defined('SMALL_BUFFER_SIZE') || \define('SMALL_BUFFER_SIZE', 'dummy');
\defined('MAX_DOWNLOAD_SPEED') || \define('MAX_DOWNLOAD_SPEED', 'dummy');
\defined('DB_DRIVER') || \define('DB_DRIVER', 'dummy');
\defined('DB_MASTER') || \define('DB_MASTER', 'dummy');
\defined('DB_REPLICA') || \define('DB_REPLICA', 'dummy');
\defined('DB_ATTR_PERSISTENT') || \define('DB_ATTR_PERSISTENT', 'dummy');
\defined('DB_ATTR_PREFETCH') || \define('DB_ATTR_PREFETCH', 'dummy');
\defined('DB_ATTR_TIMEOUT') || \define('DB_ATTR_TIMEOUT', 'dummy');
\defined('DB_CACHE_TIMEOUT') || \define('DB_CACHE_TIMEOUT', 'dummy');
\defined('DB_CACHE_TIMEOUT_MIN') || \define('DB_CACHE_TIMEOUT_MIN', 'dummy');
\defined('DB_CACHE_TIMEOUT_SETTINGS') || \define('DB_CACHE_TIMEOUT_SETTINGS', 'dummy');
\defined('DB_CACHE_TIMEOUT_VIDEOS') || \define('DB_CACHE_TIMEOUT_VIDEOS', 'dummy');
\defined('CACHE_DRIVER') || \define('CACHE_DRIVER', 'dummy');
\defined('CACHE_TIMEOUT') || \define('CACHE_TIMEOUT', 'dummy');
\defined('REDIS_CONFIG') || \define('REDIS_CONFIG', 'dummy');
\defined('DB_DEBUG') || \define('DB_DEBUG', 'dummy');
\defined('DNS_SERVERS') || \define('DNS_SERVERS', 'dummy');
\defined('DEFAULT_ADMIN_PASSWORD') || \define('DEFAULT_ADMIN_PASSWORD', 'dummy');
\defined('DEFAULT_DEMO_PASSWORD') || \define('DEFAULT_DEMO_PASSWORD', 'dummy');
