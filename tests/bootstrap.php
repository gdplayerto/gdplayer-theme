<?php

declare(strict_types=1);

/*
 * Bootstrap PHPUnit untuk tema gdplayer.
 *
 * Tema hidup di dalam instalasi GDPlayer (themes/gdplayer): class core dijangkau
 * lewat ../../../vendor + spl_autoload ke ../../../src. BASE_DIR menunjuk akar
 * instalasi supaya resources/templates & src/ nyata terpakai saat render view;
 * sandbox hanya menampung error_log PHP agar tidak mencemari log mesin pengembang.
 */

$sandbox = __DIR__ . '/.sandbox';
foreach ([$sandbox, $sandbox . '/cache', $sandbox . '/logs'] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0o777, true);
    }
}

// Guard: bila launcher sudah mendefinisikan BASE_DIR lebih dulu, jangan ganggu.
if (!defined('BASE_DIR')) {
    define('BASE_DIR', \dirname(__DIR__, 3) . \DIRECTORY_SEPARATOR);
}
if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://gdplayer.test');
}
if (!defined('ADMIN_DIR')) {
    define('ADMIN_DIR', '/administrator/');
}
if (!defined('CACHE_DRIVER')) {
    define('CACHE_DRIVER', 'Files');
}
if (!defined('CACHE_TIMEOUT')) {
    define('CACHE_TIMEOUT', 3_600);
}
if (!defined('CACHE_PATH')) {
    define('CACHE_PATH', BASE_DIR . 'cache' . \DIRECTORY_SEPARATOR);
}
if (!defined('CACHE')) {
    define('CACHE', CACHE_PATH);
}
if (!defined('LOG_PATH')) {
    define('LOG_PATH', BASE_DIR . 'logs' . \DIRECTORY_SEPARATOR);
}
if (!defined('SECURE_SALT')) {
    define('SECURE_SALT', 'salt-uji-tema-gdplayer');
}
if (!defined('REDIS_CONFIG')) {
    define('REDIS_CONFIG', ['host' => '127.0.0.1', 'port' => 6_379, 'password' => '', 'database' => 0, 'timeout' => 1.0]);
}
if (!defined('DB_MASTER')) {
    define('DB_MASTER', [
        'host' => '127.0.0.1',
        'port' => 3_306,
        'database' => 'test',
        'username' => 'test',
        'password' => 'test',
        'user' => 'test',
        'pass' => 'test',
        'charset' => 'utf8mb4',
    ]);
}
if (!defined('DB_REPLICA')) {
    define('DB_REPLICA', []);
}
if (!defined('DB_DRIVER')) {
    define('DB_DRIVER', 'mysql');
}

// Autoload proyek utama (GDPlayer\Http, Presentation, dll).
require __DIR__ . '/../../../vendor/autoload.php';
// Autoload tema (bila dependency repo sudah di-install).
$ownVendor = __DIR__ . '/../vendor/autoload.php';
if (is_file($ownVendor)) {
    require $ownVendor;
}

spl_autoload_register(static function (string $class): void {
    $maps = [
        'GDPlayer\\Theme\\Gdplayer\\Tests\\' => __DIR__ . '/',
        'GDPlayer\\Theme\\Gdplayer\\' => __DIR__ . '/../src/',
    ];
    foreach ($maps as $prefix => $dir) {
        if (str_starts_with($class, $prefix)) {
            $file = $dir . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
            if (is_file($file)) {
                require $file;
                return;
            }
        }
    }
});

// Tes tidak boleh menyentuh MySQL live: semua query diarahkan ke SQLite in-memory
// yang skemanya identik (tests/Support/sqlite-schema.sql milik proyek utama).
require_once __DIR__ . '/../../../tests/Support/SqliteConnectionProvider.php';
\GDPlayer\Database\Conn::setProvider(\GDPlayer\Tests\Support\SqliteConnectionProvider::shared());

// Fixture statis: tema yang diuji adalah active_theme, sehingga elemen layout
// (nav/header/footer) diambil dari themes/gdplayer, bukan dari tema default.
\GDPlayer\Tests\Support\SqliteConnectionProvider::shared()->pdoWrite()
    ->prepare('INSERT INTO `tb_settings` (`key`, `value`) VALUES (?, ?)')
    ->execute(['active_theme', 'gdplayer']);

// Buang cache lintas-run supaya fixture di atas tidak tertutup cache lama.
try {
    \GDPlayer\Service\InstanceCache\InstanceCache::clear();
} catch (\Throwable) {
    // cache tidak tersedia: tes tetap jalan tanpa pembersihan
}

// error_log() dari jalur gagal masuk sandbox, bukan php_errors.log global mesin pengembang.
ini_set('error_log', $sandbox . '/php_errors.log');
