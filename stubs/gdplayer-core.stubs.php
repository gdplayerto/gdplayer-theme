<?php
/**
 * Stub signature kelas monolit GDPlayer.
 *
 * Dibuat otomatis dengan `php-stubs/generator` dari `src/` repo monolit;
 * jangan diedit tangan. Tujuan: PHPStan subrepo bisa berdiri sendiri tanpa
 * checkout monolit (pola yang sama dengan php-stubs/wordpress-stubs).
 */

namespace GDPlayer\Http\Request;

/**
 * Contract for classes that handle a PSR-7 request and return a response.
 */
interface RequestHandlerInterface
{
    /**
     * Handle the incoming request.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request incoming request
     * @return \Psr\Http\Message\ResponseInterface resulting response
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface;
}
namespace GDPlayer\Modules;

/**
 * Shared base for AjaxHelper (legacy) & AbstractAjaxController (new).
 *
 * Removes duplicated identical methods: request normalization + token/user resolution,
 * JSON/DataTables responses, logging, DataTables query extraction, and table validation.
 */
trait AjaxBaseTrait
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param array<int|string, array<string, mixed>> $data
     * @param int $recordsTotal
     * @param int $recordsFiltered
     * @param array<string, mixed> $customData
     * @return string
     */
    protected function createDataTableResponse(array $data = [], int $recordsTotal = 0, int $recordsFiltered = 0, array $customData = []): string
    {
    }
    protected function createDefaultResponse(int $status = 0, string $msg = '', mixed $result = null): string
    {
    }
    /**
     * @param string $message
     * @param array<string, mixed> $context
     */
    protected function createLog(string $message = 'Admin only access denied', array $context = []): void
    {
    }
    /**
     * @param array<string,mixed> $get
     * @param string[] $columns
     * @param string $defaultOrderBy
     * @param string $defaultOrderDir
     * @return array{draw:int,start:int,length:int,search:string,orderBy:string,orderDir:string}
     */
    protected function extractDatatablesQry(array $get, array $columns, string $defaultOrderBy = '', string $defaultOrderDir = 'asc'): array
    {
    }
    protected function tableValidation(string $id, string $colId, \GDPlayer\Database\MySQL\Model $table): \GDPlayer\Database\MySQL\Model
    {
    }
}
namespace GDPlayer\Helper;

/**
 * Base controller for the Ajax endpoints.
 *
 * Normalizes the request, resolves the caller/token and dispatches the
 * requested action, returning a JSON response.
 */
abstract class AjaxHelper implements \GDPlayer\Http\Request\RequestHandlerInterface
{
    use \GDPlayer\Modules\AjaxBaseTrait;
    protected const MESSAGE_BAD_REQUEST = 'Bad request';
    protected const MESSAGE_UNAUTHORIZE = 'You are not authorized to access this feature';
    protected string $action = '';
    protected \GDPlayer\Config\BinFile $binConfig;
    protected \GDPlayer\Config\Config $config;
    /** @var null|array<string,mixed> $currentUser */
    protected ?array $currentUser = null;
    /** @var array<string,mixed> $data */
    protected array $data;
    protected int $draw = 0;
    protected mixed $epeMelemek = false;
    /** @var array<string,\Nyholm\Psr7\UploadedFile|null> $files */
    protected array $files = [];
    protected bool $isAdmin = false;
    protected bool $isAdminShowUserData = false;
    protected bool $isUserShowTheirData = false;
    /** @var string[] $listColumns */
    protected array $listColumns;
    protected \GDPlayer\Core\Security\Security $security;
    protected string $token = '';
    protected function loadAction(object $class): string
    {
    }
    /**
     * Handle the PSR-7 request and return a JSON response.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request incoming request
     * @return \Psr\Http\Message\ResponseInterface JSON response
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Dispatch the list action for the current entity.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    abstract public function response(): string;
}
namespace GDPlayer\Ajax;

/**
 * Dashboard widgets and statistics endpoint.
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class DashboardAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Google Drive account management endpoint (list, add, edit, delete).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class GDriveAccountAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Google Drive file browser endpoint (list, mirror, delete).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class GDriveFileAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Google Drive mirror management endpoint (list, add, remove).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class GDriveMirrorAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Google Drive mirror queue endpoint (list, enqueue, clear).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class GDriveQueueAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Load balancer management endpoint (list, add, edit, delete).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class LoadBalancerAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Admin-only endpoint for cache clearing and server status metrics.
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class PrivateAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Public (unauthenticated) endpoint for video/poster/subtitle actions.
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class PublicAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * User session management endpoint (list, revoke).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class SessionAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Admin settings endpoint (read, save, license, custom headers).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class SettingAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Subtitle library endpoint (list, upload, convert, delete).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class SubtitleAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * User management endpoint (list, create, edit, delete, password).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class UserAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Video management endpoint (list, create, edit, delete, bulk actions).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
class VideoAjax extends \GDPlayer\Helper\AjaxHelper
{
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'title', 'host', 'slug', 'status', 'dmca', 'has_sub', 'views', 'name', 'created', 'updated', 'poster', 'host_id'];
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return bool
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    protected function delete(): string
    {
    }
    protected function deleteByHostnames(): string
    {
    }
    protected function dmcaTakedown(): string
    {
    }
    protected function getAlternatives(): string
    {
    }
    protected function getServer(): string
    {
    }
    protected function removePoster(): string
    {
    }
    protected function rename(): string
    {
    }
    protected function renameMulti(): string
    {
    }
    protected function updateStatus(): string
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Video export endpoint (generate and download export files).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class VideoExportAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Video import endpoint (batched CSV row import and validation).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class VideoImportAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
/**
 * Video subtitle endpoint (list, edit, upload, delete per video).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class VideoSubtitleAjax extends \GDPlayer\Helper\AjaxHelper
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return string
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Handle the requested action and return its JSON response.
     *
     * @return string JSON response
     */
    public function response(): string
    {
    }
}
namespace GDPlayer\Bootstrap;

/**
 * Front controller: one request lifecycle (incoming request -> outgoing response).
 *
 * Only bridges the SAPI to {@see Kernel}: builds the request from globals, then emits the response
 * through {@see SapiEmitter}. Other runtimes (Swoole/RoadRunner) use the same Kernel with
 * their own emitter.
 */
final class Application
{
    /**
     * Run one request lifecycle, then release all of its state.
     */
    public static function run(): void
    {
    }
}
/**
 * Configuration loader from the .env file (replacement for includes/config.php).
 *
 * Value rules:
 *  - literal scalars: unquoted numbers, bool true/false, strings as-is (double quotes optional)
 *  - structures (EXTRA_IP, DB_MASTER, DB_REPLICA, REDIS_CONFIG, DNS_SERVERS) must be valid JSON,
 *    read directly with json_decode(); type conversion happens here.
 *
 * Every key is set into the environment through putenv() so getenv() works; no superglobals.
 */
final class Env
{
    /**
     * Read a raw value from the environment.
     *
     * @param string $key key name
     * @param string $default default value
     * @return string
     */
    public static function get(string $key, string $default = ''): string
    {
    }
    /**
     * Read .env, then define() every configuration constant.
     *
     * @param string|null $file .env file path; default: <root>/.env
     * @return void
     */
    public static function load(?string $file = null): void
    {
    }
}
/**
 * Failure while loading or validating the `.env` configuration.
 */
final class EnvException extends \RuntimeException
{
}
/**
 * Process-level bootstrap: error reporting, shutdown guard, extra autoloaders, theme autoload.
 *
 * Moved from includes/bootstrap.php (F1.8). That file is left on disk as legacy
 * and is no longer loaded by composer.
 */
final class ErrorHandler
{
    /**
     * Register all bootstrap hooks; safe to call more than once.
     *
     * @return void
     */
    public static function register(): void
    {
    }
}
/**
 * Application core: one PSR-7 request in, one PSR-7 response out.
 *
 * No `echo`/`header()`/superglobals; delivery to the client is the runtime's Emitter job
 * (SAPI/Swoole/RoadRunner). The router is built once per process so the route table is not
 * recompiled on every request in a long-running worker.
 *
 * Legacy paths that still write their own output (theme/plugin views) are captured by the output
 * buffer and turned into the response body; their headers/status/cookies are already dual-sunk to {@see State}.
 */
final class Kernel
{
    /**
     * Kernel instance for this process (router reused across requests in a worker).
     */
    public static function create(): self
    {
    }
    /**
     * Handle one request: publish context, dispatch, return the response.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request PSR-7 request from the runtime
     * @return \Psr\Http\Message\ResponseInterface response ready for the emitter
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Process-level boot and per-request reset.
 *
 * PHP-FPM starts from zero on every request, so nothing has to be cleaned up. A long-running
 * worker (RoadRunner/Swoole) reuses one process: whatever is left over by request A is visible
 * to request B. `boot()` runs once per process, `reset()` runs at the end of every request.
 */
final class Lifecycle
{
    /**
     * Process-level setup: runs once per process (FPM: once per request, same effect).
     */
    public static function boot(): void
    {
    }
    /**
     * True when requests are served by a process that outlives a single request.
     *
     * Covers RoadRunner/Swoole (CLI SAPI) and any other worker entrypoint; also true for plain
     * CLI scripts, where HTTP response handling must not run either.
     */
    public static function isLongRunning(): bool
    {
    }
    /**
     * Release every leftover of the request that just finished.
     *
     * Only per-request state is cleared. Read-only caches (Twig environment, settings)
     * stay in the process on purpose: rebuilding them every request
     * would defeat the point of a long-running worker. Versi tag justru HARUS dibuang:
     * nilai itu berubah karena worker lain (admin, cron), jadi menyimpannya lintas request
     * membuat worker ini terus memakai key versi lama.
     */
    public static function reset(): void
    {
    }
}
namespace GDPlayer\Config;

/**
 * Central application constants (paths, versions, limits and base URLs).
 */
enum App
{
    public const ACCEPT_LANGUAGE = 'en;q=0.9';
    public const APP_VERSION = '5.0.0';
    public const BACKEND_BASEURL = BASE_URL . ADMIN_DIR . self::SLASH;
    public const BIN_PATH = self::RESOURCES_PATH . 'bin/';
    public const CACHE_PATH = BASE_DIR . 'cache/';
    public const CSS_PLAYER_VERSION = '3.4.0';
    public const DATA_PATH = BASE_DIR . 'resources/data/';
    public const DB_VERSION = 102;
    public const GEOIP_PATH = self::DATA_PATH . 'geoip/';
    public const GIGABYTES = 1073741824;
    public const IMAGES_BASEURL = self::UPLOADS_BASEURL . 'images/';
    public const IMAGES_PATH = self::UPLOADS_PATH . 'images/';
    public const JSON_PATH = self::DATA_PATH . 'json/';
    public const JS_DOWNLOAD_VERSION = '3.3.9';
    public const JS_PLAYER_VERSION = '4.7.2';
    public const JS_VERSION = '4.0.3';
    public const KILOBYTES = 1024;
    public const LOG_PATH = self::TMP_PATH . 'logs/';
    public const MAXMIND_COUNTRY_FILE = self::GEOIP_PATH . 'GeoLite2-Country.mmdb';
    public const MAXMIND_FILE = self::GEOIP_PATH . 'GeoLite2-ASN.mmdb';
    public const MAXMIND_PATH = self::GEOIP_PATH;
    public const MEGABYTES = 1048576;
    public const OLD_CHIPER = 'aes-128-cbc';
    public const OPTIONS_TAG = 'options';
    public const PLAYER_CONFIG_TAG = 'player-config';
    public const PLUGINS_PATH = BASE_DIR . 'plugins/';
    public const PUBLIC_PATH = BASE_DIR . 'public/';
    /** Absolute path to the resources/ folder (assets copied from includes/ — includes/ is read-only). */
    public const RESOURCES_PATH = BASE_DIR . 'resources/';
    public const SLASH = '/';
    /** Absolute path to the new framework folder (src/). */
    public const SRC_PATH = BASE_DIR . 'src/';
    public const SUBTITLES_BASEURL = self::UPLOADS_BASEURL . 'subtitles/';
    public const SUBTITLES_PATH = self::UPLOADS_PATH . 'subtitles/';
    public const TEMPLATES_PATH = self::RESOURCES_PATH . 'templates/';
    public const THEMES_BASEURL = BASE_URL . 'themes/';
    public const THEMES_PATH = BASE_DIR . 'themes/';
    public const TMP_PATH = BASE_DIR . 'tmp/';
    public const UPLOADS_BASEURL = BASE_URL . 'uploads/';
    public const UPLOADS_PATH = self::PUBLIC_PATH . 'uploads/';
    /**
     * @return array<string,mixed>
     */
    public static function info(): array
    {
    }
}
/**
 * Reader for the bundled JSON data files (host lists, timezones, languages, ...).
 */
final class BinFile
{
    /**
     * Bind the settings service used to merge dynamic entries.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param bool $default
     * @return string[]
     */
    public function getBypassedHosts(bool $default = false): array
    {
    }
    /**
     * @return string[]
     */
    public function getCloudflareHosts(): array
    {
    }
    /**
     * @param string $filename
     * @param string $cacheKey
     * @param bool $withoutCache
     * @return array<int|string, mixed>|(string|int|float|mixed)[]
     */
    public function getContent(string $filename, string $cacheKey = '', bool $withoutCache = false): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getContinentList(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getCountries(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getCustomExtensions(): array
    {
    }
    /**
     * @return array<int, mixed>
     */
    public function getCustomHeaders(): array
    {
    }
    /**
     * @param bool $withoutCache
     * @return array<string,mixed>
     */
    public function getCustomHostnames(bool $withoutCache = false): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getDownloadUrls(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getExampleLinks(): array
    {
    }
    /**
     * @return string[]
     */
    public function getHLSMP4Hosts(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getHighAscii(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getHostList(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getLanguageList(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getMagicFile(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getShortenerList(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getTimeoutHosts(): array
    {
    }
    /**
     * @return string[]
     */
    public function getTimezoneList(): array
    {
    }
}
/**
 * Application settings repository backed by the tb_settings table.
 *
 * Reads are cached and exposed through get()/getAll()/getMulti(); boolean-like
 * strings ("true"/"false") are normalized to real booleans.
 */
final class Config
{
    /**
     * Bind the settings model and close the session to avoid write locks.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Invalidate every cached settings entry (player, options and settings tags).
     *
     * @return int true when the cache tags were cleared successfully
     */
    public function clearCache(): int
    {
    }
    /**
     * Read a single setting value by key.
     *
     * @param null|string $key setting key
     * @return mixed parsed setting value, or null when the key does not exist
     */
    public function get(?string $key): mixed
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getAll(): array
    {
    }
    /**
     * @return array<string, string>|array{key: string, value: string}
     */
    public static function getLanguageList(string $selectedValue = ''): array
    {
    }
    /**
     * @param string[] $keys
     * @return array<string,mixed>
     */
    public function getMulti(array $keys = []): array
    {
    }
    public static function getSiteName(): string
    {
    }
    /**
     * Delete all settings rows and clear the cache, then flash a result alert.
     *
     * @param string $title human-readable label used in the alert message
     * @return void
     */
    public function reset(string $title, ?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
    /**
     * Persist a single setting, inserting it when the key does not exist yet.
     *
     * @param string $key   setting key
     * @param mixed  $value setting value
     * @return mixed update/insert result, or false on failure
     */
    public function save(string $key, mixed $value): mixed
    {
    }
    /**
     * @param array<string,mixed> $data
     * @param string $title
     * @return void
     */
    public function saveAll(array $data, string $title = 'Settings', ?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
}
namespace GDPlayer\Console\Commands;

/**
 * Penyusunan opsi, konteks, dan item unduhan aria2c.
 *
 * Split out of `DownloadAria2cCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DownloadAria2cCommand` through this trait.
 */
trait DownloadAria2cBuildTrait
{
    /**
     * aria2 log file per host+id.
     */
    protected function buildAria2LogFile(string $host, string $hostId): string
    {
    }
    /**
     * aria2 CLI options (verbatim from the legacy path).
     *
     * @param array<string,mixed> $context
     * @return list<string>
     */
    protected function buildAria2Options(array $context, string $inputFilePath, string $aria2LogFile): array
    {
    }
    /**
     * Build the download context (host, headers, source, referer) from a queue row.
     *
     * @param array<string,mixed> $dataVideo
     * @return array<string,mixed>
     */
    protected function buildDownloadContext(array $dataVideo): array
    {
    }
    /**
     * Download item list (one per source; private URLs skipped).
     *
     * @param array<string,mixed> $dataSources
     * @param list<string>        $headers
     * @return list<array<string,mixed>>
     */
    protected function buildDownloadItems(array $dataSources, string $videoCacheDir, array $headers): array
    {
    }
}
/**
 * Header, direktori cache, aplikasi aria2c, dan berkas input.
 *
 * Split out of `DownloadAria2cCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DownloadAria2cCommand` through this trait.
 */
trait DownloadAria2cSupportTrait
{
    /**
     * Prepare the video cache folder + base request headers.
     *
     * @param array<string,mixed> $dataVideo
     * @return list<string>
     */
    protected function buildRequestHeaders(array $dataVideo): array
    {
    }
    /**
     * Convert a legacy-style header list ("Name: value") into a map for the Fetcher.
     *
     * @param list<string> $lines legacy-style headers
     * @return array<string, string> name => value map
     */
    protected function headerLinesToMap(array $lines): array
    {
    }
    /**
     * @param array<string,mixed> $dataVideo
     */
    protected function prepareCacheDir(array $dataVideo): string
    {
    }
    /**
     * Locate the aria2c binary (Windows: `.exe`); '' when absent.
     */
    protected function resolveAria2cApp(): string
    {
    }
    /**
     * Write the aria2 input file (one block per item).
     *
     * @param list<array<string,mixed>> $downloadItems
     */
    protected function writeInputFile(string $videoCacheDir, array $downloadItems, bool $badHosts): string
    {
    }
}
/**
 * CLI command `bg_download_aria2c.php` (F8.1).
 *
 * Logic moved from `includes/bg_download_aria2c.php` (archived); shim: `resources/bin/bg_download_aria2c.php` (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class DownloadAria2cCommand
{
    use \GDPlayer\Console\Commands\DownloadAria2cBuildTrait;
    use \GDPlayer\Console\Commands\DownloadAria2cSupportTrait;
    /**
     * Unduh sumber video memakai binari aria2c (pengganti `includes/bg_download_aria2c.php`).
     */
    public function handle(): string
    {
    }
}
/**
 * Progres, pembatalan, dan finalisasi unduhan.
 *
 * Split out of `DownloadCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DownloadCommand` through this trait.
 */
trait DownloadCommandProgressTrait
{
    /**
     * Cancel the wave as soon as one tmp file goes missing (triggered by the progress callback):
     * detach the handle from the multi handle and close the file, exactly the abort block of the legacy path.
     * The difference: the legacy path re-ran that block on every loop after the first trigger (repeated
     * fclose) — here only once.
     *
     * @param array<int, resource|false> $files tmp file per index
     * @param array<int, resource|false> $stderrHandles verbose log per index
     * @param array<int, bool> $downloading "tmp file missing" flag per index
     * @return int true when the cancel ran
     */
    protected function abortDownloads(\GDPlayer\Http\Fetcher\FetcherPool $pool, array &$files, array &$stderrHandles, array &$downloading): int
    {
    }
    /**
     * Close the handle of every wave result, then move the tmp file to the final file/error file.
     *
     * @param array<int|string, \GDPlayer\Http\Fetcher\FetchResult> $poolResults wave results per source index
     * @param list<array<string, mixed>> $downloadUrls download list (needs 'tmp_file', 'video_file', 'err_file')
     * @param array<int, resource|false> $files tmp file per index
     * @param array<int, resource|false> $stderrHandles verbose log per index
     * @param array<int, float> $progress percentage per source index
     */
    protected function finalizeDownloads(array $poolResults, array $downloadUrls, array $files, array $stderrHandles, array $progress): void
    {
    }
    /**
     * Progress callback (already normalized by `Fetcher`): store the percentage in InstanceCache and
     * flag downloads whose tmp file is missing so the wave is cancelled.
     *
     * @param array<string, mixed> $dataSources source data (shared into InstanceCache)
     * @param array<int, float> $progress percentage per source index
     * @param array<int, bool> $downloading "tmp file missing" flag per index
     * @param array<string, mixed> $urlData download data (needs 'tmp_file')
     */
    protected function progressCallback(string $lockKey, int $index, array &$dataSources, array &$progress, array &$downloading, array $urlData): callable
    {
    }
}
/**
 * Penyusunan URL, header, dan pemindahan file unduhan.
 *
 * Split out of `DownloadCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DownloadCommand` through this trait.
 */
trait DownloadCommandUrlTrait
{
    /**
     * Download list from sources that passed the private-URL check.
     *
     * @param array<int|string, mixed> $sources source list in the source data
     * @param array<int|string, string> $headers normalized request headers
     * @return list<array<string, mixed>>
     */
    protected function buildDownloadUrls(array $sources, string $videoCacheDir, array $headers): array
    {
    }
    /**
     * Download request headers: base + Origin/Referer/Cookie from the source data, then normalized.
     *
     * @param array<string, mixed> $dataSources source data (needs 'referer' and 'cookies')
     * @return array<int|string, string>
     */
    protected function buildRequestHeaders(string $host, string $userAgent, string $userLanguage, array $dataSources): array
    {
    }
    /**
     * Fetcher for one download: writes the body to the caller's stream, verbose output to the log file.
     *
     * No time limit (timeout 0) like the legacy path; every other setting — interface, DNS,
     * TLS, keep-alive, rate limit, buffer — comes from the same transport policy
     * (`Helper\MiscHelper::getCurlDefaultConfig()`), so nothing is hardcoded here.
     *
     * @param resource|null $stderr cURL verbose log file
     */
    protected function downloadFetcher(string $host, $stderr): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
    /**
     * Pindahkan berkas sementara ke tujuan akhir, hanya bila berkas sementara ada.
     *
     * @param array<string, mixed> $urlData
     */
    protected function moveDownloadedFile(array $urlData, string $targetKey): void
    {
    }
}
/**
 * CLI command `bg_download.php` (F8.1).
 *
 * Logic moved from `includes/bg_download.php` (archived); `resources/bin/bg_download.php` = thin shim (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class DownloadCommand
{
    use \GDPlayer\Console\Commands\DownloadCommandProgressTrait;
    use \GDPlayer\Console\Commands\DownloadCommandUrlTrait;
    /**
     * Run the command.
     *
     * @return string stdout message ('' = no message), used by the shim as the exit() argument
     */
    public function handle(): string
    {
    }
}
/**
 * CLI command `bg_gdrive.php` (F8.1).
 *
 * Logic moved as-is from `includes/bg_gdrive.php` (archived); `resources/bin/bg_gdrive.php` = thin shim (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class GDriveCommand
{
    public function handle(): string
    {
    }
}
/**
 * Pemeliharaan disk/runtime dan direktori.
 *
 * Split out of `GeneralCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GeneralCommand` through this trait.
 */
trait GeneralMaintenanceTrait
{
    /**
     * Clean the cache when free disk space < 10 GB, and drop cache files older than the timeout.
     *
     * Age is measured per cache file, never from the directory mtime: writing
     * `cache/files/<host>/<host_id>/…` does not touch the parent directory, so a
     * directory check deletes files that are still in use.
     */
    protected function cleanupDisk(\GDPlayer\Service\Background\Background $background, \GDPlayer\Config\Config $config): void
    {
    }
    /**
     * Check the license, active connections, orphaned Chrome processes, and drop expired video sources.
     */
    protected function cleanupRuntime(): \GDPlayer\Service\Background\Background
    {
    }
    /**
     * Pastikan seluruh direktori runtime ada.
     */
    protected function ensureDirectories(): void
    {
    }
    /**
     * Write the uploads folder `.htaccess` (blocks execution of sensitive files).
     */
    protected function ensureUploadsHtaccess(): void
    {
    }
    /**
     * Delete cache files older than `$maxAge` seconds, recursively.
     *
     * @param string $dir cache root
     * @param int $maxAge seconds
     */
    protected function pruneCacheDirectory(string $dir, int $maxAge): void
    {
    }
}
/**
 * Sinkronisasi tema, plugin, dan proxy.
 *
 * Split out of `GeneralCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GeneralCommand` through this trait.
 *
 * Server sumber membalas stamp isi folder; arsip hanya dibangun & diunduh saat stamp
 * berbeda dari yang terakhir dipasang, jadi siklus tanpa perubahan tidak memindahkan byte.
 */
trait GeneralSyncTrait
{
    /** Jumlah percobaan ping+unduh sebelum menyerah (properti: PHP 8.1 tanpa trait const). */
    private int $maxAttempts = 5;
    /**
     * Install a downloaded plugin: reject an unsafe folder, extract, then re-index plugin routes.
     *
     * @param array<string, mixed> $pluginRow plugin row (needs 'id' and 'folder')
     * @param string               $downloaded downloaded archive path
     */
    protected function extractPluginDownload(array $pluginRow, string $downloaded): void
    {
    }
    /**
     * Minta stamp isi folder dari server sumber, dengan backoff 2^n detik.
     *
     * @param callable(): (string|false) $ping       permintaan stamp
     * @param array<string, mixed>       $logContext konteks log
     * @return string stamp, atau '' bila sudah mutakhir / server ini sumbernya
     */
    protected function fetchStamp(callable $ping, array $logContext): string
    {
    }
    /**
     * Unduh & pasang ulang tema aktif bila isinya berubah.
     */
    protected function syncActiveTheme(): void
    {
    }
    /**
     * Unduh & pasang ulang berkas plugin aktif yang isinya berubah.
     */
    protected function syncPlugins(): void
    {
    }
    /**
     * Refresh the proxy list, then check its health.
     */
    protected function updateProxies(): void
    {
    }
}
/**
 * CLI command `bg_general.php` (F8.1).
 *
 * Logic moved from `includes/bg_general.php` (archived); `resources/bin/bg_general.php` = thin shim (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class GeneralCommand
{
    use \GDPlayer\Console\Commands\GeneralMaintenanceTrait;
    use \GDPlayer\Console\Commands\GeneralSyncTrait;
    /**
     * Run the command.
     *
     * @return string stdout message ('' = no message), used by the shim as the exit() argument
     */
    /**
     * Run all background tasks.
     *
     * Flow: CLI guard -> uploads .htaccess -> runtime cleanup -> plugin/theme sync ->
     * load balancer ping -> disk cleanup -> directories -> subtitle file check -> proxy -> telemetry.
     */
    public function handle(): string
    {
    }
}
/**
 * Query data lama dan perbaikan datanya.
 *
 * Split out of `MigrateCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrateCommand` through this trait.
 */
trait MigrateDataQueryTrait
{
    /**
     * Tidy legacy data, then delete orphaned rows (settings, gdrive, subtitle, stats).
     *
     * @return list<string>
     */
    protected function buildDataFixQueries(): array
    {
    }
    /**
     * Data migration queries; the order is videos -> maxmind -> stats as in the legacy list.
     *
     * @return list<string>
     */
    protected function buildDataQueries(\PDO $pdoWrite): array
    {
    }
    /**
     * `tb_videos` data migration (rename + batch procedure) when there are rows to clean up.
     *
     * @return list<string>
     */
    protected function buildVideoDataQueries(\PDO $pdoWrite): array
    {
    }
}
/**
 * Query kunci/indeks saat migrasi.
 *
 * Split out of `MigrateCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrateCommand` through this trait.
 */
trait MigrateKeyQueryTrait
{
    /**
     * Key queries dropped before data moves: foreign keys, indexes, then create/modify table.
     *
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $groups schema builder per domain
     * @return list<string>
     */
    protected function buildKeyQueries(array $groups): array
    {
    }
    /**
     * Key queries restored after data moves: indexes then foreign keys.
     *
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $groups schema builder per domain
     * @return list<string>
     */
    protected function buildKeyRestoreQueries(array $groups): array
    {
    }
}
/**
 * Query skema: drop, view, maintenance, maxmind.
 *
 * Split out of `MigrateCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrateCommand` through this trait.
 */
trait MigrateSchemaQueryTrait
{
    /**
     * Drop leftover legacy schema: events, procedures, tables, then views.
     *
     * @return list<string>
     */
    protected function buildDropQueries(): array
    {
    }
    /**
     * ANALYZE + CHECK for `tb_*` tables (only drivers that support `SHOW TABLES`).
     *
     * @return list<string>
     */
    protected function buildMaintenanceQueries(\PDO $pdoWrite): array
    {
    }
    /**
     * Rebuild `tb_maxmind` (dedupe per ip/prefix).
     *
     * @return list<string>
     */
    protected function buildMaxmindQueries(): array
    {
    }
    /**
     * Buat ulang view inti (loadbalancers, subtitle_manager, users, videos).
     *
     * @return list<string>
     */
    protected function buildViewQueries(): array
    {
    }
}
/**
 * Query statistik saat migrasi.
 *
 * Split out of `MigrateCommand` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrateCommand` through this trait.
 */
trait MigrateStatsQueryTrait
{
    /**
     * Migrasi data `tb_stats` (rename + prosedur batch) bila ada ua non-numerik.
     *
     * @return list<string>
     */
    protected function buildStatsDataQueries(\PDO $pdoWrite): array
    {
    }
}
/**
 * CLI command `migrate.php` (F8.1) — new entry `resources/migrate.php`, formerly `includes/migrate.php`.
 *
 * Logic moved as-is from `includes/migrate.php` (archived); `resources/migrate.php` = thin shim (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class MigrateCommand
{
    use \GDPlayer\Console\Commands\MigrateDataQueryTrait;
    use \GDPlayer\Console\Commands\MigrateKeyQueryTrait;
    use \GDPlayer\Console\Commands\MigrateSchemaQueryTrait;
    use \GDPlayer\Console\Commands\MigrateStatsQueryTrait;
    /**
     * Run the command.
     *
     * Flow: connect DB -> build migration groups -> compose the query list -> write `migrate_<driver>.sql`
     * -> execute in order -> move upload folders -> server config + clear cache.
     *
     * The query merge order is behavior (FKs/indexes dropped first, data moved, then keys
     * restored). Do not reorder without an A/B temp copy in scratch.
     *
     * @return string stdout message ('' = no message), used by the shim as the exit() argument
     */
    public function handle(): string
    {
    }
}
/**
 * CLI command `bg_stats.php` (F8.1).
 *
 * Logic moved as-is from `includes/bg_stats.php` (archived); `resources/bin/bg_stats.php` = thin shim (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class StatsCommand
{
    /**
     * Run the command.
     *
     * @return string stdout message ('' = no message), used by the shim as the exit() argument
     */
    public function handle(): string
    {
    }
}
namespace GDPlayer\Core;

/**
 * Public API response builder for embed/download queries.
 *
 * Validates the request token, resolves the video payload through the Parser
 * and returns the encrypted/JSON API response.
 */
final class API
{
    /**
     * Bind the binary config, settings and security services.
     * @param \Psr\Http\Message\ServerRequestInterface|null $request PSR-7 request
     */
    public function __construct(?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Build the API response for the current request.
     *
     * @return string JSON response payload (error, DMCA notice or resolved sources)
     */
    public function response(): string
    {
    }
}
/**
 * Pipeline sumber data & validasi kelas host.
 *
 * Split out of `Core` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Core` through this trait.
 */
trait CoreSourceTrait
{
    /**
     * @return array<string,mixed>
     */
    protected function filterDataSources(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    protected function getOriginalSources(): array
    {
    }
    /**
     * True when the host name is safe & its extractor class exists and extends CoreHelper.
     *
     * @param string $className
     * @return bool
     */
    protected function isValidHostClass(string $className): bool
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getDataSources(): array
    {
    }
}
/**
 * Source resolution orchestrator for a single video.
 *
 * Dispatches to the matching hosting extractor, applies host health/blocking
 * rules and caches the resolved sources.
 */
final class Core
{
    use \GDPlayer\Core\CoreSourceTrait;
    /**
     * @param array<string,mixed> $query
     * @return void
     */
    public function __construct(array $query = [])
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getResult(): array
    {
    }
    /**
     * Return the per-host extraction timeout, learning from observed durations.
     *
     * @param string $host video host identifier
     * @return int timeout in seconds
     */
    public function getTimeout(string $host = 'gdrive'): int
    {
    }
    /**
     * Set whether downloads are requested, limited to HLS/MP4-capable hosts.
     *
     * @param bool $isDownloadable download flag
     * @return self fluent instance
     */
    public function setDownload(bool $isDownloadable = true): self
    {
    }
    /**
     * @param array<string,mixed> $qry
     * @return self
     */
    public function setQuery(array $qry = []): self
    {
    }
}
namespace GDPlayer\Helper\Core;

/**
 * Shared base for every video-host extractor.
 *
 * Boots the common services (config, headless Chrome, anti-captcha) and exposes the
 * getters/setters each extractor fills in while resolving sources. HTTP requests go
 * through `Http\Fetcher` (see `Core\Extractor::createRequestFetcher()`), so this class
 * owns no cURL handle.
 */
abstract class CoreHelper
{
    /** @var null|array<string,mixed> $accessToken */
    protected ?array $accessToken;
    /** @var string[] $cookies */
    protected array $cookies = [];
    protected string $email = '';
    protected string $filmstrip = '';
    protected string $host;
    protected string $id = '';
    protected string $image = '';
    /** @var array<int<0,max>,mixed> $mp4Sources */
    protected array $mp4Sources = [];
    protected \GDPlayer\Helper\Core\CoreHelperOptions $options;
    protected string $referer = '';
    protected \GDPlayer\Helper\Core\CoreHelperServices $services;
    /** @var array<int<0,max>,mixed> $sources */
    protected array $sources = [];
    protected string $status = 'fail';
    protected string $title = '';
    /** @var array<int<0,max>,mixed> $tracks */
    protected array $tracks = [];
    protected string $url;
    protected string $userAgent = USER_AGENT;
    /**
     * Initialize the shared services and bind the host from the concrete class name.
     */
    public function __construct()
    {
    }
    /**
     * Process AJAX requests to find m3u8 files
     *
     * @param array<string, mixed> $chromeResponse
     */
    protected function chromeAjaxResponseParser(array $chromeResponse): void
    {
    }
    /**
     * @return string[]
     */
    protected function getCustomCookies(): array
    {
    }
    protected function googleLabel(string $itag = ''): string
    {
    }
    protected function sanitizeTitle(string $title): string
    {
    }
    /**
     * Return the collected cookies as a single Cookie header value.
     *
     * @return string semicolon-separated cookie pairs
     */
    public function getCookies(): string
    {
    }
    /**
     * Return the account email associated with the extraction.
     *
     * @return string email address, or an empty string when not set
     */
    public function getEmail(): string
    {
    }
    /**
     * Return the filmstrip (thumbnail sprite) URL.
     *
     * @return string filmstrip URL, or an empty string when disabled by settings
     */
    public function getFilmstrip(): string
    {
    }
    /**
     * Return the poster image URL, honoring the force-default-poster setting.
     *
     * @return string poster image URL
     */
    public function getImage(): string
    {
    }
    /**
     * Return the network interface address used for the extraction.
     *
     * @return string interface hostname or IP address
     */
    public function getNetworkInterface(): string
    {
    }
    /**
     * Return the referer used for the extraction requests.
     *
     * @return string referer URL
     */
    public function getReferer(): string
    {
    }
    /**
     * @return array<int<0,max>,mixed>
     */
    public function getSources(): array
    {
    }
    /**
     * Return the extraction status.
     *
     * @return string Status flag (e.g. 'ok' or 'fail').
     */
    public function getStatus(): string
    {
    }
    /**
     * Return the sanitized media title.
     *
     * @return string sanitized title
     */
    public function getTitle(): string
    {
    }
    /**
     * @return array<int<0,max>,mixed>
     */
    public function getTracks(): array
    {
    }
    /**
     * Set whether the media can be downloaded.
     *
     * @param bool $isDownloadable download availability flag
     * @return self fluent instance
     */
    public function setDownloadable(bool $isDownloadable = false): self
    {
    }
    /**
     * Set the account email for the extraction.
     *
     * @param string $email email address
     * @return self fluent instance
     */
    public function setEmail(string $email = ''): self
    {
    }
    /**
     * Set the video host and configure its proxy when the host is eligible.
     *
     * @param string $host host identifier or fully-qualified extractor class name
     * @return self fluent instance
     */
    public function setHost(string $host = ''): self
    {
    }
}
namespace GDPlayer\Core\Extractor;

/**
 * Parsing respons Cloudflare dan DOM halaman sumber.
 *
 * Split out of `Extractor` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Extractor` through this trait.
 */
trait ParseTrait
{
    protected function getCFSources(): void
    {
    }
    protected function getDOMTitle(string $url = '', string $titleElm = 'title'): void
    {
    }
    protected function parseCFResponse(string $response): void
    {
    }
    protected function parseCFTracks(): void
    {
    }
    protected function processDOMTitle(?string $response, string $titleElm = 'title'): void
    {
    }
}
/**
 * Builds a single `Extractor` HTTP request: headers, referer, proxy, and cookie hooks.
 *
 * Split out of `Extractor` so that class only carries the extraction flow
 * (rule of <=20 methods per class). This trait is used only by `Extractor`; it reads the class
 * properties (host, referer, cookies, clientIp, networkInterface, proxy, usingProxy) as-is.
 */
trait RequestTrait
{
    /**
     * @return string[]
     */
    private function createBrowserBasedHeaders(): array
    {
    }
    /**
     * Fetcher for a single request to this host, using the same proxy order as before:
     * WARP (when this host qualifies) first, then the rotating proxy overrides it.
     *
     * @param string $method HTTP method ('' = no CUSTOMREQUEST, same as before)
     * @param string $body request body for non-GET methods
     * @param bool $followRedirects false when the caller needs to read `Location` itself
     * @param int $connectTimeout connection limit in seconds (0 = transport default)
     * @param int $timeout single-request limit in seconds (the multi path uses 15 s)
     */
    protected function createRequestFetcher(string $method = 'GET', string $body = '', bool $followRedirects = true, int $connectTimeout = 0, int $timeout = 60): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
    /**
     * @param string $url
     * @param string[] $customHeaders
     * @return string[]
     */
    protected function createRequestHeaders(string $url = '', array $customHeaders = []): array
    {
    }
    /**
     * @param string $headerLine raw header from upstream
     * @return int length of the processed header
     */
    protected function headerCallback(string $headerLine): int
    {
    }
    /**
     * @param string $url
     * @return string[]
     */
    // Protected, bukan private: satu-satunya pemanggil adalah RequestTrait
    // ($this->parseCustomHeaders). Intelephense (P1003) & Sonar (S1144) tidak menghitung
    // pemakaian di dalam trait sebagai pemakaian method kelas, jadi `private` akan
    // salah dilaporkan "declared but not used".
    protected function parseCustomHeaders(string $url = ''): array
    {
    }
    /**
     * Ready-to-use request headers for one call (including the active network interface).
     *
     * @param string[] $headers extra headers
     * @return string[] normalized header lines
     */
    protected function prepareRequestHeaders(string $url, array $headers = []): array
    {
    }
    /**
     * @return array{proxy: string, type: int, usrpwd: string}|null
     */
    protected function resolveProxy(): ?array
    {
    }
}
/**
 * Base class for the concrete per-host extractors.
 *
 * Provides the shared HTTP/headless-browser plumbing and the contract that each
 * hosting extractor implements to resolve playable sources.
 */
abstract class Extractor extends \GDPlayer\Helper\Core\CoreHelper
{
    use \GDPlayer\Core\Extractor\ParseTrait;
    use \GDPlayer\Core\Extractor\RequestTrait;
    protected const CLOSE = '"';
    protected string $baseURL = '';
    /** @var array<string,mixed> $cfCustomData */
    protected array $cfCustomData = [];
    protected string $cfSources = '';
    protected string $cfTracks = '';
    protected string $clientIp = '';
    /** @var array<string,mixed> $loggerDefaultContext */
    protected array $loggerDefaultContext = [];
    protected ?\Psr\Http\Message\ServerRequestInterface $request = null;
    protected bool $usingProxy = false;
    /**
     * @param string $id host-specific media identifier
     * @param \Psr\Http\Message\ServerRequestInterface|null $request PSR-7 request
     */
    public function __construct(string $id = '', ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    protected function createCustomReferer(): void
    {
    }
    /**
     * @param string $url
     * @param string[] $headers
     * @param null|callable $success
     * @param string $method
     * @return mixed
     */
    protected function curlRequest(string $url = '', array $headers = [], ?callable $success = null, string $method = 'GET'): mixed
    {
    }
    /**
     * Check every source at once: one HEAD request per source, run concurrently
     * through `Http\FetcherPool` (handles are created and closed by the pool, not here).
     *
     * @param array<array<string,mixed>> $sources
     * @param string[] $customHeaders
     * @return array<int|string, \GDPlayer\Http\Fetcher\FetchResult> results keyed by source index
     */
    protected function getMultiSources(array $sources, array $customHeaders = []): array
    {
    }
    /**
     * @param array<array<string,mixed>> $oldSources
     * @return array<array<string,mixed>>
     */
    protected function getNewSources(array $oldSources = []): array
    {
    }
    protected function getType(string $url = ''): string
    {
    }
    /**
     * @param array<string|int, array<string, mixed>> $tracks
     * @return void
     */
    protected function parseTracks(array $tracks = []): void
    {
    }
}
namespace GDPlayer\Core;

/**
 * Filmstrip (thumbnail sprite) and WebVTT preview generator.
 *
 * Builds and repairs the thumbnail track used for seek previews.
 */
final class Filmstrip
{
    /**
     * Resolve the working directory for generated thumbnails.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Generate a WebVTT preview track with custom thumbnail dimensions.
     *
     * @param string $url      filmstrip image URL
     * @param int    $width    thumbnail width in pixels
     * @param int    $height   thumbnail height in pixels
     * @param int    $duration media duration in seconds
     * @return string webVTT content
     */
    public function createCustomVttSizes(string $url = '', int $width = 0, int $height = 0, int $duration = 0): string
    {
    }
    /**
     * Build the WebVTT preview track from the loaded image details.
     *
     * @return string webVTT content (header-only when dimensions are invalid)
     */
    public function createVttContent(): string
    {
    }
    /**
     * Repair an existing WebVTT preview track (fix offsets/coordinates).
     *
     * @param string $url     filmstrip image URL
     * @param string $content existing WebVTT content
     * @return string repaired WebVTT content, or an empty string on failure
     */
    public function repairVttContent(string $url = '', string $content = ''): string
    {
    }
}
namespace GDPlayer\Core\Hosting;

/**
 * Parser array sources/tracks beserta metadata.
 *
 * Split out of `XVFSParser` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `XVFSParser` through this trait.
 */
trait ArrayTrait
{
    /**
     * @param array<string,mixed> $playerConfigArray
     * @return void
     */
    protected function parseArray(array $playerConfigArray = []): void
    {
    }
    /**
     * @param array<string,mixed> $playerConfigArray
     * @return void
     */
    protected function parseArrayMetadata(array $playerConfigArray): void
    {
    }
    /**
     * @param array<string,mixed> $playerConfigArray
     * @return void
     */
    protected function parseArraySources(array $playerConfigArray): void
    {
    }
    /**
     * @param array<string,mixed> $playerConfigArray
     * @return void
     */
    protected function parseArrayTracks(array $playerConfigArray): void
    {
    }
}
/**
 * Ekstraksi host dan id dari URL/query.
 *
 * Split out of `Hosting` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Hosting` through this trait.
 */
trait ExtractTrait
{
    protected function extractHost(): void
    {
    }
    protected function extractID(): void
    {
    }
    protected function extractPathId(string $path = '', string $query = ''): void
    {
    }
    protected function extractQueryId(string $query = ''): bool
    {
    }
}
/**
 * Video-host URL resolver.
 *
 * Normalizes a host/URL into a host identifier and media id, resolving
 * custom hostnames before extraction.
 */
final class Hosting
{
    use \GDPlayer\Core\Hosting\ExtractTrait;
    /**
     * @param string $url optional media URL to resolve immediately
     */
    public function __construct(string $url = '')
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Build a provider-specific direct download link for the resolved host.
     *
     * @return string download URL, or an empty string when unsupported
     */
    public function getDownloadLink(): string
    {
    }
    /**
     * Return the resolved host identifier.
     *
     * @return string host identifier
     */
    public function getHost(): string
    {
    }
    /**
     * Return the resolved media id, sanitizing it for the direct host.
     *
     * @return string media id
     */
    public function getID(): string
    {
    }
    /**
     * Set the host identifier.
     *
     * @param string $host host identifier
     * @return self fluent instance
     */
    public function setHost(string $host = ''): self
    {
    }
    /**
     * Set the media id.
     *
     * @param string $id media id
     * @return self fluent instance
     */
    public function setID(string $id = ''): self
    {
    }
    /**
     * Resolve a media URL into its host and id.
     *
     * @param string $url media URL to parse
     * @return self fluent instance
     */
    public function setURL(string $url = ''): self
    {
    }
}
/**
 * Parser konfigurasi per provider (jwplayer, earnvids, js, mixdrop, mp4upload).
 *
 * Split out of `XVFSParser` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `XVFSParser` through this trait.
 */
trait ProviderTrait
{
    protected function defaultJwplayerParser(string $response, string $jwpStart = 'jwplayer("vplayer").setup(', string $jwpEnd = ');'): void
    {
    }
    protected function earnvidsParser(string $response): void
    {
    }
    protected function jsConfigParser(string $script = '', string $searchStart = '', string $searchEnd = ''): void
    {
    }
    protected function mixdropParser(string $response): void
    {
    }
    protected function mp4uploadParser(string $script = ''): void
    {
    }
}
/**
 * Base parser for XVFS-style hosts that embed sources in page markup.
 *
 * Extracts playable sources from embed pages and caches empty-source hosts to
 * avoid repeated requests.
 */
abstract class XVFSParser extends \GDPlayer\Core\Extractor\Extractor
{
    use \GDPlayer\Core\Hosting\ArrayTrait;
    use \GDPlayer\Core\Hosting\ProviderTrait;
    protected const EVAL = 'eval(function(p,a,c,k,e,d)';
    protected const MSG_JSCONVERTER_FAILED = 'Failed to parse JS config into array';
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    protected function parseCFSources(): void
    {
    }
    protected function parseEmbedSources(?string $response): void
    {
    }
    protected function parseSources(string $script = ''): void
    {
    }
    protected function unpackEvalContent(string $response): string
    {
    }
}
/**
 * Base parser for YetiShare-based file hosts.
 *
 * Resolves embed sources from the host's URL template.
 */
abstract class YetiShare extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    protected function getEmbedSources(): void
    {
    }
    protected function parseDownloadHTML(string $fileID, string $html): void
    {
    }
    protected function parseSources(string $fileID): void
    {
    }
}
/**
 * Bridge that resolves sources through the yt-dlp based Ytdlp host.
 */
final class YtdlpBridge extends \GDPlayer\Helper\Core\CoreHelper
{
    /**
     * @param string $url media URL to resolve through yt-dlp
     */
    public function __construct(string $url = '')
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
}
namespace GDPlayer\Core\Parser;

/**
 * Bootstrap video: validasi input dan penyiapan awal.
 *
 * Split out of `Parser` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Parser` through this trait.
 */
trait BootstrapTrait
{
    /**
     * @return null|array<string,mixed>
     */
    protected function bootstrapVideo(): ?array
    {
    }
    /**
     * @return null|array<string,mixed>
     */
    protected function bootstrapWithValidation(): ?array
    {
    }
}
/**
 * Penyusunan respons dan hasil parsing.
 *
 * Split out of `Parser` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Parser` through this trait.
 */
trait ResponseTrait
{
    /**
     * @param string $status
     * @param string $message
     * @return array{
     *     query:array<string,mixed>,
     *     status:string,
     *     message:string,
     *     embed_url?:string,
     *     download_url?:string,
     *     title?:string,
     *     poster?:string,
     *     filmstrip?:string,
     *     sources?:array<mixed>,
     *     tracks?:array<mixed>
     * }
     */
    protected function createResponse(string $status = 'fail', string $message = ''): array
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getResult(): array
    {
    }
}
/**
 * Penyimpanan video, subtitle, dan status.
 *
 * Split out of `Parser` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Parser` through this trait.
 */
trait SaveTrait
{
    /**
     * @param string $qryHost
     * @param string $qryId
     * @return array<string,mixed>
     */
    protected function extractQuery(string $qryHost = 'host', string $qryId = 'id'): array
    {
    }
    protected function saveNewVideo(): void
    {
    }
    /**
     * @param mixed $videoId
     * @return array<mixed>
     */
    protected function saveVideoSubtitles(mixed $videoId): array
    {
    }
    /**
     * @param string $status
     * @param array<string,mixed> $criteria
     */
    protected function updateVideoStatus(string $status = 'ok', array $criteria = []): void
    {
    }
}
/**
 * Query parser that resolves a request into video metadata and sources.
 *
 * Validates host/id, applies disabled-host rules and returns the normalized
 * result consumed by the API and player.
 */
final class Parser
{
    use \GDPlayer\Core\Parser\BootstrapTrait;
    use \GDPlayer\Core\Parser\ResponseTrait;
    use \GDPlayer\Core\Parser\SaveTrait;
    /**
     * @param array<string,mixed>|array<int|string,array<mixed>|string> $queryParams
     * @param \Psr\Http\Message\ServerRequestInterface|null $request PSR-7 request
     * @return void
     */
    public function __construct(array $queryParams = [], ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
}
/**
 * Request-scoped helpers extracted from {@see Parser} (Sonar php:S1200).
 *
 * Token building, public user id resolution and the `?subs=` subtitle JSON loader do not need
 * the parser state, so they live here instead of widening the Parser dependency graph.
 */
final class ParserContext
{
    /**
     * Store the alternative video row (`aid`/`ahost` query params) for the current video.
     *
     * @param array<int|string,mixed> $queryParams query string
     * @param \GDPlayer\Core\Hosting\Hosting $hosting host resolver used to split the alternative URL
     * @param int $videoId row id of the video the alternative belongs to
     */
    public static function altVideo(array $queryParams, \GDPlayer\Core\Hosting\Hosting $hosting, int $videoId = 0): void
    {
    }
    /**
     * Build the `gt=` token appended to the embed/download URL.
     *
     * @param array<string,mixed> $appConfig settings row (disable_validation)
     * @param array<int|string,mixed> $queryParams query string
     * @param \GDPlayer\Core\Security\Security $security security service used to encrypt the client IP
     * @return string token ('gt=...') or '' when validation is disabled
     */
    public static function clientToken(array $appConfig, ?\Psr\Http\Message\ServerRequestInterface $request, array $queryParams, \GDPlayer\Core\Security\Security $security): string
    {
    }
    /**
     * Append the tracks of the `?subs=` subtitle JSON (cached 1 hour, SSRF guarded).
     *
     * @param mixed $subs raw `subs` query param
     * @param array<int|string,mixed> $tracks tracks collected so far
     * @return array<int|string,mixed> merged tracks
     */
    public static function jsonTracks(mixed $subs, array $tracks): array
    {
    }
    /**
     * Resolve the public user id: `uid` query param (Sqids) or the active public session.
     *
     * @param mixed $uid raw `uid` query param
     * @return int user id, 0 when unknown
     */
    public static function publicUserId(mixed $uid): int
    {
    }
}
/**
 * Collaborators of {@see Parser} (Sonar php:S1820).
 *
 * Created once per parser instance and never replaced, so the semantics are identical to the
 * individual service/model properties it replaces.
 */
final class ParserServices
{
    public readonly \GDPlayer\Config\Config $config;
    public readonly \GDPlayer\Core\Hosting\Hosting $hosting;
    public readonly \GDPlayer\Core\Security\Security $security;
    public readonly \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    public readonly \GDPlayer\Model\VideoHash $videoHashModel;
    public readonly \GDPlayer\Model\Video $videoModel;
    /**
     * Create the collaborator set the parser uses for one request.
     */
    public function __construct()
    {
    }
}
/**
 * Subtitle track collection for {@see Parser} (Sonar php:S1200).
 *
 * Keeps the two subtitle models out of the Parser dependency graph: every method takes and
 * returns plain track arrays, so nothing beyond the rows leaks back into the parser state.
 */
final class ParserSubtitles
{
    /**
     * Tracks requested through `?sub=`/`?lang=` (subtitle manager ids or direct URLs).
     *
     * @param array<int|string,mixed> $queryParams query string
     * @return list<array{file:string,label:mixed}>
     */
    public static function fromQuery(array $queryParams): array
    {
    }
    /**
     * Subtitle rows stored for a video; legacy links get decoded and written back once.
     *
     * @param int $videoId video row id
     * @return list<array{file:mixed,label:mixed}>
     */
    public static function fromVideo(int $videoId): array
    {
    }
    /**
     * Persist the collected input tracks that are not stored yet.
     *
     * @param mixed $videoId video row id (only positive ints are stored)
     * @param array<mixed> $inputTracks tracks collected from the query string
     * @param int $userID owner of the new rows
     * @return array<mixed> tracks that were inserted
     */
    public static function save(mixed $videoId, array $inputTracks, int $userID): array
    {
    }
}
namespace GDPlayer\Core\Player;

/**
 * Konfigurasi halaman download player.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait DownloadConfigTrait
{
    /**
     * Build the client-side configuration for the download page player.
     *
     * @return string JSON player configuration
     */
    public function getDownloadPageConfig(): string
    {
    }
}
/**
 * Render halaman download player.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait DownloadPageTrait
{
    /**
     * Render the download page HTML for the current video.
     *
     * @return string rendered page HTML
     */
    public function getDownloadPage(): string
    {
    }
}
/**
 * Konfigurasi halaman embed player.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait EmbedConfigTrait
{
    /**
     * Build the client-side configuration for the embed page player.
     *
     * @return string JSON player configuration
     */
    public function getEmbedPageConfig(): string
    {
    }
}
/**
 * Render halaman embed player.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait EmbedPageTrait
{
    /**
     * Render the embed page HTML for the current video.
     *
     * @return string rendered page HTML
     */
    public function getEmbedPage(): string
    {
    }
}
/**
 * Data publik player: config, query publik, validasi.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait PublicTrait
{
    /**
     * @param array<string,mixed> $options
     * @return string
     */
    protected function createPlayerConfig(array $options): string
    {
    }
    protected function validation(): void
    {
    }
    /**
     * @param array<string,mixed> $queries
     * @return self
     */
    public function setPublicQueries(array $queries = []): self
    {
    }
}
/**
 * Server aktif, host id, alternatif, dan info video.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait ServerTrait
{
    protected function getActiveServer(): void
    {
    }
    protected function getHostID(string $idKey = 'id', string $hostKey = 'host'): void
    {
    }
    protected function getVideoAlternatives(): void
    {
    }
    protected function getVideoInfo(): void
    {
    }
}
/**
 * Parsing slug path/query dan query API.
 *
 * Split out of `Player` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Player` through this trait.
 */
trait SlugTrait
{
    /**
     * Slug from a path segment: record the raw slug, then resolve through parseSlug or a DB lookup.
     */
    protected function applyPathSlug(string $pageUri): void
    {
    }
    /**
     * Slug from the query string (no path segment): the first key is used as the slug.
     */
    protected function applyQueryStringSlug(): void
    {
    }
    protected function createApiQuery(): void
    {
    }
    protected function parseSlug(string $slug): void
    {
    }
    protected function replaceSupportedSitesName(): void
    {
    }
}
/**
 * Embed and download page renderer.
 *
 * Resolves the request slug into video/server data and builds the embed page,
 * download page and their client-side player configuration payloads.
 */
final class Player
{
    use \GDPlayer\Core\Player\DownloadConfigTrait;
    use \GDPlayer\Core\Player\DownloadPageTrait;
    use \GDPlayer\Core\Player\EmbedConfigTrait;
    use \GDPlayer\Core\Player\EmbedPageTrait;
    use \GDPlayer\Core\Player\PublicTrait;
    use \GDPlayer\Core\Player\ServerTrait;
    use \GDPlayer\Core\Player\SlugTrait;
    /**
     * @param string $clientIp   client IP address
     * @param string $referer    request referer
     * @param bool   $isDownload whether the download page is requested
     */
    public function __construct(private string $clientIp = '', protected string $referer = '', protected bool $isDownload = false, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
}
/**
 * Behaviour toggles of {@see Player} (Sonar php:S1820).
 *
 * Mutable value object filled from the settings row; semantics match the old properties.
 */
final class PlayerOptions
{
    public int $autoplay = 0;
    public bool $blockADB = false;
    public bool $enableP2P = false;
    public int $mute = 0;
    public string $preload = 'none';
    public bool $productionMode = false;
    public int $repeat = 0;
    public int $selectedServer = -1;
}
/**
 * Collaborators of {@see Player} (Sonar php:S1820).
 *
 * Created once per page render; semantics are identical to the individual service/model
 * properties it replaces.
 */
final class PlayerServices
{
    public readonly \GDPlayer\Config\Config $config;
    public readonly \GDPlayer\Core\Hosting\Hosting $hosting;
    public readonly \Detection\MobileDetect $mobileDetector;
    public readonly \GDPlayer\Core\Security\Security $security;
    public readonly \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    public readonly \GDPlayer\Model\Video $videoModel;
    /**
     * Build the service set for one page render.
     *
     * @param \Psr\Http\Message\ServerRequestInterface|null $request request whose UA seeds the mobile detector
     */
    public function __construct(?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
}
/**
 * Resolved request/video state of {@see Player} (Sonar php:S1820).
 *
 * Mutable value object: the page renderer fills it while resolving the slug.
 */
final class PlayerState
{
    /** @var array<string,mixed> $apiQuery */
    public array $apiQuery = [];
    public string $apiQueryString = '';
    public string $apiURL = '';
    public string $currentURL = '';
    public string $downloadURL = '';
    public string $embedURL = '';
    public string $extra = '';
    public bool $isMobile = false;
    public bool $isSafariIE = false;
    public string $messageText = '';
    public string $qryDefaultAlt = 'alt=-1';
    public string $questionOrAmpersand = '&';
    public string $token = '';
    public string $videoPoster = '';
    public string $videoSlug = '';
    public string $videoTitle = '';
}
/**
 * Player theme/rendering options of {@see Player} (Sonar php:S1820).
 *
 * Mutable value object: the constructor fills it from the settings row before rendering.
 */
final class PlayerTheme
{
    /** @var array<string,mixed> $defaultContext */
    public array $defaultContext = [];
    /** Skin/colour palette. */
    public string $pColor = '673ab7';
    public string $pColor2 = '';
    public string $pColorRGB = '103, 58, 183';
    public string $pSkin = 'default';
    /** Player engine name (jwplayer, plyr, ...). */
    public string $player = 'jwplayer';
    /** @var array<mixed> $templates */
    public array $templates = [];
}
namespace GDPlayer\Core\Security;

/**
 * Shared cryptographic helpers for the Security service (key/IV derivation).
 */
trait SecurityTrait
{
    /**
     * Transport settings for authentication API calls.
     *
     * This trait used to configure cURL handles (`getCurlConfig()`); the same policy is now
     * declared once here as `Http\Fetcher` settings — HTTP/1.1, connect 60 s,
     * timeout 300 s, max 10 redirects, no SSL verification (same as before).
     *
     * @return \GDPlayer\Http\Fetcher\Fetcher ready to use
     */
    private function createAuthFetcher(): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
}
/**
 * Licensing/signature core of Security: server capability check, token validation, plugin licence.
 *
 * Deliberately split from `Security` (see src/Core/Security.php) so this base file
 * can be distributed encrypted (ionCube) without also locking the crypto/HMAC API
 * used by themes & plugins.
 */
abstract class SecurityBase
{
    use \GDPlayer\Core\Security\SecurityTrait;
    protected string $hostname = '';
    protected string $kirimKode = 'license=%s&hostname=%s&ver=%s';
    protected string $kunciPublik = '';
    protected string $otentikasiURL = 'https://auth.gdplayer.to';
    /**
     * @param null|\Redis  $redis      optional Redis instance for shared state
     * @param null|string $licenseKey optional license key override
     */
    public function __construct(private ?\Redis $redis = null, private ?string $licenseKey = null)
    {
    }
    /**
     * Helper function to isolate cURL code duplication and encryption.
     *
     * @param string $pluginName
     * @return string
     */
    protected function ambilValidasiDariApi(string $pluginName): string
    {
    }
    /**
     * Decrypt text produced by {@see Security::encrypt()}; provided by the concrete class.
     *
     * @param string $encryptedText encrypted text (base64)
     * @return string plaintext, empty string on failure
     */
    abstract protected function decrypt(string $encryptedText = ''): string;
    /**
     * Open a URL produced by {@see Security::encryptURL()}.
     *
     * @param null|string $url encrypted URL
     * @return string original URL, empty string on failure
     */
    abstract protected function decryptURL(?string $url): string;
    /**
     * Encrypt plaintext (AES-256-CBC); provided by the concrete class.
     *
     * @param string $plainText plaintext
     * @return string encrypted text (base64)
     */
    abstract protected function encrypt(string $plainText = ''): string;
    /**
     * Encrypt a URL (URL-safe base64); provided by the concrete class.
     *
     * @param null|string $url original URL
     * @return string encrypted URL
     */
    abstract protected function encryptURL(?string $url): string;
    /**
     * Read the plugin token from cache (encrypted form), '' when absent.
     *
     * @param string $cacheKey
     * @return string signed token, or '' when empty/unreadable
     */
    protected function getPluginCacheData(string $cacheKey): string
    {
    }
    /**
     * This application version is still served by the server.
     *
     * @return bool true when the app version >= VERSI_MINIMUM
     */
    protected function isVersionAllowed(): bool
    {
    }
    /**
     * Populate the server signing public key, read once per instance.
     * Without this key no token can be trusted (fail-closed).
     *
     * @return string public key file contents, or '' when unreadable
     */
    protected function kunciUmum(): string
    {
    }
    /**
     * Verify the signature (RSA-SHA256) on a token from the server.
     *
     * Token: `v1.<base64url payload>.<base64url signature>` (no padding). The JSON payload
     * is used as-is as the signed data, so the signature cannot be moved to other content.
     * Payload contents: `h` hostname, `l` license, `e` expiry (unix), `v` app version, `s` scope.
     *
     * @param string $token   raw token from the server
     * @param string $cakupan 'core' | 'swoole' | 'roadrunner'
     * @return array<string, mixed> payload contents when the signature is valid, empty array otherwise
     */
    protected function periksaCap(string $token, string $cakupan = 'core'): array
    {
    }
    /**
     * Restore the base64url padding stripped by the sender.
     *
     * @param string $isi base64url chunk without padding
     * @return null|string original bytes, or null when invalid
     */
    protected function pulihkanB64(string $isi): ?string
    {
    }
    /**
     * Store the plugin token in cache.
     *
     * @param string $cacheKey
     * @param string $token      signed token from the server
     * @param int    $kedaluwarsa unix timestamp from the token payload
     * @return void
     */
    protected function savePluginCacheData(string $cacheKey, string $token, int $kedaluwarsa): void
    {
    }
    /**
     * Store the signed token in cache (encrypted form, as before).
     *
     * @param null|\GDPlayer\Service\Cache\CacheItem $cache
     * @param string                          $token
     * @param int                             $kedaluwarsa unix timestamp from the payload
     * @return void
     */
    protected function simpanToken(?\GDPlayer\Service\Cache\CacheItem $cache, string $token, int $kedaluwarsa): void
    {
    }
    /**
     * Fetch the plugin token from the authentication server (request payload encrypted with the public key).
     *
     * @param string $pluginName
     * @return string signed token, or '' when the server does not serve it
     */
    protected function tokenPlugin(string $pluginName): string
    {
    }
    /**
     * Request a signed token from the authentication server and store it when the signature is valid.
     *
     * The cache now holds only tokens genuinely signed by the server, so writing a cache
     * entry yourself (or calling this method with a forged key) is no longer
     * enough to pass the gate: without a private-key signature the token counts as empty.
     *
     * @param null|\GDPlayer\Service\Cache\CacheItem $cache
     * @return array<string,mixed> payload contents when the signature is valid, empty array otherwise
     */
    protected function validasiLisensi(?\GDPlayer\Service\Cache\CacheItem $cache): array
    {
    }
    /**
     * After the key is stored through the admin form: request a token from the server and store it when valid.
     *
     * This method used to write its own cache entry (bypass door: one call was enough
     * to mark an instance as licensed). Now the only token source is the server
     * signature, so a forged key yields no entry at all.
     *
     * @return bool true when a valid server token was stored successfully
     */
    public function hasSavedLicenseStatus(): bool
    {
    }
    /**
     * Validate the running environment/instance against the license server.
     *
     * The result is cached to avoid repeated remote checks.
     *
     * @return bool true when the environment is authorized
     */
    public function isLicenseValid(): bool
    {
    }
    /**
     * Validate a licensed plugin (e.g. swoole, roadrunner) against the license server.
     *
     * The response is cached until its expiry.
     *
     * @param string $pluginName plugin identifier to validate
     * @return bool true when the plugin is licensed
     */
    public function isPluginValid(string $pluginName = 'swoole'): bool
    {
    }
}
/**
 * Encryption, URL tokenization and HMAC request-signature service.
 *
 * Derives per-request keys from the HMAC headers and provides symmetric
 * encrypt/decrypt helpers used for API payloads and stream tokens.
 * Inti lisensi/tanda-tangan ada di basis abstaknya ({@see SecurityBase}).
 */
final class Security extends \GDPlayer\Core\Security\SecurityBase
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Decrypt a value produced by encrypt().
     *
     * @param string $encryptedText encrypted, base64-encoded string
     * @return string decrypted plaintext, or an empty string on failure
     */
    public function decrypt(string $encryptedText = ''): string
    {
    }
    /**
     * Decrypt a URL-safe token produced by encryptURL().
     *
     * @param null|string $url URL-safe encrypted token
     * @return string decrypted plaintext, or an empty string when invalid
     */
    public function decryptURL(?string $url): string
    {
    }
    /**
     * Derive an encryption key from timestamp and nonce using PBKDF2.
     * Both PHP and JS must use the same derivation to produce matching keys.
     *
     * @param string $timestamp
     * @param string $nonce
     * @return string Raw binary key (48 bytes: 32 key + 16 IV)
     */
    public function deriveRequestKey(string $timestamp, string $nonce): string
    {
    }
    /**
     * Encrypt a plaintext value using the derived key and IV.
     *
     * @param string $plainText text to encrypt
     * @return string base64-encoded ciphertext
     */
    public function encrypt(string $plainText = ''): string
    {
    }
    /**
     * Encrypt the stored API salt into a URL-safe token.
     *
     * @return string URL-safe encrypted salt
     */
    public function encryptApiSalt(): string
    {
    }
    /**
     * Encrypt a value and encode it as a URL-safe token.
     *
     * @param null|string $url plaintext to encrypt
     * @return string URL-safe token ('+', '/', '=' mapped to '-', '_', ',')
     */
    public function encryptURL(?string $url): string
    {
    }
    /**
     * Encrypt plaintext using a derived request key.
     * Output format: base64(salt[16] + ciphertext) — compatible with CryptoJS PBKDF2 decrypt.
     *
     * @param string $plainText
     * @param string $timestamp
     * @param string $nonce
     * @return string
     */
    public function encryptWithDerivedKey(string $plainText, string $timestamp, string $nonce): string
    {
    }
    /**
     * Generate HMAC parameters for embedding in page.
     * Produces timestamp, nonce, and HMAC signature for API request signing.
     *
     * @return array{ts: string, nc: string, sg: string}
     */
    public function generateHmacParams(): array
    {
    }
    /**
     * Get the HMAC derivation key (public key for JS embedding).
     *
     * @return string
     */
    public function getHmacDerivationKey(): string
    {
    }
    /**
     * Check whether an encrypted token decrypts to the stored API salt.
     *
     * @param string $securityKey URL-safe encrypted salt to compare
     * @return bool true when the token matches the API salt
     */
    public function isApiSaltValid(string $securityKey = ''): bool
    {
    }
    /**
     * Verify HMAC signature from API request headers.
     * Checks both signature validity and timestamp expiry.
     *
     * @param string $timestamp
     * @param string $nonce
     * @param string $signature
     * @return bool
     */
    public function isHmacValid(string $timestamp, string $nonce, string $signature): bool
    {
    }
}
namespace GDPlayer\Database;

/**
 * Singleton PDO connection manager for the master and replica databases.
 *
 * Reuses one shared connection per process and supports reconnecting.
 */
final class Conn
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @return array{0:\PDO|null,1:\PDO|null} [$pdoWrite, $pdoRead]
     */
    public function connect(): array
    {
    }
    /**
     * @param array<string,string|int> $dbConfig
     * @return null|\PDO
     */
    public function createConnection(array $dbConfig): ?\PDO
    {
    }
    /**
     * Return the shared connection manager instance.
     *
     * @return self singleton instance
     */
    public static function getInstance(): self
    {
    }
    /**
     * Drop the cached PDO handles so the next connect() rebuilds them.
     *
     * @return void
     */
    public function resetConnection(): void
    {
    }
    /**
     * Roll back a transaction left open by the previous request.
     *
     * Safe on a connection that was never opened: no connection is created here.
     */
    public static function rollBackIfActive(): void
    {
    }
    /**
     * Let the runtime provide its own PDO handles (pool/coroutine-safe client).
     *
     * Passing null restores the default per-process singleton.
     */
    public static function setProvider(?\GDPlayer\Database\ConnectionProviderInterface $provider): void
    {
    }
}
/**
 * Source of PDO handles for a runtime that manages its own connections/pool.
 *
 * PHP-FPM keeps the default {@see Conn} singleton. A long-running worker (Swoole coroutine mode)
 * injects its pool here so core code never has to know which runtime it runs on.
 */
interface ConnectionProviderInterface
{
    public function pdoRead(): ?\PDO;
    public function pdoWrite(): ?\PDO;
    /**
     * Drop/release the handles held by the provider (end of request or reconnect).
     */
    public function reset(): void;
}
/**
 * Query pembersihan dan pemutakhiran data lama.
 *
 * Split out of `MigrationQueries` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrationQueries` through this trait.
 */
trait MigrationDataQueryTrait
{
    /**
     * @return string[]
     */
    public static function getDeleteUnwantedDataQueries(): array
    {
    }
    /**
     * @return string[]
     */
    public static function getMigrateDataMaxmindQueries(): array
    {
    }
    /**
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $migrationsMap
     * @return string[]
     */
    public static function getModifiedFieldQueries(array $migrationsMap): array
    {
    }
    /**
     * @return string[]
     */
    public static function getUpdateOldDataQueries(): array
    {
    }
}
/**
 * Query view database saat migrasi.
 *
 * Split out of `MigrationQueries` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrationQueries` through this trait.
 */
trait MigrationViewQueryTrait
{
    /**
     * @return string[]
     */
    public static function getCreateViewsQueries(): array
    {
    }
    /**
     * @return string[]
     */
    public static function getDropViewsQueries(): array
    {
    }
}
/**
 * Builds the ALTER/CREATE SQL fragments used by the database migrations.
 */
final class MigrationQueries
{
    use \GDPlayer\Database\MigrationDataQueryTrait;
    use \GDPlayer\Database\MigrationViewQueryTrait;
    /**
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $migrationsMap
     * @return string[]
     */
    public static function getAddForeignKeysTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $migrationsMap
     * @return string[]
     */
    public static function getAddIndexesTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * @return string[]
     */
    public static function getDropEventsQueries(): array
    {
    }
    /**
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $migrationsMap
     * @return string[]
     */
    public static function getDropForeignKeysTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $migrationsMap
     * @return string[]
     */
    public static function getDropIndexesTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * @return string[]
     */
    public static function getDropProceduresQueries(): array
    {
    }
    /**
     * @return string[]
     */
    public static function getDropTablesQueries(): array
    {
    }
    /**
     * @param array<string, \GDPlayer\Database\MySQL\Migrate> $migrationsMap
     * @return string[]
     */
    public static function getModifyTablesQueries(array $migrationsMap): array
    {
    }
}
/**
 * Creates migration query objects bound to the write connection.
 */
final class MigrationQueriesCreator
{
    /**
     * @param \PDO $pdoWrite write connection used to execute migrations
     */
    public function __construct(\PDO $pdoWrite)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Generate the complete list of migration queries.
     *
     * @return string[]
     */
    public function create(): array
    {
    }
}
/**
 * Diagnostik query dan pengolahan nilai baris.
 *
 * Split out of `ModelHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ModelHelper` through this trait.
 */
trait ModelDiagnosticTrait
{
    /**
     * @param string $qry
     * @param null|mixed[] $params
     * @return void
     */
    protected function explainQuery(string $qry, ?array $params = null): void
    {
    }
    /**
     * PDO data processing function to the master database for insert, update, delete
     * mixed[] formatted value for default insert operation,
     * array<string,mixed> formatted value for custom operation according to the placeholder used
     * default insert operation yields string|false, string value obtained from lastInsertId()
     *
     * @param string $qry
     * @param null|array<string,mixed>|mixed[] $params null value can be used if there are no parameters,
     * @param bool $insertMode set to true to get the latest id from lastInsertId() during the insert process
     * @return string|bool result of type boolean(true|false) for update and delete operations,
     */
    protected function writeProcessor(string $qry, ?array $params = null, bool $insertMode = false): string|bool
    {
    }
    /**
     * Return a generic, user-safe description of the last database error.
     *
     * @return string fixed message; the detailed error is written to the server log
     */
    public function getLastError(): string
    {
    }
}
/**
 * Query mentah dan validasi placeholder.
 *
 * Split out of `ModelHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ModelHelper` through this trait.
 */
trait ModelQueryTrait
{
    /**
     * @param string $sql
     * @param null|array<mixed> $params
     * @return bool
     */
    public function hasValidPlaceholders(string $sql, ?array $params): bool
    {
    }
    /**
     * To maintain data integrity, make sure you call the method with the appropriate model,
     * for example (new VideoModel())->rawQuery("DELETE FROM `tb_videos` WHERE `id` IN (?,?);", [1, 2]);
     * You must call the closeCursor() function after executing this function if the result is a PDOStatement
     *
     * @param string $qry
     * @param null|array<mixed> $params positional and named placeholders supported
     * @return \PDOStatement|false
     */
    public function rawQuery(string $qry, ?array $params = null): \PDOStatement|false
    {
    }
    /**
     * To maintain data integrity, make sure you call the method with the appropriate model,
     * for example (new VideoModel())->rawQuery(
     * "SELECT a.* FROM `tb_videos` v LEFT JOIN `tb_videos_alternatives` a ON a.`vid` = v.`id` WHERE v.`id` = ?;",
     * [1]);
     * You must call the closeCursor() function after executing this function if the result is a PDOStatement
     *
     * @param string $qry
     * @param null|array<mixed> $params positional and named placeholders supported
     * @return \PDOStatement|false
     */
    public function rawSelect(string $qry, ?array $params = null): \PDOStatement|false
    {
    }
}
/**
 * Shared query-builder, caching and connection base for all database models.
 *
 * Provides criteria building, cached reads/writes and connection recovery
 * used by the concrete Model implementation.
 */
abstract class ModelHelper
{
    use \GDPlayer\Database\ModelDiagnosticTrait;
    use \GDPlayer\Database\ModelQueryTrait;
    protected const MSG_CONNECTION_ERROR = 'Database connection unavailable';
    protected const MSG_EMPTY = 'SQL query is empty';
    protected const MSG_EXECUTION_FAILED = 'Execution failed';
    protected const MSG_INVALID = 'Invalid SQL placeholders or $params';
    /**
     * @var list<array{
     *     column:string,
     *     value:null|string|int,
     *     comparison:string|null,
     *     logical:string|null
     * }> $criteriaParams
     */
    protected array $criteriaParams = [];
    protected string $errorMsg = '';
    /** @var mixed[] $executeParams */
    protected array $executeParams = [];
    protected string $findAllCacheTag = 'findAll_';
    protected string $findByCacheTag = 'findBy_';
    protected string $findByMultipleCacheTag = 'findByMultiple_';
    protected string $getNumRowsCacheTag = 'getNumRows_';
    protected string $getTotalRowsCacheTag = 'getTotalRows_';
    protected int $maxAttempts = 3;
    protected ?\PDO $pdoRead;
    protected ?\PDO $pdoWrite;
    protected string $qryGroupBy = '';
    protected string $qryLimit = '';
    protected string $qryOrderBy = '';
    protected string $qryWhere = '';
    protected string $table = '';
    /**
     * Acquire the shared PDO connections and build the per-table cache tags.
     */
    public function __construct()
    {
    }
    /**
     * Release the PDO handles held by this model.
     */
    public function __destruct()
    {
    }
    protected function clearCache(): int
    {
    }
    /**
     * @param string $qry
     * @param mixed[] $values
     * @return string
     */
    protected function createCacheHash(string $qry = '', array $values = []): string
    {
    }
    /**
     * Get dynamic cache timeout honoring minimum and table-specific timeout settings
     *
     * @return int
     */
    protected function getCacheTimeout(): int
    {
    }
    /**
     * Build versioned cache key incorporating table and operation tag versions
     *
     * @param string $prefix
     * @param string $hash
     * @param null|string $opTag
     * @return string
     */
    protected function getVersionedCacheKey(string $prefix, string $hash, ?string $opTag = null): string
    {
    }
    protected function onConnect(bool $writeable = true): ?\PDO
    {
    }
    protected function resetValues(): self
    {
    }
}
namespace GDPlayer\Database\MySQL;

/**
 * Shared connection and cache-tag plumbing for the migration classes.
 */
abstract class MigrateHelper
{
    /** @var array<string,array<string,mixed>> $columns */
    protected array $columns = [];
    protected \PDO $pdoWrite;
    protected string $table;
    /**
     * @param \PDO $pdoWrite write connection used to execute migrations
     */
    public function __construct(\PDO $pdoWrite)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param string $columnName
     * @param array<string,mixed> $columnConfig
     * @return string
     */
    protected function buildColumnSQL(string $columnName, array $columnConfig): string
    {
    }
    /**
     * @param mixed $indexFields
     * @param string $indexName
     * @param string $type
     * @param bool $typeValue
     * @return array<string,mixed>
     */
    protected function createIndex(mixed $indexFields, string $indexName, string $type = 'unique', bool $typeValue = false): array
    {
    }
    /**
     * @return array<string,array<string,mixed>>
     */
    protected function getColumns(): array
    {
    }
    protected function tableCollation(): mixed
    {
    }
    protected function tableExists(): bool
    {
    }
    /**
     * @return string[]
     */
    public function getDropForeignKeysQueries(): array
    {
    }
    /**
     * @return string[]
     */
    public function getDropIndexesQueries(): array
    {
    }
    /**
     * Return the current table name.
     *
     * @return string table name
     */
    public function getTable(): string
    {
    }
}
/**
 * Column type builder and addColumn helper for the Migrate schema builder.
 */
trait MigrateColumnTypes
{
    /** @var string[] $numericTypes Numeric column types (always UNSIGNED). */
    protected array $numericTypes = ['INT', 'TINYINT', 'BIGINT', 'SMALLINT', 'MEDIUMINT'];
    /** @var string[] $textTypes Text column types (given the utf8mb4_unicode_ci collation). */
    protected array $textTypes = ['CHAR', 'VARCHAR', 'TEXT', 'MEDIUMTEXT', 'LONGTEXT'];
    private function addColumn(string $name, string $type, ?int $length, bool $allowNull = false, ?string $default = null): self
    {
    }
    /**
     * Add a BIGINT column.
     *
     * @param string      $name    column name
     * @param null|string $default default value (null = nullable)
     * @return self fluent instance
     */
    public function addBigInt(string $name, ?string $default = ''): self
    {
    }
    /**
     * Add a CHAR column.
     *
     * @param string      $name    column name
     * @param int         $length  column length
     * @param null|string $default default value (null = nullable)
     * @return self fluent instance
     */
    public function addChar(string $name, int $length = 3, ?string $default = ''): self
    {
    }
    /**
     * Add an INT column.
     *
     * @param string      $name    column name
     * @param null|string $default default value (null = nullable)
     * @return self fluent instance
     */
    public function addInt(string $name, ?string $default = ''): self
    {
    }
    /**
     * Add a LONGTEXT column.
     *
     * @param string $name column name
     * @return self fluent instance
     */
    public function addLongText(string $name): self
    {
    }
    /**
     * Add a MEDIUMTEXT column.
     *
     * @param string $name column name
     * @return self fluent instance
     */
    public function addMediumText(string $name): self
    {
    }
    /**
     * Add a TEXT column.
     *
     * @param string $name column name
     * @return self fluent instance
     */
    public function addText(string $name): self
    {
    }
    /**
     * Add a TINYINT column.
     *
     * @param string      $name    column name
     * @param null|string $default default value (null = nullable)
     * @param int         $length  column length
     * @return self fluent instance
     */
    public function addTinyInt(string $name, ?string $default = '', int $length = 1): self
    {
    }
    /**
     * Add a VARCHAR column.
     *
     * @param string      $name    column name
     * @param int         $length  column length
     * @param null|string $default default value (null = nullable)
     * @return self fluent instance
     */
    public function addVarchar(string $name, int $length = 255, ?string $default = ''): self
    {
    }
}
/**
 * Fluent schema builder for creating and altering tables during migration.
 */
class Migrate extends \GDPlayer\Database\MySQL\MigrateHelper
{
    use \GDPlayer\Database\MySQL\MigrateColumnTypes;
    /**
     * Add a foreign key constraint to the table.
     *
     * @param string $field      local column
     * @param string $refTable   referenced table
     * @param string $refColumn  referenced column
     * @param string $onDelete   ON DELETE action
     * @param string $onUpdate   ON UPDATE action
     * @return self fluent instance
     */
    public function addForeignKey(string $field, string $refTable, string $refColumn, string $onDelete = 'cascade', string $onUpdate = 'no action'): self
    {
    }
    /**
     * Add a FULLTEXT index to the table.
     *
     * @param mixed  $fields column(s) to index
     * @param string $name   index name
     * @return self fluent instance
     */
    public function addFulltextIndex(mixed $fields, string $name): self
    {
    }
    /**
     * Add a (optionally unique) index to the table.
     *
     * @param mixed  $fields column(s) to index
     * @param string $name   index name
     * @param bool   $unique whether the index is unique
     * @return self fluent instance
     */
    public function addIndex(mixed $fields, string $name, bool $unique = false): self
    {
    }
    /**
     * @return string[]
     */
    public function getAddForeignKeysQueries(): array
    {
    }
    /**
     * @return string[]
     */
    public function getAddIndexesQueries(): array
    {
    }
    /**
     * @return string[]
     */
    public function getCreateModifyTableQueries(): array
    {
    }
    /**
     * @return list<array<string,string>>
     */
    public function getModifyColumns(): array
    {
    }
    /**
     * Add an auto-incrementing unsigned primary key column.
     *
     * @param bool $useInt use INT instead of BIGINT
     * @return self fluent instance
     */
    public function id(bool $useInt = false): self
    {
    }
    /**
     * Define a column rename that preserves data during migration.
     * Usage: ->modifyColumn('old_name', 'new_name', 'INT(10) UNSIGNED NOT NULL DEFAULT \'0\'');
     *
     * @param string $oldName
     * @param string $newName
     * @param string $sql
     * @return self
     */
    public function modifyColumn(string $oldName, string $newName, string $sql): self
    {
    }
    /**
     * Start a new table definition, resetting columns/indexes/constraints.
     *
     * @param string $name table name
     * @return self fluent instance
     */
    public function setTable(string $name): self
    {
    }
}
namespace GDPlayer\Database\MySQL\Migration;

/**
 * Migration builders for the core tables, split from {@see MigrationRegistry} so this class
 * stays under the dependency limit (Sonar php:S1200).
 */
final class CoreMigrations
{
    /**
     * Base tables created first (settings, users, videos).
     *
     * @param \PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, \GDPlayer\Database\MySQL\Migrate>
     */
    public static function base(\PDO $pdoWrite): array
    {
    }
    /**
     * Tables depending on the base ones (keys, stats, subtitles, videos).
     *
     * @param \PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, \GDPlayer\Database\MySQL\Migrate>
     */
    public static function support(\PDO $pdoWrite): array
    {
    }
}
/**
 * Migration definition for the `tb_gdrive_auth` table.
 */
final class GDriveAuthMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_gdrive_duplicate` table.
 */
final class GDriveDuplicateMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Google Drive migration builders, split from {@see MigrationRegistry} (Sonar php:S1200).
 */
final class GDriveMigrations
{
    /**
     * Google Drive tables (accounts, mirrors, duplicates, queue).
     *
     * @param \PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, \GDPlayer\Database\MySQL\Migrate>
     */
    public static function build(\PDO $pdoWrite): array
    {
    }
}
/**
 * Migration definition for the `tb_gdrive_mirrors` table.
 */
final class GDriveMirrorMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_gdrive_queue` table.
 */
final class GDriveQueueMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_loadbalancers` table.
 */
final class LoadBalancerMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_maxmind_asn` table.
 */
final class MaxmindAsnMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_maxmind` table.
 */
class MaxmindMigration extends \GDPlayer\Database\MySQL\Migrate
{
    protected string $table = 'tb_maxmind';
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Single source of the migration builders, bound to the write connection.
 *
 * The list used to be duplicated in `Console\Commands\MigrateCommand` and
 * `Database\MigrationQueriesCreator`; both now share it so neither class depends on the
 * 21 migration classes (Sonar php:S1200 — too many class dependencies). The domain builders
 * live in {@see CoreMigrations} and {@see GDriveMigrations} so no single class owns them all.
 */
final class MigrationRegistry
{
    /**
     * Build every migration group in the canonical order (FK drop, data move, key restore).
     *
     * The order is behavior: Google Drive tables sit between the base and the support tables,
     * exactly like the legacy list. Do not reorder without an A/B temp copy.
     *
     * @param \PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, \GDPlayer\Database\MySQL\Migrate>
     */
    public static function build(\PDO $pdoWrite): array
    {
    }
}
/**
 * Migration definition for the `tb_plugins` table.
 */
class PluginMigration extends \GDPlayer\Database\MySQL\Migrate
{
    protected string $table = 'tb_plugins';
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_plugin_routes` table.
 *
 * Stores the page routes declared by each active plugin, replacing the legacy
 * `/p/<plugin_folder>/<page>` URL scheme with flat plugin-owned prefixes.
 */
final class PluginRouteMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_sessions` table.
 */
class SessionMigration extends \GDPlayer\Database\MySQL\Migrate
{
    protected string $table = 'tb_sessions';
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_settings` table.
 */
final class SettingMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_stats` table.
 */
final class StatMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_stats_ua` table.
 */
final class StatUAMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_subtitle_manager` table.
 */
final class SubtitleManagerMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_subtitles` table.
 */
final class SubtitleMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tmp_videos_sources` table.
 */
final class TmpVideoSourceMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_users` table.
 */
final class UserMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_videos_alternatives` table.
 */
final class VideoAlternativeMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_videos_hash` table.
 */
final class VideoHashMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_videos` table.
 */
final class VideoMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
/**
 * Migration definition for the `tb_videos_sources` table.
 */
final class VideoSourceMigration extends \GDPlayer\Database\MySQL\Migrate
{
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}
namespace GDPlayer\Database\MySQL;

/**
 * Penyusunan klausa query: where, order, limit, group.
 *
 * Split out of `Model` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Model` through this trait.
 */
trait ModelQueryBuilderTrait
{
    /**
     * @param null|int[] $limit
     * @return self
     */
    protected function createLimitQry(?array $limit): self
    {
    }
    /**
     * @param string[] $orderBy
     * @return self
     */
    protected function createOrderByQry(array $orderBy): self
    {
    }
    protected function createWhereSqlParams(): self
    {
    }
    /**
     * @param mixed $selectColumns you can insert '*' or 'id, name' string fields or array('id', 'name') fields
     * @return string
     */
    protected static function repairSelectColumns(mixed $selectColumns = '*'): string
    {
    }
    /**
     * Add a WHERE criterion to the query.
     *
     * @param string $column     column name
     * @param mixed  $value      value to compare
     * @param string $comparison Comparison operator (e.g. '=', '<>', 'LIKE').
     * @param string $logical    logical glue between criteria ('AND'|'OR')
     * @return self fluent instance
     */
    public function setCriteria(string $column, mixed $value, string $comparison = '=', string $logical = 'AND'): self
    {
    }
    /**
     * Add a GROUP BY clause to the query.
     *
     * @param string $columns comma-separated column list
     * @return self fluent instance
     */
    public function setGroupBy(string $columns): self
    {
    }
    /**
     * Add a LIMIT clause to the query.
     *
     * @param int $start  offset
     * @param int $length maximum number of rows
     * @return self fluent instance
     */
    public function setLimit(int $start = 0, int $length = 10): self
    {
    }
    /**
     * @param list<list<mixed>> $criteriaList, example: [['id', 1, '<>'],['username', 'admin', '=', 'AND']]
     * @return self
     */
    public function setMultiCriteria(array $criteriaList): self
    {
    }
    /**
     * Add an ORDER BY clause to the query.
     *
     * @param string $orderBy  column to order by
     * @param string $orderDir sort direction ('ASC'|'DESC')
     * @return self fluent instance
     */
    public function setOrderBy(string $orderBy = 'id', string $orderDir = 'ASC'): self
    {
    }
}
/**
 * Pembacaan baris tunggal dan jumlah baris.
 *
 * Split out of `Model` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Model` through this trait.
 */
trait ModelReadTrait
{
    /**
     * @param string|string[] $selectColumns
     * @param null|string[] $orderBy
     * @param null|int[] $limit
     * @return list<array<string, mixed>>
     */
    public function get(string|array $selectColumns = '*', ?array $orderBy = null, ?array $limit = null): array
    {
    }
    /**
     * @param null|string[] $orderBy
     * @param null|int[] $limit
     * @return int
     */
    public function getNumRows(?array $orderBy = null, ?array $limit = null): int
    {
    }
    /**
     * @param string|string[] $selectColumns
     * @param null|string[] $orderBy
     * @return array<string,mixed>
     */
    public function getOne(string|array $selectColumns = '*', ?array $orderBy = null): array
    {
    }
    /**
     * Determine whether at least one row matches the current criteria.
     *
     * @return bool true when a matching row exists
     */
    public function hasData(): bool
    {
    }
}
/**
 * Insert dan penanda baris terhapus/terubah.
 *
 * Split out of `Model` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Model` through this trait.
 */
trait ModelWriteTrait
{
    /**
     * Delete every row matching the current criteria.
     *
     * @return bool true when the delete executed successfully
     */
    public function hasDeleted(): bool
    {
    }
    /**
     * @param string $column
     * @param mixed[] $params
     * @return bool
     */
    public function hasDeletedWhereIn(string $column, array $params): bool
    {
    }
    /**
     * @param array<string,mixed> $data
     * @return bool
     */
    public function hasUpdated(array $data): bool
    {
    }
    /**
     * @param array<string,mixed> $data
     * @return mixed
     */
    public function insert(array $data): mixed
    {
    }
}
/**
 * Fluent, cache-aware query builder for a single database table.
 *
 * Chain the criteria/order/limit setters, then call get(), getOne(), insert(),
 * update() or delete(). Reads and writes are invalidated through cache tags.
 */
class Model extends \GDPlayer\Database\ModelHelper
{
    use \GDPlayer\Database\MySQL\ModelQueryBuilderTrait;
    use \GDPlayer\Database\MySQL\ModelReadTrait;
    use \GDPlayer\Database\MySQL\ModelWriteTrait;
    protected const COMPARISON_OPERATORS = ['=', '>', '<', '>=', '<=', '<>', '!=', 'LIKE', 'NOT LIKE', 'REGEXP', 'NOT REGEXP'];
    /**
     * @param array{start:int, length:int, search:string, orderBy:string, orderDir:string} $qry
     * @param string[] $searchColumns
     * @param string|string[] $selectColumns
     * @return array{data:array<string|int, array<string, mixed>>, recordsFiltered:int, recordsTotal:int}
     */
    public function datatables(array $qry, array $searchColumns, string|array $selectColumns = '*'): array
    {
    }
    /**
     * Count all rows in the table (ignoring any criteria).
     *
     * @return int total row count
     */
    public function getTotalRows(): int
    {
    }
    /**
     * @param string $column
     * @param mixed[] $values
     * @param mixed $selectColumns
     * @return list<array<string, mixed>>
     */
    public function getWhereIn(string $column, array $values, mixed $selectColumns = '*'): array
    {
    }
}
namespace GDPlayer\Extension;

/**
 * JSON manifest owned by a theme/plugin (`theme.json` / `plugin.json`).
 *
 * The manifest is read with `json_decode` — not `include` — and is the single source of the
 * view/hook to class mapping. Extension namespaces are registered into the SPL autoloader from the
 * `autoload.psr-4` section, so `composer dump-autoload` is not needed when installing a theme.
 */
final class ExtensionManifest
{
    /**
     * @param string $file manifest JSON path
     * @return array<string, mixed> manifest contents; empty array when missing/invalid
     */
    public static function load(string $file): array
    {
    }
    /**
     * Register the PSR-4 autoloader from the manifest (once per extension directory).
     *
     * @param string $baseDir theme/plugin directory
     * @param array<string, mixed> $manifest manifest contents
     */
    public static function registerAutoload(string $baseDir, array $manifest): void
    {
    }
}
/**
 * Uninstall hook declared by an extension manifest (`hooks.uninstall`).
 *
 * Replaces the legacy `views/backend/uninstall.php` file that core used to `include_once`.
 */
interface UninstallHookInterface
{
    /**
     * Release server configuration, stop background services and clear extension caches.
     */
    public function uninstall(): void;
}
namespace GDPlayer\External;

/**
 * AntiCaptcha API client for solving reCAPTCHA/hCaptcha challenges.
 */
final class AntiCaptcha
{
    /**
     * Initialize the cURL handle and load the configured API key.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param string $type
     * @param array<string,mixed> $options
     * @return null|int
     */
    public function createTask(string $type = 'RecaptchaV2TaskProxyless', array $options = []): ?int
    {
    }
    /**
     * @param null|int $taskId
     * @return null|array<string,mixed>
     */
    public function getTaskResult(?int $taskId): ?array
    {
    }
    /**
     * Set the target site key for the challenge.
     *
     * @param string $websiteKey reCAPTCHA/hCaptcha site key
     * @return self fluent instance
     */
    public function setWebsiteKey(string $websiteKey = ''): self
    {
    }
    /**
     * Set the page URL hosting the challenge.
     *
     * @param string $websiteUrl page URL
     * @return self fluent instance
     */
    public function setWebsiteURL(string $websiteUrl = ''): self
    {
    }
    /**
     * Route the challenge through a randomly selected proxy from the proxy list.
     *
     * @return self fluent instance
     */
    public function useProxy(): self
    {
    }
}
/**
 * Operasi berkas Drive: info, daftar, folder, rename.
 *
 * Split out of `GoogleDriveRestAPI` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GoogleDriveRestAPI` through this trait.
 */
trait GDriveFileApiTrait
{
    /**
     * @param string $folderName
     * @param list<array<string,mixed>> $parents
     * @return array<string,mixed>|false
     */
    public function createNewFolder(string $folderName = '', array $parents = []): array|false
    {
    }
    /**
     * @param bool $searchInCache
     * @return false|array<string,mixed>
     */
    public function getFileInfo(bool $searchInCache = true): false|array
    {
    }
    /**
     * @param string $parentId
     * @param int $maxResult
     * @param string $orderBy
     * @param string $orderDir
     * @return list<array<string,mixed>>
     */
    public function getFiles(string $parentId = '', int $maxResult = 10, string $orderBy = 'modifiedDate', string $orderDir = 'desc'): array
    {
    }
    /**
     * @return list<array<string,mixed>>
     */
    public function getSharedDrives(): array
    {
    }
    /**
     * @param string $newFolderName
     * @return array<string,mixed>|false
     */
    public function renameFileFolder(string $newFolderName = ''): array|false
    {
    }
}
/**
 * Mirror Drive: pencarian dan pencocokan record.
 *
 * Split out of `GoogleDriveRestAPI` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GoogleDriveRestAPI` through this trait.
 */
trait GDriveMirrorTrait
{
    /**
     * @return false|array<string,mixed>
     */
    protected function findExistingMirrorInDB(): false|array
    {
    }
    /**
     * @return false|array<string,mixed>
     */
    public function searchFileMirror(): false|array
    {
    }
}
/**
 * Pemeriksaan izin & status hapus berkas Drive.
 *
 * Split out of `GoogleDriveRestAPI` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GoogleDriveRestAPI` through this trait.
 */
trait GDrivePermissionTrait
{
    /**
     * Delete the file referenced by the current file id.
     *
     * @return bool true when the file was deleted
     */
    public function hasDeleted(): bool
    {
    }
    /**
     * Remove the public "anyone" permission from the current file.
     *
     * @return bool true when the permission was removed
     */
    public function hasDeletedPermissions(): bool
    {
    }
    /**
     * Grant public read ("anyone") permission on the current file.
     *
     * @return bool true when the permission was granted
     */
    public function hasInsertedPermissions(): bool
    {
    }
}
/**
 * Transport API Drive: token akses dan request cURL.
 *
 * Split out of `GoogleDriveRestAPI` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GoogleDriveRestAPI` through this trait.
 */
trait GDriveTransportTrait
{
    /**
     * Single request to the Google Drive API: WARP (when eligible), method, body, headers.
     *
     * @param string[] $headers
     * @return array{response: string, error: string, status: int}
     */
    protected function apiRequest(string $url, string $method = 'GET', string $postData = '', array $headers = []): array
    {
    }
    /**
     * @param string $url
     * @param string $postData json
     * @param string $method POST|PUT
     * @return array<string,mixed>|false
     */
    protected function customCurlRequest(string $url, string $postData, string $method = 'POST'): array|false
    {
    }
    /**
     * @return null|array<string,mixed>
     */
    public function getAccessToken(): ?array
    {
    }
}
/**
 * Shared state, search filters and accessors for the Google Drive REST client.
 */
trait GoogleDriveRestAPITrait
{
    /** @var null|array<string,mixed> $accessToken */
    private ?array $accessToken = null;
    private ?string $apiKey = null;
    private string $baseURL = 'https://www.googleapis.com';
    private string $email = '';
    private bool $encryptTitle = false;
    private string $fileID = '';
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    private string $nextPageToken = '';
    private string $searchTitle = '';
    private bool $showFolderOnly = false;
    private bool $showPrivateOnly = false;
    private string $tokenPath = '/oauth2/v4/token';
    /** @var null|array<string,mixed> $userDetail */
    private ?array $userDetail = null;
    private string $v2Path = '/drive/v2';
    private \GDPlayer\Model\VideoHash $vHash;
    /**
     * Initialize the Drive auth/mirror models.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param bool $jsonType
     * @return string[]
     */
    private function createAuthHeader(bool $jsonType = false): array
    {
    }
    /**
     * @param array<string,mixed> $file
     * @return string|false
     */
    private function saveFileInfo(array $file = []): string|false
    {
    }
    private function saveFileMirrorDB(string $fileID = '', string $fileMirrorID = ''): string|false
    {
    }
    /**
     * Toggle title encryption for returned file names.
     *
     * @param bool $encrypted whether to encrypt titles
     * @return self fluent instance
     */
    public function encryptTitle(bool $encrypted = false): self
    {
    }
    /**
     * Return the active Drive API key.
     *
     * @return null|string API key, or null when not set
     */
    public function getAPIKey(): ?string
    {
    }
    /**
     * Return the pagination token for the next result page.
     *
     * @return string next page token
     */
    public function getNextPageToken(): string
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function getUserInfo(): array
    {
    }
    /**
     * Restrict search results to folders only.
     *
     * @param bool $showFolderOnly folder-only flag
     * @return self fluent instance
     */
    public function searchFolderOnly(bool $showFolderOnly = false): self
    {
    }
    /**
     * Restrict search results to private (non-shared) files only.
     *
     * @param bool $showPrivateOnly private-only flag
     * @return self fluent instance
     */
    public function searchPrivateOnly(bool $showPrivateOnly = false): self
    {
    }
    /**
     * Set the title filter used by file searches.
     *
     * @param string $searchTitle title query
     * @return self fluent instance
     */
    public function searchTitle(string $searchTitle = ''): self
    {
    }
    /**
     * Set the pagination token for the next result page.
     *
     * @param string $nextPageToken next page token
     * @return self fluent instance
     */
    public function setNextPageToken(string $nextPageToken = ''): self
    {
    }
}
/**
 * Google Drive REST API client for file and permission management.
 *
 * Wraps the Drive v2/v3 endpoints used for mirroring, listing, copying and
 * sharing files across the configured Drive accounts.
 */
final class GoogleDriveRestAPI
{
    use \GDPlayer\External\GDriveFileApiTrait;
    use \GDPlayer\External\GDriveMirrorTrait;
    use \GDPlayer\External\GDrivePermissionTrait;
    use \GDPlayer\External\GDriveTransportTrait;
    use \GDPlayer\External\GoogleDriveRestAPITrait;
    /**
     * @param string $parentId
     * @return false|array<string,mixed>
     */
    public function copy(string $parentId = 'root'): false|array
    {
    }
    /**
     * @param string $parentId
     * @return false|array<string,mixed>
     */
    public function copyToAll(string $parentId = 'root'): false|array
    {
    }
    /**
     * Select the Drive account email and load its API key/access token.
     *
     * @param string $email drive account email
     * @return self fluent instance
     */
    public function setEmail(string $email = ''): self
    {
    }
    /**
     * Set the target Drive file id (resolving a default account when unset).
     *
     * @param string $fileId drive file id or URL
     * @return self fluent instance
     */
    public function setFileID(string $fileId = ''): self
    {
    }
}
/**
 * Mail driver dispatcher (SMTP, Mailgun or Resend).
 *
 * Selects the configured driver and forwards the message payload to it.
 */
final class Mailer
{
    /**
     * Read the configured mail driver and instantiate the matching backend.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param array<string,mixed> $messagePayload
     * @return int
     */
    public function send(array $messagePayload = []): int
    {
    }
}
/**
 * Mailgun HTTP REST API mail driver (bypasses SMTP port blocking).
 */
final class Mailgun
{
    /**
     * Load the Mailgun API key, domain and region settings.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param array<string, mixed> $messagePayload
     * @return int
     */
    public function send(array $messagePayload = []): int
    {
    }
}
/**
 * Provider IP info eksternal dan penyusunan request API.
 *
 * Split out of `Maxmind` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Maxmind` through this trait.
 */
trait MaxmindApiTrait
{
    /**
     * @return string[] standard headers for the external API
     */
    protected function apiHeaders(): array
    {
    }
    /**
     * HTTP request owned by this class (15 s timeout, matching the previous setting).
     *
     * @return \GDPlayer\Http\Fetcher\Fetcher Fetcher preconfigured with the application User-Agent
     */
    protected function createFetcher(): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
    /**
     * @param string $ip
     * @return null|array<string,mixed>
     */
    protected function getIPInfoAPI(string $ip = ''): ?array
    {
    }
    /**
     * @param string $ip
     * @return null|array<string,mixed>
     */
    protected function getRipeStatIP(string $ip = ''): ?array
    {
    }
}
/**
 * Ekstraksi IP request/server dan filter data.
 *
 * Split out of `Maxmind` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Maxmind` through this trait.
 */
trait MaxmindRequestTrait
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param array<string, string> $ipHeaderCandidates
     * @return string
     */
    protected function extractIpFromRequest(\Psr\Http\Message\ServerRequestInterface $request, array $ipHeaderCandidates): string
    {
    }
    /**
     * @param array<string, string> $ipHeaderCandidates
     * @return string
     */
    protected function extractIpFromServer(array $ipHeaderCandidates): string
    {
    }
    /**
     * @param string $prefixItem
     * @return string|null
     */
    protected function extractPrefixLength(string $prefixItem): ?string
    {
    }
    /**
     * @param array<string,mixed> $data
     * @param string $searchKey
     * @return string[]
     */
    protected function filterDataByKey(array $data, string $searchKey): array
    {
    }
}
/**
 * MaxMind geolocation/ASN lookup service.
 *
 * Resolves the client IP and enriches it with country, continent and ASN data.
 */
final class Maxmind
{
    use \GDPlayer\External\MaxmindApiTrait;
    use \GDPlayer\External\MaxmindRequestTrait;
    /**
     * @param null|\Redis $redis optional Redis instance for shared state
     */
    public function __construct(private ?\Redis $redis = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param string $ip
     * @return array<string,mixed>|null
     */
    public function getASNInfo(string $ip = ''): ?array
    {
    }
    /**
     * Resolve the client IP address from the request/proxy headers.
     *
     * @return string client IP address
     */
    /**
     * @param \Psr\Http\Message\ServerRequestInterface|null $request
     * @return string
     */
    public function getIP(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
}
/**
 * Free/rotating proxy list manager with availability checking.
 */
final class Proxy
{
    /**
     * Load the configuration used for proxy fetching.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @return string[]
     */
    public function autoupdateProxy(): array
    {
    }
    /**
     * @param string $proxyFormat
     * @return array{format:string,proxy:string,type:int,usrpwd:string}
     */
    public function extractProxyFormat(string $proxyFormat = ''): array
    {
    }
    /**
     * @return string[]
     */
    public function freeProxyListNet(): array
    {
    }
    /**
     * @param string[] $proxyList
     * @param string $host
     * @return string[]
     */
    public function proxyChecker(array $proxyList = [], string $host = 'gdrive'): array
    {
    }
}
/**
 * Resend HTTP REST API mail driver.
 */
final class Resend
{
    /**
     * Load the configured Resend API key.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param array<string, mixed> $messagePayload
     * @return int
     */
    public function send(array $messagePayload = []): int
    {
    }
}
/**
 * Unduh, ekstrak, dan simpan berkas subtitle Subscene.
 *
 * Split out of `Subscene` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Subscene` through this trait.
 */
trait SubsceneDownloadTrait
{
    protected function download(string $url, string $outputFile, int $attempts = 0): string|false
    {
    }
    protected function extractZipFile(string $file): string|false
    {
    }
    protected function saveToFile(string $file, string $content): string|false
    {
    }
}
/**
 * Subscene subtitle scraper and downloader.
 *
 * Resolves a subtitle page to a downloadable archive and caches it locally.
 */
final class Subscene
{
    use \GDPlayer\External\SubsceneDownloadTrait;
    /**
     * @param string $url optional subtitle page URL to resolve immediately
     */
    public function __construct(string $url = '')
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Download and extract the subtitle for the current URL.
     *
     * @return string|false path to the extracted subtitle, or false on failure
     */
    public function file(): string|false
    {
    }
    /**
     * Resolve the direct download URL for the current subtitle page.
     *
     * @param int $attempts retry attempt counter
     * @return string|false download URL, or false when unavailable
     */
    public function getDownloadUrl(int $attempts = 0): string|false
    {
    }
    /**
     * Set the subtitle page URL.
     *
     * @param string $url subtitle page URL
     * @return self fluent instance
     */
    public function setUrl(string $url): self
    {
    }
}
/**
 * Fetches and decodes subtitle JSON feeds.
 */
final class SubtitleJson
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Fetch subtitle JSON payload from a remote URL.
     *
     * @param string $url
     * @return array<int|string,mixed>
     */
    public function fetch(string $url = ''): array
    {
    }
}
namespace GDPlayer\Helper\Core;

/**
 * Extraction options/state of {@see CoreHelper} (Sonar php:S1820).
 *
 * Mutable value object: extractors keep writing these while resolving sources, exactly like the
 * individual properties it replaces. Defaults are the old property initializers.
 */
final class CoreHelperOptions
{
    /** Subtitle/playlist type used for HLS sources (`hls`). */
    public string $hlsType = 'hls';
    /** Download allowed by the extractor. */
    public bool $isDownloadable = false;
    /** Playlist type used for MPD sources (`mpd`). */
    public string $mpdType = 'mpd';
    /** Network interface used for the extraction requests. */
    public string $networkInterface = '';
    /** Default label of the produced sources. */
    public string $original = 'Original';
    /**
     * Cloudflare WARP proxy descriptor, when the extractor needs one.
     *
     * @var null|array<string,mixed> $proxy
     */
    public ?array $proxy = null;
    /** Proxy retry counter. */
    public int $retryProxy = 0;
    /** Accept-Language header used for upstream requests. */
    public string $userLanguage = \GDPlayer\Config\App::ACCEPT_LANGUAGE;
    /** Content type of the produced sources. */
    public string $videoType = 'video/mp4';
}
/**
 * Collaborators of {@see CoreHelper} (Sonar php:S1820).
 *
 * Every extractor shares the same service set, created once per instance by the base
 * constructor. Properties stay writable because a few extractors replace `config` with their own
 * instance; semantics are identical to the individual protected properties it replaces.
 */
final class CoreHelperServices
{
    public \GDPlayer\External\AntiCaptcha $antiCaptcha;
    public \GDPlayer\Config\BinFile $binConfig;
    public \GDPlayer\Service\HeadlessChrome\HeadlessChrome $chrome;
    public \GDPlayer\Config\Config $config;
    public \GDPlayer\Core\Hosting\Hosting $hosting;
    public \OviDigital\JsObjectToJson\JsConverter $jsConverter;
    public \JavascriptUnpacker\JavascriptUnpacker $jsUnpacker;
    public \GDPlayer\Service\Minify $min;
    /**
     * Build the shared service set.
     */
    public function __construct()
    {
    }
}
namespace GDPlayer\Helper;

/**
 * Operasi baca/tulis berkas untuk {@see FileSystem}.
 *
 * Dipisah agar kelas FileSystem tetap di bawah ambang 200 baris (php:S2042);
 * perilaku dan signature tidak berubah.
 */
trait FileSystemIo
{
    /**
     * Buat direktori bila belum ada, tanpa error-suppression.
     *
     * Dipakai beberapa helper di kelas ini; kegagalan sebenarnya (izin, disk penuh)
     * sengaja tetap terlihat sebagai warning PHP, bukan ditelan.
     */
    private static function ensureDir(string $dir): bool
    {
    }
    public static function createDir(string $dir): bool
    {
    }
    public static function createFile(string $file, string $content = '', string $mode = 'w'): int|false
    {
    }
    public static function getFileContent(string $file = '', string $mode = 'r'): string|false
    {
    }
    public static function isPHPFile(string $file = ''): bool
    {
    }
    public static function normalizeSeparator(string $path = ''): string
    {
    }
}
final class FileSystem
{
    use \GDPlayer\Helper\FileSystemIo;
    public static function copyDirectory(string $source, string $destination): bool
    {
    }
    public static function createSymlink(string $target, string $link): bool
    {
    }
    public static function deleteDirectory(string $dir = ''): bool
    {
    }
    public static function deleteTemporaryDirectories(): bool
    {
    }
}
final class GDrive
{
    public static function extractDriveId(string $url = ''): string
    {
    }
    public static function getRandomActiveEmail(): string
    {
    }
}
namespace GDPlayer\Helper\Misc;

/**
 * cURL default config and share-handle helpers.
 *
 * Split out of `MiscHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MiscHelper` through this trait.
 */
trait CurlTrait
{
    // Store a single share handle instance for shared use
    protected static ?\CurlShareHandle $sharedHandle = null;
    /**
     * Next outbound interface address, rotated from the `EXTRA_IP` list in `.env`.
     *
     * @return string interface hostname or IP address, '' when EXTRA_IP is empty
     */
    protected static function getNextIpAddress(): string
    {
    }
    /**
     * Apply the shared cURL defaults to a handle.
     *
     * @param \CurlHandle $ch             cURL handle
     * @param int         $timeout        request timeout in seconds
     * @param bool        $returnTransfer whether to return the transfer as a string
     * @return \CurlHandle configured handle
     */
    public static function getCurlDefaultConfig(\CurlHandle $ch, int $timeout = 60, bool $returnTransfer = true): \CurlHandle
    {
    }
    public static function getCurlShareHandle(): \CurlShareHandle
    {
    }
    /**
     * Get or create cURL Share Handle
     *
     * @return CurlShareHandle
     */
    /**
     * Inject the runtime's curl share handle (worker owns its lifetime).
     */
    public static function setCurlShareHandle(?\CurlShareHandle $handle): void
    {
    }
}
/**
 * Player-source helpers that parse subtitle/poster/filmstrip payloads and VAST tags.
 *
 * Split out of `MiscHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MiscHelper` through this trait.
 */
trait ParserTrait
{
    /**
     * Build the proxied filmstrip (preview track) URL.
     *
     * @param null|string $filmstrip source filmstrip URL
     * @return string Proxied .vtt URL, or an empty string when invalid.
     */
    public static function filmstripParser(?string $filmstrip): string
    {
    }
    /**
     * @return array<string,mixed>
     */
    public static function getVast(): array
    {
    }
    /**
     * Build the proxied poster URL.
     *
     * @param null|string $poster source poster URL
     * @return string proxied poster URL, or an empty string when invalid
     */
    public static function posterParser(?string $poster): string
    {
    }
    /**
     * Resolve the response content type for a stream, tuned per client/browser.
     *
     * @param string      $userAgent           client user agent
     * @param null|string $upstreamContentType content type reported by upstream
     * @param bool        $isMp4               whether the media is MP4
     * @return string content type to send
     */
    public static function resolveContentType(string $userAgent, ?string $upstreamContentType, bool $isMp4): string
    {
    }
    /**
     * Build the proxied subtitle URL.
     *
     * @param null|string $subtitle source subtitle URL
     * @return string proxied subtitle URL, or an empty string when invalid
     */
    public static function subtitleParser(?string $subtitle): string
    {
    }
}
/**
 * Miscellaneous helpers: cURL defaults, cache paths, content types and parsers.
 */
class MiscHelper
{
    use \GDPlayer\Helper\Misc\CurlTrait;
    use \GDPlayer\Helper\Misc\ParserTrait;
    protected static string $curlInterface = '';
    /**
     * @param string $ip
     * @return string[]
     */
    public static function bypassRateLimit(string $ip = ''): array
    {
    }
    /**
     * Build (and ensure) the cache directory path for a video/stream.
     *
     * @param string $vHost video host
     * @param string $vID   media id
     * @param string $vUrl  media URL
     * @param string $range range token
     * @return string absolute cache directory path
     */
    public static function createCacheDir(string $vHost = '', string $vID = '', string $vUrl = '', string $range = ''): string
    {
    }
    /**
     * @param null|string $data
     * @return array<int|string,array<mixed>|string>
     */
    public static function decryptData(?string $data): array
    {
    }
    public static function getHostOrigin(string $url = '', bool $origin = false): string
    {
    }
    /**
     * Return the network interface address used for outbound requests.
     *
     * @return string interface hostname or IP address
     */
    public static function getNetworkInterface(): string
    {
    }
    /**
     * Return the server's public IP address (cached).
     *
     * @return string server IP address
     */
    public static function getServerIp(): string
    {
    }
    /**
     * Strip the http(s) scheme from a URL.
     *
     * @param string $url URL
     * @return string URL without a scheme
     */
    public static function removeURLScheme(string $url = ''): string
    {
    }
    /**
     * Force the http(s) scheme of a URL to match the current request.
     *
     * @param string $url URL
     * @return string URL with the current scheme
     */
    public static function replaceURLScheme(string $url = ''): string
    {
    }
    /**
     * Extract the host (or origin) from a URL.
     *
     * @param string $url    URL to parse
     * @param bool   $origin return the scheme://host origin instead of the bare host
     * @return string host/origin, or an empty string when the URL has no host
     */
    /**
     * Ganti host URL dengan alamat IP hasil resolver sistem.
     *
     * `Fetcher` memaksa `CURLOPT_DNS_SERVERS` (DNS_SERVERS di .env), sehingga nama
     * service container (mis. `nginx`) tidak pernah ter-resolve oleh cURL. Resolver
     * sistem tetap tahu alamatnya, jadi host ditukar ke IP sebelum request.
     */
    public static function resolveHostToIp(string $url = ''): string
    {
    }
}
namespace GDPlayer\Helper;

final class Platform
{
    /**
     * Cari binary Chromium yang terpasang di sistem Unix.
     *
     * @return null|string nama binary yang tersedia, atau null bila tidak ada
     */
    public static function findChromiumBinary(): ?string
    {
    }
    public static function getPhpPath(): string
    {
    }
    public static function getPowerShellPath(): string
    {
    }
    public static function openResourcesHandler(): void
    {
    }
}
final class Request
{
    /**
     * @param array<int|string, mixed> $data
     */
    public static function buildQueryNoIndex(array $data): string
    {
    }
    public static function getBrowserLanguage(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    public static function getBrowserUserAgent(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    public static function getHeaderLine(?\Psr\Http\Message\ServerRequestInterface $request, string $name): string
    {
    }
    /**
     * @return list<string>
     */
    public static function getPageUris(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    public static function getReferer(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    public static function isAppleProduct(?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
    /**
     * @param \Psr\Http\Message\ServerRequestInterface|null $request
     * @return bool
     */
    public static function isSSL(?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
}
namespace GDPlayer\Helper\Security;

/**
 * Browser, country, proxy/VPN and title blacklist rules.
 *
 * Split out of `SecurityHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SecurityHelper` through this trait.
 */
trait ClientRuleTrait
{
    /**
     * Determine whether a browser user agent is blacklisted.
     *
     * @param string $ua user agent (defaults to the current request)
     * @return bool true when blacklisted
     */
    public static function isBrowserBlacklisted(string $ua = '', ?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
    /**
     * Determine whether the visitor's country is blacklisted.
     *
     * @return bool true when blacklisted
     */
    public static function isCountryBlacklisted(): bool
    {
    }
    /**
     * Determine whether the visitor is behind a blacklisted proxy/VPN.
     *
     * @return bool true when blacklisted
     */
    public static function isProxyVPNBlacklisted(): bool
    {
    }
    /**
     * Determine whether a video title matches the DMCA/title blacklist.
     *
     * @param string $title video title to check
     * @return bool true when blacklisted
     */
    public static function isTitleBlacklisted(string $title = ''): bool
    {
    }
}
/**
 * Domain and referer blacklist/whitelist rules.
 *
 * Split out of `SecurityHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SecurityHelper` through this trait.
 */
trait DomainRuleTrait
{
    /**
     * Pemisah baris untuk daftar konfigurasi (dipakai juga ClientRuleTrait).
     *
     * @return string pola regex pemisah baris
     */
    protected static function lineSplitPattern(): string
    {
    }
    /**
     * Prefiks yang dibuang sebelum domain dibandingkan.
     *
     * @return string[] daftar prefiks
     */
    protected static function unwantedStrings(): array
    {
    }
    /**
     * Determine whether a request domain/referer is blacklisted.
     *
     * @param string $referer referer URL (defaults to the current request)
     * @return bool true when blacklisted
     */
    public static function isDomainBlacklisted(string $referer = ''): bool
    {
    }
    /**
     * Determine whether a request domain/referer is whitelisted.
     *
     * @param string $referer referer URL (defaults to the current request)
     * @return bool true when whitelisted
     */
    public static function isDomainWhitelisted(string $referer = ''): bool
    {
    }
    /**
     * Determine whether a request referer is blacklisted.
     *
     * @param string $referer referer URL (defaults to the current request)
     * @return bool true when blacklisted
     */
    public static function isRefererBlacklisted(string $referer = ''): bool
    {
    }
}
/**
 * IPv4/IPv6 range checks used by the blacklist rules.
 *
 * Split out of `SecurityHelper` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SecurityHelper` through this trait.
 */
trait IpRangeTrait
{
    protected static function isIPv4InRange(string $ip, string $range): bool
    {
    }
    protected static function isIPv6InRange(string $ip, string $range): bool
    {
    }
}
/**
 * Blacklist/whitelist checks used to guard requests (domains, countries, referers, titles).
 */
class SecurityHelper
{
    use \GDPlayer\Helper\Security\ClientRuleTrait;
    use \GDPlayer\Helper\Security\DomainRuleTrait;
    use \GDPlayer\Helper\Security\IpRangeTrait;
    /**
     * @return array<string, string>
     */
    public static function getHmacInput(\GDPlayer\Core\Security\Security $security, ?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    public static function legacyDecode(?string $data = null): string
    {
    }
    public static function sanitizeHtml(?string $text = null): string
    {
    }
    public static function sanitizeUrl(mixed $url): string
    {
    }
    public static function validateCorsToken(?string $token = null, ?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
    public static function validateRecaptcha(?string $captcha = null): bool
    {
    }
}
namespace GDPlayer\Helper;

/**
 * Detects Smart TV user agents (brands and generic TV keywords).
 */
class SmartTVDetector
{
    /**
     * @param null|string $userAgent user agent to inspect (defaults to the current request)
     */
    public function __construct(?string $userAgent = null, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return string|null Brand name or null if not a Smart TV
     */
    public function detectBrand(): ?string
    {
    }
    /**
     * Determine whether the user agent belongs to a Smart TV.
     *
     * @return bool true when a Smart TV is detected
     */
    public function isSmartTV(): bool
    {
    }
}
class SourceHelper
{
    /**
     * @param array<array<string,mixed>> $sources
     * @return array<array<string,mixed>>
     */
    public static function filterSources(array $sources = []): array
    {
    }
    /**
     * @param string $url
     * @return array<string,mixed>
     */
    public static function getCustomHeaders(string $url): array
    {
    }
    public static function getMimeType(string $file = ''): string
    {
    }
    public static function getRealMimeType(string $file = ''): string
    {
    }
    /**
     * @param null|string $videoHost
     * @param null|string $videoId
     * @param int $maxRetries
     * @return bool
     */
    public static function hasVideoAttemptFailed(?string $videoHost, ?string $videoId, int $maxRetries = 5): bool
    {
    }
    /**
     * @return string[]
     */
    public static function rateLimitHosts(): array
    {
    }
    /**
     * @param array<array<string,mixed>> $sources
     * @return array<array<string,mixed>>
     */
    public static function reorderSources(array $sources = []): array
    {
    }
}
namespace GDPlayer\Helper\Stream;

final class StreamConfig
{
    /**
     * @return list<string>
     */
    public static function getDirectHosts(): array
    {
    }
    /**
     * @return list<string>
     */
    public static function getProxyList(): array
    {
    }
    public static function getRandomLoadBalancerUrl(string $host = '', string $excludeUrl = ''): string
    {
    }
    /**
     * @return array<string, mixed>|null
     */
    public static function getRandomProxy(): ?array
    {
    }
    /**
     * @return array<string, mixed>|false
     */
    public static function isCurrentHostLoadBalancer(): false|array
    {
    }
    public static function isGoogleHls(string $vHost = '', bool $dl = false): bool
    {
    }
}
/**
 * Helpers for building stream responses and error bodies.
 */
class StreamHelper
{
    /**
     * Build a JSON error response body for a given HTTP status code.
     *
     * @param int    $httpCode HTTP status code
     * @param string $message  optional custom message
     * @return string JSON response body
     */
    public static function createResponseError(int $httpCode = 404, string $message = ''): string
    {
    }
}
/**
 * Host connectivity & stability telemetry (RAM-to-DB periodic flushing).
 */
final class StreamTelemetry
{
    /**
     * Flush accumulated host telemetry from RAM/Cache to tb_settings in database (Run periodically in background)
     * Key format in DB: host_telemetry_{loadBalancerId}_{type}_{vHost}
     *
     * @param string $loadBalancerId Default '0' (Main Server)
     * @return void
     */
    public static function flushTelemetryToDatabase(string $loadBalancerId = '0'): void
    {
    }
    /**
     * Get all host telemetries stored directly in database (tb_settings)
     * Query format: host_telemetry_{loadBalancerId}_{type}_%
     *
     * @param string|null $loadBalancerId Filter by load balancer ID (e.g. '0' for main server). If null, returns all.
     * @param string|null $type Filter by stream type (e.g. 'mp4', 'hls', 'mpd'). If null, returns all.
     * @return array<string, array<string, mixed>>
     */
    public static function getAllTelemetryFromDb(?string $loadBalancerId = null, ?string $type = null): array
    {
    }
    /**
     * Get real-world connection stability stats for a specific host and type from RAM/Cache
     *
     * @param string $vHost
     * @param string $type Default 'hls'
     * @return array<string, mixed>
     */
    public static function getHostTelemetry(string $vHost = '', string $type = 'hls'): array
    {
    }
    /**
     * Record real-time host connection telemetry to cache
     *
     * @param string $vHost
     * @param int $status
     * @param float $ttfb
     * @param float $connectTime
     * @param string $err
     * @param string $type
     * @return void
     */
    public static function record(string $vHost, int $status, float $ttfb, float $connectTime, string $err = '', string $type = 'hls'): void
    {
    }
}
namespace GDPlayer\Helper;

final class StringUtil
{
    public static function between(string $string, string $start, string $end): string
    {
    }
    /**
     * @param array<int|string, mixed> $data
     * @return list<string>
     */
    public static function cleanArray(array $data): array
    {
    }
    public static function createHash(mixed $data): string
    {
    }
    public static function createUniqueSlug(int $length = 5, string $slug = ''): string
    {
    }
    /**
     * @return array<int|string,mixed>|(string|int|float|mixed)[]
     */
    public static function decodeJson(mixed $input): array
    {
    }
    public static function decodeUnicodeEscape(string $string): string
    {
    }
    public static function durationToTimeFormat(int $seconds = 0): string
    {
    }
    /**
     * @return array{red: int, green: int, blue: int}|string|false
     */
    public static function hexToRgb(?string $hexStr, bool $returnAsString = false, string $separator = ','): array|string|false
    {
    }
    public static function keyFilter(string $key): string
    {
    }
    public static function random(int $length = 5): string
    {
    }
    public static function slugify(string $str = '', string $delimiter = '-'): string
    {
    }
}
final class Validation
{
    public static function isPrivateUrl(string $url = ''): bool
    {
    }
    public static function sanitizeEmail(?string $email = null): string
    {
    }
    public static function validateBoolean(mixed $data = null): bool
    {
    }
    public static function validateEmail(?string $email = null): bool
    {
    }
    public static function validateIp(?string $ip = null): string|false
    {
    }
    public static function validateUrl(mixed $url): bool
    {
    }
}
namespace GDPlayer\Hook;

/**
 * Plugin hook contract: a class (not a file) invoked when an event occurs.
 *
 * The plugin manifest declares `hooks.<name>.class`; there is no `include` of hook files.
 */
interface HookInterface
{
    /**
     * @param array<string, mixed> $hookData data from the hook caller
     * @return array<string, mixed> modified data (may be the same as the input)
     */
    public function handle(array $hookData): array;
}
/**
 * Plugin-owned API response filter (replaces the `api.response.filter` file).
 */
interface ResponseFilterInterface
{
    /**
     * @param array<string, mixed> $responseData API response
     * @param array<string, mixed> $queryData request query
     * @return array<string, mixed> filtered response
     */
    public function filter(array $responseData, array $queryData): array;
}
namespace GDPlayer\Hosting;

/**
 * Video source extractor for Amazon (https://www.amazon.com).
 */
final class Amazon extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Aparat.
 */
final class Aparat extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for Archive.
 */
final class Archive extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for Blogger.
 */
final class Blogger extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Cloud Mail.ru.
 */
final class Cloudmailru extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source YetiShare-based host for Cyberfile.
 */
final class Cyberfile extends \GDPlayer\Core\Hosting\YetiShare
{
}
/**
 * HTTP fetch + browser header helpers for the DaddyHD pipeline.
 *
 * Split out of `Daddyhd` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Daddyhd` through this trait.
 */
trait DaddyhdHttpTrait
{
    private string $defaultPlayerUrl = 'https://hamis.romponalis.st/premiumtv/daddy.php?id=%s';
    private string $streamPageUrl = 'https://dlive.sx/stream/stream-%s.php';
    private string $vertexApiUrl = 'https://vertex.st/api/player.php?id=%s';
    private string $vertexRefererUrl = 'https://vertex.st/';
    private string $watchRefererUrl = 'https://dlive.sx/watch.php?id=%s';
    /**
     * @param array<string, string> $overrides key-value pairs to add/override
     * @return array<int, string> flat array of "Header-Name: value" strings
     */
    private function createBrowserHeaders(array $overrides = []): array
    {
    }
    private function fetchEmbedUrl(string $safeId): ?string
    {
    }
    private function fetchIframePlayerUrl(string $channelId): string
    {
    }
    /**
     * @param string $url
     * @param array<int, string> $headers
     * @return ?string
     */
    private function fetchUrl(string $url = '', array $headers = []): ?string
    {
    }
}
/**
 * HTML/JSON parsing helpers for the DaddyHD pipeline.
 *
 * Split out of `Daddyhd` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Daddyhd` through this trait.
 */
trait DaddyhdParseTrait
{
    private function extractSafeId(string $html, string $fallbackChannelId = ''): string
    {
    }
    private function extractStreamUrlFromEmbed(string $embedHtml): ?string
    {
    }
    private function extractVertexFromHtml(string $html, string $fallbackChannelId = ''): ?string
    {
    }
    private function parseHlsFromPlayerHtml(string $html, string $channelId): string
    {
    }
    private function resolveChannelId(): string
    {
    }
}
/**
 * Video source extractor for DaddyHD.
 */
final class Daddyhd extends \GDPlayer\Core\Extractor\Extractor
{
    use \GDPlayer\Hosting\DaddyhdHttpTrait;
    use \GDPlayer\Hosting\DaddyhdParseTrait;
    public const BASE_URL_MAIN = 'https://dlive.sx/';
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Dailymotion (https://www.dailymotion.com/).
 */
final class Dailymotion extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Direct.
 */
final class Direct extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Dood (https://playmogo.com/).
 */
final class Dood extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Dropbox (https://www.dropbox.com/).
 */
final class Dropbox extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Dzen (https://dzen.ru/).
 */
final class Dzen extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Earnvids (https://morencius.com/).
 */
class Earnvids extends \GDPlayer\Core\Hosting\XVFSParser
{
    protected string $baseURL = 'https://morencius.com/';
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Embedtv.
 */
final class Embedtv extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for Embedtv2.
 */
final class Embedtv2 extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for Facebook (https://www.facebook.com/).
 */
final class Facebook extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Filemail.
 */
final class Filemail extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for Filemoon (https://filemoon.to/).
 */
final class Filemoon extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Files.fm.
 */
final class Filesfm extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Fileupload (https://www.file-upload.org/).
 */
final class Fileupload extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Fireload.
 */
final class Fireload extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Firevideoplayer.
 */
final class Firevideoplayer extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Google Drive.
 */
final class Gdrive extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * Resolve the Google Drive playback sources for the current file id.
     *
     * @return array<int,array<string,mixed>> resolved sources
     */
    public function getSources(): array
    {
    }
    /**
     * Select the Drive account (defaulting to a random active one) and load its tokens.
     *
     * @param string $email drive account email
     * @return self fluent instance
     */
    public function setEmail(string $email = ''): self
    {
    }
}
/**
 * Video source XVFS-style embed parser for Goodstream (https://goodstream.one/).
 */
final class Goodstream extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Google Photos (https://photos.google.com/).
 */
final class Googlephotos extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * Resolve the Google Photos playback sources for the current media id.
     *
     * @return array<int,array<string,mixed>> resolved sources
     */
    public function getSources(): array
    {
    }
}
/**
 * Video source XVFS-style embed parser for Hexupload.
 */
final class Hexupload extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source extractor for HxFile (https://hxfile.co/).
 */
final class Hxfile extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source YetiShare-based host for Iceyfile.
 */
final class Iceyfile extends \GDPlayer\Core\Hosting\YetiShare
{
}
/**
 * Video source XVFS-style embed parser for Krakenfiles.
 */
final class Krakenfiles extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source XVFS-style embed parser for Lulustream.
 */
final class Lulustream extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source XVFS-style embed parser for MediaCM.
 */
final class Mediacm extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source extractor for Mediafire (https://www.mediafire.com/).
 */
final class Mediafire extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Mixdrop (https://mixdrop.ag/).
 */
final class Mixdrop extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Mp4Upload (https://www.mp4upload.com/).
 */
final class Mp4upload extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Mstream.
 */
final class Mstream extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for My Mail.ru.
 */
final class Mymailru extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for Nossoplayer.
 */
final class Nossoplayer extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for OK.ru (https://ok.ru/).
 */
final class Okru extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Pcloud.
 */
final class Pcloud extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Pixeldrain (https://pixeldrain.com/api/file/).
 */
final class Pixeldrain extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Playnow (https://sdnsty.store/).
 */
final class Playnow extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Rumble (https://rumble.com/).
 */
final class Rumble extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Sendvid.
 */
final class Sendvid extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source extractor for Sibnet (https://video.sibnet.ru/).
 */
final class Sibnet extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for SoundCloud.
 */
final class Soundcloud extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Streamable.
 */
final class Streamable extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source XVFS-style embed parser for Streamhg (https://hgcloud.to/).
 */
final class Streamhg extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Streamtape (https://tapeadvertisement.com/).
 */
final class Streamtape extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Tiktok.
 */
final class Tiktok extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Opsi yt-dlp: tipe output, proxy, dan penyusunan argumen.
 *
 * Split out of `Ytdlp` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Ytdlp` through this trait.
 */
trait YtdlpOptionTrait
{
    protected static function formatProxy(string $proxy): string
    {
    }
    protected function getType(string $videoUrl = ''): string
    {
    }
    /**
     * @return list<string>
     */
    protected function prepareBaseOptions(): array
    {
    }
    /**
     * @return list<string>
     */
    protected function resolveProxies(): array
    {
    }
    /**
     * Append an extra yt-dlp CLI option.
     *
     * @param string $option raw yt-dlp option string
     * @return self fluent instance
     */
    public function addOption(string $option = ''): self
    {
    }
    /**
     * Disable sending cookies to yt-dlp.
     *
     * @return self fluent instance
     */
    public function disableCookie(): self
    {
    }
    /**
     * Disable proxy usage for yt-dlp.
     *
     * @return self fluent instance
     */
    public function disableProxy(): self
    {
    }
}
/**
 * Video source extractor for yt-dlp.
 */
class Ytdlp extends \GDPlayer\Helper\Core\CoreHelper
{
    use \GDPlayer\Hosting\YtdlpOptionTrait;
    protected bool $ytdlpDisableCookie = false;
    /** @var string[] $ytdlpOptions */
    protected array $ytdlpOptions = [];
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * @param string $command
     * @return array<string,mixed>
     */
    protected function exec(string $command = ''): array
    {
    }
    /**
     * @return list<array<string,mixed>>
     */
    public function getSources(): array
    {
    }
}
/**
 * Video source yt-dlp backed extractor for Twitch.
 */
final class Twitch extends \GDPlayer\Hosting\Ytdlp
{
    /**
     * Custom yt-dlp options can be applied via {@see Ytdlp::addOption()},
     * {@see Ytdlp::disableCookie()} and {@see Ytdlp::disableProxy()}
     *
     * @param string $url media URL to resolve
     */
    public function __construct(string $url = '')
    {
    }
}
/**
 * Video source YetiShare-based host for Udrop.
 */
final class Udrop extends \GDPlayer\Core\Hosting\YetiShare
{
}
/**
 * Video source XVFS-style embed parser for Uqload (https://uqload.net/).
 */
final class Uqload extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Vidara.
 */
final class Vidara extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source XVFS-style embed parser for Vidmoly (https://vidmoly.org/).
 */
final class Vidmoly extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Vidoza (https://videzz.net/).
 */
final class Vidoza extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Vidtube (https://vidtube.one/).
 */
final class Vidtube extends \GDPlayer\Core\Hosting\XVFSParser
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Vidyard.
 */
final class Vidyard extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Vimeo (https://vimeo.com/).
 */
final class Vimeo extends \GDPlayer\Core\Extractor\Extractor
{
}
/**
 * Video source extractor for VK (https://vk.com/).
 */
final class Vk extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * Fetch and parse the original VK video sources.
     *
     * @return void
     */
    public function getOriginalSources(): void
    {
    }
}
/**
 * Video source extractor for Voe (https://voe.sx/).
 */
final class Voe extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Vtube (https://vtube.network/).
 */
final class Vtube extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source extractor for Wetransfer.
 */
final class Wetransfer extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source XVFS-style embed parser for Xvs.
 */
final class Xvs extends \GDPlayer\Core\Hosting\XVFSParser
{
}
/**
 * Video source extractor for Yandex Disk (https://disk.yandex.com/).
 */
final class Yadisk extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Video source extractor for Yourupload (https://www.yourupload.com/).
 */
final class Yourupload extends \GDPlayer\Core\Extractor\Extractor
{
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
/**
 * Third-party (yt1s) fallback pipeline for YouTube sources.
 *
 * Split out of `Youtube` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Youtube` through this trait.
 */
trait YoutubeThirdPartyTrait
{
    /** @var string[] $headers */
    protected array $headers = [];
    protected string $thirdPartyAPIUrl = 'https://yt1s.com/';
    /**
     * Proxy for the convert wave: use the rotation proxy that is already active when present, otherwise
     * WARP for this host — legacy order (WARP first, rotation overrides) with one value for
     * all requests, not a fresh draw per request.
     *
     * @return array{proxy: string, type: int, usrpwd: string}|null
     */
    private function convertProxy(): ?array
    {
    }
    private function getThirdPartySources(): void
    {
    }
    private function thirdPartySources(string $response = ''): void
    {
    }
    /**
     * @param string[] $keys
     * @param string $videoId
     * @return void
     */
    private function thirdPartySourcesConvert(array $keys = [], string $videoId = ''): void
    {
    }
    /**
     * @param array<array<string,mixed>> $sources
     * @return void
     */
    private function thirdPartySourcesParser(array $sources = []): void
    {
    }
}
/**
 * Video source extractor for YouTube (https://www.youtube.com/).
 */
final class Youtube extends \GDPlayer\Core\Extractor\Extractor
{
    use \GDPlayer\Hosting\YoutubeThirdPartyTrait;
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}
namespace GDPlayer\Http;

/**
 * Akses `Swoole\Coroutine::getContext()` tanpa bergantung pada ekstensi Swoole.
 *
 * Kelas Swoole dicek sebagai string supaya core tetap bisa dipakai di SAPI/RoadRunner
 * yang tidak punya ekstensi tersebut. Di luar coroutine hasilnya null, sehingga pemanggil
 * jatuh ke penyimpanan statis biasa (satu request per proses).
 */
final class CoroutineStore
{
    /**
     * @return \ArrayAccess<string, mixed>|null context coroutine aktif; null di luar coroutine
     */
    public static function get(): ?\ArrayAccess
    {
    }
}
namespace GDPlayer\Http\Emitter;

/**
 * The single point where a response is sent to the client, one implementation per runtime.
 *
 * The kernel produces pure PSR-7; this class is the rightful owner of `header()`/`echo()` (SAPI) or
 * `Response::end()` (Swoole/RoadRunner). With this split, application code no longer
 * calls SAPI functions directly.
 */
interface EmitterInterface
{
    /**
     * Send the response to the client.
     *
     * @param \Psr\Http\Message\ResponseInterface $response ready-to-send response
     * @return void
     */
    public function emit(\Psr\Http\Message\ResponseInterface $response): void;
}
/**
 * Emitter for SAPI (PHP-FPM, Apache, CLI server): headers + echo.
 *
 * The only class in `src/` allowed to call `header()` and `echo` for the response body.
 */
final class SapiEmitter implements \GDPlayer\Http\Emitter\EmitterInterface
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response response being sent
     * @return void
     */
    public function emit(\Psr\Http\Message\ResponseInterface $response): void
    {
    }
}
namespace GDPlayer\Http\Fetcher;

/**
 * Penerapan opsi per-request: method, proxy, sink, progres.
 *
 * Split out of `Fetcher` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Fetcher` through this trait.
 */
trait ApplyTrait
{
    /**
     * Non-GET method from withMethod(); 'GET' means keep the cURL default.
     *
     * @param array<string, mixed> $request
     */
    protected function applyMethod(\CurlHandle $handle, array $request): void
    {
    }
    /**
     * Progress callback, when the caller installs one.
     *
     * Callback contract: fn(int $status, int $dlsize, int $dl) — the caller need not
     * hold a CurlHandle just to read the status. cURL's 3rd/5th arguments
     * (ulsize/ul) are not forwarded because nothing consumes them.
     */
    protected function applyProgressCallback(\CurlHandle $handle): void
    {
    }
    /**
     * Per-request proxy; the provider seam rotates it per attempt.
     */
    protected function applyProxy(\CurlHandle $handle): void
    {
    }
    /**
     * Where the body goes: file (download()), caller callback (onWrite()), or memory.
     *
     * @param array<string, mixed> $request
     */
    protected function applySink(\CurlHandle $handle, array $request): void
    {
    }
}
/**
 * Options for one HTTP request: proxy, hooks, method, visible sink, connect timeout.
 *
 * Split out of `Fetcher` so that class only holds execution and result normalisation
 * (rule: <=20 methods per class). The properties here flatten into `Fetcher` when the trait is used,
 * so no other class may use this trait.
 */
trait OptionsTrait
{
    private string $body = '';
    private int $bufferSize = 0;
    /** Connect timeout in milliseconds (0 = not set). */
    private int $connectTimeoutMs = 0;
    /** Explicit CURLOPT_ENCODING value (null = inherited from getCurlDefaultConfig). */
    private ?string $encoding = null;
    private bool $followLocation = true;
    private int $httpVersion = \CURL_HTTP_VERSION_NONE;
    /** Outgoing interface; '' and null both mean inherited from getCurlDefaultConfig. */
    private ?string $interface = null;
    private int $keepAliveIdle = 0;
    private int $keepAliveInterval = 0;
    /** Abort bila transfer lebih lambat dari N byte/detik selama M detik (0 = nonaktif). */
    private int $lowSpeedLimit = 0;
    private int $lowSpeedTime = 0;
    private int $maxRedirects = 20;
    /** @var non-empty-string */
    private string $method = 'GET';
    /** @var null|callable(\CurlHandle, string): int */
    private $onHeader;
    /** @var null|callable */
    private $onProgress;
    /** @var null|callable(string): (int|void) */
    private $onWrite;
    /** @var array{proxy: string, type: int, usrpwd: string}|null */
    private ?array $proxy = null;
    /** @var string[] `host:port:ip` pairs for CURLOPT_RESOLVE */
    private array $resolve = [];
    /** @var resource|null CURLOPT_STDERR target when verbose is enabled */
    private $verboseStream;
    /**
     * Bagian path relatif dari sebuah redirect (Location tanpa skema/host).
     *
     * @param string $base URL hop saat ini
     * @param string $target nilai header Location
     * @return string path absolut hasil resolusi
     */
    private static function relativeRedirectPath(string $base, string $target): string
    {
    }
    /**
     * Absolutkan nilai header Location terhadap URL hop saat ini.
     *
     * @param string $base URL hop yang sedang diproses
     * @param string $target nilai header Location
     * @return string URL absolut tujuan redirect
     */
    private static function resolveRedirectUrl(string $base, string $target): string
    {
    }
    /**
     * Copy with an extra caller-owned header collector (cookies, Location, etc.).
     *
     * @param null|callable(\CurlHandle, string): int $callback
     */
    public function onHeader(?callable $callback): self
    {
    }
    /**
     * Copy that invokes $callback for every body chunk (progress / custom write).
     * An int < 0 return from the callback aborts the transfer (same as the cURL write callback).
     *
     * @param null|callable(string): (int|void) $callback
     */
    public function onWrite(?callable $callback): self
    {
    }
    public function withBufferSize(int $bytes): self
    {
    }
    /**
     * Connect timeout in milliseconds (CURLOPT_CONNECTTIMEOUT_MS), for control
     * pings whose budget is under one second. Overrides the ctor connectTimeout.
     */
    public function withConnectTimeoutMs(int $milliseconds): self
    {
    }
    /**
     * Copy with an explicit CURLOPT_ENCODING ('identity' = do not ask for compression,
     * 'gzip' = ask for gzip). Without it the option is inherited from getCurlDefaultConfig.
     */
    public function withEncoding(string $encoding): self
    {
    }
    public function withFollowLocation(bool $follow): self
    {
    }
    /**
     * Copy with a pinned HTTP version (e.g. CURL_HTTP_VERSION_1_1).
     */
    public function withHttpVersion(int $version): self
    {
    }
    /**
     * Copy that binds the outgoing connection to a specific address (engine host loopback ping).
     * getCurlDefaultConfig() rotates CURLOPT_INTERFACE from EXTRA_IP; that value can only be
     * replaced, not cleared with '' (cURL fails to bind), so the loopback address must be
     * named explicitly. '' / not called = inherited.
     */
    public function withInterface(string $interface): self
    {
    }
    /**
     * Copy with TCP keep-alive tuning (0 = leave the transport default).
     */
    public function withKeepAlive(int $idle, int $interval): self
    {
    }
    /**
     * Copy that follows (default) or does not follow redirects.
     * Callers that must read `Location` themselves (e.g. Mediafire) pass false.
     */
    /**
     * Abort stalled transfers (CURLOPT_LOW_SPEED_LIMIT/TIME) so a long-running worker is not
     * held by a dead upstream.
     */
    public function withLowSpeed(int $bytesPerSecond, int $seconds): self
    {
    }
    /**
     * Copy with a redirect limit (transport default: 20).
     */
    public function withMaxRedirects(int $max): self
    {
    }
    /**
     * Copy with a non-GET method (custom POST/PUT/HEAD) and an optional body.
     */
    public function withMethod(string $method, string $body = ''): self
    {
    }
    /**
     * Copy with a progress callback (large downloads: reported per update).
     *
     * Callback contract: `fn(int $status, int $dlsize, int $dl): mixed` — the HTTP status is read by
     * `Fetcher` so the caller need not hold a CurlHandle.
     *
     * @param null|callable $callback normalised progress callback
     */
    public function withProgress(?callable $callback): self
    {
    }
    /**
     * Copy with its own proxy (used by the provider seam that rotates proxies per request).
     *
     * @param array{proxy: string, type: int, usrpwd: string}|null $proxy
     */
    public function withProxy(?array $proxy): self
    {
    }
    /**
     * Copy that rolls the cURL conversation (CURLOPT_VERBOSE) into this file.
     * The caller opens and closes the file itself.
     */
    /**
     * Pin `host:port` to a specific IP (CURLOPT_RESOLVE) — bypasses DNS without changing the URL.
     *
     * @param string[] $entries `host:port:ip` pairs
     */
    public function withResolve(array $entries): self
    {
    }
    public function withVerbose(mixed $stream): self
    {
    }
}
/**
 * Konfigurasi transport: payload, versi protokol, dan handle.
 *
 * Split out of `Fetcher` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Fetcher` through this trait.
 */
trait TransportTrait
{
    /**
     * Request-scoped options: HEAD-only, body, basic auth, and header list.
     *
     * @param array<int|string, string> $headers
     * @param array<string, mixed>      $request
     */
    protected function applyPayloadOptions(\CurlHandle $handle, array $headers, bool $headOnly, array $request): void
    {
    }
    /**
     * TCP keep-alive, encoding, verbose, and outgoing interface.
     */
    protected function applyTransportOptions(\CurlHandle $handle): void
    {
    }
    /**
     * HTTP version + connect/buffer timeouts + DNS resolution list.
     */
    protected function applyVersionOptions(\CurlHandle $handle): void
    {
    }
    /**
     * @param non-empty-string      $url
     * @param array<int|string, string> $headers
     * @param array<string, mixed>  $request body, basicAuth, stream (see method body)
     * @param array<string, string> $collected filled by the header callback below
     */
    protected function configure(\CurlHandle $handle, string $url, array $headers, bool $headOnly, array $request, array &$collected): void
    {
    }
}
/**
 * Single place for outgoing HTTP requests (GET, HEAD, POST).
 *
 * Transport policy (network interface, DNS, TLS, keepalive, timeout, redirect,
 * shared handle) still belongs to {@see MiscHelper::getCurlDefaultConfig()}. This class
 * owns the caller side: building the request, running it, retrying when
 * needed, reading status/headers/errors, and guaranteeing the handle is always closed —
 * including on failure paths, because worker paths are long-lived.
 *
 * Callers no longer touch cURL handles or CURLINFO_*.
 */
final class Fetcher
{
    use \GDPlayer\Http\Fetcher\ApplyTrait;
    use \GDPlayer\Http\Fetcher\OptionsTrait;
    use \GDPlayer\Http\Fetcher\TransportTrait;
    /**
     * @param int $timeout      time budget for one attempt (seconds)
     * @param int $retries      retries after the first attempt (0 = never)
     * @param int $retryDelayMs delay between retries (milliseconds)
     */
    public function __construct(protected int $timeout = 30, private int $retries = 0, private int $retryDelayMs = 250, protected int $connectTimeout = 0)
    {
    }
    /**
     * @param non-empty-string      $url
     * @param array<int|string, string> $headers
     * @param array<string, mixed>  $request body/basicAuth/stream (see configure())
     */
    /**
     * Fully configured handle for one request (transport policy in `configure()`).
     *
     * Used by `FetcherPool`, which runs many requests concurrently; ordinary callers still
     * use `get()`/`head()`/`post()`/`download()`, which close the handle themselves.
     *
     * @param array<int|string, string> $headers
     * @param array<string, mixed>      $request body/basicAuth/stream (lihat configure())
     * @param array<string, string>     $collected filled by the header collector while the handle runs
     * @return null|\CurlHandle null when the handle cannot be created
     */
    public function createHandle(string $url, array $headers, bool $headOnly, array $request, array &$collected): ?\CurlHandle
    {
    }
    /**
     * GET and write the body straight to a file (without holding the whole payload in memory).
     *
     * @param array<int|string, string> $headers
     */
    public function download(string $url, mixed $target, array $headers = []): \GDPlayer\Http\Fetcher\FetchResult
    {
    }
    /**
     * GET and return the body.
     *
     * @param array<int|string, string> $headers
     */
    public function get(string $url, array $headers = []): \GDPlayer\Http\Fetcher\FetchResult
    {
    }
    /**
     * HEAD: headers only, body not downloaded (check type/size/redirect).
     *
     * @param array<int|string, string> $headers
     */
    public function head(string $url, array $headers = []): \GDPlayer\Http\Fetcher\FetchResult
    {
    }
    /**
     * POST: a string body is sent as-is, an array body is sent as multipart/form-data
     * (same as the `CURLOPT_POSTFIELDS` array of the legacy pattern).
     *
     * @param array<string, mixed>|string      $body
     * @param array<int|string, string>        $headers
     * @param array{0: string, 1: string}|null $basicAuth [user, password] -> HTTP Basic
     */
    public function post(string $url, array|string $body = '', array $headers = [], ?array $basicAuth = null): \GDPlayer\Http\Fetcher\FetchResult
    {
    }
    /**
     * Turn a finished handle into a FetchResult, then close the handle.
     *
     * @param mixed                 $response the caller's curl_exec()/curl_multi_getcontent() result
     * @param array<string, string> $collected header collector output
     */
    public function readHandle(\CurlHandle $handle, mixed $response, array $collected, string $url, float $started): \GDPlayer\Http\Fetcher\FetchResult
    {
    }
}
/**
 * A batch of HTTP requests run concurrently (cURL multi).
 *
 * Transport policy still belongs to `Fetcher`: each request prepares its handle through
 * `Fetcher::createHandle()` and its result is read through `Fetcher::readHandle()`. This pool
 * only handles scheduling — one handle per request, run together, then closed.
 * No retries (single wave), exactly like the `curl_multi` caller it replaces.
 */
final class FetcherPool
{
    /**
     * Stop the wave in flight (used by the `onTick` callback).
     *
     * Unfinished handles still have their results read (partial status) and are then closed, just
     * like the old caller that detached handles from multi mid-flight.
     */
    public function abort(): void
    {
    }
    /**
     * Add one request to the next wave.
     *
     * @param string                    $key      result key (e.g. source index)
     * @param Fetcher                   $fetcher  this request's policy (timeout, proxy, method, header callback)
     * @param string                    $url      target URL
     * @param array<int|string, string> $headers  request header list/map
     * @param bool                      $headOnly true = headers only (CURLOPT_NOBODY)
     * @param array<string, mixed>      $options  `Fetcher::send()`-style extras: 'stream'
     *                                            (target write resource), 'basicAuth', or
     *                                            'resolve' (`host:port:ip` pair for this item)
     * @return self fluent instance
     */
    public function add(string $key, \GDPlayer\Http\Fetcher\Fetcher $fetcher, string $url, array $headers = [], bool $headOnly = false, array $options = []): self
    {
    }
    /**
     * Run every added request and return the results per key.
     *
     * @param int $maxConnections concurrent connection limit (0 = cURL default)
     * @param null|callable $onTick called on every loop iteration (`fn(): void`) — the legacy path used it
     *                                to abort the wave mid-flight
     * @return array<int|string, FetchResult> results per key; keys whose handle could not be created are included
     */
    public function run(int $maxConnections = 0, ?callable $onTick = null): array
    {
    }
}
/**
 * The result of one outgoing HTTP request.
 *
 * Callers need not touch the cURL handle or read CURLINFO_* themselves:
 * status, headers, body, error, and duration are already normalised here.
 * Header names are stored lowercase so lookups are not case-sensitive.
 */
final class FetchResult
{
    /**
     * @param array<string, string> $headers
     * @param string $redirectUrl redirect target that was NOT followed (CURLINFO_REDIRECT_URL),
     *                            only filled when the caller turned follow-location off
     */
    public function __construct(private int $status = 0, private string $body = '', private array $headers = [], private string $error = '', private string $effectiveUrl = '', private float $durationMs = 0.0, private int $contentLength = 0, private int $errorNo = 0, private string $redirectUrl = '')
    {
    }
    public function body(): string
    {
    }
    /**
     * Content length per the server (CURLINFO_CONTENT_LENGTH_DOWNLOAD), 0 when not reported.
     */
    public function contentLength(): int
    {
    }
    public function durationMs(): float
    {
    }
    public function effectiveUrl(): string
    {
    }
    public function error(): string
    {
    }
    /**
     * cURL error number (0 = no error). CURLE_WRITE_ERROR(23) means the transfer was
     * stopped by the caller's callback, not a network failure.
     */
    public function errorNo(): int
    {
    }
    public function hasError(): bool
    {
    }
    /**
     * Header value (case-insensitive), or null when absent.
     */
    public function header(string $name): ?string
    {
    }
    /**
     * @return array<string, string>
     */
    public function headers(): array
    {
    }
    public function isOk(): bool
    {
    }
    /**
     * Body as an array. A body that is not JSON, or JSON that is not an object/array,
     * yields an empty array, not an exception.
     *
     * @return array<string, mixed>
     */
    public function json(): array
    {
    }
    /**
     * Redirect target that was not followed (empty when follow-location is on or it is not a redirect).
     */
    public function redirectUrl(): string
    {
    }
    public function status(): int
    {
    }
}
namespace GDPlayer\Http;

/**
 * PSR-17/PSR-7 factory for creating server requests and responses.
 */
class HttpFactory
{
    /**
     * Create a server request from the PHP superglobals.
     *
     * @return \Psr\Http\Message\ServerRequestInterface PSR-7 server request
     */
    public static function createRequestFromGlobals(): \Psr\Http\Message\ServerRequestInterface
    {
    }
    /**
     * Create a PSR-7 response with the given status.
     *
     * @param int    $code         HTTP status code
     * @param string $reasonPhrase optional reason phrase
     * @return \Psr\Http\Message\ResponseInterface PSR-7 response
     */
    public static function createResponse(int $code = 200, string $reasonPhrase = ''): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Build a PSR-7 body stream from a string.
     *
     * @param string $content body content
     * @return \Psr\Http\Message\StreamInterface
     */
    public static function createStream(string $content = ''): \Psr\Http\Message\StreamInterface
    {
    }
    /**
     * Return the shared PSR-17 factory instance.
     *
     * @return \Nyholm\Psr7\Factory\Psr17Factory PSR-17 factory
     */
    public static function getPsr17Factory(): \Nyholm\Psr7\Factory\Psr17Factory
    {
    }
}
/**
 * Carries a ResponseInterface out of code that cannot `return` yet (e.g. a guard inside a view).
 *
 * Used as a bridge until every view becomes a class: the caller throws this exception,
 * the front controller catches it and sends the response. Replaces the `... ; exit;` pattern.
 */
final class HttpResponseException extends \RuntimeException
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response response that must be sent to the client
     * @param \Throwable|null $previous originating exception, if any
     */
    public function __construct(private readonly \Psr\Http\Message\ResponseInterface $response, ?\Throwable $previous = null)
    {
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface the response carried by the exception
     */
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
    }
}
namespace GDPlayer\Http\Request;

/**
 * Set-Cookie value builders (build, add, clear).
 *
 * Split out of `ResponseEmitter` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the public API stays on `ResponseEmitter` via this trait.
 */
trait CookieTrait
{
    /**
     * @param string $name cookie name
     * @param string $value cookie value
     * @param array<string, bool|int|string> $options cookie options
     * @return string Set-Cookie header value
     */
    private static function buildCookie(string $name, string $value, array $options): string
    {
    }
    /**
     * Tell the browser to delete a cookie (Set-Cookie with an expires in the past).
     *
     * @param \Psr\Http\Message\ResponseInterface $response base response
     * @param string $name cookie name
     * @param array<string, bool|int|string> $options cookie options (path/domain must match the set call)
     * @return \Psr\Http\Message\ResponseInterface response with the Set-Cookie header
     */
    public static function clearCookie(\Psr\Http\Message\ResponseInterface $response, string $name, array $options = []): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Append one cookie to the response (Set-Cookie).
     *
     * @param \Psr\Http\Message\ResponseInterface $response base response
     * @param string $name cookie name
     * @param string $value cookie value
     * @param array<string, bool|int|string> $options options: expires, path, domain, secure, httponly, samesite
     * @return \Psr\Http\Message\ResponseInterface response with the Set-Cookie header
     */
    public static function withCookie(\Psr\Http\Message\ResponseInterface $response, string $name, string $value, array $options = []): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Header line parsing/normalising helpers ('Name: value' lists).
 *
 * Split out of `ResponseEmitter` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the public API stays on `ResponseEmitter` via this trait.
 */
trait HeaderTrait
{
    /**
     * Turn a 'Name: value' header list into a name => value map.
     *
     * @param array<int|string, string> $headerLines header list
     * @return array<string, string> header map
     */
    protected static function parseHeaderLines(array $headerLines): array
    {
    }
    /**
     * @param array<int|string, string> $headers
     * @return list<string>
     */
    public static function normalizeHeaders(array $headers = []): array
    {
    }
}
/**
 * Per-execution, runtime-aware request/response context.
 *
 * In SAPI and RoadRunner workers requests are served sequentially, so static storage is already
 * correct. In Swoole many requests live as coroutines in one process; the context is therefore
 * kept in `Swoole\Coroutine::getContext()` when the caller runs inside a coroutine.
 *
 * Foundation: {@see State}, {@see Logger}, and {@see HTML}
 * read it, so legacy code using `State::` keeps working without overwriting each other.
 */
final class RequestContext
{
    public static function getRequest(): ?\Psr\Http\Message\ServerRequestInterface
    {
    }
    public static function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Release the execution context (required at the end of every request in a long-running worker).
     */
    public static function reset(): void
    {
    }
    public static function set(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): void
    {
    }
    public static function setRequest(?\Psr\Http\Message\ServerRequestInterface $request): void
    {
    }
    public static function setResponse(\Psr\Http\Message\ResponseInterface $response): void
    {
    }
}
namespace GDPlayer\Http\Response;

/**
 * Emits a PSR-7 response to the SAPI (headers and body).
 *
 * Dual-sink: helper header/status/cookie ({@see createHeaders()}, {@see setHeader()},
 * {@see status()}, {@see isCookieStored()}) write to the PSR-7 context in {@see State}
 * when running in a long-running runtime (Swoole/RoadRunner) and still write to the
 * SAPI for the PHP/FPM path. {@see emit()} is the final sink of the SAPI path.
 *
 * Pure value builders live in {@see CookieTrait} and {@see HeaderTrait}.
 */
class ResponseEmitter
{
    use \GDPlayer\Http\Request\CookieTrait;
    use \GDPlayer\Http\Request\HeaderTrait;
    /** Access-Control-Expose-Headers value for the PHP path. */
    public const EXPOSE_HEADERS = self::EXPOSE_HEADERS_HEAD . self::EXPOSE_HEADERS_TAIL;
    /**
     * Guarantee CORS headers on a response built outside {@see createHeaders()}.
     *
     * Single choke point for the kernel: every core response passes through here, so a handler
     * (or error page) that forgot CORS can no longer produce a browser-blocking reply.
     *
     * @param \Psr\Http\Message\ResponseInterface $response response to complete
     * @return \Psr\Http\Message\ResponseInterface response with CORS headers when they are missing
     */
    public static function applyCorsHeaders(\Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Apply the same default header set as {@see createHeaders()} to a response.
     *
     * Used by new code (controllers) so headers (Cache-Control + CORS) match the
     * legacy path, without calling header() directly.
     *
     * @param \Psr\Http\Message\ResponseInterface $response base response
     * @param bool $enableCache true for responses that may be cached
     * @param int $cacheMaxAge max-age when caching is enabled
     * @return \Psr\Http\Message\ResponseInterface response with default headers
     */
    public static function applyDefaultHeaders(\Psr\Http\Message\ResponseInterface $response, bool $enableCache = false, int $cacheMaxAge = 3600): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Cache-Control value for a given status and cache mode.
     *
     * @param bool $enableCache true when the response may be cached
     * @param int  $cacheMaxAge max-age when caching is enabled
     * @param int  $statusCode  HTTP response status
     * @return string Cache-Control value
     */
    public static function cacheControl(bool $enableCache, int $cacheMaxAge, int $statusCode): string
    {
    }
    /**
     * Build the CORS (+ Vary) header set as a name => value map.
     *
     * A pure function without `Config`, so long-running runtimes (Swoole,
     * RoadRunner) use the same values without re-reading core config per
     * request.
     *
     * @param string $origin        Access-Control-Allow-Origin value
     * @param string $exposeHeaders Access-Control-Expose-Headers value
     * @return array<string, string> CORS header map
     */
    public static function corsHeaderSet(string $origin, string $exposeHeaders = self::EXPOSE_HEADERS): array
    {
    }
    /**
     * Set default + custom headers for one response (status + Cache-Control + CORS).
     *
     * Dual-sink: the same values are written to the PSR-7 context ({@see State}) when present —
     * long-running runtimes (Swoole/RoadRunner) send them through their own mechanism —
     * and to the SAPI through header() for the PHP/FPM path.
     *
     * @param array<int|string, string> $customHeaders extra headers in 'Name: value' format
     * @param bool $enableCache true for responses that may be cached
     * @param int $cacheMaxAge max-age when caching is enabled
     * @param int $httpCode HTTP response status
     * @return void
     */
    public static function createHeaders(array $customHeaders = [], bool $enableCache = false, int $cacheMaxAge = 3600, int $httpCode = 200): void
    {
    }
    /**
     * Build the full default header set (Cache-Control + CORS) as a name => value map.
     *
     * Key order = header order sent by the PHP path.
     *
     * @param string $origin        Access-Control-Allow-Origin value
     * @param string $cacheControl  Cache-Control value
     * @param string $exposeHeaders Access-Control-Expose-Headers value
     * @return array<string, string> default header map
     */
    public static function defaultHeaderSet(string $origin, string $cacheControl, string $exposeHeaders = self::EXPOSE_HEADERS): array
    {
    }
    /**
     * Send the response through the SAPI emitter (legacy caller compatibility).
     *
     * New code uses {@see SapiEmitter}/EmitterInterface of its respective runtime.
     *
     * @param \Psr\Http\Message\ResponseInterface $response response being sent
     */
    public static function emit(\Psr\Http\Message\ResponseInterface $response): void
    {
    }
    /**
     * Set one cookie (Set-Cookie) on the PSR-7 context (if any) and on the SAPI (if not yet sent).
     *
     * @param string $name cookie name
     * @param string $value cookie value
     * @param array<string, bool|int|string> $options options: expires, path, domain, secure, httponly, samesite
     * @return bool true when applied to either sink
     */
    public static function isCookieStored(string $name, string $value, array $options = []): bool
    {
    }
    public static function isValidResponse(int $status = 0): bool
    {
    }
    public static function redirect(string $newURL = ''): never
    {
    }
    /**
     * Side-effect-free 302 redirect response (or 404 when the URL is empty).
     *
     * Used by new code that returns a response; {@see redirect()} (which calls exit)
     * stays until all its legacy callers are migrated.
     *
     * @param string $newURL target URL
     * @return \Psr\Http\Message\ResponseInterface ready-to-send redirect response
     */
    public static function redirectResponse(string $newURL = ''): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Set one header on the PSR-7 context (if any) and on the SAPI (if not yet sent).
     *
     * The PSR-7 sink is used by long-running runtimes (Swoole/RoadRunner) so headers
     * do not depend on header(), which does not apply in a cross-request worker.
     *
     * @param string $name header name
     * @param string $value header value
     * @param bool $replace true overwrites, false appends
     * @return void
     */
    public static function setHeader(string $name, string $value, bool $replace = true): void
    {
    }
    /**
     * Set the HTTP status on the PSR-7 context (if any) and on the SAPI (if not yet sent).
     *
     * @param int $code HTTP status
     * @return void
     */
    public static function status(int $code): void
    {
    }
}
/**
 * Pure response policy (no SAPI): early responses, default headers, and deciding which body
 * is streamed directly instead of being buffered by the output buffer.
 *
 * Split out of the Kernel so the "what does the response look like" decision is not mixed with
 * request orchestration; shared by SAPI, Swoole, and RoadRunner.
 */
final class ResponsePolicy
{
    /**
     * Response for OPTIONS/HEAD before the router runs (legacy behaviour preserved).
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     * @return \Psr\Http\Message\ResponseInterface|null early response; null when the request continues to the router
     */
    public static function earlyResponse(\Psr\Http\Message\ServerRequestInterface $request): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Is this request's body streamed directly by a streaming handler (not through a buffer)?
     *
     * @param string $requestTarget request target (path + query)
     * @return bool true when the body must not be buffered
     */
    public static function isBufferBypassed(string $requestTarget): bool
    {
    }
    /**
     * Mimic the SAPI default: a response without an explicit Content-Type is sent as text/html UTF-8.
     *
     * @param \Psr\Http\Message\ResponseInterface $response dispatched response
     * @return \Psr\Http\Message\ResponseInterface response with Content-Type filled in
     */
    public static function withDefaultContentType(\Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Runtime sink refuses further bytes (client disconnected): the producer must abort the transfer.
 *
 * Dilempar ke fiber streaming, bukan dengan menghancurkan fiber-nya: fiber yang masih suspend
 * berada di dalam callback tulis cURL, dan menghancurkannya memaksa unwind melewati frame C
 * libcurl sehingga PHP mencetak "curl_exec(): Could not call the CURLOPT_WRITEFUNCTION".
 */
final class StreamAborted extends \RuntimeException
{
}
/**
 * Streaming byte sink for bodies that must not be buffered by the output buffer.
 *
 * In SAPI this sink falls back to `echo` + `flush()` (legacy behaviour, output unchanged).
 * Long-running runtimes install their own writer via {@see bind()} — Swoole writes to
 * `Response::write()`, RoadRunner feeds chunks to a body generator — so core
 * streaming classes need not know their runtime.
 */
final class StreamSink
{
    /**
     * @param callable(string): void|null $writer runtime writer; null reverts to SAPI
     */
    public static function bind(?callable $writer): void
    {
    }
    /**
     * Flush the buffer to the client (SAPI) or do nothing (runtime writer).
     */
    public static function flush(): void
    {
    }
    public static function isBound(): bool
    {
    }
    /**
     * Stream a file to the client chunk by chunk (replacement for `readfile()`, which writes to the buffer).
     *
     * @param string $path file path to read
     */
    public static function sendFile(string $path): void
    {
    }
    /**
     * Enter streaming mode: any buffered output is discarded when a runtime writer is attached,
     * so the body is not duplicated; in SAPI the buffer is still flushed as before.
     */
    public static function startStreaming(): void
    {
    }
    /**
     * Write one body chunk to the client.
     *
     * @param string $chunk bytes sent as-is
     */
    public static function write(string $chunk): void
    {
    }
}
namespace GDPlayer\Http;

/**
 * Request/response context for one request cycle.
 *
 * This is a bridge (not the final architecture): legacy classes that do not yet receive PSR-7 by parameter
 * read this context. Storage lives in {@see RequestContext} so that in Swoole the context
 * does not leak across coroutines; {@see reset()} MUST still be called at the end of every request.
 */
final class State
{
    /**
     * @return array<string, mixed> active request body (form/POST); empty outside a request cycle
     */
    public static function body(): array
    {
    }
    /**
     * @return array<string, mixed> active request cookies (empty outside a request cycle)
     */
    public static function cookies(): array
    {
    }
    public static function getRequest(): ?\Psr\Http\Message\ServerRequestInterface
    {
    }
    public static function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * @return array<string, mixed> active request query string (empty outside a request cycle)
     */
    public static function query(): array
    {
    }
    /**
     * Release all request state (required at the end of the request in a long-running worker).
     */
    public static function reset(): void
    {
    }
    /**
     * One server parameter from the active request (e.g. `REMOTE_ADDR`, `HTTPS`, `REQUEST_URI`).
     *
     * Replacement for `$_SERVER[...]` in classes called on the request path (F10.1).
     *
     * @param string $key parameter name ($_SERVER style)
     * @param string $default value when absent / outside a request cycle
     */
    public static function server(string $key, string $default = ''): string
    {
    }
    public static function set(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): void
    {
    }
    /**
     * Replace the response being built (used by {@see ResponseEmitter} when writing
     * status/header/cookie in a long-running runtime).
     */
    public static function setResponse(\Psr\Http\Message\ResponseInterface $response): void
    {
    }
}
namespace GDPlayer\Logging;

/**
 * Structured JSON logger writing info and error channels to rotating log files.
 */
final class Logger
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    public static function getRequest(): ?\Psr\Http\Message\ServerRequestInterface
    {
    }
    /**
     * INFO channel -- for normal events (not errors), e.g. "video is being fetched
     * in the background". Written to a separate *.log file so the error log stays clean.
     *
     * @param string $message
     * @param array<mixed,mixed> $context
     */
    public static function info(string $message, array $context = []): void
    {
    }
    /**
     * ERROR channel -- for real failures (upstream failure, exception, etc.).
     *
     * @param string $message
     * @param array<mixed,mixed> $context
     */
    public static function log(string $message, array $context = []): void
    {
    }
    public static function setRequest(?\Psr\Http\Message\ServerRequestInterface $request): void
    {
    }
}
namespace GDPlayer\Model;

/**
 * Model for the Google Drive account authentication table (`tb_gdrive_auth`).
 */
class GDriveAuth extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_gdrive_auth` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the Google Drive duplicate-detection table (`tb_gdrive_duplicate`).
 */
class GDriveDuplicate extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_gdrive_duplicate` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the Google Drive mirror accounts table (`tb_gdrive_mirrors`).
 */
class GDriveMirror extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_gdrive_mirrors` table.
     */
    public function __construct()
    {
    }
    /**
     * Delete every mirror row for the given mirror account email.
     *
     * @param string $mirrorEmail mirror account email
     */
    public function deleteByMirrorEmail(string $mirrorEmail): void
    {
    }
}
/**
 * Model for the Google Drive mirror queue table (`tb_gdrive_queue`).
 */
class GDriveQueue extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_gdrive_queue` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the load balancer nodes table (`tb_loadbalancers`).
 */
class LoadBalancer extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_loadbalancers` table.
     */
    public function __construct()
    {
    }
    /**
     * Normalize and sanitize load balancer form input for persistence.
     *
     * @param array<string,mixed> $input raw form input
     * @return array<string,mixed> prepared row data
     */
    public function prepareData(array $input): array
    {
    }
}
/**
 * Model for the MaxMind IP geolocation table (`tb_maxmind`).
 */
class Maxmind extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_maxmind` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the MaxMind ASN table (`tb_maxmind_asn`).
 */
class MaxmindAsn extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_maxmind_asn` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the plugin page routes table (`tb_plugin_routes`).
 */
class PluginRoutes extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_plugin_routes` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the installed plugins table (`tb_plugins`).
 */
class Plugins extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_plugins` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the user sessions table (`tb_sessions`).
 */
class Session extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_sessions` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the application settings table (`tb_settings`).
 */
class Setting extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_settings` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the traffic statistics table (`tb_stats`).
 */
class Stat extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_stats` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the user-agent statistics table (`tb_stats_ua`).
 */
class StatUA extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_stats_ua` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the video subtitles table (`tb_subtitles`).
 */
class Subtitle extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_subtitles` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the subtitle library (`tb_subtitle_manager`), including multi-file/URL upload handling.
 */
class SubtitleManager extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_subtitle_manager` table.
     */
    public function __construct()
    {
    }
    /**
     * ​​$_POST['multiSubUrls'] with language in the filename
     *
     * @return array<array<string,mixed>>
     */
    public function saveMultipleSubtitlesUrls(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * $_POST['sub-url'] and $_POST['lang-url']
     *
     * @return array<array<string,mixed>>
     */
    public function saveMultipleSubtitlesUrls2(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * multi upload subtitle files with $_FILES['multiSubFiles']
     *
     * @return array<array<string,mixed>>
     */
    public function uploadMultipleSubtitlesFiles(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * ​​$_FILES['sub-file'] and $_POST['lang-file']
     *
     * @return array<array<string,mixed>>
     */
    public function uploadMultipleSubtitlesFiles2(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
}
/**
 * Model for the temporary video source queue (`tmp_videos_sources`).
 */
class TmpVideoSource extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tmp_videos_sources` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the users table (`tb_users`), including credential/field validation helpers.
 */
class User extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_users` table.
     */
    public function __construct()
    {
    }
    /**
     * Validate and hash the password submitted through $_POST.
     *
     * @return string bcrypt hash, or an empty string when validation fails
     */
    public function createNewPassword(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    /**
     * Ensure the posted email is valid and not already used by another user.
     *
     * @param int $id current user id to exclude from the uniqueness check
     * @return void
     */
    public function emailChecker(int $id, ?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
    /**
     * Ensure the posted full name is present.
     *
     * @return void
     */
    public function nameChecker(?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
    /**
     * Ensure the posted username is present and not already taken.
     *
     * @param int $id current user id to exclude from the uniqueness check
     * @return void
     */
    public function usernameChecker(int $id, ?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
}
/**
 * Model for the videos table (`tb_videos`), including subtitle persistence helpers.
 */
class Video extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_videos` table.
     */
    public function __construct()
    {
    }
    /**
     * Persist all subtitles submitted with the video form (files and URLs).
     *
     * @param int $id video id the subtitles belong to
     * @return void
     */
    public function saveAllSubtitles(int $id): void
    {
    }
    /**
     * Migrate legacy alternative hosts on old video rows into the alternatives table.
     *
     * @return void
     */
    public function updateOldVideosDB(): void
    {
    }
}
/**
 * Model for the video alternative sources table (`tb_videos_alternatives`).
 */
class VideoAlternative extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_videos_alternatives` table.
     */
    public function __construct()
    {
    }
    /**
     * Replace all alternatives for a video with the given links.
     *
     * @param \GDPlayer\Core\Hosting\Hosting  $hostingService hosting resolver used to parse each link
     * @param int      $videoId        video id
     * @param string[] $alternatives   alternative source URLs
     * @return void
     */
    public function insertMultiByVideoId(\GDPlayer\Core\Hosting\Hosting $hostingService, int $videoId = 0, array $alternatives = []): void
    {
    }
}
/**
 * Model for the video hash lookup table (`tb_videos_hash`).
 */
class VideoHash extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_videos_hash` table.
     */
    public function __construct()
    {
    }
}
/**
 * Model for the resolved video sources table (`tb_videos_sources`), including cached source fetching.
 */
class VideoSource extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `tb_videos_sources` table.
     */
    public function __construct()
    {
    }
    /**
     * Fetch a URL over cURL with retry on server errors (SSRF-guarded).
     *
     * @param string   $url     URL to fetch
     * @param string[] $headers request headers
     * @param int      $retry   current retry attempt
     * @return string|bool response body, or false on failure
     */
    public function getCurlResponse(string $url, array $headers = [], int $retry = 0): string|bool
    {
    }
    /**
     * Look up stored referer/cookie headers for a matching source row.
     *
     * @param string $search full-text search term
     * @return string[] HTTP header lines
     */
    public function getDataHeaders(string $search = ''): array
    {
    }
}
/**
 * Read-only view model for load balancers (`vw_loadbalancers`).
 */
class ViewLoadBalancer extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `vw_loadbalancers` table.
     */
    public function __construct()
    {
    }
}
/**
 * Read-only view model for the subtitle library (`vw_subtitle_manager`).
 */
class ViewSubtitleManager extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `vw_subtitle_manager` table.
     */
    public function __construct()
    {
    }
}
/**
 * Read-only view model for users (`vw_users`).
 */
class ViewUser extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `vw_users` table.
     */
    public function __construct()
    {
    }
}
/**
 * Read-only view model for videos (`vw_videos`).
 */
class ViewVideo extends \GDPlayer\Database\MySQL\Model
{
    /**
     * Bind the model to the `vw_videos` table.
     */
    public function __construct()
    {
    }
}
namespace GDPlayer\Modules;

/**
 * Base controller for module Ajax endpoints (replacement for Helper\AjaxHelper).
 *
 * Behavior is the same as AjaxHelper: data = query + form body + JSON body, token from the
 * Authorization header / adv_token cookie / payload, license guard `isLicenseValid()`, then JSON reply.
 * Difference: the action runs from the {@see static::ACTIONS} list (method name = action name),
 * so there is no ReflectionMethod and any action outside the list is always rejected.
 *
 * Two entry points:
 *  - {@see handle()} for actions marked `protected` (REST route `POST /<action>` and legacy aliases).
 *  - {@see handleList()} for `list()` (REST route `GET /list` and legacy aliases with the `-list` suffix).
 *    `action=list` through the payload is still rejected as before (public `list()` method).
 */
abstract class AbstractAjaxController
{
    use \GDPlayer\Modules\AjaxBaseTrait;
    /**
     * Actions that may be executed (method names in this class).
     *
     * @var string[]
     */
    protected const ACTIONS = [];
    /**
     * Reply shape when an action is denied: true = empty DataTables payload (Ajax\SettingAjax
     * behavior), false = unauthorized JSON.
     */
    protected const DENIED_AS_DATATABLE = false;
    /** Whether this class has its own DataTables payload (`list()`); without it `-list` = Bad request. */
    protected const HAS_LIST = false;
    /**
     * Log message when an action is denied.
     *
     * Empty means no log is written — several legacy classes indeed do not record denials.
     */
    protected const LOG_DENIED_ACTION = '';
    protected const MESSAGE_BAD_REQUEST = 'Bad request';
    protected const MESSAGE_UNAUTHORIZE = 'You are not authorized to access this feature';
    /** Whether the action is admin-only (role 0); public endpoints set this to false. */
    protected const REQUIRE_ADMIN = true;
    /** Whether the action requires login; public endpoints set this to false. */
    protected const REQUIRE_LOGIN = true;
    protected string $action = '';
    protected \GDPlayer\Config\BinFile $binConfig;
    protected \GDPlayer\Config\Config $config;
    /** @var null|array<string,mixed> */
    protected ?array $currentUser = null;
    /** @var array<string,mixed> */
    protected array $data;
    protected int $draw = 0;
    protected mixed $epeMelemek = false;
    /** @var array<string,\Nyholm\Psr7\UploadedFile|null> */
    protected array $files = [];
    protected bool $isAdmin = false;
    protected bool $isAdminShowUserData = false;
    protected bool $isUserShowTheirData = false;
    /** @var string[] */
    protected array $listColumns = [];
    protected \GDPlayer\Core\Security\Security $security;
    protected string $token = '';
    /**
     * Whether this action is exempt from the admin guard (classes with exemptions override it).
     *
     * @param string $action action name
     * @return bool true when the action may run without admin rights
     */
    protected function isAdminExempt(string $action): bool
    {
    }
    /**
     * Additional class-owned guard (e.g. CORS/token validation for public endpoints).
     *
     * @return bool true when the request may run
     */
    protected function isGatePassed(): bool
    {
    }
    /**
     * Actions still served while the license is not validated (`isLicenseValid()` false).
     *
     * Required for the license SAVE path: an instance without a license must still be able to
     * submit its license, otherwise this gate rejects the very request used to enter the
     * license (deadlock: the license could never be stored).
     *
     * @param string $action action name
     * @return bool true when the action may pass without a valid license
     */
    protected function isLicenseGateExempt(string $action): bool
    {
    }
    /**
     * Requested action name from payload/query (used by legacy URL aliases).
     *
     * @return string action name merged from query + body
     */
    final public function actionName(): string
    {
    }
    /**
     * Run a single action and wrap it into a JSON response.
     *
     * @param string $action action name (must exist in ACTIONS)
     * @return \Psr\Http\Message\ResponseInterface JSON response
     */
    final public function handle(string $action): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Run the entity's `list()` then wrap it into a JSON response.
     *
     * @return \Psr\Http\Message\ResponseInterface JSON response
     */
    final public function handleList(): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Entity DataTables payload; entity classes override this method.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
namespace GDPlayer\Modules\Auth;

/**
 * Path halaman panel admin yang dipakai alur login/register/reset password.
 *
 * Enum (bukan kelas konstanta) supaya nilai tetap bisa dilacak IDE dari file mana pun,
 * termasuk dari dalam trait: konstanta milik kelas pemakai tidak terlihat saat trait
 * dibaca sendiri.
 */
enum AuthAdminPath : string
{
    case Dashboard = 'dashboard/';
    case Login = 'login/';
    case Register = 'register/';
    case ResetPassword = 'reset-password/';
}
/**
 * Teks email dan pesan alert pada alur login/register/reset password.
 *
 * Enum (bukan kelas konstanta) supaya nilai tetap bisa dilacak IDE dari file mana pun,
 * termasuk dari dalam trait: konstanta milik kelas pemakai tidak terlihat saat trait
 * dibaca sendiri.
 */
enum AuthMailText : string
{
    /**
     * Badan pesan sukses setelah email konfirmasi terkirim.
     *
     * Nilainya kosong karena teksnya panjang: dirakit di message() supaya tiap baris
     * tetap <= 120 kolom tanpa menyambung dua literal (aturan Sonar S2005).
     */
    case ConfirmationBody = '';
    /** Pesan saat email belum terdaftar. */
    case NotRegistered = 'The account is not registered';
    /** Pesan saat token reset kedaluwarsa atau diubah. */
    case ResetTokenInvalid = 'The reset link is invalid or has expired. Please request a new one.';
    /** Format subject email konfirmasi: (nama situs, nama penerima). */
    case SubjectFormat = 'Confirmation email (%s) | %s';
    /** Query string pembawa token aktivasi/reset di URL. */
    case TokenQuery = '?token=';
    /**
     * Teks pesan untuk case ini (default: nilai enum apa adanya).
     */
    public function message(): string
    {
    }
}
namespace GDPlayer\Modules\Auth\Controllers;

/**
 * Guard login: status, user, recaptcha, early response.
 *
 * Split out of `AuthPageSupportTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `AuthPageSupportTrait` through this trait.
 */
trait AuthLoginGuardTrait
{
    /**
     * Initial login page branch: token activation / logout.
     *
     * @param array<string,mixed> $queryParams query string
     * @return \Psr\Http\Message\ResponseInterface|null response, or null when no branch applies
     */
    protected function loginEarlyResponse(array $queryParams, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * reCAPTCHA & login field completeness guard.
     *
     * @param array<string,mixed> $body form data
     * @return \Psr\Http\Message\ResponseInterface|null denial response, or null to continue
     */
    protected function loginRecaptchaGuard(array $body, string $username, \GDPlayer\Service\Login $login, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Account status guard (2 = awaiting confirmation, 0 = inactive).
     *
     * @param array<string,mixed> $userData user row
     * @return \Psr\Http\Message\ResponseInterface|null denial response, or null when the status may log in
     */
    protected function loginStatusGuard(array $userData, \GDPlayer\Core\Security\Security $security, \GDPlayer\Service\Login $login, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * User existence & password match guard.
     *
     * @param array<string,mixed> $userData user row from the query
     * @return \Psr\Http\Message\ResponseInterface|null denial response, or null when the credentials match
     */
    protected function loginUserGuard(array $userData, string $password, string $username, \GDPlayer\Service\Login $login, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Token login dan respons status.
 *
 * Split out of `AuthPageSupportTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `AuthPageSupportTrait` through this trait.
 */
trait AuthLoginSupportTrait
{
    /**
     * Activate the account through a token (status=1) when token validation succeeds.
     *
     * @return \Psr\Http\Message\ResponseInterface|null response, or null when nothing was processed
     */
    protected function activateLoginToken(bool $checked, \GDPlayer\Model\User $users, string $email, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * `?token=` branch of the login page: account activation / resend the confirmation email.
     */
    protected function loginConfirmToken(string $tokenParam, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Determine the redirect when the user is already logged in or the query carries raw credentials.
     *
     * @param array<string,mixed> $queryParams query string
     */
    protected function loginRedirectTarget(array $queryParams, string $loginURL, string $dashboardURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Follow-up login page branch: state redirect / form submit.
     *
     * @param array<string,mixed> $queryParams query string
     * @param array<string,mixed> $body form data
     * @return \Psr\Http\Message\ResponseInterface|null response, or null when the page must be rendered
     */
    protected function loginStateResponse(array $queryParams, array $body, \GDPlayer\Service\Login $login, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL, string $dashboardURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
}
namespace GDPlayer\View;

/**
 * Base class for HTML views.
 *
 * Request & response are injected via the constructor (user request). Output from old views that still
 * use `echo` is captured through the output buffer, so templates do not need to be rewritten; new views
 * simply `return` a ResponseInterface from {@see render()}.
 *
 * Content-Type is deliberately NOT set so PHP uses the same default mimetype+charset as the
 * old path (byte-for-byte parity).
 */
abstract class AbstractView implements \Psr\Http\Server\RequestHandlerInterface
{
    /** Response marker: the handler already sent its own output (skip emit). */
    public const STREAMED_HEADER = 'X-GD-Streamed';
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request active request
     * @param \Psr\Http\Message\ResponseInterface $response response being built (for status/header/cookie)
     * @param string $action action name for controllers serving several pages
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request, protected \Psr\Http\Message\ResponseInterface $response, protected readonly string $action = '')
    {
    }
    /**
     * Apply the default headers (Cache-Control + CORS) to this request's response.
     *
     * @param bool $enableCache true for responses that may be cached
     * @param int $cacheMaxAge max-age when caching is enabled
     * @return void
     */
    protected function applyDefaultHeaders(bool $enableCache = false, int $cacheMaxAge = 3600): void
    {
    }
    /**
     * Whether view output must be captured by the output buffer (default) or sent directly.
     *
     * When false: the string returned by {@see render()} is considered already sent by the
     * handler (marked with the X-GD-Streamed header, emit is skipped), while a ResponseInterface is still
     * emitted as usual (used by the redirect/error branch of a streaming handler).
     *
     * @return bool
     */
    protected function isBufferingOutput(): bool
    {
    }
    /**
     * Render a Twig template into a string (does not print to the output).
     *
     * @param string $template absolute template path
     * @return string rendered markup
     */
    protected function loadTemplate(string $template): string
    {
    }
    /**
     * View logic. May `echo` (bridge) or return a string/ResponseInterface.
     *
     * @return string|\Psr\Http\Message\ResponseInterface
     */
    abstract protected function render(): string|\Psr\Http\Message\ResponseInterface;
    /**
     * Render a Twig template into a string (does not print to the output).
     *
     * @param string $template absolute template path
     * @param array<string, mixed> $context template data
     * @param bool $frontend true for the frontend layout, false for the backend layout
     * @return string rendered markup
     */
    protected function renderTemplate(string $template, array $context = [], bool $frontend = true): string
    {
    }
    /**
     * Admin guard inside the controller (same semantics as the old Views::adminValidation).
     *
     * @return \Psr\Http\Message\ResponseInterface|null 401/403 response when not allowed, null when allowed to continue
     */
    protected function requireAdmin(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Login guard inside the controller.
     *
     * @return \Psr\Http\Message\ResponseInterface|null 401 response when not logged in, null when allowed to continue
     */
    protected function requireLogin(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Render the view then turn its output into a response.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request active request from PSR-15 (may differ from the one in the constructor
     *                                        when middleware replaced it, so the latest version is always used)
     * @return \Psr\Http\Message\ResponseInterface response ready to send
     */
    final public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
    }
}
namespace GDPlayer\Modules\Auth\Controllers;

/**
 * Email pendaftaran dan pengiriman ulang konfirmasi.
 *
 * Split out of `AuthRegisterSupportTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `AuthRegisterSupportTrait` through this trait.
 */
trait AuthRegisterMailTrait
{
    /**
     * Resend the confirmation email when the user is not active & it was not sent in the last 60 seconds.
     */
    protected function resendConfirmationMail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $email, string $loginURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Send the registration confirmation email.
     *
     * @return \Psr\Http\Message\ResponseInterface send result response
     */
    protected function sendRegistrationEmail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, string $email, string $name, string $loginURL, string $registerURL): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Registrasi: validasi, konfirmasi, dan pengiriman email.
 *
 * Split out of `AuthPageSupportTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `AuthPageSupportTrait` through this trait.
 */
trait AuthRegisterSupportTrait
{
    use \GDPlayer\Modules\Auth\Controllers\AuthRegisterMailTrait;
    /**
     * `?token=` branch of the register page: activate the account after email confirmation.
     */
    protected function registerConfirmToken(string $tokenParam, \GDPlayer\Core\Security\Security $security, \GDPlayer\Service\Login $login, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Initial register page branch: token activation, state redirect, or continue rendering.
     *
     * @param array<string,mixed> $queryParams query string
     * @return \Psr\Http\Message\ResponseInterface|null response, or null when the form must be rendered
     */
    protected function registerEarlyResponse(array $queryParams, bool $enableRegistration, \GDPlayer\Core\Security\Security $security, \GDPlayer\Service\Login $login, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register page redirect when the user is already logged in / registration is disabled.
     *
     * @return \Psr\Http\Message\ResponseInterface|null redirect response, or null when rendering must continue
     */
    protected function registerRedirectTarget(bool $enableRegistration, string $loginURL, string $dashboardURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Build the register form validation alert message ('' when everything is valid).
     *
     * @param array<string,mixed> $body form data
     */
    protected function registerValidationAlert(array $body, string $username, string $email, string $password, string $retypedPassword, \GDPlayer\Model\User $users, \GDPlayer\Service\Login $login): string
    {
    }
    /**
     * Email confirmation registration path: store the user status=2 then send the confirmation email.
     *
     * @param array<string,mixed> $newUserData user data ready to insert
     * @return \Psr\Http\Message\ResponseInterface registration result response
     */
    protected function registerWithConfirmation(array $newUserData, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Reset password: konfirmasi, submit, dan email.
 *
 * Split out of `AuthPageSupportTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `AuthPageSupportTrait` through this trait.
 */
trait AuthResetSupportTrait
{
    /**
     * Send the password reset email to the user.
     *
     * @param array<string,mixed> $userData user row
     */
    protected function deliverResetEmail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, array $userData, string $resetPasswordURL): string
    {
    }
    /**
     * Confirm branch: send the reset email (when allowed) or redirect to step 2.
     *
     * @param array<string,mixed> $body form data
     * @return string|\Psr\Http\Message\ResponseInterface HTML alert, or redirect response
     */
    protected function handleResetConfirm(array $body, \GDPlayer\Config\Config $config, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Process the reset password form submit (confirm link sends email / save new password).
     *
     * @param array<string,mixed> $body form data
     * @return string|\Psr\Http\Message\ResponseInterface HTML alert, or redirect response
     */
    protected function handleResetSubmit(array $body, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $email): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Whether email confirmation is enabled (disable_confirm=false + smtp filled in).
     */
    protected function isMailConfirmationEnabled(\GDPlayer\Config\Config $config): bool
    {
    }
}
/**
 * Login/register/reset-password flow helpers (guards, email sending, form validation).
 *
 * Split out of AuthPageController so the main class stays <=20 methods
 * (rule `.agents/rules/php-code-quality.md`).
 */
trait AuthPageSupportTrait
{
    use \GDPlayer\Modules\Auth\Controllers\AuthLoginGuardTrait;
    use \GDPlayer\Modules\Auth\Controllers\AuthLoginSupportTrait;
    use \GDPlayer\Modules\Auth\Controllers\AuthRegisterSupportTrait;
    use \GDPlayer\Modules\Auth\Controllers\AuthResetSupportTrait;
    /**
     * Send the confirmation email then mark the user status=2 on success.
     *
     * @param array<string, mixed> $userData user row (name/status/updated)
     * @return \Psr\Http\Message\ResponseInterface send result response
     */
    private function deliverConfirmationMail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $email, array $userData, string $loginURL): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Halaman pendaftaran pengguna (form, plain, submit).
 *
 * Split out of `AuthPageController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `AuthPageController` through this trait.
 */
trait AuthRegisterPageTrait
{
    /**
     * Page register.php.
     *
     * @return string|\Psr\Http\Message\ResponseInterface
     */
    protected function registerPage(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Store the user without email confirmation (status active immediately).
     *
     * @param array<string,mixed> $newUserData user data ready to insert
     * @return \Psr\Http\Message\ResponseInterface registration result response
     */
    protected function registerPlain(array $newUserData, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register form submit branch (validation, store the user, send the confirmation email).
     *
     * @param array<string,mixed> $body
     */
    protected function registerSubmit(array $body, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Pages login.php, register.php, reset-password.php.
 *
 * Method yang satu-satunya pemanggilnya ada di AuthPageSupportTrait memakai `protected`:
 * Intelephense (P1003) tidak menghitung pemakaian di dalam trait sebagai pemakaian method
 * kelas, jadi `private` akan salah dilaporkan "declared but not used". Kelas ini `final`,
 * sehingga `protected` setara `private` saat runtime.
 */
final class AuthPageController extends \GDPlayer\View\AbstractView
{
    use \GDPlayer\Modules\Auth\Controllers\AuthPageSupportTrait;
    use \GDPlayer\Modules\Auth\Controllers\AuthRegisterPageTrait;
}
namespace GDPlayer\Modules\Dashboard\Controllers;

/**
 * Filter tanggal, cache key, dan where statistik.
 *
 * Split out of `DashboardAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DashboardAjaxController` through this trait.
 */
trait DashboardFilterTrait
{
    /**
     * Build date filter SQL map safely without mutating global PHP timezone.
     *
     * @return array<string, string>
     */
    protected function buildDateFilterSql(): array
    {
    }
    /**
     * @param string $tag
     * @param string $sql
     * @param null|array<mixed> $params
     * @return string
     */
    protected static function createCacheKey(string $tag, string $sql, ?array $params = null): string
    {
    }
    /**
     * @return array{sql:string,params:array<mixed>}
     */
    protected function createStatSqlWhereWithParams(): array
    {
    }
    /**
     * @return array{sqlWhere:string,sqlParams:array<mixed>,sqlOrder:string}
     */
    protected function statsHelper(): array
    {
    }
}
/**
 * Statistik populer (ASN, browser, negara, video).
 *
 * Split out of `DashboardAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DashboardAjaxController` through this trait.
 */
trait DashboardPopularTrait
{
    /**
     * @param string $sql
     * @param array<mixed> $params
     * @param string $tag
     * @return array<string|int, array<string,mixed>>
     */
    protected function getPopularData(string $sql, array $params, string $tag): array
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function popularASN(): string
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function popularBrowsers(): string
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function popularCountries(): string
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function popularVideos(): string
    {
    }
}
/**
 * Video terbaru dan status server.
 *
 * Split out of `DashboardAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DashboardAjaxController` through this trait.
 */
trait DashboardRecentTrait
{
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function recentVideos(): string
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function serversStatus(): string
    {
    }
}
/**
 * Daftar video dashboard (total, data, DB).
 *
 * Split out of `DashboardAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `DashboardAjaxController` through this trait.
 */
trait DashboardVideoListTrait
{
    protected function getRecordsTotal(string $tag): int
    {
    }
    /**
     * @param string $sql
     * @param null|array<mixed> $params
     * @param string $tag
     * @return list<array<string,mixed>>
     */
    protected function getVideoList(string $sql, ?array $params, string $tag): array
    {
    }
    /**
     * @param string $sql
     * @param null|array<mixed> $params
     * @return list<array<string,mixed>>
     */
    protected function getVideoListFromDB(string $sql, ?array $params): array
    {
    }
}
/**
 * Dashboard widgets and statistics endpoint.
 *
 * Replacement for Ajax\DashboardAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class DashboardAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\Dashboard\Controllers\DashboardFilterTrait;
    use \GDPlayer\Modules\Dashboard\Controllers\DashboardPopularTrait;
    use \GDPlayer\Modules\Dashboard\Controllers\DashboardRecentTrait;
    use \GDPlayer\Modules\Dashboard\Controllers\DashboardVideoListTrait;
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
}
/**
 * Page /administrator/dashboard (login required).
 */
final class DashboardController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Frontend\Controllers;

/**
 * /ads endpoint: random 300x300 PNG image, stored in cache then re-sent from cache.
 *
 * Streaming handler: ``render()`` returns a string (no echo) that is sent by
 * AbstractView::handleStreaming(). Output buffering is disabled; the image cache is used when present.
 */
final class AdController extends \GDPlayer\View\AbstractView
{
}
/**
 * Frontend API endpoints: /api (Core\API payload) and /api-config (player/embed configuration).
 *
 * Both must pass HMAC (X-TS/X-NC/X-SG headers); the reply body is encrypted with a derived key.
 */
final class ApiController extends \GDPlayer\View\AbstractView
{
}
/**
 * /direct/{type}/{slug}/{...} endpoint: look up the video then redirect to hls/mpd/stream-vid.
 *
 * The alternative shape (more than 5 segments) uses an encrypted sqids hash id.
 */
final class DirectController extends \GDPlayer\View\AbstractView
{
}
/**
 * Halaman embed2 (/r) beserta query param dan guard-nya.
 *
 * Split out of `EmbedController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `EmbedController` through this trait.
 */
trait EmbedSecondTrait
{
    /**
     * @return string|\Psr\Http\Message\ResponseInterface
     */
    protected function embed2Page(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Filter the allowed query then complete host/id/uid (null = source+id combination without uid).
     *
     * @param \GDPlayer\Config\Config $config site configuration
     * @return array<string, mixed>|null query ready to use, or null when a 403 is required
     */
    protected function embed2QueryParams(\GDPlayer\Config\Config $config): ?array
    {
    }
    /**
     * Build the destination URL (embed/download) from the encrypted query, or the embed2 player HTML.
     *
     * @param \GDPlayer\Config\Config $config site configuration
     * @param array<string, mixed> $queryParams filtered & completed query
     * @return string|\Psr\Http\Message\ResponseInterface plain URL, redirect, or embed2 page
     */
    protected function embed2Response(\GDPlayer\Config\Config $config, array $queryParams): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Placeholder values for the embed2 page.
     *
     * @param \GDPlayer\Config\Config $config site configuration
     * @param string $embedURL encrypted embed URL
     * @return list<string> lang, BASE_URL, loader, embedURL, referer
     */
    protected function embed2Values(\GDPlayer\Config\Config $config, string $embedURL): array
    {
    }
    /**
     * Whether the embed2 page must be blocked (browser blacklist / request-url feature disabled).
     *
     * @param \GDPlayer\Config\Config $config site configuration
     * @return bool true when the request must be answered with 403
     */
    protected function isEmbed2Blocked(\GDPlayer\Config\Config $config): bool
    {
    }
}
/**
 * Public player pages: embed (/e), download (/d), and embed2 (/r).
 *
 * The slugs used by the installation are read from configuration (slug_embed/slug_download/slug_request);
 * the slug -> class mapping lives in RouteRegistry.
 */
final class EmbedController extends \GDPlayer\View\AbstractView
{
    use \GDPlayer\Modules\Frontend\Controllers\EmbedSecondTrait;
}
/**
 * Static frontend pages: /changelog, /sharer, and /sitemap(.xml).
 */
final class PageController extends \GDPlayer\View\AbstractView
{
}
/**
 * Endpoint /redirect/{encrypted}/{path...}: decrypt the destination then redirect.
 */
final class RedirectController extends \GDPlayer\View\AbstractView
{
}
/**
 * /telemetry endpoint: receive player TTFB reports then reply with JSON.
 *
 * The legacy view's OPTIONS branch was not ported: Application::run() answers OPTIONS
 * with 204 before dispatch, so that branch was in fact never reachable.
 */
final class TelemetryController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\GDrive\Controllers;

/**
 * Google Drive account management endpoint (list, add, edit, delete).
 *
 * Replacement for Ajax\GDriveAccountAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveAccountAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
/**
 * Pembersihan berkas duplikat di Drive.
 *
 * Split out of `GDriveFileAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GDriveFileAjaxController` through this trait.
 */
trait GDriveDuplicateTrait
{
    protected function removeDuplicateFiles(): string
    {
    }
    /**
     * @param array<string,mixed> $driveFileItem
     * @param string $sha1
     * @param string $sha256
     * @param string $description
     * @return bool|string
     */
    protected function removeDuplicateFilesByData(array $driveFileItem = [], string $sha1 = '', string $sha256 = '', string $description = ''): bool|string
    {
    }
}
/**
 * Aksi berkas Drive: folder baru, hapus, impor, rename, status.
 *
 * Split out of `GDriveFileAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `GDriveFileAjaxController` through this trait.
 */
trait GDriveFileActionTrait
{
    protected function createNewFolder(): string
    {
    }
    protected function delete(): string
    {
    }
    protected function deleteMirror(): string
    {
    }
    protected function gdriveImport(): string
    {
    }
    protected function getSharedDrives(): string
    {
    }
    protected function renameFileFolder(): string
    {
    }
    protected function updateStatus(): string
    {
    }
}
/**
 * Google Drive file browser endpoint (list, mirror, delete).
 *
 * Replacement for Ajax\GDriveFileAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveFileAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\GDrive\Controllers\GDriveDuplicateTrait;
    use \GDPlayer\Modules\GDrive\Controllers\GDriveFileActionTrait;
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
/**
 * Page gdrive/files.php (retired once this controller was proven identical).
 */
final class GDriveFileController extends \GDPlayer\View\AbstractView
{
}
/**
 * Google Drive mirror management endpoint (list, add, remove).
 *
 * Replacement for Ajax\GDriveMirrorAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveMirrorAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
/**
 * Pages gdrive/list.php, gdrive/backup-files.php, gdrive/backup-queue.php, gdrive/edit.php, gdrive/new.php.
 */
final class GDrivePageController extends \GDPlayer\View\AbstractView
{
}
/**
 * Google Drive mirror queue endpoint (list, enqueue, clear).
 *
 * Replacement for Ajax\GDriveQueueAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveQueueAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
namespace GDPlayer\Modules\LoadBalancers\Controllers;

/**
 * Load balancer endpoint (list, delete, change status). Replacement for Ajax\LoadBalancerAjax.
 */
final class LoadBalancerAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * DataTables payload for the load balancer list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
/**
 * Pages load-balancers/list.php, load-balancers/edit.php, load-balancers/new.php.
 */
final class LoadBalancerController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Logs\Controllers;

/**
 * Page /administrator/log: log viewer + API endpoint (list/download/clear/delete/read).
 */
final class LogController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Plugins\Controllers;

/**
 * Page /administrator/plugins/config: plugin-owned configuration page (views/backend/*.php),
 * plus JSON mode (?sync=1) for the load balancer.
 */
final class PluginConfigController extends \GDPlayer\View\AbstractView
{
}
/**
 * Plugins page: list (page + DataTables endpoint) and uninstall (JSON endpoint).
 */
final class PluginController extends \GDPlayer\View\AbstractView
{
}
/**
 * Ekstraksi arsip plugin, registrasi rute, dan penyimpanan record.
 *
 * Split out of `PluginInstallController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginInstallController` through this trait.
 */
trait PluginInstallRecordTrait
{
    /**
     * Write stage: determine the target, extract, store the record, sync routes.
     *
     * @param array{json: array<string, mixed>, temp: string} $prepared result of preparePluginInstall()
     */
    protected function completePluginInstall(array $prepared): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Determine the plugin installation target folder (reused when the version differs).
     *
     * @param array<string,mixed> $pluginJson
     * @return array<string,mixed>|ResponseInterface response = same version already installed
     */
    /**
     * Evaluate plugin folder collisions.
     *
     * @param array<string, mixed> $pluginJson new plugin manifest
     * @return string 'new' move folder, 'reject' same version rejected, 'free' folder available,
     *         'upgrade' upgrade in the same folder
     */
    protected function evaluateTargetCollision(string $destPath, array $pluginJson): string
    {
    }
    /**
     * Extract the archive + store the plugin record + sync routes.
     *
     * @param array<string, mixed> $pluginJson plugin manifest
     * @param array<string, mixed> $target result of resolveInstallTarget()
     * @return string|null error message, or null on success
     */
    protected function extractAndRegister(array $pluginJson, array $target, string $zipTempPath): ?string
    {
    }
    /**
     * Store/update the plugin row + copy the ZIP to the tmp folder (returns the plugin id).
     *
     * @param array<string,mixed> $pluginJson
     */
    protected function savePluginRecord(array $pluginJson, string $finalFolderRelative, string $zipTempPath): int
    {
    }
}
/**
 * Langkah persiapan instalasi plugin: guard, target, dan resolusi folder.
 *
 * Split out of `PluginInstallController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginInstallController` through this trait.
 */
trait PluginInstallStepTrait
{
    /**
     * @return ResponseInterface
     */
    /**
     * Access guard: only admins may install plugins.
     *
     * @return \Psr\Http\Message\ResponseInterface|null denial response, or null when allowed
     */
    protected function installGuard(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Read stage: ZIP upload + validated plugin.json manifest.
     *
     * @return array{json: array<string, mixed>, temp: string}|\Psr\Http\Message\ResponseInterface install-ready data, or
     *         failure response
     */
    protected function preparePluginInstall(): array|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Determine the installation target folder (upgrade when the folder holds the same plugin
     * with a different version).
     *
     * @param array<string, mixed> $pluginJson plugin manifest
     * @param bool $useCli whether the plugin is installed through the CLI
     * @return array<string, mixed>|\Psr\Http\Message\ResponseInterface installation target
     */
    protected function resolveInstallTarget(array $pluginJson, bool $useCli): array|\Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Endpoint /administrator/plugins/install: upload & install a plugin from ZIP (JSON).
 */
final class PluginInstallController extends \GDPlayer\View\AbstractView
{
    use \GDPlayer\Modules\Plugins\Controllers\PluginInstallRecordTrait;
    use \GDPlayer\Modules\Plugins\Controllers\PluginInstallStepTrait;
}
/**
 * Endpoint /administrator/plugins/sync: ping (stamp isi folder), download (kirim ZIP), dan
 * notify (mulai tugas tarik di server ini). ping/download autentik dengan sync salt (server
 * remote); ping dan notify juga menerima sesi admin.
 *
 * Arsip dinamai `<folder>-<stamp>.zip`, jadi isi yang tidak berubah tidak pernah dibangun
 * ulang dan tidak pernah ditimpa saat sedang dikirim ke server lain.
 */
final class PluginSyncController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\PublicEndpoint\Controllers;

/**
 * Impor massal subtitle dan proses bulk.
 *
 * Split out of `PublicAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PublicAjaxController` through this trait.
 */
trait PublicBulkActionTrait
{
    protected function saveBulkProcess(): string
    {
    }
    /**
     * @param int $videoId
     * @param list<array<string,mixed>> $tracks
     * @return int
     */
    protected function saveBulkSubtitles(int $videoId = 0, array $tracks = []): int
    {
    }
}
/**
 * Aksi player publik: cache, create player, bypass limit.
 *
 * Split out of `PublicAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PublicAjaxController` through this trait.
 */
trait PublicPlayerActionTrait
{
    protected function clearVideoCache(): string
    {
    }
    protected function createPlayer(): string
    {
    }
    protected function gdriveBypassLimit(): string
    {
    }
}
/**
 * Pencatatan statistik kunjungan.
 *
 * Split out of `PublicAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PublicAjaxController` through this trait.
 */
trait PublicStatTrait
{
    /**
     * Guard specific to public endpoints (used by AbstractAjaxController before the action runs).
     *
     * @return bool true when the request may continue
     */
    protected function isGatePassed(): bool
    {
    }
    protected function saveStat(int $videoId = 0, int $currentViews = 0): int
    {
    }
    protected function statCounter(): string
    {
    }
}
/**
 * Public (unauthenticated) endpoint for video/poster/subtitle actions.
 *
 * Replacement for Ajax\PublicAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class PublicAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\PublicEndpoint\Controllers\PublicBulkActionTrait;
    use \GDPlayer\Modules\PublicEndpoint\Controllers\PublicPlayerActionTrait;
    use \GDPlayer\Modules\PublicEndpoint\Controllers\PublicStatTrait;
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
}
namespace GDPlayer\Modules\Sessions\Controllers;

/**
 * User session endpoint (list, delete). Replacement for Ajax\SessionAjax.
 *
 * `delete` action (protected) + `list` (DataTables).
 */
final class SessionAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * DataTables payload for the session list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
namespace GDPlayer\Modules\Settings\Controllers;

/**
 * Aksi pembersihan cache dari halaman pengaturan.
 *
 * Split out of `SettingAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingAjaxController` through this trait.
 */
trait SettingCacheActionTrait
{
    protected function clearAllCache(): string
    {
    }
    protected function clearLoadBalancer(): string
    {
    }
    protected function clearSettingsCache(): string
    {
    }
    protected function clearVideosCache(): string
    {
    }
    protected function clearVideosFiles(): string
    {
    }
    protected function deleteCacheTmpDir(): bool
    {
    }
    protected function resetHosts(): string
    {
    }
}
/**
 * Aksi custom VAST dan preferensi dialog.
 *
 * Split out of `SettingAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingAjaxController` through this trait.
 */
trait SettingVastActionTrait
{
    protected function createCustomVast(): string
    {
    }
    protected function deleteCustomVast(): string
    {
    }
    protected function hideExtDialog(): string
    {
    }
}
/**
 * Admin settings endpoint (read, save, license, custom headers).
 *
 * Replacement for Ajax\SettingAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class SettingAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\Settings\Controllers\SettingCacheActionTrait;
    use \GDPlayer\Modules\Settings\Controllers\SettingVastActionTrait;
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
}
/**
 * Aset situs: manifest PWA, favicon, dan unggahan logo.
 *
 * Split out of `SettingController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingController` through this trait.
 */
trait SettingAssetTrait
{
    /**
     * Build the PWA manifest.json contents.
     *
     * @param array<string,mixed>  $body
     * @param list<array<string,string>> $icons
     * @return array<string,mixed>
     */
    protected function buildPwaManifest(array $body, array $icons, string $size512): array
    {
    }
    /**
     * Create `favicon.ico` from the logo (requires the GD extension).
     */
    protected function generateFavicon(string $logoFile, string $faviconFile): void
    {
    }
    /**
     * Accept the favicon/logo upload (PNG) and derive every PWA icon.
     *
     * @param array<string,mixed> $uploadedFiles
     */
    protected function handleLogoUpload(array $uploadedFiles, string $imgDir, string $logoFile): void
    {
    }
    /**
     * Write manifest.json (log on failure).
     *
     * @param array<string,mixed> $manifest
     */
    protected function writeManifest(array $manifest): void
    {
    }
}
/**
 * Halaman iklan, custom header, shortlink, dan reset.
 *
 * Split out of `SettingController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingController` through this trait.
 */
trait SettingContentPageTrait
{
    /**
     * Page settings/ads.php.
     *
     * @return string
     */
    protected function adsPage(): string
    {
    }
    /**
     * Page settings/custom-headers.php.
     *
     * @return string
     */
    protected function customHeadersPage(): string
    {
    }
    /**
     * Page settings/reset.php.
     *
     * @return string
     */
    protected function resetPage(): string
    {
    }
    /**
     * Page settings/shortlink.php.
     *
     * @return string
     */
    protected function shortlinkPage(): string
    {
    }
}
/**
 * Halaman pengaturan umum, hosting, dan publik.
 *
 * Split out of `SettingController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingController` through this trait.
 */
trait SettingGeneralPageTrait
{
    /**
     * Page settings/general.php.
     *
     * @return string
     */
    protected function generalPage(): string
    {
    }
    /**
     * Page settings/hosting.php.
     *
     * @return string
     */
    protected function hostingPage(): string
    {
    }
    /**
     * Page settings/public.php.
     *
     * @return string
     */
    protected function publicPage(): string
    {
    }
}
/**
 * Halaman pengaturan misc dan SMTP.
 *
 * Split out of `SettingController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingController` through this trait.
 */
trait SettingMiscPageTrait
{
    /**
     * Page settings/misc.php.
     *
     * @return string
     */
    protected function miscPage(): string
    {
    }
    /**
     * Page settings/smtp.php.
     *
     * @return string
     */
    protected function smtpPage(): string
    {
    }
}
/**
 * Settings page helpers (SettingController) — split out so the main class stays <=20 methods
 * (rule `.agents/rules/php-code-quality.md`).
 */
trait SettingPageTrait
{
    /**
     * Frontend loader list from the templates/frontend/loader folder.
     *
     * @return array<string,string> loader name => label
     */
    private function buildLoaderList(): array
    {
    }
    /**
     * Allowed video resolutions.
     *
     * @return list<int|string> resolution list
     */
    private function buildResolutions(): array
    {
    }
    /**
     * CSS skin list from the active player's assets/skin folder.
     *
     * @return array<string,string> skin name => label
     */
    private function buildSkinList(string $currentPlayer): array
    {
    }
    /**
     * Move the uploaded logo file to the images folder.
     *
     * @param array<string, mixed>|null $faviconMeta upload metadata
     * @return int true when the file was moved successfully
     */
    private function moveUploadedLogo(?array $faviconMeta, string $imgDir, string $logoFile): int
    {
    }
    /**
     * Parse the custom headers form JSON into a structured item list.
     *
     * @param array<string, mixed> $body form data
     * @return list<array{keywords:string[],headers:array<string,string>}> custom headers items
     */
    private function parseCustomHeaders(array $body): array
    {
    }
    /**
     * Parse "key: value" lines into an assoc header array.
     *
     * @return array<string,string> parsed headers
     */
    private function parseHeaderLines(string $raw): array
    {
    }
    /**
     * Generate every icon size variant from the logo file.
     */
    private function resizeIconSet(\GDPlayer\Service\Media\SimpleImage $imageProcessor, string $imgDir, string $logoFile): void
    {
    }
    /**
     * Save player settings (strip the leading '#' from colors) when the request is a POST.
     *
     * @param array<string, mixed> $body form data
     */
    private function savePlayerSettings(array $body, string $requestMethod, \GDPlayer\Config\Config $configModel, string $title): void
    {
    }
}
/**
 * Halaman pengaturan player dan situs.
 *
 * Split out of `SettingController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SettingController` through this trait.
 */
trait SettingPlayerPageTrait
{
    /**
     * Page settings/player.php.
     *
     * @return string
     */
    protected function playerPage(): string
    {
    }
    /**
     * Page settings/site.php.
     *
     * @return string
     */
    protected function sitePage(): string
    {
    }
}
/**
 * Pages settings/ads.php, settings/custom-headers.php, settings/general.php, settings/hosting.php,
 * settings/misc.php, settings/player.php, settings/public.php, settings/reset.php, settings/shortlink.php,
 * settings/site.php, settings/smtp.php.
 */
final class SettingController extends \GDPlayer\View\AbstractView
{
    use \GDPlayer\Modules\Settings\Controllers\SettingAssetTrait;
    use \GDPlayer\Modules\Settings\Controllers\SettingContentPageTrait;
    use \GDPlayer\Modules\Settings\Controllers\SettingGeneralPageTrait;
    use \GDPlayer\Modules\Settings\Controllers\SettingMiscPageTrait;
    use \GDPlayer\Modules\Settings\Controllers\SettingPageTrait;
    use \GDPlayer\Modules\Settings\Controllers\SettingPlayerPageTrait;
}
/**
 * Endpoint /administrator/settings/sync (webhook load balancer) — JSON.
 */
final class SettingSyncController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Stream\Controllers;

/**
 * Standby engine fallback: /stream-{seg,ts,vid}2 and /stream-{seg,ts,vid}3.
 *
 * When the engine (suffix 2 or 3) is not alive **or** its reverse proxy configuration is not
 * in place, the request is forwarded to the main engine endpoint with the same URL minus the
 * number so it is served by the PHP path ({@see Master}).
 */
final class EngineFallbackController extends \GDPlayer\View\AbstractView
{
}
/**
 * Endpoint /filmstrip/{encrypted url}: filmstrip VTT for the player.
 */
final class FilmstripController extends \GDPlayer\View\AbstractView
{
}
/**
 * Endpoint /poster?url=... (or /poster/{encrypted url}): poster image proxy + disk cache.
 *
 * Streaming handler: chunks are sent straight to the client while being written to the cache file,
 * so output buffering is disabled (see AbstractView::isBufferingOutput()).
 */
final class PosterController extends \GDPlayer\View\AbstractView
{
}
/**
 * Passthrough streaming handler: hls, mpd, stream-seg, stream-ts, stream-vid.
 *
 * Body & headers are sent directly by {@see Master}/{@see Stream}, so it does not
 * use output buffering (see AbstractView::isBufferingOutput()).
 *
 * Runtime override (F7.3): when an engine plugin is active (Swoole = `2`, RoadRunner = `3`), segment/TS/video
 * requests are redirected to that engine when alive (previously `PluginManager::redirectEngineAlive`), so those
 * plugin view files are no longer invoked.
 *
 * Playlists are NOT rewritten here: the parsers write the active engine slug themselves
 * ({@see HLSParser::tsSeparator()}, {@see MPDParser::segSeparator()}),
 * so `/hls` and `/mpd` need no buffered `str_replace`.
 */
final class StreamController extends \GDPlayer\View\AbstractView
{
}
/**
 * Endpoint /subtitle/{encrypted url}: fetch the subtitle from its source, convert to VTT, cache.
 */
final class SubtitleController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Subtitles\Controllers;

/**
 * Aksi subtitle: migrasi, rename, dan unggah.
 *
 * Split out of `SubtitleAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SubtitleAjaxController` through this trait.
 */
trait SubtitleActionTrait
{
    protected function migrate(): string
    {
    }
    protected function rename(): string
    {
    }
    protected function uploadSubtitle(): string
    {
    }
}
/**
 * Subtitle library endpoint (list, upload, convert, delete).
 *
 * Replacement for Ajax\SubtitleAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class SubtitleAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\Subtitles\Controllers\SubtitleActionTrait;
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
namespace GDPlayer\Modules\System\Controllers;

/**
 * Admin-only endpoint for cache clearing and server status metrics.
 *
 * Replacement for Ajax\PrivateAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class AdminApiController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
}
/**
 * Endpoint /clear-cache (token admin): balas 'ok'/'fail'.
 */
final class CacheController extends \GDPlayer\View\AbstractView
{
}
/**
 * Endpoint /cron-proxy: validate the proxy list, admin only. JSON reply.
 */
final class CronProxyController extends \GDPlayer\View\AbstractView
{
}
/**
 * Page /administrator/403 (backend layout).
 */
final class ForbiddenController extends \GDPlayer\View\AbstractView
{
}
/**
 * GET /health-check — metrik ringkas server (koneksi aktif, load, memori).
 */
final class HealthController
{
    /**
     * @return \Psr\Http\Message\ResponseInterface JSON metrik
     */
    public function index(): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Eksekusi berkas/query migrasi dan pengaturan koneksi.
 *
 * Split out of `MigrationController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrationController` through this trait.
 */
trait MigrationExecuteTrait
{
    /**
     * execute_files action: move the legacy uploads folder, regenerate nginx.conf, clear cache.
     *
     * @param \GDPlayer\Config\Config $config site configuration
     * @param string $tmpQueryFile query holder file
     * @return \Psr\Http\Message\ResponseInterface JSON response containing the log
     */
    protected function executeFilesAction(\GDPlayer\Config\Config $config, string $tmpQueryFile): \Psr\Http\Message\ResponseInterface
    {
    }
    protected function executeQueryAction(\PDO $pdoWrite, string $tmpQueryFile): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Copy every file from the source folder to the destination folder then delete the source folder.
     *
     * @param string $sourceDir source folder
     * @param string $destinationDir destination folder
     * @return void
     */
    protected function migrateDirectory(string $sourceDir, string $destinationDir): void
    {
    }
    /**
     * Enable/disable MySQL bulk mode during migration.
     *
     * @param \PDO $pdoWrite write connection
     * @param bool $enable true at start, false when finished
     * @return void
     */
    protected function setMysqlBulkMode(\PDO $pdoWrite, bool $enable): void
    {
    }
    /**
     * execute_query action: run a single query by index.
     *
     * @param string $tmpQueryFile query holder file
     * @param PDO $pdoWrite write connection
     * @return ResponseInterface JSON response
     */
    /**
     * Validate the file & query index before execution.
     *
     * @param string $tmpQueryFile query holder file
     * @param int $index requested query index
     * @return \Psr\Http\Message\ResponseInterface|null error response, or null when valid
     */
    protected function validateQueryIndex(string $tmpQueryFile, int $index): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Open the write connection with 4 attempts (100 ms delay starting from the second attempt).
     *
     * @return \PDO|null write connection, null when it still fails
     */
    protected function writeConnection(): ?\PDO
    {
    }
}
/**
 * Helper respons JSON dan persiapan aksi migrasi.
 *
 * Split out of `MigrationController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrationController` through this trait.
 */
trait MigrationResponseTrait
{
    /**
     * @param array<string, mixed> $data reply payload
     * @return \Psr\Http\Message\ResponseInterface JSON response
     */
    protected function jsonResponse(array $data): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * prepare action: assemble every migration query then store it in the temporary file.
     *
     * @param \PDO $pdoWrite write connection
     * @param string $tmpQueryFile query holder file
     * @return \Psr\Http\Message\ResponseInterface JSON response
     */
    protected function prepareAction(\PDO $pdoWrite, string $tmpQueryFile): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Halaman UI migrasi dan render respons.
 *
 * Split out of `MigrationController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `MigrationController` through this trait.
 */
trait MigrationViewTrait
{
    /**
     * @return string|\Psr\Http\Message\ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Migration UI (used when there is no action parameter).
     *
     * @return string page markup
     */
    protected function uiPage(): string
    {
    }
}
/**
 * Endpoint migrasi database web (via `/web-migrate` & `/web-migrate.php`):
 * view UI + 4 aksi AJAX (prepare, execute_query, execute_files, finish).
 */
final class MigrationController extends \GDPlayer\View\AbstractView
{
    use \GDPlayer\Modules\System\Controllers\MigrationExecuteTrait;
    use \GDPlayer\Modules\System\Controllers\MigrationResponseTrait;
    use \GDPlayer\Modules\System\Controllers\MigrationViewTrait;
}
/**
 * Aset UI endpoint migrasi: nama berkas antrean query dan HTML halaman migrasi.
 *
 * Halaman dipecah dua berkas (rule php:S2042) dan dirangkai di sini.
 */
final class MigrationUi
{
    /** Halaman migrasi utuh; `{{FILENAME}}` diganti nama berkas entry point. */
    public const HTML = \GDPlayer\Modules\System\Controllers\MigrationUiHead::HTML . \GDPlayer\Modules\System\Controllers\MigrationUiBody::HTML;
    /** Holder file for the temporary query list (inside public/). */
    public const QUERY_FILE = 'migrate_queries_temp.json';
}
/**
 * Bagian <body> halaman migrasi (markup + skrip).
 *
 * Dipisah dari `MigrationUi` (rule php:S2042) agar tiap berkas tetap ramping;
 * halaman utuh dirangkai kembali oleh `MigrationUi::HTML`.
 */
final class MigrationUiBody
{
    public const HTML = <<<'HTML'
    
    <body>
    
        <div class="container">
            <h1>GDPlayer Web Migration</h1>
    
            <div class="warning">
                <strong>⚠️ Security Warning</strong>
                Once this migration process is complete, <b>immediately delete</b> this file {{FILENAME}}
                from your server. Leaving the migration file publicly accessible can compromise
                the security of your database.
            </div>
    
            <span id="status-text">Ready to begin migration. Do not close this page while the process is in progress.</span>
    
            <p><button id="btn-start" class="btn" onclick="startMigration()">Start Database Migration</button></p>
    
            <div id="progress-wrapper">
                <div id="progress-bar">0%</div>
            </div>
    
            <div id="log-console" class="log-box">> Waiting for instructions...</div>
    
            <button id="btn-done" class="btn" style="display:none" onclick="finish()">Done</button>
        </div>
    
        <script>
            const btnStart = document.getElementById('btn-start');
            const logConsole = document.getElementById('log-console');
            const statusText = document.getElementById('status-text');
            const progressBar = document.getElementById('progress-bar');
            const progressWrapper = document.getElementById('progress-wrapper');
            const btnDone = document.getElementById('btn-done');
    
            function addLog(message, isError = false) {
                const span = document.createElement('span');
                span.style.color = isError ? '#ff6b6b' : '#00ff00';
                span.innerText = `> ${message}\n`;
                logConsole.appendChild(span);
                logConsole.scrollTop = logConsole.scrollHeight;
            }
    
            async function finish() {
                let qRes = await fetch('?action=finish');
                let qData = await qRes.json();
                if (qData.status === 'success') {
                    location.href = location.href;
                }
            }
    
            async function startMigration() {
                if (!confirm("Are you sure you want to start the migration process now?")) return;
    
                btnStart.disabled = true;
                progressWrapper.style.display = 'block';
                logConsole.innerHTML = '';
    
                addLog("Starting the migration data preparation process...");
                statusText.innerText = "Step 1/3: Preparing the query...";
    
                try {
                    // TAHAP 1: PREPARE
                    let prepRes = await fetch('?action=prepare');
                    let prepData = await prepRes.json();
    
                    if (prepData.status !== 'success') {
                        throw new Error("Failed to prepare data:" + prepData.message);
                    }
    
                    const totalQueries = prepData.total;
                    addLog(`Preparation successful. Found ${totalQueries} queries to execute.`);
    
                    // TAHAP 2: EXECUTE QUERIES (Satu per satu)
                    for (let i = 0; i < totalQueries; i++) {
                        statusText.innerText = `Step 2/3: Execute database query (${i + 1}/${totalQueries})...`;
    
                        let qRes = await fetch(`?action=execute_query&index=${i}`);
                        let qData = await qRes.json();
    
                        if (qData.status === 'success') {
                            // Log sukses tidak perlu selalu diprint semuanya agar browser tidak lag, cukup sesekali
                            if (i % 10 === 0 || i === totalQueries - 1) {
                                addLog(`[${i + 1}/${totalQueries}] Query executed successfully.`);
                            }
                        } else {
                            addLog(`[${i + 1}/${totalQueries}] ❌ Error: ${qData.message}`, true);
                        }
    
                        // Update Progress Bar
                        let percentage = Math.round(((i + 1) / totalQueries) * 100);
                        progressBar.style.width = percentage + '%';
                        progressBar.innerText = percentage + '%';
                    }
    
                    // TAHAP 3: MIGRATE FILES & CACHE
                    statusText.innerText = "Step 3/3: Migrating file folders and clearing cache...";
                    addLog("Executing uploads folder move and cache clearing...");
    
                    let fileRes = await fetch('?action=execute_files');
                    let fileData = await fileRes.json();
    
                    if (fileData.status === 'success') {
                        fileData.logs.forEach(l => addLog("✅ " + l));
    
                        statusText.innerText = "✅ Migration Completed!";
                        statusText.style.color = "#27ae60";
                        addLog("\n🎉 ALL MIGRATION PROCESS SUCCESSFUL! Please delete this file for security reasons.");
    
                        btnDone.style.display = 'block';
                    } else {
                        throw new Error("Failed to migrate files:" + fileData.message);
                    }
    
                } catch (error) {
                    statusText.innerText = "❌ A Fatal Error Occurred!";
                    statusText.style.color = "#c0392b";
                    addLog(error.message, true);
                }
            }
        </script>
    
    </body>
    
    </html>
    
    HTML;
}
/**
 * Bagian <head> halaman migrasi (meta, style).
 *
 * Dipisah dari `MigrationUi` (rule php:S2042) agar tiap berkas tetap ramping;
 * halaman utuh dirangkai kembali oleh `MigrationUi::HTML`.
 */
final class MigrationUiHead
{
    public const HTML = <<<'HTML'
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GDPlayer Database Migration Tool</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: #f4f6f8;
                padding: 20px;
                color: #333;
            }
    
            .container {
                max-width: 800px;
                margin: 0 auto;
                background: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
    
            h1 {
                margin-top: 0;
                color: #2c3e50;
                font-size: 24px;
            }
    
            .warning {
                background: #fff3cd;
                color: #856404;
                padding: 15px;
                border-left: 5px solid #ffeeba;
                margin-bottom: 20px;
                font-size: 14px;
                border-radius: 4px;
            }
    
            .warning strong {
                display: block;
                margin-bottom: 5px;
            }
    
            #progress-wrapper {
                width: 100%;
                background: #e9ecef;
                border-radius: 5px;
                margin: 20px 0;
                overflow: hidden;
                display: none;
            }
    
            #progress-bar {
                width: 0%;
                height: 25px;
                background: #3498db;
                transition: width 0.3s;
                text-align: center;
                color: white;
                line-height: 25px;
                font-size: 12px;
                font-weight: bold;
            }
    
            .log-box {
                width: 100%;
                height: 300px;
                background: #1e1e1e;
                color: #00ff00;
                padding: 15px;
                border-radius: 5px;
                overflow-y: scroll;
                font-family: monospace;
                font-size: 13px;
                box-sizing: border-box;
                line-height: 1.5;
                margin-bottom: 20px;
            }
    
            .btn {
                background: #27ae60;
                color: white;
                border: none;
                padding: 12px 20px;
                font-size: 16px;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
                width: 100%;
                transition: background 0.3s;
            }
    
            .btn:hover {
                background: #219653;
            }
    
            .btn:disabled {
                background: #95a5a6;
                cursor: not-allowed;
            }
    
            #status-text {
                font-weight: bold;
                color: #2980b9;
                margin-bottom: 10px;
                display: block;
            }
        </style>
    </head>
    HTML;
}
/**
 * GET /ping — run the background worker then return its JSON status.
 */
final class PingController
{
    /**
     * @return \Psr\Http\Message\ResponseInterface JSON result of Background::run()
     */
    public function index(): \Psr\Http\Message\ResponseInterface
    {
    }
}
namespace GDPlayer\Modules\Themes\Controllers;

/**
 * Endpoint /administrator/themes/sync: ping (stamp isi folder) & download (kirim ZIP).
 *
 * Arsip dinamai `<folder>-<stamp>.zip`, jadi isi yang tidak berubah tidak pernah dibangun
 * ulang dan tidak pernah ditimpa saat sedang dikirim ke server lain.
 */
final class ThemeSyncController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Users\Controllers;

/**
 * Page /administrator/profile (login required): view & change your own account data.
 */
final class ProfileController extends \GDPlayer\View\AbstractView
{
}
/**
 * User management endpoint (list, create, edit, delete, password).
 *
 * Replacement for Ajax\UserAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class UserAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
/**
 * User pages (admin only): list, new, edit, sessions.
 *
 * The action is selected through the constructor ($action) — see RouteRegistry::viewHandler().
 */
final class UserController extends \GDPlayer\View\AbstractView
{
}
namespace GDPlayer\Modules\Videos\Controllers;

/**
 * Page dmca.php.
 *
 * Result of converting the legacy view; markup & logic kept as-is so the output is identical.
 */
final class DmcaController extends \GDPlayer\View\AbstractView
{
}
/**
 * Rename massal dan penyusunan judul hasil proses.
 *
 * Split out of `VideoAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoAjaxController` through this trait.
 */
trait VideoBulkActionTrait
{
    /**
     * @param array<array<string,mixed>> $videoRecords
     * @param string $prefix
     * @param string $postfix
     * @param string $searchPattern
     * @param string $replacementPattern
     * @return int
     */
    protected function applyBulkRename(array $videoRecords, string $prefix, string $postfix, string $searchPattern, string $replacementPattern): int
    {
    }
    protected function buildProcessedTitle(string $title, string $prefix, string $postfix, string $searchPattern, string $replacementPattern): string
    {
    }
    /**
     * @param array<string,mixed> $videoRow
     * @return bool
     */
    protected function isVideoRowRenamable(array $videoRow): bool
    {
    }
    protected function renameMulti(): string
    {
    }
}
/**
 * Query builder datatable daftar video.
 *
 * Split out of `VideoListTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoListTrait` through this trait.
 */
trait VideoListQueryTrait
{
    /**
     * Build paginated list SQL (data + count) sharing the same bound params.
     *
     * @param array<string,mixed> $datatableQueryParams
     * @return array{sql:string,sqlNum:string,params:list<mixed>}
     */
    protected function buildListQuery(array $datatableQueryParams): array
    {
    }
}
/**
 * Video list for the datatable endpoint: columns, query, and row formatting.
 *
 * Split out of `VideoAjaxController` so that class only holds actions
 * (rule: <=20 methods per class). This trait is only used by `VideoAjaxController`;
 * the model and the other properties still belong to the class.
 */
trait VideoListTrait
{
    use \GDPlayer\Modules\Videos\Controllers\VideoListQueryTrait;
    /**
     * @param array<array<string,mixed>> $list
     * @return array<array<string,mixed>>
     */
    private function createDataList(array $list = []): array
    {
    }
    /**
     * @param string $title
     * @return array{sql:string,params:list<mixed>}
     */
    protected static function createSearchTitle(string $title = ''): array
    {
    }
}
/**
 * Hapus video, DMCA, dan perubahan status.
 *
 * Split out of `VideoAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoAjaxController` through this trait.
 */
trait VideoModerationTrait
{
    protected function delete(): string
    {
    }
    protected function deleteByHostnames(): string
    {
    }
    protected function dmcaTakedown(): string
    {
    }
    protected function updateStatus(): string
    {
    }
}
/**
 * Pengambilan server stream dan penghapusan poster.
 *
 * Split out of `VideoAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoAjaxController` through this trait.
 */
trait VideoServerActionTrait
{
    protected function getServer(): string
    {
    }
    protected function removePoster(): string
    {
    }
}
/**
 * Aksi subtitle & alternatif pada daftar video.
 *
 * Split out of `VideoAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoAjaxController` through this trait.
 */
trait VideoSubtitleActionTrait
{
    protected function deleteSubtitle(): string
    {
    }
    protected function editSubtitle(): string
    {
    }
    protected function getAlternatives(): string
    {
    }
    protected function getSubtitles(): string
    {
    }
    protected function searchSubtitles(): string
    {
    }
}
/**
 * Video management endpoint (list, create, edit, delete, bulk actions).
 *
 * Replacement for Ajax\VideoAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
class VideoAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\Videos\Controllers\VideoBulkActionTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoListTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoModerationTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoServerActionTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoSubtitleActionTrait;
    protected const ACTIONS = ['delete', 'deleteByHostnames', 'dmcaTakedown', 'getAlternatives', 'getServer', 'removePoster', 'rename', 'renameMulti', 'updateStatus', 'deleteSubtitle', 'editSubtitle', 'getSubtitles', 'searchSubtitles'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Unauthorized attempt to access Video';
    protected const MESSAGE_POSTER_REMOVE_FAIL = 'The poster failed to remove';
    protected const MESSAGE_POSTER_REMOVE_SUCCESS = 'The poster has been successfully removed';
    protected const MESSAGE_VIDEO_DELETE_FAIL = 'The video failed to delete';
    protected const MESSAGE_VIDEO_DELETE_SUCCESS = 'The video has been successfully deleted';
    protected const MESSAGE_VIDEO_NOT_FOUND = 'The video was not found';
    protected const MESSAGE_VIDEO_RENAME_EMPTY = 'The video title is invalid';
    protected const MESSAGE_VIDEO_SAVE_FAIL = 'The new video failed to save';
    protected const MESSAGE_VIDEO_SAVE_SUCCESS = 'The new video has been saved successfully';
    protected const MESSAGE_VIDEO_UPDATE_FAIL = 'The video failed to update';
    protected const MESSAGE_VIDEO_UPDATE_SUCCESS = 'The video has been successfully updated';
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'title', 'host', 'slug', 'status', 'dmca', 'has_sub', 'views', 'name', 'created', 'updated', 'poster', 'host_id'];
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    protected function rename(): string
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}
/**
 * Pembuatan video baru dan halaman form-nya.
 *
 * Split out of `VideoController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoController` through this trait.
 */
trait VideoCreateTrait
{
    /**
     * Store a new video from the form (POST branch of the new page).
     *
     * @param array<string, mixed> $body form data
     * @param array<string, mixed>|null $userLogin logged-in user passed from newPage(), null for guests
     * @return \Psr\Http\Message\ResponseInterface redirect response with the save result
     */
    protected function createVideo(array $body, string $requestUri, ?array $userLogin, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\Video $videoModel, \GDPlayer\Model\VideoAlternative $videoAlternativeModel): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Page videos/new.php.
     *
     * @return string|\Psr\Http\Message\ResponseInterface
     */
    protected function newPage(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Render form edit video dan halaman edit.
 *
 * Split out of `VideoController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoController` through this trait.
 */
trait VideoEditFormTrait
{
    /**
     * Run the video.edit.load plugin hook then print the video edit form.
     *
     * @param array{
     *     video: array<string, mixed>,
     *     embed_url: string,
     *     download_url: string,
     *     lb_url: string,
     *     hash_id: int
     * } $editVideo video data
     * @param array{
     *     alternatives: array<int, mixed>,
     *     gdrive_files: array<int, mixed>,
     *     direct_urls: array<int, mixed>
     * } $editSources source data
     * @return string edit form markup
     */
    protected function renderEditForm(array $editVideo, array $editSources, int $videoId, \GDPlayer\Config\Config $configModel): string
    {
    }
    /**
     * Branch GET halaman edit: guard kepemilikan/DMCA lalu render form.
     *
     * @param array<string, mixed> $queryParams query string request
     * @return string|\Psr\Http\Message\ResponseInterface halaman, atau response 403/DMCA/404
     */
    protected function renderEditPage(array $queryParams, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\Video $videoModel, \GDPlayer\Model\VideoAlternative $videoAlternativeModel, \GDPlayer\Model\Subtitle $subtitleModel): string|\Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Guard & entri halaman edit video.
 *
 * Split out of `VideoController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoController` through this trait.
 */
trait VideoEditPageTrait
{
    /**
     * Page videos/edit.php.
     *
     * @return string|\Psr\Http\Message\ResponseInterface
     */
    protected function editPage(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Edit page guard: 404 when the video is missing, DMCA page when a member opens a DMCA video.
     *
     * @param array<string, mixed> $dataVideo video row from the query
     * @return string|\Psr\Http\Message\ResponseInterface|null response/page, or null when execution may continue
     */
    protected function editPageGuard(array $dataVideo): string|\Psr\Http\Message\ResponseInterface|null
    {
    }
}
/**
 * Helper kecil: badge telemetri, poster, urutan subtitle.
 *
 * Split out of `VideoController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoController` through this trait.
 */
trait VideoHelperTrait
{
    /**
     * Simpan ulang urutan subtitle lama sesuai payload `subs`.
     *
     * @param mixed $subs daftar id subtitle berurutan
     * @param \GDPlayer\Model\Subtitle $subtitleModel model subtitle
     * @param int $time timestamp update
     */
    protected function reorderSubtitles(mixed $subs, \GDPlayer\Model\Subtitle $subtitleModel, int $time): void
    {
    }
    /**
     * Poster hasil upload/link baru, atau poster lama bila tidak ada perubahan.
     *
     * @param array<string, mixed> $body form data
     * @param string $oldPoster poster yang tersimpan
     * @return string nama file/URL poster terpilih
     */
    protected function resolvePosterValue(array $body, string $oldPoster): string
    {
    }
    /**
     * Bootstrap badge class based on the stability score & success rate.
     *
     * @param float $score stability score 0..100
     * @param float $rate success rate 0..100
     * @return string badge class
     */
    protected function telemetryBadge(float $score, float $rate): string
    {
    }
}
/**
 * Penyusunan URL langsung, mirror GDrive, dan host telemetri.
 *
 * Split out of `VideoController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoController` through this trait.
 */
trait VideoSourceTrait
{
    /**
     * Build the direct URL (mp4/hls/mpd) of the main video then of every alternative source.
     *
     * @param array<string, mixed> $dataVideo video from editVideoData()
     * @param array<int, mixed> $vAltLinks alternatives from editVideoAlternatives()
     * @return array<int, mixed> direct URL list
     */
    protected function buildDirectUrls(array $dataVideo, int $vMainHashId, string $lbUrl, array $vAltLinks): array
    {
    }
    /**
     * Turn the Google Drive mirror list into their download links.
     *
     * @param array<int, mixed> $gdriveFiles raw mirrors from editVideoAlternatives()
     * @return array<int, mixed> mirrors with download URLs
     */
    protected function buildGdriveMirrorFiles(array $gdriveFiles, \GDPlayer\Core\Hosting\Hosting $hostingService): array
    {
    }
    /**
     * Build the host telemetry list (type/host fallback from the key, badge, sorted by score descending).
     *
     * @param array<string, mixed> $telemetryRaw raw data from StreamTelemetry::getAllTelemetryFromDb()
     * @return list<array<string, mixed>> telemetry hosts ready to render
     */
    protected function buildTelemetryHosts(array $telemetryRaw): array
    {
    }
}
/**
 * Pembaruan data video dan alternatifnya.
 *
 * Split out of `VideoController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoController` through this trait.
 */
trait VideoUpdateTrait
{
    /**
     * Fetch the Google Drive mirrors of the main video and the alternative source list.
     *
     * @param array<string, mixed> $dataVideo video from editVideoData()
     * @return array{alternatives: array<int, mixed>, gdrive_files: array<int, mixed>}
     */
    protected function editVideoAlternatives(array $dataVideo, int $videoId, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\VideoAlternative $videoAlternativeModel, \GDPlayer\Model\GDriveMirror $gdriveMirrorModel): array
    {
    }
    /**
     * Load video data for the edit form: main link, embed/download, poster, subtitle.
     *
     * @param array<string, mixed> $dataVideo video row from the model
     * @return array{
     *     video: array<string, mixed>,
     *     embed_url: string,
     *     download_url: string,
     *     lb_url: string,
     *     hash_id: int
     * }
     */
    protected function editVideoData(array $dataVideo, int $videoId, string $embedUrl, string $downloadUrl, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Core\Security\Security $securityService, \GDPlayer\Model\Subtitle $subtitleModel): array
    {
    }
    /**
     * Save video changes from the edit form (POST branch).
     *
     * @param array<string, mixed> $body form data
     * @return \Psr\Http\Message\ResponseInterface redirect response with the save result
     */
    protected function updateVideo(array $body, string $requestUri, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\Video $videoModel, \GDPlayer\Model\VideoAlternative $videoAlternativeModel, \GDPlayer\Model\Subtitle $subtitleModel): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Pages videos/list.php, videos/subtitles.php, videos/new.php, videos/edit.php.
 */
final class VideoController extends \GDPlayer\View\AbstractView
{
    use \GDPlayer\Modules\Videos\Controllers\VideoCreateTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoEditFormTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoEditPageTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoHelperTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoSourceTrait;
    use \GDPlayer\Modules\Videos\Controllers\VideoUpdateTrait;
}
/**
 * Video export endpoint (generate and download export files).
 *
 * Replacement for Ajax\VideoExportAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class VideoExportAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
}
/**
 * Normalisasi & validasi baris CSV impor video.
 *
 * Split out of `VideoImportAjaxController` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `VideoImportAjaxController` through this trait.
 */
trait VideoImportRowTrait
{
    /**
     * @param mixed $rawSubtitles
     * @return list<array{url:string,label:string}>
     */
    protected static function normaliseImportSubtitles(mixed $rawSubtitles): array
    {
    }
    /**
     * @param mixed $rawVideos
     * @return list<string>
     */
    protected static function normaliseImportVideos(mixed $rawVideos): array
    {
    }
    /**
     * Sanitises and returns a safe poster value.
     *
     * @param mixed $posterValue
     * @return string
     */
    protected static function sanitizePoster(mixed $posterValue = ''): string
    {
    }
    /**
     * @param array<string, mixed> $row
     * @return array<string, mixed>
     */
    protected static function validateImportRow(array $row): ?array
    {
    }
}
/**
 * Video import endpoint (batched CSV row import and validation).
 *
 * Replacement for Ajax\VideoImportAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class VideoImportAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    use \GDPlayer\Modules\Videos\Controllers\VideoImportRowTrait;
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
}
/**
 * Video subtitle endpoint (list, edit, upload, delete per video).
 *
 * Replacement for Ajax\VideoSubtitleAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class VideoSubtitleAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return string
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    public function deleteSubtitle(): string
    {
    }
    public function editSubtitle(): string
    {
    }
    public function getSubtitles(): string
    {
    }
    public function searchSubtitles(): string
    {
    }
}
namespace GDPlayer\Presentation;

/**
 * Alert admin: pembuatan, redirect, dan tampilan.
 *
 * Split out of `HTML` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `HTML` through this trait.
 */
trait HtmlAlertTrait
{
    /**
     * Response form (without exit) of {@see createAdminAlertRedirect()}.
     *
     * @param string $type alert type (success/danger/...)
     * @param string $message alert message
     * @param string $url target URL; empty = current request target
     * @return \Psr\Http\Message\ResponseInterface redirect response + alert cookie
     */
    public static function adminAlertRedirectResponse(string $type, string $message, string $url = ''): \Psr\Http\Message\ResponseInterface
    {
    }
    public static function alertBox(string $type = '', string $message = ''): string
    {
    }
    public static function createAdminAlertRedirect(string $type, string $message, string $url = ''): never
    {
    }
    public static function showAdminAlert(string $type = 'info', string $message = ''): string
    {
    }
}
/**
 * Render template utama (parser placeholder & layout).
 *
 * Split out of `HTML` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `HTML` through this trait.
 */
trait HtmlRenderTrait
{
    /**
     * @param string $template
     * @param array<string,mixed> $context
     * @param bool $frontend
     * @return string
     */
    public static function renderTemplate(string $template, array $context = [], bool $frontend = true): string
    {
    }
}
/**
 * Twig-based template renderer for the frontend and backend views.
 */
final class HTML
{
    use \GDPlayer\Presentation\HtmlAlertTrait;
    use \GDPlayer\Presentation\HtmlRenderTrait;
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    public static function createIframe(string $embedUrl = '', string $title = ''): string
    {
    }
    /**
     * Read a cookie from the stored PSR-7 request or fallback to $_COOKIE.
     *
     * @param string $name
     * @return string
     */
    public static function getCookieParam(string $name): string
    {
    }
    public static function getRequest(): ?\Psr\Http\Message\ServerRequestInterface
    {
    }
    /**
     * @param string $template
     * @param array<string,mixed> $context
     * @return string
     */
    public static function getTemplate(string $template, array $context = []): string
    {
    }
    /**
     * @return list<array<string,mixed>>
     */
    public static function hostLinkExample(): array
    {
    }
    /**
     * to load a .twig file into a variable so it can be included via a variable inside other .twig files
     *
     * @param string $template .twig file location
     * @return null|\Twig\TemplateWrapper
     */
    public static function loadTemplate(string $template): ?\Twig\TemplateWrapper
    {
    }
    /**
     * @param array<string,mixed> $context
     * @return string
     */
    public static function renderDefaultTemplate(array $context = []): string
    {
    }
    public static function setRequest(?\Psr\Http\Message\ServerRequestInterface $request): void
    {
    }
}
/**
 * View layer helpers for rendering pages and dispatching Ajax controllers.
 */
class Views
{
    /**
     * Require an authenticated administrator, otherwise emit 401/403 and exit.
     *
     * @return void
     */
    public static function adminValidation(?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
    /**
     * Print the static error page (status + body) — replacement for the old `frontend/<status>.php` files.
     *
     * The body comes from ErrorPageView; the status is only sent
     * when there is no output yet, so it is safe to call in the middle of a theme view.
     *
     * @param int $status HTTP status (400/401/403/404/500/503)
     * @return void
     */
    public static function emitErrorPage(int $status): void
    {
    }
    /**
     * @param string[] $uri
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface|null Ajax controller response; null on failure (already logged)
     */
    public static function loadAjax(array $uri, \Psr\Http\Message\ServerRequestInterface $request): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Render the 401 (Unauthorized) error page.
     *
     * @return void
     */
    public static function loadPage401(): void
    {
    }
    /**
     * Render the 403 (Forbidden) error page.
     *
     * @return void
     */
    public static function loadPage403(): void
    {
    }
    /**
     * Render the 404 (Not Found) error page.
     *
     * @return void
     */
    public static function loadPage404(): void
    {
    }
    /**
     * Render the 503 (Service Unavailable) error page.
     *
     * @return void
     */
    public static function loadPage503(): void
    {
    }
}
namespace GDPlayer\Routing;

/**
 * Data tabel rute Ajax (modul REST dan modul publik).
 *
 * Dipisah dari `RouteTable` (rule php:S2042): datanya besar, perilakunya nol.
 */
final class AjaxRouteTable
{
    /** Modul Ajax tanpa guard login (endpoint publik): middleware auth dilewati. */
    public const AJAX_PUBLIC_MODULES = ['/administrator/ajax/public'];
    /**
     * Grup Ajax yang sudah punya rute REST: prefix => [class, daftar action, punya list?].
     *
     * `list` (DataTables) tersedia lewat GET `<prefix>/list` bila kelasnya meng-override `list()`.
     *
     * @var array<string, array{0: class-string<AbstractAjaxController>, 1: string[], 2: bool}>
     */
    public const AJAX_REST_MODULES = ['/administrator/ajax/admin-api' => [\GDPlayer\Modules\System\Controllers\AdminApiController::class, ['clearLoadBalancer', 'clearVideoCache', 'serverStatus'], false], '/administrator/ajax/dashboard' => [\GDPlayer\Modules\Dashboard\Controllers\DashboardAjaxController::class, ['popularASN', 'popularBrowsers', 'popularCountries', 'popularVideos', 'recentVideos', 'serversStatus', 'videosStatus', 'views'], false], '/administrator/ajax/gdrive-accounts' => [\GDPlayer\Modules\GDrive\Controllers\GDriveAccountAjaxController::class, ['delete', 'updateBypass', 'updateStatus'], true], '/administrator/ajax/gdrive-backup-files' => [\GDPlayer\Modules\GDrive\Controllers\GDriveMirrorAjaxController::class, ['delete'], true], '/administrator/ajax/gdrive-backup-queue' => [\GDPlayer\Modules\GDrive\Controllers\GDriveQueueAjaxController::class, ['copy', 'delete'], true], '/administrator/ajax/gdrive-files' => [\GDPlayer\Modules\GDrive\Controllers\GDriveFileAjaxController::class, ['createDataList', 'createNewFolder', 'delete', 'deleteMirror', 'gdriveImport', 'getSharedDrives', 'removeDuplicateFiles', 'removeDuplicateFilesByData', 'renameFileFolder', 'updateStatus'], true], '/administrator/ajax/load-balancers' => [\GDPlayer\Modules\LoadBalancers\Controllers\LoadBalancerAjaxController::class, ['delete', 'updateStatus'], true], '/administrator/ajax/profile' => [\GDPlayer\Modules\Users\Controllers\UserAjaxController::class, ['createSearchQuery', 'delete', 'editEmail', 'editUsername', 'sendConfirmationEmail'], true], '/administrator/ajax/public' => [\GDPlayer\Modules\PublicEndpoint\Controllers\PublicAjaxController::class, ['checkEmail', 'checkUsername', 'clearVideoCache', 'createPlayer', 'gdriveBypassLimit', 'getLoadBalancerList', 'publicValidation', 'saveBulkProcess', 'statCounter'], false], '/administrator/ajax/sessions' => [\GDPlayer\Modules\Sessions\Controllers\SessionAjaxController::class, ['delete'], true], '/administrator/ajax/settings' => [\GDPlayer\Modules\Settings\Controllers\SettingAjaxController::class, ['clearAllCache', 'clearLoadBalancer', 'clearSettingsCache', 'clearVideosCache', 'clearVideosFiles', 'createCustomVast', 'deleteCacheTmpDir', 'deleteCustomVast', 'disableBlacklistedVideos', 'getDependencies', 'hideExtDialog', 'resetHosts', 'saveLicense'], false], '/administrator/ajax/subtitles' => [\GDPlayer\Modules\Subtitles\Controllers\SubtitleAjaxController::class, ['createSearchQuery', 'delete', 'getHosts', 'migrate', 'rename', 'uploadSubtitle'], true], '/administrator/ajax/users' => [\GDPlayer\Modules\Users\Controllers\UserAjaxController::class, ['createSearchQuery', 'delete', 'editEmail', 'editUsername', 'sendConfirmationEmail'], true], '/administrator/ajax/videos' => [\GDPlayer\Modules\Videos\Controllers\VideoAjaxController::class, ['delete', 'deleteByHostnames', 'deleteSubtitle', 'dmcaTakedown', 'editSubtitle', 'getAlternatives', 'getServer', 'getSubtitles', 'removePoster', 'rename', 'renameMulti', 'searchSubtitles', 'updateStatus'], true], '/administrator/ajax/videos-export' => [\GDPlayer\Modules\Videos\Controllers\VideoExportAjaxController::class, ['exportAsCSV'], false], '/administrator/ajax/videos-import' => [\GDPlayer\Modules\Videos\Controllers\VideoImportAjaxController::class, ['importVideosBatch'], false]];
}
namespace GDPlayer\Routing\Middleware;

/**
 * Login required; admin (role 0) for routes that need full rights.
 *
 * Replaces the `Views::adminValidation(); exit;` pattern inside views: middleware returns
 * a 401/403 response, so the request path never kills the worker.
 */
final class AdminAuthMiddleware implements \Psr\Http\Server\MiddlewareInterface
{
    /**
     * @param bool $requireAdmin true: role 0 only; false: login is enough
     */
    public function __construct(private readonly bool $requireAdmin = true)
    {
    }
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     * @param \Psr\Http\Server\RequestHandlerInterface $handler next handler
     * @return \Psr\Http\Message\ResponseInterface 401/403 when unauthorised, otherwise the handler response
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Ajax route guard: JSON 401/403 replies (not an error page), matching Ajax endpoint behaviour.
 *
 * This middleware is used only by new REST routes; legacy URL aliases still go through the guard inside
 * controllers so the reply shape (200 + JSON) stays unchanged.
 */
final class AjaxAuthMiddleware implements \Psr\Http\Server\MiddlewareInterface
{
    /**
     * @param bool $requireAdmin true: role 0 only; false: login is enough
     */
    public function __construct(private readonly bool $requireAdmin = true)
    {
    }
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     * @param \Psr\Http\Server\RequestHandlerInterface $handler next handler
     * @return \Psr\Http\Message\ResponseInterface 401/403 JSON when unauthorised, otherwise the handler response
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * CORS headers for every Ajax endpoint (one place, not per controller).
 *
 * Header values match what Helper\AjaxHelper::handle() used to send (origin from the
 * main_site configuration, or '*' when validation is disabled).
 */
final class AjaxCorsMiddleware implements \Psr\Http\Server\MiddlewareInterface
{
    /**
     * Apply CORS headers to an Ajax response (also used by legacy URL aliases).
     *
     * @param \Psr\Http\Message\ResponseInterface $response base response
     * @return \Psr\Http\Message\ResponseInterface response with CORS headers
     */
    public static function apply(\Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     * @param \Psr\Http\Server\RequestHandlerInterface $handler next handler
     * @return \Psr\Http\Message\ResponseInterface response with CORS headers
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
    }
}
namespace GDPlayer\Routing;

/**
 * Dispatch internal: AJAX backend/frontend, router-owned path, dan fallback miss.
 *
 * Split out of `RouteRegistry` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `RouteRegistry` through this trait.
 */
trait RouteDispatchTrait
{
    /**
     * Legacy Ajax URL alias (/administrator/ajax/<slug> + `action` payload) for modules that
     * have moved: dispatched through the new controller, no ReflectionMethod.
     *
     * @param string[] $ajaxUri path segments starting at 'ajax'
     * @return \Psr\Http\Message\ResponseInterface|null response when the new controller served the request
     */
    protected function dispatchAjaxAlias(array $ajaxUri): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Lempar request ke router bila path ini milik router.
     *
     * @param string $path path relatif terhadap BASE_URL
     * @return \Psr\Http\Message\ResponseInterface|null respons router; null bila path bukan milik router
     */
    protected function dispatchRouterOwned(string $path): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Backend Ajax branch: reject when not logged in (except public modules), then the new controller alias,
     * last the old view path.
     *
     * @param string[] $uri path segments (first segment 'administrator')
     */
    protected function handleBackendAjax(array $uri): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Frontend Ajax branch: new controller alias when present, otherwise the old view path.
     *
     * @param string[] $uri path segments starting at 'ajax'
     */
    protected function handleFrontendAjax(array $uri): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Response when the router finds no route (404) or the method does not match (405).
     *
     * The Ajax area answers JSON (Ajax reply shape), otherwise a normal error page.
     *
     * @param int $status HTTP status (404/405)
     * @return \Psr\Http\Message\ResponseInterface ready-to-send response
     */
    protected function missResponse(int $status): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Registrasi rute frontend, media, dan view.
 *
 * Split out of `RouteRegistrationTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `RouteRegistrationTrait` through this trait.
 */
trait RouteFrontendRegistrationTrait
{
    public static function registerFrontendEndpointRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    public static function registerFrontendPageRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly): void
    {
    }
    public static function registerMediaRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Backend page rows: GET+POST per row (the old view serves POST on the same path).
     *
     * @param list<array{0: string, 1: class-string<\GDPlayer\View\AbstractView>, 2: string, 3: \GDPlayer\Routing\Middleware\AdminAuthMiddleware}> $views
     */
    public static function registerViewRoutes(\GDPlayer\Routing\Router $router, array $views): void
    {
    }
}
/**
 * Thin facade over league/route.
 *
 * Goal: one short API (get/post/group/middleware/dispatch) used by RouteRegistry without
 * spreading package details across the application. The router is built once per worker (see
 * Application) so the route table is not recompiled every request.
 */
final class Router
{
    /**
     * @param \League\Route\Router|null $router league/route instance; share across workers when needed
     */
    public function __construct(?\League\Route\Router $router = null)
    {
    }
    /**
     * Register a route for a specific method ("all" = every method).
     *
     * @param string $method HTTP method or "all"
     * @param string $path path pattern
     * @param callable|array{class-string|object, string}|string $handler handler
     * @param \Psr\Http\Server\MiddlewareInterface ...$middleware middleware specific to this route
     * @return \League\Route\Route
     */
    public function addRoute(string $method, string $path, callable|array|string $handler, \Psr\Http\Server\MiddlewareInterface ...$middleware): \League\Route\Route
    {
    }
    /**
     * Match the path against the route table, then run its handler.
     *
     * The path is passed separately from the request so the BASE_URL prefix (e.g. install subfolder)
     * is not matched; the request URI is swapped temporarily to stay consistent.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     * @param string $path path relative to BASE_URL, starting with "/"
     * @return \Psr\Http\Message\ResponseInterface handler/middleware response
     */
    public function dispatch(\Psr\Http\Message\ServerRequestInterface $request, string $path): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register a GET route.
     *
     * @param string $path path pattern, e.g. "/administrator/videos/{id}"
     * @param callable|array{class-string|object, string}|string $handler callable, [object, method], or class name
     * @param \Psr\Http\Server\MiddlewareInterface ...$middleware middleware specific to this route
     * @return \League\Route\Route
     */
    public function get(string $path, callable|array|string $handler, \Psr\Http\Server\MiddlewareInterface ...$middleware): \League\Route\Route
    {
    }
    /**
     * Group routes under one prefix, e.g. group('/administrator/users', ...).
     *
     * @param string $prefix path prefix
     * @param callable(\League\Route\RouteGroup): void $group route registration callback
     * @return \League\Route\RouteGroup
     */
    public function group(string $prefix, callable $group): \League\Route\RouteGroup
    {
    }
    /**
     * Middleware for every route registered after this line.
     *
     * @param \Psr\Http\Server\MiddlewareInterface $middleware router-wide middleware
     * @return self
     */
    public function middleware(\Psr\Http\Server\MiddlewareInterface $middleware): self
    {
    }
    /**
     * Register a POST route.
     *
     * @param string $path path pattern
     * @param callable|array{class-string|object, string}|string $handler handler
     * @param \Psr\Http\Server\MiddlewareInterface ...$middleware middleware specific to this route
     * @return \League\Route\Route
     */
    public function post(string $path, callable|array|string $handler, \Psr\Http\Server\MiddlewareInterface ...$middleware): \League\Route\Route
    {
    }
    /**
     * @return \League\Route\Router the league/route instance inside
     */
    public function unwrap(): \League\Route\Router
    {
    }
}
/**
 * Handler ajax/view dan utilitas penamaan rute.
 *
 * Split out of `RouteRegistrationTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `RouteRegistrationTrait` through this trait.
 */
trait RouteRegistrationHandlerTrait
{
    /**
     * Ajax route handler: the controller is built per request, the action is guaranteed by the route list.
     *
     * @param class-string<\GDPlayer\Modules\AbstractAjaxController> $class controller class
     * @param string $action action name
     * @return callable(\Psr\Http\Message\ServerRequestInterface): \Psr\Http\Message\ResponseInterface route handler
     */
    protected static function ajaxHandler(string $class, string $action): callable
    {
    }
    /**
     * Ajax route handler for `list` (DataTables).
     *
     * @param class-string<\GDPlayer\Modules\AbstractAjaxController> $class controller class
     * @return callable(\Psr\Http\Message\ServerRequestInterface): \Psr\Http\Message\ResponseInterface route handler
     */
    protected static function ajaxHandlerList(string $class): callable
    {
    }
    /**
     * Turn a camelCase action name into a kebab-case URL segment (updateStatus -> update-status).
     *
     * @param string $action action name
     * @return string URL segment
     */
    protected static function kebabCase(string $action): string
    {
    }
    /**
     * Wrap a view controller as a handler: request+response are injected through the constructor.
     *
     * @param class-string<\GDPlayer\View\AbstractView> $class view class
     * @param string $action requested action
     * @return callable(\Psr\Http\Message\ServerRequestInterface): \Psr\Http\Message\ResponseInterface
     */
    protected static function viewHandler(string $class, string $action): callable
    {
    }
}
/**
 * Route table: pendaftaran seluruh rute ke `Router` (dipanggil `RouteRegistry::register()`).
 *
 * Dipisah dari `RouteRegistry` supaya kelas itu hanya memegang tabel + dispatch
 * (aturan: <=20 method/kelas, <=150 baris/method). Data tabel (path, prefix, pola, `WILDCARD`,
 * tabel Ajax) ada di `RouteTable`; helper pembuat handler ada di sini karena hanya pendaftaran
 * yang memakainya — `RouteRegistry` tetap bisa memanggilnya lewat `static::` karena trait menjadi
 * bagian dari kelas itu.
 *
 * URUTAN pemanggilan method di file ini adalah bagian dari perilaku: FastRoute menolak rute
 * statis yang didaftarkan setelah rute variabel yang bisa mencocokinya. Jangan ubah urutan
 * tanpa menjalankan `php scripts/check_route_table.php --compare=tmp/baseline/route-table.json`.
 *
 * Dipakai hanya oleh `RouteRegistry`.
 */
trait RouteRegistrationTrait
{
    use \GDPlayer\Routing\RouteFrontendRegistrationTrait;
    use \GDPlayer\Routing\RouteRegistrationHandlerTrait;
    /** Suffix rute catch-all FastRoute: dipakai melayani sub-path (`/x/{path:.*}`). */
    /** Modul Ajax tanpa guard login (endpoint publik): middleware auth dilewati. */
    public static function registerAdminEndpointRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly): void
    {
    }
    /**
     * Backend pages (per-row auth middleware) + plugins/install endpoints.
     *
     * Row order sama persis dengan tabel lama. `$adminOnly` di sini hanya dipakai baris
     * yang butuh admin penuh; `$loggedIn` untuk halaman yang cukup login.
     *
     * @param \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly admin-mode middleware
     * @param \GDPlayer\Routing\Middleware\AdminAuthMiddleware $loggedIn login-mode middleware
     * @return list<array{0: string, 1: class-string<\GDPlayer\View\AbstractView>, 2: string, 3: \GDPlayer\Routing\Middleware\AdminAuthMiddleware}>
     */
    public static function registerAdminPageRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $loggedIn): array
    {
    }
    public static function registerAjaxRestRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    public static function registerApiRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    public static function registerAuthRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Health routes (used by monitors/load balancers).
     */
    public static function registerHealthRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    public static function registerJsonEndpointRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly): void
    {
    }
}
/**
 * Kepemilikan path: apakah suatu path dilayani router baru atau jatuh ke cabang legacy.
 *
 * Dipisah dari `RouteRegistry` supaya kelas itu hanya memegang tabel + dispatch
 * (aturan: <=20 method/kelas). Daftar path/prefix/pola ada di `RouteTable`; helper slug
 * (`pageSlug()`, `slugPage()`, `frontendTarget()`) ada di sini karena hanya logika kepemilikan
 * ini yang memakainya — `RouteRegistry` tetap bisa memanggilnya lewat `self::` karena trait
 * menjadi bagian dari kelas itu.
 *
 * Dipakai hanya oleh `RouteRegistry`.
 */
trait RouterOwnershipTrait
{
    /**
     * Controller class + action for one frontend page slug.
     *
     * @param string $page slug without slashes (e.g. 'e', 'ads', 'sitemap.xml')
     * @param array<string, mixed> $config site configuration
     * @return array{0: class-string<\GDPlayer\View\AbstractView>, 1: string}|null class+action pair; null when the
     *                                                            slug is not core-owned
     */
    private static function frontendTarget(string $page, array $config): ?array
    {
    }
    /**
     * Legacy flow: a frontend plugin view always wins over core (except the /api/v1 prefix).
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when the plugin has a view for this path
     */
    private function hasPriorPluginFrontendView(string $path): bool
    {
    }
    /**
     * Is this path in the administrator area (always router-owned, no frontend theme/plugin involvement).
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when the path is under /administrator
     */
    private function isAdministratorPath(string $path): bool
    {
    }
    /**
     * Is this path a player page slug (e/d/r or a custom slug from configuration).
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when the slug is recognised
     */
    private function isPlayerSlug(string $path): bool
    {
    }
    /**
     * The active theme still wins over core for frontend pages (legacy behaviour).
     *
     * Paths in the shortcut list are always served by core, so the theme does not affect them.
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when the router may handle this path
     */
    private function isRouterAllowedForTheme(string $path): bool
    {
    }
    /**
     * @param string $path path relative to BASE_URL
     * @return bool true when this path is already router-owned
     */
    private function isRouterOwned(string $path): bool
    {
    }
    /**
     * Is this path registered as router-owned (static list, prefix, or regex pattern).
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when the path is registered
     */
    private function isRouterPath(string $path): bool
    {
    }
    /**
     * Does the path match one of the router's regex patterns.
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when it matches a registered pattern
     */
    private function isRouterPatternMatched(string $path): bool
    {
    }
    /**
     * Does the path start with one of the router's prefixes.
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when it matches a registered prefix
     */
    private function isRouterPrefixMatched(string $path): bool
    {
    }
    /**
     * Slug of a path: first segment, extension stripped — same as the old view's $page
     * (e.g. /sitemap.xml -> sitemap, /poster/xxx -> poster).
     *
     * @param string $path path relative to BASE_URL
     * @return string slug without slashes
     */
    private static function pageSlug(string $path): string
    {
    }
    /**
     * Player page view filename for one slug; '' when the slug is not a player page.
     *
     * Config slugs are checked first so the order matches the old view's $files map
     * (default e/d/r, then overridden by custom slugs).
     *
     * @param string $page slug without slashes
     * @param array<string, mixed> $config site configuration
     * @return string view filename (e.g. 'embed.php') or ''
     */
    private static function slugPage(string $page, array $config): string
    {
    }
}
/**
 * Tabel rute + dispatch request.
 *
 * Dua lapis:
 *  1. Rute baru didaftarkan di {@see register()} (league/route): isi tabelnya ada di
 *     `RouteRegistrationTrait`, aturan path mana yang "milik router" ada di `RouterOwnershipTrait`.
 *  2. Cabang legacy dipindah apa adanya dari public/index.php (F1.10) selama view-nya belum jadi
 *     controller — dipertahankan identik supaya baseline URL tidak berubah.
 */
final class RouteRegistry
{
    use \GDPlayer\Routing\RouteDispatchTrait;
    use \GDPlayer\Routing\RouteRegistrationTrait;
    use \GDPlayer\Routing\RouterOwnershipTrait;
    /**
     * @param Router $router registered router
     * @param \Psr\Http\Message\ServerRequestInterface $request request aktif
     * @param array<string, mixed> $config site configuration read by Application
     */
    public function __construct(protected readonly \GDPlayer\Routing\Router $router, private readonly \Psr\Http\Message\ServerRequestInterface $request, array $config = [])
    {
    }
    /**
     * Run the request: try the router first, then the legacy branch.
     *
     * @return \Psr\Http\Message\ResponseInterface|null response to send; null when output was already written
     *                                  directly by the legacy path (view/streaming handler)
     */
    public function dispatch(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Daftarkan seluruh rute ke router.
     *
     * Rute slug longgar didaftarkan paling akhir (lihat komentar di badan method).
     */
    public static function register(\GDPlayer\Routing\Router $router): void
    {
    }
}
/**
 * Data tabel rute: path milik router, prefix/pola, dan tabel rute Ajax.
 *
 * Kenapa bukan konstanta di dalam trait: PHP 8.1 (versi minimum proyek) belum mengizinkan
 * konstanta di trait — trait hanya berisi perilaku, datanya dikumpulkan di sini supaya
 * `RouteRegistry`, `RouteRegistrationTrait`, dan `RouterOwnershipTrait` membaca sumber yang sama.
 */
final class RouteTable
{
    /** Modul Ajax tanpa guard login (endpoint publik); datanya ada di {@see AjaxRouteTable}. */
    public const AJAX_PUBLIC_MODULES = \GDPlayer\Routing\AjaxRouteTable::AJAX_PUBLIC_MODULES;
    /** Tabel modul Ajax REST; datanya ada di {@see AjaxRouteTable}. */
    public const AJAX_REST_MODULES = \GDPlayer\Routing\AjaxRouteTable::AJAX_REST_MODULES;
    /** Slug frontend tanpa tema — dulu view `includes/views/frontend`, kini controller core. */
    public const FRONTEND_SHORTCUT = ['api-config', 'stream-vid', 'stream-ts', 'stream-seg', 'hls', 'mpd', 'poster', 'subtitle', 'filmstrip', 'telemetry'];
    /** Key konfigurasi yang menimpa slug halaman player => nama file view-nya. */
    public const FRONTEND_SLUG_CONFIG = ['slug_embed' => 'embed.php', 'slug_download' => 'download.php', 'slug_request' => 'embed2.php'];
    /** Nama file view halaman player untuk slug default lama (e/d/r). */
    public const FRONTEND_SLUG_FILES = ['e' => 'embed.php', 'd' => 'download.php', 'r' => 'embed2.php'];
    /**
     * Path statis yang sudah dilayani router (controller). Sisanya jatuh ke cabang legacy
     * sampai view-nya ikut dimigrasi.
     *
     * @var string[]
     */
    public const ROUTER_OWNED_PATHS = ['/ping', '/health-check', '/embed.php', '/embed2.php', '/web-migrate.php', '/web-migrate', '/administrator/dashboard', '/administrator/log', '/administrator/users/list', '/administrator/users/new', '/administrator/users/edit', '/administrator/users/sessions', '/administrator/403', '/administrator/dmca', '/changelog', '/sharer', '/clear-cache', '/hls', '/mpd', '/stream-seg', '/stream-ts', '/stream-vid', '/administrator/login', '/administrator/register', '/administrator/reset-password', '/administrator/gdrive/list', '/administrator/gdrive/backup-files', '/administrator/gdrive/backup-queue', '/administrator/load-balancers/list', '/administrator/videos/list', '/administrator/videos/subtitles', '/administrator/settings/ads', '/administrator/settings/sync', '/administrator/themes/sync', '/administrator/gdrive/edit', '/administrator/gdrive/files', '/administrator/plugins/list', '/administrator/plugins/config', '/administrator/plugins/status', '/administrator/plugins/install', '/administrator/plugins/sync', '/administrator/plugins/uninstall', '/administrator/gdrive/new', '/administrator/load-balancers/edit', '/administrator/load-balancers/new', '/administrator/videos/new', '/administrator/videos/edit', '/administrator/settings/custom-headers', '/administrator/settings/general', '/administrator/settings/hosting', '/administrator/settings/misc', '/administrator/settings/player', '/administrator/settings/public', '/administrator/settings/reset', '/administrator/settings/shortlink', '/administrator/settings/smtp', '/administrator/settings/site', '/administrator/profile'];
    /**
     * Pola regex path yang sudah dilayani router.
     *
     * @var string[]
     */
    public const ROUTER_OWNED_PATTERNS = ['#^/redirect(/|$)#', '#^/(stream-seg|stream-ts|stream-vid)[2-3](/|$)#', self::AJAX_PATTERN_HEAD . self::AJAX_PATTERN_HEAD_2 . self::AJAX_PATTERN_MID . self::AJAX_PATTERN_MID_2 . self::AJAX_PATTERN_TAIL, '#^/administrator/ajax/sessions/.+#', '#^/administrator/ajax/load-balancers/.+#'];
    /**
     * Path router-owned beserta SEMUA sub-path-nya, karena view lama hanya melihat segmen
     * pertama (mis. `/api/x` tetap dilayani api.php).
     *
     * @var string[]
     */
    public const ROUTER_OWNED_PREFIXES = [
        '/api',
        '/api-config',
        '/telemetry',
        '/cron-proxy',
        '/direct',
        '/subtitle',
        '/poster',
        '/filmstrip',
        // Slug streaming: sub-path-nya juga milik router (view lama hanya melihat segmen pertama,
        // dan view override plugin dulu menangani /stream-ts/<x> juga) — F7.3.
        '/hls',
        '/mpd',
        '/stream-seg',
        '/stream-ts',
        '/stream-vid',
    ];
    /** Suffix rute catch-all FastRoute: dipakai melayani sub-path (`/x/{path:.*}`). */
    public const WILDCARD = '/{path:.*}';
}
namespace GDPlayer\Service\Background;

/**
 * Koneksi aktif dan pembersihan browser.
 *
 * Split out of `Background` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Background` through this trait.
 */
trait ConnTrait
{
    /**
     * Return the number of active network connections on the host.
     *
     * @return int active connection count (0 when unavailable)
     */
    public function getActiveConnections(): int
    {
    }
    /**
     * Count established TCP connections by parsing /proc/net/tcp{,6}.
     *
     * @return int active connection count
     */
    public function getLinuxActiveConns(): int
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function killBrowsers(): array
    {
    }
}
/**
 * Background process helpers: PID liveness checks and process termination.
 */
trait CoreTrait
{
    private function isUnixPidRunning(int $pid, ?string $imageName): bool
    {
    }
    private function isWindowsPidRunning(int $pid, ?string $imageName): bool
    {
    }
    private function killUnixPid(int $pid): void
    {
    }
    private function sanitizeImageName(?string $imageName): string
    {
    }
    /**
     * Cari & hentikan proses Unix berdasarkan pola cmdline.
     *
     * `ps -ef` tidak dipakai: pada busybox/alpine kolom kedua adalah USER, bukan PID,
     * sehingga parsing `awk '{print $2}'` menghasilkan nama user dan tidak ada proses
     * yang pernah dibunuh. `pgrep -a -f` tersedia baik di busybox maupun procps.
     *
     * @return int[] PID yang dikirim sinyal
     */
    protected function killUnixProcessesByPattern(string $pattern): array
    {
    }
    /**
     * Check whether a PID is running.
     *
     * When `$imageName` is given, the process image name is also verified so a
     * stale PID that was recycled by an unrelated process (PID reuse) is NOT
     * reported as running.
     *
     * @param null|int $pid
     * @param null|string $imageName
     * @return bool
     */
    public function isRunning(?int $pid, ?string $imageName = null): bool
    {
    }
    /**
     * Hentikan proses berdasarkan PID (Windows: taskkill, Unix: killUnixPid).
     *
     * @param int         $pid       process id
     * @param null|string $imageName nama image/proses untuk verifikasi PID (opsional)
     */
    public function stopPid(int $pid, ?string $imageName = null): void
    {
    }
}
/**
 * Manajemen proses plugin aktif/nonaktif.
 *
 * Split out of `Background` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Background` through this trait.
 */
trait PluginTrait
{
    /**
     * Start background scripts for active plugins that are not manually stopped.
     *
     * @param \GDPlayer\Model\Plugins $pluginModel
     */
    protected function startActivePluginsBackground(\GDPlayer\Model\Plugins $pluginModel): void
    {
    }
    /**
     * Stop background scripts for disabled plugins.
     *
     * @param \GDPlayer\Model\Plugins $pluginModel
     */
    protected function stopDisabledPluginsBackground(\GDPlayer\Model\Plugins $pluginModel): void
    {
    }
    /**
     * Manage background daemon processes for all plugins.
     */
    public function managePluginsBackground(): void
    {
    }
}
/**
 * Penghentian proses berbasis path (Unix & Windows).
 *
 * Split out of `Background` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Background` through this trait.
 */
trait ProcessStopTrait
{
    /**
     * @param string $workingPath
     * @return int[]
     */
    protected function stopUnixProcessByPath(string $workingPath): array
    {
    }
    /**
     * @param string $workingPath
     * @return int[]
     */
    protected function stopWindowsProcessByPath(string $workingPath): array
    {
    }
}
/**
 * Spawn proses latar dan penghentian proses.
 *
 * Split out of `Background` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Background` through this trait.
 */
trait ProcessTrait
{
    protected function spawnProcess(string $scriptPath, string $pidFile, ?string $logFile): int
    {
    }
    /**
     * Stop a background process identified by its script name.
     *
     * @param string $scriptName script base name
     * @return false|string result message, or false on failure
     */
    public function stopProcessByName(string $scriptName): false|string
    {
    }
    /**
     * @param string $workingPath
     * @return int[]
     */
    public function stopProcessByPath(string $workingPath): array
    {
    }
}
/**
 * Eksekusi tugas latar dan stop unduhan.
 *
 * Split out of `Background` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Background` through this trait.
 */
trait RunTrait
{
    /**
     * @return array<string,mixed>
     */
    public function run(): array
    {
    }
    /**
     * Spawn a PHP script as a detached background process.
     *
     * @param string      $scriptPath script to run
     * @param null|string $logFile    optional log file to capture output
     * @return false|int process id, or false on failure
     */
    public function runInBackground(string $scriptPath = '', ?string $logFile = null): false|int
    {
    }
    /**
     * @return array<string,mixed>
     */
    public function stopDownload(): array
    {
    }
}
/**
 * Background task runner and system-activity monitor.
 *
 * Spawns and supervises worker scripts, reports resource usage and manages
 * the download queue, honoring the cache/download settings.
 */
class Background
{
    use \GDPlayer\Service\Background\ConnTrait;
    use \GDPlayer\Service\Background\CoreTrait;
    use \GDPlayer\Service\Background\PluginTrait;
    use \GDPlayer\Service\Background\ProcessStopTrait;
    use \GDPlayer\Service\Background\ProcessTrait;
    use \GDPlayer\Service\Background\RunTrait;
    /**
     * Load the download settings and ensure the required directories exist.
     */
    public function __construct()
    {
    }
    protected function pidFileIsRunning(?string $pidFile): ?int
    {
    }
    protected function runDownloadInBackground(): false|int
    {
    }
    /**
     * Resolve the pending background video data for a lock key.
     *
     * Only runs on the load balancer (or a single-server install); on any other
     * condition the lock key is cleared from the cache.
     *
     * @param string $lockKey background download lock key
     * @return array<string, mixed>|false video data with host/host_id, or false
     */
    public function getDataVideoByLockKey(?string $lockKey): false|array
    {
    }
    /**
     * Return the free disk space (in bytes) for the cache directory.
     *
     * @return float free space in bytes
     */
    public function getFreeSpace(): float
    {
    }
}
namespace GDPlayer\Service\Cache;

/**
 * Satu entri cache: nilai, TTL, dan daftar tag.
 *
 * Dipakai pemanggil sebagai builder (`set()->expiresAfter()->addTag()`) lalu
 * disimpan lewat `InstanceCache::save()`. Objek ini tidak menyimpan koneksi.
 */
final class CacheItem
{
    public function __construct(private readonly string $key, int $defaultTtl)
    {
    }
    public function addTag(string $tag): self
    {
    }
    /**
     * @param string[] $tags
     */
    public function addTags(array $tags): self
    {
    }
    public function expiresAfter(int|\DateInterval|null $ttl): self
    {
    }
    public function expiresAt(\DateTimeInterface $expiry): self
    {
    }
    public function get(): mixed
    {
    }
    public function getKey(): string
    {
    }
    /**
     * @return string[]
     */
    public function getTags(): array
    {
    }
    public function getTtl(): int
    {
    }
    public function isHit(): bool
    {
    }
    /**
     * Tandai entri sebagai hasil baca dari storage (dipakai store).
     */
    public function markHit(mixed $value): self
    {
    }
    public function set(mixed $value): self
    {
    }
}
/**
 * Lock `RedisCache` berbasis SET NX PX.
 *
 * Dipisah dari `RedisCache` karena aturan php:S2042 (maks 200 baris per kelas).
 */
trait RedisCacheLockTrait
{
    /**
     * Klaim lock SET NX PX.
     *
     * false = lock dipegang proses lain, null = cache mati.
     */
    public function lock(string $key, int $ttl): string|false|null
    {
    }
    public function unlock(string $key, string $token): bool
    {
    }
}
/**
 * Format payload `RedisCache`: diserahkan penuh ke phpredis bila build-nya
 * mendukung igbinary (serializer) dan zstd (kompresi), selain itu kembali ke
 * `serialize()` manual dengan whitelist class.
 *
 * Dipisah dari `RedisCache` karena aturan php:S2042 (maks 200 baris per kelas).
 */
trait RedisCacheSerializerTrait
{
    /**
     * Pasang serializer/kompresi terbaik yang tersedia.
     *
     * Konstanta `Redis::SERIALIZER_IGBINARY` dan `Redis::COMPRESSION_ZSTD` hanya
     * ada kalau phpredis dikompilasi dengan dukungan tersebut, jadi cek
     * `defined()` + `extension_loaded()` sudah cukup — build tanpa dukungan
     * (umum di Windows) otomatis jatuh ke jalur manual.
     */
    private function applySerializerOptions(\Redis $redis): void
    {
    }
    private function decode(string $raw): mixed
    {
    }
    /**
     * Kebalikan `encodeValue()`. Nilai dari klien berserializer sudah berupa
     * data asli; payload string lama dibaca lewat `decode()`.
     */
    private function decodeValue(mixed $raw): mixed
    {
    }
    /**
     * Nilai siap simpan: mentah (phpredis yang meng-encode) atau serialize
     * manual bila klien tidak punya serializer aktif.
     */
    private function encodeValue(mixed $value): mixed
    {
    }
    /**
     * Klien aktif sudah (un)serialize sendiri? Handle eksternal bisa saja
     * dimiliki komponen lain tanpa serializer, jadi tanya kliennya langsung:
     * `getOption` dijawab phpredis dari memori, tanpa round-trip.
     */
    private function usesNativeSerializer(): bool
    {
    }
}
/**
 * Operasi tag `RedisCache`: kunci versi tag dan pembuangan entri bertag.
 *
 * Dipisah dari `RedisCache` karena aturan php:S2042 (maks 200 baris per kelas).
 */
trait RedisCacheTagTrait
{
    /** TTL versi tag: 30 hari. Dipakai `bumpTag()` dan `tagVersion()`. */
    private int $tagTtl = 2592000;
    private function tagKey(string $tag): string
    {
    }
    private function tagSetKey(string $tag): string
    {
    }
    /**
     * Naikkan versi tag secara atomik (INCR). Nilai disimpan sebagai integer mentah.
     */
    public function bumpTag(string $tag): int
    {
    }
    /**
     * Hapus fisik semua entri yang terdaftar pada satu tag.
     *
     * SMEMBERS + DEL dijalankan dalam satu skrip Lua: kalau dipisah, anggota yang
     * mendarat di antara kedua perintah tidak pernah masuk daftar dan lolos.
     */
    public function deleteTag(string $tag): bool
    {
    }
    /**
     * Invalidasi tag atomik: versi naik dan entri lama dibuang dalam satu skrip.
     *
     * `bumpTag()` lalu `deleteTag()` punya dua titik waktu: key yang ditulis di
     * antaranya bisa ikut terbuang (data baru hilang) atau lolos sama sekali
     * (entri basi bertahan). Satu skrip = satu titik waktu: tulisan sebelum
     * invalidasi dibuang, tulisan sesudahnya selamat.
     *
     * @return int versi baru, 0 bila cache mati atau versi gagal dibaca
     */
    public function invalidateTag(string $tag): int
    {
    }
    /**
     * Versi tag saat ini; key yang belum ada diinisialisasi ke 1.
     */
    public function tagVersion(string $tag): int
    {
    }
}
/**
 * Cache store Redis biasa (phpredis).
 *
 * Handle Redis bisa di-inject runtime (RoadRunner: satu handle per worker,
 * Swoole: handle hasil borrow pool) sehingga cache tidak membuka koneksi baru.
 * Tanpa injeksi, store membuka satu koneksi persisten sendiri (mode FPM).
 *
 * Prefix ditulis manual ke setiap key — `Redis::OPT_PREFIX` milik klien tidak
 * diubah, karena klien yang di-inject dipakai bersama komponen lain.
 *
 * Operasi tag ada di `RedisCacheTagTrait`, operasi lock di `RedisCacheLockTrait`
 * (aturan php:S2042: maks 200 baris per kelas).
 */
final class RedisCache
{
    use \GDPlayer\Service\Cache\RedisCacheLockTrait;
    use \GDPlayer\Service\Cache\RedisCacheSerializerTrait;
    use \GDPlayer\Service\Cache\RedisCacheTagTrait;
    public function __construct(private readonly string $prefix, ?\Redis $redis = null, private readonly bool $external = false, private readonly int $defaultTtl = 3600)
    {
    }
    /**
     * Hapus seluruh key dalam prefix instance ini saja (bukan FLUSHDB).
     */
    public function clear(): bool
    {
    }
    public function delete(string $key): bool
    {
    }
    /**
     * Baca satu entri. Miss/rusak/mati = item tanpa hit, tanpa exception.
     */
    public function get(string $key): \GDPlayer\Service\Cache\CacheItem
    {
    }
    public function getPrefix(): string
    {
    }
    /**
     * Simpan satu entri.
     *
     * Saat entri bertag, nilai dan keanggotaan tagset dikirim dalam satu
     * MULTI/EXEC. Kalau dipisah, invalidasi yang mendarat di antara SET dan SADD
     * tidak melihat key baru: entri itu tidak pernah masuk daftar buang sehingga
     * nilai basi bertahan sampai TTL habis.
     */
    public function save(\GDPlayer\Service\Cache\CacheItem $item): bool
    {
    }
}
namespace GDPlayer\Service;

/**
 * Stream engine gate (Swoole = suffix 2, RoadRunner = suffix 3) against the server configuration.
 *
 * An engine plugin may only be used when two conditions hold: its process is alive AND its
 * reverse proxy rules (`stream-{seg,ts,vid}<suffix>`) are actually installed in the server
 * configuration. Without the second condition, `stream-*<suffix>` requests never reach the
 * engine, so streaming must stay on the PHP path ({@see Master}).
 *
 * The server configuration is checked directly in the files the application renders itself
 * ({@see ServerConfigManager::updateHtaccessFile()} for Apache/LiteSpeed and
 * {@see ServerConfigManager::updateNginxFile()} for nginx).
 */
final class EngineGate
{
    /**
     * Engine suffix usable by this install: the first active engine plugin whose
     * reverse proxy configuration is installed; '' when none.
     *
     * Taken from active plugins in the same record order as the legacy view, so
     * installs without a reverse proxy keep using the PHP path with no redirect.
     *
     * @return string engine suffix ('2' | '3') or '' when none is ready
     */
    public static function activeSuffix(): string
    {
    }
    /**
     * Are the engine reverse proxy rules installed in the server configuration?
     *
     * @param string   $suffix      engine suffix ('2' = Swoole, '3' = RoadRunner)
     * @param string[] $configFiles override the file list (for testing)
     * @return bool true when the `stream-*<suffix>` rule is found
     */
    public static function hasProxyRule(string $suffix, array $configFiles = []): bool
    {
    }
    /**
     * Is the reverse proxy rule installed for a given engine?
     *
     * An active plugin whose reverse proxy configuration is not installed must not be
     * used: `stream-*<suffix>` requests would fall back to PHP, not to the engine.
     *
     * @param string   $pluginNameOrEngineSuffix engine name or suffix
     * @param string[] $configFiles               override the file list (for testing)
     * @return bool true when the engine proxy rule exists
     */
    public static function isProxied(string $pluginNameOrEngineSuffix, array $configFiles = []): bool
    {
    }
    /**
     * Engine ready to serve streams: its process is alive AND its reverse proxy is installed.
     *
     * This is the only gate used by the request path ({@see PluginManager::redirectEngineAlive()},
     * EngineFallbackController, and segment URL building) so that installs without a reverse proxy
     * configuration keep being served by the PHP path.
     *
     * @param string $pluginNameOrEngineSuffix engine name or suffix
     * @return bool true when the engine may be used by the request path
     */
    public static function isServed(string $pluginNameOrEngineSuffix): bool
    {
    }
    /**
     * Engine suffix ('2' = Swoole, '3' = RoadRunner) from a plugin name/suffix; '' when unknown.
     *
     * @param string $identifier plugin folder/name or engine suffix
     * @return string '2' | '3' | ''
     */
    public static function suffixOf(string $identifier): string
    {
    }
}
namespace GDPlayer\Service\HeadlessChrome;

/**
 * Pembuatan browser dan URL browser persisten.
 *
 * Split out of `HeadlessChrome` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `HeadlessChrome` through this trait.
 */
trait BrowserTrait
{
    /**
     * Spawns a configured Headless Chromium browser instance.
     *
     * @param array<string,string> $headers
     * @param string $logName
     * @param bool $keepAlive
     * @return \HeadlessChromium\Browser
     */
    protected function createBrowser(array $headers, string $logName, bool $keepAlive = false): \HeadlessChromium\Browser
    {
    }
    protected function createLogStream(string $logName): \Monolog\Logger
    {
    }
    /**
     * Queries the local running Chrome debugging port to fetch the WebSocket debugger URL.
     *
     * @return string|null
     */
    protected function getPersistentBrowserUrl(): ?string
    {
    }
}
/**
 * Deteksi dan pembersihan proses Chrome/Chromium.
 *
 * Split out of `CoreTrait` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `CoreTrait` through this trait.
 */
trait ProcessTrait
{
    protected function getChromiumWindows(): ?string
    {
    }
    /**
     * Resolve the effective remote debugging port from a process command line.
     *
     * chrome-php always passes `--remote-debugging-port=0` first and appends the
     * configured port afterwards. Chromium keeps the last switch, so the last
     * match is the effective port.
     *
     * @param string $commandLine full process command line
     * @return int effective port, or 0 when the switch is absent
     */
    protected function getCommandLineDebugPort(string $commandLine): int
    {
    }
    /**
     * List headless Chrome processes on Unix as pid => command line.
     *
     * @return array<int,string>
     */
    protected function getHeadlessChromeProcessesUnix(): array
    {
    }
    /**
     * List headless Chrome processes on Windows as pid => command line.
     *
     * @return array<int,string>
     */
    protected function getHeadlessChromeProcessesWindows(): array
    {
    }
    protected static function getWindowsInstance(): ?string
    {
    }
    /**
     * Force-terminate a process and its children by PID.
     *
     * @param int $pid process id
     * @return int true when the kill command was issued
     */
    protected function killChromeProcess(int $pid): int
    {
    }
    /**
     * Terminate headless Chrome instances that no longer serve the active port.
     *
     * A browser spawned with `keepAlive` keeps running after the request ends.
     * When the stored port is lost a new port is picked while the previous
     * instance keeps listening on the old one, wasting memory and CPU. Only
     * headless instances started with a `--remote-debugging-port` flag are
     * targeted, and the instance bound to the active port is always preserved,
     * so neither a regular browser session nor the working instance is touched.
     *
     * @return int number of terminated processes
     */
    public function closeOrphanChrome(): int
    {
    }
}
/**
 * Headless Chrome process management and DevTools protocol helpers.
 */
trait CoreTrait
{
    use \GDPlayer\Service\HeadlessChrome\ProcessTrait;
    private string $cookies = '';
    private string $referer = '';
    private int $timeout = 30000;
    private string $userLanguage = \GDPlayer\Config\App::ACCEPT_LANGUAGE;
    private function extractPageHtml(\HeadlessChromium\Page $page): string
    {
    }
    /**
     * @param \HeadlessChromium\Communication\Connection $connection
     * @param \ReflectionProperty $propReceived
     */
    private function flushReceivedMessages($connection, \ReflectionProperty $propReceived): void
    {
    }
    private function isPageLoadWaitComplete(\HeadlessChromium\Page $page, ?float &$loadTime, float $waitAfterLoadSeconds): bool
    {
    }
    /**
     * Prepares custom request headers.
     *
     * @return array<string,string>
     */
    private function prepareHeaders(): array
    {
    }
    private function waitForDoodstreamLoad(\HeadlessChromium\Page $page, bool &$redirected): void
    {
    }
}
/**
 * Navigasi halaman dan eksekusi skrip halaman.
 *
 * Split out of `HeadlessChrome` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `HeadlessChrome` through this trait.
 */
trait NavigateTrait
{
    /**
     * Helper to run optional custom page scripts and evaluation code.
     *
     * @param \HeadlessChromium\Page $page
     * @param string $jsContent
     * @param string $evaluation
     * @param array<string,mixed> $result
     * @return void
     */
    protected function executePageScripts(\HeadlessChromium\Page $page, string $jsContent, string $evaluation, array &$result): void
    {
    }
    /**
     * Executes Doodstream-specific navigation and non-blocking wait loop.
     *
     * @param \HeadlessChromium\Page $page
     * @param string $url
     * @param bool $redirected
     * @param string $jsContent
     * @param string $evaluation
     * @param array<string,mixed> $result
     * @return void
     */
    protected function navigateDoodstream(\HeadlessChromium\Page $page, string $url, bool &$redirected, string $jsContent, string $evaluation, array &$result): void
    {
    }
    /**
     * Executes standard page navigation for all other hosts.
     *
     * @param \HeadlessChromium\Page $page
     * @param string $url
     * @param string $jsContent
     * @param string $evaluation
     * @param array<string,mixed> $result
     * @return void
     */
    protected function navigateStandard(\HeadlessChromium\Page $page, string $url, string $jsContent, string $evaluation, array &$result): void
    {
    }
}
/**
 * Intersepsi fetch dan listener jaringan.
 *
 * Split out of `HeadlessChrome` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `HeadlessChrome` through this trait.
 */
trait NetworkTrait
{
    /**
     * Enables Fetch domain and registers redirection interception event listeners.
     *
     * @param \HeadlessChromium\Page $page
     * @param string $url
     * @param bool $redirected
     * @return void
     */
    protected function setupFetchInterception(\HeadlessChromium\Page $page, string $url, bool &$redirected): void
    {
    }
    /**
     * Registers network event listeners to capture specific AJAX requests and their load state.
     *
     * @param \HeadlessChromium\Page $page
     * @param array<string,mixed> $result
     * @param array<string,int> $capturedRequests
     * @param array<string,bool> $loadedRequests
     * @return void
     */
    protected function setupNetworkListeners(\HeadlessChromium\Page $page, array &$result, array &$capturedRequests, array &$loadedRequests): void
    {
    }
}
/**
 * Eksekusi skrip pada browser persisten.
 *
 * Split out of `HeadlessChrome` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `HeadlessChrome` through this trait.
 */
trait PersistentTrait
{
    /**
     * Initializes basic page settings and enables required CDP domains.
     *
     * @param \HeadlessChromium\Page $page
     * @return void
     */
    private static function initializePage(\HeadlessChromium\Page $page): void
    {
    }
    /**
     * Sync retrieves the response body of loaded captured requests.
     *
     * @param \HeadlessChromium\Page $page
     * @param array<string,int> $capturedRequests
     * @param array<string,bool> $loadedRequests
     * @param array<string,mixed> $result
     * @return void
     */
    protected function fetchAjaxResponseBodies(\HeadlessChromium\Page $page, array $capturedRequests, array $loadedRequests, array &$result): void
    {
    }
    /**
     * Generates the multi-line JS stealth script.
     *
     * @param bool $isDoodstream
     * @return string
     */
    protected static function getStealthScript(bool $isDoodstream): string
    {
    }
    /**
     * Executes headless Chrome against a URL using a persistent running Chrome instance.
     * Auto-spawns the browser on a specific port if it is dead or unavailable.
     * Creates a new isolated tab for each request to support concurrency.
     *
     * @param string $url
     * @param string $logName
     * @param string $jsContent
     * @param string $evaluation
     * @return array<string,mixed>
     */
    public function execPersistent(string $url = '', string $logName = '', string $jsContent = '', string $evaluation = ''): array
    {
    }
}
namespace GDPlayer\Service\System;

/**
 * TCP port availability checker.
 */
trait PortChecker
{
    /**
     * @param string $file
     * @return array{ip: string|false, port: int|float}[]
     */
    private function extractFile(string $file): array
    {
    }
    /**
     * @return array{ip: string|false, port: int|float}[]
     */
    protected function getListeningPortsLinux(): array
    {
    }
    /**
     * @return array{ip: string|false, port: int|float}[]
     */
    protected function getListeningPortsWindows(): array
    {
    }
    /**
     * @return array{ip: string|false, port: int|float}[]
     */
    protected function getListeningPortsWithCommand(): array
    {
    }
    /**
     * Check whether a TCP port accepts connections.
     *
     * @param int    $port    port number
     * @param string $host    host to probe
     * @param int    $timeout connection timeout in seconds
     * @return bool true when the port is open
     */
    public function isPortOpen(int $port, string $host = '127.0.0.1', int $timeout = 2): bool
    {
    }
}
namespace GDPlayer\Service\HeadlessChrome;

/**
 * Headless Chrome service for JavaScript-heavy hosts.
 *
 * Manages a persistent Chromium instance over the DevTools protocol and
 * exposes a fluent configuration API for proxy, cookies and timeouts.
 */
final class HeadlessChrome
{
    use \GDPlayer\Service\HeadlessChrome\BrowserTrait;
    use \GDPlayer\Service\HeadlessChrome\CoreTrait;
    use \GDPlayer\Service\HeadlessChrome\NavigateTrait;
    use \GDPlayer\Service\HeadlessChrome\NetworkTrait;
    use \GDPlayer\Service\HeadlessChrome\PersistentTrait;
    use \GDPlayer\Service\System\PortChecker;
    /**
     * Resolve the persistent debugging port and prepare the service configuration.
     *
     * The port is persisted in the database (`chrome-port`) so it survives a cache
     * flush. Otherwise a new port would be picked while the Chrome instance still
     * running on the old port would be left behind as an orphan.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Return the address of a running Chrome instance, starting one if needed.
     *
     * @return null|string debugging endpoint, or null when Chrome is unavailable
     */
    public function getInstance(): ?string
    {
    }
    /**
     * Set the cookie header sent to the browser.
     *
     * @param string $cookies cookie header value
     * @return self fluent instance
     */
    public function setCookies(string $cookies = ''): self
    {
    }
    /**
     * Set the proxy and its bypass list.
     *
     * @param string $proxy           Proxy URL (e.g. socks5://127.0.0.1:40000).
     * @param string $proxyBypassList comma-separated bypass list
     * @return self fluent instance
     */
    public function setProxy(string $proxy = '', string $proxyBypassList = ''): self
    {
    }
    /**
     * Set the referer header.
     *
     * @param string $referer referer URL
     * @return self fluent instance
     */
    public function setReferer(string $referer = ''): self
    {
    }
    /**
     * Set the page/evaluation timeout.
     *
     * @param int $timeout timeout in milliseconds
     * @return self fluent instance
     */
    public function setTimeout(int $timeout = 30000): self
    {
    }
    /**
     * Set the user agent.
     *
     * @param string $userAgent user agent string
     * @return self fluent instance
     */
    public function setUserAgent(string $userAgent = ''): self
    {
    }
    /**
     * Set the Accept-Language value.
     *
     * @param string $userLanguage language header value
     * @return self fluent instance
     */
    public function setUserLanguage(string $userLanguage = ''): self
    {
    }
}
/**
 * Exception thrown for headless Chrome failures.
 */
final class HeadlessChromeException extends \Exception
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
}
namespace GDPlayer\Service\InstanceCache;

/**
 * Pemegang store cache bersama.
 *
 * Runtime long-running meng-inject handle Redis miliknya sendiri
 * (`useRedis()`), jadi cache tidak pernah membuka koneksi kedua. Tanpa
 * injeksi, `RedisCache` membuka satu koneksi persisten (mode FPM).
 */
trait CoreTrait
{
    /** Dipakai di luar coroutine (SAPI / RoadRunner / CLI). */
    private static ?\GDPlayer\Service\InstanceCache\InstanceCacheState $state = null;
    /**
     * Prefix instance + `_v2_`: key phpfastcache lama tidak pernah terbaca
     * sebagai payload baru, dan mati sendiri oleh TTL.
     */
    private static function cachePrefix(): string
    {
    }
    /**
     * State milik coroutine berjalan; di Swoole tiap request punya instance sendiri
     * sehingga `resetRedis()` milik satu request tidak memutus store request lain.
     */
    private static function state(): \GDPlayer\Service\InstanceCache\InstanceCacheState
    {
    }
    private static function store(): \GDPlayer\Service\Cache\RedisCache
    {
    }
    /**
     * Kembali ke mode kelola-sendiri (FPM / CLI).
     */
    public static function resetRedis(): void
    {
    }
    /**
     * Inject handle Redis milik runtime. Handle yang sama dipakai terus —
     * reconnect adalah tanggung jawab pemiliknya (pool / worker manager).
     */
    public static function useRedis(?\Redis $redis): void
    {
    }
}
/**
 * Versi tag dan invalidasi cache berbasis tag.
 *
 * Versi tag disimpan sebagai integer mentah (`INCR` atomik) supaya invalidasi
 * dari worker mana pun langsung terlihat. Split dari `InstanceCache` karena
 * aturan php:S2042 (maks 150 baris per kelas).
 */
trait TagTrait
{
    private static function cleanTag(string $tag): string
    {
    }
    /**
     * Kunci komposit ber-versi tag (tanpa titik dua).
     * Format: {baseKey}_v{tag1Version}_{tag2Version}
     *
     * @param string|string[] $tags
     */
    public static function createVersionedKey(string $baseKey, string|array $tags): string
    {
    }
    /**
     * Invalidasi tag: versi dinaikkan dan entri bertag dibuang fisik.
     *
     * Keduanya satu skrip di server (`RedisCache::invalidateTag()`), jadi tidak
     * ada jendela antara naik-versi dan buang-entri tempat key baru bisa lolos.
     */
    public static function deleteItemsByTag(string $tagName = ''): int
    {
    }
    /**
     * @param string[] $tagNames
     */
    public static function deleteItemsByTags(array $tagNames = []): int
    {
    }
    /**
     * Versi tag saat ini dari storage (dimemo per request).
     */
    public static function getTagVersion(string $tag): int
    {
    }
    /**
     * Naikkan versi tag secara atomik.
     */
    public static function invalidateTag(string $tag): int
    {
    }
    /**
     * @param string[] $tags
     */
    public static function invalidateTags(array $tags): int
    {
    }
    /**
     * Kosongkan memo versi tag. Wajib dipanggil di akhir tiap request pada
     * proses long-running (RoadRunner/Swoole): versi dibaca ulang dari storage
     * sehingga invalidasi worker lain langsung terlihat.
     */
    public static function resetTagVersions(): void
    {
    }
}
/**
 * Facade cache aplikasi di atas Redis biasa (`RedisCache`).
 *
 * Static supaya 293 pemanggil lama tidak berubah. Runtime long-running cukup
 * meng-inject handle Redis-nya sekali saat boot lewat `useRedis()`.
 */
final class InstanceCache
{
    use \GDPlayer\Service\InstanceCache\CoreTrait;
    use \GDPlayer\Service\InstanceCache\TagTrait;
    public static function clear(): int
    {
    }
    public static function deleteItem(string $key = ''): int
    {
    }
    /**
     * Ambil entri; selalu mengembalikan objek (miss = `isHit()` false) supaya
     * pola `$item->set(...)` lalu `save()` tetap jalan.
     */
    public static function getItem(string $key): ?\GDPlayer\Service\Cache\CacheItem
    {
    }
    /**
     * Cache stampede protection: satu pemegang lock, sisanya menunggu hasil.
     *
     * @param int|\DateInterval|\DateTimeInterface|null $ttl
     * @param string|string[]|null $tags
     */
    public static function getOrSetWithLock(string $key, $ttl, callable $callback, $tags = null, int $lockTimeout = 15): mixed
    {
    }
    public static function save(?\GDPlayer\Service\Cache\CacheItem $cacheItem): int
    {
    }
    /**
     * @param int|\DateInterval|\DateTimeInterface|null $ttl
     * @param string|string[]|null $tags
     */
    public static function setItem(string $key, mixed $value, $ttl = null, $tags = null): int
    {
    }
}
/**
 * Exception thrown for cache backend failures.
 */
final class InstanceCacheException extends \Exception
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
}
/**
 * Pemegang store cache untuk satu eksekusi (satu request).
 *
 * Di Swoole beberapa request hidup sebagai coroutine dalam satu proses, jadi state ini
 * disimpan di context coroutine (lihat {@see CoreTrait::state()}); di SAPI/RoadRunner
 * hanya ada satu instance statis. Field-nya publik supaya trait tidak perlu getter/setter.
 */
final class InstanceCacheState
{
    public ?\Redis $redis = null;
    /** true = handle milik runtime; cache tidak boleh connect sendiri. */
    public bool $redisInjected = false;
    public ?\GDPlayer\Service\Cache\RedisCache $store = null;
    /**
     * Memo versi tag, hanya berlaku satu request.
     *
     * @var array<string, int>
     */
    public array $tagVersions = [];
}
namespace GDPlayer\Service;

/**
 * Authentication service for login, registration tokens and session handling.
 */
final class Login
{
    /**
     * Bind the security, session and geolocation services.
     *
     * @param \Psr\Http\Message\ServerRequestInterface|null $request PSR-7 request, or null to fall back to globals
     */
    public function __construct(?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @return array<string, mixed>|null
     */
    public static function getCurrentUser(string $customToken = '', ?\Psr\Http\Message\ServerRequestInterface $request = null): ?array
    {
    }
    public static function getPublicUserId(?\Psr\Http\Message\ServerRequestInterface $request = null): int
    {
    }
    /**
     * must be httponly: false because it is used for http and ajax
     *
     * @param array<string,mixed> $dataUser
     * @param string $expiredAt
     * @return bool
     */
    public function hasSavedLoginData(array $dataUser, string $expiredAt): bool
    {
    }
    public static function isCurrentUserAdmin(?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
    /**
     * Validate a login/registration token from the query string.
     *
     * @param string $redirectUrl URL to redirect to on failure
     * @return bool true when the token is valid
     */
    public function isRegisterTokenValid(string $redirectUrl): bool
    {
    }
    /**
     * must be httponly: false because it is used for http and ajax
     *
     * @return int
     */
    public function logout(): int
    {
    }
    /**
     * Validate a password and its confirmation against the security policy.
     *
     * @param string $password        password to validate
     * @param string $retype_password confirmation value
     * @return string alert HTML with the validation result
     */
    public function passwordValidation(string $password = '', string $retype_password = ''): string
    {
    }
    /**
     * Record a failed login attempt.
     *
     * @param string $username attempted username
     * @return string|false insert result, or false on failure
     */
    public function saveLoginFailed(string $username = ''): string|false
    {
    }
    /**
     * @param string $token
     * @return null|array<string,mixed>
     */
    public function tokenValidation(string $token): ?array
    {
    }
    public static function validateAdminToken(string $token = '', ?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
}
namespace GDPlayer\Service\Media;

/**
 * Generates multi-size .ico favicon files from a source image.
 */
class PhpIco
{
    /**
     * Constructor - Create a new ICO generator.
     * If the constructor is not passed a file, a file will need to be supplied using the {@link PhpIco::addImage}
     * function in order to generate an ICO file.
     *
     * An array of sizes (each size is an array with a width and height) that the source image
     * should be rendered at in the generated ICO file. If sizes are not supplied,
     * the size of the source image will be used.
     *
     * @param string $file Optional. Path to the source image file.
     * @param list<array{0:int<1,max>,1:int<1,max>}> $sizes optional
     */
    public function __construct(string $file, array $sizes = [])
    {
    }
    /**
     * Write the ICO file data to a file path.
     *
     * @param string $file path to save the ICO file data into
     */
    public function saveIco(string $file): void
    {
    }
}
/**
 * Minimal GD-based image loader/resizer used for logos and favicons.
 */
final class SimpleImage
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Return the loaded image height in pixels.
     *
     * @return int|false height in pixels, or false when no image is loaded
     */
    public function getHeight(): int|false
    {
    }
    /**
     * Return the loaded image width in pixels.
     *
     * @return int|false width in pixels, or false when no image is loaded
     */
    public function getWidth(): int|false
    {
    }
    /**
     * Load an image file into memory.
     *
     * @param string $inputFile path to the image
     * @return void
     */
    public function load(string $inputFile): void
    {
    }
    /**
     * @param int $width output image width
     * @param int $height output image height
     * @return int
     */
    public function resize(int $width = 16, int $height = 16): int
    {
    }
    /**
     * Save the current image to disk.
     *
     * @param string $outputFile    destination path
     * @param string $convertToType output format ('png'|'jpg'|'gif'|'webp')
     * @param int    $quality       compression quality (0-100)
     * @return int true when the image was saved
     */
    public function save(string $outputFile, string $convertToType = 'png', int $quality = 80): int
    {
    }
}
/**
 * Converts subtitle formats (SRT/VTT/ASS/...) to WebVTT.
 */
final class SubtitleConverter
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Convert the loaded subtitle content to WebVTT.
     *
     * @param string $sourceType Source format (e.g. 'srt', 'vtt', 'ass').
     * @return string webVTT output (header-only when the input is invalid)
     */
    public function convertToVTT(string $sourceType = ''): string
    {
    }
    /**
     * Load subtitle content from a string.
     *
     * @param string $content subtitle text
     * @return self fluent instance
     */
    public function loadContent(string $content = ''): self
    {
    }
    /**
     * Load subtitle content from a file.
     *
     * @param string $file path to the subtitle file
     * @return self fluent instance
     */
    public function loadFromFile(string $file = ''): self
    {
    }
}
namespace GDPlayer\Service;

/**
 * Minifier for inline JavaScript, CSS and JSON.
 */
final class Minify
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param string $input
     * @return string
     */
    public static function js(string $input = ''): string
    {
    }
    /**
     * Minify a JSON string.
     *
     * @param string $input JSON text
     * @return string minified JSON, or the input when empty/invalid
     */
    public static function json(string $input = ''): string
    {
    }
}
namespace GDPlayer\Service\Sync;

/**
 * Bagian protokol sinkronisasi yang identik untuk tema dan plugin.
 *
 * Blok ini dulu disalin utuh di `Service\Theme\DownloadTrait` dan `Service\Plugin\DownloadTrait`
 * (duplikasi high pada new code). Perilaku tiap method tidak berubah; `$kind` hanya untuk log.
 */
trait DownloadSyncTrait
{
    /**
     * Unduh satu arsip di bawah file lock (lock sengaja permanen: menghapusnya saat masih
     * dipegang memungkinkan dua proses menulis arsip yang sama).
     *
     * @param string               $link     URL arsip
     * @param string               $zipPath  tujuan
     * @param string               $lockBase path dasar file lock/log
     * @param string               $kind     plugin|theme
     * @param array<string, mixed> $context  konteks log
     * @return string|false
     */
    protected static function fetchArchive(string $link, string $zipPath, string $lockBase, string $kind, array $context): string|false
    {
    }
    /**
     * Minta stamp isi folder tema/plugin dari server sumber.
     *
     * @param string               $url     URL aksi `ping`
     * @param string               $kind    plugin|theme (untuk pesan log)
     * @param array<string, mixed> $context konteks log
     * @return string|false stamp, atau false saat gagal / tidak valid
     */
    protected static function fetchStampFromSource(string $url, string $kind, array $context): string|false
    {
    }
    /**
     * @param string $stamp nilai stamp dari server sumber
     */
    protected static function isValidStamp(string $stamp): bool
    {
    }
    /**
     * @param string $tmpDir direktori tmp
     * @param string $name   nama folder tema/plugin
     */
    protected static function readStamp(string $tmpDir, string $name): string
    {
    }
    /**
     * Alamat `main_site` yang dipakai untuk menarik arsip, atau '' bila server ini sendiri.
     */
    protected static function resolveMainSite(): string
    {
    }
    /**
     * @param string $tmpDir direktori tmp
     * @param string $name   nama folder tema/plugin
     */
    protected static function stampFile(string $tmpDir, string $name): string
    {
    }
}
namespace GDPlayer\Service\Plugin;

/**
 * Unduh dan simpan berkas plugin.
 *
 * Split out of `PluginManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginManager` through this trait.
 *
 * Protokol sinkronisasi: `ping` membalas stamp isi folder (sha1), bukan 'ok'.
 * Node membandingkannya dengan stamp terakhir yang sukses diekstrak; stamp sama =
 * tidak ada unduhan sama sekali. Nama arsip memuat stamp, jadi isi yang tidak
 * berubah tidak pernah dibangun ulang di server sumber. Bagian yang sama dengan
 * tema ada di `DownloadSyncTrait`.
 */
trait DownloadTrait
{
    use \GDPlayer\Service\Sync\DownloadSyncTrait;
    /**
     * @param int    $pluginId plugin id
     * @param string $action   ping|download
     * @return string URL, atau '' bila server ini adalah sumbernya sendiri
     */
    protected static function getSyncDownloadUrl(int $pluginId, string $action = 'ping'): string
    {
    }
    /**
     * Unduh arsip plugin bila stamp berbeda dari yang terakhir dipasang.
     *
     * @param int    $pluginId plugin id
     * @param string $folder   folder plugin
     * @param string $stamp    stamp isi folder di server sumber
     * @return string|false path arsip, false bila sudah mutakhir atau gagal
     */
    public static function downloadPluginFile(int $pluginId, string $folder, string $stamp = ''): string|false
    {
    }
    /**
     * Catat stamp yang sudah berhasil dipasang (dipakai untuk melewati siklus berikutnya).
     *
     * @param string $folder folder plugin
     * @param string $stamp  stamp isi folder di server sumber
     */
    public static function markSynced(string $folder, string $stamp): void
    {
    }
    /**
     * Minta stamp isi folder plugin di server sumber.
     *
     * @param int $pluginId plugin id
     * @return string|false stamp, '' bila tidak ada yang perlu disinkronkan, false saat gagal
     */
    public static function syncPluginFile(int $pluginId): string|false
    {
    }
}
/**
 * Bridge from plugin API routes (plugins/api) to the core router.
 *
 * Routes /api/v1/* are registered by the core router; this handler hands the request to the
 * plugin's own router (ApiBootstrap::registerRoutes + Router::dispatch) while capturing its output
 * because plugin controllers write JSON directly through JsonResponse. The plugin license gate
 * (Security::isPluginValid('api') -> 503) also runs inside the plugin's Router::dispatch.
 */
final class PluginApiBridge
{
    /**
     * Handle /api/v1/* requests through the plugin router.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request active request
     * @return \Psr\Http\Message\ResponseInterface plugin JSON response
     */
    public static function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Is the `api` plugin active (status=1)? Queried per call, like PluginRouteRegistry.
     *
     * @return bool true when the plugin is active
     */
    public static function isPluginActive(): bool
    {
    }
}
/**
 * Dispatches registered plugin hooks and filters across the application.
 */
final class PluginHookManager
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Collect all registered widgets from active plugins, grouped by slot name.
     * Results are cached using InstanceCache.
     *
     * @param bool $isAdmin Whether the current user is an admin
     * @return array<string, list<array<string, mixed>>>
     */
    public static function collectWidgets(bool $isAdmin = false): array
    {
    }
    /**
     * Execute PHP hook files registered by active plugins for a given hook name.
     *
     * The hook file receives $hookData as an associative array containing
     * context-specific data (e.g., video ID, POST data, etc.).
     *
     * @param string $hookName The hook name (e.g., 'video.save', 'video.edit.load')
     * @param array<string, mixed> $hookData Data passed to the hook file
     * @return array<string, mixed> Merged results from all hook executions
     */
    public static function executeHook(string $hookName, array $hookData = []): array
    {
    }
    /**
     * Filter/modify API response data through plugin hooks.
     * Specifically for the 'api.response.filter' hook.
     *
     * The filter file receives $responseData and $queryData,
     * and returns modified $responseData.
     *
     * @param array<string, mixed> $responseData The API response data
     * @param array<string, mixed> $queryData The original query parameters
     * @return array<string, mixed> Modified response data
     */
    public static function filterApiResponse(array $responseData, array $queryData = []): array
    {
    }
}
/**
 * Shared plugin/theme archive extraction and version-check helpers.
 */
trait ThemeManagerTrait
{
    /**
     * @param string $link
     * @param string $zipPath
     * @param string $logFile
     * @param string $targetType
     * @param array<string, mixed> $context
     * @return string|false
     */
    private static function performDownload(string $link, string $zipPath, string $logFile, string $targetType = 'plugin', array $context = []): string|false
    {
    }
}
/**
 * Ekstraksi arsip plugin dan penentuan berkas yang dipertahankan.
 *
 * Split out of `PluginManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginManager` through this trait.
 */
trait ZipTrait
{
    /**
     * @param \ZipArchive $zip
     * @return array<string|int,mixed>
     */
    protected static function getFilesToKeep(\ZipArchive $zip): array
    {
    }
    /**
     * @param \ZipArchive $zip
     * @param int $index
     * @param string $destinationPath
     * @param array<string|int,mixed> $keepFiles
     * @param bool $isUpgrade
     */
    protected static function processZipItem(\ZipArchive $zip, int $index, string $destinationPath, array $keepFiles, bool $isUpgrade): void
    {
    }
    protected static function shouldUpgradePlugin(\ZipArchive $zip, string $destinationPath): bool
    {
    }
    /**
     * Extract a plugin archive into the plugins directory.
     *
     * @param string $zipPath         path to the archive
     * @param string $destinationPath destination directory
     * @param bool   $isUpgrade       whether this is an upgrade (version-guarded)
     * @return int true when extraction succeeded
     */
    public static function extractPluginZip(string $zipPath, string $destinationPath, bool $isUpgrade = false): int
    {
    }
}
/**
 * Plugin lifecycle manager (install, upgrade, dispatch, sync).
 *
 * Handles plugin archives, page dispatch and engine (swoole/roadrunner)
 * liveness checks.
 */
final class PluginManager
{
    use \GDPlayer\Service\Plugin\DownloadTrait;
    use \GDPlayer\Service\Plugin\ThemeManagerTrait;
    use \GDPlayer\Service\Plugin\ZipTrait;
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @param list<array<string, mixed>> $activePlugins
     * @return list<array<string, mixed>>
     */
    public static function checkCandidates(array $activePlugins): array
    {
    }
    /**
     * Engine order for redirection: preferred engine first, then its fallback (legacy view override pattern).
     *
     * @return string[] [preferred engine, fallback engine]; empty array when no engine plugin is active
     */
    public static function engineFallbackOrder(): array
    {
    }
    /**
     * Check whether an application engine (swoole/roadrunner) is responding.
     *
     * @param string   $pluginNameOrEngineSuffix engine name or suffix
     * @param null|int $port                     port override
     * @param bool     $useCache                 whether to use the cached result
     * @return bool true when the engine is alive
     */
    public static function isEngineAlive(string $pluginNameOrEngineSuffix, ?int $port = null, bool $useCache = true): bool
    {
    }
    /**
     * @param array<string,mixed> $pluginJson
     * @return bool
     */
    public static function isPluginValid(array $pluginJson): bool
    {
    }
    /**
     * Proxy engine suffix used by this install (2 = Swoole, 3 = RoadRunner).
     *
     * Taken from the **active** engine plugin in the same record order as
     * {@see PluginRouteRegistry} (first one wins), so the result is identical to the legacy
     * override view, which declared its own engine first. Installs without an active engine plugin
     * (the default case) return '' → streaming is served locally, with no redirect.
     *
     * @return string engine suffix ('2'|'3') or '' when no engine plugin is active
     */
    public static function preferredEngineSuffix(): string
    {
    }
    /**
     * Redirect to a request URI served by whichever engine is alive.
     *
     * @param string $separator   path separator inserted into the URI
     * @param string $engineFirst first engine to try
     * @param string $engineLast  fallback engine
     * @return void
     */
    public static function redirectEngineAlive(string $separator, string $engineFirst, string $engineLast = '', ?\Psr\Http\Message\ServerRequestInterface $request = null): void
    {
    }
}
/**
 * Exception thrown for plugin manager failures.
 */
final class PluginManagerException extends \RuntimeException
{
}
/**
 * Resolves plugin-owned admin pages and uninstall hooks from `plugin.json`.
 *
 * The request path no longer includes `views/backend/*.php`: pages are declared as
 * `pages.backend.<page>` and the uninstall hook as `hooks.uninstall`, both class names
 * loaded through the extension PSR-4 autoloader.
 */
final class PluginPageRegistry
{
    /**
     * Buang manifest plugin yang sudah dibaca agar perubahan manifest ikut terbaca.
     */
    public static function reset(): void
    {
    }
    /**
     * @param string $folder plugin folder with trailing slash
     * @return class-string<\GDPlayer\Extension\UninstallHookInterface>|null
     */
    public static function uninstallHook(string $folder): ?string
    {
    }
    /**
     * @param string $folder plugin folder with trailing slash (e.g. `swoole/`)
     * @param string $page page slug from `?page=` (already sanitised by the caller)
     * @return class-string<\GDPlayer\View\ViewInterface>|null
     */
    public static function viewClass(string $folder, string $page): ?string
    {
    }
}
/**
 * Route-map compilers (manifest + registry table) and route-path validation.
 *
 * Split out of `PluginRouteRegistry` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginRouteRegistry` through this trait.
 */
trait RouteCompileTrait
{
    /**
     * Keep the first declaration of an area/match/page triple.
     *
     * `routes` is read before the legacy `overrides` map, so a page declared in both
     * resolves to the `routes` entry. The index holds one row per triple, so a duplicate
     * would violate the unique key and abort the whole sync.
     *
     * @param list<array{page: string, view: string, match: string, priority: int, status: int}> $declared
     * @param array<string, true> $seen area/match/page triples already declared
     * @param string $area frontend or backend
     * @param array{page: string, view: string, match: string, priority: int, status: int} $route
     */
    private static function addDeclaredRoute(array &$declared, array &$seen, string $area, array $route): void
    {
    }
    /**
     * Compile the route map for one area straight from the active plugin manifests.
     *
     * @param string $area frontend or backend
     * @return array<string, array<string, ?string>>
     */
    private static function compileFromManifests(string $area): array
    {
    }
    /**
     * Compile the route map for one area from the registry table.
     *
     * @param string $area frontend or backend
     * @return array<string, array<string, ?string>>|null null when the table is unavailable
     */
    private static function compileFromTable(string $area): ?array
    {
    }
    /**
     * @param string $fileReal
     * @param string $pluginReal
     * @param string $folder
     * @param string $viewPath
     * @return string|null
     */
    private static function ensureInsidePluginFolder(string $fileReal, string $pluginReal, string $folder, string $viewPath): ?string
    {
    }
    private static function isValidPage(string $page): bool
    {
    }
    private static function isValidViewPath(string $viewPath): bool
    {
    }
    /**
     * Resolve a manifest-relative view path to its absolute path, rejecting anything
     * that escapes the plugin folder (symlink or traversal).
     */
    /**
     * Resolve a manifest-relative view path to its absolute path, rejecting anything
     * that escapes the plugin folder (symlink or traversal).
     *
     * @param string $folder
     * @param string $viewPath
     * @return string|null
     */
    private static function resolvePluginFile(string $folder, string $viewPath): ?string
    {
    }
}
/**
 * Resolves a request path to a plugin-owned view file through the `tb_plugin_routes` table.
 *
 * The table is a derived index of the routes each active plugin declares in its
 * `plugin.json`; the manifest stays the source of truth and is read as a fallback
 * whenever the index is not usable yet.
 */
final class PluginRouteRegistry
{
    use \GDPlayer\Service\Plugin\RouteCompileTrait;
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Flatten the `routes` block plus the legacy `overrides` map into [page, view, match] triples.
     *
     * @param array<string, mixed> $manifest decoded plugin.json
     * @param string $area frontend or backend
     * @return list<array{page: string, view: string, match: string, priority: int, status: int}>
     */
    public static function declaredRoutes(array $manifest, string $area): array
    {
    }
    /**
     * Validate a route triple before it is stored or resolved.
     *
     * @param string $page      URL path relative to BASE_URL
     * @param string $viewPath  manifest-relative view path
     * @param string $matchType exact or prefix
     */
    public static function isValidRoute(string $page, string $viewPath, string $matchType): bool
    {
    }
    public static function normalizePath(string $path): string
    {
    }
    /**
     * Drop the compiled map so a long-running worker sees route changes made by
     * another worker (plugin activate/deactivate rewrites tb_plugin_routes).
     */
    public static function reset(): void
    {
    }
    /**
     * Resolve a request path to the plugin view that owns it.
     *
     * Exact matches win over the longest matching prefix.
     *
     * @param string $area        frontend or backend
     * @param string $requestPath request path relative to BASE_URL, without a .php suffix
     * @return string|null absolute view path, or null when no plugin claims the path
     */
    /**
     * Resolve a request path to the plugin view that owns it.
     *
     * Exact matches win over the longest matching prefix.
     *
     * @param string $area        frontend or backend
     * @param string $requestPath request path relative to BASE_URL, without a .php suffix
     * @return string|null absolute view path, or null when no plugin claims the path
     */
    public static function resolve(string $area, string $requestPath): ?string
    {
    }
}
/**
 * File-lock helpers for the plugin route index rebuild.
 *
 * Split out of `PluginRouteSync` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginRouteSync` through this trait.
 */
trait RouteSyncLockTrait
{
    /**
     * @return resource|null
     */
    private static function acquireLock()
    {
    }
    /**
     * @return mixed
     */
    private static function acquireOrBreakLock(): mixed
    {
    }
    /**
     * Break a lock left behind by a crashed process.
     *
     * @return bool true when the stale lock was removed
     */
    private static function hasBrokenStaleLock(): bool
    {
    }
    /**
     * Baca stamp berkas lock tanpa memunculkan warning saat berkas sedang dipegang proses lain
     * (Windows: read of 8192 bytes failed with errno=13). Gagal baca = tidak ada stamp.
     */
    private static function readLockStamp(string $lockFile): string|false
    {
    }
    /**
     * @param resource|null $lockHandle released by reference so the caller's variable is unset too
     */
    private static function releaseLock(&$lockHandle): void
    {
    }
    /**
     * Sync lock retention, in seconds, before a stale lock is broken.
     *
     * @return int retention in seconds
     */
    protected static function lockTtl(): int
    {
    }
}
/**
 * Transactional writer for the `tb_plugin_routes` index rows.
 *
 * Split out of `PluginRouteSync` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `PluginRouteSync` through this trait.
 */
trait RouteSyncWriteTrait
{
    /**
     * Replace the indexed routes of a plugin inside one transaction.
     *
     * DELETE and INSERT share the transaction, so a failed insert rolls back to the previous route
     * set instead of leaving the plugin unroutable until the next sync.
     *
     * @param \PDO $pdoWrite
     * @param int $pluginId
     * @param array<string, mixed> $manifest
     * @param int $pluginPriority
     * @return int true when the new route set was committed
     */
    private static function applyRouteChanges(\PDO $pdoWrite, int $pluginId, array $manifest, int $pluginPriority): int
    {
    }
    /**
     * Insert the manifest routes of a plugin. Runs inside the caller transaction.
     *
     * An invalid manifest entry is logged and skipped; it must not abort the whole sync.
     *
     * @param \PDO $pdoWrite
     * @param int $pluginId
     * @param array<string, mixed> $manifest decoded plugin.json
     * @param int $pluginPriority manifest priority, kept so resolution needs no disk read
     * @return void
     */
    private static function insertRoutes(\PDO $pdoWrite, int $pluginId, array $manifest, int $pluginPriority): void
    {
    }
}
/**
 * Rebuilds the `tb_plugin_routes` index for one plugin from its `plugin.json` manifest.
 *
 * The manifest is the source of truth; the table is a derived index. Every rebuild
 * replaces the plugin rows in a single transaction so a failed sync can never leave
 * a half-populated route set behind.
 */
final class PluginRouteSync
{
    use \GDPlayer\Service\Plugin\RouteSyncLockTrait;
    use \GDPlayer\Service\Plugin\RouteSyncWriteTrait;
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Remove every indexed route of a plugin. Used on uninstall and when the manifest is gone.
     *
     * @param int $pluginId
     * @return int true when the rows were cleared
     */
    public static function purge(int $pluginId): int
    {
    }
    /**
     * Rebuild the route index of a single plugin from its manifest.
     *
     * @param int $pluginId
     * @return int number of routes written to the index
     */
    public static function sync(int $pluginId): int
    {
    }
}
/**
 * Mapping of plugin-owned paths to view classes (read from `plugin.json`, not from a table/file path).
 *
 * Plugins declare `routes.<area>[].class` + a PSR-4 namespace in the manifest; no view file
 * `include` happens on the request path.
 */
final class PluginViewRegistry
{
    public static function has(string $area, string $requestPath): bool
    {
    }
    /**
     * Buang peta view plugin agar worker panjang melihat plugin yang baru dipasang/dicopot.
     */
    public static function reset(): void
    {
    }
    /**
     * @param string $area frontend or backend
     * @param string $requestPath path relative to BASE_URL (without .php)
     * @return class-string<\GDPlayer\View\ViewInterface>|null
     */
    public static function resolve(string $area, string $requestPath): ?string
    {
    }
}
namespace GDPlayer\Service\ServerConfig;

/**
 * Render template dan penulisan berkas htaccess/nginx.
 *
 * Split out of `ServerConfigManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ServerConfigManager` through this trait.
 */
trait FileTrait
{
    /**
     * @param string $settingKey
     * @param array<string, mixed> $serverConfig
     * @param string $twigFile
     * @return string
     */
    protected function renderTemplate(string $settingKey, array $serverConfig, string $twigFile): string
    {
    }
    /**
     * @param array<string, mixed> $priorities
     */
    public static function updateHtaccessFile(string $key = '', string $value = '', array $priorities = []): int|false
    {
    }
    /**
     * @param array<string, mixed> $priorities
     */
    public static function updateNginxFile(string $key = '', string $value = '', array $priorities = []): int|false
    {
    }
}
/**
 * Lock regenerasi dan penjagaan berkas konfigurasi nginx.
 *
 * Split out of `ServerConfigManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ServerConfigManager` through this trait.
 */
trait LockTrait
{
    /**
     * @param string $configFile
     * @return resource|null
     */
    protected function acquireLock(string $configFile)
    {
    }
    /**
     * @param resource|null $lockHandle released by reference so the caller's variable is unset too
     */
    protected function releaseLock(&$lockHandle): void
    {
    }
    /**
     * @param array<string, mixed> $config
     */
    public static function ensureNginxConfigFile(array $config = []): bool
    {
    }
    /**
     * Ensure the generated config file exists and matches $signatureSource. The in-sync path
     * does no DB read and no file I/O; regeneration runs under the same blocking lock as
     * update(), so a concurrent write can never be clobbered by a stale snapshot.
     *
     * @param string $settingKey
     * @param array<string, mixed> $signatureSource Values that determine the rendered content
     * @param string $twigFile
     * @param string $configFile
     * @param array<string, int>   $priorities
     * @return bool
     */
    public function isConfigEnsured(string $settingKey, array $signatureSource, string $twigFile, string $configFile, array $priorities = []): bool
    {
    }
}
/**
 * Penyusunan dan pembandingan urutan konfigurasi.
 *
 * Split out of `ServerConfigManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ServerConfigManager` through this trait.
 */
trait SortTrait
{
    /**
     * @param string $dottedA
     * @param string $dottedB
     * @param array<string, int> $priorities
     * @param null|string $fallbackA
     * @param null|string $fallbackB
     * @return int
     */
    protected function comparePriority(string $dottedA, string $dottedB, array $priorities, ?string $fallbackA = null, ?string $fallbackB = null): int
    {
    }
    protected function isEmptyValue(mixed $value): bool
    {
    }
    /**
     * @param array<string, mixed> $existing
     * @param array<string, mixed> $incoming
     * @return array<string, mixed>
     */
    protected function mergeSubValues(array $existing, array $incoming): array
    {
    }
    protected function signatureKey(string $settingKey): string
    {
    }
    /**
     * @param array<string, mixed> $config
     * @param array<string, int>   $priorities
     * @return array<string, mixed>
     */
    protected function sortConfig(array $config, array $priorities): array
    {
    }
}
/**
 * Manages the generation of server configuration files (nginx, .htaccess, etc.)
 * from Twig templates based on the settings stored in Config.
 */
final class ServerConfigManager
{
    use \GDPlayer\Service\ServerConfig\FileTrait;
    use \GDPlayer\Service\ServerConfig\LockTrait;
    use \GDPlayer\Service\ServerConfig\SortTrait;
    /**
     * @param null|\GDPlayer\Config\Config $config optional config instance (a new one is created when omitted)
     */
    public function __construct(?\GDPlayer\Config\Config $config = null)
    {
    }
    /**
     * True when the file must be rebuilt from the DB.
     *
     * The comparison is against the last signature stored in cache (shared by all processes), not
     * a per-process memo: on non-persistent SAPIs that memo is always empty, so the server file
     * (nginx.conf) gets re-rendered on EVERY request — wasted disk I/O + Twig rendering.
     *
     * @param string $signature  signature of the value source being rendered
     * @param string $configFile rendered output file
     * @param string $stampValue last recorded signature ('' when none yet)
     * @return bool true when the file must be re-rendered
     */
    public static function isRegenerationNeeded(string $signature, string $configFile, string $stampValue): bool
    {
    }
    /**
     * Re-read the setting fresh from the DB, merge the incoming setting, persist and render.
     * Serialized by a blocking file lock: without it concurrent writers (swoole_config.core,
     * swoole_config.dlhd, the ensure() re-save) each persist a stale whole-group snapshot and
     * silently drop another writer's group.
     *
     * @param string $settingKey
     * @param array<string, mixed> $settingValue
     * @param string $twigFile
     * @param string $configFile
     * @param array<string, int>   $priorities   Optional key priorities (lower number = earlier in config)
     * @return int|false
     */
    public function update(string $settingKey, array $settingValue, string $twigFile, string $configFile, array $priorities = []): int|false
    {
    }
    public static function updateByCacheMode(string $cacheMode): void
    {
    }
}
namespace GDPlayer\Service\System;

/**
 * Cloudflare WARP proxy settings resolver and host eligibility check.
 */
final class CloudflareProxy
{
    /**
     * @param \GDPlayer\Config\Config|array<string, mixed>|null $config
     */
    public function __construct($config = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Apply the WARP proxy to the caller-owned handle (legacy handle path).
     *
     * Only used by `curl_multi_*` callers (`Core\Extractor::getMultiSources()`,
     * `Hosting\Youtube`, `Console\Commands\DownloadCommand`) and the `swoole`/`themes/dlhd` repos;
     * the single-request path uses `proxyFor()` + `Http\Fetcher::withProxy()`.
     *
     * @param string $vHost
     * @param \CurlHandle& $ch
     * @return \CurlHandle
     */
    public function applyProxyIfEligible(\CurlHandle &$ch, string $vHost = ''): \CurlHandle
    {
    }
    /**
     * @param string[] $keys
     * @return array<string, mixed>
     */
    public function getSettings(array $keys): array
    {
    }
    /**
     * Check if a video host is eligible for WARP proxy on current node
     *
     * @param string $vHost
     * @return bool
     */
    public function isEligible(string $vHost = ''): bool
    {
    }
    /**
     * @param string $vHost
     * @param mixed $targetHosts
     * @return bool
     */
    public function isHostEligible(string $vHost, mixed $targetHosts): bool
    {
    }
    /**
     * @param mixed $targetLBs
     * @return bool
     */
    public function isNodeEligible(mixed $targetLBs): bool
    {
    }
    /**
     * WARP proxy for this host, or null when it does not apply.
     *
     * Used by paths that no longer hold their own cURL handle (e.g. `Http\Fetcher`):
     * the value is the same one `applyProxyIfEligible()` used to apply to the handle.
     *
     * @return array{proxy: string, type: int, usrpwd: string}|null
     */
    public function proxyFor(string $vHost = ''): ?array
    {
    }
}
/**
 * Detects whether the process is running inside a container.
 */
trait ContainerChecker
{
    private function hasContainerCgroup(): bool
    {
    }
    private function hasContainerSched(): bool
    {
    }
    private function isDarwinContainer(): bool
    {
    }
    private function isLinuxContainer(): bool
    {
    }
    private function isWindowsContainer(): bool
    {
    }
    /**
     * Determine whether the current process runs inside a container.
     *
     * @return bool true when a container environment is detected for this OS
     */
    public function isRunningInContainer(): bool
    {
    }
}
/**
 * Pembacaan CPU, RAM, dan OS lintas Linux/Windows.
 *
 * Split out of `SystemInfo` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `SystemInfo` through this trait.
 */
trait CpuTrait
{
    protected function calculateProcStatCpu(string $stats1, string $stats2): float
    {
    }
    protected function getCpuCores(): int
    {
    }
    protected function getCpuUsage(): float
    {
    }
    /**
     * @return array{total: int, available: int}
     */
    protected function getLinuxRam(): array
    {
    }
    protected function getOperatingSystem(): string
    {
    }
    protected function getProcStatUsage(): float
    {
    }
    protected function getWindowsCpuCores(): int
    {
    }
    protected function getWindowsCpuUsage(): float
    {
    }
    /**
     * @return array{total: int, available: int}
     */
    protected function getWindowsRam(): array
    {
    }
}
/**
 * Host system information provider (OS, RAM, disk, services, containers).
 */
final class SystemInfo
{
    use \GDPlayer\Service\System\ContainerChecker;
    use \GDPlayer\Service\System\CpuTrait;
    use \GDPlayer\Service\System\PortChecker;
    /**
     * Detect the platform and prepare the PowerShell bridge on Windows.
     */
    public function __construct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * @return array{total: float|int, used: float|int, free: float|int, percent: float|int}
     */
    public function getDiskUsage(): array
    {
    }
    /**
     * @return array{cpu: float, cpu_cores: int, os: string, uptime: float}
     */
    public function getOSInfo(): array
    {
    }
    /**
     * @return array{total: int, used: int, free: int, percent: float|int}
     */
    public function getRamUsage(): array
    {
    }
    /**
     * @return array{
     * nginx: array{status: bool, name: string},
     * apache: array{status: bool, name: string},
     * litespeed: array{status: bool, name: string},
     * redis: array{status: bool, name: string},
     * php: array{status: bool, name: string, version: string, sapi: string, limit: string|false}
     * }
     */
    public function getServices(): array
    {
    }
}
namespace GDPlayer\Service\Theme;

/**
 * Utilitas arsip tema: entry zip, nama tema, dan symlink publik.
 *
 * Split out of `ThemeManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ThemeManager` through this trait.
 */
trait ArchiveTrait
{
    /**
     * Ekstrak satu entri arsip bila lolos validasi nama (anti zip-slip).
     */
    protected static function extractEntry(\ZipArchive $zip, int $index, string $destinationPath): void
    {
    }
    /**
     * Prevent zip-slip: entries with `..` traversal, absolute paths, or a drive letter are rejected.
     *
     * @param string $fileName entry name inside the archive
     * @return bool true when the entry is safe to extract into destinationPath
     */
    protected static function isSafeArchiveEntry(string $fileName): bool
    {
    }
    /**
     * Read the first non-empty line of a file (clean markdown headers).
     *
     * @param string $filePath
     * @return string
     */
    protected static function readFirstLine(string $filePath): string
    {
    }
    /**
     * Resolve theme title/description from composer.json, README.md, or folder name.
     *
     * @param string $themePath
     * @param string $folderName
     * @return string
     */
    protected static function resolveThemeName(string $themePath, string $folderName): string
    {
    }
    public static function createPublicSymlinks(): void
    {
    }
}
/**
 * Unduh dan ekstrak berkas tema dari server sinkronisasi.
 *
 * Split out of `ThemeManager` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `ThemeManager` through this trait.
 *
 * Protokol sinkronisasi: `ping` membalas stamp isi folder (sha1), bukan 'ok'.
 * Node membandingkannya dengan stamp terakhir yang sukses diekstrak; stamp sama =
 * tidak ada unduhan sama sekali. Bagian yang sama dengan plugin ada di `DownloadSyncTrait`.
 */
trait DownloadTrait
{
    use \GDPlayer\Service\Sync\DownloadSyncTrait;
    /**
     * @param string $themeFolder folder tema
     * @param string $action      ping|download
     * @return string URL, atau '' bila server ini adalah sumbernya sendiri
     */
    protected static function getSyncDownloadUrl(string $themeFolder, string $action = 'ping'): string
    {
    }
    protected static function shouldUpgradeTheme(\ZipArchive $zip, string $destinationPath): bool
    {
    }
    /**
     * Unduh arsip tema bila stamp berbeda dari yang terakhir dipasang.
     *
     * @param string $themeFolder folder tema
     * @param string $stamp       stamp isi folder di server sumber
     * @return string|false path arsip, false bila sudah mutakhir atau gagal
     */
    public static function downloadThemeFile(string $themeFolder, string $stamp = ''): string|false
    {
    }
    /**
     * Extract a theme archive into the themes directory.
     *
     * @param string $zipPath         path to the archive
     * @param string $destinationPath destination directory
     * @param bool   $isUpgrade       whether this is an upgrade (version-guarded)
     * @return int true when extraction succeeded
     */
    public static function extractThemeZip(string $zipPath, string $destinationPath, bool $isUpgrade = false): int
    {
    }
    /**
     * Catat stamp yang sudah berhasil dipasang (dipakai untuk melewati siklus berikutnya).
     *
     * @param string $themeFolder folder tema
     * @param string $stamp       stamp isi folder di server sumber
     */
    public static function markSynced(string $themeFolder, string $stamp): void
    {
    }
    /**
     * Minta stamp isi folder tema di server sumber.
     *
     * @param string $themeFolder folder tema
     * @return string|false stamp, '' bila tidak ada yang perlu disinkronkan, false saat gagal
     */
    public static function syncThemeFile(string $themeFolder): string|false
    {
    }
}
/**
 * Theme discovery, activation and synchronization service.
 *
 * Resolves the active theme, lists installed themes and syncs theme
 * archives from the remote repository.
 */
final class ThemeManager
{
    use \GDPlayer\Service\Theme\ArchiveTrait;
    use \GDPlayer\Service\Theme\DownloadTrait;
    use \GDPlayer\Service\Plugin\ThemeManagerTrait;
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Get active theme name from database config, fallback to constant or 'default'.
     *
     * @return string
     */
    public static function getActiveTheme(): string
    {
    }
    /**
     * Get the absolute path to the active theme directory.
     *
     * @return string
     */
    public static function getActiveThemePath(): string
    {
    }
    /**
     * Scan themes directory and get available themes with description/name.
     *
     * @return array<string, array{folder: string, name: string}>
     */
    public static function getAvailableThemes(): array
    {
    }
    /**
     * Forget the resolved active theme so the next request re-reads it.
     *
     * Di FPM tidak berdampak (proses mati tiap request); di worker, tanpa ini pergantian tema
     * di admin baru terlihat setelah worker di-restart.
     */
    public static function reset(): void
    {
    }
}
namespace GDPlayer\Service;

/**
 * Upload handler for posters and subtitle files (PSR-7 aware).
 */
final class Upload
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Determine whether an uploaded file is an accepted subtitle file.
     *
     * @param string $file temporary file path
     * @param string $ext  file extension
     * @param int    $size file size in bytes
     * @return bool true when the file is a readable, non-PHP subtitle within the size limit
     */
    public static function isSubtitleFile(string $file = '', string $ext = '', int $size = 0): bool
    {
    }
    /**
     * Normalize PSR-7 UploadedFileInterface input into standard file meta array.
     *
     * @param mixed $file
     * @param string|null $error receives a human-readable reason when the upload is rejected
     * @return array{
     * name:string,
     * type:string,
     * tmp_name:string,
     * error:int,
     * size:int,
     * psr7:\Psr\Http\Message\UploadedFileInterface
     * }|null
     */
    public static function normalizeFile(mixed $file, ?string &$error = null): ?array
    {
    }
    /**
     * Explain why a PHP upload failed, quoting the effective server limits.
     *
     * @param int $code one of the UPLOAD_ERR_* constants
     * @return string human-readable reason, safe to show to the user
     */
    public static function uploadErrorMessage(int $code): string
    {
    }
    /**
     * @param mixed $file
     * @return string|false
     */
    public static function uploadPoster(mixed $file = null): string|false
    {
    }
    /**
     * @param mixed $file
     * @return string|false
     */
    public static function uploadSubtitleFile(mixed $file = null): string|false
    {
    }
}
namespace GDPlayer\Stream;

/**
 * Immutable-style fluent setter base shared by all stream handlers.
 *
 * Holds the request/response headers and playback flags configured by Master.
 */
abstract class Setter
{
    protected string $cacheFile = '';
    protected bool $isDownload = false;
    protected bool $isMP4 = false;
    protected bool $isMPD = false;
    protected bool $isMaster = false;
    protected string $rangeBytes = '';
    /** @var string[] $requestHeaders */
    protected array $requestHeaders = [];
    /** @var string[] $responseHeaders */
    protected array $responseHeaders = [];
    protected string $title = '';
    /**
     * Set the download flag for the stream.
     *
     * @param bool $isDownload whether the request is a download
     * @return self fluent instance
     */
    public function isDownload(bool $isDownload = false): self
    {
    }
    /**
     * @param string[] $headers
     * @return self
     */
    public function setHeaders(array $headers = []): self
    {
    }
    /**
     * Set the last-modified timestamp and queue its response header.
     *
     * @param int $lastModified unix timestamp (0 disables the header)
     * @return self fluent instance
     */
    public function setLastModified(int $lastModified = 0): self
    {
    }
    /**
     * Set the master-playlist flag for the stream.
     *
     * @param bool $isMaster whether the stream is a master playlist
     * @return self fluent instance
     */
    public function setMaster(bool $isMaster = false): self
    {
    }
    /**
     * Set the sanitized download filename.
     *
     * @param string $title file name to expose
     * @return self fluent instance
     */
    public function setTitle(string $title = 'video.mp4'): self
    {
    }
}
/**
 * Cache-file plumbing for {@see Stream}: tmp file creation, promotion policy, cache key.
 *
 * Split out of Stream so the class stays within the 20-method rule (php:S1448); state
 * stays on Stream (cacheFile, tmpCacheFile, fpChunk).
 */
trait StreamCache
{
    private function createTmpFile(): void
    {
    }
    /**
     * Ruang disk bebas untuk direktori cache (di-cache 60 detik di InstanceCache).
     */
    private function resolveDiskFreeSpace(): float
    {
    }
    /**
     * Whether the tmp cache may be promoted to the final cache file.
     *
     * Strict policy: a request carrying a Range header is never cached, and the body must have
     * been written completely (`written === contentLength`) with a consistent total length.
     *
     * @param string $rangeBytes    raw range bytes ('' when the request has no Range header)
     * @param int    $written       bytes actually written to the tmp cache
     * @param int    $contentLength Content-Length of the upstream response (0 = unknown)
     * @param int    $totalLength   total entity size from Content-Range (0 = unknown)
     * @return bool
     */
    public static function isCachePromotable(string $rangeBytes, int $written, int $contentLength, int $totalLength): bool
    {
    }
    /**
     * Resolve and store the cache file path for the requested label.
     *
     * @param string $label Stream label (e.g. 'Original') used in the file name.
     * @return self fluent instance
     */
    public function setCacheFile(string $label = 'Original'): self
    {
    }
}
/**
 * Muat dan simpan cache konten stream.
 *
 * Split out of `Stream` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Stream` through this trait.
 */
trait StreamCacheTrait
{
    /**
     * Cache file sah hanya bila benar-benar berisi byte: sisa 0-byte dari upstream yang
     * gagal/abort tidak boleh disajikan sebagai `X-Cache: HIT` dengan body kosong.
     */
    private function isUsableCacheFile(): bool
    {
    }
    /**
     * @return array{cache:bool,content:string}
     */
    protected function getCacheOrOriginalContent(): array
    {
    }
    protected function getMasterContent(): ?string
    {
    }
    /**
     * Serve from the local cache when present.
     *
     * @return bool true when the request was already served from cache (caller must stop)
     */
    protected function hasLocalCacheLoaded(): bool
    {
    }
    protected function loadPhpCache(): void
    {
    }
}
/**
 * Header respons stream (entity, content type, upstream).
 *
 * Split out of `Stream` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Stream` through this trait.
 */
trait StreamHeaderTrait
{
    /**
     * Terapkan header entitas (Content-Length / Content-Range / Last-Modified) ke state stream.
     *
     * @param string $header satu baris header respons upstream
     */
    protected function applyEntityHeader(string $header): void
    {
    }
    protected function createContentType(): string
    {
    }
    protected function curlHeaderCallback(string $header): int
    {
    }
    protected function defaultResponseHeaders(): void
    {
    }
    protected function ensureHeadersSent(): void
    {
    }
    protected function handleUpstreamHeader(string $header): int
    {
    }
}
/**
 * Shared stream state and playlist-parsing helpers.
 */
trait StreamParser
{
    /** @var resource|null $fpChunk */
    private $fpChunk;
    /** @var resource|null $fpVerbose */
    private $fpVerbose;
    private ?\Psr\Http\Message\ServerRequestInterface $request = null;
    protected string $ampQry = '&';
    protected string $copyrightText = 'GDPlayer (c) 2020~ | gdplayer.to | @gdplayerto';
    protected bool $enableCacheFile = false;
    protected string $endChars = " &?#\n\r\t\v\x00\v";
    protected bool $isLive = false;
    /** @var array<string,mixed> $parsedUrls */
    protected array $parsedUrls = [];
    protected string $token = '';
    protected string $vHost;
    protected string $vID;
    protected string $vURL;
    protected string $vUrlOrigin = '';
    private function closeFopen(): void
    {
    }
    private function getHeaderLine(string $name): string
    {
    }
    private function getMethod(): string
    {
    }
    private function getRequestTarget(): string
    {
    }
    /**
     * @param array<string|int, mixed> $qry
     * @param \GDPlayer\Core\Security\Security $security
     * @return array<string, mixed>
     */
    private function repairUrlQuery(array $qry, \GDPlayer\Core\Security\Security $security): array
    {
    }
    protected function addTokenToUrl(string $url = ''): string
    {
    }
    protected function bypassURL(string $val, string $separator): string
    {
    }
    /**
     * @return array<string, mixed>
     */
    protected static function getCustomExtensions(): array
    {
    }
    /**
     * @param string $url
     * @return array<string,mixed>
     */
    protected function getParsedUrl(string $url): array
    {
    }
    protected static function getSecurity(): \GDPlayer\Core\Security\Security
    {
    }
    /**
     * @param string[] $pathParts
     * @return string[]
     */
    protected function normalizedPathParts(array $pathParts = []): array
    {
    }
    protected function parseBaseUrl(string $val): string
    {
    }
    /**
     * Set the live flag (live streams disable the cache file).
     *
     * @param bool $isLive whether the stream is live
     * @return self fluent instance
     */
    public function setIsLive(bool $isLive): self
    {
    }
    /**
     * Set the stream token.
     *
     * @param string $token stream token
     * @return self fluent instance
     */
    public function setToken(string $token = ''): self
    {
    }
}
/**
 * Range request dan pembuatan fetcher upstream.
 *
 * Split out of `Stream` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Stream` through this trait.
 */
trait StreamRequestTrait
{
    /**
     * Prepare the tmp/progress files, request metadata, then build the Fetcher for one upstream.
     *
     * @param bool $withResponse true = body held in memory (playlist), false = streamed to the client
     */
    protected function createFetcher(bool $withResponse = true): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
    protected function getRangeRequest(): void
    {
    }
}
/**
 * Retry dan parsing playlist upstream.
 *
 * Split out of `Stream` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Stream` through this trait.
 */
trait StreamRetryTrait
{
    protected function playlistParser(string $content): void
    {
    }
    protected function retryStream(): never
    {
    }
}
/**
 * Base stream handler that proxies and caches media/playlist responses.
 *
 * Implements local-cache lookup, chunked temporary caching, upstream cURL
 * streaming and circuit-breaker protection shared by HLS, MPD and MP4.
 */
abstract class Stream extends \GDPlayer\Stream\Setter
{
    use \GDPlayer\Stream\StreamCache;
    use \GDPlayer\Stream\StreamCacheTrait;
    use \GDPlayer\Stream\StreamHeaderTrait;
    use \GDPlayer\Stream\StreamParser;
    use \GDPlayer\Stream\StreamRequestTrait;
    use \GDPlayer\Stream\StreamRetryTrait;
    /** Batas byte per request MP4 (plugin roadrunner memakai 5 MB; seek jadi lebih responsif). */
    protected const MP4_RANGE_CHUNK = 6291456;
    protected int $end = 0;
    protected bool $headersSent = false;
    /** Suffix range (`bytes=-N`): potongan ekor, bukan entitas penuh -> jangan ditulis ke cache. */
    protected bool $isSuffixRange = false;
    protected int $responseCode = 0;
    /** @var int[] $responseCodeWithRetry */
    protected array $responseCodeWithRetry = [-1, 0, 408, 429, 500, 501, 502, 503, 504];
    protected bool $sendContentRange = false;
    protected int $start = 0;
    /**
     * @param string                     $vHost        video host identifier
     * @param string                     $vID          host-specific media identifier
     * @param string                     $url          upstream media URL
     * @param string                     $cacheMode    cache driver mode
     * @param int                        $cacheTimeout cache lifetime in seconds
     * @param \Psr\Http\Message\ServerRequestInterface|null $request      PSR-7 request
     */
    public function __construct(string $vHost = '', string $vID = '', string $url = '', private string $cacheMode = 'php', private int $cacheTimeout = 3600, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * Promote the temporary chunk cache to the final cache file when complete.
     */
    public function __destruct()
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Promosikan atau buang file `.tmp` selagi lock masih dipegang.
     *
     * Dulu rename() baru dijalankan di __destruct(), yaitu SETELAH lock dilepas: penulis baru
     * bisa memotong `.tmp` yang sama di sela unlock -> rename. Kini seluruh transisi selesai
     * sebelum LOCK_UN sehingga file yang di-rename selalu utuh.
     */
    protected function commitCacheFile(): void
    {
    }
    protected function init(): void
    {
    }
    /**
     * Stream the media to the client, serving from cache when available.
     *
     * @return void
     */
    public function stream(): void
    {
    }
}
/**
 * HLS playlist parsing and rewriting helpers.
 */
trait HLSParser
{
    use \GDPlayer\Stream\StreamParser;
    protected string $extInf = '#EXT-X-STREAM-INF';
    protected string $hlsSeparator = '/hls/';
    protected function modifyMasterContent(string $content = ''): string
    {
    }
    protected function parsePlaylist(string $m3u8Content = '', string $separator = '/hls/'): string
    {
    }
    /**
     * Separator segmen HLS, mengikuti engine stream yang siap dipakai.
     *
     * Playlist ditulis langsung dengan slug engine pada satu lintasan, jadi tidak perlu
     * `str_replace` susulan atas output buffer: RoadRunner → `/stream-ts3/`,
     * Swoole → `/stream-ts2/`, jalur PHP → `/stream-ts/`.
     *
     * @return string
     */
    protected function tsSeparator(): string
    {
    }
}
/**
 * Playlist serving skeleton shared by the HLS and MPD handlers.
 *
 * The live marker MUST be declared by each handler through the abstract hook below:
 * HLS uses the presence of EXTINF segments without EXT-X-ENDLIST, while MPD uses the
 * type="dynamic" attribute on the MPD element. Live is never written to the cache
 * file; VOD is.
 */
trait PlaylistServer
{
    /**
     * Cached content is used as-is; original content is parsed through the handler hook.
     *
     * @return string
     */
    private function resolvePlaylistContent(): string
    {
    }
    /**
     * Query separator in rewritten URLs. MPD uses the XML entity (&amp;).
     *
     * @return string
     */
    protected function ampQuerySeparator(): string
    {
    }
    /**
     * Handler live marker: HLS (EXTINF without EXT-X-ENDLIST) / MPD (type="dynamic").
     *
     * @param string $content manifest contents
     * @return bool
     */
    abstract protected function isPlaylistLive(string $content): bool;
    /**
     * Parse a manifest that is not cached yet. Must be implemented by every handler.
     *
     * @param string $content original manifest
     * @return string
     */
    abstract protected function parseOriginalContent(string $content): string;
    /**
     * Last transformation before playlistParser(). Default: as-is.
     *
     * @param string $content manifest contents
     * @return string
     */
    protected function preparePlaylistContent(string $content): string
    {
    }
    /**
     * Hook for live manifests, run before output. Default: as-is.
     *
     * @param string $content manifest contents
     * @return string
     */
    protected function repairLivePlaylist(string $content): string
    {
    }
    /**
     * Serve the playlist (cached result or parsed result) to the client.
     *
     * @return void
     */
    protected function servePlaylist(): void
    {
    }
}
/**
 * HLS (m3u8) playlist stream handler.
 */
final class HLS extends \GDPlayer\Stream\Stream
{
    use \GDPlayer\Stream\HLSParser;
    use \GDPlayer\Stream\PlaylistServer;
    /**
     * Serve the (cached or freshly parsed) HLS playlist to the client.
     *
     * @return void
     */
    public function playlistStream(): void
    {
    }
}
/**
 * Stream handler for serving local files with Range support.
 */
final class LocalFile
{
    /**
     * @param string $file absolute path of the local file to serve
     * @param \Psr\Http\Message\ServerRequestInterface|null $request PSR-7 request
     */
    public function __construct(string $file, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Parse a single-range `Range` header against a file size.
     *
     * Supports `bytes=a-b`, `bytes=a-`, `bytes=-N` (last N bytes) and takes the first range of a
     * multi-range request (multi-part bodies are not supported).
     *
     * @param string $rangeHeader raw Range header ('' = whole file)
     * @param int    $filesize    file size in bytes
     * @return array{0: int, 1: int} [start, end] inclusive
     */
    public static function resolveRange(string $rangeHeader, int $filesize): array
    {
    }
    /**
     * Set the download filename.
     *
     * @param string $title file name to expose
     * @return self fluent instance
     */
    public function setTitle(string $title): self
    {
    }
    /**
     * Stream the local file to the client, honoring the Range header.
     *
     * @return void
     */
    public function stream(): void
    {
    }
}
/**
 * Pemuatan sumber stream (HLS/MP4/MPD).
 *
 * Split out of `Master` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Master` through this trait.
 */
trait MasterLoadTrait
{
    protected function load(): void
    {
    }
    protected function loadRequest(): void
    {
    }
    /**
     * Handle an HLS request by dispatching to the HLS stream handler.
     *
     * @return void
     */
    public function loadHLS(): void
    {
    }
    /**
     * Handle an MP4 request, adding Google Drive authorization when needed.
     *
     * @return void
     */
    public function loadMP4(): void
    {
    }
    /**
     * Handle an MPD (DASH) request by dispatching to the MPD stream handler.
     *
     * @return void
     */
    public function loadMPD(): void
    {
    }
}
/**
 * Parsing URI, data source, dan URL terenkripsi.
 *
 * Split out of `Master` (rule php:S2042: at most 150 lines per class).
 * Behaviour is unchanged; the API stays on `Master` through this trait.
 */
trait MasterParseTrait
{
    protected function changeUrlExtension(): void
    {
    }
    /**
     * @param array<string,mixed> $data
     * @return void
     */
    protected function parseDataSources(array $data = []): void
    {
    }
    protected function parseUri(): void
    {
    }
    protected function processEncryptedUrl(string $encryptedUrl): void
    {
    }
    protected function redirectToOriginalUrl(): void
    {
    }
}
/**
 * Front controller for playback, download and master-playlist requests.
 *
 * Resolves the request URI into a host/id, loads the resolved sources and
 * dispatches to the HLS, MPD or MP4 stream handler.
 */
final class Master
{
    use \GDPlayer\Stream\MasterLoadTrait;
    use \GDPlayer\Stream\MasterParseTrait;
    /**
     * @param bool                        $isMP4    whether this is an MP4 request
     * @param bool                        $isMaster whether this is a master-playlist request
     * @param \Psr\Http\Message\ServerRequestInterface|null $request  PSR-7 request
     */
    public function __construct(bool $isMP4 = false, bool $isMaster = false, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
}
/**
 * MP4 stream handler with Range support.
 */
final class MP4 extends \GDPlayer\Stream\Stream
{
    /**
     * @param string                     $vHost        video host identifier
     * @param string                     $vID          host-specific media identifier
     * @param string                     $url          upstream media URL
     * @param string                     $cacheMode    cache driver mode
     * @param int                        $cacheTimeout cache lifetime in seconds
     * @param \Psr\Http\Message\ServerRequestInterface|null $request      PSR-7 request
     */
    public function __construct(string $vHost = '', string $vID = '', string $url = '', string $cacheMode = 'php', int $cacheTimeout = 3600, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
}
/**
 * MPD (DASH) manifest parsing and rewriting helpers.
 */
trait MPDParser
{
    use \GDPlayer\Stream\StreamParser;
    /** @var array<string,mixed> $regexCache */
    protected array $regexCache = [];
    /**
     * returns the modified $mpdContent
     *
     * @param string $mpdContent
     * @return string
     */
    protected function parseMPD(string $mpdContent = ''): string
    {
    }
    /**
     * returns the modified $mpdContent
     *
     * @param string $mpdContent
     * @return string
     */
    protected function repairMPD(string $mpdContent): string
    {
    }
    /**
     * returns the modified $mpdContent
     *
     * @param string $mpdContent
     * @return string
     */
    protected function replaceBaseURLs(string $mpdContent): string
    {
    }
    /**
     * returns the modified $mpdContent
     *
     * @param string $regex
     * @param string $mpdContent
     * @return string
     */
    protected function replaceBasename(string $regex, string $mpdContent): string
    {
    }
    /**
     * returns the modified $mpdContent
     *
     * @param string $regex
     * @param string $mpdContent
     * @return string
     */
    protected function replaceUTCTimingUrls(string $regex, string $mpdContent): string
    {
    }
    /**
     * returns the modified $mpdContent
     *
     * @param string $regex
     * @param string $mpdContent
     * @param string $separator
     * @return string
     */
    protected function replaceUrls(string $regex, string $mpdContent, string $separator = ''): string
    {
    }
    /**
     * Separator segmen DASH, mengikuti engine stream yang siap dipakai.
     *
     * Sama seperti HLS: manifest ditulis langsung dengan slug engine, tanpa
     * `str_replace` susulan atas output buffer.
     *
     * @return string
     */
    protected function segSeparator(): string
    {
    }
}
/**
 * MPD (DASH) manifest stream handler.
 */
final class MPD extends \GDPlayer\Stream\Stream
{
    use \GDPlayer\Stream\MPDParser;
    use \GDPlayer\Stream\PlaylistServer;
    /**
     * Serve the (cached or freshly parsed) MPD manifest to the client.
     *
     * @return void
     */
    public function playlistStream(): void
    {
    }
}
/**
 * Request mode flags of a stream request (Sonar php:S1820 for {@see Master}).
 *
 * Kept as a mutable value object because the flags are resolved while the request is parsed
 * (constructor defaults, then `parseDataSources()`); semantics are unchanged from the
 * individual boolean properties it replaces.
 */
final class StreamFlags
{
    /** Download page allowed by the settings (dl=1 + enable_download_page). */
    public bool $isAllowDownload = false;
    /** `dl=1` in the query string. */
    public bool $isDownload = false;
    /** Google Drive HLS source (host-based rule from StreamConfig). */
    public bool $isGoogleHls = false;
    /** `gl=1` in the query string (live stream). */
    public bool $isLive = false;
    /** Request targets an MP4 label. */
    public bool $isMP4 = false;
    /** Request targets the master playlist. */
    public bool $isMaster = false;
}
namespace GDPlayer\Support;

/**
 * Satu-satunya pintu pemanggilan proses eksternal.
 *
 * Menyalurkan shell_exec(), exec(), popen() dan proc_open() ke satu kelas supaya
 * pemakaian proses sistem mudah diaudit dan diganti di masa depan. Kelas ini tidak
 * menambah logika apa pun: penyusunan command, escaping, dan parsing output tetap
 * tanggung jawab pemanggil, jadi perilaku pemanggil lama tidak berubah.
 *
 * Pemanggilan keempat fungsi itu langsung dari luar kelas ini dilarang oleh
 * `disallowed-calls.neon` (PHPStan).
 */
final class ProcessRunner
{
    /**
     * Jalankan command dan kembalikan stdout sebagai baris.
     *
     * @param string $command command shell yang sudah di-escape pemanggil
     * @return list<string>
     */
    public static function lines(string $command): array
    {
    }
    /**
     * Buka proses dengan descriptor custom (proc_open).
     *
     * @param string $command command shell yang sudah di-escape pemanggil
     * @param array<int, array{0: string, 1?: string}> $descriptors descriptor proc_open
     * @param array<int, resource> $pipes pipe hasil proc_open, diisi by reference
     * @return resource|false
     */
    public static function open(string $command, array $descriptors, array &$pipes)
    {
    }
    /**
     * Jalankan command dan kembalikan seluruh stdout.
     *
     * @param string $command command shell yang sudah di-escape pemanggil
     * @return string|null null bila shell tidak tersedia atau eksekusi gagal
     */
    public static function output(string $command): ?string
    {
    }
    /**
     * Buka pipe ke command lalu tutup lagi (cukup untuk melepas proses latar).
     *
     * @param string $command command shell yang sudah di-escape pemanggil
     * @param string $mode mode pipe, default 'r'
     */
    public static function pipe(string $command, string $mode = 'r'): void
    {
    }
    /**
     * Jalankan command tanpa memakai output-nya (fire and forget).
     *
     * @param string $command command shell yang sudah di-escape pemanggil
     */
    public static function run(string $command): void
    {
    }
}
/**
 * Probe port TCP tanpa memicu warning PHP.
 *
 * `socket_connect()` blocking mencetak E_WARNING saat port tertutup, sedangkan connect
 * non-blocking gagal dengan false + EINPROGRESS. Pola di sini: connect non-blocking,
 * tunggu dengan `socket_select()`, lalu periksa SO_ERROR.
 */
final class TcpProbe
{
    public static function isOpen(string $host, int $port, int $timeout = 1): bool
    {
    }
}
/**
 * Pembuat arsip ZIP dari sebuah direktori (dipakai sinkronisasi plugin & tema).
 *
 * Berkas dibaca lebih awal lalu ditulis via addFromString(): addFile() baru membaca
 * saat close(), sehingga berkas yang hilang/berubah di tengah jalan memunculkan
 * warning "Read error" alih-alih nilai balik yang bisa diperiksa.
 *
 * Arsip ditulis ke `<zip>.part` lalu dipindahkan dengan rename(), jadi berkas yang
 * disajikan ke server lain tidak pernah setengah jadi. Nama arsip memuat stamp isi
 * direktori (lihat stamp()), sehingga isi yang tidak berubah tidak dibangun ulang.
 */
final class ZipBuilder
{
    /**
     * Bangun $zipPath dari isi $sourceDir (tanpa .git/, logs/, dan *.lock).
     *
     * @param string                $sourceDir  direktori sumber
     * @param string                $zipPath    berkas ZIP tujuan
     * @param array<string, string> $logContext konteks tambahan untuk log
     */
    public static function build(string $sourceDir, string $zipPath, array $logContext = []): bool
    {
    }
    /**
     * Hapus arsip sementara (zip/part) yang lebih tua dari MAX_AGE di $tmpDir.
     *
     * @param string $tmpDir direktori tmp plugin/tema
     * @return int jumlah berkas yang dihapus
     */
    public static function prune(string $tmpDir): int
    {
    }
    /**
     * Sidik isi direktori: sha1 dari path|size|mtime setiap berkas, tanpa membaca isi.
     *
     * @param string $sourceDir direktori sumber
     * @return string 40 karakter hex, atau '' bila direktori tidak ada
     */
    public static function stamp(string $sourceDir): string
    {
    }
}
namespace GDPlayer\View;

/**
 * Static error page (400/401/403/404/500/503).
 *
 * Replaces the 6 legacy `includes/views/frontend/{status}.php` files: one class with a status map
 * instead of 6 twin classes. There is no file include and no path-based theme override anymore;
 * themes render their own error page through `theme.json` (`frontend:error`).
 */
final class ErrorPageView
{
    /**
     * Send the error page through ResponseEmitter.
     *
     * @param int $status HTTP status
     * @return void
     */
    public static function emit(int $status): void
    {
    }
    /**
     * Build the error page response.
     *
     * @param int $status HTTP status (400/401/403/404/500/503)
     * @return \Psr\Http\Message\ResponseInterface error page response; status stays $status even when the body comes from the theme
     */
    public static function forStatus(int $status): \Psr\Http\Message\ResponseInterface
    {
    }
}
/**
 * Contract for a single theme view.
 *
 * A view is a class autoloaded through the theme namespace (not an included file).
 * Markup may come from a Twig template; what matters is that there is no PHP `include`/`require`
 * in the request path.
 */
interface ViewInterface
{
    /**
     * Render the view for one request.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request active request
     * @return \Psr\Http\Message\ResponseInterface|string response ready to send, or the HTML body
     */
    public function render(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface|string;
}
/**
 * Mapping of `area:page` to the active theme's view class.
 *
 * The source is `theme.json` (JSON, not include). This resolver replaces the file lookup
 * `views/<page>.php` + `include_once`; there is no fallback to legacy view files.
 */
final class ViewResolver
{
    /**
     * @param string $themePath active theme directory
     * @param string $area 'frontend' or 'backend'
     * @param string $page view name without extension
     * @return ViewInterface|null view instance; null when the theme does not provide it
     */
    public static function forTheme(string $themePath, string $area, string $page): ?\GDPlayer\View\ViewInterface
    {
    }
    /**
     * @param string $themePath active theme directory (with trailing slash)
     * @param string $area 'frontend' or 'backend'
     * @param string $page view name without extension
     * @return bool true when the theme provides this view
     */
    public static function hasView(string $themePath, string $area, string $page): bool
    {
    }
    /**
     * Buang peta view tema agar berkas view yang berubah di path yang sama ikut terbaca ulang.
     */
    public static function reset(): void
    {
    }
}