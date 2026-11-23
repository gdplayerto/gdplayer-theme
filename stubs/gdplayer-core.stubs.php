<?php
/**
 * Stub signature kelas monolit GDPlayer.
 *
 * Dibuat otomatis dengan `scripts/generate_core_stubs.php` dari `src/` repo monolit;
 * jangan diedit tangan. Tujuan: PHPStan subrepo bisa berdiri sendiri tanpa
 * checkout monolit (pola yang sama dengan php-stubs/wordpress-stubs).
 */
namespace GDPlayer\Ajax;

/**
 * Dashboard widgets and statistics endpoint.
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class DashboardAjax extends \GDPlayer\Helper\AjaxHelper
{
    private \GDPlayer\Model\LoadBalancer $balancer;
    private string $baseUrl = '';
    /** @var array<string,string> $createdSql */
    private array $createdSql = [];
    private string $filter = 'today';
    private \GDPlayer\Model\GDriveAuth $gdriveAuth;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private string $slugDownload = '';
    private string $slugEmbed = '';
    private \GDPlayer\Model\Stat $stat;
    private string $userTimezone = 'UTC';
    private \GDPlayer\Model\VideoSource $vSources;
    private \GDPlayer\Model\Video $videos;
    /**
     * Bind the request, load the dashboard config and build the date filter SQL.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Return the ASN groups ranked by view count.
     *
     * @return string DataTables JSON response
     */
    protected function popularASN(): string
    {
    }
    /**
     * Return the browser user agents ranked by view count, parsed into name, device and OS.
     *
     * @return string DataTables JSON response
     */
    protected function popularBrowsers(): string
    {
    }
    /**
     * Return the countries ranked by view count.
     *
     * @return string DataTables JSON response
     */
    protected function popularCountries(): string
    {
    }
    /**
     * Return the ten most viewed videos for the active date filter.
     *
     * @return string DataTables JSON response
     */
    protected function popularVideos(): string
    {
    }
    /**
     * Return the ten most recently added videos, scoped by the viewer's role.
     *
     * @return string DataTables JSON response
     */
    protected function recentVideos(): string
    {
    }
    /**
     * Count the video sources hosted on the main server and on every active balancer.
     *
     * @return string JSON response mapping server name to source count
     */
    protected function serversStatus(): string
    {
    }
    /**
     * Return the good, broken, warning and total video counters plus server totals.
     *
     * @return string JSON response with the counters
     */
    protected function videosStatus(): string
    {
    }
    /**
     * Return a per-day view time series in the user's timezone.
     *
     * @return string JSON response with `[timestamp, views]` pairs
     */
    protected function views(): string
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
    private const MESSAGE_DELETE_FAIL = 'The account failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The account has been deleted successfully';
    private const MESSAGE_STATUS_UPDATE_FAIL = 'The account status failed to update';
    private const MESSAGE_STATUS_UPDATE_SUCCESS = 'The account status has been successfully updated';
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'email', 'bypass', 'status', 'created', 'updated'];
    /**
     * Bind the request and initialise the Drive authorisation and mirror helpers.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete a Google Drive account together with its stored credentials.
     *
     * @return string JSON response
     */
    protected function delete(): string
    {
    }
    /**
     * Toggle the download-limit bypass flag of an account.
     *
     * @return string JSON response
     */
    protected function updateBypass(): string
    {
    }
    /**
     * Toggle the active status of an account, shared by both update actions.
     *
     * @return string JSON response
     */
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
 * Google Drive file browser endpoint (list, mirror, delete).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class GDriveFileAjax extends \GDPlayer\Helper\AjaxHelper
{
    private const MESSAGE_FILE_DELETE_FAIL = 'The file/folder failed to delete';
    private const MESSAGE_FILE_DELETE_SUCCESS = 'The file/folder has been successfully deleted';
    private const MESSAGE_FILE_IMPORT_FAIL = 'The file failed to import';
    private const MESSAGE_FILE_IMPORT_SUCCESS = 'The file has been successfully imported';
    private const MESSAGE_FILE_UPDATE_FAIL = 'The file/folder failed to update';
    private const MESSAGE_FILE_UPDATE_SUCCESS = 'The file/folder has been successfully updated';
    private const MESSAGE_FOLDER_CREATE_FAIL = 'The new file/folder failed to create';
    private const MESSAGE_FOLDER_CREATE_SUCCESS = 'The new file/folder has been created successfully';
    private const MESSAGE_MIRROR_FILE_DELETE_FAIL = 'The mirror file failed to delete';
    private const MESSAGE_MIRROR_FILE_DELETE_SUCCESS = 'The mirror file has been successfully deleted';
    private const MESSAGE_REMOVE_DUPLICATE_FILES_FAIL = 'Duplicate files failed to remove';
    private const MESSAGE_REMOVE_DUPLICATE_FILES_SUCCESS = 'Duplicate files have been successfully removed';
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveDuplicate $gdDuplicate;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    private \GDPlayer\Model\Video $videoModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'title', 'description', 'shared', 'modifiedDate'];
    /**
     * Wire the Google Drive client and the models used by every action.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Add playback URLs, action links and parsed dates to raw Drive rows.
     *
     * @param list<array<string,mixed>> $rawDriveFiles
     * @param string $email
     * @return list<array<string,mixed>>
     */
    protected function createDataList(array $rawDriveFiles = [], string $email = ''): array
    {
    }
    /**
     * Create a folder under the posted parent and flush the cached file listing.
     *
     * @return string JSON response describing the outcome
     */
    protected function createNewFolder(): string
    {
    }
    /**
     * Delete a Drive file through the API and drop the cached file listing.
     *
     * @return string JSON response describing the outcome
     */
    protected function delete(): string
    {
    }
    /**
     * Remove the posted mirror row by primary key.
     *
     * @return string JSON response describing the outcome
     */
    protected function deleteMirror(): string
    {
    }
    /**
     * Read the posted file metadata from Drive and store it as a new video row.
     *
     * @return string JSON response carrying the new video id and slug
     */
    protected function gdriveImport(): string
    {
    }
    /**
     * List the shared drives visible to the posted account email.
     *
     * @return string JSON response holding the shared drive collection
     */
    protected function getSharedDrives(): string
    {
    }
    /**
     * Scan one page of Drive files, deleting byte-identical copies as it goes.
     *
     * @return string JSON response with the next page token to continue from
     */
    protected function removeDuplicateFiles(): string
    {
    }
    /**
     * Delete the item when an identical record already exists, otherwise store it as seen.
     *
     * @param array<string,mixed> $driveFileItem
     * @param string $sha1
     * @param string $sha256
     * @param string $description
     * @return bool|string
     */
    protected function removeDuplicateFilesByData(array $driveFileItem = [], string $sha1 = '', string $sha256 = '', string $description = ''): bool|string
    {
    }
    /**
     * Rename a Drive file or folder and drop the cached file listing.
     *
     * @return string JSON response describing the outcome
     */
    protected function renameFileFolder(): string
    {
    }
    /**
     * Grant or revoke the public permission of a Drive file.
     *
     * @return string JSON response describing the outcome
     */
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
 * Google Drive mirror management endpoint (list, add, remove).
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class GDriveMirrorAjax extends \GDPlayer\Helper\AjaxHelper
{
    private const MESSAGE_DELETE_FAIL = 'The backup file failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The backup file has been successfully deleted';
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'gdrive_id', 'mirror_id', 'mirror_email', 'created'];
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Remove the mirror row and the mirrored Drive file behind it.
     *
     * @return string ajax status plus message
     */
    protected function delete(): string
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
    private const MESSAGE_DELETE_FAIL = 'The backup queue failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The backup queue has been successfully deleted';
    private const MESSAGE_GDRIVE_COPY_FAIL = 'Cannot copy the file! Try again later';
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Model\GDriveQueue $gdQueue;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'gdrive_id'];
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Copy the source file into the first active Drive account and return its view link.
     *
     * Accounts are tried in order; the copy fails only after every one reports back nothing.
     * @return string JSON payload with the new file id and link, or the failure message
     */
    protected function copy(): string
    {
    }
    /**
     * Remove a queue row by id, refusing non-positive ids and logging failed deletes.
     *
     * @return string JSON payload with the status message
     */
    protected function delete(): string
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
    private const MESSAGE_DELETE_FAIL = 'The load balancer server failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The load balancer server deleted successfully';
    private const MESSAGE_UPDATE_FAIL = 'The load balancer server failed to update';
    private const MESSAGE_UPDATE_SUCCESS = 'The load balancer server has been successfully updated';
    private \GDPlayer\Model\LoadBalancer $balancerModel;
    private \GDPlayer\Model\ViewLoadBalancer $viewBalancerModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['name', 'link', 'connections', 'playbacks', 'status', 'created', 'updated', 'public', 'id'];
    /**
     * Bind the request and instantiate the load balancer models.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete one load balancer server by its `id` request field.
     *
     * @return string JSON response describing the outcome
     */
    protected function delete(): string
    {
    }
    /**
     * Toggle the enabled/disabled status of one load balancer server.
     *
     * @return string JSON response describing the outcome
     */
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
 * Admin-only endpoint for cache clearing and server status metrics.
 *
 * Handles the authenticated Ajax request dispatched by AjaxHelper.
 */
final class PrivateAjax extends \GDPlayer\Helper\AjaxHelper
{
    private const MESSAGE_CACHE_CLEAR_FAIL = 'The cache failed to clear or does not exist';
    private const MESSAGE_CACHE_CLEAR_SUCCESS = 'The cache has been cleared successfully';
    private \GDPlayer\Model\LoadBalancer $balancerModel;
    private \GDPlayer\Service\System\SystemInfo $systemInfo;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    /**
     * Wire the request into the base Ajax helper and build the models it needs.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete the video sources and cached files owned by this load balancer instance.
     *
     * @return string JSON response
     */
    protected function clearLoadBalancer(): string
    {
    }
    /**
     * Drop the sources and player cache of a video plus its alternative videos.
     *
     * @return string JSON response with a per-store clear summary
     */
    protected function clearVideoCache(): string
    {
    }
    /**
     * Return one group of system metrics, served from the instance cache when warm.
     *
     * @return string JSON response
     */
    protected function serverStatus(): string
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
    private const MESSAGE_CACHE_CLEAR_FAIL = 'Failed to clear the cache of the video or the video does not exist';
    private const MESSAGE_CACHE_CLEAR_SUCCESS = 'The video cache cleared successfully';
    private const MESSAGE_CREATE_PLAYER_FAIL = 'Insert the video URL first';
    private const MESSAGE_EMAIL_EXIST = 'The email address is already registered';
    private const MESSAGE_FEATURE_DISABLE = 'This feature is disabled';
    private const MESSAGE_GDRIVE_BYPASS_FAIL = 'Cannot bypass the file, try later';
    private const MESSAGE_GDRIVE_BYPASS_SUCCESS = 'The file has been successfully bypassed';
    private const MESSAGE_STAT_FAIL = 'Total daily visits have been exceeded';
    private const MESSAGE_STAT_SUCCESS = 'Total daily visits successfully created';
    private const MESSAGE_USERNAME_EXIST = 'The username is already registered';
    private const MESSAGE_VIDEO_SAVE_FAIL = 'The new video failed to save';
    private const MESSAGE_VIDEO_SAVE_SUCCESS = 'The new video has been saved successfully';
    private \GDPlayer\Model\LoadBalancer $balancerModel;
    private \GDPlayer\Core\Core $core;
    private string $downloadSlug = 'd';
    private string $embed2Slug = 'r';
    private string $embedSlug = 'e';
    private \GDPlayer\External\GoogleDriveRestAPI $gdApi;
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\External\Maxmind $maxmind;
    private \Sqids\Sqids $sqids;
    private \GDPlayer\Model\Stat $statModel;
    private \GDPlayer\Model\StatUA $statUAModel;
    private \GDPlayer\Model\SubtitleManager $subtitleManager;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\User $userModel;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    /**
     * Initialise every collaborator used by the public actions.
     *
     * @param ServerRequestInterface $request Incoming PSR-7 request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Check whether the e-mail address is already registered by another user.
     *
     * @param string $email Address to test; falls back to the request input
     * @return string JSON response
     */
    protected function checkEmail(string $email = ''): string
    {
    }
    /**
     * Check whether the username is already registered by another user.
     *
     * @param string $username Name to test; falls back to the request input
     * @return string JSON response
     */
    protected function checkUsername(string $username = ''): string
    {
    }
    /**
     * Delete the cached sources of every video referenced by the encrypted payload.
     *
     * @return string JSON response
     */
    protected function clearVideoCache(): string
    {
    }
    /**
     * Build the encrypted embed, download and request URLs for a video URL.
     *
     * @return string JSON response
     */
    protected function createPlayer(): string
    {
    }
    /**
     * Copy a Google Drive file into an authorised account to bypass its download limit.
     *
     * @return string JSON response
     */
    protected function gdriveBypassLimit(): string
    {
    }
    /**
     * List the active load balancer mirrors together with the main site.
     *
     * @return string JSON response
     */
    protected function getLoadBalancerList(): string
    {
    }
    /**
     * Authorise the request through the per-action allow list, reCAPTCHA or CORS token.
     *
     * @return bool True when the request may run
     */
    protected function isPublicRequestValid(): bool
    {
    }
    /**
     * Extract, store and return a single video of a bulk import batch.
     *
     * @return string JSON response
     */
    protected function saveBulkProcess(): string
    {
    }
    /**
     * Resolve the video referenced by the encrypted payload and record a view.
     *
     * @return string JSON response
     */
    protected function statCounter(): string
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
    private const MESSAGE_DELETE_FAIL = 'The session failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The session has been successfully deleted';
    private \GDPlayer\Model\Session $sessionModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'username', 'ip', 'useragent', 'created', 'expires'];
    /**
     * Bind the incoming request and initialise the session model.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete the session referenced by the request ID.
     * Delete the session row referenced by the posted id.
     *
     * @return string JSON response
     */
    protected function delete(): string
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
    private const MESSAGE_BLACKLIST_FAIL = 'The blacklisted videos failed to deactivate';
    private const MESSAGE_BLACKLIST_SUCCESS = 'The blacklisted videos have been successfully deactivated';
    private const MESSAGE_CACHE_CLEAR_FAIL = 'The cache failed to clear';
    private const MESSAGE_CACHE_CLEAR_SUCCESS = 'The cache has been cleared successfully';
    private const MESSAGE_DEPENDENCY_FAIL = 'Some php functions and applications are not enabled/installed yet';
    private const MESSAGE_DEPENDENCY_SUCCESS = 'Supported php functions and applications have been enabled/installed';
    private const MESSAGE_LICENSE_SAVE_FAIL = 'GDPlayer license failed to save';
    private const MESSAGE_LICENSE_SAVE_SUCCESS = 'GDPlayer license has been successfully saved';
    private const MESSAGE_RESET_FAIL = 'The bypassed hosts failed to reset';
    private const MESSAGE_RESET_SUCCESS = 'The bypassed hosts have been successfully reset';
    private const MESSAGE_VAST_CREATE_FAIL = 'VAST ad file failed to generate';
    private const MESSAGE_VAST_CREATE_SUCCESS = 'VAST ad file has been generated successfully';
    private const MESSAGE_VAST_DELETE_FAIL = 'The VAST ad file failed to delete';
    private const MESSAGE_VAST_DELETE_SUCCESS = 'The VAST ad file has been successfully deleted';
    private const TRUNCATE_SOURCES = 'TRUNCATE `tb_videos_sources`;';
    private const TRUNCATE_TMP = 'TRUNCATE `tmp_videos_sources`;';
    private \GDPlayer\Service\Background\Background $backgroundService;
    private \GDPlayer\Service\HeadlessChrome\HeadlessChrome $headlessChrome;
    private \GDPlayer\Model\TmpVideoSource $tmpVideoSourceModel;
    private string $uploadsDir = '';
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Clear every cache layer: downloads, browsers, source tables and cache drivers.
     *
     * @return string JSON response
     */
    protected function clearAllCache(): string
    {
    }
    /**
     * Clear the cached sources of a single load balancer.
     *
     * @return string JSON response
     */
    protected function clearLoadBalancer(): string
    {
    }
    /**
     * Clear the settings cache and the temporary directories.
     *
     * @return string JSON response
     */
    protected function clearSettingsCache(): string
    {
    }
    /**
     * Clear cached video sources and the player file-size entries.
     *
     * @return string JSON response
     */
    protected function clearVideosCache(): string
    {
    }
    /**
     * Delete the temporary subtitle, image and cache files.
     *
     * @return string JSON response
     */
    protected function clearVideosFiles(): string
    {
    }
    /**
     * Generate a custom VAST XML file and register it in the settings.
     *
     * @return string JSON response, the public URL of the new VAST file on success
     */
    protected function createCustomVast(): string
    {
    }
    /**
     * Delete a custom VAST file and drop it from the settings list.
     *
     * @return string JSON response
     */
    protected function deleteCustomVast(): string
    {
    }
    /**
     * Deactivate the videos whose title matches a blacklisted word.
     *
     * @return string JSON response
     */
    protected function disableBlacklistedVideos(): string
    {
    }
    /**
     * Report which optional PHP extensions and binaries are available.
     *
     * @return string JSON response carrying the per-dependency result map
     */
    protected function getDependencies(): string
    {
    }
    /**
     * Delete the temporary upload, cache and subtitle directories.
     *
     * @return bool true when at least one directory was removed
     */
    protected function hasDeletedCacheTmpDir(): bool
    {
    }
    /**
     * Hide the dependency dialog for the next 30 days.
     *
     * @return string JSON response
     */
    protected function hideExtDialog(): string
    {
    }
    /**
     * Restore the default bypassed host list into the settings.
     *
     * @return string JSON response
     */
    protected function resetHosts(): string
    {
    }
    /**
     * Persist the GDPlayer license key and refresh the cached license state.
     *
     * @return string JSON response
     */
    protected function saveLicense(): string
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
    private const MESSAGE_DELETE_FAIL = 'The subtitle file failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The subtitle file has been successfully deleted';
    private const MESSAGE_FILE_UPLOAD_FAIL = 'The subtitle file failed to upload';
    private const MESSAGE_FILE_UPLOAD_SUCCESS = 'The subtitle file has been uploaded successfully';
    private const MESSAGE_MIGRATE_FAIL = 'Migration of those subtitle files failed';
    private const MESSAGE_MIGRATE_SUCCESS = 'Migration of the subtitle files has been successful';
    private const MESSAGE_NEW_LOCATION_INVALID = 'The new location is invalid';
    private const MESSAGE_NOT_FOUND = 'The subtitle was not found';
    private const MESSAGE_OLD_LOCATION_EMPTY = 'Old location required';
    private const MESSAGE_RENAME_DUPLICATED = 'The filename is already in use';
    private const MESSAGE_RENAME_FAIL = 'The subtitle failed to be renamed';
    private const MESSAGE_RENAME_SUCCESS = 'The subtitle has been successfully renamed';
    private \GDPlayer\Model\SubtitleManager $subtitleManagerModel;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\ViewSubtitleManager $viewSubtitleManagerModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'file_name', 'language', 'name', 'host', 'created', 'updated'];
    /**
     * Bind the request and the subtitle/view-subtitle models.
     *
     * @param ServerRequestInterface $request current HTTP request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Build the listing query, optionally filtered by a search term.
     *
     * @param string $search prefix matched against file name, language, host and display name
     * @return ViewSubtitleManager the model carrying the assembled criteria
     */
    protected function createSearchQuery(string $search = ''): \GDPlayer\Model\ViewSubtitleManager
    {
    }
    /**
     * Delete a subtitle row, its file on disk and the related media links.
     *
     * @return string JSON response with the deletion status
     */
    protected function delete(): string
    {
    }
    /**
     * List the distinct subtitle hosts for the admin filter dropdown.
     *
     * Admins only.
     *
     * @return string JSON response carrying the host list
     */
    protected function getHosts(): string
    {
    }
    /**
     * Move every subtitle of one host to another host.
     *
     * Rewrites the `link` column of affected subtitle rows and the `host` column of the manager rows.
     * Admins only.
     *
     * @return string JSON response with the migration status
     */
    protected function migrate(): string
    {
    }
    /**
     * Rename a subtitle file on disk and keep the database links in sync.
     *
     * @return string JSON response with the rename status
     */
    protected function rename(): string
    {
    }
    /**
     * Store an uploaded subtitle file and register it in the library.
     *
     * @return string JSON response carrying the new subtitle id, language and public URL
     */
    protected function uploadSubtitle(): string
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
    private const MESSAGE_DELETE_FAIL = 'The user failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The user has been successfully deleted';
    private const MESSAGE_EMAIL_EMPTY = 'Email address is required';
    private const MESSAGE_EMAIL_SEND_FAILED = 'Failed to send confirmation email';
    private const MESSAGE_EMAIL_SENT = 'The confirmation email has been successfully sent';
    private const MESSAGE_EMAIL_UPDATE_FAIL = 'The email address failed to update';
    private const MESSAGE_EMAIL_UPDATE_SUCCESS = 'The email address has been successfully updated. Please re-login';
    private const MESSAGE_EMAIL_USED = 'The email address is already in use by another user';
    private const MESSAGE_USERNAME_EMPTY = 'Username is required';
    private const MESSAGE_USERNAME_UPDATE_FAIL = 'The username failed to update';
    private const MESSAGE_USERNAME_UPDATE_SUCCESS = 'The username has been successfully updated. Please re-login';
    private const MESSAGE_USERNAME_USED = 'The username is already in use by another user';
    private const MESSAGE_USER_ID_EMPTY = 'User ID is required';
    private const MESSAGE_USER_NOT_EXISTS = 'User ID does not exists';
    private \GDPlayer\Service\Login $loginService;
    private \GDPlayer\External\Mailer $mailer;
    private \GDPlayer\Model\User $userModel;
    private \GDPlayer\Model\ViewUser $viewUserModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['name', 'user', 'email', 'status', 'created', 'updated', 'role', 'videos', 'id'];
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Attach a prefix LIKE filter on email, username and name when a term is supplied.
     *
     * @param string $search search term; empty leaves the model untouched
     * @return ViewUser the shared view model carrying the criteria
     */
    protected function createSearchQuery(string $search = ''): \GDPlayer\Model\ViewUser
    {
    }
    /**
     * Soft-delete the user referenced by the request id and report the outcome.
     *
     * @return string JSON response payload
     */
    protected function delete(): string
    {
    }
    /**
     * Store a new email for the current user after a format and uniqueness check.
     *
     * The session is logged out on success so the address is re-verified by login.
     * @return string JSON response payload
     */
    protected function editEmail(): string
    {
    }
    /**
     * Store a new username for the current user after a non-empty and uniqueness check.
     *
     * The session is logged out on success, mirroring the email change flow.
     * @return string JSON response payload
     */
    protected function editUsername(): string
    {
    }
    /**
     * Resend the confirmation mail to the user referenced by the request id.
     *
     * @return string JSON response payload
     */
    protected function sendConfirmationEmail(): string
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
    private const MESSAGE_POSTER_REMOVE_FAIL = 'The poster failed to remove';
    private const MESSAGE_POSTER_REMOVE_SUCCESS = 'The poster has been successfully removed';
    private const MESSAGE_VIDEO_DELETE_FAIL = 'The video failed to delete';
    private const MESSAGE_VIDEO_DELETE_SUCCESS = 'The video has been successfully deleted';
    private const MESSAGE_VIDEO_NOT_FOUND = 'The video was not found';
    private const MESSAGE_VIDEO_RENAME_EMPTY = 'The video title is invalid';
    private const MESSAGE_VIDEO_SAVE_FAIL = 'The new video failed to save';
    private const MESSAGE_VIDEO_SAVE_SUCCESS = 'The new video has been saved successfully';
    private const MESSAGE_VIDEO_UPDATE_FAIL = 'The video failed to update';
    private const MESSAGE_VIDEO_UPDATE_SUCCESS = 'The video has been successfully updated';
    private const SUBS_ACTION_LIST = ['deleteSubtitle', 'editSubtitle', 'getSubtitles', 'searchSubtitles'];
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\External\Maxmind $maxmind;
    private \GDPlayer\Ajax\VideoSubtitleAjax $subtitleHandler;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\ViewVideo $viewVideoModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'title', 'host', 'slug', 'status', 'dmca', 'has_sub', 'views', 'name', 'created', 'updated', 'poster', 'host_id'];
    /**
     * @param ServerRequestInterface $request
     * @return bool
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete the video identified by the request ID and report the outcome as a JSON response.
     *
     * @return string
     */
    protected function delete(): string
    {
    }
    /**
     * Delete every video whose host matches one of the posted hostnames; admin only.
     *
     * @return string
     */
    protected function deleteByHostnames(): string
    {
    }
    /**
     * Set the DMCA takedown flag and last-updated timestamp of the requested video; admin only.
     *
     * @return string
     */
    protected function dmcaTakedown(): string
    {
    }
    /**
     * Collect the download URL of the primary record and of every alternative host of the requested video.
     *
     * @return string
     */
    protected function getAlternatives(): string
    {
    }
    /**
     * Build the signed load-balancer API URL and payload that starts a video server for a video ID or URL.
     *
     * @return string
     */
    protected function getServer(): string
    {
    }
    /**
     * Clear the poster column of the video and unlink the local image unless the stored value is a remote URL.
     *
     * @return string
     */
    protected function removePoster(): string
    {
    }
    /**
     * Update the stored title of the requested video after validating the new name and the video ID.
     *
     * @return string
     */
    protected function rename(): string
    {
    }
    /**
     * Apply the posted prefix, postfix and replacement rules to every video in the posted ID set.
     *
     * @return string
     */
    protected function renameMulti(): string
    {
    }
    /**
     * Derive the video status from the posted sources flag (1 when empty) and persist it.
     *
     * @return string
     */
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
 *
 * @phpstan-type ExportRow array{
 *     id:int,
 *     title:string,
 *     slug:string,
 *     poster:string,
 *     videos:list<string>,
 *     subtitles:list<array{url:string,label:string}>
 * }
 */
final class VideoExportAjax extends \GDPlayer\Helper\AjaxHelper
{
    private const MESSAGE_VIDEO_EXPORT_FAIL = 'Video list failed to export';
    private const MESSAGE_VIDEO_EXPORT_SUCCESS = 'The video list has been exported successfully';
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Write the selected videos and their subtitles to a timestamped CSV file and return its download URL.
     *
     * @return string
     */
    protected function exportAsCSV(): string
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
    private const MESSAGE_VIDEO_IMPORT_FAIL = 'New video list failed to import';
    private const MESSAGE_VIDEO_IMPORT_SUCCESS = 'The new video list has been successfully imported';
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    // -------------------------------------------------------------------------
    // Action handlers
    // -------------------------------------------------------------------------
    /**
     * Receives a JSON batch of up to 250 pre-parsed video rows from the frontend,
     * persists them to the database, and returns the inserted rows for the DataTable.
     *
     * POST body (JSON-encoded field "rows"):
     * [
     *   {
     *     "title":     string,
     *     "videos":    string[],          // [0] = main URL, [1..n] = alternatives
     *     "subtitles": [{url, label}],    // already fetched/expanded by frontend
     *     "poster":    string,
     *     "slug":      string
     *   },
     *   ...
     * ]
     *
     * @return string
     */
    protected function importVideosBatch(): string
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
    private const MESSAGE_SUBTITLE_DELETE_FAIL = 'The subtitle failed to remove';
    private const MESSAGE_SUBTITLE_DELETE_SUCCESS = 'The subtitle has been successfully removed';
    private const MESSAGE_SUBTITLE_NOT_FOUND = 'The subtitle was not found';
    private const MESSAGE_SUBTITLE_UPDATE_FAIL = 'The subtitle file failed to update';
    private const MESSAGE_SUBTITLE_UPDATE_SUCCESS = 'The subtitle file has been successfully updated';
    private const MESSAGE_SUBTITLE_UPLOAD_FAIL = 'The subtitle file failed to upload';
    private const MESSAGE_SUBTITLE_UPLOAD_SUCCESS = 'The subtitle file has been successfully uploaded';
    private \GDPlayer\Model\SubtitleManager $subtitleManagerModel;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    /**
     * Wire the subtitle models and hand the request to the Ajax base class.
     *
     * @param ServerRequestInterface $request incoming Ajax request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete the posted subtitle row by id.
     *
     * @return string JSON response describing the outcome
     */
    protected function deleteSubtitle(): string
    {
    }
    /**
     * Replace the subtitle link from either an uploaded file or a validated URL.
     *
     * @return string JSON response carrying the new subtitle entry
     */
    protected function editSubtitle(): string
    {
    }
    /**
     * List the playable subtitles of a video, decoding legacy links on the way.
     *
     * @return string JSON response holding the subtitle list
     */
    protected function getSubtitles(): string
    {
    }
    /**
     * Suggest stored subtitle files matching the query, limited to ten rows.
     *
     * @return string JSON response holding the suggestion list
     */
    protected function searchSubtitles(): string
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
     *
     * The request is built from the SAPI globals, handled by {@see Kernel}, and
     * emitted back through {@see SapiEmitter}. An unhandled exception is logged
     * with its origin and rethrown so the runtime still reports it.
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
    /** Keys converted to bool. */
    private const BOOL_KEYS = ['DB_ATTR_PERSISTENT', 'DB_DEBUG'];
    /** Keys converted to int. */
    private const INT_KEYS = ['BUFFER_SIZE', 'SMALL_BUFFER_SIZE', 'MAX_DOWNLOAD_SPEED', 'DB_ATTR_PREFETCH', 'DB_ATTR_TIMEOUT', 'DB_CACHE_TIMEOUT', 'DB_CACHE_TIMEOUT_MIN', 'DB_CACHE_TIMEOUT_SETTINGS', 'DB_CACHE_TIMEOUT_VIDEOS', 'CACHE_TIMEOUT'];
    /** Keys whose values are JSON and converted to arrays. */
    private const JSON_KEYS = ['EXTRA_IP', 'DB_MASTER', 'DB_REPLICA', 'REDIS_CONFIG', 'DNS_SERVERS'];
    /** Keys that must exist and must not be empty. */
    private const REQUIRED_KEYS = ['BASE_URL', 'SECURE_SALT', 'ADMIN_DIR', 'DB_MASTER'];
    private static bool $loaded = false;
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
    /** Site configuration keys read by the front controller. */
    private const CONFIG_KEYS = ['slug_embed', 'slug_download', 'slug_request', 'main_site', 'disable_validation', 'updated', 'cache_mode', 'nginx_config'];
    private static ?\GDPlayer\Routing\Router $router = null;
    /**
     * Kernel instance for this process (router reused across requests in a worker).
     *
     * @return self booted kernel instance
     */
    public static function create(): self
    {
    }
    /**
     * Handle one request: publish context, dispatch, return the response.
     *
     * @param ServerRequestInterface $request PSR-7 request from the runtime
     * @return ResponseInterface response ready for the emitter
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
    private static bool $booted = false;
    /** Highest PHP memory use seen at a request boundary. */
    private static int $peakBytes = 0;
    /** Highest GC root-buffer size seen at a request boundary. */
    private static int $peakRoots = 0;
    /** Requests served by this process (always 1 under FPM, where the process dies afterwards). */
    private static int $requests = 0;
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
     * GC and memory snapshot of the process that answers this call.
     *
     * The numbers belong to one worker, not to the pool: with several workers each request
     * reports whichever process served it. Use a single worker (RoadRunner `num_workers=1`,
     * Swoole `worker_num=1`) when the values are read as a trend.
     *
     * @return array<string, int> roots, collector activity, requests served, current and peak bytes
     */
    public static function memoryStats(): array
    {
    }
    /**
     * Release every leftover of the request that just finished.
     *
     * Only per-request state is cleared. Read-only caches (Twig environment, settings)
     * stay in the process on purpose: rebuilding them every request
     * would defeat the point of a long-running worker. The version tag, by contrast, MUST
     * be dropped: another worker (admin, cron) changes it, so keeping it across requests
     * would leave this worker pinned to a stale version key.
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
    private \GDPlayer\Config\Config $config;
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
     * @return list<array<mixed, mixed>>
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
    private \GDPlayer\Model\Setting $settingModel;
    /**
     * Bind the settings model used by every read and write.
     */
    public function __construct()
    {
    }
    /**
     * Expose the application info instead of the internal model.
     *
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
     * @return string|bool|null parsed setting value, or null when the key does not exist
     */
    public function get(?string $key): string|bool|null
    {
    }
    /**
     * Read every setting as a parsed key/value map.
     *
     * @return array<string,string|bool|null>
     */
    public function getAll(): array
    {
    }
    /**
     * Build the language code/label list, or resolve one selected entry.
     *
     * @param string $selectedValue code or label to resolve; empty returns the whole list
     * @return array<string, string>|array{key: string, value: string}
     */
    public static function getLanguageList(string $selectedValue = ''): array
    {
    }
    /**
     * Read several settings at once, filling missing keys with null.
     *
     * @param string[] $keys
     * @return array<string,string|bool|null>
     */
    public function getMulti(array $keys = []): array
    {
    }
    /**
     * Return the configured site name, falling back to GDPlayer.
     *
     * @return string site name shown in titles and meta tags
     */
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
     * Persist a single setting: update the row when it exists, insert it otherwise.
     *
     * @param string $key   setting key
     * @param mixed  $value setting value
     * @return mixed inserted id on insert, true on update, false on failure
     */
    public function save(string $key, mixed $value): mixed
    {
    }
    /**
     * Persist a batch of settings and redirect with a result alert.
     *
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
 * CLI command `bg_download_aria2c.php` (F8.1).
 *
 * Logic moved from `includes/bg_download_aria2c.php` (archived); shim: `resources/bin/bg_download_aria2c.php` (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class DownloadAria2cCommand
{
    /**
     * Unduh sumber video memakai binari aria2c (pengganti `includes/bg_download_aria2c.php`).
     */
    public function handle(): string
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
    /**
     * Run the command.
     *
     * Copies every queued Drive file to the mirror accounts, drops the completed queue rows and
     * removes the pid file.
     *
     * @return string stdout message ('' = no message), used by the shim as the exit() argument
     */
    public function handle(): string
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
    /** Number of ping+download attempts before giving up. */
    private int $maxAttempts = 5;
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
 * CLI command `migrate.php` (F8.1) — new entry `resources/migrate.php`, formerly `includes/migrate.php`.
 *
 * Logic moved as-is from `includes/migrate.php` (archived); `resources/migrate.php` = thin shim (F8.3).
 * Uses no superglobals and never calls `exit` — the caller prints the returned message.
 */
final class MigrateCommand
{
    private const MIGRATION_FAIL = "❌ Failed\n";
    private const MIGRATION_OK = "✅ Success\n";
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
    /** Rows fetched per page, hard cap for one keyset batch. */
    private const PAGE_SIZE = 1000;
    /** @var array<int, true> ASN ids already present in `tb_maxmind_asn` during this run */
    private array $knownAsnIds = [];
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
    private \GDPlayer\Config\BinFile $binConfig;
    private \GDPlayer\Config\Config $config;
    private ?\Psr\Http\Message\ServerRequestInterface $request = null;
    private \GDPlayer\Core\Security\Security $security;
    /**
     * Bind the binary config, settings and security services.
     * @param ServerRequestInterface|null $request PSR-7 request
     */
    public function __construct(?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * Expose the application info when the object is dumped.
     *
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
 * Source resolution orchestrator for a single video.
 *
 * Dispatches to the matching hosting extractor, applies host health/blocking
 * rules and caches the resolved sources.
 */
final class Core
{
    private \GDPlayer\Config\BinFile $binConfig;
    private string $clientIp = '';
    private string $email = '';
    private bool $isDownloadable = false;
    private \GDPlayer\Model\LoadBalancer $loadBalancerModel;
    /**
     * @var array{
     *     sources:list<array{file:string,type:string,label:string}>,
     *     tracks:list<array{file:string,label:string}>,
     *     referer:string,
     *     title:string,
     *     email:string,
     *     image:string,
     *     cookies:array<int,string>,
     *     filmstrip:string,
     *     clientip:string
     * } $resultFormat
     */
    private array $resultFormat = ['sources' => [], 'tracks' => [], 'referer' => '', 'title' => '', 'email' => '', 'image' => '', 'cookies' => [], 'filmstrip' => '', 'clientip' => ''];
    private \GDPlayer\Core\Security\Security $security;
    private ?int $serverId = null;
    private string $serverIp = '';
    private string $userAgent = USER_AGENT;
    private string $userLanguage = \GDPlayer\Config\App::ACCEPT_LANGUAGE;
    private string $videoHost = 'direct';
    private string $videoHostId = '';
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    /** @var list<list<string|int|null>> $criteriaArray */
    protected array $criteriaArray = [];
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
     * Read the cached source record, deleting it when it holds no usable sources.
     *
     * @return array<string,mixed>
     */
    protected function filterDataSources(): array
    {
    }
    /**
     * Run the host extractor and collect its sources, tracks, metadata and cookies.
     *
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
     * Look up the cached source record matching the current host, client and download flag.
     *
     * @return array<string,mixed>
     */
    public function getDataSources(): array
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

/**
 * Filmstrip (thumbnail sprite) and WebVTT preview generator.
 *
 * Builds and repairs the thumbnail track used for seek previews.
 */
final class Filmstrip
{
    private int $imageHeight = 0;
    /** @var array<string|int, string|int> $imageInfo */
    private array $imageInfo = [];
    private string $imageURL = '';
    private int $imageWidth = 0;
    private int $thumbCount = 0;
    private int $thumbDuration = 0;
    private int $thumbHeight = 0;
    private int $thumbWidth = 0;
    private string $tmpDir = \GDPlayer\Config\App::TMP_PATH . 'img/';
    private string $tmpFile = '';
    /**
     * Expose the application info block instead of the internal sprite state.
     *
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

namespace GDPlayer\Core\Extractor;

/**
 * Base class for the concrete per-host extractors.
 *
 * Provides the shared HTTP/headless-browser plumbing and the contract that each
 * hosting extractor implements to resolve playable sources.
 */
abstract class Extractor extends \GDPlayer\Helper\Core\CoreHelper
{
    public const CLOSE = '"';
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
     * @param ServerRequestInterface|null $request PSR-7 request
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
    /**
     * Derive the referer from the configured referer, base URL, source URL or hosting download link, in that order.
     */
    protected function createCustomReferer(): void
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
     * Ask the licence endpoint for the Cloudflare source bundle and merge it into the parser state.
     *
     * The POST carries the host id and client IP plus plugin-supplied custom data; a non-200 reply
     * is logged and leaves the current state untouched.
     */
    protected function getCFSources(): void
    {
    }
    /**
     * Fetch the page and store the text of the first matching title element as the item title.
     *
     * @param string $url page to fetch
     * @param string $titleElm CSS selector whose first match supplies the title
     */
    protected function getDOMTitle(string $url = '', string $titleElm = 'title'): void
    {
    }
    /**
     * Check every source at once: one HEAD request per source, run concurrently
     * through `Http\FetcherPool` (handles are created and closed by the pool, not here).
     *
     * @param array<array<string,mixed>> $sources
     * @param string[] $customHeaders
     * @return array<int|string, FetchResult> results keyed by source index
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
    /**
     * Map a URL to the HLS, MPD or progressive video type by its file extension.
     *
     * @param string $url source URL to inspect
     * @return string detected media type
     */
    protected function getType(string $url = ''): string
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
     * Unpack a successful Cloudflare API payload into the referer, cookies, sources and tracks fields.
     *
     * A failing status only logs the server message; mp4Sources are used when no regular sources exist.
     * @param string $response raw JSON body from the licence endpoint
     */
    protected function parseCFResponse(string $response): void
    {
    }
    /**
     * Rebuild the subtitle track list from the Cloudflare track markup, skipping upload captions.
     *
     * Parse errors are logged and leave the previously collected tracks in place.
     */
    protected function parseCFTracks(): void
    {
    }
    /**
     * @param string $url
     * @return string[]
     */
    protected function parseCustomHeaders(string $url = ''): array
    {
    }
    /**
     * @param array<string|int, array<string, mixed>> $tracks
     * @return void
     */
    protected function parseTracks(array $tracks = []): void
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
     * Read the first matching title element out of an HTML body and store its trimmed text.
     *
     * @param ?string $response HTML body; null or empty clears the title
     * @param string $titleElm CSS selector whose first match supplies the title
     */
    protected function processDOMTitle(?string $response, string $titleElm = 'title'): void
    {
    }
    /**
     * @return array{proxy: string, type: int, usrpwd: string}|null
     */
    protected function resolveProxy(): ?array
    {
    }
}

namespace GDPlayer\Core\Hosting;

/**
 * Video-host URL resolver.
 *
 * Normalizes a host/URL into a host identifier and media id, resolving
 * custom hostnames before extraction.
 */
final class Hosting
{
    private \GDPlayer\Config\Config $config;
    /** @var array<string,mixed> $downloadUrls */
    private array $downloadUrls = [];
    /** @var string[] $fullPathId */
    private array $fullPathId = [];
    /** @var string[] $fullPathQryId */
    private array $fullPathQryId = [];
    /** @var string[] $fullQryId */
    private array $fullQryId = [];
    private string $host = 'direct';
    /** @var array<string,mixed> $hostnameList */
    private array $hostnameList = [];
    private string $id = '';
    /** @var string[] $lastPathId */
    private array $lastPathId = [];
    /** @var string[] $onePathId */
    private array $onePathId = [];
    /** @var string[] $removeFromId */
    private array $removeFromId = [];
    private string $url = '';
    /** @var string[] $zeroPathId */
    private array $zeroPathId = [];
    /**
     * Load the hostname tables, then resolve `$url` when one is given.
     *
     * Custom hostnames from the `custom-hostnames` setting override the bundled defaults.
     *
     * @param string $url optional media URL to resolve immediately
     */
    public function __construct(string $url = '')
    {
    }
    /**
     * Expose the application info block instead of the hostname tables.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Resolve the host key from the URL, falling back to `direct`.
     *
     * Each configured hostname maps to a canonical host name; the first domain
     * part that matches a known name wins. Host-specific quirks are applied
     * last through {@see handleSpecialHostOverrides()}.
     */
    protected function extractHost(): void
    {
    }
    /**
     * Derive the media id from the URL, query string, or path.
     *
     * `direct` and Dzen URLs keep the whole URL as the id; Google Drive ids come
     * from the shared helper, and every other host tries the query before the
     * path.
     */
    protected function extractID(): void
    {
    }
    /**
     * Pick the id segment out of the URL path for the current host.
     *
     * Each host maps to exactly one path form, so a single `match` decides which
     * segment (or whole path) becomes the id.
     *
     * @param string $path URL path
     * @param string $query URL query string, appended for hosts that need both
     */
    protected function extractPathId(string $path = '', string $query = ''): void
    {
    }
    /**
     * Override the extracted host for providers whose URL alone identifies them.
     *
     * PeerTube instance paths map to `peertube`; Rumble, Mail.ru weblinks and archive.org download links
     * map to `direct`.
     *
     * @return void
     */
    protected function handleSpecialHostOverrides(): void
    {
    }
    /**
     * Read the id from the query string for hosts that expose one there.
     *
     * @param string $query raw query string
     * @return bool true when a host rule matched and the id was replaced
     */
    protected function hasExtractedQueryId(string $query = ''): bool
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
 * Base parser for XVFS-style hosts that embed sources in page markup.
 *
 * Extracts playable sources from embed pages and caches empty-source hosts to
 * avoid repeated requests.
 */
abstract class XVFSParser extends \GDPlayer\Core\Extractor\Extractor
{
    protected const EVAL = 'eval(function(p,a,c,k,e,d)';
    protected const MSG_JSCONVERTER_FAILED = 'Failed to parse JS config into array';
    protected string $close = '"';
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * Pull the jwplayer setup payload out of a page and parse it into sources.
     *
     * @param string $response raw page body
     * @param string $jwpStart marker that opens the player config
     * @param string $jwpEnd marker that closes the player config
     */
    protected function defaultJwplayerParser(string $response, string $jwpStart = 'jwplayer("vplayer").setup(', string $jwpEnd = ');'): void
    {
    }
    /**
     * Take the highest available hls variant from an earnvids page as the source.
     *
     * @param string $response raw page body
     */
    protected function earnvidsParser(string $response): void
    {
    }
    /**
     * Convert a JS object literal slice into an array and hand it to the parser.
     *
     * @param string $script script body to read from
     * @param string $searchStart marker that opens the config object
     * @param string $searchEnd marker that closes the config object
     */
    protected function jsConfigParser(string $script = '', string $searchStart = '', string $searchEnd = ''): void
    {
    }
    /**
     * Read the stream URL, poster and referrer out of a mixdrop page.
     *
     * @param string $response raw page body
     */
    protected function mixdropParser(string $response): void
    {
    }
    /**
     * Extract the mp4upload player source and poster from a minified script.
     *
     * @param string $script script body to read from
     */
    protected function mp4uploadParser(string $script = ''): void
    {
    }
    /**
     * Parse a JW Player style config array: metadata, tracks, then sources.
     *
     * @param array<string,mixed> $playerConfigArray decoded player configuration
     * @return void
     */
    protected function parseArray(array $playerConfigArray = []): void
    {
    }
    /**
     * Read the title and poster from a player config.
     *
     * `chromecast.media.title` wins over `title`; `image` wins over `poster`.
     * Both fields are reset to an empty string when neither key is usable.
     *
     * @param array<string,mixed> $playerConfigArray decoded player configuration
     * @return void
     */
    protected function parseArrayMetadata(array $playerConfigArray): void
    {
    }
    /**
     * Collect sources from `sources`, its first string element, and `file`.
     *
     * Existing sources are kept, so a later call never duplicates or overrides
     * what an earlier parser already found.
     *
     * @param array<string,mixed> $playerConfigArray decoded player configuration
     * @return void
     */
    protected function parseArraySources(array $playerConfigArray): void
    {
    }
    /**
     * Hand the config's subtitle tracks to the shared track parser.
     *
     * `externalTracks` wins; otherwise `tracks` is accepted as an array or as a
     * JSON/JS object literal, which is converted and logged on failure.
     *
     * @param array<string,mixed> $playerConfigArray decoded player configuration
     * @return void
     */
    protected function parseArrayTracks(array $playerConfigArray): void
    {
    }
    /**
     * Parse the obfuscated script captured from a Cloudflare-protected page.
     *
     * The script is unpacked and minified first, then routed to the host-specific
     * parser or the generic source scanner.
     */
    protected function parseCFSources(): void
    {
    }
    /**
     * Dispatch an embed page body to the parser that matches the current host.
     *
     * Unknown hosts fall back to the default JW Player parser.
     *
     * @param string|null $response embed page body, or null when the request failed
     */
    protected function parseEmbedSources(?string $response): void
    {
    }
    /**
     * Unpack and minify a player script, then scan it for a known player setup.
     *
     * A script that cannot be unpacked is blanked and logged instead of aborting
     * the extraction.
     *
     * @param string $script player script to scan
     */
    protected function parseSources(string $script = ''): void
    {
    }
    /**
     * Return the page body with any packed eval block already unpacked.
     *
     * @param string $response raw page body
     * @return string unpacked body, or the original when no eval block is present
     */
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
    private const URLS = ['cyberfile' => 'https://cyberfile.me/video/embed/%s/640x320', 'iceyfile' => 'https://iceyfile.net/video/embed/%s/640x320', 'udrop' => 'https://www.udrop.com/video/embed/%s/640x320'];
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * Scrape the embed page for a file id, an mp4 URL or a `<source>` URL and fill the source list.
     *
     * A file id is preferred and delegated to parseSources(); otherwise only URLs carrying a
     * download_token are accepted, and a miss leaves the status untouched.
     */
    protected function getEmbedSources(): void
    {
    }
    /**
     * Read the download token off the #download-file button and call the direct_download endpoint.
     *
     * Missing nodes, a missing onclick attribute or an empty payload are logged and skipped.
     * @param string $fileID numeric file id taken from the embed page
     * @param string $html page markup holding the download button
     */
    protected function parseDownloadHTML(string $fileID, string $html): void
    {
    }
    /**
     * Resolve a file id through file_details and store its openUrl target as the single source.
     *
     * The page title is reused as the item title; a missing html field is logged and skipped.
     * @param string $fileID numeric file id to resolve
     */
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
 * Query parser that resolves a request into video metadata and sources.
 *
 * Validates host/id, applies disabled-host rules and returns the normalized
 * result consumed by the API and player.
 */
final class Parser
{
    private \GDPlayer\Core\Parser\ParserBootstrap $bootstrap;
    private \GDPlayer\Core\Parser\ParserMedia $media;
    private \GDPlayer\Core\Parser\ParserResponse $response;
    private \GDPlayer\Core\Parser\ParserSave $save;
    private \GDPlayer\Core\Parser\ParserServices $services;
    private \GDPlayer\Core\Parser\ParserState $state;
    /**
     * @param array<string,mixed>|array<int|string,array<mixed>|string> $queryParams
     * @param ServerRequestInterface|null $request PSR-7 request
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
    /**
     * @return array<string,mixed>
     */
    public function getResult(): array
    {
    }
}

/**
 * Bootstrap of {@see Parser}: input validation and initial request setup.
 */
final class ParserBootstrap
{
    /**
     * @param ParserState $state request-scoped parser state
     * @param ParserServices $services collaborators used to read settings and rows
     * @param ParserResponse $response failure response builder
     * @param ParserSave $save query extractor
     */
    public function __construct(private \GDPlayer\Core\Parser\ParserState $state, private \GDPlayer\Core\Parser\ParserServices $services, private \GDPlayer\Core\Parser\ParserResponse $response, private \GDPlayer\Core\Parser\ParserSave $save)
    {
    }
    /**
     * Run the whole bootstrap: license check, settings, context and core query validation.
     *
     * @return null|array<string,mixed> failure response, or null when bootstrapping succeeded
     */
    public function bootstrapWithValidation(): ?array
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
     * @param Hosting $hosting host resolver used to split the alternative URL
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
     * @param Security $security security service used to encrypt the client IP
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
 * Parsed media identity: source hash, source URL, and subtitle tracks.
 */
final class ParserMedia
{
    /**
     * @param ParserState $state request-scoped parser state
     * @param ParserServices $services collaborators used to resolve media rows
     */
    public function __construct(private \GDPlayer\Core\Parser\ParserState $state, private \GDPlayer\Core\Parser\ParserServices $services)
    {
    }
    /**
     * Rewrite every source into a local bypass URL keyed by the video hash id.
     *
     * @param array<mixed> $sources
     * @return array<mixed>
     */
    public function parseSources(array $sources = []): array
    {
    }
    /**
     * Rewrite subtitle track URLs into local bypass URLs and flag the default track.
     *
     * @param array<mixed> $tracks
     * @return array<mixed>
     */
    public function parseTracks(array $tracks = []): array
    {
    }
}

/**
 * Assembles the normalized parser result consumed by the API and player.
 */
final class ParserResponse
{
    /**
     * @param ParserState $state request-scoped parser state
     * @param ParserServices $services collaborators used to resolve video rows
     * @param ParserMedia $media stream URL rewriter
     * @param ParserSave $save persistence helper for the status update
     */
    public function __construct(private \GDPlayer\Core\Parser\ParserState $state, private \GDPlayer\Core\Parser\ParserServices $services, private \GDPlayer\Core\Parser\ParserMedia $media, private \GDPlayer\Core\Parser\ParserSave $save)
    {
    }
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
    public function createResponse(string $status = 'fail', string $message = ''): array
    {
    }
}

/**
 * Video, subtitle and status persistence of {@see Parser}.
 */
final class ParserSave
{
    /**
     * @param ParserState $state request-scoped parser state
     * @param ParserServices $services collaborators used to persist rows
     */
    public function __construct(private \GDPlayer\Core\Parser\ParserState $state, private \GDPlayer\Core\Parser\ParserServices $services)
    {
    }
    /**
     * @param string $qryHost
     * @param string $qryId
     * @return array<string,mixed>
     */
    public function extractQuery(string $qryHost = 'host', string $qryId = 'id'): array
    {
    }
    /**
     * Persist the video parsed from the current request when public saving is enabled.
     *
     * With a database source only the subtitles are stored; otherwise the hosting
     * payload is de-duplicated per user before a new row is inserted.
     */
    public function saveNewVideo(): void
    {
    }
    /**
     * @param mixed $videoId
     * @return array<mixed>
     */
    public function saveVideoSubtitles(mixed $videoId): array
    {
    }
    /**
     * @param string $status
     * @param array<string,mixed> $criteria
     */
    public function updateVideoStatus(string $status = 'ok', array $criteria = []): void
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
 * Request-scoped state of {@see Parser}.
 *
 * Mutable value object: the bootstrap fills it, the response assembly reads it back.
 */
final class ParserState
{
    public int $altVideoId = -1;
    /** @var array<string,mixed> $appConfig */
    public array $appConfig = [];
    /** @var array<string,mixed> $coreQueryParams */
    public array $coreQueryParams = [];
    public bool $dbSource = false;
    public string $filmstrip = '';
    public string $gdriveEmail = '';
    /** @var array<mixed> $inputTracks */
    public array $inputTracks = [];
    public bool $isDownload = false;
    public string $mainURL = '';
    public string $poster = '';
    /** @var array<string,mixed>|array<int|string,array<mixed>|string> $queryParams */
    public array $queryParams = [];
    public ?\Psr\Http\Message\ServerRequestInterface $request = null;
    public string $shortKey = '';
    /** @var array<mixed> $sources */
    public array $sources = [];
    public string $title = '';
    public string $token = '';
    /** @var array<mixed> $tracks */
    public array $tracks = [];
    public int $userID = 0;
    /** @var array<mixed> $videoTracks */
    public array $videoTracks = [];
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
 * Embed and download page renderer.
 *
 * Resolves the request slug into video/server data and builds the embed page,
 * download page and their client-side player configuration payloads.
 * Rendering itself is delegated to {@see PlayerPageRenderer} and
 * {@see PlayerConfigBuilder}.
 */
final class Player
{
    private \GDPlayer\Core\Player\PlayerConfigBuilder $configBuilder;
    /** @var array<string,mixed> $customSupportedSites */
    private array $customSupportedSites = [];
    /** @var string[] $disabledHosts */
    private array $disabledHosts = [];
    private \GDPlayer\Core\Player\PlayerOptions $options;
    private \GDPlayer\Core\Player\PlayerPageRenderer $pageRenderer;
    private ?\Psr\Http\Message\ServerRequestInterface $request = null;
    private \GDPlayer\Core\Player\PlayerServices $services;
    private \GDPlayer\Core\Player\PlayerState $state;
    /** @var array<string,mixed> $supportedSites */
    private array $supportedSites = [];
    private \GDPlayer\Core\Player\PlayerTheme $theme;
    /** @var string[] $allowApiQueries */
    protected array $allowApiQueries = ['source', 'host', 'id', 'ahost', 'aid', 'subs', 'sub', 'lang', 'poster', 'token', 'uid', 'email', 'saved'];
    protected string $defaultHostLabel = 'Direct Link';
    protected bool $isDirectHost = true;
    /** @var array<string, string> */
    protected array $removeLabel = ['|New' => '', '|Additional Host' => ''];
    /** @var list<array<string,mixed>> $servers */
    protected array $servers = [];
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
    /**
     * Resolve the download/embed base URLs and build the API query from the path or query slug.
     */
    protected function createApiQuery(): void
    {
    }
    /**
     * Build the server list from the query string and pick the active server's API URL.
     *
     * Appends entries for the direct host, the alternate host and the stored video
     * alternatives, then stores the encrypted API query string in the player state.
     */
    protected function getActiveServer(): void
    {
    }
    /**
     * Resolve a URL query parameter into the host name and host id pair.
     *
     * @param string $idKey query key holding the URL to resolve
     * @param string $hostKey query key that receives the resolved host name
     */
    protected function getHostID(string $idKey = 'id', string $hostKey = 'host'): void
    {
    }
    /**
     * Append the stored alternative hosts of the requested video to the server list.
     */
    protected function getVideoAlternatives(): void
    {
    }
    /**
     * Load the title, poster and host of the requested video into the player state.
     */
    protected function getVideoInfo(): void
    {
    }
    /**
     * Decrypt the slug payload into the API query and decode the Sqids user ID when it is not numeric.
     *
     * @param string $slug encrypted video slug from the request
     */
    protected function parseSlug(string $slug): void
    {
    }
    /**
     * Replace the display name of each server with the configured name for its host when one exists.
     */
    protected function replaceSupportedSitesName(): void
    {
    }
    /**
     * Apply the embed, referer, network and download guards to the player request.
     *
     * `/api` requests bypass the check; a blocked request is logged and answered.
     */
    protected function validation(): void
    {
    }
    /**
     * Render the download page HTML for the current video.
     *
     * @return string rendered page HTML
     */
    public function getDownloadPage(): string
    {
    }
    /**
     * Build the client-side configuration for the download page player.
     *
     * @return string JSON player configuration
     */
    public function getDownloadPageConfig(): string
    {
    }
    /**
     * Render the embed page HTML for the current video.
     *
     * @return string rendered page HTML
     */
    public function getEmbedPage(): string
    {
    }
    /**
     * Build the client-side configuration for the embed page player.
     *
     * @return string JSON player configuration
     */
    public function getEmbedPageConfig(): string
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
 * Builds the client-side player configuration payloads of {@see Player}.
 *
 * Owns the resolved request state, so `Player` only resolves data and hands the
 * server list to this builder.
 */
final class PlayerConfigBuilder
{
    /**
     * @param PlayerServices $services page services (config, security, ...)
     * @param PlayerState    $state    resolved request/video state
     * @param PlayerOptions  $options  player options
     * @param PlayerTheme    $theme    theme and rendering options
     */
    public function __construct(private \GDPlayer\Core\Player\PlayerServices $services, private \GDPlayer\Core\Player\PlayerState $state, private \GDPlayer\Core\Player\PlayerOptions $options, private \GDPlayer\Core\Player\PlayerTheme $theme)
    {
    }
    /**
     * Build the client-side configuration for the download page player.
     *
     * @param array<array<string,mixed>> $servers resolved server list
     * @return string JSON player configuration
     */
    public function buildDownloadConfig(array $servers): string
    {
    }
    /**
     * Build the client-side configuration for the embed page player.
     *
     * @param array<array<string,mixed>> $servers resolved server list
     * @return string JSON player configuration
     */
    public function buildEmbedConfig(array $servers): string
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
 * Renders the embed and download pages of {@see Player}.
 *
 * Owns the resolved request state, so `Player` only resolves data and hands the
 * server list to this renderer.
 */
final class PlayerPageRenderer
{
    /**
     * @param PlayerServices $services page services (config, security, ...)
     * @param PlayerState    $state    resolved request/video state
     * @param PlayerOptions  $options  player options
     * @param PlayerTheme    $theme    theme and rendering options
     * @param ServerRequestInterface|null $request current request, when available
     */
    public function __construct(private \GDPlayer\Core\Player\PlayerServices $services, private \GDPlayer\Core\Player\PlayerState $state, private \GDPlayer\Core\Player\PlayerOptions $options, private \GDPlayer\Core\Player\PlayerTheme $theme, private ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * Render the download page HTML for the current video.
     *
     * @param array<array<string,mixed>> $servers resolved server list
     * @param bool $isDirectHost whether the active host is a direct-link host
     * @return string rendered page HTML
     */
    public function renderDownloadPage(array $servers, bool $isDirectHost): string
    {
    }
    /**
     * Render the embed page HTML for the current video.
     *
     * @param array<array<string,mixed>> $servers resolved server list
     * @param string $referer request referer
     * @param bool   $isDirectHost whether the active host is a direct-link host
     * @return string rendered page HTML
     */
    public function renderEmbedPage(array $servers, string $referer, bool $isDirectHost): string
    {
    }
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
     * @param ServerRequestInterface|null $request request whose UA seeds the mobile detector
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
    public bool $isError = false;
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
 * Encryption, URL tokenization and HMAC request-signature service.
 *
 * Derives per-request keys from the HMAC headers and provides symmetric
 * encrypt/decrypt helpers used for API payloads and stream tokens.
 * Inti lisensi/tanda-tangan ada di basis abstaknya ({@see SecurityBase}).
 */
final class Security extends \GDPlayer\Core\Security\SecurityBase
{
    private string $apiSalt = 'kntlMmkLuCoeg';
    private string $cipher = 'aes-256-cbc';
    private string $hmacDerivationKey = 'V8xK2mP9qR4wT6yA3bN7cJ5dF1gH0eL';
    private int $hmacExpiry = 60;
    private string $kunciGaram = 'GDPlayer~F1r3b4Ll';
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

/**
 * Licensing/signature core of Security: server capability check, token validation, plugin licence.
 *
 * Deliberately split from `Security` (see src/Core/Security.php) so this base file
 * can be distributed encrypted (ionCube) without also locking the crypto/HMAC API
 * used by themes & plugins.
 */
abstract class SecurityBase
{
    /**
     * Lowest version the server still serves. Raise it only together with a new release:
     * the server refuses to sign tokens for versions below this.
     */
    private const VERSI_MINIMUM = '5.0.0';
    protected string $hostname = '';
    protected string $kirimKode = 'license=%s&hostname=%s&ver=%s';
    protected string $kunciPublik = '';
    protected string $otentikasiURL = 'https://auth.gdplayer.to';
    /**
     * @param null|Redis  $redis      optional Redis instance for shared state
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
     * @param null|CacheItem $cache
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
     * @param null|CacheItem $cache
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

namespace GDPlayer\Database;

/**
 * Singleton PDO connection manager for the master and replica databases.
 *
 * Reuses one shared connection per process and supports reconnecting.
 */
final class Conn
{
    /** @var null|array<int,mixed> $config */
    private static ?array $config = null;
    private static ?self $instance = null;
    private ?\PDO $pdoRead = null;
    private ?\PDO $pdoWrite = null;
    private static ?\GDPlayer\Database\ConnectionProviderInterface $provider = null;
    /**
     * Expose the application info instead of the connection internals when dumping the object.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Return the cached handles, opening them once when the manager has none yet.
     *
     * @return array{0:PDO|null,1:PDO|null} [$pdoWrite, $pdoRead]
     */
    public function connect(): array
    {
    }
    /**
     * Open one PDO connection, retrying a few times before giving up.
     *
     * @param array<string,string|int> $dbConfig
     * @return null|PDO
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
    /**
     * Return the handle used for read queries.
     *
     * @return null|PDO read connection, null when the provider cannot supply one
     */
    public function pdoRead(): ?\PDO;
    /**
     * Return the handle used for write queries.
     *
     * @return null|PDO write connection, null when the provider cannot supply one
     */
    public function pdoWrite(): ?\PDO;
    /**
     * Drop/release the handles held by the provider (end of request or reconnect).
     */
    public function reset(): void;
}

/**
 * Builds the ALTER/CREATE SQL fragments used by the database migrations.
 */
final class MigrationQueries
{
    /**
     * Hash the password stored in an environment key for the seeded admin user.
     *
     * @param string $envKey Name of the environment variable holding the password
     * @return string Bcrypt hash of the password
     */
    protected static function getCredentialsHash(string $envKey): string
    {
    }
    /**
     * Collect the ADD FOREIGN KEY statements of every table, without duplicates.
     *
     * @param array<string, Migrate> $migrationsMap
     * @return string[]
     */
    public static function getAddForeignKeysTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * Collect the ADD INDEX statements of every table, without duplicates.
     *
     * @param array<string, Migrate> $migrationsMap
     * @return string[]
     */
    public static function getAddIndexesTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * Return the statements creating the reporting views.
     *
     * @return string[]
     */
    public static function getCreateViewsQueries(): array
    {
    }
    /**
     * Return the statements removing orphaned rows and duplicated settings.
     *
     * @return string[]
     */
    public static function getDeleteUnwantedDataQueries(): array
    {
    }
    /**
     * Drop the events left behind by older releases.
     *
     * @return string[]
     */
    public static function getDropEventsQueries(): array
    {
    }
    /**
     * Collect the DROP FOREIGN KEY statements, in reverse table order.
     *
     * @param array<string, Migrate> $migrationsMap
     * @return string[]
     */
    public static function getDropForeignKeysTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * Collect the DROP INDEX statements, in reverse table order.
     *
     * @param array<string, Migrate> $migrationsMap
     * @return string[]
     */
    public static function getDropIndexesTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * Drop the migration procedures left behind by older releases.
     *
     * @return string[]
     */
    public static function getDropProceduresQueries(): array
    {
    }
    /**
     * Drop the tables that no longer exist in the current schema.
     *
     * @return string[]
     */
    public static function getDropTablesQueries(): array
    {
    }
    /**
     * Return the statements dropping the reporting views.
     *
     * @return string[]
     */
    public static function getDropViewsQueries(): array
    {
    }
    /**
     * Return the statements rebuilding `tb_maxmind` with a unique prefix on `ip`.
     *
     * @return string[]
     */
    public static function getMigrateDataMaxmindQueries(): array
    {
    }
    /**
     * Turn the rename map of every migration into `CHANGE` statements.
     *
     * @param array<string, Migrate> $migrationsMap
     * @return string[]
     */
    public static function getModifiedFieldQueries(array $migrationsMap): array
    {
    }
    /**
     * Collect the CREATE/ALTER statements that bring every table to the current schema.
     *
     * @param array<string, Migrate> $migrationsMap
     * @return string[]
     */
    public static function getModifyTablesQueries(array $migrationsMap): array
    {
    }
    /**
     * Return the statements rewriting legacy host names and seeding the default accounts.
     *
     * @return string[]
     */
    public static function getUpdateOldDataQueries(): array
    {
    }
}

/**
 * Creates migration query objects bound to the write connection.
 */
final class MigrationQueriesCreator
{
    private \PDO $pdoWrite;
    /**
     * @param PDO $pdoWrite write connection used to execute migrations
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
 * Shared query-builder, caching and connection base for all database models.
 *
 * Provides criteria building, cached reads/writes and connection recovery
 * used by the concrete Model implementation.
 */
abstract class ModelHelper
{
    protected const MSG_CONNECTION_ERROR = 'Database connection unavailable';
    protected const MSG_EMPTY = 'SQL query is empty';
    protected const MSG_EXECUTION_FAILED = 'Execution failed';
    protected const MSG_INVALID = 'Invalid SQL placeholders or $params';
    /**
     * @var list<array{
     *     column:string,
     *     value:mixed,
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
    /**
     * Invalidate every cache entry tagged for this table and its views.
     *
     * @return int number of cache entries removed
     */
    protected function clearCache(): int
    {
    }
    /**
     * Hash a query and its bind values into a cache-safe key fragment.
     *
     * @param string $qry
     * @param mixed[] $values
     * @return string
     */
    protected function createCacheHash(string $qry = '', array $values = []): string
    {
    }
    /**
     * @param string $qry
     * @param null|mixed[] $params
     * @return void
     */
    protected function explainQuery(string $qry, ?array $params = null): void
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
    /**
     * Return a live PDO handle, reconnecting up to three times when it is dead.
     *
     * @param bool $writeable use the write connection instead of the read replica
     * @return PDO|null connection handle, or null when every attempt failed
     */
    protected function onConnect(bool $writeable = true): ?\PDO
    {
    }
    /**
     * Clear the accumulated ordering, limit, criteria and bind values.
     *
     * @return self fluent instance
     */
    protected function resetValues(): self
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
    /**
     * Tell whether the parameter list matches the placeholders found in the statement.
     *
     * Quoted literals are stripped first, so a `?` inside a string does not count.
     *
     * @param string $sql
     * @param null|array<mixed> $params
     * @return bool
     */
    public function hasValidPlaceholders(string $sql, ?array $params): bool
    {
    }
    /**
     * Run a write statement, delegating SELECT queries to `rawSelect()`.
     *
     * To maintain data integrity, make sure you call the method with the appropriate model,
     * for example (new VideoModel())->rawQuery("DELETE FROM `tb_videos` WHERE `id` IN (?,?);", [1, 2]);
     * You must call the closeCursor() function after executing this function if the result is a PDOStatement
     *
     * @param string $qry
     * @param null|array<mixed> $params positional and named placeholders supported
     * @return PDOStatement|false
     */
    public function rawQuery(string $qry, ?array $params = null): \PDOStatement|false
    {
    }
    /**
     * Run a SELECT on the read connection and keep its statement cursor open for the caller.
     *
     * To maintain data integrity, make sure you call the method with the appropriate model,
     * for example (new VideoModel())->rawQuery(
     * "SELECT a.* FROM `tb_videos` v LEFT JOIN `tb_videos_alternatives` a ON a.`vid` = v.`id` WHERE v.`id` = ?;",
     * [1]);
     * You must call the closeCursor() function after executing this function if the result is a PDOStatement
     *
     * @param string $qry
     * @param null|array<mixed> $params positional and named placeholders supported
     * @return PDOStatement|false
     */
    public function rawSelect(string $qry, ?array $params = null): \PDOStatement|false
    {
    }
}

namespace GDPlayer\Database\MySQL;

/**
 * Fluent schema builder for creating and altering tables during migration.
 */
class Migrate
{
    use \GDPlayer\Database\MySQL\MigrateColumnTypes;
    /**
     * @var list<array{name:string, field:string, refTable:string, refColumn:string,
     *     onDelete:string, onUpdate:string}> $foreignKeys
     */
    private array $foreignKeys = [];
    /**
     * @var list<array{name:string, fields:list<string>, unique?:bool, fulltext?:bool}> $indexes
     */
    private array $indexes = [];
    /** @var list<array<string,string>> $modifyColumns */
    private array $modifyColumns = [];
    /** @var bool true when the PRIMARY KEY (`id`) is already handled in another statement */
    private bool $primaryKeyAdded = false;
    private \GDPlayer\Database\MySQL\MigrateSchema $schema;
    protected \PDO $pdoWrite;
    protected string $table;
    /**
     * @param PDO $pdoWrite write connection used to execute migrations
     * @param null|MigrateSchema $schema schema reader override (tests)
     */
    public function __construct(\PDO $pdoWrite, ?\GDPlayer\Database\MySQL\MigrateSchema $schema = null)
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
     * @return array{name:string, fields:list<string>, unique?:bool, fulltext?:bool}
     */
    protected function createIndex(mixed $indexFields, string $indexName, string $type = 'unique', bool $typeValue = false): array
    {
    }
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
     * @return list<array<string,string>>
     */
    public function getModifyColumns(): array
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

/**
 * Column type builder and addColumn helper for the Migrate schema builder.
 */
trait MigrateColumnTypes
{
    /** @var array<string,array<string,mixed>> $columns */
    protected array $columns = [];
    /** @var string[] $numericTypes Numeric column types (always UNSIGNED). */
    protected array $numericTypes = ['INT', 'TINYINT', 'BIGINT', 'SMALLINT', 'MEDIUMINT'];
    /** @var string[] $textTypes Text column types (given the utf8mb4_unicode_ci collation). */
    protected array $textTypes = ['CHAR', 'VARCHAR', 'TEXT', 'MEDIUMTEXT', 'LONGTEXT'];
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
 * Reads the live schema of a table: columns, keys, indexes and collation.
 */
class MigrateSchema
{
    private \PDO $pdoWrite;
    /**
     * @param PDO $pdoWrite write connection used to execute migrations
     */
    public function __construct(\PDO $pdoWrite)
    {
    }
    /**
     * @param string $table table name
     * @return array<string,array<string,mixed>>
     */
    public function getColumns(string $table): array
    {
    }
    /**
     * @param string $table table name
     * @return string[]
     */
    public function getDropForeignKeysQueries(string $table): array
    {
    }
    /**
     * @param string $table table name
     * @return string[]
     */
    public function getDropIndexesQueries(string $table): array
    {
    }
    /**
     * Check the table PRIMARY KEY (so `ADD PRIMARY KEY` is not repeated when it already exists).
     *
     * @param string $table table name
     * @return bool true when the PRIMARY key exists
     */
    public function hasPrimaryKey(string $table): bool
    {
    }
    /**
     * Check whether the table is present in the current schema.
     *
     * @param string $table table name
     * @return bool true when SHOW TABLES returns a row; false on a miss or an exception
     */
    public function hasTable(string $table): bool
    {
    }
    /**
     * Read the collation of the table from INFORMATION_SCHEMA.
     *
     * @param string $table table name
     * @return mixed collation name, or false when the query throws
     */
    public function tableCollation(string $table): mixed
    {
    }
}

/**
 * Thrown when a destructive query runs without WHERE criteria.
 */
final class MissingCriteriaException extends \RuntimeException
{
}

/**
 * Fluent, cache-aware query builder for a single database table.
 *
 * Chain the criteria/order/limit setters, then call get(), getOne(), insert(),
 * update() or delete(). Reads and writes are invalidated through cache tags.
 */
class Model extends \GDPlayer\Database\ModelHelper
{
    protected const COMPARISON_OPERATORS = ['=', '>', '<', '>=', '<=', '<>', '!=', 'LIKE', 'NOT LIKE', 'REGEXP', 'NOT REGEXP'];
    /**
     * Render the LIMIT clause from an `[offset, length]` pair.
     *
     * @param null|int[] $limit
     * @return self
     */
    protected function createLimitQry(?array $limit): self
    {
    }
    /**
     * Render the ORDER BY clause, rejecting anything that is not a bare identifier.
     *
     * @param string[] $orderBy
     * @return self
     */
    protected function createOrderByQry(array $orderBy): self
    {
    }
    /**
     * Render the WHERE clause from the collected criteria, binding every non-null value.
     *
     * @return self fluent instance
     */
    protected function createWhereSqlParams(): self
    {
    }
    /**
     * Quote a column list for SELECT; '*' and unusable input fall back to all columns.
     *
     * @param mixed $selectColumns you can insert '*' or 'id, name' string fields or array('id', 'name') fields
     * @return string
     */
    protected static function repairSelectColumns(mixed $selectColumns = '*'): string
    {
    }
    /**
     * @param array{start:int, length:int, search:string, orderBy:string, orderDir:string} $qry
     * @param string[] $searchColumns
     * @param string|string[] $selectColumns
     * @return array{data:array<string|int, array<string,string|int|float|null>>, recordsFiltered:int, recordsTotal:int}
     */
    public function datatables(array $qry, array $searchColumns, string|array $selectColumns = '*'): array
    {
    }
    /**
     * Fetch the rows matching the current query builder state.
     *
     * @param string|string[] $selectColumns
     * @param null|string[] $orderBy
     * @param null|int[] $limit
     * @return list<array<string,string|int|float|null>>
     */
    public function get(string|array $selectColumns = '*', ?array $orderBy = null, ?array $limit = null): array
    {
    }
    /**
     * Count the rows matching the current query builder state.
     *
     * @param null|string[] $orderBy
     * @param null|int[] $limit
     * @return int
     */
    public function getNumRows(?array $orderBy = null, ?array $limit = null): int
    {
    }
    /**
     * Fetch the first row matching the current query builder state.
     *
     * @param string|string[] $selectColumns
     * @param null|string[] $orderBy
     * @return array<string,string|int|float|null>
     */
    public function getOne(string|array $selectColumns = '*', ?array $orderBy = null): array
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
     * @return list<array<string,string|int|float|null>>
     */
    public function getWhereIn(string $column, array $values, mixed $selectColumns = '*'): array
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
     * @return string|false inserted id from lastInsertId(), or false on failure
     */
    public function insert(array $data): string|false
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
     * Add several criteria at once, each as `[column, value, comparison, logical]`.
     *
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
     * @param PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, Migrate>
     */
    public static function base(\PDO $pdoWrite): array
    {
    }
    /**
     * Tables depending on the base ones (keys, stats, subtitles, videos).
     *
     * @param PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, Migrate>
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
    protected string $table = 'tb_gdrive_auth';
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
    protected string $table = 'tb_gdrive_duplicate';
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
     * @param PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, Migrate>
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
    protected string $table = 'tb_gdrive_mirrors';
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
    protected string $table = 'tb_gdrive_queue';
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
    protected string $table = 'tb_loadbalancers';
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
    protected string $table = 'tb_maxmind_asn';
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
     * @param PDO $pdoWrite write connection used to execute the migrations
     * @return array<string, Migrate>
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
    protected string $table = 'tb_plugin_routes';
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
    protected string $table = 'tb_settings';
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
    protected string $table = 'tb_stats';
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
    protected string $table = 'tb_stats_ua';
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
    protected string $table = 'tb_subtitle_manager';
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
    protected string $table = 'tb_subtitles';
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
    protected string $table = 'tmp_videos_sources';
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
    protected string $table = 'tb_users';
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
    protected string $table = 'tb_videos_alternatives';
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
    protected string $table = 'tb_videos_hash';
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
    protected string $table = 'tb_videos';
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
    protected string $table = 'tb_videos_sources';
    /**
     * Define the table schema (columns, indexes and foreign keys).
     *
     * @return self fluent instance
     */
    public function build(): self
    {
    }
}

namespace GDPlayer\Enum;

/**
 * `tb_videos.dmca` value.
 */
enum Dmca : int
{
    /** Playable. */
    case Clear = 0;
    /** Blocked: the player must answer with a takedown notice. */
    case Flagged = 1;
    /**
     * Normalise a raw database value. Anything other than a stored `1` is treated as clear.
     *
     * @param mixed $value raw `dmca` column value
     * @return self normalised flag
     */
    public static function fromValue(mixed $value): self
    {
    }
}

/**
 * `tb_users.role` value. Only `Admin` passes the admin guard.
 */
enum UserRole : int
{
    case Admin = 0;
    case Premium = 2;
    case User = 1;
    /**
     * Resolve a stored role index, falling back to the plain user role.
     *
     * @param int|null $index stored `role` value, or null when the row has no value
     * @return self matching role, or `User` for an unknown index
     */
    public static function fromIndex(?int $index): self
    {
    }
    /**
     * @return string label shown in the user list
     */
    public function label(): string
    {
    }
}

/**
 * `tb_users.status` value.
 */
enum UserStatus : int
{
    /** Confirmed and allowed to log in. */
    case Active = 1;
    /** Signed up, confirmation email sent, waiting for the link to be opened. */
    case AwaitingApproval = 2;
    /** Blocked by an admin. */
    case Inactive = 0;
}

/**
 * `tb_videos.status` value: whether the primary source and the alternatives still exist upstream.
 */
enum VideoStatus : int
{
    /** No reachable source at all. */
    case Broken = 1;
    /** Primary source and every alternative are still reachable. */
    case Good = 0;
    /** Primary source is gone but at least one alternative still works. */
    case Warning = 2;
    /**
     * Derive the status from the availability of both source groups.
     *
     * @param bool $primaryAlive     the `tb_videos` source is still reachable
     * @param bool $alternativeAlive at least one `tb_videos_alternatives` source is still reachable
     * @return self status implied by those two facts
     */
    public static function fromAvailability(bool $primaryAlive, bool $alternativeAlive): self
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
    /** @var array<string, true> directories whose autoloader is already registered */
    private static array $registered = [];
    /**
     * Decode a manifest file and keep only its string-keyed entries.
     *
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
     * @param array<mixed, mixed> $manifest manifest contents
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
    private string $apiBaseUrl = 'https://api.anti-captcha.com/';
    private string $apiKey = '';
    /** @var array<string,mixed> $proxy */
    private array $proxy = [];
    private string $websiteKey = '';
    private string $websiteURL = '';
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
 * Shared Drive state, auth headers, transport and cache writes.
 *
 * The properties are public on purpose: the file, permission and mirror
 * collaborators read the same per-request state without accessor boilerplate.
 *
 * @internal
 */
class GDriveClient
{
    /** @var null|array<string,mixed> */
    public ?array $accessToken = null;
    public ?string $apiKey = null;
    public string $baseURL = 'https://www.googleapis.com';
    public string $email = '';
    public bool $encryptTitle = false;
    public string $fileID = '';
    public \GDPlayer\Model\GDriveAuth $gdAuth;
    public \GDPlayer\Model\GDriveMirror $gdMirror;
    /** @var array<string,mixed> */
    public array $inputFileInfo = [];
    public string $nextPageToken = '';
    public string $searchTitle = '';
    public bool $showFolderOnly = false;
    public bool $showPrivateOnly = false;
    public string $tokenPath = '/oauth2/v4/token';
    /** @var null|array<string,mixed> */
    public ?array $userDetail = null;
    public string $v2Path = '/drive/v2';
    public \GDPlayer\Model\VideoHash $vHash;
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
     * Single request to the Google Drive API: Cloudflare proxy, method, body, headers.
     *
     * @param string[] $headers header lines sent with the request
     * @return array{response: string, error: string, status: int}
     */
    public function apiRequest(string $url, string $method = 'GET', string $postData = '', array $headers = []): array
    {
    }
    /**
     * Build the auth header list for the active account, refreshing the token when needed.
     *
     * @param bool $jsonType add JSON accept/content-type headers
     * @return string[]
     */
    public function createAuthHeader(bool $jsonType = false): array
    {
    }
    /**
     * Send an authenticated JSON body and return the created resource.
     *
     * @param string $url absolute API URL
     * @param string $postData JSON body
     * @param string $method POST or PUT
     * @return array<string,mixed>|false response when it carries an `id`, false otherwise
     */
    public function customCurlRequest(string $url, string $postData, string $method = 'POST'): array|false
    {
    }
    /**
     * Toggle title encryption for returned file names.
     *
     * @param bool $encrypted whether to encrypt titles
     * @return static fluent instance
     */
    public function encryptTitle(bool $encrypted = false): static
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
     * Return a cached access token, refreshing it through the OAuth2 endpoint when stale.
     *
     * Cached for 3500 seconds behind a 15 second lock, so parallel requests refresh only once.
     *
     * @return null|array<string,mixed> token response, or null when the account is unknown
     */
    public function getAccessToken(): ?array
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
     * Store file metadata in the local hash cache unless the id is already cached.
     *
     * @param array<string,mixed> $file
     * @return string|false
     */
    public function saveFileInfo(array $file = []): string|false
    {
    }
    /**
     * Record the source/mirror id pair in the gdMirror table unless it is already stored.
     *
     * @param string $fileID original Drive file id
     * @param string $fileMirrorID copy id; an identical value means no mirror row is needed
     * @return string|false insert result, or false when the pair exists or the ids match
     */
    public function saveFileMirrorDB(string $fileID = '', string $fileMirrorID = ''): string|false
    {
    }
    /**
     * Restrict search results to folders only.
     *
     * @param bool $showFolderOnly folder-only flag
     * @return static fluent instance
     */
    public function searchFolderOnly(bool $showFolderOnly = false): static
    {
    }
    /**
     * Restrict search results to private (non-shared) files only.
     *
     * @param bool $showPrivateOnly private-only flag
     * @return static fluent instance
     */
    public function searchPrivateOnly(bool $showPrivateOnly = false): static
    {
    }
    /**
     * Set the title filter used by file searches.
     *
     * @param string $searchTitle title query
     * @return static fluent instance
     */
    public function searchTitle(string $searchTitle = ''): static
    {
    }
    /**
     * Set the pagination token for the next result page.
     *
     * @param string $nextPageToken next page token
     * @return static fluent instance
     */
    public function setNextPageToken(string $nextPageToken = ''): static
    {
    }
}

/**
 * Drive file operations: info, listing, folders, rename.
 *
 * @internal
 */
final class GDriveFileApi
{
    public function __construct(private \GDPlayer\External\GDriveClient $client)
    {
    }
    /**
     * Create a Drive folder, optionally inside the given parents.
     *
     * @param string $folderName new folder title
     * @param list<array<string,mixed>> $parents Parent references (`['id' => ...]`).
     * @return array<string,mixed>|false created folder, or false on failure
     */
    public function createNewFolder(string $folderName = '', array $parents = []): array|false
    {
    }
    /**
     * Fetch one file's metadata, optionally from the local hash cache first.
     *
     * A cached row whose JSON no longer decodes is deleted and refetched, and a
     * successful API response is written back to the cache.
     *
     * @param bool $searchInCache whether the local cache may answer the call
     * @return false|array<string,mixed> file metadata, or false when unavailable
     */
    public function getFileInfo(bool $searchInCache = true): false|array
    {
    }
    /**
     * List files with a v2 query filter built from the current object state.
     *
     * The filter always excludes trashed files and keeps only folders, video,
     * audio, and octet-stream entries; a title search also matches MD5,
     * HMAC-SHA256, and full-text forms, and then skips `orderBy`.
     *
     * @param string $parentId restrict to one parent folder, or empty for all
     * @param int $maxResult page size
     * @param string $orderBy sort field
     * @param string $orderDir sort direction, `asc` or `desc`
     * @return list<array<mixed, mixed>>
     */
    public function getFiles(string $parentId = '', int $maxResult = 10, string $orderBy = 'modifiedDate', string $orderDir = 'desc'): array
    {
    }
    /**
     * List up to 100 shared drives and store the next page token.
     *
     * @return list<array<mixed, mixed>>
     */
    public function getSharedDrives(): array
    {
    }
    /**
     * Rename the current file or folder.
     *
     * The v2 endpoint expects both `title` and `name`, so the same value is sent
     * twice.
     *
     * @param string $newFolderName new title
     * @return array<string,mixed>|false updated resource, or false on failure
     */
    public function renameFileFolder(string $newFolderName = ''): array|false
    {
    }
}

/**
 * Drive mirror lookup: existing record matching and cross-account search.
 *
 * @internal
 */
final class GDriveMirrorStore
{
    public function __construct(private \GDPlayer\External\GoogleDriveRestAPI $api)
    {
    }
    /**
     * Search other accounts for the same title and record the first hit as a new mirror.
     *
     * @return false|array<string,mixed> newly resolved file info, the existing mirror record,
     *                                    or false when nothing was mirrored before either
     */
    public function searchFileMirror(): false|array
    {
    }
}

/**
 * Drive file permission and deletion-status checks.
 *
 * @internal
 */
final class GDrivePermissionApi
{
    public function __construct(private \GDPlayer\External\GDriveClient $client)
    {
    }
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
 * Google Drive REST API client for file and permission management.
 *
 * Wraps the Drive v2/v3 endpoints used for mirroring, listing, copying and
 * sharing files across the configured Drive accounts.
 */
final class GoogleDriveRestAPI extends \GDPlayer\External\GDriveClient
{
    private \GDPlayer\External\GDriveFileApi $fileApi;
    private \GDPlayer\External\GDriveMirrorStore $mirrorStore;
    private \GDPlayer\External\GDrivePermissionApi $permissionApi;
    /**
     * Build the file, permission and mirror collaborators around this client.
     */
    public function __construct()
    {
    }
    /**
     * Copy `$this->fileID` into a folder, reusing a mirror that already exists.
     *
     * Only accounts flagged `bypass` may copy.
     *
     * @param string $parentId destination folder id
     * @return false|array<string,mixed> copy metadata, or false when no copy was made
     */
    public function copy(string $parentId = 'root'): false|array
    {
    }
    /**
     * Copy `$this->fileID` with the first enabled and bypassing Drive account that succeeds.
     *
     * @param string $parentId destination folder id
     * @return false|array<string,mixed> copy metadata, or false when every account failed
     */
    public function copyToAll(string $parentId = 'root'): false|array
    {
    }
    /**
     * Create a Drive folder, optionally inside the given parents.
     *
     * @param string $folderName new folder title
     * @param list<array<string,mixed>> $parents Parent references (`['id' => ...]`).
     * @return array<string,mixed>|false created folder, or false on failure
     */
    public function createNewFolder(string $folderName = '', array $parents = []): array|false
    {
    }
    /**
     * Build the title used to look for an existing mirror.
     *
     * A description that already looks like a mirror marker (`copy by`, `mirror`, `upload`...) falls back
     * to the file title, then to the original filename.
     *
     * @return string title to search with, possibly empty
     */
    public function createSearchTitle(): string
    {
    }
    /**
     * Fetch one file's metadata, optionally from the local hash cache first.
     *
     * @param bool $searchInCache whether the local cache may answer the call
     * @return false|array<string,mixed> file metadata, or false when unavailable
     */
    public function getFileInfo(bool $searchInCache = true): false|array
    {
    }
    /**
     * List files with a v2 query filter built from the current object state.
     *
     * @param string $parentId restrict to one parent folder, or empty for all
     * @param int $maxResult page size
     * @param string $orderBy sort field
     * @param string $orderDir sort direction, `asc` or `desc`
     * @return list<array<mixed, mixed>>
     */
    public function getFiles(string $parentId = '', int $maxResult = 10, string $orderBy = 'modifiedDate', string $orderDir = 'desc'): array
    {
    }
    /**
     * List up to 100 shared drives and store the next page token.
     *
     * @return list<array<mixed, mixed>>
     */
    public function getSharedDrives(): array
    {
    }
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
    /**
     * Rename the current file or folder.
     *
     * @param string $newFolderName new title
     * @return array<string,mixed>|false updated resource, or false on failure
     */
    public function renameFileFolder(string $newFolderName = ''): array|false
    {
    }
    /**
     * Search other accounts for the same title and record the first hit as a new mirror.
     *
     * @return false|array<string,mixed> newly resolved file info or false when unknown
     */
    public function searchFileMirror(): false|array
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
    private \GDPlayer\Config\Config $config;
    private string $driver = 'smtp';
    private string $email;
    private ?\PHPMailer\PHPMailer\PHPMailer $mail = null;
    private ?\GDPlayer\External\Mailgun $mailgun = null;
    private string $password;
    private ?\GDPlayer\External\Resend $resend = null;
    /**
     * Read the configured mail driver and instantiate the matching backend.
     */
    public function __construct()
    {
    }
    /**
     * Expose the application metadata instead of the credentials held by this object.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Send a message through the driver selected by the `mail_driver` setting.
     *
     * @param array<string,mixed> $messagePayload
     * @return int 1 when the message was accepted, 0 otherwise
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
    private const DEFAULT_API_URL = 'https://api.mailgun.net';
    private const DEFAULT_EU_API_URL = 'https://api.eu.mailgun.net';
    private string $apiKey;
    private \GDPlayer\Config\Config $config;
    private string $domain;
    private string $endpoint;
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
 * MaxMind geolocation/ASN lookup service.
 *
 * Resolves the client IP and enriches it with country, continent and ASN data.
 */
final class Maxmind
{
    /** Readers are opened once per process: reopening the mmdb on every lookup is expensive. */
    private static ?\GeoIp2\Database\Reader $asnReader = null;
    private static ?\GeoIp2\Database\Reader $countryReader = null;
    /**
     * @param null|Redis $redis optional Redis instance for shared state
     */
    public function __construct(private ?\Redis $redis = null, private \GDPlayer\External\MaxmindApi $api = new \GDPlayer\External\MaxmindApi())
    {
    }
    /**
     * Expose the application info instead of the internal readers in var_dump output.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Resolve ASN, country and continent for an IP, using the cache and the API fallbacks.
     *
     * @param string $ip
     * @return array<string,mixed>|null null when the IP is private/reserved or no source knows it
     */
    public function getASNInfo(string $ip = ''): ?array
    {
    }
    /**
     * Resolve the client IP address from the request or the proxy headers.
     *
     * @param ServerRequestInterface|null $request request to read, or null to fall back to the server vars
     * @return string Client IP address, defaulting to 127.0.0.1.
     */
    public function getIP(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
}

/**
 * Fallback IP info providers (api.ipinfo.io, stat.ripe.net) for the MaxMind service.
 *
 * Used only when the local GeoLite2 snapshot has nothing for the address.
 */
class MaxmindApi
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
     * @return Fetcher Fetcher preconfigured with the application User-Agent
     */
    protected function createFetcher(): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
    /**
     * Fetch and decode the RIPE stat whois payload.
     *
     * @param string $ip
     * @return array<string,mixed>
     */
    protected function fetchRipeStat(string $ip): array
    {
    }
    /**
     * @param string $ip
     * @return null|array<string,mixed>
     */
    public function getIPInfoAPI(string $ip = ''): ?array
    {
    }
    /**
     * @param string $ip
     * @return null|array<string,mixed>
     */
    public function getRipeStatIP(string $ip = ''): ?array
    {
    }
}

/**
 * Free/rotating proxy list manager with availability checking.
 */
final class Proxy
{
    private \GDPlayer\Config\Config $config;
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
    private const API_URL = 'https://api.resend.com/emails';
    private string $apiKey;
    private \GDPlayer\Config\Config $config;
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
 * Subscene subtitle scraper and downloader.
 *
 * Resolves a subtitle page to a downloadable archive and caches it locally.
 */
final class Subscene
{
    private string $baseUrl = 'https://sub-scene.com/';
    /** @var string[] $httpHeaders */
    private array $httpHeaders = [];
    private string $subsceneDir;
    private string $subsceneUrl;
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
     * Download the archive into the given file and extract its best subtitle entry.
     *
     * @param string $url archive URL to download
     * @param string $outputFile destination path of the archive
     * @param int $attempts number of attempts already spent on rotating proxies
     * @return string|false path of the saved subtitle, false on failure
     */
    protected function download(string $url, string $outputFile, int $attempts = 0): string|false
    {
    }
    /**
     * Extract the best subtitle entry from a zip archive and move it next to the archive.
     *
     * @param string $file path of the downloaded archive
     * @return string|false path of the saved subtitle, false when no entry was kept
     */
    protected function extractZipFile(string $file): string|false
    {
    }
    /**
     * @param ZipArchive $zip
     * @param string[] $allowedExtensions
     * @return array{filename: string, extension: string}|null
     */
    protected function findBestSubtitleEntry(\ZipArchive $zip, array $allowedExtensions): ?array
    {
    }
    /**
     * Read one archive member fully into memory using an unbuffered small-chunk stream.
     *
     * @param ZipArchive $zip open archive handle
     * @param string $filename member name inside the archive
     * @return string member contents, empty when the name is empty or the stream cannot be opened
     */
    protected function getContent(\ZipArchive $zip, string $filename): string
    {
    }
    /**
     * Validate the subtitle content and save it under a non-conflicting file name.
     *
     * @param string $file preferred destination path
     * @param string $content raw subtitle content
     * @return string|false path actually written, false when the content was rejected
     */
    protected function saveToFile(string $file, string $content): string|false
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

namespace GDPlayer\Helper;

/**
 * Base controller for the Ajax endpoints.
 *
 * Normalizes the request, resolves the caller/token and dispatches the
 * requested action, returning a JSON response.
 */
abstract class AjaxHelper implements \Psr\Http\Server\RequestHandlerInterface
{
    use \GDPlayer\Modules\AjaxBaseTrait;
    protected const MESSAGE_BAD_REQUEST = 'Bad request';
    protected const MESSAGE_UNAUTHORIZE = 'You are not authorized to access this feature';
    protected string $action = '';
    protected \GDPlayer\Config\BinFile $binConfig;
    protected \GDPlayer\Config\Config $config;
    /**
     * The logged-in user of the active request.
     *
     * Readonly: resolved once in the constructor by {@see AjaxBaseTrait::resolveCurrentUser()}
     * and never changed afterwards.
     *
     * @var null|array<string,string|int|float|null>
     */
    protected readonly ?array $currentUser;
    /**
     * The id of the logged-in user of the active request; 0 when anonymous.
     *
     * Readonly: derived from {@see $currentUser} once, in the constructor.
     */
    protected readonly int $currentUserId;
    /** @var array<string,mixed> $data */
    protected array $data;
    protected int $draw = 0;
    protected mixed $epeMelemek = false;
    /** @var array<string,UploadedFile|null> $files */
    protected array $files = [];
    protected bool $isAdmin = false;
    protected bool $isAdminShowUserData = false;
    protected bool $isUserShowTheirData = false;
    /** @var string[] $listColumns */
    protected array $listColumns;
    protected \GDPlayer\Core\Security\Security $security;
    protected string $token = '';
    /**
     * Resolve and call the protected action method named by the request.
     *
     * The method must be protected, declared below `AjaxHelper` and take no required
     * argument; anything else is reported as a bad request.
     *
     * @param object $class controller instance holding the action
     * @return string JSON response from the action
     */
    protected function loadAction(object $class): string
    {
    }
    /**
     * Handle the PSR-7 request and return a JSON response.
     *
     * @param ServerRequestInterface $request incoming request
     * @return ResponseInterface JSON response
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
    /**
     * Handle the request and return the JSON payload, dispatched from `list()`.
     *
     * @return string JSON response
     */
    abstract public function response(): string;
}

final class FileSystem
{
    /**
     * Write content to a file, creating its parent directory first.
     *
     * Writability is not pre-checked because PHP on Windows can report a
     * directory as read-only while `fopen()` still succeeds; the open call is
     * left to decide and its failure is logged.
     *
     * @param string $file target file path
     * @param string $content bytes to write
     * @param string $mode `fopen()` mode
     * @return int|false Bytes written, or false on failure
     */
    public static function createFile(string $file, string $content = '', string $mode = 'w'): int|false
    {
    }
    /**
     * Read a whole file in buffered chunks.
     *
     * A failed read is retried a few times before the loop gives up, so a
     * transient error cannot spin forever.
     *
     * @param string $file source file path
     * @param string $mode `fopen()` mode
     * @return string|false File contents, or false when unreadable
     */
    public static function getFileContent(string $file = '', string $mode = 'r'): string|false
    {
    }
    /**
     * Copy a file, or a directory tree, to the destination path.
     *
     * Existing directory entries are merged into; unreadable sources are skipped silently.
     *
     * @param string $source file or directory to copy
     * @param string $destination destination path
     * @return bool true on success, false when the source cannot be read
     */
    public static function hasCopiedDirectory(string $source, string $destination): bool
    {
    }
    /**
     * Create a directory tree, reporting success when it already exists.
     *
     * Failures are logged rather than thrown so callers can continue.
     *
     * @param string $dir directory path to create
     * @return bool
     */
    public static function hasCreatedDir(string $dir): bool
    {
    }
    /**
     * Create a symlink to the target, falling back to a copy.
     *
     * Falls back to a Windows junction, then to a recursive copy, when the OS refuses the link or the
     * process runs inside a container. An existing link or file at the destination is left untouched.
     *
     * @param string $target path the link should point at
     * @param string $link path of the link to create
     * @return bool true when a link or copy now exists at the destination
     */
    public static function hasCreatedSymlink(string $target, string $link): bool
    {
    }
    /**
     * Recursively delete a directory, or a single file, without following links.
     *
     * Refuses to delete the project base directory.
     *
     * @param string $dir path to remove
     * @return bool true when the path was removed, false when it was missing or protected
     */
    public static function hasDeletedDirectory(string $dir = ''): bool
    {
    }
    /**
     * Clear the per-feature directories under the temporary path.
     *
     * @return bool true when at least one directory was removed
     */
    public static function hasDeletedTemporaryDirs(): bool
    {
    }
    /**
     * Move a file into place without emitting warnings.
     *
     * Promotion is best-effort: Windows refuses the move with `Access is denied` when the
     * destination or the source is still open in another process (a reader streaming the
     * same cache file, or a `clear cache` running at the same time), so the warning is
     * swallowed by a temporary error handler rather than the @ operator.
     *
     * @param string $from source path
     * @param string $to   destination path
     * @return bool true when the file now sits at the destination
     */
    public static function hasRenamed(string $from, string $to): bool
    {
    }
    /**
     * Guess whether a file holds PHP by looking for an opening tag near the top.
     *
     * @param string $file file path to inspect
     * @return bool
     */
    public static function isPHPFile(string $file = ''): bool
    {
    }
    /**
     * Collapse repeated separators into the platform directory separator.
     *
     * @param string $path path to normalise
     * @return string
     */
    public static function normalizeSeparator(string $path = ''): string
    {
    }
}

final class GDrive
{
    /**
     * Reduce a Drive URL to the bare file or folder id.
     *
     * Unparseable input is returned unchanged; `id=` query values win over path shapes.
     *
     * @param string $url drive URL or an id that is already bare
     * @return string
     */
    public static function extractDriveId(string $url = ''): string
    {
    }
    /**
     * Pick one active Google account at random from the authorisation table.
     *
     * @return string email address, or '' when no active account exists
     */
    public static function getRandomActiveEmail(): string
    {
    }
}

final class Platform
{
    /**
     * Find a Chromium binary installed on the current host.
     *
     * @return null|string name or path of an available binary, or null when none is found
     */
    public static function findChromiumBinary(): ?string
    {
    }
    /**
     * Resolve the CLI PHP binary path of the running installation.
     *
     * @return string absolute binary path, or `php` when the constants are missing
     */
    public static function getPhpPath(): string
    {
    }
    /**
     * Resolve the PowerShell executable, preferring the absolute Windows paths.
     *
     * @return string absolute path when found, otherwise the bare command name
     */
    public static function getPowerShellPath(): string
    {
    }
    /**
     * Raise the open-file limit of the current process, once per process.
     *
     * @return void
     */
    public static function openResourcesHandler(): void
    {
    }
}

final class Request
{
    /**
     * Build a query string that keeps array indexes out of the keys.
     *
     * @param array<int|string, mixed> $data
     */
    public static function buildQueryNoIndex(array $data): string
    {
    }
    /**
     * Return the sanitised Accept-Language header of the visitor.
     *
     * @param ServerRequestInterface|null $request Request to read, current request when null
     * @return string Locale list or the application default
     */
    public static function getBrowserLanguage(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    /**
     * Return the sanitised User-Agent header of the visitor.
     *
     * @param ServerRequestInterface|null $request Request to read, current request when null
     * @return string User agent or the application default
     */
    public static function getBrowserUserAgent(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    /**
     * Read a header by its $_SERVER style name from either request source.
     *
     * @param ServerRequestInterface|null $request Request to read, server state when null
     * @param string $name Header name such as HTTP_X_TS
     * @return string Header value, empty when absent
     */
    public static function getHeaderLine(?\Psr\Http\Message\ServerRequestInterface $request, string $name): string
    {
    }
    /**
     * Split the requested path, minus the base path, into segments.
     *
     * @return list<string>
     */
    public static function getPageUris(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * Resolve the referer from the header, the parsed body or the server state.
     *
     * @param ServerRequestInterface|null $request Request to read, current request when null
     * @return string Referer URL, empty when absent
     */
    public static function getReferer(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    /**
     * Detect an Apple device from the visitor user agent.
     *
     * @param ServerRequestInterface|null $request Request to read, current request when null
     * @return bool True for macOS and iOS user agents
     */
    public static function isAppleProduct(?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
    /**
     * Detect whether the current request uses HTTPS.
     *
     * @param ServerRequestInterface|null $request
     * @return bool
     */
    public static function isSSL(?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
}

/**
 * Detects Smart TV user agents (brands and generic TV keywords).
 */
class SmartTVDetector
{
    /** @var string[] $genericTVKeywords */
    private array $genericTVKeywords = ['SmartTV', 'Smart-TV', 'TV', 'SMART_TV', 'HBBTV', 'HbbTV', 'CE-HTML', 'InettvBrowser', 'Opera TV', 'NETRANGEMMH', 'Web0S', 'Maple', 'Espial', 'MIDP'];
    /** @var array<string,list<string>> $tvBrands */
    private array $tvBrands = ['Samsung' => ['SMART-TV', 'SmartTV', 'Samsung TV', 'Tizen'], 'LG' => ['webOSTV', 'webOS', 'NetCast', 'LG Browser'], 'Sony' => ['SonyDTV', 'Sony TV', 'BRAVIA'], 'Panasonic' => ['Viera', 'VIERA'], 'Philips' => ['NETTV', 'NetTV'], 'Sharp' => ['AQUOS', 'aquos'], 'Toshiba' => ['Toshiba DTV', 'DTV'], 'Hisense' => ['Hisense', 'VIDAA'], 'TCL' => ['TCL', 'AFT'], 'Vizio' => ['VIZIO', 'SmartCast'], 'Roku' => ['Roku'], 'Apple TV' => ['AppleTV', 'tvOS'], 'Amazon Fire TV' => ['AFTB', 'AFTS', 'AFTM', 'AFTT', 'AFT'], 'Android TV' => ['Android TV', 'SHIELD Android TV', 'ATV', 'BRAVIA 4K'], 'Chromecast' => ['Chromecast', 'CrKey'], 'Xbox' => ['Xbox One', 'Xbox Series'], 'PlayStation' => ['PlayStation 4', 'PlayStation 5', 'PS4', 'PS5'], 'General' => ['smart tv', 'smart-tv', 'smarttv', 'smart_tv']];
    private string $userAgent = 'Bot';
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
    private const DEFAULT_MIME = 'application/octet-stream';
    /**
     * Drop sources whose resolution is disabled and mark the default one.
     *
     * @param array<array<string,mixed>> $sources
     * @return array<array<string,mixed>>
     */
    public static function filterSources(array $sources = []): array
    {
    }
    /**
     * Return the custom request headers matching the first rule that hits the URL.
     *
     * @param string $url
     * @return array<string,mixed>
     */
    public static function getCustomHeaders(string $url): array
    {
    }
    /**
     * Resolve the MIME type from the extension map, falling back to content sniffing.
     *
     * @param string $file local path or URL
     * @return string MIME type, octet-stream when it cannot be determined
     */
    public static function getMimeType(string $file = ''): string
    {
    }
    /**
     * Sniff the MIME type of a local file with finfo.
     *
     * @param string $file path to an existing local file
     * @return string detected MIME type, octet-stream when it cannot be detected
     */
    public static function getRealMimeType(string $file = ''): string
    {
    }
    /**
     * Retry a failed video source after a backoff and delete the stored source row.
     *
     * @param null|string $videoHost
     * @param null|string $videoId
     * @param int $maxRetries
     * @return bool
     */
    public static function hasVideoAttemptFailed(?string $videoHost, ?string $videoId, int $maxRetries = 5): bool
    {
    }
    /**
     * Return the hosts whose sources are cached per client IP.
     *
     * @return string[]
     */
    public static function rateLimitHosts(): array
    {
    }
    /**
     * Sort sources by ascending resolution, highest resolution last.
     *
     * @param array<array<string,mixed>> $sources
     * @return array<array<string,mixed>>
     */
    public static function reorderSources(array $sources = []): array
    {
    }
}

final class StringUtil
{
    /**
     * Extract the substring between two literal markers.
     *
     * @param string $string haystack to search
     * @param string $start marker that opens the slice
     * @param string $end closing marker; an empty value runs to the end of the string
     * @return string extracted slice, or an empty string when the opening marker is absent
     */
    public static function between(string $string, string $start, string $end): string
    {
    }
    /**
     * Trim scalars, drop non-scalar and empty values, then remove duplicates.
     *
     * @param array<int|string, mixed> $data
     * @return list<string>
     */
    public static function cleanArray(array $data): array
    {
    }
    /**
     * Hash a scalar or array payload with the strongest available algorithm.
     *
     * Arrays are JSON encoded first. The algorithm degrades from xxh128 to murmur3f to sha256 depending
     * on the extensions loaded, so digest length is not stable across hosts.
     *
     * @param mixed $data value to hash
     * @return string hex digest, or an empty string for empty or non-string input
     */
    public static function createHash(mixed $data): string
    {
    }
    /**
     * Build a slug that is not yet used by any video row.
     *
     * Queries the video table up to ten times with a random suffix, then falls back to a random hex
     * suffix. Each attempt issues a query.
     *
     * @param int $length length of the random part
     * @param string $slug preferred base slug; a random word is generated when empty
     * @return string unique slug
     */
    public static function createUniqueSlug(int $length = 5, string $slug = ''): string
    {
    }
    /**
     * Decode a JSON object or array, tolerating malformed input.
     *
     * @return array<int|string,mixed>|(string|int|float|mixed)[]
     */
    public static function decodeJson(mixed $input): array
    {
    }
    /**
     * Decode literal `\uXXXX` escape sequences into UTF-8 characters.
     *
     * @param string $string text containing the escapes
     * @return string text with the escapes replaced
     */
    public static function decodeUnicodeEscape(string $string): string
    {
    }
    /**
     * Format a duration as `HH:MM:SS`.
     *
     * @param int $seconds duration in seconds
     * @return string zero-padded time string
     */
    public static function durationToTimeFormat(int $seconds = 0): string
    {
    }
    /**
     * Convert a three or six digit hex colour into RGB components.
     *
     * @return array{red: int, green: int, blue: int}|string|false
     */
    public static function hexToRgb(?string $hexStr, bool $returnAsString = false, string $separator = ','): array|string|false
    {
    }
    /**
     * Strip characters that are unsafe in cache and file keys.
     *
     * Spaces become hyphens; anything outside letters, digits, dot, hyphen, underscore and tilde is dropped.
     *
     * @param string $key raw key
     * @return string sanitised key
     */
    public static function keyFilter(string $key): string
    {
    }
    /**
     * Generate a URL-safe random string.
     *
     * @param int $length number of characters to produce
     * @return string random string, empty when the length is not positive
     */
    public static function random(int $length = 5): string
    {
    }
    /**
     * Convert arbitrary text into a URL slug.
     *
     * Transliterates high ASCII characters through the bundled character map, collapses everything that
     * is not a letter or digit into the delimiter, then truncates the result to 240 characters.
     *
     * @param string $str source text
     * @param string $delimiter separator placed between words
     * @return string slug
     */
    public static function slugify(string $str = '', string $delimiter = '-'): string
    {
    }
}

final class Validation
{
    /**
     * Check a non-empty address against FILTER_VALIDATE_EMAIL.
     *
     * @param ?string $email address to check
     * @return bool true when the address is syntactically valid
     */
    public static function isEmail(?string $email = null): bool
    {
    }
    /**
     * Flag a URL whose host is a loopback alias, a private/reserved IP, or resolves to one.
     *
     * @param string $url URL to inspect; an empty or host-less value counts as private
     * @return bool true when the target must not be fetched server-side
     */
    public static function isPrivateUrl(string $url = ''): bool
    {
    }
    /**
     * Interpret loosely typed input as a boolean, treating 0, '', 'false' and null as false.
     *
     * @param mixed $data value coming from a request or database row
     * @return bool normalised boolean
     */
    public static function isTrue(mixed $data = null): bool
    {
    }
    /**
     * Reject URLs containing control characters or lacking a valid scheme and host.
     *
     * @param mixed $url candidate URL from a request
     * @return bool true when the URL passes FILTER_VALIDATE_URL after origin rebuild
     */
    public static function isUrl(mixed $url): bool
    {
    }
    /**
     * Strip characters that are not valid in an email address.
     *
     * @param ?string $email raw address, or null/empty for an empty result
     * @return string sanitised address, empty string when the filter rejects it
     */
    public static function sanitizeEmail(?string $email = null): string
    {
    }
    /**
     * Accept an IPv4/IPv6 literal that is not inside a private or reserved range.
     *
     * @param ?string $ip IP literal to check
     * @return string|false The input when valid, false when empty, malformed or private
     */
    public static function validateIp(?string $ip = null): string|false
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
    /** @var array<int, array<string,mixed>> $mp4Sources */
    protected array $mp4Sources = [];
    protected \GDPlayer\Helper\Core\CoreHelperOptions $options;
    protected string $referer = '';
    protected \GDPlayer\Helper\Core\CoreHelperServices $services;
    /** @var array<int, array<string,mixed>> $sources */
    protected array $sources = [];
    protected string $status = 'fail';
    protected string $title = '';
    /** @var array<int, mixed> $tracks */
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
     * Merge the cookies stored in the config with the ones already collected.
     *
     * @return string[]
     */
    protected function getCustomCookies(): array
    {
    }
    /**
     * Map a Google itag or quality code to its human readable label.
     *
     * @param string $itag itag value or quality code
     * @return string Quality label such as 720p, or the input when unknown
     */
    protected function googleLabel(string $itag = ''): string
    {
    }
    /**
     * Strip the host branding words out of a page title.
     *
     * @param string $title Raw title
     * @return string Cleaned title
     */
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
     * Return the extracted sources, falling back to the MP4 list for downloads.
     *
     * @return array<int, array<string,mixed>>
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
     * Return the extracted subtitle and audio tracks.
     *
     * @return array<int, mixed>
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

namespace GDPlayer\Helper\Misc;

/**
 * Miscellaneous helpers: cURL defaults, cache paths, content types and parsers.
 */
class MiscHelper
{
    private const HTTP = 'http://';
    private const HTTPS = 'https://';
    /** Last outbound interface address, read by `MiscHelper::getNetworkInterface()`. */
    protected static string $curlInterface = '';
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
     * List the trusted proxies that are exempt from the rate limit.
     *
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
     * Decrypt the request payload, accepting both the current and the legacy encoding.
     *
     * @param null|string $data
     * @return array<int|string,array<mixed>|string>
     */
    public static function decryptData(?string $data): array
    {
    }
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
     * Apply the shared cURL defaults to a handle.
     *
     * @param CurlHandle $ch             cURL handle
     * @param int         $timeout        request timeout in seconds
     * @param bool        $returnTransfer whether to return the transfer as a string
     * @return CurlHandle configured handle
     */
    public static function getCurlDefaultConfig(\CurlHandle $ch, int $timeout = 60, bool $returnTransfer = true): \CurlHandle
    {
    }
    /**
     * Return the process-wide share handle, creating it on first use.
     *
     * @return CurlShareHandle shared handle holding the DNS, TLS session and connection caches
     */
    public static function getCurlShareHandle(): \CurlShareHandle
    {
    }
    /**
     * Extract the host, with a non-default port, from a URL.
     *
     * @param string $url URL to inspect
     * @param bool $origin True to return the full origin with the scheme
     * @return string Host or origin, empty when the URL has no host
     */
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
     * Replace the URL host with the address produced by the system resolver.
     *
     * `Fetcher` pins `CURLOPT_DNS_SERVERS` (DNS_SERVERS in .env), so the container
     * service names (e.g. `nginx`) are never resolved by cURL. The system resolver
     * still knows their address, so the host is swapped for the IP before the request.
     */
    public static function resolveHostToIp(string $url = ''): string
    {
    }
    /**
     * Resolve a Location header value against the URL of the current hop.
     *
     * Shared by the PHP cURL transport and the cURL CLI fallback so both follow
     * redirects to the same absolute target.
     *
     * @param string $base   URL of the hop being processed
     * @param string $target Location header value
     * @return string absolute redirect target URL
     */
    public static function resolveRedirectUrl(string $base, string $target): string
    {
    }
    /**
     * Inject the runtime's curl share handle (worker owns its lifetime).
     */
    public static function setCurlShareHandle(?\CurlShareHandle $handle): void
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

namespace GDPlayer\Helper\Security;

/**
 * Browser, country, proxy/VPN and title blacklist rules.
 *
 * Extracted from `SecurityHelper` (rule php:S2042: at most 150 lines per class).
 * The public API stays on `SecurityHelper` through delegation.
 */
final class ClientRuleChecker
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
 * Extracted from `SecurityHelper` (rule php:S2042: at most 150 lines per class).
 * The public API stays on `SecurityHelper` through delegation.
 */
final class DomainRuleChecker
{
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
    /**
     * Line separator for the configuration lists.
     *
     * @return string Regex pattern that splits the lines
     */
    public static function lineSplitPattern(): string
    {
    }
}

/**
 * IPv4/IPv6 range checks used by the blacklist rules.
 *
 * Extracted from `SecurityHelper` (rule php:S2042: at most 150 lines per class).
 * The public API stays on `SecurityHelper`; this class only owns the math and cache.
 */
final class IpRangeChecker
{
    /**
     * Check whether an IPv4 address matches a single-IP or CIDR range, caching the result.
     *
     * @param string $ip IPv4 address to test
     * @param string $range single IPv4 address or CIDR block
     * @return bool true when the address falls inside the range
     */
    public static function isIPv4InRange(string $ip, string $range): bool
    {
    }
    /**
     * Check whether an IPv6 address matches a single-IP or CIDR range by comparing the prefix bits.
     *
     * @param string $ip IPv6 address to test
     * @param string $range single IPv6 address or CIDR block
     * @return bool true when the address falls inside the range
     */
    public static function isIPv6InRange(string $ip, string $range): bool
    {
    }
}

/**
 * Blacklist/whitelist checks used to guard requests (domains, countries, referers, titles).
 */
class SecurityHelper
{
    /**
     * @return array<string, string>
     */
    public static function getHmacInput(\GDPlayer\Core\Security\Security $security, ?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
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
     * Accept the CORS token when the caller IP, its ASN, or an admin signature matches.
     *
     * @param ?string $token encrypted client token
     * @param ?ServerRequestInterface $request current request, used for the admin check
     * @return bool true when validation is disabled, bypassed by p2p, or the token matches
     */
    public static function isCorsTokenValid(?string $token = null, ?\Psr\Http\Message\ServerRequestInterface $request = null): bool
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
     * Determine whether the visitor is behind a blacklisted proxy/VPN.
     *
     * @return bool true when blacklisted
     */
    public static function isProxyVPNBlacklisted(): bool
    {
    }
    /**
     * Verify a reCAPTCHA answer against Google's siteverify endpoint.
     *
     * @param ?string $captcha answer submitted by the client
     * @return bool true when no secret key is configured or Google accepts the answer
     */
    public static function isRecaptchaValid(?string $captcha = null): bool
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
    /**
     * Determine whether a video title matches the DMCA/title blacklist.
     *
     * @param string $title video title to check
     * @return bool true when blacklisted
     */
    public static function isTitleBlacklisted(string $title = ''): bool
    {
    }
    /**
     * Decrypt a legacy `data::iv` payload built by the old cipher.
     *
     * @param ?string $data raw URL-encoded `data::iv` string
     * @return string decrypted plaintext, or '' when decoding fails
     */
    public static function legacyDecode(?string $data = null): string
    {
    }
    /**
     * Escape a string for HTML output using UTF-8 and quoted entities.
     *
     * @param ?string $text text to escape; null is treated as an empty string
     * @return string escaped text safe to echo into HTML
     */
    public static function sanitizeHtml(?string $text = null): string
    {
    }
    /**
     * Validate a URL and percent-encode the characters browsers reject.
     *
     * @param mixed $url candidate URL
     * @return string sanitised URL, or '' when the input is not a valid URL
     */
    public static function sanitizeUrl(mixed $url): string
    {
    }
    /**
     * Convert a mixed value to a string without triggering "Array to string conversion".
     */
    public static function text(mixed $value, string $default = ''): string
    {
    }
    /**
     * Return the value as a float when it is numeric, otherwise the fallback.
     *
     * @param mixed $value raw value
     * @param float $default value returned for non-numeric input
     * @return float
     */
    public static function toFloat(mixed $value, float $default = 0.0): float
    {
    }
    /**
     * Return the value as an int when it is numeric, otherwise the fallback.
     *
     * @param mixed $value raw value
     * @param int $default value returned for non-numeric input
     * @return int
     */
    public static function toInt(mixed $value, int $default = 0): int
    {
    }
    /**
     * @return list<string>
     */
    public static function toStringList(mixed $value): array
    {
    }
}

namespace GDPlayer\Helper\Stream;

final class StreamConfig
{
    /**
     * List hosts that stream directly instead of being proxied.
     *
     * Hosts removed from the bypass list are the direct ones, so the result is
     * every known host minus the bypassed set.
     *
     * @return list<string>
     */
    public static function getDirectHosts(): array
    {
    }
    /**
     * Read the configured proxy list, one entry per line.
     *
     * @return list<string>
     */
    public static function getProxyList(): array
    {
    }
    /**
     * Pick the least loaded load balancer link for this client.
     *
     * Candidates whose `disallow_hosts` or `disallow_continent` match the client
     * are filtered out, ordering is by connections or playbacks according to
     * config, and BASE_URL is the fallback when nothing qualifies.
     *
     * @param string $host host being requested, matched against the deny list
     * @param string $excludeUrl link to skip, usually the current one
     * @return string balancer link, or BASE_URL
     */
    public static function getRandomLoadBalancerUrl(string $host = '', string $excludeUrl = ''): string
    {
    }
    /**
     * Return one random proxy from the pool, or null when proxying is off.
     *
     * @return array<string, mixed>|null parsed proxy parts, or null when unavailable
     */
    public static function getRandomProxy(): ?array
    {
    }
    /**
     * Find the load balancer row matching the current BASE_URL.
     *
     * @return array<string, mixed>|false row data, or false when this host is not one
     */
    public static function isCurrentHostLoadBalancer(): false|array
    {
    }
    /**
     * Report whether this request should be served Google's HLS variant.
     *
     * Only Google Drive and Google Photos have the variant, it must be enabled
     * per host in config, and downloads never use it.
     *
     * @param string $vHost resolved video host
     * @param bool $dl true for a download request
     * @return bool
     */
    public static function isGoogleHls(string $vHost = '', bool $dl = false): bool
    {
    }
    /**
     * Report whether the host is listed in `host-list.json`.
     *
     * Any host that is not in the list is rejected, so a forged or malformed
     * value can never reach a path built from it.
     *
     * @param string $vHost resolved video host
     * @return bool
     */
    public static function isKnownHost(string $vHost = ''): bool
    {
    }
    /**
     * Report whether the `enable_proxy` setting lets outbound paths use the proxy pool.
     *
     * Shared by every outbound path (HTTP fetch and yt-dlp) so one switch controls all.
     * A missing key reads as false, so the proxy stays off until it is enabled.
     *
     * @return bool
     */
    public static function isProxyEnabled(): bool
    {
    }
}

/**
 * Pure policy for the stream upstream guard.
 *
 * Every decision is a function of the upstream response, never of shared mutable state:
 * the caller persists the result. State is deliberately kept out so the policy is unit
 * testable and the same score applies to MP4, HLS and MPD.
 */
final class StreamGuard
{
    /** First cooldown, doubled per strike. */
    private const COOLDOWN_BASE = 5;
    /** Upper bound for any single cooldown, keeping a stuck file recoverable. */
    private const COOLDOWN_MAX = 120;
    /** Distinct media ids that must be throttled before a host is reported as suspicious. */
    private const HOST_CORRELATE_MIN = 3;
    /** Window in seconds used for that correlation. */
    private const HOST_WINDOW = 60;
    /** Kept entries in the correlation ledger. */
    private const LEDGER_MAX = 20;
    /** cURL errors typical of a proxy dropping the connection (empty reply, RST, TLS). */
    private const TRANSPORT_ERRNOS = [35, 52, 56];
    /** Window in which one client request chain may only add one strike. */
    public const DEDUPE_TTL = 5;
    /** TTL of the strike memory, longer than any cooldown so the backoff keeps growing. */
    public const STATE_TTL = 300;
    /** Score at which a response counts as throttling. */
    public const THRESHOLD = 3;
    /**
     * Cooldown for the next attempt of one media id.
     *
     * @param int $strikes consecutive throttle observations for that id
     * @param string $retryAfter raw `Retry-After` value, empty when absent
     * @return int seconds, at least 1
     */
    public static function cooldown(int $strikes, string $retryAfter = ''): int
    {
    }
    /**
     * Report whether distinct media ids were throttled across the window: only then may the
     * host be reported suspicious. One throttled file among healthy ones never qualifies.
     *
     * @param array<string,int> $ledger media id => observation timestamp
     * @param int $now current unix timestamp
     * @return bool true when the host itself looks throttled
     */
    public static function isHostThrottled(array $ledger, int $now): bool
    {
    }
    /**
     * Report whether one upstream header is worth keeping for the throttle score.
     *
     * @param string $name lowercase header name
     * @return bool true for the known throttle carriers
     */
    public static function isRelevantHeader(string $name): bool
    {
    }
    /**
     * Report whether the response is throttling rather than a genuine missing file.
     *
     * @param int $status upstream HTTP status
     * @param array<string,string> $headers lowercase response headers
     * @param int $errno cURL error number
     * @return bool true when the response must count as throttling
     */
    public static function isThrottle(int $status, array $headers, int $errno = 0): bool
    {
    }
    /**
     * Drop stale ledger entries and cap the ledger size.
     *
     * @param array<string,int> $ledger media id => observation timestamp
     * @param int $now current unix timestamp
     * @return array<string,int> fresh entries only
     */
    public static function pruneLedger(array $ledger, int $now): array
    {
    }
    /**
     * Weight the response against known throttle carriers, including responses with no
     * rate-limit header at all (Cloudflare and reverse proxies usually omit them).
     *
     * @param int $status upstream HTTP status
     * @param array<string,string> $headers lowercase response headers
     * @param int $errno cURL error number
     * @return int score, 0 when the response carries no throttle signal
     */
    public static function score(int $status, array $headers, int $errno = 0): int
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
    protected string $baseURL = 'https://www.amazon.com';
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
     * Resolve the Blogger target URL and extract its sources right away.
     *
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
     * Extract the stream as soon as a media id is supplied.
     *
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
 * Video source extractor for DaddyHD.
 */
final class Daddyhd extends \GDPlayer\Core\Extractor\Extractor
{
    public const BASE_URL_MAIN = 'https://dlive.sx/';
    private string $defaultPlayerUrl = 'https://hamis.romponalis.st/premiumtv/daddy.php?id=%s';
    private string $streamPageUrl = 'https://dlive.sx/stream/stream-%s.php';
    private string $vertexApiUrl = 'https://vertex.st/api/player.php?id=%s';
    private string $vertexRefererUrl = 'https://vertex.st/';
    private string $watchRefererUrl = 'https://dlive.sx/watch.php?id=%s';
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
    protected string $baseURL = 'https://www.dailymotion.com/';
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
    private string $label = 'Original';
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
    /** Endpoint path that returns the video base URL. */
    private const PASS_MD5_PATH = 'pass_md5/';
    protected string $baseURL = 'https://playmogo.com/';
    /**
     * Bind the media identifier and extract the sources straight away.
     *
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
    protected string $baseURL = 'https://www.dropbox.com/';
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
    protected string $baseURL = 'https://dzen.ru/';
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
    protected string $baseURL = 'https://www.facebook.com/';
    /**
     * Resolve the Facebook URL, try yt-dlp first and fall back to the Chrome parser.
     *
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
    private string $error = '';
    protected string $baseURL = 'https://filemoon.to/';
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
     * Extract the player configuration from the packed page source.
     *
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
    private ?string $apiKey = null;
    private string $apiURL = 'https://docs.google.com/u/0/get_video_info?docid=%s';
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Model\GDriveQueue $gdQueue;
    protected string $referer = 'https://youtube.googleapis.com/';
    /**
     * Apply the Google Drive HLS overrides, then initialise the API clients when an id is given.
     *
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
    protected string $baseURL = 'https://hxfile.co/';
    protected bool $usingProxy = true;
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
    protected string $baseURL = 'https://www.mediafire.com/';
    protected string $url = '';
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
    protected string $baseURL = 'https://mixdrop.ag/';
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
    protected string $baseURL = 'https://www.mp4upload.com/';
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
     * Resolve the effective URL of the media identifier and its cookies.
     *
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
    protected string $referer = 'https://rdcplayer.online/';
}

/**
 * Video source extractor for OK.ru (https://ok.ru/).
 */
final class Okru extends \GDPlayer\Core\Extractor\Extractor
{
    protected string $baseURL = 'https://ok.ru/';
    /**
     * Parse the supplied sources, or fetch and parse the embed page when there are none.
     *
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
    /**
     * Register the video tracks, labelling each one by its language.
     *
     * @param list<array{language?: string, url?: string}> $tracks
     */
    protected function okruParseTracks(array $tracks = []): void
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
    protected string $baseURL = 'https://pixeldrain.com/api/file/';
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
    protected string $baseURL = 'https://sdnsty.store/';
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
    private ?string $videoId = null;
    protected string $baseURL = 'https://rumble.com/';
    /**
     * Resolve the Rumble video id, then fetch and parse the embed payload.
     *
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
    protected string $baseURL = 'https://video.sibnet.ru/';
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
    private string $clientId = '';
    protected string $referer = 'https://w.soundcloud.com/';
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
    /** @var string[] $baseDomains */
    private array $baseDomains = [];
    protected string $baseURL = 'https://audinifer.com/';
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
    private string $videoURL = '';
    protected string $baseURL = 'https://tapeadvertisement.com/';
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
    protected string $baseURL = 'https://uqload.vc/';
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
    protected string $baseURL = 'https://vidmoly.org/';
    /**
     * Build the embed URL for the given media id and pre-parse its tracks.
     *
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
    protected string $baseURL = 'https://videzz.net/';
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
    protected string $baseURL = 'https://vidtube.one/';
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
    protected string $baseURL = 'https://vimeo.com/';
}

/**
 * Video source extractor for VK (https://vk.com/).
 */
final class Vk extends \GDPlayer\Core\Extractor\Extractor
{
    protected string $baseURL = 'https://vk.com/';
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
    protected string $baseURL = 'https://voe.sx/';
    /**
     * Resolve the media URL and extract the sources and caption tracks with the headless browser.
     *
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
    protected string $baseURL = 'https://vtube.network/';
}

/**
 * Video source extractor for Wetransfer.
 */
final class Wetransfer extends \GDPlayer\Core\Extractor\Extractor
{
    private const BRPATH = 'board/';
    private const COLLECT_URL = 'https://collect.wetransfer.com/';
    private const DLPATH = 'downloads/';
    private const NORMAL_URL = 'https://wetransfer.com/';
    private const PORTAL_URL = 'https://portals.wetransfer.com/';
    private const PTPATH = 'reviews/';
    private const SHORT_URL = 'https://we.tl/';
    private bool $isCollect = false;
    private bool $isPortals = false;
    /**
     * Pick the Wetransfer URL layout from the id and start the source extraction.
     *
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
    protected string $baseURL = 'https://disk.yandex.com/';
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
    protected string $baseURL = 'https://www.yourupload.com/';
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}

/**
 * Video source extractor for YouTube (https://www.youtube.com/).
 */
final class Youtube extends \GDPlayer\Core\Extractor\Extractor
{
    protected string $baseURL = 'https://www.youtube.com/';
    /** @var string[] $headers */
    protected array $headers = [];
    protected string $referer = 'https://youtube.googleapis.com/';
    protected string $thirdPartyAPIUrl = 'https://yt1s.com/';
    /**
     * @param string $id host-specific media identifier
     */
    public function __construct(string $id = '')
    {
    }
}

/**
 * Video source extractor for yt-dlp.
 */
class Ytdlp extends \GDPlayer\Helper\Core\CoreHelper
{
    private string $logDir = '';
    private string $logFile = '';
    private string $ytdlpApp = '';
    private bool $ytdlpDisableProxy = false;
    private string $ytdlpError = '';
    private string $ytdlpProxy = '';
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
     * Turn one stored proxy entry (ip:port,user:pass,type) into a yt-dlp proxy URL.
     *
     * @param string $proxy comma separated proxy entry
     * @return string proxy URL, always ending with a slash
     */
    protected static function formatProxy(string $proxy): string
    {
    }
    /**
     * Collect the always-on options: cookie header plus the caller supplied flags.
     *
     * @return list<string>
     */
    protected function prepareBaseOptions(): array
    {
    }
    /**
     * Build the proxy list to rotate through, the preferred proxy first, then a direct attempt.
     *
     * Proxying is skipped entirely when the caller turns it off or the `enable_proxy`
     * setting is not enabled. The empty entry at the end means "no --proxy", so a dead
     * proxy pool falls back to a direct connection instead of failing the extraction.
     *
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
    /**
     * @return list<array<string,mixed>>
     */
    public function getSources(): array
    {
    }
}

/**
 * Parse yt-dlp JSON into sources and subtitle tracks.
 *
 * Extracted from `Ytdlp` (rule php:S2042: at most 150 lines per class). The parser only
 * reads its constructor inputs and returns plain arrays, so `Ytdlp` keeps owning the state.
 */
final class YtdlpFormatParser
{
    public function __construct(private \GDPlayer\Helper\Core\CoreHelperOptions $options)
    {
    }
    /**
     * Parse one yt-dlp `--dump-json` payload.
     *
     * @param array<string,mixed> $ytdlpData decoded yt-dlp metadata
     * @return array{title: string, image: string, sources: list<array<string,mixed>>,
     *     tracks: list<array<string,mixed>>, ok: bool} parsed payload and the `ok` flag
     */
    public function parse(array $ytdlpData): array
    {
    }
}

namespace GDPlayer\Http;

/**
 * Access `Swoole\Coroutine::getContext()` without depending on the Swoole extension.
 *
 * The Swoole class is checked as a string so the core still runs under SAPI/RoadRunner,
 * which lack that extension. Outside a coroutine the result is null, so callers fall back
 * to plain static storage (one request per process).
 */
final class CoroutineStore
{
    private const COROUTINE_CLASS = 'Swoole\Coroutine';
    /**
     * @return ArrayAccess<string, mixed>|null active coroutine context; null outside a coroutine
     */
    public static function get(): ?\ArrayAccess
    {
    }
}

/**
 * PSR-17/PSR-7 factory for creating server requests and responses.
 */
class HttpFactory
{
    private static ?\Nyholm\Psr7\Factory\Psr17Factory $psr17Factory = null;
    /**
     * Create a server request from the PHP superglobals.
     *
     * @return ServerRequestInterface PSR-7 server request
     */
    public static function createRequestFromGlobals(): \Psr\Http\Message\ServerRequestInterface
    {
    }
    /**
     * Create a PSR-7 response with the given status.
     *
     * @param int    $code         HTTP status code
     * @param string $reasonPhrase optional reason phrase
     * @return ResponseInterface PSR-7 response
     */
    public static function createResponse(int $code = 200, string $reasonPhrase = ''): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Build a PSR-7 body stream from a string.
     *
     * @param string $content body content
     * @return StreamInterface
     */
    public static function createStream(string $content = ''): \Psr\Http\Message\StreamInterface
    {
    }
    /**
     * Return the shared PSR-17 factory instance.
     *
     * @return Psr17Factory PSR-17 factory
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
     * @param ResponseInterface $response response that must be sent to the client
     * @param Throwable|null $previous originating exception, if any
     */
    public function __construct(private readonly \Psr\Http\Message\ResponseInterface $response, ?\Throwable $previous = null)
    {
    }
    /**
     * @return ResponseInterface the response carried by the exception
     */
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
    }
}

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
     * Return the parsed form/post body of the active request.
     *
     * @return array<string, mixed> active request body (form/POST); empty outside a request cycle
     */
    public static function body(): array
    {
    }
    /**
     * Return the cookie parameters of the active request.
     *
     * @return array<string, mixed> active request cookies (empty outside a request cycle)
     */
    public static function cookies(): array
    {
    }
    /**
     * Return the request of the current cycle.
     *
     * @return ServerRequestInterface|null active request, or null outside a request cycle
     */
    public static function getRequest(): ?\Psr\Http\Message\ServerRequestInterface
    {
    }
    /**
     * Return the response being built for the current cycle.
     *
     * @return ResponseInterface|null active response, or null outside a request cycle
     */
    public static function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Return the query string parameters of the active request.
     *
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
    /**
     * Bind the request/response pair of the current cycle.
     *
     * @param ServerRequestInterface $request incoming request
     * @param ResponseInterface $response response being built for it
     */
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

namespace GDPlayer\Http\Emitter;

/**
 * Emitter for SAPI (PHP-FPM, Apache, CLI server): headers + echo.
 *
 * The only class in `src/` allowed to call `header()` and `echo` for the response body.
 */
final class SapiEmitter
{
    /**
     * @param ResponseInterface $response response being sent
     * @return void
     */
    public function emit(\Psr\Http\Message\ResponseInterface $response): void
    {
    }
}

namespace GDPlayer\Http\Fetcher;

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
    /**
     * Return the raw response body.
     *
     * @return string decoded (or binary) response body
     */
    public function body(): string
    {
    }
    /**
     * Content length per the server (CURLINFO_CONTENT_LENGTH_DOWNLOAD), 0 when not reported.
     */
    public function contentLength(): int
    {
    }
    /**
     * Return the total transfer time.
     *
     * @return float elapsed time in milliseconds
     */
    public function durationMs(): float
    {
    }
    /**
     * Return the final URL after redirects (CURLINFO_EFFECTIVE_URL).
     *
     * @return string URL that actually served the response
     */
    public function effectiveUrl(): string
    {
    }
    /**
     * Return the cURL error message, empty when the transfer succeeded.
     *
     * @return string error text or an empty string
     */
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
    /**
     * Report whether the transfer produced an error.
     *
     * @return bool true when an error message was recorded
     */
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
     * Return every response header, keyed by lowercase name.
     *
     * @return array<string, string>
     */
    public function headers(): array
    {
    }
    /**
     * Report whether the status code is 2xx.
     *
     * @return bool true for 200-299
     */
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
    /**
     * Return the HTTP status code, 0 when no response was received.
     *
     * @return int status code
     */
    public function status(): int
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
    use \GDPlayer\Http\Fetcher\FetcherTransportTrait;
    /**
     * @param int $timeout      time budget for one attempt (seconds)
     * @param int $retries      retries after the first attempt (0 = never)
     * @param int $retryDelayMs delay between retries (milliseconds)
     */
    public function __construct(protected int $timeout = 30, private int $retries = 0, private int $retryDelayMs = 250, protected int $connectTimeout = 0)
    {
    }
    /**
     * Keep the headers of the last hop: the previous redirect block is dropped as soon as a new
     * status line appears, so what is read is the final response.
     *
     * @param array<string, string> $collected
     */
    protected function collectHeader(string $line, array &$collected): int
    {
    }
    /**
     * Accepts a map (`['Name' => 'value']`) as well as the legacy list style (`['Name: value']`);
     * the list is forwarded as-is so legacy callers keep their shape.
     *
     * @param array<int|string, string> $headers
     *
     * @return list<string>
     */
    protected function formatHeaders(array $headers): array
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
     * @return null|CurlHandle null when the handle cannot be created
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
    /** The wave was aborted from inside `onTick`; unfinished transfers are not awaited. */
    private bool $aborted = false;
    /**
     * @var array<int|string, array<string, string>> collected headers per key
     *      (filled by the Fetcher header collector)
     */
    private array $collected = [];
    /** @var array<int|string, string> handle creation failure messages, per key */
    private array $failures = [];
    /** @var array<int|string, array{handle: CurlHandle, fetcher: Fetcher, url: string, started: float}> */
    private array $items = [];
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
 * Request options (fluent with*()/on*()) plus the cURL transport configuration.
 *
 * Merge of the former `OptionsTrait`, `ApplyTrait` and `TransportTrait` (Batch F in
 * `docs/plan/PLAN-REDUCE-TRAITS.md`): the fluent API keeps `Fetcher` above 20 methods, so one
 * trait carries both halves instead of three. Behaviour is unchanged; the API stays on `Fetcher`.
 *
 * @method list<string> formatHeaders(array<int|string, string> $headers)
 * @method int collectHeader(string $line, array<string, string> $collected)
 * @property int $timeout declared by the consuming class (constructor)
 * @property int $connectTimeout declared by the consuming class (constructor)
 */
trait FetcherTransportTrait
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
    /** Abort when the transfer drops below N bytes/second for M seconds (0 = disabled). */
    private int $lowSpeedLimit = 0;
    private int $lowSpeedTime = 0;
    private int $maxRedirects = 20;
    /** @var non-empty-string */
    private string $method = 'GET';
    /** @var null|callable(CurlHandle, string): int */
    private $onHeader;
    /** @var callable|null */
    private $onProgress;
    /** @var callable|null */
    private $onWrite;
    /** @var array{proxy: string, type: int, usrpwd: string}|null */
    private ?array $proxy = null;
    /** @var string[] `host:port:ip` pairs for CURLOPT_RESOLVE */
    private array $resolve = [];
    /** @var resource|null CURLOPT_STDERR target when verbose is enabled */
    private $verboseStream;
    /**
     * Non-GET method from withMethod(); 'GET' means keep the cURL default.
     *
     * @param array<string, mixed> $request
     */
    protected function applyMethod(\CurlHandle $handle, array $request): void
    {
    }
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
     * Apply every option of the request to the handle and install the header collector.
     *
     * @param CurlHandle            $handle handle to configure
     * @param non-empty-string      $url
     * @param array<int|string, string> $headers
     * @param bool                  $headOnly send a HEAD request without a body
     * @param array<string, mixed>  $request body, basicAuth, stream (see method body)
     * @param array<string, string> $collected filled by the header callback below
     */
    protected function configure(\CurlHandle $handle, string $url, array $headers, bool $headOnly, array $request, array &$collected): void
    {
    }
    /**
     * Copy with an extra caller-owned header collector (cookies, Location, etc.).
     *
     * @param null|callable(CurlHandle, string): int $callback
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
    /**
     * Copy that records the chunk size used by the streaming write callback.
     * Set the per-read buffer size on this instance (mutates, no copy).
     *
     * @param int $bytes Chunk size in bytes
     * @return self Cloned instance
     */
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
    /**
     * Copy that follows (default) or does not follow redirects.
     * Callers that must read `Location` themselves (e.g. Mediafire) pass false.
     *
     * @param bool $follow Whether cURL follows redirects
     * @return self Cloned instance
     */
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
     * Pin `host:port` to a specific IP (CURLOPT_RESOLVE) — bypasses DNS without changing the URL.
     *
     * @param string[] $entries `host:port:ip` pairs
     */
    public function withResolve(array $entries): self
    {
    }
    /**
     * Copy that streams cURL verbose output into the given resource.
     * The caller opens and closes the stream itself.
     *
     * @param mixed $stream Writable stream resource, ignored when not a resource
     * @return self Cloned instance
     */
    public function withVerbose(mixed $stream): self
    {
    }
}

namespace GDPlayer\Http\Request;

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
    private const STORE_KEY = 'gdplayer.request';
    private static ?\Psr\Http\Message\ServerRequestInterface $request = null;
    private static ?\Psr\Http\Message\ResponseInterface $response = null;
    /**
     * Current PSR-7 request for this execution.
     *
     * @return ServerRequestInterface|null request instance, or null when none is bound
     */
    public static function getRequest(): ?\Psr\Http\Message\ServerRequestInterface
    {
    }
    /**
     * Current PSR-7 response for this execution.
     *
     * @return ResponseInterface|null response instance, or null when none is bound
     */
    public static function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Release the execution context (required at the end of every request in a long-running worker).
     */
    public static function reset(): void
    {
    }
    /**
     * Bind both the request and the response for the current execution.
     *
     * @param ServerRequestInterface $request incoming request
     * @param ResponseInterface $response outgoing response
     */
    public static function set(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): void
    {
    }
    /**
     * Bind or clear only the request, leaving any stored response untouched.
     *
     * @param ServerRequestInterface|null $request request to store, or null to clear it
     */
    public static function setRequest(?\Psr\Http\Message\ServerRequestInterface $request): void
    {
    }
    /**
     * Replace the stored response for the current execution.
     *
     * @param ResponseInterface $response outgoing response
     */
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
 */
class ResponseEmitter
{
    /** First half of the header list exposed to the browser. */
    private const EXPOSE_HEADERS_HEAD = 'Authorization, Content-Disposition, Content-Encoding, ';
    /** Media size headers exposed for players that read them. */
    private const EXPOSE_HEADERS_MEDIA = 'X-Content-Length, X-File-Size, X-Total-Length';
    /** Second half of the header list exposed to the browser. */
    private const EXPOSE_HEADERS_TAIL = 'Content-Range, ETag, Vary, Location, ';
    /** Access-Control-Expose-Headers value for the PHP path. */
    public const EXPOSE_HEADERS = self::EXPOSE_HEADERS_HEAD . self::EXPOSE_HEADERS_TAIL . self::EXPOSE_HEADERS_MEDIA;
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
     * Guarantee CORS headers on a response built outside {@see createHeaders()}.
     *
     * Single choke point for the kernel: every core response passes through here, so a handler
     * (or error page) that forgot CORS can no longer produce a browser-blocking reply.
     *
     * @param ResponseInterface $response response to complete
     * @return ResponseInterface response with CORS headers when they are missing
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
     * @param ResponseInterface $response base response
     * @param bool $enableCache true for responses that may be cached
     * @param int $cacheMaxAge max-age when caching is enabled
     * @return ResponseInterface response with default headers
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
     * Tell the browser to delete a cookie (Set-Cookie with an expires in the past).
     *
     * @param ResponseInterface $response base response
     * @param string $name cookie name
     * @param array<string, bool|int|string> $options cookie options (path/domain must match the set call)
     * @return ResponseInterface response with the Set-Cookie header
     */
    public static function clearCookie(\Psr\Http\Message\ResponseInterface $response, string $name, array $options = []): \Psr\Http\Message\ResponseInterface
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
     * New code uses {@see SapiEmitter}.
     *
     * @param ResponseInterface $response response being sent
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
    /**
     * Report whether a status code counts as a successful response.
     *
     * The accepted range is 200 to 399, so redirects pass and errors do not.
     *
     * @param int $status HTTP status to test
     * @return bool
     */
    public static function isValidResponse(int $status = 0): bool
    {
    }
    /**
     * @param array<int|string, string> $headers
     * @return list<string>
     */
    public static function normalizeHeaders(array $headers = []): array
    {
    }
    /**
     * Hand a redirect to the front controller by throwing a response exception.
     *
     * Legacy callers keep calling `redirect(...)` without returning; the
     * exception carries the same 302 (or 404 for an empty URL) response.
     *
     * @param string $newURL target URL
     */
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
     * @return ResponseInterface ready-to-send redirect response
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
    /**
     * Append one cookie to the response (Set-Cookie).
     *
     * @param ResponseInterface $response base response
     * @param string $name cookie name
     * @param string $value cookie value
     * @param array<string, bool|int|string> $options options: expires, path, domain, secure, httponly, samesite
     * @return ResponseInterface response with the Set-Cookie header
     */
    public static function withCookie(\Psr\Http\Message\ResponseInterface $response, string $name, string $value, array $options = []): \Psr\Http\Message\ResponseInterface
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
    /** Plugin API prefix: the plugin answers its own preflight (CORS `*`), not the core. */
    private const PLUGIN_API_PREFIX = '/api/v1';
    /** Prefixes whose body is streamed directly by a streaming handler (not the output buffer). */
    private const STREAMING_PREFIXES = ['/filmstrip', '/hls', '/mpd', '/poster', '/seg/', '/stream-seg', '/stream-ts', '/stream-vid', '/subtitle', '/ts/', '/vid/'];
    /**
     * Response for OPTIONS/HEAD before the router runs (legacy behaviour preserved).
     *
     * An OPTIONS request outside the plugin API gets a 204 with default headers;
     * a HEAD request gets an empty 200 typed for the streaming routes (or DASH XML for `mpd/`).
     *
     * @param ServerRequestInterface $request active request
     * @return ResponseInterface|null early response; null when the request continues to the router
     */
    public static function earlyResponse(\Psr\Http\Message\ServerRequestInterface $request): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Report whether this request's body is streamed directly by a handler.
     *
     * Matching is a case-insensitive prefix test against the streaming routes,
     * so those bodies must not be buffered.
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
     * @param ResponseInterface $response dispatched response
     * @return ResponseInterface response with Content-Type filled in
     */
    public static function withDefaultContentType(\Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Runtime sink refuses further bytes (client disconnected): the producer must abort the transfer.
 *
 * Thrown into the streaming fiber instead of destroying it: a fiber that is still suspended
 * sits inside the cURL write callback, and destroying it forces an unwind through the C frame
 * of libcurl, which makes PHP print "curl_exec(): Could not call the CURLOPT_WRITEFUNCTION".
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
    /** Chunk size when streaming a file. */
    private const CHUNK_SIZE = 65535;
    /** Output-buffer depth owned by the host runtime; buffers below it are left untouched. */
    private static int $bufferLevel = 0;
    private static ?\Closure $writer = null;
    /**
     * Install the runtime writer, or drop it to fall back to the SAPI output buffer.
     *
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
    /**
     * Tell whether a runtime writer is installed.
     *
     * @return bool true when a writer owns the output
     */
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

namespace GDPlayer\Logging;

/**
 * Structured JSON logger writing info and error channels to rotating log files.
 */
final class Logger
{
    /** Minimum gap between log-directory cleanups. */
    private const CLEANUP_INTERVAL = 300;
    /** Error channel: only real failures may go into the *.error.log file */
    private const LEVEL_ERROR = 'error';
    /** Info channel: normal events (not errors) are separated into the plain *.log file */
    private const LEVEL_INFO = 'info';
    // configuration -- adjust as needed
    private const LOG_DIR = \GDPlayer\Config\App::LOG_PATH;
    /** Log file retention (hours). Increase it if you want a longer history. */
    private const RETENTION_HOURS = 72;
    /** Client IP cached for the current request (reset by setRequest). */
    private static ?string $clientIp = null;
    /** Last log-directory cleanup (seconds); scanning the dir per log line is too expensive. */
    private static int $lastCleanup = 0;
    /**
     * Expose the application info instead of the logger internals when dumping the object.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Return the PSR-7 request bound to the current runtime.
     *
     * @return null|ServerRequestInterface active request, null outside a request
     */
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
    /**
     * Bind the request and drop the per-request caches built from the previous one.
     *
     * @param null|ServerRequestInterface $request request to bind, null to unbind
     */
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
    private string $defaultSubtitleLanguage = 'Unknown CC';
    /**
     * Bind the model to the `tb_subtitle_manager` table.
     */
    public function __construct()
    {
    }
    /**
     * ​​$_POST['multiSubUrls'] with language in the filename
     *
     * Parse the textarea lines of `multiSubUrls` into file/label pairs.
     *
     * @return array<array<string,mixed>>
     */
    public function saveMultipleSubtitlesUrls(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * $_POST['sub-url'] and $_POST['lang-url']
     *
     * Pair `sub-url` entries with their `lang-url` label, resolving sub-scene links first.
     *
     * @return array<array<string,mixed>>
     */
    public function saveMultipleSubtitlesUrls2(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * multi upload subtitle files with $_FILES['multiSubFiles']
     *
     * Store every uploaded `multiSubFiles` entry with the language read from its name.
     *
     * @return array<array<string,mixed>>
     */
    public function uploadMultipleSubtitlesFiles(?\Psr\Http\Message\ServerRequestInterface $request = null): array
    {
    }
    /**
     * ​​$_FILES['sub-file'] and $_POST['lang-file']
     *
     * Store every uploaded `sub-file` entry with its matching `lang-file` label.
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
     * @param Hosting  $hostingService hosting resolver used to parse each link
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
    private const MAX_RETRY = 3;
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
    protected const MESSAGE_UNAUTHORIZE = \GDPlayer\Modules\AjaxCatalog::MESSAGE_UNAUTHORIZE;
    /** Whether the action is admin-only (role 0); public endpoints set this to false. */
    protected const REQUIRE_ADMIN = true;
    /** Whether the action requires login; public endpoints set this to false. */
    protected const REQUIRE_LOGIN = true;
    protected string $action = '';
    protected \GDPlayer\Config\BinFile $binConfig;
    protected \GDPlayer\Config\Config $config;
    /**
     * The logged-in user of the active request.
     *
     * Readonly: resolved once in the constructor by {@see AjaxBaseTrait::resolveCurrentUser()}
     * and never changed afterwards.
     *
     * @var null|array<string,string|int|float|null>
     */
    protected readonly ?array $currentUser;
    /**
     * The id of the logged-in user of the active request; 0 when anonymous.
     *
     * Readonly: derived from {@see $currentUser} once, in the constructor.
     */
    protected readonly int $currentUserId;
    /** @var array<string,mixed> */
    protected array $data;
    protected int $draw = 0;
    protected mixed $epeMelemek = false;
    /** @var array<string,UploadedFile|null> */
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
     * @return ResponseInterface JSON response
     */
    final public function handle(string $action): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Run the entity's `list()` then wrap it into a JSON response.
     *
     * @return ResponseInterface JSON response
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

/**
 * Shared base for AjaxHelper (legacy) & AbstractAjaxController (new).
 *
 * Removes duplicated identical methods: request normalization + token/user resolution,
 * JSON/DataTables responses, logging, DataTables query extraction, and table validation.
 * @property array<string,mixed> $data
 * @property array<string,mixed> $files
 * @property string $action
 * @property int $draw
 * @property BinFile $binConfig
 * @property Config $config
 * @property Security $security
 * @property mixed $epeMelemek
 * @property string $token
 * @property null|array<string,string|int|float|null> $currentUser
 * @property int $currentUserId
 * @property bool $isAdmin
 * @property bool $isAdminShowUserData
 * @property bool $isUserShowTheirData
 */
trait AjaxBaseTrait
{
    /**
     * The id of the logged-in user of the active request; 0 when anonymous.
     *
     * Readonly: derived from {@see $currentUser} once, in the constructor, so every
     * consumer reads the same integer instead of casting the raw array value.
     */
    protected \Psr\Http\Message\ServerRequestInterface $request;
    /**
     * @param ServerRequestInterface $request request aktif
     */
    public function __construct(\Psr\Http\Message\ServerRequestInterface $request)
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
    /**
     * Encode the standard Ajax envelope (status, message, result) as JSON.
     *
     * @param int $status 1 becomes 'ok', every other value becomes 'fail'
     * @param string $msg message shown to the client
     * @param mixed $result optional payload; null when the caller returns nothing
     * @return string JSON body, or '{}' when encoding fails
     */
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
    /**
     * Read the first element of a list as an array.
     *
     * @param mixed $value candidate list
     * @return array<string,mixed> first element, or an empty array
     */
    protected function firstArray(mixed $value): array
    {
    }
    /**
     * Read a request body value as an integer, falling back on non-scalar input.
     *
     * @param string $key request body key
     * @param int $default value used when the key is absent or not scalar
     * @return int
     */
    protected function inputInt(string $key, int $default = 0): int
    {
    }
    /**
     * Read a request body value as a string, falling back on non-scalar input.
     *
     * @param string $key request body key
     * @param string $default value used when the key is absent or not scalar
     * @return string
     */
    protected function inputString(string $key, string $default = ''): string
    {
    }
    /**
     * Resolve the logged-in user for the active request.
     *
     * Called exactly once, from the constructor: the outcome is stored in the
     * readonly {@see $currentUser} and can never change afterwards, so one request
     * can never be re-scoped to another user halfway through its lifecycle.
     *
     * A subclass may override this to read the identity from another source. An
     * override runs during construction, so it must not depend on state that is
     * initialized after the parent constructor.
     *
     * @return null|array<string,string|int|float|null> the logged-in user, or null when anonymous
     */
    protected function resolveCurrentUser(): ?array
    {
    }
    /**
     * Scope a row lookup by id to the row owner unless the caller is an admin.
     *
     * @param string $id id value to match
     * @param string $colId column holding the id
     * @param Model $table model that receives the criteria
     * @return Model the same instance, now carrying the criteria
     */
    protected function tableValidation(string $id, string $colId, \GDPlayer\Database\MySQL\Model $table): \GDPlayer\Database\MySQL\Model
    {
    }
    /**
     * Cast any scalar to integer, falling back on anything else.
     *
     * @param mixed $value raw value
     * @param int $default value used when not scalar
     * @return int
     */
    protected function toInt(mixed $value, int $default = 0): int
    {
    }
    /**
     * Cast any scalar to string, falling back on anything else.
     *
     * @param mixed $value raw value
     * @param string $default value used when not scalar
     * @return string
     */
    protected function toStr(mixed $value, string $default = ''): string
    {
    }
}

/**
 * Shared constants for the Ajax/HTTP traits: response messages, SQL truncate, view paths.
 *
 * PHP 8.1 traits cannot have `const`, and Intelephense does not inherit consumer
 * class constants from inside a trait (P1012). Values are centralised here;
 * consumer classes still expose their old names as aliases so legacy callers
 * stay unchanged. When one name holds a different value per domain, the name
 * gets a domain prefix (PUBLIC_*, SETTINGS_*).
 */
final class AjaxCatalog
{
    public const MESSAGE_CREATE_PLAYER_FAIL = 'Insert the video URL first';
    public const MESSAGE_DEPENDENCY_SUCCESS = 'Supported php functions and applications have been enabled/installed';
    public const MESSAGE_FEATURE_DISABLE = 'This feature is disabled';
    public const MESSAGE_FILE_DELETE_FAIL = 'The file/folder failed to delete';
    public const MESSAGE_FILE_DELETE_SUCCESS = 'The file/folder has been successfully deleted';
    public const MESSAGE_FILE_IMPORT_FAIL = 'The file failed to import';
    public const MESSAGE_FILE_IMPORT_SUCCESS = 'The file has been successfully imported';
    public const MESSAGE_FILE_UPDATE_FAIL = 'The file/folder failed to update';
    public const MESSAGE_FILE_UPDATE_SUCCESS = 'The file/folder has been successfully updated';
    public const MESSAGE_FILE_UPLOAD_FAIL = 'The subtitle file failed to upload';
    public const MESSAGE_FILE_UPLOAD_SUCCESS = 'The subtitle file has been uploaded successfully';
    public const MESSAGE_FOLDER_CREATE_FAIL = 'The new file/folder failed to create';
    public const MESSAGE_FOLDER_CREATE_SUCCESS = 'The new file/folder has been created successfully';
    public const MESSAGE_GDRIVE_BYPASS_FAIL = 'Cannot bypass the file, try later';
    public const MESSAGE_GDRIVE_BYPASS_SUCCESS = 'The file has been successfully bypassed';
    public const MESSAGE_MIGRATE_FAIL = 'Migration of those subtitle files failed';
    public const MESSAGE_MIGRATE_SUCCESS = 'Migration of the subtitle files has been successful';
    public const MESSAGE_MIRROR_FILE_DELETE_FAIL = 'The mirror file failed to delete';
    public const MESSAGE_MIRROR_FILE_DELETE_SUCCESS = 'The mirror file has been successfully deleted';
    public const MESSAGE_NEW_LOCATION_INVALID = 'The new location is invalid';
    public const MESSAGE_NOT_FOUND = 'The subtitle was not found';
    public const MESSAGE_OLD_LOCATION_EMPTY = 'Old location required';
    public const MESSAGE_POSTER_REMOVE_FAIL = 'The poster failed to remove';
    public const MESSAGE_POSTER_REMOVE_SUCCESS = 'The poster has been successfully removed';
    public const MESSAGE_REMOVE_DUPLICATE_FILES_FAIL = 'Duplicate files failed to remove';
    public const MESSAGE_REMOVE_DUPLICATE_FILES_SUCCESS = 'Duplicate files have been successfully removed';
    public const MESSAGE_RENAME_DUPLICATED = 'The filename is already in use';
    public const MESSAGE_RENAME_FAIL = 'The subtitle failed to be renamed';
    public const MESSAGE_RENAME_SUCCESS = 'The subtitle has been successfully renamed';
    public const MESSAGE_RESET_FAIL = 'The bypassed hosts failed to reset';
    public const MESSAGE_RESET_SUCCESS = 'The bypassed hosts have been successfully reset';
    public const MESSAGE_STAT_FAIL = 'Total daily visits have been exceeded';
    public const MESSAGE_STAT_SUCCESS = 'Total daily visits successfully created';
    public const MESSAGE_UNAUTHORIZE = 'You are not authorized to access this feature';
    public const MESSAGE_VAST_CREATE_FAIL = 'VAST ad file failed to generate';
    public const MESSAGE_VAST_CREATE_SUCCESS = 'VAST ad file has been generated successfully';
    public const MESSAGE_VAST_DELETE_FAIL = 'The VAST ad file failed to delete';
    public const MESSAGE_VAST_DELETE_SUCCESS = 'The VAST ad file has been successfully deleted';
    public const MESSAGE_VIDEO_DELETE_FAIL = 'The video failed to delete';
    public const MESSAGE_VIDEO_DELETE_SUCCESS = 'The video has been successfully deleted';
    public const MESSAGE_VIDEO_NOT_FOUND = 'The video was not found';
    public const MESSAGE_VIDEO_RENAME_EMPTY = 'The video title is invalid';
    public const MESSAGE_VIDEO_SAVE_FAIL = 'The new video failed to save';
    public const MESSAGE_VIDEO_SAVE_SUCCESS = 'The new video has been saved successfully';
    public const MESSAGE_VIDEO_UPDATE_FAIL = 'The video failed to update';
    public const MESSAGE_VIDEO_UPDATE_SUCCESS = 'The video has been successfully updated';
    public const PUBLIC_CACHE_CLEAR_FAIL = 'Failed to clear the cache of the video or the video does not exist';
    public const PUBLIC_CACHE_CLEAR_SUCCESS = 'The video cache cleared successfully';
    public const SETTINGS_CACHE_CLEAR_FAIL = 'The cache failed to clear';
    public const SETTINGS_CACHE_CLEAR_SUCCESS = 'The cache has been cleared successfully';
    public const SETTINGS_TEMPLATE_DIR = 'backend/settings/';
    public const TRUNCATE_SOURCES = 'TRUNCATE `tb_videos_sources`;';
    public const TRUNCATE_TMP = 'TRUNCATE `tmp_videos_sources`;';
}

namespace GDPlayer\Modules\Auth;

/**
 * Admin panel paths used by the login, register, and password-reset flows.
 *
 * An enum rather than class constants so any file can reference the value in the
 * IDE, traits included: constants owned by the consuming class are invisible when
 * a trait is read on its own.
 */
enum AuthAdminPath : string
{
    case Dashboard = 'dashboard/';
    case Login = 'login/';
    case Register = 'register/';
    case ResetPassword = 'reset-password/';
}

/**
 * Email text and alert messages for the login, register and password reset flow.
 *
 * An enum (not a constant class) so the IDE can trace the values from any file,
 * including from inside a trait: constants of the consuming class are not visible when
 * the trait is analysed on its own.
 */
enum AuthMailText : string
{
    /**
     * Success message body shown after the confirmation email is sent.
     *
     * The value is empty because the text is long: it is assembled in message() so every
     * line stays within 120 columns without adjacent string concatenation (Sonar S2005).
     */
    case ConfirmationBody = '';
    /** Message shown when the email address is not registered. */
    case NotRegistered = 'The account is not registered';
    /** Message shown when the reset token expired or was tampered with. */
    case ResetTokenInvalid = 'The reset link is invalid or has expired. Please request a new one.';
    /** Confirmation email subject format: (site name, recipient name). */
    case SubjectFormat = 'Confirmation email (%s) | %s';
    /** Query string carrying the activation/reset token in the URL. */
    case TokenQuery = '?token=';
    /**
     * Message text for this case (default: the raw enum value).
     *
     * @return string text ready to show to the user
     */
    public function message(): string
    {
    }
}

namespace GDPlayer\Modules\Auth\Controllers;

/**
 * Pages login.php, register.php, reset-password.php.
 */
final class AuthPageController extends \GDPlayer\View\AbstractView
{
    /**
     * Dispatch the request to the matching auth page.
     *
     * @return string|ResponseInterface rendered page, or a redirect response
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Auth\Services;

/**
 * Page login.php: early branches, state redirect, form submit and logout.
 */
final class LoginService
{
    public function __construct(private \Psr\Http\Message\ServerRequestInterface $request, private \GDPlayer\Modules\Auth\Services\MailConfirmation $mail = new \GDPlayer\Modules\Auth\Services\MailConfirmation())
    {
    }
    /**
     * Activate the account through a token (status=1) when token validation succeeds.
     *
     * @return ResponseInterface|null response, or null when nothing was processed
     */
    public function activateLoginToken(bool $checked, \GDPlayer\Model\User $users, string $email, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * `?token=` branch of the login page: account activation / resend the confirmation email.
     *
     * @return ResponseInterface|null response, or null when nothing was processed
     */
    public function loginConfirmToken(string $tokenParam, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Initial login page branch: token activation / logout.
     *
     * @param array<string,mixed> $queryParams query string
     * @return ResponseInterface|null response, or null when no branch applies
     */
    public function loginEarlyResponse(array $queryParams, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Logout branch of the login page.
     *
     * @param Login $login        login service that owns the session
     * @param string $loginURL     redirect target on success
     * @param string $dashboardURL redirect target when the logout fails
     * @return ResponseInterface redirect response with the result alert
     */
    public function loginLogout(\GDPlayer\Service\Login $login, string $loginURL, string $dashboardURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * reCAPTCHA & login field completeness guard.
     *
     * @param array<string,mixed> $body form data
     * @return ResponseInterface|null denial response, or null to continue
     */
    public function loginRecaptchaGuard(array $body, string $username, \GDPlayer\Service\Login $login, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Determine the redirect when the user is already logged in or the query carries raw credentials.
     *
     * @param array<string,mixed> $queryParams query string
     * @return ResponseInterface|null redirect, or null when the form must be rendered
     */
    public function loginRedirectTarget(array $queryParams, string $loginURL, string $dashboardURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Follow-up login page branch: state redirect / form submit.
     *
     * @param array<string,mixed> $queryParams query string
     * @param array<string,mixed> $body form data
     * @return ResponseInterface|null response, or null when the page must be rendered
     */
    public function loginStateResponse(array $queryParams, array $body, \GDPlayer\Service\Login $login, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL, string $dashboardURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Account status guard (2 = awaiting confirmation, 0 = inactive).
     *
     * @param array<string,mixed> $userData user row
     * @return ResponseInterface|null denial response, or null when the status may log in
     */
    public function loginStatusGuard(array $userData, \GDPlayer\Core\Security\Security $security, \GDPlayer\Service\Login $login, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Login form submit branch (reCAPTCHA verification, account status, store the session).
     *
     * @param array<string,mixed> $body
     * @return ResponseInterface redirect response with the result alert
     */
    public function loginSubmit(array $body, \GDPlayer\Service\Login $login, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL, string $dashboardURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * User existence & password match guard.
     *
     * @param array<string,mixed> $userData user row from the query
     * @return ResponseInterface|null denial response, or null when the credentials match
     */
    public function loginUserGuard(array $userData, string $password, string $username, \GDPlayer\Service\Login $login, string $loginURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Page login.php.
     *
     * @return string|ResponseInterface
     */
    public function page(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Email confirmation shared by login, register and reset flows.
 */
final class MailConfirmation
{
    /**
     * Send the confirmation email then mark the user status=2 on success.
     *
     * @param array<string, mixed> $userData user row (name/status/updated)
     * @return ResponseInterface send result response
     */
    public function deliverConfirmationMail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $email, array $userData, string $loginURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Whether email confirmation is enabled (disable_confirm=false + smtp filled in).
     */
    public function isMailConfirmationEnabled(\GDPlayer\Config\Config $config): bool
    {
    }
    /**
     * Resend the confirmation email when the account is inactive and no mail went out recently.
     *
     * @param Mailer $mailer    mail transport
     * @param Security $security security helper encrypting the confirmation token
     * @param User $users       user model
     * @param string $email     registered address to resend to
     * @param string $loginURL  redirect target
     * @return ResponseInterface alert redirect describing the outcome
     */
    public function resendConfirmationMail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $email, string $loginURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Send the registration confirmation email.
     *
     * The token is `email|expires`, encrypted for the URL and valid for ten minutes. Any transport
     * exception is reported as a warning, because the account itself was already created.
     *
     * @param Mailer $mailer      mail transport
     * @param Security $security  security helper encrypting the confirmation token
     * @param string $email       recipient address
     * @param string $name        recipient display name
     * @param string $loginURL    redirect target on failure
     * @param string $registerURL base confirmation URL
     * @return ResponseInterface alert redirect describing the outcome
     */
    public function sendRegistrationEmail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, string $email, string $name, string $loginURL, string $registerURL): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Page register.php: token activation, form validation and account storage.
 */
final class RegisterService
{
    public function __construct(private \Psr\Http\Message\ServerRequestInterface $request, private \GDPlayer\Modules\Auth\Services\MailConfirmation $mail = new \GDPlayer\Modules\Auth\Services\MailConfirmation())
    {
    }
    /**
     * Page register.php.
     *
     * @return string|ResponseInterface
     */
    public function page(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * `?token=` branch of the register page: activate the account after email confirmation.
     */
    public function registerConfirmToken(string $tokenParam, \GDPlayer\Core\Security\Security $security, \GDPlayer\Service\Login $login, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Initial register page branch: token activation, state redirect, or continue rendering.
     *
     * @param array<string,mixed> $queryParams query string
     * @return ResponseInterface|null response, or null when the form must be rendered
     */
    public function registerEarlyResponse(array $queryParams, bool $enableRegistration, \GDPlayer\Core\Security\Security $security, \GDPlayer\Service\Login $login, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Store the user without email confirmation (status active immediately).
     *
     * @param array<string,mixed> $newUserData user data ready to insert
     * @return ResponseInterface registration result response
     */
    public function registerPlain(array $newUserData, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register page redirect when the user is already logged in / registration is disabled.
     *
     * @return ResponseInterface|null redirect response, or null when rendering must continue
     */
    public function registerRedirectTarget(bool $enableRegistration, string $loginURL, string $dashboardURL): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register form submit branch (validation, store the user, send the confirmation email).
     *
     * @param array<string,mixed> $body
     */
    public function registerSubmit(array $body, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Build the register form validation alert message ('' when everything is valid).
     *
     * @param array<string,mixed> $body form data
     */
    public function registerValidationAlert(array $body, string $username, string $email, string $password, string $retypedPassword, \GDPlayer\Model\User $users, \GDPlayer\Service\Login $login): string
    {
    }
    /**
     * Email confirmation registration path: store the user status=2 then send the confirmation email.
     *
     * @param array<string,mixed> $newUserData user data ready to insert
     * @return ResponseInterface registration result response
     */
    public function registerWithConfirmation(array $newUserData, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $loginURL, string $registerURL): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Pages reset-password step 1 & 2: request link, send mail, store the new password.
 */
final class ResetService
{
    public function __construct(private \Psr\Http\Message\ServerRequestInterface $request, private \GDPlayer\Modules\Auth\Services\MailConfirmation $mail = new \GDPlayer\Modules\Auth\Services\MailConfirmation())
    {
    }
    /**
     * Send the password reset email to the user.
     *
     * The link carries the address plus a ten-minute expiry, encrypted into the token.
     *
     * @param Mailer $mailer          mailer driver
     * @param Security $security      encryptor used to sign the reset token
     * @param User $users             user model, read for its last error
     * @param array<string,mixed> $userData user row
     * @param string $resetPasswordURL base reset-password URL
     * @return string HTML alert describing the outcome
     */
    public function deliverResetEmail(\GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, array $userData, string $resetPasswordURL): string
    {
    }
    /**
     * Confirm branch: send the reset email (when allowed) or redirect to step 2.
     *
     * @param array<string,mixed> $body form data
     * @return string|ResponseInterface HTML alert, or redirect response
     */
    public function handleResetConfirm(array $body, \GDPlayer\Config\Config $config, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Save branch: store a new password through a valid token.
     *
     * @param array<string,mixed> $body form data
     * @return string|ResponseInterface HTML alert, or redirect response
     */
    public function handleResetSave(array $body, \GDPlayer\Service\Login $login, \GDPlayer\Model\User $users, string $email): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Process the reset password form submit (confirm link sends email / save new password).
     *
     * @param array<string,mixed> $body form data
     * @return string|ResponseInterface HTML alert, or redirect response
     */
    public function handleResetSubmit(array $body, \GDPlayer\Config\Config $config, \GDPlayer\Service\Login $login, \GDPlayer\External\Mailer $mailer, \GDPlayer\Core\Security\Security $security, \GDPlayer\Model\User $users, string $email): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Page reset-password.php.
     *
     * @return string|ResponseInterface
     */
    public function page(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Dashboard\Controllers;

/**
 * Dashboard widgets and statistics endpoint.
 *
 * Replacement for Ajax\DashboardAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class DashboardAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    protected const ACTIONS = ['popularASN', 'popularBrowsers', 'popularCountries', 'popularVideos', 'recentVideos', 'serversStatus', 'videosStatus', 'views'];
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Model\LoadBalancer $balancer;
    private string $baseUrl = '';
    /** @var array<string,string> $createdSql */
    private array $createdSql = [];
    private string $filter = 'today';
    private \GDPlayer\Model\GDriveAuth $gdriveAuth;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private string $slugDownload = '';
    private string $slugEmbed = '';
    private \GDPlayer\Model\Stat $stat;
    private string $userTimezone = 'UTC';
    private \GDPlayer\Model\VideoSource $vSources;
    private \GDPlayer\Model\Video $videos;
    protected array $data;
    protected bool $isAdmin = false;
    protected bool $isAdminShowUserData = false;
    protected bool $isUserShowTheirData = false;
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
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
     * @param string $sql
     * @param array<mixed> $params
     * @param string $tag
     * @return array<string|int, array<string,mixed>>
     */
    protected function getPopularData(string $sql, array $params, string $tag): array
    {
    }
    /**
     * Count the popular-viewer groups of the active filter, cached per tag.
     *
     * @param string $tag grouping dimension: `asn`, `ua` or `country`
     * @return int number of distinct groups
     */
    protected function getRecordsTotal(string $tag): int
    {
    }
    /**
     * Return the formatted video list, served from the instance cache when available.
     *
     * @param string $sql
     * @param null|array<mixed> $params
     * @param string $tag
     * @return list<array<string,mixed>>
     */
    protected function getVideoList(string $sql, ?array $params, string $tag): array
    {
    }
    /**
     * Run the query and decorate every row with links, flags and action URLs.
     *
     * @param string $sql
     * @param null|array<mixed> $params
     * @return list<array<string,mixed>>
     */
    protected function getVideoListFromDB(string $sql, ?array $params): array
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
    /**
     * Return the last ten videos visible to the current user as a DataTable payload.
     *
     * @return string JSON response
     */
    protected function recentVideos(): string
    {
    }
    /**
     * Return the video count per server, the main server first.
     *
     * @return string JSON response, an authorisation error for non admins
     */
    protected function serversStatus(): string
    {
    }
    /**
     * @return array{sqlWhere:string,sqlParams:array<mixed>,sqlOrder:string}
     */
    protected function statsHelper(): array
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function videosStatus(): string
    {
    }
    /**
     * This method is called with an ajax request according to the value of the post/get action
     *
     * @return string
     */
    protected function views(): string
    {
    }
}

/**
 * Page /administrator/dashboard (login required).
 */
final class DashboardController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string
     */
    protected function render(): string
    {
    }
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
    private const HEIGHT = 300;
    private const WIDTH = 300;
    /**
     * @return bool
     */
    protected function isBufferingOutput(): bool
    {
    }
    /**
     * @return string
     */
    protected function render(): string
    {
    }
}

/**
 * Frontend API endpoints: /api (Core\API payload) and /api-config (player/embed configuration).
 *
 * Both must pass HMAC (X-TS/X-NC/X-SG headers); the reply body is encrypted with a derived key.
 */
final class ApiController extends \GDPlayer\View\AbstractView
{
    /**
     * Reply when the payload cannot be built (extractor/Chromium failure).
     * Encrypted like a normal payload: it is the only body shape the player can read —
     * a non-ciphertext body triggers "Malformed UTF-8 data" in the browser.
     */
    private const FAILED_BODY = '{"status":"fail","message":"Failed to load the video source."}';
    /** 403 reply when the HMAC is invalid, legacy shape kept as-is. */
    private const FORBIDDEN_BODY = '{"status":"fail","message":"Forbidden"}';
    /**
     * Serve the API response for the action named on the query string.
     *
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * /direct/{type}/{slug}/{...} endpoint: look up the video then redirect to hls/mpd/stream-vid.
 *
 * The alternative shape (more than 5 segments) uses an encrypted sqids hash id.
 */
final class DirectController extends \GDPlayer\View\AbstractView
{
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
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
    /** Query string forwarded to the embed page (legacy order preserved). */
    protected const ALLOWED_QUERIES = ['source', 'host', 'id', 'ahost', 'aid', 'subs', 'sub', 'lang', 'poster', 'uid', 'download', 'onlylink', 'email'];
    /** embed2 page skeleton; argument order: lang, base, loader, action, referer. */
    protected const EMBED2_HTML = <<<'HTML'
    
    <!DOCTYPE html>
    <html lang="%s">
    
    <head>
        <base href="%s">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="referrer" content="no-referrer">
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <title>Redirecting...</title>
        <style>
            body {
                padding: 0;
                margin: 0;
                overflow: 0;
                box-sizing: border-box;
                border-radius: 0;
                border: 0;
                background: #000;
                color: #fff;
                text-align: center;
            }
    
            #loader {
                position: absolute;
                top: 50%%;
                left: 50%%;
                transform: translate(-50%%, -50%%);
                padding: 0;
                margin: 0;
                width: auto;
            }
        </style>
    </head>
    
    <body>
        <div id="loader">%s</div>
        <form id="frmValidation" action="%s" method="post">
            <input type="hidden" id="referer" name="referer" value="%s" required>
        </form>
        <script type="text/javascript" src="assets/vendor/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#frmValidation").trigger("submit");
            });
        </script>
    </body>
    
    </html>
    
    HTML;
    protected \Psr\Http\Message\ServerRequestInterface $request;
    protected \Psr\Http\Message\ResponseInterface $response;
    /**
     * @return string|ResponseInterface
     */
    protected function embed2Page(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Filter the allowed query then complete host/id/uid (null = source+id combination without uid).
     *
     * @param Config $config site configuration
     * @return array<string, mixed>|null query ready to use, or null when a 403 is required
     */
    protected function embed2QueryParams(\GDPlayer\Config\Config $config): ?array
    {
    }
    /**
     * Build the destination URL (embed/download) from the encrypted query, or the embed2 player HTML.
     *
     * @param Config $config site configuration
     * @param array<string, mixed> $queryParams filtered & completed query
     * @return string|ResponseInterface plain URL, redirect, or embed2 page
     */
    protected function embed2Response(\GDPlayer\Config\Config $config, array $queryParams): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Placeholder values for the embed2 page.
     *
     * @param Config $config site configuration
     * @param string $embedURL encrypted embed URL
     * @return list<string> lang, BASE_URL, loader, embedURL, referer
     */
    protected function embed2Values(\GDPlayer\Config\Config $config, string $embedURL): array
    {
    }
    /**
     * Whether the embed2 page must be blocked (browser blacklist / request-url feature disabled).
     *
     * @param Config $config site configuration
     * @return bool true when the request must be answered with 403
     */
    protected function isEmbed2Blocked(\GDPlayer\Config\Config $config): bool
    {
    }
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Static frontend pages: /changelog, /sharer, and /sitemap(.xml).
 */
final class PageController extends \GDPlayer\View\AbstractView
{
    /** Sitemap contents; %1$s is replaced with BASE_URL without the trailing slash. */
    private const SITEMAP_XML = <<<'XML'
    <?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
        <url>
            <loc>%1$s</loc>
            <lastmod>2021-11-19T07:47:44+00:00</lastmod>
            <priority>1.00</priority>
        </url>
        <url>
            <loc>%1$s/sharer/</loc>
            <lastmod>2021-11-19T07:47:44+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>%1$s/changelog/</loc>
            <lastmod>2021-11-19T07:47:44+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>%1$s/terms/</loc>
            <lastmod>2021-11-19T07:47:44+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>%1$s/privacy/</loc>
            <lastmod>2021-11-19T07:47:44+00:00</lastmod>
            <priority>0.80</priority>
        </url>
    </urlset>
    XML;
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Endpoint /redirect/{encrypted}/{path...}: decrypt the destination then redirect.
 */
final class RedirectController extends \GDPlayer\View\AbstractView
{
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * /telemetry endpoint: receive player TTFB reports then reply with JSON.
 *
 * The legacy view's OPTIONS branch was not ported: Application::run() answers OPTIONS
 * with 204 before dispatch, so that branch was in fact never reachable.
 */
final class TelemetryController extends \GDPlayer\View\AbstractView
{
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\GDrive\Controllers;

/**
 * Google Drive account management endpoint (list, add, edit, delete).
 *
 * Replacement for Ajax\GDriveAccountAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveAccountAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_DELETE_FAIL = 'The account failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The account has been deleted successfully';
    private const MESSAGE_STATUS_UPDATE_FAIL = 'The account status failed to update';
    private const MESSAGE_STATUS_UPDATE_SUCCESS = 'The account status has been successfully updated';
    protected const ACTIONS = ['delete', 'updateBypass', 'updateStatus'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Google Drive account';
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'email', 'bypass', 'status', 'created', 'updated'];
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete an account, its mirrored files and the cached Drive listings.
     *
     * @return string JSON response
     */
    protected function delete(): string
    {
    }
    /**
     * Toggle the bypass flag through the shared status update path.
     *
     * @return string JSON response
     */
    protected function updateBypass(): string
    {
    }
    /**
     * Update the `status` or `bypass` column of an account.
     *
     * @return string JSON response
     */
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
}

/**
 * Google Drive file browser endpoint (list, mirror, delete).
 *
 * Replacement for Ajax\GDriveFileAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveFileAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    protected const ACTIONS = ['createDataList', 'createNewFolder', 'delete', 'deleteMirror', 'gdriveImport', 'getSharedDrives', 'removeDuplicateFiles', 'removeDuplicateFilesByData', 'renameFileFolder', 'updateStatus'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Google Drive files';
    protected const MESSAGE_FILE_DELETE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_DELETE_FAIL;
    protected const MESSAGE_FILE_DELETE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_DELETE_SUCCESS;
    protected const MESSAGE_FILE_IMPORT_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_IMPORT_FAIL;
    protected const MESSAGE_FILE_IMPORT_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_IMPORT_SUCCESS;
    protected const MESSAGE_FILE_UPDATE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_UPDATE_FAIL;
    protected const MESSAGE_FILE_UPDATE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_UPDATE_SUCCESS;
    protected const MESSAGE_FOLDER_CREATE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FOLDER_CREATE_FAIL;
    protected const MESSAGE_FOLDER_CREATE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FOLDER_CREATE_SUCCESS;
    protected const MESSAGE_MIRROR_FILE_DELETE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_MIRROR_FILE_DELETE_FAIL;
    protected const MESSAGE_MIRROR_FILE_DELETE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_MIRROR_FILE_DELETE_SUCCESS;
    protected const MESSAGE_REMOVE_DUPLICATE_FILES_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_REMOVE_DUPLICATE_FILES_FAIL;
    protected const MESSAGE_REMOVE_DUPLICATE_FILES_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_REMOVE_DUPLICATE_FILES_SUCCESS;
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveDuplicate $gdDuplicate;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    private \GDPlayer\Model\Video $videoModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'title', 'description', 'shared', 'modifiedDate'];
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * @param list<array<string,mixed>> $rawDriveFiles
     * @param string $email
     * @return list<array<string,mixed>>
     */
    protected function createDataList(array $rawDriveFiles = [], string $email = ''): array
    {
    }
    /**
     * Create a Drive folder under an optional parent and clear the cached file list.
     *
     * @return string JSON response carrying the Ajax status and message
     */
    protected function createNewFolder(): string
    {
    }
    /**
     * Delete the Drive file named by `id` and invalidate the cached file list.
     *
     * @return string JSON response carrying the Ajax status and message
     */
    protected function delete(): string
    {
    }
    /**
     * Delete the mirror row only; the underlying Drive file stays untouched.
     *
     * @return string JSON response carrying the Ajax status and message
     */
    protected function deleteMirror(): string
    {
    }
    /**
     * Insert a new video row from the Drive file metadata and return its slug.
     *
     * @return string JSON response with the new video id, title and slug
     */
    protected function gdriveImport(): string
    {
    }
    /**
     * List the shared drives visible to the given Google account.
     *
     * @return string JSON response whose data holds the shared drive list
     */
    protected function getSharedDrives(): string
    {
    }
    /**
     * Sweep one page of Drive files and remove the ones already recorded as duplicates.
     *
     * The request carries an email and a page token; the token is echoed back so
     * the client can continue with the next page.
     *
     * @return string JSON response with the next page token
     */
    protected function removeDuplicateFiles(): string
    {
    }
    /**
     * Decide the fate of one Drive file: delete it, record it, or leave it alone.
     *
     * A match on size plus checksums plus title/description means the file is a
     * duplicate elsewhere and gets deleted; otherwise the row is inserted into
     * the duplicate table, and an existing row is reported as false.
     *
     * @param array<string,mixed> $driveFileItem file metadata from the Drive API
     * @param string $sha1 sanitised SHA-1 checksum
     * @param string $sha256 sanitised SHA-256 checksum
     * @param string $description sanitised file description
     * @return bool|string delete/insert result, or false when the row already exists
     */
    protected function removeDuplicateFilesByData(array $driveFileItem = [], string $sha1 = '', string $sha256 = '', string $description = ''): bool|string
    {
    }
    /**
     * Rename a Drive file or folder and invalidate the cached file list.
     *
     * @return string JSON response carrying the Ajax status and message
     */
    protected function renameFileFolder(): string
    {
    }
    /**
     * Grant or revoke public read permission on the Drive file.
     *
     * @return string JSON response carrying the Ajax status and message
     */
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
}

/**
 * Page gdrive/files.php (retired once this controller was proven identical).
 */
final class GDriveFileController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string
     */
    protected function render(): string
    {
    }
}

/**
 * Google Drive mirror management endpoint (list, add, remove).
 *
 * Replacement for Ajax\GDriveMirrorAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveMirrorAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_DELETE_FAIL = 'The backup file failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The backup file has been successfully deleted';
    protected const ACTIONS = ['delete'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Google Drive mirror';
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveMirror $gdMirror;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'gdrive_id', 'mirror_id', 'mirror_email', 'created'];
    /**
     * Bind the Drive client and the mirror model to the request.
     *
     * @param ServerRequestInterface $request current HTTP request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete a mirror row and the Drive copy it points at.
     *
     * The remote file is removed first; the row is only deleted when that call did not throw.
     *
     * @return string JSON response with the deletion status
     */
    protected function delete(): string
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
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Google Drive mirror queue endpoint (list, enqueue, clear).
 *
 * Replacement for Ajax\GDriveQueueAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class GDriveQueueAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_DELETE_FAIL = 'The backup queue failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The backup queue has been successfully deleted';
    private const MESSAGE_GDRIVE_COPY_FAIL = 'Cannot copy the file! Try again later';
    protected const ACTIONS = ['copy', 'delete'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Google Drive queue';
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\External\GoogleDriveRestAPI $gdAPI;
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Model\GDriveQueue $gdQueue;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'gdrive_id'];
    /**
     * Bind the request and instantiate the Drive models and REST client.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Copy a Drive file into the first active account that accepts the copy.
     *
     * @return string JSON response holding the new file link and id on success
     */
    protected function copy(): string
    {
    }
    /**
     * Remove one item from the mirror queue.
     *
     * @return string JSON response describing the outcome
     */
    protected function delete(): string
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
    private const MESSAGE_DELETE_FAIL = 'The load balancer server failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The load balancer server deleted successfully';
    private const MESSAGE_UPDATE_FAIL = 'The load balancer server failed to update';
    private const MESSAGE_UPDATE_SUCCESS = 'The load balancer server has been successfully updated';
    protected const ACTIONS = ['delete', 'updateStatus'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Load Balancer';
    private \GDPlayer\Model\LoadBalancer $balancerModel;
    private \GDPlayer\Model\ViewLoadBalancer $viewBalancerModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['name', 'link', 'connections', 'playbacks', 'status', 'created', 'updated', 'public', 'id'];
    /**
     * @param ServerRequestInterface $request request aktif
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Soft-delete one load balancer server and report success or failure as JSON.
     *
     * @return string ajax status plus message
     */
    protected function delete(): string
    {
    }
    /**
     * Flip the active flag of one load balancer server.
     *
     * @return string ajax status plus message
     */
    protected function updateStatus(): string
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
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Logs\Controllers;

/**
 * Page /administrator/log: log viewer + API endpoint (list/download/clear/delete/read).
 */
final class LogController extends \GDPlayer\View\AbstractView
{
    private const JSON_TYPE = 'application/json';
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Plugins\Controllers;

/**
 * Page /administrator/plugins/config: plugin-owned configuration page (views/backend/*.php),
 * plus JSON mode (?sync=1) for the load balancer.
 */
final class PluginConfigController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Plugins page: list (page + DataTables endpoint) and uninstall (JSON endpoint).
 */
final class PluginController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Endpoint /administrator/plugins/install: upload & install a plugin from ZIP (JSON).
 */
final class PluginInstallController extends \GDPlayer\View\AbstractView
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
     * @param string $zipTempPath uploaded ZIP still sitting in the temp folder
     * @return string|null error message, or null on success
     */
    protected function extractAndRegister(array $pluginJson, array $target, string $zipTempPath): ?string
    {
    }
    /**
     * Access guard: only admins may install plugins.
     *
     * @return ResponseInterface|null denial response, or null when allowed
     */
    protected function installGuard(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Whether the directory is empty (no entries).
     */
    protected function isDirectoryEmpty(string $dir): bool
    {
    }
    /**
     * Decode + validate the plugin manifest.
     *
     * @return array{json: array<string, mixed>|null, error?: string} parse result
     */
    protected function parsePluginJson(string $content): array
    {
    }
    /**
     * Read stage: ZIP upload + validated plugin.json manifest.
     *
     * @return array{json: array<string, mixed>, temp: string}|ResponseInterface install-ready data, or
     *         failure response
     */
    protected function preparePluginInstall(): array|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Read plugin.json from the ZIP archive.
     *
     * @return array{0: string|null, 1: string} [content|null, error message]
     */
    protected function readPluginJsonContent(string $zipTempPath): array
    {
    }
    /**
     * Run the guard, preparation and completion steps of the plugin install flow.
     *
     * @return ResponseInterface rendered page, or the first guard/preparation response that stops it
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Determine the installation target folder (upgrade when the folder holds the same plugin
     * with a different version).
     *
     * @param array<string, mixed> $pluginJson plugin manifest
     * @param bool $useCli whether the plugin is installed through the CLI
     * @return array<string, mixed>|ResponseInterface installation target
     */
    protected function resolveInstallTarget(array $pluginJson, bool $useCli): array|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Store/update the plugin row + copy the ZIP to the tmp folder (returns the plugin id).
     *
     * An existing row keeps its stored config, merged under the new manifest
     * config; a new row starts disabled (status 0).
     *
     * @param array<string,mixed> $pluginJson plugin manifest
     * @param string $finalFolderRelative plugin folder relative to the plugins root
     * @param string $zipTempPath uploaded ZIP still sitting in the temp folder
     * @return int plugin id
     */
    protected function savePluginRecord(array $pluginJson, string $finalFolderRelative, string $zipTempPath): int
    {
    }
}

/**
 * Endpoint /administrator/plugins/sync: ping (folder stamp), download (send the ZIP) and
 * notify (start a pull task on this server). ping/download authenticate with the sync salt
 * (remote servers); ping and notify also accept an admin session.
 *
 * Archives are named `<folder>-<stamp>.zip`, so unchanged contents are never rebuilt and
 * never overwritten while still being sent to another server.
 */
final class PluginSyncController extends \GDPlayer\View\AbstractView
{
    /** @var string[] */
    private const ACTIONS = ['ping', 'download', 'notify'];
    /**
     * Dispatch ping, download or notify according to the `action` query parameter.
     *
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\PublicEndpoint\Controllers;

/**
 * Public (unauthenticated) endpoint for video/poster/subtitle actions.
 *
 * Replacement for Ajax\PublicAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class PublicAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_EMAIL_EXIST = 'The email address is already registered';
    private const MESSAGE_USERNAME_EXIST = 'The username is already registered';
    protected const ACTIONS = ['checkEmail', 'checkUsername', 'clearVideoCache', 'createPlayer', 'gdriveBypassLimit', 'getLoadBalancerList', 'isPublicRequestValid', 'saveBulkProcess', 'statCounter'];
    protected const MESSAGE_CACHE_CLEAR_FAIL = \GDPlayer\Modules\AjaxCatalog::PUBLIC_CACHE_CLEAR_FAIL;
    protected const MESSAGE_CACHE_CLEAR_SUCCESS = \GDPlayer\Modules\AjaxCatalog::PUBLIC_CACHE_CLEAR_SUCCESS;
    protected const MESSAGE_CREATE_PLAYER_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_CREATE_PLAYER_FAIL;
    protected const MESSAGE_FEATURE_DISABLE = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FEATURE_DISABLE;
    protected const MESSAGE_GDRIVE_BYPASS_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_GDRIVE_BYPASS_FAIL;
    protected const MESSAGE_GDRIVE_BYPASS_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_GDRIVE_BYPASS_SUCCESS;
    protected const MESSAGE_STAT_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_STAT_FAIL;
    protected const MESSAGE_STAT_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_STAT_SUCCESS;
    protected const MESSAGE_VIDEO_SAVE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_SAVE_FAIL;
    protected const MESSAGE_VIDEO_SAVE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_SAVE_SUCCESS;
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = false;
    private \GDPlayer\Model\LoadBalancer $balancerModel;
    private \GDPlayer\Core\Core $core;
    private string $downloadSlug = 'd';
    private string $embed2Slug = 'r';
    private string $embedSlug = 'e';
    private \GDPlayer\External\GoogleDriveRestAPI $gdApi;
    private \GDPlayer\Model\GDriveAuth $gdAuth;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\External\Maxmind $maxmind;
    private \Sqids\Sqids $sqids;
    private \GDPlayer\Model\Stat $statModel;
    private \GDPlayer\Model\StatUA $statUAModel;
    private \GDPlayer\Model\SubtitleManager $subtitleManager;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\User $userModel;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    /**
     * Instantiate the models, config slugs and Drive clients used by the public actions.
     *
     * @param ServerRequestInterface $request incoming Ajax request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Report whether the email is already used by another account.
     *
     * @param string $email email to test; falls back to the posted value when empty
     * @return string JSON response flagging the conflict
     */
    protected function checkEmail(string $email = ''): string
    {
    }
    /**
     * Report whether the username is already used by another account.
     *
     * @param string $username name to test; falls back to the posted value when empty
     * @return string JSON response flagging the conflict
     */
    protected function checkUsername(string $username = ''): string
    {
    }
    /**
     * Clear the cached sources of the video, alternative or URL carried by the encrypted payload.
     *
     * @return string JSON response with a per-target clear summary
     */
    protected function clearVideoCache(): string
    {
    }
    /**
     * Build the encrypted player URLs and embed code for the submitted video.
     *
     * @return string JSON response carrying the embed, download and request URLs
     */
    protected function createPlayer(): string
    {
    }
    /**
     * Copy a Google Drive file into an authorised account to bypass its download limit.
     *
     * @return string JSON response carrying the new share link on success
     */
    protected function gdriveBypassLimit(): string
    {
    }
    /**
     * List the links of the enabled load balancers plus the main site.
     *
     * @return string JSON response holding the unique link list
     */
    protected function getLoadBalancerList(): string
    {
    }
    /**
     * Guard specific to public endpoints (used by AbstractAjaxController before the action runs).
     *
     * @return bool true when the request may continue
     */
    protected function isGatePassed(): bool
    {
    }
    /**
     * Decide whether the current action may run without a logged-in user.
     *
     * @return bool true for exempt actions, valid reCAPTCHA or a valid CORS token
     */
    protected function isPublicRequestValid(): bool
    {
    }
    /**
     * Save one video of a bulk import batch and report the next cursor position.
     *
     * @return string JSON response with the saved row, the offsets and the share links
     */
    protected function saveBulkProcess(): string
    {
    }
    /**
     * Insert the subtitle tracks of a freshly saved video.
     *
     * @param int $videoId
     * @param list<array<mixed,mixed>> $tracks
     * @return int number of tracks stored
     */
    protected function saveBulkSubtitles(int $videoId = 0, array $tracks = []): int
    {
    }
    /**
     * Record a single view for the video, honouring the daily per-visitor limit.
     * Record one view for the video, obeying the daily per-visitor limit.
     *
     * @param int $videoId Video primary key
     * @param int $currentViews Current view counter of the video
     * @return int Inserted visit ID, or 0 when the limit was reached
     */
    protected function saveStat(int $videoId = 0, int $currentViews = 0): int
    {
    }
    /**
     * Decrypt the payload, resolve the video and record one view.
     * Resolve the video referenced by the encrypted payload and record a view.
     *
     * @return string JSON response
     */
    protected function statCounter(): string
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
    private const MESSAGE_DELETE_FAIL = 'The session failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The session has been successfully deleted';
    protected const ACTIONS = ['delete'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Session';
    private \GDPlayer\Model\Session $sessionModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'username', 'ip', 'useragent', 'created', 'expires'];
    /**
     * @param ServerRequestInterface $request request aktif
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Remove one stored session row and report success or failure as JSON.
     *
     * @return string ajax status plus message
     */
    protected function delete(): string
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
 * Admin settings endpoint (read, save, license, custom headers).
 *
 * Replacement for Ajax\SettingAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class SettingAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_BLACKLIST_FAIL = 'The blacklisted videos failed to deactivate';
    private const MESSAGE_BLACKLIST_SUCCESS = 'The blacklisted videos have been successfully deactivated';
    private const MESSAGE_DEPENDENCY_FAIL = 'Some php functions and applications are not enabled/installed yet';
    private const MESSAGE_DEPENDENCY_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_DEPENDENCY_SUCCESS;
    private const MESSAGE_LICENSE_SAVE_FAIL = 'GDPlayer license failed to save';
    private const MESSAGE_LICENSE_SAVE_SUCCESS = 'GDPlayer license has been successfully saved';
    protected const ACTIONS = ['clearAllCache', 'clearHtmlCache', 'clearLoadBalancer', 'clearSettingsCache', 'clearVideosCache', 'clearVideosFiles', 'createCustomVast', 'hasDeletedCacheTmpDir', 'deleteCustomVast', 'disableBlacklistedVideos', 'getDependencies', 'hideExtDialog', 'resetHosts', 'saveLicense'];
    protected const DENIED_AS_DATATABLE = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Setting';
    protected const MESSAGE_CACHE_CLEAR_FAIL = \GDPlayer\Modules\AjaxCatalog::SETTINGS_CACHE_CLEAR_FAIL;
    protected const MESSAGE_CACHE_CLEAR_SUCCESS = \GDPlayer\Modules\AjaxCatalog::SETTINGS_CACHE_CLEAR_SUCCESS;
    protected const MESSAGE_RESET_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_RESET_FAIL;
    protected const MESSAGE_RESET_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_RESET_SUCCESS;
    protected const MESSAGE_VAST_CREATE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VAST_CREATE_FAIL;
    protected const MESSAGE_VAST_CREATE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VAST_CREATE_SUCCESS;
    protected const MESSAGE_VAST_DELETE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VAST_DELETE_FAIL;
    protected const MESSAGE_VAST_DELETE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VAST_DELETE_SUCCESS;
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = true;
    protected const TRUNCATE_SOURCES = \GDPlayer\Modules\AjaxCatalog::TRUNCATE_SOURCES;
    protected const TRUNCATE_TMP = \GDPlayer\Modules\AjaxCatalog::TRUNCATE_TMP;
    private \GDPlayer\Service\Background\Background $backgroundService;
    private \GDPlayer\Service\HeadlessChrome\HeadlessChrome $headlessChrome;
    private \GDPlayer\Model\TmpVideoSource $tmpVideoSourceModel;
    private string $uploadsDir = '';
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    protected \GDPlayer\Config\BinFile $binConfig;
    protected \GDPlayer\Config\Config $config;
    protected array $data;
    /**
     * Bind the request and the services used by the settings actions.
     *
     * @param ServerRequestInterface $request current HTTP request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Flush every runtime cache: downloads, browsers, staging rows and cache drivers.
     *
     * @return string JSON response with one boolean flag per cleared area
     */
    protected function clearAllCache(): string
    {
    }
    /**
     * Retire every cached HTML page: the tag version is bumped, so all entries are
     * unreachable at once (admin only, guarded by REQUIRE_ADMIN).
     *
     * @return string JSON response describing the outcome
     */
    protected function clearHtmlCache(): string
    {
    }
    /**
     * Stop downloads and drop the video sources of a single load balancer.
     *
     * @return string JSON response describing the outcome
     */
    protected function clearLoadBalancer(): string
    {
    }
    /**
     * Drop the persisted settings cache and the temporary directories behind it.
     *
     * @return string JSON response describing the outcome
     */
    protected function clearSettingsCache(): string
    {
    }
    /**
     * Clear the staged video sources and the filesize-tagged instance cache.
     *
     * @return string JSON response describing the outcome
     */
    protected function clearVideosCache(): string
    {
    }
    /**
     * Remove the cached video, subtitle and image files left by the players.
     *
     * @return string JSON response describing the outcome
     */
    protected function clearVideosFiles(): string
    {
    }
    /**
     * Render and store a custom VAST document from the request fields.
     *
     * The XML is written to the uploads directory and appended to the `custom_vast` setting.
     *
     * @return string JSON response carrying the public URL of the generated document
     */
    protected function createCustomVast(): string
    {
    }
    /**
     * Remove a custom VAST document from disk and from the `custom_vast` setting.
     *
     * @return string JSON response with the deletion status
     */
    protected function deleteCustomVast(): string
    {
    }
    /**
     * Flag and deactivate every video whose title starts with a blacklisted word.
     *
     * The word list comes from the `word_blacklisted` setting, one word per line.
     *
     * @return string JSON response with the update status
     */
    protected function disableBlacklistedVideos(): string
    {
    }
    /**
     * Report which PHP extensions, functions and binaries the application needs.
     *
     * @return string JSON response carrying the per-dependency result map
     */
    protected function getDependencies(): string
    {
    }
    /**
     * Delete the temporary, cache and upload scratch directories.
     *
     * @return bool true when at least one directory was removed
     */
    protected function hasDeletedCacheTmpDir(): bool
    {
    }
    /**
     * Remember, for thirty days, that the missing-extension dialog was dismissed.
     *
     * @return string JSON success response
     */
    protected function hideExtDialog(): string
    {
    }
    /**
     * Exempt an action from the admin guard.
     *
     * Always false: only the license gate is exempt, never the admin role check.
     *
     * @param string $action requested action name
     * @return bool true when the action may skip the admin guard
     */
    protected function isAdminExempt(string $action): bool
    {
    }
    /**
     * `saveLicense` must stay callable while the license is not valid yet — otherwise a new
     * license could never be stored (the isLicenseValid() gate rejects it), and this action is also
     * exempt from the admin guard (legacy view behavior).
     */
    protected function isLicenseGateExempt(string $action): bool
    {
    }
    /**
     * Rebuild the bypassed host list from the binary config and persist it.
     *
     * @return string JSON response carrying the refreshed host list
     */
    protected function resetHosts(): string
    {
    }
    /**
     * Persist the license key and refresh the cached license status.
     *
     * @return string JSON response with the save status
     */
    protected function saveLicense(): string
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
    /** Settings form template folder. */
    protected const TEMPLATE_DIR = \GDPlayer\Modules\AjaxCatalog::SETTINGS_TEMPLATE_DIR;
    /**
     * @return string
     */
    protected function render(): string
    {
    }
}

/**
 * Endpoint /administrator/settings/sync (webhook load balancer) — JSON.
 */
final class SettingSyncController extends \GDPlayer\View\AbstractView
{
    /** @var string[] */
    private const CACHE_MODES = ['php', 'apache', 'litespeed', 'nginx'];
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Settings\Services;

/**
 * PWA manifest, favicon and logo uploads of the site settings page.
 */
final class AssetProcessor
{
    /**
     * Build the PWA manifest.json contents.
     *
     * @param array<string,mixed>  $body
     * @param list<array<string,string>> $icons
     * @return array<string,mixed>
     */
    public static function buildPwaManifest(array $body, array $icons, string $size512): array
    {
    }
    /**
     * Create `favicon.ico` from the logo (requires the GD extension).
     */
    public static function generateFavicon(string $logoFile, string $faviconFile): void
    {
    }
    /**
     * Accept the favicon/logo upload (PNG) and derive every PWA icon.
     *
     * @param array<string,mixed> $uploadedFiles
     */
    public static function handleLogoUpload(array $uploadedFiles, string $imgDir, string $logoFile): void
    {
    }
    /**
     * Write manifest.json (log on failure).
     *
     * @param array<string,mixed> $manifest
     */
    public static function writeManifest(array $manifest): void
    {
    }
}

/**
 * Turns the custom headers form rows into the stored header structure.
 */
final class HeaderParser
{
    /**
     * Parse the custom headers form JSON into a structured item list.
     *
     * @param array<string, mixed> $body form data
     * @return list<array{keywords:string[],headers:array<string,string>}> custom headers items
     */
    public static function parseCustomHeaders(array $body): array
    {
    }
    /**
     * Parse "key: value" lines into an assoc header array.
     *
     * @return array<string,string> parsed headers
     */
    public static function parseHeaderLines(string $raw): array
    {
    }
}

/**
 * Options shown on the player settings page and the POST handler for that page.
 */
final class PlayerOptionBuilder
{
    /**
     * Frontend loader list from the templates/frontend/loader folder.
     *
     * @return array<string,string> loader name => label
     */
    public static function buildLoaderList(): array
    {
    }
    /**
     * Allowed video resolutions.
     *
     * @return list<int|string> resolution list
     */
    public static function buildResolutions(): array
    {
    }
    /**
     * CSS skin list from the active player's assets/skin folder.
     *
     * @return array<string,string> skin name => label
     */
    public static function buildSkinList(string $currentPlayer): array
    {
    }
    /**
     * Save player settings (strip the leading '#' from colors) when the request is a POST.
     *
     * @param array<string, mixed> $body form data
     */
    public static function savePlayerSettings(array $body, string $requestMethod, \GDPlayer\Config\Config $configModel, string $title): void
    {
    }
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
    /** Engine slugs that have a fallback: endpoint name + engine number. */
    private const ENGINE_PATTERN = '#^(stream-seg|stream-ts|stream-vid)([2-3])$#';
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Endpoint /filmstrip/{encrypted url}: filmstrip VTT for the player.
 */
final class FilmstripController extends \GDPlayer\View\AbstractView
{
    /** VTT cache TTL in seconds, matching the `Cache-Control: max-age` of this response. */
    private const CACHE_TTL = 3600;
    /** Cache status of this response: HIT, MISS or BYPASS (unreadable URL). */
    private string $cacheStatus = 'BYPASS';
    /**
     * Decrypt the URL in the request target and answer with the filmstrip VTT.
     *
     * @return ResponseInterface VTT response, or a redirect for URLs pointing back at this site
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Endpoint /poster?url=... (or /poster/{encrypted url}): poster image proxy + disk cache.
 *
 * Streaming handler: chunks are sent straight to the client while being written to the cache file,
 * so output buffering is disabled (see AbstractView::isBufferingOutput()).
 */
final class PosterController extends \GDPlayer\View\AbstractView
{
    /** curl "write error" code that only comes from our own abort. */
    private const CURL_WRITE_ERROR = 23;
    /**
     * @return bool
     */
    protected function isBufferingOutput(): bool
    {
    }
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
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
    /** URL slug per action, used when redirecting to the engine. */
    private const ENGINE_SLUGS = ['segment' => 'stream-seg', 'transportStream' => 'stream-ts', 'video' => 'stream-vid'];
    /**
     * @return bool
     */
    protected function isBufferingOutput(): bool
    {
    }
    /**
     * @return string
     */
    protected function render(): string
    {
    }
}

/**
 * Endpoint /subtitle/{encrypted url}: fetch the subtitle from its source, convert to VTT, cache.
 */
final class SubtitleController extends \GDPlayer\View\AbstractView
{
    /** Subtitle extensions that can be converted to VTT. */
    private const SUBTITLE_EXTENSIONS = ['srt', 'vtt', 'ass', 'sub', 'stl', 'dfxp', 'ttml', 'sbv', 'txt'];
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Subtitles\Controllers;

/**
 * Subtitle library endpoint (list, upload, convert, delete).
 *
 * Replacement for Ajax\SubtitleAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class SubtitleAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_DELETE_FAIL = 'The subtitle file failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The subtitle file has been successfully deleted';
    private const MESSAGE_NOT_FOUND = \GDPlayer\Modules\AjaxCatalog::MESSAGE_NOT_FOUND;
    protected const ACTIONS = ['createSearchQuery', 'delete', 'getHosts', 'migrate', 'rename', 'uploadSubtitle'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to Subtitle';
    protected const MESSAGE_FILE_UPLOAD_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_UPLOAD_FAIL;
    protected const MESSAGE_FILE_UPLOAD_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_FILE_UPLOAD_SUCCESS;
    protected const MESSAGE_MIGRATE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_MIGRATE_FAIL;
    protected const MESSAGE_MIGRATE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_MIGRATE_SUCCESS;
    protected const MESSAGE_NEW_LOCATION_INVALID = \GDPlayer\Modules\AjaxCatalog::MESSAGE_NEW_LOCATION_INVALID;
    protected const MESSAGE_OLD_LOCATION_EMPTY = \GDPlayer\Modules\AjaxCatalog::MESSAGE_OLD_LOCATION_EMPTY;
    protected const MESSAGE_RENAME_DUPLICATED = \GDPlayer\Modules\AjaxCatalog::MESSAGE_RENAME_DUPLICATED;
    protected const MESSAGE_RENAME_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_RENAME_FAIL;
    protected const MESSAGE_RENAME_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_RENAME_SUCCESS;
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Model\SubtitleManager $subtitleManagerModel;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\ViewSubtitleManager $viewSubtitleManagerModel;
    protected array $data;
    protected array $files = [];
    protected bool $isAdmin = false;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'file_name', 'language', 'name', 'host', 'created', 'updated'];
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Add a prefix LIKE filter over file name, language, host and name, still scoped to the caller.
     *
     * @param string $search term to match; an empty value falls back to the plain owner criteria
     * @return ViewSubtitleManager the shared view model carrying the criteria
     */
    protected function createSearchQuery(string $search = ''): \GDPlayer\Model\ViewSubtitleManager
    {
    }
    /**
     * Remove the subtitle row, its file on disk and any source rows pointing at it.
     *
     * Reports success when at least one of the three steps touched something.
     * @return string JSON payload with the status message
     */
    protected function delete(): string
    {
    }
    /**
     * List the distinct host values stored for subtitles; admin only.
     *
     * @return string JSON payload carrying the unique host list
     */
    protected function getHosts(): string
    {
    }
    /**
     * Rewrite every subtitle link and manager host from the old location prefix to the new one.
     *
     * Both locations must be non-empty URLs and the caller must be an admin.
     * @return string JSON payload with the status message
     */
    protected function migrate(): string
    {
    }
    /**
     * Rename the subtitle file on disk and mirror the new name into the manager and source rows.
     *
     * Refuses overwrites, and reports a dedicated message when the target name already exists.
     * @return string JSON payload with the status message
     */
    protected function rename(): string
    {
    }
    /**
     * Store an uploaded subtitle file, detect its real mime type and record the metadata row.
     *
     * The language label defaults to 'Unknown CC' when the request omits one.
     * @return string JSON payload with the new subtitle id, language and public URL
     */
    protected function uploadSubtitle(): string
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
    private const MESSAGE_CACHE_CLEAR_FAIL = 'The cache failed to clear or does not exist';
    private const MESSAGE_CACHE_CLEAR_SUCCESS = 'The cache has been cleared successfully';
    protected const ACTIONS = ['clearLoadBalancer', 'clearVideoCache', 'serverStatus'];
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Model\LoadBalancer $balancerModel;
    private \GDPlayer\Service\System\SystemInfo $systemInfo;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\VideoSource $videoSourceModel;
    /**
     * Instantiate the models and the system metrics reader.
     *
     * @param ServerRequestInterface $request incoming Ajax request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Drop the video sources and cached files of the current load balancer.
     *
     * @return string JSON response with the per-area delete flags
     */
    protected function clearLoadBalancer(): string
    {
    }
    /**
     * Drop the sources, player cache and alternative sources of one video.
     *
     * @return string JSON response with the per-area delete flags
     */
    protected function clearVideoCache(): string
    {
    }
    /**
     * Return one group of server metrics, cached for the configured timeout.
     *
     * @return string JSON response holding the requested metrics
     */
    protected function serverStatus(): string
    {
    }
}

/**
 * Endpoint /clear-cache (token admin): balas 'ok'/'fail'.
 */
final class CacheController extends \GDPlayer\View\AbstractView
{
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Endpoint /cron-proxy: validate the proxy list, admin only. JSON reply.
 */
final class CronProxyController extends \GDPlayer\View\AbstractView
{
    private const PROXY_DISABLED = 'The proxy is disabled.';
    private const STATUS_OK = 'The proxies has been successfully validated and can be used.';
    private const UNAUTHORIZED = 'You are not authorized to access this page!';
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Page /administrator/403 (backend layout).
 */
final class ForbiddenController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string
     */
    protected function render(): string
    {
    }
}

/**
 * GET /health-check — metrik ringkas server (koneksi aktif, load, memori).
 */
final class HealthController
{
    /**
     * @return ResponseInterface JSON metrik
     */
    public function index(): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Endpoint migrasi database web (via `/web-migrate` & `/web-migrate.php`):
 * view UI + 4 aksi AJAX (prepare, execute_query, execute_files, finish).
 */
final class MigrationController extends \GDPlayer\View\AbstractView
{
    /**
     * execute_files action: move the legacy uploads folder, regenerate nginx.conf, clear cache.
     *
     * @param Config $config site configuration
     * @param string $tmpQueryFile query holder file
     * @return ResponseInterface JSON response containing the log
     */
    protected function executeFilesAction(\GDPlayer\Config\Config $config, string $tmpQueryFile): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * execute_query action: run a single migration query by index.
     *
     * @param PDO $pdoWrite write connection
     * @param string $tmpQueryFile query holder file
     * @return ResponseInterface JSON response
     */
    protected function executeQueryAction(\PDO $pdoWrite, string $tmpQueryFile): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Build a JSON response for the migration endpoint.
     *
     * @param array<string, mixed> $data reply payload
     * @return ResponseInterface JSON response
     */
    protected function jsonResponse(array $data): \Psr\Http\Message\ResponseInterface
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
     * prepare action: build every migration query and store the list in the temporary file.
     *
     * @param PDO $pdoWrite write connection
     * @param string $tmpQueryFile query holder file
     * @return ResponseInterface JSON response
     */
    protected function prepareAction(\PDO $pdoWrite, string $tmpQueryFile): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Dispatch the migration page: render the UI or run one of its actions.
     *
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Enable/disable MySQL bulk mode during migration.
     *
     * @param PDO $pdoWrite write connection
     * @param bool $enable true at start, false when finished
     * @return void
     */
    protected function setMysqlBulkMode(\PDO $pdoWrite, bool $enable): void
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
    /**
     * Validate the holder file and the query index before execution.
     *
     * @param string $tmpQueryFile query holder file
     * @param int $index requested query index
     * @return ResponseInterface|null error response, or null when valid
     */
    protected function validateQueryIndex(string $tmpQueryFile, int $index): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Open the write connection with 4 attempts (100 ms delay starting from the second attempt).
     *
     * @return PDO|null write connection, null when it still fails
     */
    protected function writeConnection(): ?\PDO
    {
    }
}

/**
 * Assets of the migration endpoint UI: the query queue file name and the migration page HTML.
 *
 * The page is split into two files (rule php:S2042) and reassembled here.
 */
final class MigrationUi
{
    /** Whole migration page; `{{FILENAME}}` is replaced by the entry point file name. */
    public const HTML = \GDPlayer\Modules\System\Controllers\MigrationUiHead::HTML . \GDPlayer\Modules\System\Controllers\MigrationUiBody::HTML;
    /** Holder file for the temporary query list (inside public/). */
    public const QUERY_FILE = 'migrate_queries_temp.json';
}

/**
 * <body> section of the migration page (markup and script).
 *
 * Split out of `MigrationUi` (rule php:S2042) so each file stays slim; the whole
 * page is reassembled by `MigrationUi::HTML`.
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
                    // STEP 1: PREPARE
                    let prepRes = await fetch('?action=prepare');
                    let prepData = await prepRes.json();
    
                    if (prepData.status !== 'success') {
                        throw new Error("Failed to prepare data:" + prepData.message);
                    }
    
                    const totalQueries = prepData.total;
                    addLog(`Preparation successful. Found ${totalQueries} queries to execute.`);
    
                    // STEP 2: EXECUTE QUERIES (one at a time)
                    for (let i = 0; i < totalQueries; i++) {
                        statusText.innerText = `Step 2/3: Execute database query (${i + 1}/${totalQueries})...`;
    
                        let qRes = await fetch(`?action=execute_query&index=${i}`);
                        let qData = await qRes.json();
    
                        if (qData.status === 'success') {
                            // Do not print every success entry, only occasionally, so the browser stays responsive
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
    
                    // STEP 3: MIGRATE FILES & CACHE
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
 * Head section of the migration page (meta, styles).
 *
 * Split out of `MigrationUi` (rule php:S2042) to keep each file lean;
 * the whole page is reassembled by `MigrationUi::HTML`.
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
     * @return ResponseInterface JSON result of Background::run()
     */
    public function index(): \Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Themes\Controllers;

/**
 * Endpoint /administrator/themes/sync: ping (folder contents stamp) & download (send ZIP).
 *
 * The archive is named `<folder>-<stamp>.zip`, so unchanged contents are never rebuilt
 * and never overwritten while being sent to another server.
 */
final class ThemeSyncController extends \GDPlayer\View\AbstractView
{
    /** @var string[] */
    private const ACTIONS = ['ping', 'download'];
    /**
     * @return ResponseInterface
     */
    protected function render(): \Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Users\Controllers;

/**
 * Page /administrator/profile (login required): view & change your own account data.
 */
final class ProfileController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * User management endpoint (list, create, edit, delete, password).
 *
 * Replacement for Ajax\UserAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class UserAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_DELETE_FAIL = 'The user failed to delete';
    private const MESSAGE_DELETE_SUCCESS = 'The user has been successfully deleted';
    private const MESSAGE_EMAIL_EMPTY = 'Email address is required';
    private const MESSAGE_EMAIL_SEND_FAILED = 'Failed to send confirmation email';
    private const MESSAGE_EMAIL_SENT = 'The confirmation email has been successfully sent';
    private const MESSAGE_EMAIL_UPDATE_FAIL = 'The email address failed to update';
    private const MESSAGE_EMAIL_UPDATE_SUCCESS = 'The email address has been successfully updated. Please re-login';
    private const MESSAGE_EMAIL_USED = 'The email address is already in use by another user';
    private const MESSAGE_USERNAME_EMPTY = 'Username is required';
    private const MESSAGE_USERNAME_UPDATE_FAIL = 'The username failed to update';
    private const MESSAGE_USERNAME_UPDATE_SUCCESS = 'The username has been successfully updated. Please re-login';
    private const MESSAGE_USERNAME_USED = 'The username is already in use by another user';
    private const MESSAGE_USER_ID_EMPTY = 'User ID is required';
    private const MESSAGE_USER_NOT_EXISTS = 'User ID does not exists';
    protected const ACTIONS = ['createSearchQuery', 'delete', 'editEmail', 'editUsername', 'sendConfirmationEmail'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Non-admin access denied to User';
    protected const REQUIRE_ADMIN = true;
    protected const REQUIRE_LOGIN = false;
    private \GDPlayer\Service\Login $loginService;
    private \GDPlayer\External\Mailer $mailer;
    private \GDPlayer\Model\User $userModel;
    private \GDPlayer\Model\ViewUser $viewUserModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['name', 'user', 'email', 'status', 'created', 'updated', 'role', 'videos', 'id'];
    /**
     * Initialise the models and services used by the user actions.
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Apply the DataTables search term to the user view model.
     *
     * @param string $search Prefix matched against e-mail, username and name
     * @return ViewUser Configured view model
     */
    protected function createSearchQuery(string $search = ''): \GDPlayer\Model\ViewUser
    {
    }
    /**
     * Delete the user referenced by the request ID.
     *
     * @return string JSON response
     */
    protected function delete(): string
    {
    }
    /**
     * Change the e-mail address of the logged-in user and force a re-login.
     *
     * @return string JSON response
     */
    protected function editEmail(): string
    {
    }
    /**
     * Change the username of the logged-in user and force a re-login.
     *
     * @return string JSON response
     */
    protected function editUsername(): string
    {
    }
    /**
     * Send a confirmation e-mail to the user referenced by the request ID.
     *
     * @return string JSON response
     */
    protected function sendConfirmationEmail(): string
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
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
}

namespace GDPlayer\Modules\Videos\Controllers;

/**
 * Page dmca.php.
 *
 * Result of converting the legacy view; markup & logic kept as-is so the output is identical.
 */
final class DmcaController extends \GDPlayer\View\AbstractView
{
    /**
     * @return string
     */
    protected function render(): string
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
    protected const ACTIONS = ['delete', 'deleteByHostnames', 'dmcaTakedown', 'getAlternatives', 'getServer', 'removePoster', 'rename', 'renameMulti', 'updateStatus', 'deleteSubtitle', 'editSubtitle', 'getSubtitles', 'searchSubtitles'];
    protected const HAS_LIST = true;
    protected const LOG_DENIED_ACTION = 'Unauthorized attempt to access Video';
    protected const MESSAGE_POSTER_REMOVE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_POSTER_REMOVE_FAIL;
    protected const MESSAGE_POSTER_REMOVE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_POSTER_REMOVE_SUCCESS;
    protected const MESSAGE_VIDEO_DELETE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_DELETE_FAIL;
    protected const MESSAGE_VIDEO_DELETE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_DELETE_SUCCESS;
    protected const MESSAGE_VIDEO_NOT_FOUND = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_NOT_FOUND;
    protected const MESSAGE_VIDEO_RENAME_EMPTY = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_RENAME_EMPTY;
    protected const MESSAGE_VIDEO_SAVE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_SAVE_FAIL;
    protected const MESSAGE_VIDEO_SAVE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_SAVE_SUCCESS;
    protected const MESSAGE_VIDEO_UPDATE_FAIL = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_UPDATE_FAIL;
    protected const MESSAGE_VIDEO_UPDATE_SUCCESS = \GDPlayer\Modules\AjaxCatalog::MESSAGE_VIDEO_UPDATE_SUCCESS;
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\External\Maxmind $maxmind;
    private \GDPlayer\Modules\Videos\Controllers\VideoSubtitleAjaxController $subtitleHandler;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    private \GDPlayer\Model\ViewVideo $viewVideoModel;
    /** @var string[] $listColumns */
    protected array $listColumns = ['id', 'title', 'host', 'slug', 'status', 'dmca', 'has_sub', 'views', 'name', 'created', 'updated', 'poster', 'host_id'];
    /**
     * Wire the models and the subtitle handler for this request.
     *
     * @param ServerRequestInterface $request current request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Apply prefix, postfix and search/replace to every renamable video row.
     *
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
    /**
     * Build paginated list SQL (data + count) sharing the same bound params.
     *
     * @param array<string,mixed> $datatableQueryParams
     * @return array{sql:string,sqlNum:string,params:list<mixed>}
     */
    protected function buildListQuery(array $datatableQueryParams): array
    {
    }
    /**
     * Compose the new title from the prefix, the old title, the postfix and the replacement.
     *
     * @param string $title current title
     * @param string $prefix text prepended to the title
     * @param string $postfix text appended to the title
     * @param string $searchPattern substring to replace; an empty value skips the replacement
     * @param string $replacementPattern replacement for the search pattern
     * @return string rebuilt title
     */
    protected function buildProcessedTitle(string $title, string $prefix, string $postfix, string $searchPattern, string $replacementPattern): string
    {
    }
    /**
     * @param string $title
     * @return array{sql:string,params:list<mixed>}
     */
    protected static function createSearchTitle(string $title = ''): array
    {
    }
    /**
     * Delete the video referenced by the `id` request field.
     *
     * @return string JSON AJAX response (not-found, deleted, or failed)
     */
    protected function delete(): string
    {
    }
    /**
     * Delete every video belonging to the `hostnames` request list, for admins only.
     *
     * @return string JSON AJAX response (deleted or failed)
     */
    protected function deleteByHostnames(): string
    {
    }
    /**
     * Delete a subtitle attached to a video.
     *
     * @return string JSON response produced by the subtitle handler
     */
    protected function deleteSubtitle(): string
    {
    }
    /**
     * Apply the `takedown` flag to the DMCA state of the video referenced by `id`.
     *
     * @return string JSON AJAX response (updated or failed)
     */
    protected function dmcaTakedown(): string
    {
    }
    /**
     * Update the text or timing of an existing subtitle.
     *
     * @return string JSON response produced by the subtitle handler
     */
    protected function editSubtitle(): string
    {
    }
    /**
     * List the download links of the primary source and every alternative source.
     *
     * @return string JSON response holding the source list, or an error when the video is missing
     */
    protected function getAlternatives(): string
    {
    }
    /**
     * Resolve the streaming API endpoint and encrypted payload for one video.
     *
     * Accepts a numeric video id (ownership looked up in the database) or a media URL (host and id
     * extracted by {@see Hosting}). Returns the load-balancer API URL plus the encrypted payload and HMAC
     * parameters the player must send.
     *
     * @return string JSON response carrying `url`, `payload` and the HMAC fields
     */
    protected function getServer(): string
    {
    }
    /**
     * List the subtitles stored for a video.
     *
     * @return string JSON response produced by the subtitle handler
     */
    protected function getSubtitles(): string
    {
    }
    /**
     * Clear a video poster, deleting the local file when it is not a remote URL.
     *
     * @return string JSON response with the removal status
     */
    protected function removePoster(): string
    {
    }
    /**
     * Rename a single video from the `name` input.
     *
     * An empty title or an id below one is rejected before any write; the row is
     * only touched when `id`, `title` and `updated` actually change.
     *
     * @return string JSON response with the outcome and message
     */
    protected function rename(): string
    {
    }
    /**
     * Rename the videos named by the posted id list.
     *
     * @return string JSON response describing the outcome
     */
    protected function renameMulti(): string
    {
    }
    /**
     * Search the subtitle provider for candidate subtitles.
     *
     * @return string JSON response produced by the subtitle handler
     */
    protected function searchSubtitles(): string
    {
    }
    /**
     * Set the video status from the `id` request field: disabled when it has no sources.
     *
     * @return string JSON AJAX response (not-found, saved, or failed)
     */
    protected function updateStatus(): string
    {
    }
    /**
     * Return the DataTables JSON payload for the entity list.
     *
     * Sorting falls back to `updated desc` when the client sends no order, and
     * only `ASC`/`DESC` survive sanitisation.
     *
     * @return string JSON response
     */
    public function list(): string
    {
    }
}

/**
 * Pages videos/list.php, videos/subtitles.php, videos/new.php, videos/edit.php.
 */
final class VideoController extends \GDPlayer\View\AbstractView
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
    /**
     * Store a new video from the form (POST branch of the new page).
     *
     * The slug comes from the form or a random suffix; the poster is taken from
     * the uploaded file first and the `poster-url` field second.
     *
     * @param array<string, mixed> $body form data
     * @param string $requestUri request target used as the redirect fallback
     * @param array<string, mixed>|null $userLogin logged-in user passed from newPage(), null for guests
     * @return ResponseInterface redirect response with the save result
     */
    protected function createVideo(array $body, string $requestUri, ?array $userLogin, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\Video $videoModel, \GDPlayer\Model\VideoAlternative $videoAlternativeModel): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Page videos/edit.php.
     *
     * @return string|ResponseInterface
     */
    protected function editPage(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Edit page guard: 404 when the video is missing, DMCA page when a member opens a DMCA video.
     *
     * @param array<string, mixed> $dataVideo video row from the query
     * @return string|ResponseInterface|null response/page, or null when execution may continue
     */
    protected function editPageGuard(array $dataVideo): string|\Psr\Http\Message\ResponseInterface|null
    {
    }
    /**
     * Fetch the Google Drive mirrors of the main video and the alternative source list.
     *
     * @param array<string, mixed> $dataVideo video row from {@see editVideoData()}
     * @param int $videoId video id whose alternatives are loaded
     * @param Hosting $hostingService host service resolving the download link of each alternative
     * @param VideoAlternative $videoAlternativeModel alternative model
     * @param GDriveMirror $gdriveMirrorModel mirror model
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
     * Video row ownership: admin is unrestricted, other users only their own rows (prevents IDOR).
     *
     * @param int $videoId primary key video
     * @return bool true when the request may touch this row
     */
    protected function isVideoOwner(int $videoId): bool
    {
    }
    /**
     * Render the new-video form, or delegate to createVideo() on a POST body.
     *
     * Guests get a 401 page instead of the form.
     *
     * @return string|ResponseInterface
     */
    protected function newPage(): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * @return string|ResponseInterface
     */
    protected function render(): string|\Psr\Http\Message\ResponseInterface
    {
    }
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
     * @param int $videoId video being edited
     * @param Config $configModel configuration used for the direct-link switch
     * @return string edit form markup
     */
    protected function renderEditForm(array $editVideo, array $editSources, int $videoId, \GDPlayer\Config\Config $configModel): string
    {
    }
    /**
     * GET branch of the edit page: run the ownership/DMCA guard, then render the form.
     *
     * @param array<string, mixed> $queryParams query string request
     * @return string|ResponseInterface page markup, or a 403/DMCA/404 response
     */
    protected function renderEditPage(array $queryParams, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\Video $videoModel, \GDPlayer\Model\VideoAlternative $videoAlternativeModel, \GDPlayer\Model\Subtitle $subtitleModel): string|\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Rewrite the stored subtitle order to match the `subs` payload.
     *
     * @param mixed $subs ordered subtitle ids
     * @param Subtitle $subtitleModel subtitle model
     * @param int $time update timestamp
     */
    protected function reorderSubtitles(mixed $subs, \GDPlayer\Model\Subtitle $subtitleModel, int $time): void
    {
    }
    /**
     * Pick the new poster from the upload or the URL field, else keep the stored one.
     *
     * @param array<string, mixed> $body form data
     * @param string $oldPoster currently stored poster
     * @return string file name or URL of the chosen poster
     */
    protected function resolvePosterValue(array $body, string $oldPoster): string
    {
    }
    /**
     * Bootstrap badge class based on the stability score & success rate.
     *
     * @param float $score Stability score 0..100.
     * @param float $rate Success rate 0..100.
     * @return string bootstrap badge class
     */
    protected function telemetryBadge(float $score, float $rate): string
    {
    }
    /**
     * Save video changes from the edit form (POST branch).
     *
     * @param array<string, mixed> $body form data
     * @return ResponseInterface redirect response with the save result
     */
    protected function updateVideo(array $body, string $requestUri, \GDPlayer\Core\Hosting\Hosting $hostingService, \GDPlayer\Model\Video $videoModel, \GDPlayer\Model\VideoAlternative $videoAlternativeModel, \GDPlayer\Model\Subtitle $subtitleModel): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Video export endpoint (generate and download export files).
 *
 * Replacement for Ajax\VideoExportAjax (actions run by AbstractAjaxController, no ReflectionMethod).
 */
final class VideoExportAjaxController extends \GDPlayer\Modules\AbstractAjaxController
{
    private const MESSAGE_VIDEO_EXPORT_FAIL = 'Video list failed to export';
    private const MESSAGE_VIDEO_EXPORT_SUCCESS = 'The video list has been exported successfully';
    protected const ACTIONS = ['exportAsCSV'];
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    /**
     * Instantiate the models and the hosting helper used by the CSV export.
     *
     * @param ServerRequestInterface $request incoming Ajax request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Export the posted video ids to a timestamped CSV file and return its URL.
     *
     * @return string JSON response carrying the public CSV URL
     */
    protected function exportAsCSV(): string
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
    private const MESSAGE_VIDEO_IMPORT_FAIL = 'New video list failed to import';
    private const MESSAGE_VIDEO_IMPORT_SUCCESS = 'The new video list has been successfully imported';
    protected const ACTIONS = ['importVideosBatch'];
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Core\Hosting\Hosting $hosting;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    private \GDPlayer\Model\VideoAlternative $videoAlternativeModel;
    private \GDPlayer\Model\Video $videoModel;
    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    // -------------------------------------------------------------------------
    // Action handlers
    // -------------------------------------------------------------------------
    /**
     * Receives a JSON batch of up to 250 pre-parsed video rows from the frontend,
     * persists them to the database, and returns the inserted rows for the DataTable.
     *
     * POST body (JSON-encoded field "rows"):
     * [
     *   {
     *     "title":     string,
     *     "videos":    string[],          // [0] = main URL, [1..n] = alternatives
     *     "subtitles": [{url, label}],    // already fetched/expanded by frontend
     *     "poster":    string,
     *     "slug":      string
     *   },
     *   ...
     * ]
     *
     * @return string
     */
    protected function importVideosBatch(): string
    {
    }
    /**
     * Keep the usable subtitle entries of an import row, defaulting the label.
     *
     * @param mixed $rawSubtitles
     * @return list<array{url:string,label:string}>
     */
    protected static function normaliseImportSubtitles(mixed $rawSubtitles): array
    {
    }
    /**
     * Keep the non-empty video URLs of an import row.
     *
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
     * Normalise an import row, or reject it when it holds no usable video URL.
     *
     * @param array<mixed, mixed> $row
     * @return array<string, mixed> normalised row, or null when the row has no video
     */
    protected static function validateImportRow(array $row): ?array
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
    private const MESSAGE_SUBTITLE_DELETE_FAIL = 'The subtitle failed to remove';
    private const MESSAGE_SUBTITLE_DELETE_SUCCESS = 'The subtitle has been successfully removed';
    private const MESSAGE_SUBTITLE_NOT_FOUND = 'The subtitle was not found';
    private const MESSAGE_SUBTITLE_UPDATE_FAIL = 'The subtitle file failed to update';
    private const MESSAGE_SUBTITLE_UPDATE_SUCCESS = 'The subtitle file has been successfully updated';
    private const MESSAGE_SUBTITLE_UPLOAD_FAIL = 'The subtitle file failed to upload';
    private const MESSAGE_SUBTITLE_UPLOAD_SUCCESS = 'The subtitle file has been successfully uploaded';
    protected const ACTIONS = ['deleteSubtitle', 'editSubtitle', 'getSubtitles', 'searchSubtitles'];
    protected const REQUIRE_ADMIN = false;
    protected const REQUIRE_LOGIN = true;
    private \GDPlayer\Model\SubtitleManager $subtitleManagerModel;
    private \GDPlayer\Model\Subtitle $subtitleModel;
    /**
     * Bind the subtitle models to the incoming ajax request.
     *
     * @param ServerRequestInterface $request
     * @return string
     */
    public function __construct(protected \Psr\Http\Message\ServerRequestInterface $request)
    {
    }
    /**
     * Delete the subtitle row identified by the `id` request field.
     *
     * @return string JSON response describing the outcome
     */
    public function deleteSubtitle(): string
    {
    }
    /**
     * Replace a subtitle link from an uploaded file or a validated URL.
     *
     * @return string JSON response describing the outcome
     */
    public function editSubtitle(): string
    {
    }
    /**
     * List the subtitles of a video, repairing legacy encoded links on the way.
     *
     * @return string JSON response holding name/url pairs
     */
    public function getSubtitles(): string
    {
    }
    /**
     * Search the subtitle manager table, scoped to the current user unless admin.
     *
     * @return string JSON response holding up to ten id/label/value suggestions
     */
    public function searchSubtitles(): string
    {
    }
}

namespace GDPlayer\Presentation;

/**
 * Twig-based template renderer for the frontend and backend views.
 */
final class HTML
{
    /** @var array<string,Environment> */
    private static array $environments = [];
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Response form (without exit) of {@see createAdminAlertRedirect()}.
     *
     * @param string $type alert type (success/danger/...)
     * @param string $message alert message
     * @param string $url target URL; empty = current request target
     * @return ResponseInterface redirect response + alert cookie
     */
    public static function adminAlertRedirectResponse(string $type, string $message, string $url = ''): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Build a Bootstrap alert box, sanitising the message and its attributes.
     *
     * @param string $type alert type; unknown values fall back to `primary`
     * @param string $message message HTML; tags outside the allow list are stripped
     * @return string rendered alert markup
     */
    public static function alertBox(string $type = '', string $message = ''): string
    {
    }
    /**
     * Store the alert in short-lived cookies and redirect, ending the request.
     *
     * @param string $type Alert type (success/danger/...).
     * @param string $message alert message
     * @param string $url target URL; empty uses the current request target
     * @return never
     */
    public static function createAdminAlertRedirect(string $type, string $message, string $url = ''): never
    {
    }
    /**
     * Render the embed iframe, using the configured custom code when present.
     *
     * @param string $embedUrl source URL of the embedded page
     * @param string $title iframe title attribute
     * @return string HTML markup of the iframe
     */
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
    /**
     * Return the PSR-7 request bound to the current runtime.
     *
     * @return null|ServerRequestInterface active request, null outside a request
     */
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
     * @return null|TemplateWrapper
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
    /**
     * @param string $template
     * @param array<string,mixed> $context
     * @param bool $frontend
     * @return string
     */
    public static function renderTemplate(string $template, array $context = [], bool $frontend = true): string
    {
    }
    /**
     * Bind the PSR-7 request for the current runtime.
     *
     * @param null|ServerRequestInterface $request request to expose to the renderer
     */
    public static function setRequest(?\Psr\Http\Message\ServerRequestInterface $request): void
    {
    }
    /**
     * Render a pending alert from the cookies and clear them.
     *
     * @param string $type fallback alert type when no cookie is present
     * @param string $message fallback message when no cookie is present
     * @return string rendered alert markup, or an empty string when there is nothing to show
     */
    public static function showAdminAlert(string $type = 'info', string $message = ''): string
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
     * @param ServerRequestInterface $request
     * @return ResponseInterface|null Ajax controller response; null on failure (already logged)
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
 * Ajax route table data (REST modules and public modules).
 *
 * Split out of `RouteTable` (rule php:S2042): large data, no behaviour.
 */
final class AjaxRouteTable
{
    /** Ajax modules with no login guard (public endpoints): the auth middleware is skipped. */
    public const AJAX_PUBLIC_MODULES = ['/administrator/ajax/public'];
    /**
     * Ajax groups that already expose REST routes: prefix => [class, action list, has list?].
     *
     * `list` (DataTables) is served through GET `<prefix>/list` when the class overrides `list()`.
     *
     * @var array<string, array{0: class-string<AbstractAjaxController>, 1: string[], 2: bool}>
     */
    public const AJAX_REST_MODULES = ['/administrator/ajax/admin-api' => [\GDPlayer\Modules\System\Controllers\AdminApiController::class, ['clearLoadBalancer', 'clearVideoCache', 'serverStatus'], false], '/administrator/ajax/dashboard' => [\GDPlayer\Modules\Dashboard\Controllers\DashboardAjaxController::class, ['popularASN', 'popularBrowsers', 'popularCountries', 'popularVideos', 'recentVideos', 'serversStatus', 'videosStatus', 'views'], false], '/administrator/ajax/gdrive-accounts' => [\GDPlayer\Modules\GDrive\Controllers\GDriveAccountAjaxController::class, ['delete', 'updateBypass', 'updateStatus'], true], '/administrator/ajax/gdrive-backup-files' => [\GDPlayer\Modules\GDrive\Controllers\GDriveMirrorAjaxController::class, ['delete'], true], '/administrator/ajax/gdrive-backup-queue' => [\GDPlayer\Modules\GDrive\Controllers\GDriveQueueAjaxController::class, ['copy', 'delete'], true], '/administrator/ajax/gdrive-files' => [\GDPlayer\Modules\GDrive\Controllers\GDriveFileAjaxController::class, ['createDataList', 'createNewFolder', 'delete', 'deleteMirror', 'gdriveImport', 'getSharedDrives', 'removeDuplicateFiles', 'removeDuplicateFilesByData', 'renameFileFolder', 'updateStatus'], true], '/administrator/ajax/load-balancers' => [\GDPlayer\Modules\LoadBalancers\Controllers\LoadBalancerAjaxController::class, ['delete', 'updateStatus'], true], '/administrator/ajax/profile' => [\GDPlayer\Modules\Users\Controllers\UserAjaxController::class, ['createSearchQuery', 'delete', 'editEmail', 'editUsername', 'sendConfirmationEmail'], true], '/administrator/ajax/public' => [\GDPlayer\Modules\PublicEndpoint\Controllers\PublicAjaxController::class, ['checkEmail', 'checkUsername', 'clearVideoCache', 'createPlayer', 'gdriveBypassLimit', 'getLoadBalancerList', 'isPublicRequestValid', 'saveBulkProcess', 'statCounter'], false], '/administrator/ajax/sessions' => [\GDPlayer\Modules\Sessions\Controllers\SessionAjaxController::class, ['delete'], true], '/administrator/ajax/settings' => [\GDPlayer\Modules\Settings\Controllers\SettingAjaxController::class, ['clearAllCache', 'clearHtmlCache', 'clearLoadBalancer', 'clearSettingsCache', 'clearVideosCache', 'clearVideosFiles', 'createCustomVast', 'hasDeletedCacheTmpDir', 'deleteCustomVast', 'disableBlacklistedVideos', 'getDependencies', 'hideExtDialog', 'resetHosts', 'saveLicense'], false], '/administrator/ajax/subtitles' => [\GDPlayer\Modules\Subtitles\Controllers\SubtitleAjaxController::class, ['createSearchQuery', 'delete', 'getHosts', 'migrate', 'rename', 'uploadSubtitle'], true], '/administrator/ajax/users' => [\GDPlayer\Modules\Users\Controllers\UserAjaxController::class, ['createSearchQuery', 'delete', 'editEmail', 'editUsername', 'sendConfirmationEmail'], true], '/administrator/ajax/videos' => [\GDPlayer\Modules\Videos\Controllers\VideoAjaxController::class, ['delete', 'deleteByHostnames', 'deleteSubtitle', 'dmcaTakedown', 'editSubtitle', 'getAlternatives', 'getServer', 'getSubtitles', 'removePoster', 'rename', 'renameMulti', 'searchSubtitles', 'updateStatus'], true], '/administrator/ajax/videos-export' => [\GDPlayer\Modules\Videos\Controllers\VideoExportAjaxController::class, ['exportAsCSV'], false], '/administrator/ajax/videos-import' => [\GDPlayer\Modules\Videos\Controllers\VideoImportAjaxController::class, ['importVideosBatch'], false]];
}

/**
 * Ajax and view handlers plus route naming utilities.
 */
final class RouteHandlerFactory
{
    /**
     * Ajax route handler: the controller is built per request, the action is guaranteed by the route list.
     *
     * @param class-string<AbstractAjaxController> $class controller class
     * @param string $action action name
     * @return callable(ServerRequestInterface): ResponseInterface route handler
     */
    public static function ajaxHandler(string $class, string $action): callable
    {
    }
    /**
     * Ajax route handler for `list` (DataTables).
     *
     * @param class-string<AbstractAjaxController> $class controller class
     * @return callable(ServerRequestInterface): ResponseInterface route handler
     */
    public static function ajaxHandlerList(string $class): callable
    {
    }
    /**
     * Turn a camelCase action name into a kebab-case URL segment (updateStatus -> update-status).
     *
     * @param string $action action name
     * @return string URL segment
     */
    public static function kebabCase(string $action): string
    {
    }
    /**
     * Wrap a view controller as a handler: request+response are injected through the constructor.
     *
     * @param class-string<AbstractView> $class view class
     * @param string $action requested action
     * @return callable(ServerRequestInterface): ResponseInterface
     */
    public static function viewHandler(string $class, string $action): callable
    {
    }
}

/**
 * Route table for the administrator area, ajax REST endpoints, the plugin API and auth pages.
 *
 * The CALL ORDER of the methods here is part of the behaviour: FastRoute rejects static routes
 * registered after a variable route that could match them. Do not reorder without running
 * `php scripts/check_route_table.php --compare=tmp/baseline/route-table.json`.
 */
final class RouteRegistrarAdmin
{
    /**
     * Register the administrator endpoints that share the full admin middleware: the settings and
     * theme sync routes, the gdrive file manager and the plugin list/status/uninstall actions.
     *
     * @param Router $router router receiving the routes
     * @param AdminAuthMiddleware $adminOnly admin-mode middleware
     * @return void
     */
    public static function registerAdminEndpointRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly): void
    {
    }
    /**
     * Backend pages (per-row auth middleware) + plugins/install endpoints.
     *
     * Row order matches the legacy table exactly. `$adminOnly` is only used by rows that need
     * full admin rights; `$loggedIn` covers pages that only need a session.
     *
     * @param AdminAuthMiddleware $adminOnly admin-mode middleware
     * @param AdminAuthMiddleware $loggedIn login-mode middleware
     * @return list<array{0: string, 1: class-string<AbstractView>, 2: string, 3: AdminAuthMiddleware}>
     */
    public static function registerAdminPageRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $loggedIn): array
    {
    }
    /**
     * Register the REST Ajax endpoints, one group per module.
     *
     * The action becomes the URL segment (kebab-cased); modules flagged public skip the auth middleware.
     *
     * @param Router $router router receiving the routes
     * @return void
     */
    public static function registerAjaxRestRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Register `/api` and its catch-all sub-path for every REST verb.
     *
     * @param Router $router router receiving the routes
     * @return void
     */
    public static function registerApiRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Register the unguarded authentication pages and the 403 page.
     *
     * @param Router $router router receiving the routes
     * @return void
     */
    public static function registerAuthRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Health routes (used by monitors/load balancers).
     */
    public static function registerHealthRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Register the JSON endpoints, with an admin middleware per row.
     *
     * @param Router $router router receiving the routes
     * @param AdminAuthMiddleware $adminOnly admin-mode middleware
     * @return void
     */
    public static function registerJsonEndpointRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly): void
    {
    }
}

/**
 * Route table for the public frontend: pages, media proxies, stream handlers and backend views.
 */
final class RouteRegistrarFrontend
{
    /**
     * Register the frontend JSON/AJAX endpoints on both the exact and wildcard path.
     *
     * @param Router $router router receiving the routes
     */
    public static function registerFrontendEndpointRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Register page routes, legacy entry points, engine fallbacks and player pages.
     *
     * @param Router $router router receiving the routes
     * @param AdminAuthMiddleware $adminOnly middleware applied to admin-only legacy entries
     */
    public static function registerFrontendPageRoutes(\GDPlayer\Routing\Router $router, \GDPlayer\Routing\Middleware\AdminAuthMiddleware $adminOnly): void
    {
    }
    /**
     * Register public media routes: info pages, poster/filmstrip/subtitle and stream handlers.
     *
     * @param Router $router router receiving the routes
     */
    public static function registerMediaRoutes(\GDPlayer\Routing\Router $router): void
    {
    }
    /**
     * Backend page rows: GET+POST per row (the old view serves POST on the same path).
     *
     * @param list<array{0: string, 1: class-string<AbstractView>, 2: string, 3: AdminAuthMiddleware}> $views
     */
    public static function registerViewRoutes(\GDPlayer\Routing\Router $router, array $views): void
    {
    }
}

/**
 * Route table plus request dispatch.
 *
 * Two layers:
 *  1. New routes are registered in {@see register()} (league/route): the tables live in
 *     `RouteRegistrarAdmin` + `RouteRegistrarFrontend`, and which paths the router owns is decided
 *     by `RouterOwnership`.
 *  2. Legacy branches were moved verbatim from public/index.php (F1.10) while their views are not
 *     controllers yet — kept identical so the URL baseline does not change.
 */
final class RouteRegistry
{
    /**
     * Ajax modules whose legacy URL alias (/administrator/ajax/<slug> + `action` payload) is now
     * served by a new controller, not Views::loadAjax + ReflectionMethod.
     *
     * @var array<string, class-string<AbstractAjaxController>>
     */
    protected const AJAX_ALIAS_CONTROLLERS = ['admin-api' => \GDPlayer\Modules\System\Controllers\AdminApiController::class, 'dashboard' => \GDPlayer\Modules\Dashboard\Controllers\DashboardAjaxController::class, 'gdrive-accounts' => \GDPlayer\Modules\GDrive\Controllers\GDriveAccountAjaxController::class, 'gdrive-backup-files' => \GDPlayer\Modules\GDrive\Controllers\GDriveMirrorAjaxController::class, 'gdrive-backup-queue' => \GDPlayer\Modules\GDrive\Controllers\GDriveQueueAjaxController::class, 'gdrive-files' => \GDPlayer\Modules\GDrive\Controllers\GDriveFileAjaxController::class, 'load-balancers' => \GDPlayer\Modules\LoadBalancers\Controllers\LoadBalancerAjaxController::class, 'profile' => \GDPlayer\Modules\Users\Controllers\UserAjaxController::class, 'public' => \GDPlayer\Modules\PublicEndpoint\Controllers\PublicAjaxController::class, 'sessions' => \GDPlayer\Modules\Sessions\Controllers\SessionAjaxController::class, 'settings' => \GDPlayer\Modules\Settings\Controllers\SettingAjaxController::class, 'subtitles' => \GDPlayer\Modules\Subtitles\Controllers\SubtitleAjaxController::class, 'users' => \GDPlayer\Modules\Users\Controllers\UserAjaxController::class, 'videos' => \GDPlayer\Modules\Videos\Controllers\VideoAjaxController::class, 'videos-export' => \GDPlayer\Modules\Videos\Controllers\VideoExportAjaxController::class, 'videos-import' => \GDPlayer\Modules\Videos\Controllers\VideoImportAjaxController::class];
    /** @var array<string, mixed> */
    private array $config;
    private readonly \GDPlayer\Routing\RouterOwnership $ownership;
    /**
     * @param Router $router registered router
     * @param ServerRequestInterface $request active request
     * @param array<string, mixed> $config site configuration read by Application
     */
    public function __construct(protected readonly \GDPlayer\Routing\Router $router, private readonly \Psr\Http\Message\ServerRequestInterface $request, array $config = [])
    {
    }
    /**
     * Run the request: try the router first, then the legacy branch.
     *
     * @return ResponseInterface|null response to send; null when output was already written
     *                                  directly by the legacy path (view/streaming handler)
     */
    public function dispatch(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register every route on the router.
     *
     * The loose-slug routes are registered last (see the comment in the method body).
     */
    public static function register(\GDPlayer\Routing\Router $router): void
    {
    }
}

/**
 * Route table data: router-owned paths, prefixes/patterns, and the Ajax route tables.
 *
 * Why not constants inside the registrar/ownership classes: PHP 8.1 (the project minimum) does
 * not allow trait constants, and the data is shared, so it is collected here and
 * `RouteRegistry`, `RouteRegistrarAdmin`/`RouteRegistrarFrontend` and `RouterOwnership` read it.
 */
final class RouteTable
{
    private const AJAX_PATTERN_HEAD = '#^/administrator/ajax/(admin-api|dashboard|gdrive-accounts|';
    private const AJAX_PATTERN_HEAD_2 = 'gdrive-backup-files|gdrive-backup-queue';
    private const AJAX_PATTERN_MID = '|gdrive-files|load-balancers|profile|public|sessions|';
    private const AJAX_PATTERN_MID_2 = 'settings|subtitles|users|videos';
    private const AJAX_PATTERN_TAIL = '|videos-export|videos-import)/.+#';
    /** Ajax modules without a login guard (public endpoints); the data lives in {@see AjaxRouteTable}. */
    public const AJAX_PUBLIC_MODULES = \GDPlayer\Routing\AjaxRouteTable::AJAX_PUBLIC_MODULES;
    /** Ajax REST module table; the data lives in {@see AjaxRouteTable}. */
    public const AJAX_REST_MODULES = \GDPlayer\Routing\AjaxRouteTable::AJAX_REST_MODULES;
    /** Frontend slugs without a theme — once `includes/views/frontend` views, now core controllers. */
    public const FRONTEND_SHORTCUT = ['api-config', 'stream-vid', 'stream-ts', 'stream-seg', 'hls', 'mpd', 'poster', 'subtitle', 'filmstrip', 'telemetry'];
    /** Config key that overrides a player page slug => the name of its view file. */
    public const FRONTEND_SLUG_CONFIG = ['slug_embed' => 'embed.php', 'slug_download' => 'download.php', 'slug_request' => 'embed2.php'];
    /** Player page view file names for the legacy default slugs (e/d/r). */
    public const FRONTEND_SLUG_FILES = ['e' => 'embed.php', 'd' => 'download.php', 'r' => 'embed2.php'];
    /**
     * Static paths already served by the router (controllers). The rest falls back to the
     * legacy branch until their views are migrated as well.
     *
     * @var string[]
     */
    public const ROUTER_OWNED_PATHS = ['/ping', '/health-check', '/embed.php', '/embed2.php', '/web-migrate.php', '/web-migrate', '/administrator/dashboard', '/administrator/log', '/administrator/users/list', '/administrator/users/new', '/administrator/users/edit', '/administrator/users/sessions', '/administrator/403', '/administrator/dmca', '/changelog', '/sharer', '/clear-cache', '/hls', '/mpd', '/stream-seg', '/stream-ts', '/stream-vid', '/administrator/login', '/administrator/register', '/administrator/reset-password', '/administrator/gdrive/list', '/administrator/gdrive/backup-files', '/administrator/gdrive/backup-queue', '/administrator/load-balancers/list', '/administrator/videos/list', '/administrator/videos/subtitles', '/administrator/settings/ads', '/administrator/settings/sync', '/administrator/themes/sync', '/administrator/gdrive/edit', '/administrator/gdrive/files', '/administrator/plugins/list', '/administrator/plugins/config', '/administrator/plugins/status', '/administrator/plugins/install', '/administrator/plugins/sync', '/administrator/plugins/uninstall', '/administrator/gdrive/new', '/administrator/load-balancers/edit', '/administrator/load-balancers/new', '/administrator/videos/new', '/administrator/videos/edit', '/administrator/settings/custom-headers', '/administrator/settings/general', '/administrator/settings/hosting', '/administrator/settings/misc', '/administrator/settings/player', '/administrator/settings/public', '/administrator/settings/reset', '/administrator/settings/shortlink', '/administrator/settings/smtp', '/administrator/settings/site', '/administrator/profile'];
    /**
     * Regex patterns of the paths already served by the router.
     *
     * @var string[]
     */
    public const ROUTER_OWNED_PATTERNS = ['#^/redirect(/|$)#', '#^/(stream-seg|stream-ts|stream-vid)[2-3](/|$)#', self::AJAX_PATTERN_HEAD . self::AJAX_PATTERN_HEAD_2 . self::AJAX_PATTERN_MID . self::AJAX_PATTERN_MID_2 . self::AJAX_PATTERN_TAIL, '#^/administrator/ajax/sessions/.+#', '#^/administrator/ajax/load-balancers/.+#'];
    /**
     * Router-owned paths including ALL of their sub-paths, because the legacy views only
     * inspect the first segment (e.g. `/api/x` is still served by api.php).
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
        // Streaming slugs: their sub-paths belong to the router too (the legacy views only
        // inspect the first segment, and plugin override views used to handle /stream-ts/<x>) — F7.3.
        '/hls',
        '/mpd',
        '/stream-seg',
        '/stream-ts',
        '/stream-vid',
    ];
    /** FastRoute catch-all route suffix: used to serve sub-paths (`/x/{path:.*}`). */
    public const WILDCARD = '/{path:.*}';
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
    private \League\Route\Router $router;
    /**
     * @param LeagueRouter|null $router league/route instance; share across workers when needed
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
     * @param MiddlewareInterface ...$middleware middleware specific to this route
     * @return Route
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
     * @param ServerRequestInterface $request request aktif
     * @param string $path path relative to BASE_URL, starting with "/"
     * @return ResponseInterface handler/middleware response
     */
    public function dispatch(\Psr\Http\Message\ServerRequestInterface $request, string $path): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Register a GET route.
     *
     * @param string $path path pattern, e.g. "/administrator/videos/{id}"
     * @param callable|array{class-string|object, string}|string $handler callable, [object, method], or class name
     * @param MiddlewareInterface ...$middleware middleware specific to this route
     * @return Route
     */
    public function get(string $path, callable|array|string $handler, \Psr\Http\Server\MiddlewareInterface ...$middleware): \League\Route\Route
    {
    }
    /**
     * Group routes under one prefix, e.g. group('/administrator/users', ...).
     *
     * @param string $prefix path prefix
     * @param callable(RouteGroup): void $group route registration callback
     * @return RouteGroup
     */
    public function group(string $prefix, callable $group): \League\Route\RouteGroup
    {
    }
    /**
     * Middleware for every route registered after this line.
     *
     * @param MiddlewareInterface $middleware router-wide middleware
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
     * @param MiddlewareInterface ...$middleware middleware specific to this route
     * @return Route
     */
    public function post(string $path, callable|array|string $handler, \Psr\Http\Server\MiddlewareInterface ...$middleware): \League\Route\Route
    {
    }
    /**
     * @return LeagueRouter the league/route instance inside
     */
    public function unwrap(): \League\Route\Router
    {
    }
}

/**
 * Path ownership: whether a path is served by the router or falls back to the legacy branch.
 *
 * The path/prefix/pattern lists live in `RouteTable`; the slug helpers (`pageSlug()`, `slugPage()`,
 * `frontendTarget()`) live here because only the ownership logic and the loose-slug handler use them.
 */
final class RouterOwnership
{
    /**
     * @param array<string, mixed> $config site configuration
     */
    public function __construct(private readonly array $config)
    {
    }
    /**
     * Controller class + action for one frontend page slug.
     *
     * @param string $page slug without slashes (e.g. 'e', 'ads', 'sitemap.xml')
     * @param array<string, mixed> $config site configuration
     * @return array{0: class-string<AbstractView>, 1: string}|null class+action pair; null when the
     *                                                            slug is not core-owned
     */
    public static function frontendTarget(string $page, array $config): ?array
    {
    }
    /**
     * Is this path served by the router instead of the legacy branch.
     *
     * @param string $path path relative to BASE_URL
     * @return bool true when this path is already router-owned
     */
    public function isOwned(string $path): bool
    {
    }
    /**
     * Slug of a path: first segment, extension stripped — same as the old view's $page
     * (e.g. /sitemap.xml -> sitemap, /poster/xxx -> poster).
     *
     * @param string $path path relative to BASE_URL
     * @return string slug without slashes
     */
    public static function pageSlug(string $path): string
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
    public static function slugPage(string $page, array $config): string
    {
    }
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
     * Sync routes that authenticate themselves via the `secure` parameter (= SECURE_SALT),
     * because the caller is this same instance via cron/CLI without an admin cookie
     * (`ThemeManager`/`PluginManager::getSyncDownloadUrl()`). The salt is re-verified in the controller;
     * without this exception, cron always gets a 401 and theme/plugin sync fails.
     *
     * @var string[]
     */
    private const SALT_AUTH_PATHS = ['/administrator/themes/sync', '/administrator/settings/sync', '/administrator/plugins/sync'];
    /**
     * Bind the access level the protected routes require.
     *
     * @param bool $requireAdmin true: role 0 only; false: login is enough
     */
    public function __construct(private readonly bool $requireAdmin = true)
    {
    }
    /**
     * Reject unauthenticated requests, then hand the request to the next handler.
     *
     * @param ServerRequestInterface $request active request
     * @param RequestHandlerInterface $handler next handler
     * @return ResponseInterface 401/403 when unauthorised, otherwise the handler response
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
    private const MESSAGE_UNAUTHORIZE = 'You are not authorized to access this feature';
    /**
     * @param bool $requireAdmin true: role 0 only; false: login is enough
     */
    public function __construct(private readonly bool $requireAdmin = true)
    {
    }
    /**
     * @param ServerRequestInterface $request request aktif
     * @param RequestHandlerInterface $handler next handler
     * @return ResponseInterface 401/403 JSON when unauthorised, otherwise the handler response
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
     * @param ResponseInterface $response base response
     * @return ResponseInterface response with CORS headers
     */
    public static function apply(\Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * @param ServerRequestInterface $request request aktif
     * @param RequestHandlerInterface $handler next handler
     * @return ResponseInterface response with CORS headers
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
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
    /** Server configuration files rendered by the application (Apache/LiteSpeed + nginx). */
    private const CONFIG_FILES = ['public/.htaccess', 'resources/nginx/site.d/nginx.conf'];
    /** Recognized engine suffixes: Swoole and RoadRunner. */
    private const SUFFIXES = ['2', '3'];
    /**
     * Engine suffix usable by this install: the first active engine plugin whose process is
     * alive AND whose reverse proxy configuration is installed; '' when none.
     *
     * Taken from active plugins in the same record order as the legacy view, so
     * installs without a reverse proxy keep using the PHP path with no redirect.
     * An active plugin whose service worker is stopped must not contribute its suffix:
     * playlist segment URLs would then point at `stream-*<suffix>` endpoints that cannot
     * serve, so streaming has to stay on the PHP path.
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

/**
 * Shared read layer over `tb_orders_users`, the bridge between `tb_users` and `tb_orders`.
 *
 * The table is owned and created by the billing plugin, never by a core migration. It is
 * absent on installations that do not use billing, so every read is guarded and a missing
 * table simply means "no entitlement".
 *
 * Ownership is namespaced: one plugin may own several products, so a gate checks either a
 * single `product_code` or every active row of an `owner` (for example `api`, `xvs`).
 */
final class Entitlement
{
    /** Line status that grants access while `period_end` is in the future. */
    private const ACTIVE = 'active';
    private static ?bool $available = null;
    /**
     * Latest active `period_end` for one product, or 0 when there is none.
     */
    public static function activeUntil(int $uid, string $productCode): int
    {
    }
    /**
     * Whether the user holds any active entitlement owned by a plugin or theme.
     */
    public static function hasActiveOwner(int $uid, string $owner): bool
    {
    }
    /**
     * Whether the user holds an active entitlement for one product.
     */
    public static function hasActiveProduct(int $uid, string $productCode): bool
    {
    }
    /**
     * Drop the memoised readiness flag (used after schema changes and by tests).
     */
    public static function reset(): void
    {
    }
}

/**
 * Authentication service for login, registration tokens and session handling.
 */
final class Login
{
    private ?\Psr\Http\Message\ServerRequestInterface $request = null;
    private \GDPlayer\Core\Security\Security $security;
    private \GDPlayer\Model\Session $session;
    private string $userIP = '';
    /**
     * Bind the security, session and geolocation services.
     *
     * @param ServerRequestInterface|null $request PSR-7 request, or null to fall back to globals
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
     * @return array<string,string|int|float|null>|null
     */
    public static function getCurrentUser(string $customToken = '', ?\Psr\Http\Message\ServerRequestInterface $request = null): ?array
    {
    }
    /**
     * Return the id of the logged-in user, falling back to the configured public video user.
     *
     * @return int
     */
    public static function getPublicUserId(?\Psr\Http\Message\ServerRequestInterface $request = null): int
    {
    }
    /**
     * The token cookie must stay readable by JavaScript: `main-v4.0.3.js` reads it with js-cookie
     * and forwards it as `Authorization: Bearer` plus a `token` body field on every Ajax call,
     * including calls to other load-balancer hosts where the cookie is not sent at all.
     * Marking it HttpOnly makes `Cookies.get("adv_token")` return undefined, so those requests
     * would carry "Bearer undefined" and lose authentication.
     *
     * @param array<string,mixed> $dataUser
     * @param string $expiredAt
     * @return bool
     */
    public function hasSavedLoginData(array $dataUser, string $expiredAt): bool
    {
    }
    /**
     * Accept a token only when it resolves to an active user with the admin role.
     *
     * @param string $token token to validate; empty falls back to the request cookie
     * @param ?ServerRequestInterface $request request used for cookie and header lookup
     * @return bool
     */
    public static function isAdminTokenValid(string $token = '', ?\Psr\Http\Message\ServerRequestInterface $request = null): bool
    {
    }
    /**
     * Tell whether the current session belongs to an administrator.
     *
     * @return bool
     */
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
     * Revoke the session and clear the HttpOnly auth cookie.
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
     * @return null|array<string,string|int|float|null>
     */
    public function tokenValidation(string $token): ?array
    {
    }
}

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

/**
 * Full-page HTML cache, read before dispatch and filled after it.
 *
 * The key is an HMAC over the visitor identity (login token, its expiry, user agent,
 * language, dark-mode cookie) and the request (host, path, normalised query string).
 * A page rendered for one visitor therefore never reaches another visitor, and the
 * entry lifetime never outlives the login session that produced it.
 */
final class PageCache
{
    /** Query parameters that only exist to bust caches. */
    private const IGNORED_QUERY = ['_', 't', 'nocache', 'clearCache'];
    /** Key namespace inside the instance prefix. */
    private const KEY_PREFIX = 'html_';
    /** Key layout marker: bump to retire every entry written by an older layout. */
    private const LAYOUT = 'v3';
    /** Request methods that never change state, so they may read the cache. */
    private const SAFE_METHODS = ['GET', 'HEAD'];
    /** Field separator for the HMAC input, so fields cannot be shifted into each other. */
    private const SEPARATOR = "\x1f";
    /** Tag whose version is bumped after every write request, so edited pages are not served. */
    private const TAG = 'page';
    /**
     * Default page lifetime in seconds.
     *
     * ponytail: 300 s keeps a manual reload inside the window; a page edited outside this
     * app stays stale that long. Lower it back if external writers ever touch the tables.
     */
    public const TTL = 300;
    /**
     * Retire every cached page. Called after a write request, so an edited page is never served.
     *
     * @return int 1 when the version was bumped, 0 when storage failed
     */
    public static function invalidate(): int
    {
    }
    /**
     * Tell whether a finished request must retire the cached pages.
     *
     * @param ServerRequestInterface $request finished request
     * @return bool true when the cache must be wiped
     */
    public static function isInvalidationRequired(\Psr\Http\Message\ServerRequestInterface $request): bool
    {
    }
    /**
     * Build the storage key for one page of one visitor.
     *
     * @param ServerRequestInterface $request active request
     * @param string $token login token, empty for a guest
     * @param int $expiresAt login session expiry, 0 for a guest
     * @return string key without the instance prefix
     */
    public static function key(\Psr\Http\Message\ServerRequestInterface $request, string $token, int $expiresAt): string
    {
    }
    /**
     * Return the cached page of this request, or null when it has to be rendered.
     *
     * @param ServerRequestInterface $request active request
     * @return string|null cached HTML, null on a miss or when the request may not use the cache
     */
    public static function lookup(\Psr\Http\Message\ServerRequestInterface $request): ?string
    {
    }
    /**
     * Store the finished page of this request, when it is a full HTML page.
     *
     * @param ServerRequestInterface $request active request
     * @param ResponseInterface $response finished response
     * @return int 1 when the entry was stored, 0 otherwise
     */
    public static function store(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): int
    {
    }
}

/**
 * Login token codec plus the revocation list.
 *
 * Token shape: `v2.<base64url(expires:random)>.<base64url(hmac)>`. The expiry travels
 * inside the token so a cache entry (and its TTL) can be scoped to the session without
 * reading `tb_sessions`; only the HMAC is trusted, the payload is never taken on its own.
 */
final class SessionToken
{
    /** Longest configured session (`+7 days`): ceiling for a revocation marker. */
    private const MAX_REVOKE_TTL = 604800;
    /** Revocation marker prefix, followed by the token fingerprint. */
    private const REVOKED_PREFIX = 'revoked_';
    /** Bytes of the HMAC kept inside the token (128 bit). */
    private const SIGNATURE_BYTES = 16;
    /** Token format marker; bump when the payload layout or the signature changes. */
    public const VERSION = 'v2';
    /**
     * Read the session expiry from a token.
     *
     * @param string $token raw token
     * @param int|null $now clock override, defaults to the current time
     * @return int|null unix expiry timestamp, or null when the token is malformed, forged or expired
     */
    public static function expiresAt(string $token, ?int $now = null): ?int
    {
    }
    /**
     * Fingerprint a value with the installation secret (HMAC-SHA256, 128 bit).
     *
     * Used for the revocation key and for the page cache key: the raw token never
     * becomes a storage key, so a Redis dump never exposes a usable credential.
     *
     * @param string $value value to fingerprint
     * @return string hex digest, empty when the installation secret is missing
     */
    public static function fingerprint(string $value): string
    {
    }
    /**
     * Read the token sent by the client: the Bearer header wins over the `adv_token` cookie.
     *
     * @param ServerRequestInterface|null $request request to read, current one when null
     * @return string raw token, empty when the client sent none
     */
    public static function fromRequest(?\Psr\Http\Message\ServerRequestInterface $request = null): string
    {
    }
    /**
     * Tell whether the installation secret needed to sign and fingerprint tokens exists.
     *
     * @return bool false when `SECURE_SALT` is missing, which disables the fast paths
     */
    public static function isConfigured(): bool
    {
    }
    /**
     * Tell whether a token was revoked after it left the login page.
     *
     * @param string $token raw token
     * @return bool true when the revocation marker exists
     */
    public static function isRevoked(string $token): bool
    {
    }
    /**
     * Build a signed token for the given session expiry.
     *
     * @param int $expiresAt unix timestamp the session ends
     * @return string token stored in `tb_sessions.token` and in the `adv_token` cookie
     */
    public static function issue(int $expiresAt): string
    {
    }
    /**
     * Mark a token as revoked so the page cache stops honouring it immediately.
     *
     * @param string $token raw token
     * @param int $expiresAt session expiry, used to bound the marker; 0 falls back to the ceiling
     * @return int 1 when the marker was stored, 0 otherwise
     */
    public static function revoke(string $token, int $expiresAt = 0): int
    {
    }
}

/**
 * Upload handler for posters and subtitle files (PSR-7 aware).
 */
final class Upload
{
    /**
     * Expose the application info block instead of the upload state.
     *
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
     * psr7:UploadedFileInterface
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
     * Validate and store an uploaded poster image.
     *
     * The extension must be jpg, jpeg, gif, png or webp, the content must really be an image and
     * the size must stay under 5 MB. Rejected uploads are unlinked.
     *
     * @param mixed $file PSR-7 uploaded file, or an array wrapping one
     * @return string|false stored path, or false when the upload was rejected
     */
    public static function uploadPoster(mixed $file = null): string|false
    {
    }
    /**
     * Validate and store an uploaded subtitle file.
     *
     * The extension must be one of the accepted subtitle formats, the file must not be PHP and the
     * size must stay under 2 MB. Rejected uploads are unlinked.
     *
     * @param mixed $file PSR-7 uploaded file, or an array wrapping one
     * @return string|false stored path, or false when the upload was rejected
     */
    public static function uploadSubtitleFile(mixed $file = null): string|false
    {
    }
}

namespace GDPlayer\Service\Background;

/**
 * Background task runner and system-activity monitor.
 *
 * Spawns and supervises worker scripts, reports resource usage and manages
 * the download queue, honoring the cache/download settings.
 */
class Background
{
    private bool $allowDownload = false;
    private \GDPlayer\Config\Config $config;
    private string $downloadFile = \GDPlayer\Config\App::RESOURCES_PATH . 'bin/bg_download.php';
    private string $lockKey = 'background_download-progress';
    /** @var ConnMonitor connection counter and browser cleanup */
    protected \GDPlayer\Service\Background\ConnMonitor $connections;
    /** @var PluginWorker plugin daemon lifecycle */
    protected \GDPlayer\Service\Background\PluginWorker $plugins;
    /** @var ProcessControl process spawning and termination */
    protected \GDPlayer\Service\Background\ProcessControl $processes;
    /**
     * Load the download settings and ensure the required directories exist.
     */
    public function __construct()
    {
    }
    /**
     * Pick the most viewed video source of today and hand it to the download worker.
     *
     * Uses aria2c when the binary exists, otherwise the built-in downloader.
     *
     * @return false|int process id of the spawned worker, or false when nothing to download
     */
    protected function runDownloadInBackground(): false|int
    {
    }
    /**
     * Return the number of active network connections on the host.
     *
     * @return int active connection count (0 when unavailable)
     */
    public function getActiveConnections(): int
    {
    }
    /**
     * Resolve the pending background video data for a lock key.
     *
     * Only runs on the load balancer (or a single-server install); on any other
     * condition the lock key is cleared from the cache.
     *
     * @param string $lockKey background download lock key
     * @return array<mixed>|false video data with host/host_id, or false
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
    /**
     * Terminate every leftover browser process started by the background jobs.
     *
     * @return array<string,mixed>
     */
    public function killBrowsers(): array
    {
    }
    /**
     * Start the background workers (general, Drive, stats, download) for this tick.
     *
     * @return array<string,mixed> spawn result per worker; empty when the schema is stale
     */
    public function run(): array
    {
    }
    /**
     * Spawn a PHP script as a detached background process.
     *
     * @param string      $scriptPath script to run
     * @param null|string $logFile    optional log file to capture output
     * @return false|int process id, 1 while the child is still booting, or false on failure
     */
    public function runInBackground(string $scriptPath = '', ?string $logFile = null): false|int
    {
    }
    /**
     * Kill the downloader processes and drop their progress cache entries.
     *
     * @return array<string,mixed> stop and delete result per process and cache key
     */
    public function stopDownload(): array
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
}

/**
 * Counts established network connections and terminates leftover browser processes.
 */
class ConnMonitor
{
    /**
     * @param Config $config site configuration holding the last connection count
     * @param ProcessControl $processes process lookup used to stop browsers
     */
    public function __construct(private readonly \GDPlayer\Config\Config $config, private readonly \GDPlayer\Service\Background\ProcessControl $processes)
    {
    }
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
     * Terminate every leftover browser process started by the background jobs.
     *
     * @return array<string,mixed>
     */
    public function killBrowsers(): array
    {
    }
}

/**
 * Manajemen proses plugin aktif/nonaktif.
 */
class PluginWorker
{
    /**
     * @param ProcessControl $processes worker spawning and termination
     */
    public function __construct(private readonly \GDPlayer\Service\Background\ProcessControl $processes)
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
 * Spawns and stops background processes and reports whether a PID is alive.
 */
class ProcessControl
{
    /**
     * Seconds a spawn marker stays valid while the child is still booting (PowerShell boot ~0.4 s).
     *
     * Must stay well above a slow boot: the pid file is only written after the wrapper exits, so a
     * marker that expires too early lets the next tick spawn a second worker.
     */
    private int $spawnTtl = 30;
    /**
     * Find and terminate Unix processes whose cmdline matches a pattern.
     *
     * `ps -ef` is not used: on busybox/alpine the second column is USER, not PID, so
     * parsing `awk '{print $2}'` yields a user name and no process ever gets killed.
     * `pgrep -a -f` is available on both busybox and procps.
     *
     * @return int[] PIDs that were signalled
     */
    protected function killUnixProcessesByPattern(string $pattern): array
    {
    }
    /**
     * Read a pid file and report its process only while that process is still alive.
     *
     * @param string|null $pidFile absolute path of the pid file; null when unknown
     * @return int|null live process id, or null when the file or process is gone
     */
    protected function pidFileIsRunning(?string $pidFile): ?int
    {
    }
    /**
     * Start a PHP script detached from the current request and record its PID.
     *
     * Uses PowerShell `Start-Process` on Windows and `nohup` elsewhere.
     *
     * @param string $scriptPath script to run
     * @param string $pidFile file receiving the child PID
     * @param string|null $logFile destination for the child output, null discards it
     * @return int 1 when the child was spawned, 0 when spawning failed
     */
    protected function spawnProcess(string $scriptPath, string $pidFile, ?string $logFile): int
    {
    }
    /**
     * Start the worker, or reuse the one that is already running (or still booting).
     *
     * @param string      $scriptPath script to run
     * @param string      $pidFile    file receiving the child PID
     * @param string      $startFile  marker of a spawn that is still booting
     * @param null|string $logFile    optional log file to capture output
     * @return false|int process id, 1 while the child is booting, or false on failure
     */
    protected function startWorker(string $scriptPath, string $pidFile, string $startFile, ?string $logFile): false|int
    {
    }
    /**
     * Stop processes whose working directory matches the given path on Unix.
     *
     * @param string $workingPath working directory of the processes to stop
     * @return int[] PIDs that were signalled
     */
    protected function stopUnixProcessByPath(string $workingPath): array
    {
    }
    /**
     * Stop Windows processes whose command line mentions the given path.
     *
     * Each match gets a graceful `taskkill` first and a forced tree kill after
     * a short pause; the current process is always excluded.
     *
     * @param string $workingPath path fragment to match in the command line
     * @return int[] PIDs that were killed
     */
    protected function stopWindowsProcessByPath(string $workingPath): array
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
     * Spawn a PHP script as a detached background process.
     *
     * The spawn is fire-and-forget: `<pid>.starting` marks a child that is still booting, so the
     * next tick does not start a second worker while its PID file has not been written yet.
     *
     * @param string      $scriptPath script to run
     * @param null|string $logFile    optional log file to capture output
     * @return false|int process id, 1 while the child is still booting, or false on failure
     */
    public function runInBackground(string $scriptPath = '', ?string $logFile = null): false|int
    {
    }
    /**
     * Terminate a process by PID (Windows: taskkill, Unix: killUnixPid).
     *
     * @param int         $pid       process id
     * @param null|string $imageName image/process name used to verify the PID (optional)
     */
    public function stopPid(int $pid, ?string $imageName = null): void
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
     * Stop every process started from a working directory.
     *
     * @param string $workingPath
     * @return int[]
     */
    public function stopProcessByPath(string $workingPath): array
    {
    }
}

namespace GDPlayer\Service\Cache;

/**
 * A single cache entry: value, TTL, and tag list.
 *
 * Callers use it as a builder (`set()->expiresAfter()->addTag()`) and then hand
 * it to `InstanceCache::save()`. The object holds no connection.
 */
final class CacheItem
{
    private bool $hit = false;
    /** @var string[] */
    private array $tags = [];
    private int $ttl;
    private mixed $value = null;
    /**
     * Bind the entry to a key and seed its lifetime with the store default.
     *
     * @param string $key key the entry will be written under
     * @param int $defaultTtl fallback lifetime in seconds
     */
    public function __construct(private readonly string $key, int $defaultTtl)
    {
    }
    /**
     * Attach a single tag, skipping empty strings and duplicates.
     *
     * @param string $tag tag used for grouped invalidation
     * @return $this
     */
    public function addTag(string $tag): self
    {
    }
    /**
     * @param string[] $tags
     */
    public function addTags(array $tags): self
    {
    }
    /**
     * Set the lifetime from a second count or a DateInterval.
     *
     * A null argument and any other type leave the current TTL untouched.
     *
     * @param int|DateInterval|null $ttl Lifetime in seconds or a relative interval
     * @return $this
     */
    public function expiresAfter(int|\DateInterval|null $ttl): self
    {
    }
    /**
     * Convert an absolute expiry moment into a remaining-seconds lifetime.
     *
     * @param DateTimeInterface $expiry moment the entry should expire
     * @return $this
     */
    public function expiresAt(\DateTimeInterface $expiry): self
    {
    }
    /**
     * Return the payload, which stays null until it is set or filled by a hit.
     *
     * @return mixed
     */
    public function get(): mixed
    {
    }
    /**
     * Return the key this entry is bound to.
     *
     * @return string
     */
    public function getKey(): string
    {
    }
    /**
     * @return string[]
     */
    public function getTags(): array
    {
    }
    /**
     * Return the current lifetime in seconds.
     *
     * @return int
     */
    public function getTtl(): int
    {
    }
    /**
     * Report whether the entry came from a successful storage read.
     *
     * @return bool
     */
    public function isHit(): bool
    {
    }
    /**
     * Mark the entry as the result of a storage read (used by the store).
     */
    public function markHit(mixed $value): self
    {
    }
    /**
     * Replace the payload, leaving the hit flag and TTL alone.
     *
     * @param mixed $value value to store
     * @return $this
     */
    public function set(mixed $value): self
    {
    }
}

/**
 * Plain Redis cache store (phpredis).
 *
 * The Redis handle may be injected at runtime (RoadRunner: one handle per worker,
 * Swoole: a handle borrowed from the pool) so the cache opens no new connection.
 * Without injection the store opens its own persistent connection (FPM mode).
 *
 * The prefix is written into every key by hand — the client's `Redis::OPT_PREFIX`
 * is left alone, because an injected client is shared with other components.
 *
 * Connection handling lives in `RedisCacheConnection`, tag operations in
 * `RedisCacheTagStore` and lock operations in `RedisCacheLock`.
 */
final class RedisCache
{
    private readonly \GDPlayer\Service\Cache\RedisCacheConnection $connection;
    private readonly \GDPlayer\Service\Cache\RedisCacheLock $locks;
    private readonly \GDPlayer\Service\Cache\RedisCacheTagStore $tags;
    /**
     * Bind the key prefix and open (or adopt) the Redis connection.
     *
     * @param string $prefix prefix written into every key of this instance
     * @param null|Redis $redis existing handle to reuse, or null to connect
     * @param bool $external true when the handle is owned by the caller
     * @param int $defaultTtl fallback entry lifetime in seconds
     */
    public function __construct(private readonly string $prefix, ?\Redis $redis = null, bool $external = false, private readonly int $defaultTtl = 3600)
    {
    }
    /**
     * Raise a tag version; see `RedisCacheTagStore::bumpTag()`.
     */
    public function bumpTag(string $tag): int
    {
    }
    /**
     * Delete every key under this instance's prefix only (not FLUSHDB).
     *
     * SCAN walks the keyspace in pages so a large prefix does not block Redis;
     * an unreachable cache reports false.
     */
    public function clear(): bool
    {
    }
    /**
     * Delete every entry under one tag; see `RedisCacheTagStore::deleteTag()`.
     */
    public function deleteTag(string $tag): bool
    {
    }
    /**
     * Read one entry. A miss, a corrupt payload, or a dead cache yields an
     * item without a hit, never an exception.
     */
    public function get(string $key): \GDPlayer\Service\Cache\CacheItem
    {
    }
    /**
     * Return the prefix written into every key of this instance.
     */
    public function getPrefix(): string
    {
    }
    /**
     * Remove a single entry.
     *
     * @param string $key key without the instance prefix
     * @return bool false when the cache is unreachable or the delete failed
     */
    public function hasDeletedKey(string $key): bool
    {
    }
    /**
     * Release a lock; see `RedisCacheLock::hasReleasedLock()`.
     *
     * @param string $key lock key without the instance prefix
     * @param string $token token returned by `lock()`
     * @return bool true when the release reached Redis
     */
    public function hasReleasedLock(string $key, string $token): bool
    {
    }
    /**
     * Invalidate a tag; see `RedisCacheTagStore::invalidateTag()`.
     */
    public function invalidateTag(string $tag): int
    {
    }
    /**
     * Claim a lock; see `RedisCacheLock::lock()`.
     *
     * @param string $key lock key without the instance prefix
     * @param int $ttl lock lifetime in seconds
     * @return string|false|null
     */
    public function lock(string $key, int $ttl): string|false|null
    {
    }
    /**
     * Store one entry.
     *
     * When the entry is tagged, the value and the tag-set membership go out in a
     * single MULTI/EXEC. Split apart, an invalidation landing between SET and SADD
     * would miss the new key: the entry never reaches the drop list, so the stale
     * value survives until its TTL expires.
     */
    public function save(\GDPlayer\Service\Cache\CacheItem $item): bool
    {
    }
    /**
     * Current tag version; see `RedisCacheTagStore::tagVersion()`.
     */
    public function tagVersion(string $tag): int
    {
    }
}

/**
 * Redis handle ownership, lazy reconnect and failure reporting.
 */
final class RedisCacheConnection
{
    private readonly bool $external;
    private float $lastAttempt = 0.0;
    private ?\Redis $redis;
    /**
     * @param null|Redis $redis injected handle, or null to connect lazily
     * @param bool $external true when the handle belongs to the caller
     */
    public function __construct(?\Redis $redis = null, bool $external = false)
    {
    }
    /**
     * Active client, reconnecting lazily after a failed attempt.
     *
     * An external handle is never replaced: when its owner reports it dead the
     * cache stays dead rather than opening a second connection.
     */
    public function client(): ?\Redis
    {
    }
    /**
     * Log a failed cache operation and drop a self-owned connection.
     *
     * The next request retries its own connection; an external handle is left
     * for its owner to repair.
     *
     * @param Throwable $e failure to report
     * @param string $action operation name used in the log line
     */
    public function report(\Throwable $e, string $action): void
    {
    }
}

/**
 * Lock acquisition and token-guarded release.
 */
final class RedisCacheLock
{
    public function __construct(private readonly \GDPlayer\Service\Cache\RedisCacheConnection $connection, private readonly string $prefix)
    {
    }
    /**
     * Release a lock only when the token still belongs to the caller.
     *
     * The compare-and-delete runs as a Lua script so a stale holder cannot
     * delete another process's lock.
     *
     * @param string $key lock key without the instance prefix
     * @param string $token token returned by `lock()`
     * @return bool true when the release reached Redis
     */
    public function hasReleasedLock(string $key, string $token): bool
    {
    }
    /**
     * Claim a lock with SET NX PX.
     *
     * The returned token proves ownership and must be passed back to
     * `hasReleasedLock()`. A false result means another process holds the lock;
     * null means the cache is unreachable.
     *
     * @param string $key lock key without the instance prefix
     * @param int $ttl lock lifetime in seconds
     * @return string|false|null
     */
    public function lock(string $key, int $ttl): string|false|null
    {
    }
}

/**
 * Tag operations: tag version keys and tagged entry eviction.
 */
final class RedisCacheTagStore
{
    /** Tag version TTL: 30 days. Used by `bumpTag()` and `tagVersion()`. */
    private const TAG_TTL = 2592000;
    public function __construct(private readonly \GDPlayer\Service\Cache\RedisCacheConnection $connection, private readonly string $prefix)
    {
    }
    /**
     * Raise a tag version atomically with INCR. The value is stored as a raw integer.
     */
    public function bumpTag(string $tag): int
    {
    }
    /**
     * Physically delete every entry registered under one tag.
     *
     * SMEMBERS + DEL run in a single Lua script: if split, a member landing between
     * the two commands never enters the list and slips through.
     */
    public function deleteTag(string $tag): bool
    {
    }
    /**
     * Invalidate a tag atomically: bump the version and drop old entries in one script.
     *
     * `bumpTag()` then `deleteTag()` has two points in time: a key written between them
     * can be dropped (new data lost) or escape entirely (stale entry survives). One
     * script is one point in time: writes before it are dropped, writes after survive.
     *
     * @return int new version, 0 when the cache is down or the version cannot be read
     */
    public function invalidateTag(string $tag): int
    {
    }
    /**
     * Build the Redis set key tracking the cache keys registered to a tag.
     *
     * Public because `RedisCache::save()` registers the entry itself inside its
     * own MULTI/EXEC transaction.
     *
     * @param string $tag tag name
     * @return string prefixed tag-set key
     */
    public function tagSetKey(string $tag): string
    {
    }
    /**
     * Current tag version; a missing key is initialised to 1.
     */
    public function tagVersion(string $tag): int
    {
    }
}

/**
 * `RedisCache` payload format: fully delegated to phpredis when its build supports
 * igbinary (serializer) and zstd (compression), otherwise it falls back to a manual
 * `serialize()` with a class whitelist.
 */
final class RedisSerializer
{
    /**
     * Install the best serializer/compression available.
     *
     * The `Redis::SERIALIZER_IGBINARY` and `Redis::COMPRESSION_ZSTD` constants only
     * exist when phpredis is compiled with that support, so a `defined()` +
     * `extension_loaded()` check is enough — a build without it (common on Windows)
     * falls back to the manual path automatically.
     */
    public static function applyOptions(\Redis $redis): void
    {
    }
    /**
     * Inverse of `encodeValue()`. Values from a serializing client are already
     * plain data; legacy string payloads are read through `decode()`.
     */
    public static function decodeValue(mixed $raw, ?\Redis $redis): mixed
    {
    }
    /**
     * Value ready to store: raw (phpredis does the encoding) or a manual serialize
     * when the client has no active serializer.
     */
    public static function encodeValue(mixed $value, ?\Redis $redis): mixed
    {
    }
}

namespace GDPlayer\Service\HeadlessChrome;

/**
 * Browser and persistent browser URL creation.
 */
final class ChromeBrowserFactory
{
    /**
     * @param null|string $instance Chromium executable path
     * @param int $debuggingPort remote debugging port
     * @param int $timeout DevTools sync timeout in milliseconds
     * @param bool $production whether only errors are logged
     * @param string $proxy proxy URL
     * @param string $proxyBypassList comma-separated bypass list
     * @param string $userAgent user agent override
     */
    public function __construct(private ?string $instance, private int $debuggingPort, private int $timeout, private bool $production, private string $proxy, private string $proxyBypassList, private string $userAgent)
    {
    }
    /**
     * Spawns a configured Headless Chromium browser instance.
     *
     * @param array<string,string> $headers
     * @param string $logName
     * @param bool $keepAlive
     * @return Browser
     */
    public function createBrowser(array $headers, string $logName, bool $keepAlive = false): \HeadlessChromium\Browser
    {
    }
    /**
     * Open a Monolog stream handler under the headless Chrome log directory.
     *
     * @param string $logName log file base name, without extension
     * @return Logger
     */
    public function createLogStream(string $logName): \Monolog\Logger
    {
    }
    /**
     * Queries the local running Chrome debugging port to fetch the WebSocket debugger URL.
     *
     * @return string|null
     */
    public function getPersistentBrowserUrl(): ?string
    {
    }
}

/**
 * Fetch interception, page initialisation and network listeners.
 */
final class ChromeNetworkCapture
{
    /**
     * Captures media and AJAX requests seen by the page.
     *
     * @param array<string,mixed> $data
     * @param array<string,mixed> $result
     * @param array<string,int> $capturedRequests
     */
    public static function handleRequestWillBeSent(array $data, array &$result, array &$capturedRequests): void
    {
    }
    /**
     * Initialise page settings and enable the CDP domains the listeners rely on.
     *
     * Downloads are denied: the scraper only needs the network traffic.
     *
     * @param Page $page page to initialise
     * @return void
     */
    public static function initializePage(\HeadlessChromium\Page $page): void
    {
    }
    /**
     * Resolves whether the intercepted redirect request should be allowed.
     *
     * @param string $requestUrl
     * @param string $initialUrl
     * @return bool
     */
    public static function isRedirectAllowed(string $requestUrl, string $initialUrl): bool
    {
    }
    /**
     * Enables Fetch domain and registers redirection interception event listeners.
     *
     * @param Page $page
     * @param string $url
     * @param bool $redirected
     * @return void
     */
    public static function setupFetchInterception(\HeadlessChromium\Page $page, string $url, bool &$redirected): void
    {
    }
    /**
     * Registers network event listeners to capture specific AJAX requests and their load state.
     *
     * @param Page $page
     * @param array<string,mixed> $result
     * @param array<string,int> $capturedRequests
     * @param array<string,bool> $loadedRequests
     * @return void
     */
    public static function setupNetworkListeners(\HeadlessChromium\Page $page, array &$result, array &$capturedRequests, array &$loadedRequests): void
    {
    }
}

/**
 * Page navigation, in-page script execution and DevTools protocol wait helpers.
 */
final class ChromePageNavigator
{
    public function __construct(private int $timeout = 30000)
    {
    }
    /**
     * Helper to run optional custom page scripts and evaluation code.
     *
     * @param Page $page
     * @param string $jsContent
     * @param string $evaluation
     * @param array<string,mixed> $result
     * @return void
     */
    public function executePageScripts(\HeadlessChromium\Page $page, string $jsContent, string $evaluation, array &$result): void
    {
    }
    /**
     * Dump the page markup through DiDom, falling back to a direct HTML fetch when that throws.
     *
     * @param Page $page loaded page to serialise
     * @return string page markup, or the raw HTML when the DOM dump fails
     */
    public function extractPageHtml(\HeadlessChromium\Page $page): string
    {
    }
    /**
     * Generates the multi-line JS stealth script.
     *
     * @param bool $isDoodstream
     * @return string
     */
    public static function getStealthScript(bool $isDoodstream): string
    {
    }
    /**
     * Executes Doodstream-specific navigation and non-blocking wait loop.
     *
     * @param Page $page
     * @param string $url
     * @param bool $redirected
     * @param string $jsContent
     * @param string $evaluation
     * @param array<string,mixed> $result
     * @return void
     */
    public function navigateDoodstream(\HeadlessChromium\Page $page, string $url, bool &$redirected, string $jsContent, string $evaluation, array &$result): void
    {
    }
    /**
     * Executes standard page navigation for all other hosts.
     *
     * @param Page $page
     * @param string $url
     * @param string $jsContent
     * @param string $evaluation
     * @param array<string,mixed> $result
     * @return void
     */
    public function navigateStandard(\HeadlessChromium\Page $page, string $url, string $jsContent, string $evaluation, array &$result): void
    {
    }
    /**
     * Prepares custom request headers.
     *
     * @param string $userLanguage Accept-Language value
     * @param string $cookies Cookie header value
     * @param string $referer Referer header value
     * @return array<string,string>
     */
    public static function prepareHeaders(string $userLanguage, string $cookies, string $referer): array
    {
    }
    /**
     * Drain received messages until a redirect arrives, the page settles or the timeout expires.
     *
     * Received data is read through reflection because the driver exposes no public accessor.
     * @param Page $page page to poll
     * @param bool &$redirected Set by the response handler once a redirect response is seen
     */
    public function waitForDoodstreamLoad(\HeadlessChromium\Page $page, bool &$redirected): void
    {
    }
}

/**
 * Chrome/Chromium process detection and cleanup.
 *
 * Methods stay protected so tests can steer the process list, and the class is
 * not final for that same reason.
 */
class ChromeProcessManager
{
    /** Port the keepAlive browser instance listens on. */
    public int $debuggingPort;
    public function __construct(int $debuggingPort = 9222)
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
    /**
     * Read the Chrome or Edge executable path from the Windows App Paths registry.
     *
     * @return string|null executable path, or null when neither browser is registered
     */
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
    /**
     * Resolve the Chromium binary shipped in the user profile on Windows.
     *
     * @return string|null path to the executable, or the generic Windows instance as fallback
     */
    public static function getChromiumWindows(): ?string
    {
    }
}

/**
 * Headless Chrome service for JavaScript-heavy hosts.
 *
 * Manages a persistent Chromium instance over the DevTools protocol and
 * exposes a fluent configuration API for proxy, cookies and timeouts.
 */
class HeadlessChrome
{
    use \GDPlayer\Service\System\PortChecker;
    private const DEFAULT_PORT = 9222;
    private const PORT_KEY = 'chrome-port';
    protected string $cookies = '';
    protected int $debuggingPort = self::DEFAULT_PORT;
    protected bool $production = false;
    protected string $proxy = '';
    protected string $proxyBypassList = '';
    protected string $referer = '';
    protected int $timeout = 30000;
    protected string $userAgent = '';
    protected string $userLanguage = \GDPlayer\Config\App::ACCEPT_LANGUAGE;
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
     * Spawns a configured Headless Chromium browser instance.
     *
     * @param array<string,string> $headers
     * @param string $logName
     * @param bool $keepAlive
     * @return Browser
     */
    protected function createBrowser(array $headers, string $logName, bool $keepAlive = false): \HeadlessChromium\Browser
    {
    }
    /**
     * Open a Monolog stream handler under the headless Chrome log directory.
     *
     * @param string $logName log file base name, without extension
     * @return Logger
     */
    protected function createLogStream(string $logName): \Monolog\Logger
    {
    }
    /**
     * Retrieve the response bodies of the captured requests that finished loading.
     *
     * Synchronous on purpose: CDP response bodies are only retrievable while the tab lives.
     *
     * @param Page $page active page
     * @param array<string,int> $capturedRequests request id => row index
     * @param array<string,bool> $loadedRequests request ids known to be complete
     * @param array<string,mixed> $result result accumulator, updated by reference
     * @return void
     */
    protected function fetchAjaxResponseBodies(\HeadlessChromium\Page $page, array $capturedRequests, array $loadedRequests, array &$result): void
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
    /**
     * Terminate headless Chrome instances that no longer serve the active port.
     *
     * @return int number of terminated processes
     */
    public function closeOrphanChrome(): int
    {
    }
    /**
     * Execute headless Chrome against a URL on the persistent browser instance.
     *
     * Auto-spawns a keep-alive browser on `$debuggingPort` when the running one is dead or missing,
     * and gives every call its own tab so concurrent requests do not share page state.
     *
     * @param string $url page to load
     * @param string $logName scenario name; contains `doodstream` to switch to the interception path
     * @param string $jsContent pre-script evaluated after navigation
     * @param string $evaluation expression evaluated once the page settled
     * @return array<string,mixed>
     */
    public function execPersistent(string $url = '', string $logName = '', string $jsContent = '', string $evaluation = ''): array
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
 * Application cache facade on top of plain Redis (`RedisCache`).
 *
 * Static so the 293 existing callers stay unchanged. A long-running runtime only
 * injects its Redis handle once at boot through `useRedis()`.
 */
final class InstanceCache
{
    /**
     * Drop every cache entry and forget the in-request tag version memo.
     *
     * @return int 1 when the store reported success, 0 otherwise
     */
    public static function clear(): int
    {
    }
    /**
     * Tag-versioned composite key (without colons).
     * Format: {baseKey}_v{tag1Version}_{tag2Version}
     *
     * @param string|string[] $tags
     * @return string key that changes whenever any of the given tags is invalidated
     */
    public static function createVersionedKey(string $baseKey, string|array $tags): string
    {
    }
    /**
     * Remove one entry by key.
     *
     * @param string $key cache key; empty string is a no-op
     * @return int 1 when the entry was deleted, 0 otherwise
     */
    public static function deleteItem(string $key = ''): int
    {
    }
    /**
     * Invalidate a tag: bump its version and physically drop the tagged entries.
     *
     * Both happen in one server-side script (`RedisCache::invalidateTag()`), so there is
     * no window between bumping the version and dropping the entries where a new key
     * could slip through.
     *
     * @param string $tagName tag to invalidate
     * @return int 1 on success, 0 when the tag is empty or storage failed
     */
    public static function deleteItemsByTag(string $tagName = ''): int
    {
    }
    /**
     * Invalidate several tags, succeeding only when every one of them was applied.
     *
     * @param string[] $tagNames
     * @return int 1 when all tags were invalidated, 0 otherwise
     */
    public static function deleteItemsByTags(array $tagNames = []): int
    {
    }
    /**
     * Get the entry; always returns an object (miss = `isHit()` false) so the
     * `$item->set(...)` then `save()` pattern keeps working.
     */
    public static function getItem(string $key): ?\GDPlayer\Service\Cache\CacheItem
    {
    }
    /**
     * Cache stampede protection: one lock holder, the rest wait for the result.
     *
     * @param int|DateInterval|DateTimeInterface|null $ttl
     * @param string|string[]|null $tags
     */
    public static function getOrSetWithLock(string $key, null|int|\DateInterval|\DateTimeInterface $ttl, callable $callback, null|string|array $tags = null, int $lockTimeout = 15): mixed
    {
    }
    /**
     * Current tag version from storage, memoised for the request.
     *
     * @param string $tag tag name
     * @return int version number, defaulting to 1 when storage is unavailable
     */
    public static function getTagVersion(string $tag): int
    {
    }
    /**
     * Bump a tag version atomically and store the new value in the request memo.
     *
     * @param string $tag tag name
     * @return int 1 on success, 0 when storage failed
     */
    public static function invalidateTag(string $tag): int
    {
    }
    /**
     * Bump several tag versions, succeeding only when every one of them was applied.
     *
     * @param string[] $tags
     * @return int 1 when all tags were invalidated, 0 otherwise
     */
    public static function invalidateTags(array $tags): int
    {
    }
    /**
     * Return to self-managed mode (FPM / CLI), dropping the injected handle and the store.
     */
    public static function resetRedis(): void
    {
    }
    /**
     * Clear the memoised tag versions. Must run at the end of every request in a
     * long-running process (RoadRunner/Swoole): versions are then re-read from storage
     * so invalidation performed by another worker becomes visible.
     */
    public static function resetTagVersions(): void
    {
    }
    /**
     * Persist an item that was filled through `setItem()`/`getItem()`.
     *
     * @param CacheItem|null $cacheItem item to store; null is a no-op
     * @return int 1 when the store reported success, 0 otherwise
     */
    public static function save(?\GDPlayer\Service\Cache\CacheItem $cacheItem): int
    {
    }
    /**
     * @param int|DateInterval|DateTimeInterface|null $ttl
     * @param string|string[]|null $tags
     */
    public static function setItem(string $key, mixed $value, null|int|\DateInterval|\DateTimeInterface $ttl = null, null|string|array $tags = null): int
    {
    }
    /**
     * Inject the runtime's own Redis handle.
     *
     * The same handle is reused for the whole process; reconnecting is the owner's
     * responsibility (pool / worker manager).
     */
    public static function useRedis(?\Redis $redis): void
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
 * Cache store holder for one execution (one request).
 *
 * Under Swoole several requests run as coroutines inside one process, so this state
 * lives in the coroutine context (see {@see InstanceCacheStore::state()}); on SAPI/RoadRunner
 * there is only one static instance. The fields are public so traits need no getter/setter.
 */
final class InstanceCacheState
{
    public ?\Redis $redis = null;
    /** true = handle owned by the runtime; the cache must not open its own connection. */
    public bool $redisInjected = false;
    public ?\GDPlayer\Service\Cache\RedisCache $store = null;
    /**
     * Memoised tag versions, valid for one request only.
     *
     * @var array<string, int>
     */
    public array $tagVersions = [];
}

/**
 * Shared cache store holder.
 *
 * Long-running runtimes inject their own Redis handle (`InstanceCache::useRedis()`), so the
 * cache never opens a second connection.
 */
final class InstanceCacheStore
{
    /** Used outside a coroutine (SAPI / RoadRunner / CLI). */
    private static ?\GDPlayer\Service\InstanceCache\InstanceCacheState $state = null;
    /**
     * State of the running coroutine; under Swoole each request owns its instance, so
     * one request's `resetRedis()` never disconnects another request's store.
     */
    public static function state(): \GDPlayer\Service\InstanceCache\InstanceCacheState
    {
    }
    /**
     * Return the process or coroutine cache store, creating it on first use.
     *
     * @return RedisCache cache facade bound to this runtime's Redis handle
     */
    public static function store(): \GDPlayer\Service\Cache\RedisCache
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
     * Images in the BMP format.
     *
     * @var list<array{width:int,height:int,colorPaletteColors:int,bitsPerPixel:int,size:int|float,data:string}> $images
     */
    private array $images = [];
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
    /** @var GdImage|false $image */
    private \GdImage|false $image = false;
    /** @var array{0:int<0,max>,1:int<0,max>,2:int,3:string,mime:string,channels?:int,bits?:int}|false $imageInfo */
    private array|false $imageInfo = false;
    /** @var int $imageType */
    private int $imageType = \IMAGETYPE_JPEG;
    /** @var string $outputFile */
    private string $outputFile;
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
    private string $content = '';
    /** @var string[] $sourceTypes */
    private array $sourceTypes = ['youtube'];
    /**
     * Expose the application info instead of the internal state in var_dump output.
     *
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

namespace GDPlayer\Service\Plugin;

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
    private const CORS_ALLOW_HEADERS = 'Authorization, Content-Type';
    private const CORS_METHODS = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';
    private const FOLDER = 'plugins/api/';
    /**
     * Handle /api/v1/* requests through the plugin router.
     *
     * @param ServerRequestInterface $request active request
     * @return ResponseInterface plugin JSON response
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
     * Expose application info when the object is dumped.
     *
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
 * Plugin lifecycle manager (install, upgrade, dispatch, sync).
 *
 * Handles plugin archives, page dispatch and engine (swoole/roadrunner)
 * liveness checks.
 */
final class PluginManager
{
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Read the `keep_files` list declared by the plugin manifest inside the archive.
     *
     * @param ZipArchive $zip open archive
     * @return array<string|int,mixed> normalized relative paths, empty when undeclared
     */
    protected static function getFilesToKeep(\ZipArchive $zip): array
    {
    }
    /**
     * @param int    $pluginId plugin id
     * @param string $action   ping|download
     * @return string URL, or '' when this server is the source itself
     */
    protected static function getSyncDownloadUrl(int $pluginId, string $action = 'ping'): string
    {
    }
    /**
     * Decide whether the archive may overwrite the installed copy.
     *
     * @param ZipArchive $zip open archive
     * @param string $destinationPath installed plugin directory
     * @return bool true on a fresh install or when the archive version is newer
     */
    protected static function isPluginUpgradeNeeded(\ZipArchive $zip, string $destinationPath): bool
    {
    }
    /**
     * Extract one archive entry, skipping folders and the files an upgrade must preserve.
     *
     * @param ZipArchive $zip open archive
     * @param int $index entry index to extract
     * @param string $destinationPath directory the entry is written to
     * @param array<string|int,mixed> $keepFiles relative paths preserved on upgrade
     * @param bool $isUpgrade whether the archive is an upgrade
     */
    protected static function processZipItem(\ZipArchive $zip, int $index, string $destinationPath, array $keepFiles, bool $isUpgrade): void
    {
    }
    /**
     * @param list<array<string, mixed>> $activePlugins
     * @return list<array{folder: string, manifest: array<int|string, mixed>, priority: int}>
     */
    public static function checkCandidates(array $activePlugins): array
    {
    }
    /**
     * Download the plugin archive when its stamp differs from the last installed one.
     *
     * @param int    $pluginId plugin id
     * @param string $folder   plugin folder
     * @param string $stamp    folder content stamp on the source server
     * @return string|false archive path, false when already current or on failure
     */
    public static function downloadPluginFile(int $pluginId, string $folder, string $stamp = ''): string|false
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
     * Extract a plugin archive into the plugins directory.
     *
     * @param string $zipPath         path to the archive
     * @param string $destinationPath destination directory
     * @param bool   $isUpgrade       whether this is an upgrade (version-guarded)
     * @return int 1 when extraction succeeded, 0 otherwise
     */
    public static function extractPluginZip(string $zipPath, string $destinationPath, bool $isUpgrade = false): int
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
     * Record the installed stamp so later cycles skip the download.
     *
     * @param string $folder plugin folder
     * @param string $stamp  folder content stamp on the source server
     */
    public static function markSynced(string $folder, string $stamp): void
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
    /**
     * Ask the source server for the content stamp of the plugin folder.
     *
     * @param int $pluginId plugin id
     * @return string|false stamp, '' when nothing needs syncing, false when the call fails
     */
    public static function syncPluginFile(int $pluginId): string|false
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
    /** @var array<string, array<string, mixed>> decoded manifests per folder */
    private static array $manifests = [];
    /**
     * Drop the manifests already read so later edits to `plugin.json` are picked up.
     */
    public static function reset(): void
    {
    }
    /**
     * Uninstall hook declared by the plugin, when it implements the hook interface.
     *
     * @param string $folder plugin folder with trailing slash
     * @return class-string<UninstallHookInterface>|null
     */
    public static function uninstallHook(string $folder): ?string
    {
    }
    /**
     * Backend page declared by the plugin, when it implements the view interface.
     *
     * @param string $folder plugin folder with trailing slash (e.g. `swoole/`)
     * @param string $page page slug from `?page=` (already sanitised by the caller)
     * @return class-string<ViewInterface>|null
     */
    public static function viewClass(string $folder, string $page): ?string
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
    /** Longest allowed cache age for the compiled route map, in seconds. */
    private const CACHE_TTL = 300;
    /**
     * Compiled route map per area, memoised for this request.
     *
     * @var array<string, array<string, array<string, ?string>>>
     */
    private static array $memo = [];
    /**
     * Expose the cached application info when the object is dumped.
     *
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
    /**
     * Normalise a route path by trimming slashes and the .php suffix.
     *
     * @param string $path Raw path from the manifest
     * @return string Normalised path
     */
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
    public static function resolve(string $area, string $requestPath): ?string
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
    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
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
    /** @var array<string, array<string, array<string, class-string<ViewInterface>>>> */
    private static array $memo = [];
    /**
     * Report whether a plugin view claims the given request path.
     *
     * @param string $area frontend or backend
     * @param string $requestPath path relative to BASE_URL (without .php)
     * @return bool
     */
    public static function has(string $area, string $requestPath): bool
    {
    }
    /**
     * Drop the memoised map so long-running workers see plugins installed or removed.
     */
    public static function reset(): void
    {
    }
    /**
     * Resolve a request path to a plugin view class.
     *
     * Exact routes win; otherwise the longest matching prefix is tried, walking
     * one segment up per iteration.
     *
     * @param string $area frontend or backend
     * @param string $requestPath path relative to BASE_URL (without .php)
     * @return class-string<ViewInterface>|null
     */
    public static function resolve(string $area, string $requestPath): ?string
    {
    }
}

namespace GDPlayer\Service\ServerConfig;

/**
 * Penyusunan dan pembandingan urutan konfigurasi.
 */
final class ConfigSorter
{
    /**
     * Report whether a submitted value should be treated as absent.
     */
    public static function isEmpty(mixed $value): bool
    {
    }
    /**
     * Apply incoming sub-values onto the stored ones, dropping blank keys.
     *
     * @param array<mixed, mixed> $existing
     * @param array<mixed, mixed> $incoming
     * @return array<mixed, mixed>
     */
    public static function merge(array $existing, array $incoming): array
    {
    }
    /**
     * Build the settings key that stores the signature of a config entry.
     */
    public static function signatureKey(string $settingKey): string
    {
    }
    /**
     * Sort config groups, and each group's sub-entries, by configured priority.
     *
     * @param array<string, mixed> $config
     * @param array<string, int>   $priorities
     * @return array<string, mixed>
     */
    public static function sort(array $config, array $priorities): array
    {
    }
}

/**
 * Manages the generation of server configuration files (nginx, .htaccess, etc.)
 * from Twig templates based on the settings stored in Config.
 */
final class ServerConfigManager
{
    /**
     * Default key order priorities: specific themes/routes first, then plugins/proxies, then fallbacks.
     *
     * @var array<string, int>
     */
    private const DEFAULT_PRIORITIES = ['dlhd_config' => 10, 'dlhd_proxy' => 10, 'swoole_config.dlhd' => 10, 'swoole_proxy.dlhd' => 10, 'litespeed_config' => 20, 'swoole_config' => 50, 'swoole_config.core' => 50, 'swoole_proxy' => 50, 'swoole_proxy.core' => 50, 'roadrunner_nginx_conf' => 60, 'roadrunner_nginx_conf.core' => 60, 'roadrunner_proxy' => 60, 'roadrunner_proxy.core' => 60];
    /**
     * Config groups owned by each stream engine plugin.
     *
     * @var array<string, string[]>
     */
    private const ENGINE_CONFIG_GROUPS = ['swoole' => ['swoole_config', 'swoole_proxy'], 'roadrunner' => ['roadrunner_nginx_conf', 'roadrunner_proxy']];
    private \GDPlayer\Config\Config $config;
    /**
     * Signature of the last content this process generated, per setting key.
     * Primary staleness signal in the request path (no cache I/O on the in-sync path).
     *
     * Sealed with the stat of the file it produced: another process rewriting the file
     * invalidates the memo. A bare signature would keep claiming "in sync" for the whole
     * worker lifetime (Swoole/RoadRunner) while the file on disk says otherwise.
     *
     * @var array<string, array{0: string, 1: int, 2: int}>
     */
    private static array $signatures = [];
    /**
     * Bind the settings store, creating a default one when none is injected.
     *
     * @param null|Config $config optional config instance (a new one is created when omitted)
     */
    public function __construct(?\GDPlayer\Config\Config $config = null)
    {
    }
    /**
     * Make sure the shared nginx.conf rendered from the current settings is up to date.
     *
     * @param array<string, mixed> $config settings the signature is derived from
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
     * Is the active request served by nginx?
     *
     * `SERVER_SOFTWARE` is empty under CLI, Swoole, RoadRunner and unknown FCGI hosts; those
     * keep the historical behaviour (render the file) so a proxy setup is never left without
     * its nginx.conf. A concrete Apache/LiteSpeed banner must never rewrite an nginx config.
     *
     * @return bool
     */
    public static function isServedByNginx(): bool
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
    /**
     * Regenerate the web-server config that matches the active cache mode.
     *
     * LiteSpeed writes the .htaccess rule pointing at `cache-files/`, nginx
     * rewrites its site config, and anything else falls back to the plain
     * LiteSpeed config.
     *
     * @param string $cacheMode configured cache mode
     */
    public static function updateByCacheMode(string $cacheMode): void
    {
    }
    /**
     * Merge one key into the .htaccess settings and rewrite the file.
     *
     * @param string $key setting key to merge, or an empty string to rewrite as-is
     * @param string $value value for that key
     * @param array<string, int> $priorities key order overrides
     * @return int|false bytes written, or false on failure
     */
    public static function updateHtaccessFile(string $key = '', string $value = '', array $priorities = []): int|false
    {
    }
    /**
     * Merge one key into the nginx settings and rewrite the config file.
     *
     * @param string $key setting key to merge, or an empty string to rewrite as-is
     * @param string $value value for that key
     * @param array<string, int> $priorities key order overrides
     * @return int|false bytes written, or false on failure
     */
    public static function updateNginxFile(string $key = '', string $value = '', array $priorities = []): int|false
    {
    }
}

namespace GDPlayer\Service\Sync;

/**
 * The part of the sync protocol that is identical for themes and plugins.
 */
final class SyncDownloader
{
    /**
     * Download one archive under a file lock (the lock is permanent on purpose: removing it
     * while it is still held would let two processes write the same archive).
     *
     * @param string               $link     archive URL
     * @param string               $zipPath  destination
     * @param string               $lockBase base path of the lock/log file
     * @param string               $kind     plugin|theme
     * @param array<string, mixed> $context  log context
     * @return string|false
     */
    public static function fetchArchive(string $link, string $zipPath, string $lockBase, string $kind, array $context): string|false
    {
    }
    /**
     * Ask the source server for the theme/plugin folder contents stamp.
     *
     * @param string               $url     `ping` action URL
     * @param string               $kind    plugin|theme (for log messages)
     * @param array<string, mixed> $context log context
     * @return string|false stamp, or false when it fails / is not valid
     */
    public static function fetchStampFromSource(string $url, string $kind, array $context): string|false
    {
    }
    /**
     * @param string $stamp stamp value from the source server
     */
    public static function isValidStamp(string $stamp): bool
    {
    }
    /**
     * @param string $link
     * @param string $zipPath
     * @param string $logFile
     * @param string $targetType
     * @param array<string, mixed> $context
     * @return string|false
     */
    public static function performDownload(string $link, string $zipPath, string $logFile, string $targetType = 'plugin', array $context = []): string|false
    {
    }
    /**
     * @param string $tmpDir tmp directory
     * @param string $name   theme/plugin folder name
     */
    public static function readStamp(string $tmpDir, string $name): string
    {
    }
    /**
     * The `main_site` address used to pull the archive, or '' when this server is the source.
     */
    public static function resolveMainSite(): string
    {
    }
    /**
     * @param string $tmpDir tmp directory
     * @param string $name   theme/plugin folder name
     */
    public static function stampFile(string $tmpDir, string $name): string
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
     * @var Config|array<string, mixed>|null
     */
    private $config;
    /**
     * @param Config|array<string, mixed>|null $config
     */
    public function __construct(null|array|\GDPlayer\Config\Config $config = null)
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
     * @param CurlHandle& $ch
     * @return CurlHandle
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
 * TCP port availability checker.
 */
trait PortChecker
{
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
    /**
     * Probe a TCP port with a non-blocking connect, without PHP warnings.
     *
     * A blocking `socket_connect()` emits E_WARNING when the port is closed, whereas a non-blocking
     * connect returns false plus EINPROGRESS. The pattern here: connect non-blocking, wait with
     * `socket_select()`, then inspect SO_ERROR.
     *
     * @param string $host hostname or IPv4 address
     * @param int $port port number
     * @param int $timeout seconds to wait for the handshake
     * @return bool true when the port is open
     */
    public function isTcpOpen(string $host, int $port, int $timeout = 1): bool
    {
    }
}

/**
 * Host system information provider (OS, RAM, disk, services, containers).
 */
final class SystemInfo
{
    use \GDPlayer\Service\System\ContainerChecker;
    use \GDPlayer\Service\System\PortChecker;
    private bool $isWindows;
    private string $ps = '';
    /**
     * Detect the platform and prepare the PowerShell bridge on Windows.
     */
    public function __construct()
    {
    }
    /**
     * Expose the application info instead of the internal platform state.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Convert two `/proc/stat` snapshots into a busy-CPU percentage.
     *
     * @param string $stats1 earlier snapshot of the aggregate `cpu` line
     * @param string $stats2 later snapshot taken after a short delay
     * @return float Busy percentage rounded to two decimals, or 0.0 when no time elapsed.
     */
    protected function calculateProcStatCpu(string $stats1, string $stats2): float
    {
    }
    /**
     * Count logical CPU cores from the Windows environment or `/proc/cpuinfo`.
     *
     * @return int logical core count, at least 1
     */
    protected function getCpuCores(): int
    {
    }
    /**
     * Report current CPU usage, preferring load average and falling back to `/proc/stat`.
     *
     * @return float busy CPU percentage
     */
    protected function getCpuUsage(): float
    {
    }
    /**
     * Read total and currently available RAM from `/proc/meminfo`.
     *
     * @return array{total: int, available: int}
     */
    protected function getLinuxRam(): array
    {
    }
    /**
     * Resolve a human-readable OS name from `/etc/os-release` or `php_uname()`.
     *
     * @return string detected operating system name
     */
    protected function getOperatingSystem(): string
    {
    }
    /**
     * Sample `/proc/stat` 100 ms apart and derive CPU usage from the delta.
     *
     * @return float Busy CPU percentage, or 0.0 when the file is unreadable.
     */
    protected function getProcStatUsage(): float
    {
    }
    /**
     * Read the 1-minute load average and scale it to a percentage-like value.
     *
     * @return float|null scaled load, or null when the extension is missing or the load is zero
     */
    protected function getSystemLoadAverage(): ?float
    {
    }
    /**
     * Count logical processors via `NUMBER_OF_PROCESSORS` or a PowerShell CIM query.
     *
     * @return int logical core count, or 0 when it cannot be determined
     */
    protected function getWindowsCpuCores(): int
    {
    }
    /**
     * Query the current CPU load percentage through PowerShell.
     *
     * @return float Busy CPU percentage, or 0.0 when PowerShell is unavailable.
     */
    protected function getWindowsCpuUsage(): float
    {
    }
    /**
     * Read total and free physical memory through a PowerShell CIM query.
     *
     * @return array{total: int, available: int}
     */
    protected function getWindowsRam(): array
    {
    }
    /**
     * Read the disk usage of the installation volume.
     *
     * @return array{total: float|int, used: float|int, free: float|int, percent: float|int}
     */
    public function getDiskUsage(): array
    {
    }
    /**
     * Collect the CPU load, core count, OS name and uptime.
     *
     * @return array{cpu: float, cpu_cores: int, os: string, uptime: float}
     */
    public function getOSInfo(): array
    {
    }
    /**
     * Read the RAM usage of the host.
     *
     * @return array{total: int, used: int, free: int, percent: float|int}
     */
    public function getRamUsage(): array
    {
    }
    /**
     * Report the status of the web server, Redis and PHP services.
     *
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
 * Theme discovery, activation and synchronization service.
 *
 * Resolves the active theme, lists installed themes and syncs theme
 * archives from the remote repository.
 */
final class ThemeManager
{
    private static ?string $activeTheme = null;
    /**
     * Expose application info when the object is dumped.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Extract one archive entry once its name passes validation (anti zip-slip).
     *
     * @param ZipArchive $zip             archive being read
     * @param int        $index           entry index inside the archive
     * @param string     $destinationPath directory the entry is extracted under
     */
    protected static function extractEntry(\ZipArchive $zip, int $index, string $destinationPath): void
    {
    }
    /**
     * Build the URL of the source server's theme sync endpoint.
     *
     * @param string $themeFolder theme folder
     * @param string $action      ping|download
     * @return string URL, or '' when this server is the source itself
     */
    protected static function getSyncDownloadUrl(string $themeFolder, string $action = 'ping'): string
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
     * Tell whether the archive carries a higher version than the installed theme.
     *
     * @param ZipArchive $zip             archive being installed
     * @param string     $destinationPath theme directory currently on disk
     * @return bool true when the archive is newer, or when no version is installed yet
     */
    protected static function isThemeUpgradeNeeded(\ZipArchive $zip, string $destinationPath): bool
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
    /**
     * Link the active theme's public assets into `public/themes/`.
     *
     * Backend and frontend are linked separately because each ships its own
     * `public` directory.
     */
    public static function createPublicSymlinks(): void
    {
    }
    /**
     * Download the theme archive when its stamp differs from the last installed one.
     *
     * @param string $themeFolder theme folder
     * @param string $stamp       content stamp of the folder on the source server
     * @return string|false archive path, false when already current or when it failed
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
     * Record the stamp that was installed successfully (skips the next sync cycle).
     *
     * @param string $themeFolder theme folder
     * @param string $stamp       content stamp of the folder on the source server
     */
    public static function markSynced(string $themeFolder, string $stamp): void
    {
    }
    /**
     * Forget the resolved active theme so the next request re-reads it.
     *
     * Harmless in FPM, where the process dies with every request; in a worker,
     * without this a theme switch in the admin panel only shows up after a
     * worker restart.
     */
    public static function reset(): void
    {
    }
    /**
     * Ask the source server for the content stamp of a theme folder.
     *
     * @param string $themeFolder theme folder
     * @return string|false stamp, '' when nothing needs syncing, false on failure
     */
    public static function syncThemeFile(string $themeFolder): string|false
    {
    }
}

namespace GDPlayer\Stream;

/**
 * Stream handler for serving local files with Range support.
 */
final class LocalFile
{
    private int $contentLength;
    private int $end;
    private string $file;
    private int $filesize;
    private ?\Psr\Http\Message\ServerRequestInterface $request = null;
    private int $start;
    private string $title = 'video.mp4';
    /**
     * Resolve the byte range for the request against the file size.
     *
     * `filesize()` is only a hint: {@see self::hasPrepared()} re-resolves the range against the size of
     * the handle that is actually read, so a file replaced between both calls cannot desynchronise
     * the headers from the body.
     *
     * @param string $file absolute path of the local file to serve
     * @param ServerRequestInterface|null $request PSR-7 request carrying the Range header
     */
    public function __construct(string $file, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * Expose the application info block instead of the stream state.
     *
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
     * @return array{0: int, 1: int}|null [start, end] inclusive, or null when no byte can satisfy it
     */
    public static function resolveRange(string $rangeHeader, int $filesize): ?array
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
 * MP4 stream handler with Range support.
 */
final class MP4 extends \GDPlayer\Stream\Stream
{
    public bool $isMP4 = true;
    public bool $isMaster = false;
    /**
     * @param string                     $vHost        video host identifier
     * @param string                     $vID          host-specific media identifier
     * @param string                     $url          upstream media URL
     * @param string                     $cacheMode    cache driver mode
     * @param int                        $cacheTimeout cache lifetime in seconds
     * @param ServerRequestInterface|null $request      PSR-7 request
     */
    public function __construct(string $vHost = '', string $vID = '', string $url = '', string $cacheMode = 'php', int $cacheTimeout = 3600, ?\Psr\Http\Message\ServerRequestInterface $request = null)
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
    private const BOTS = ['Bingbot', 'YandexBot', 'Googlebot', 'YandexImages', 'msnbot', 'Googlebot-Image', 'YandexBlogs', 'Applebot', 'Googlebot-video', 'YandexMetrika', 'AhrefsBot.Feeds', 'Googlebot-News', 'YandexNews', 'FeedlyBot'];
    private \GDPlayer\Config\Config $config;
    /**
     * @var array{
     *   scheme?: string, host?: string, port?: int<0,65535>, user?: string,
     *   pass?: string, path?: string, query?: string, fragment?: string
     * }|false
     */
    private array|false $currentParsedUrl = false;
    /** @var array<string,mixed> $dataSources */
    private array $dataSources = [];
    private \GDPlayer\Stream\StreamFlags $flags;
    private int $lastModified = 0;
    private ?\Psr\Http\Message\ServerRequestInterface $request = null;
    /** @var array<string,mixed> $requestHeaders */
    private array $requestHeaders = [];
    private \GDPlayer\Core\Security\Security $security;
    private string $token = '';
    private string $url = '';
    private string $vHost = '';
    private string $vID = '';
    private string $vLabel = 'Original';
    protected string $email = '';
    protected string $title = '';
    /** @var string[] $uri */
    protected array $uri = [];
    protected \GDPlayer\Stream\Playlist\HLS|\GDPlayer\Stream\Playlist\MPD|\GDPlayer\Stream\MP4 $vPlayer;
    /**
     * Capture the MP4/master flags and request, then load the stream settings.
     *
     * @param bool                        $isMP4    whether this is an MP4 request
     * @param bool                        $isMaster whether this is a master-playlist request
     * @param ServerRequestInterface|null $request  PSR-7 request
     */
    public function __construct(bool $isMP4 = false, bool $isMaster = false, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * Expose the application environment for debugging output.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Restore the dotted extension when the URL path carries the `_gx_` marker.
     */
    protected function changeUrlExtension(): void
    {
    }
    /**
     * Load the host and host id of a video from its hashed public id.
     *
     * @param string $id Hashed video id
     */
    protected function getVideoByHashId(string $id): void
    {
    }
    /**
     * Pick the source whose label matches the requested type.
     *
     * @param array<string|int, mixed> $sources
     */
    protected function getVideoUrlByLabel(array $sources): string
    {
    }
    /**
     * Apply the origin and token checks that guard the stream endpoints.
     *
     * @return bool True when the request may continue
     */
    protected function isValidRequest(): bool
    {
    }
    /**
     * Serve the request with the player, or fall back to the 403 page when the request is invalid.
     */
    protected function load(): void
    {
    }
    /**
     * Push the cache file, token, flags and headers into the current player.
     */
    protected function loadRequest(): void
    {
    }
    /**
     * Store title, email and referer headers, then resolve the stream URL from the sources.
     *
     * @param array<string,mixed> $data
     * @return void
     */
    protected function parseDataSources(array $data = []): void
    {
    }
    /**
     * Split the request path into host, id and label segments, decrypting the first one.
     */
    protected function parseUri(): void
    {
    }
    /**
     * Rebuild the target URL from the encrypted path segments and the request query string.
     *
     * @param string $encryptedUrl decrypted host and video id pair joined by `~`
     */
    protected function processEncryptedUrl(string $encryptedUrl): void
    {
    }
    /**
     * Redirect direct hosts to the original URL, or back when the source keeps failing.
     */
    protected function redirectToOriginalUrl(): void
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
 * Base stream handler that proxies and caches media/playlist responses.
 *
 * Implements local-cache lookup, chunked temporary caching, upstream cURL
 * streaming and circuit-breaker protection shared by HLS, MPD and MP4.
 */
abstract class Stream
{
    use \GDPlayer\Stream\Cache\StreamCache;
    use \GDPlayer\Stream\Http\StreamParser;
    use \GDPlayer\Stream\StreamStateTrait;
    private ?\GDPlayer\Stream\Http\StreamGuardService $guardService = null;
    /** Bytes actually written to the tmp cache (0 when the request must not be cached). */
    private int $written = 0;
    public string $cacheFile = '';
    public string $cacheMode = 'php';
    public int $cacheTimeout = 0;
    public int $contentLength = 0;
    public int $end = 0;
    public string $ip = '';
    public string $keyTotalLength = '';
    public string $rangeBytes = '';
    public ?\Psr\Http\Message\ServerRequestInterface $request = null;
    public int $responseCode = 0;
    /** @var int[] $responseCodeWithRetry */
    public array $responseCodeWithRetry = [-1, 0, 408, 429, 500, 501, 502, 503, 504];
    public bool $sendContentRange = false;
    public int $start = 0;
    public string $tmpCacheFile = '';
    public int $totalLength = 0;
    public string $vUrlHost = '';
    /**
     * Normalise the upstream URL and load the cache, range and request settings.
     *
     * @param string                     $vHost        video host identifier
     * @param string                     $vID          host-specific media identifier
     * @param string                     $url          upstream media URL
     * @param string                     $cacheMode    cache driver mode
     * @param int                        $cacheTimeout cache lifetime in seconds
     * @param ServerRequestInterface|null $request      PSR-7 request
     */
    public function __construct(string $vHost = '', string $vID = '', string $url = '', string $cacheMode = 'php', int $cacheTimeout = 3600, ?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
    }
    /**
     * Promote the temporary chunk cache to the final cache file when complete.
     */
    public function __destruct()
    {
    }
    /**
     * Expose the application info instead of the internal state in var_dump output.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
    }
    /**
     * Cache policy of this request.
     *
     * Deliberately not memoised: the service holds this handler, so storing it back in a property
     * forms a reference cycle. A cycle defers `__destruct()` to the garbage collector, and the
     * `.tmp` cache lock (LOCK_EX) then stays held across requests in a long-running worker.
     *
     * @return StreamCacheService
     */
    protected function cache(): \GDPlayer\Stream\Cache\StreamCacheService
    {
    }
    /**
     * Promote or discard the `.tmp` file after the write handle is closed.
     *
     * The handle is closed first because Windows refuses to move a file this process still has
     * open (`Access is denied`, code 5); the size is then re-checked, so a writer that truncated
     * the tmp in that gap cannot land as a complete cache file. Promotion still runs inside
     * closeFopen()/the destructor, never after the request state is gone.
     *
     * @return void
     */
    protected function commitCacheFile(): void
    {
    }
    /**
     * Upstream throttle guard of this request.
     *
     * @return StreamGuardService
     */
    protected function guard(): \GDPlayer\Stream\Http\StreamGuardService
    {
    }
    /**
     * Prepare the client IP, the upstream origin and the default request headers.
     *
     * @return void
     */
    protected function init(): void
    {
    }
    /**
     * Strip the escape noise from a master playlist, repair the end marker and send it.
     *
     * @param string $content raw upstream playlist body
     * @return void
     */
    protected function playlistParser(string $content): void
    {
    }
    /**
     * Apply entity headers (Content-Length / Content-Range / Last-Modified) to the stream state.
     *
     * @param string $header one upstream response header line
     * @return void
     */
    public function applyEntityHeader(string $header): void
    {
    }
    /**
     * Pick the response MIME type from the playlist/segment mode and request method.
     *
     * @return string content type suitable for the current stream kind
     */
    public function createContentType(): string
    {
    }
    /**
     * Prepare the tmp/progress files, request metadata, then build the Fetcher for one upstream.
     *
     * @param bool $withResponse true = body held in memory (playlist), false = streamed to the client
     * @return Fetcher
     */
    public function createFetcher(bool $withResponse = true): \GDPlayer\Http\Fetcher\Fetcher
    {
    }
    /**
     * cURL header callback: feed one upstream header line and abort on failure.
     *
     * @param string $header single upstream response header line
     * @return int bytes consumed, or -1 to make cURL abandon the transfer
     */
    public function curlHeaderCallback(string $header): int
    {
    }
    /**
     * Emit the buffered response headers through the response emitter.
     *
     * Cache stays off for live master playlists, pinned-time URLs and aborted transfers,
     * and the status falls back to 200 for cache hits that never saw cURL.
     *
     * @return void
     */
    public function defaultResponseHeaders(): void
    {
    }
    /**
     * Add the range and disposition headers once, then emit the header block.
     *
     * @return void
     */
    public function ensureHeadersSent(): void
    {
    }
    /**
     * Parse the Range header into the start/end offsets sent to the upstream.
     *
     * @return void
     */
    public function getRangeRequest(): void
    {
    }
    /**
     * Track the status line and entity headers of the upstream response.
     *
     * @param string $header single upstream response header line
     * @return int bytes consumed, or -1 when the upstream status must abort the transfer
     */
    public function handleUpstreamHeader(string $header): int
    {
    }
    /**
     * Redirect to another load balancer, or answer 404 once the retry budget is spent.
     *
     * @return void
     */
    public function retryStream(): void
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

/**
 * Per-request stream flags and the fluent setters that write them.
 *
 * {@see Stream} is above the 20-method/20-field ceiling on its own, and these members are one
 * responsibility: the mutable state of a single media request.
 */
trait StreamStateTrait
{
    private int $lastModified = 0;
    public bool $headersSent = false;
    public bool $isApple = false;
    public bool $isDownload = false;
    public bool $isLive = false;
    public bool $isMP4 = false;
    public bool $isMPD = false;
    public bool $isMaster = false;
    /** Suffix range (`bytes=-N`): a tail slice, not the full entity -> never written to cache. */
    public bool $isSuffixRange = false;
    public bool $productionMode = false;
    /** @var string[] $requestHeaders */
    public array $requestHeaders = [];
    /** @var string[] $responseHeaders */
    public array $responseHeaders = [];
    public bool $sendHeaders = true;
    public string $title = '';
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

namespace GDPlayer\Stream\Cache;

/**
 * Cache-file plumbing for {@see Stream}: tmp file creation, promotion policy,
 * cache key.
 *
 * Split out of Stream so the class stays within the 20-method rule (php:S1448); state
 * stays on Stream (cacheFile, tmpCacheFile, fpChunk).
 * @property string $tmpCacheFile
 */
trait StreamCache
{
    /** @var resource|null */
    private $fpChunk;
    public bool $enableCacheFile = false;
    public string $vHost = '';
    public string $vID = '';
    public string $vURL = '';
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
     * @return bool true when the tmp cache may replace the final cache file
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
 * Load and store the stream content cache.
 *
 * The request state stays on {@see Stream}; this service only owns the cache policy and the
 * playlist fetch that fills the cache.
 */
final class StreamCacheService
{
    /**
     * @param Stream $stream  stream handler that owns the request/response state
     * @param StreamGuardService $guard upstream throttle guard of that handler
     * @param null|Closure(string, array<string>):FetchResult $fetcher upstream fetch, defaults to the handler fetcher
     */
    public function __construct(private readonly \GDPlayer\Stream\Stream $stream, private readonly \GDPlayer\Stream\Http\StreamGuardService $guard, private readonly ?\Closure $fetcher = null)
    {
    }
    /**
     * @return array{cache:bool,content:string}
     */
    public function getCacheOrOriginalContent(): array
    {
    }
    /**
     * Fetch the master playlist body and normalise the `sparams` URL artefact.
     *
     * Triggers a stream retry for recoverable status codes instead of returning content.
     *
     * @return string|null playlist body, or null when the fetch produced nothing usable
     */
    public function getMasterContent(): ?string
    {
    }
    /**
     * Serve from the local cache when present.
     *
     * @return bool true when the request was already served from cache (caller must stop)
     */
    public function hasLocalCacheLoaded(): bool
    {
    }
    /**
     * A cache file is only valid when it really holds bytes: a 0-byte leftover from a failed/
     * aborted upstream must not be served as `X-Cache: HIT` with an empty body.
     *
     * @return bool
     */
    public function isUsableCacheFile(): bool
    {
    }
    /**
     * Emit the cached file for the PHP cache mode, honouring the request byte range.
     *
     * @return void
     */
    public function loadPhpCache(): void
    {
    }
    /**
     * Upstream headers for the playlist body. A playlist ignores `Range`: a partial body is not
     * a manifest, so AVPlayer's `Range: bytes=0-1` must not turn the full playlist into a 404.
     *
     * @return string[]
     */
    public function playlistRequestHeaders(): array
    {
    }
}

namespace GDPlayer\Stream\Http;

/**
 * Retries a playlist upstream through the cURL CLI when PHP cURL produced no usable response.
 */
final class CurlCliRunner
{
    /** Maximum redirect hops followed by the CLI fallback. */
    private const MAX_REDIRECTS = 20;
    /** @var callable(string):void */
    private $entitySink;
    /** HTTP status of the finalized CLI response. */
    private int $status = 0;
    /**
     * @param string   $url        upstream URL requested by the fallback
     * @param string[] $headers    playlist request headers
     * @param callable(string):void $entitySink receives every entity header of the final hop
     */
    public function __construct(private readonly string $url, private readonly array $headers, callable $entitySink)
    {
    }
    /**
     * Retry the playlist upstream through the cURL CLI.
     *
     * The returned body follows the same playlist pipeline as a regular fetch (live check, cache
     * promotion, URL rewriting, response headers); status <200 or >=400 yields null.
     *
     * Redirects are followed manually so every hop passes the SSRF guard before it is requested.
     *
     * @return null|string playlist body, null when the CLI transfer failed
     */
    public function run(): ?string
    {
    }
    /**
     * HTTP status of the last finalized CLI response, 0 when the transfer failed.
     *
     * @return int
     */
    public function status(): int
    {
    }
}

/**
 * Smart throttle guard for upstream media.
 *
 * Throttling is applied per media id, never per host: one rate-limited file must not freeze the
 * other files of the same host. The host tier is correlation-only telemetry, so a single bad file
 * can never escalate into a host-wide block.
 */
final class StreamGuardService
{
    /** @var array<string,string> Throttle-relevant upstream headers collected while the response arrives. */
    private array $headers = [];
    /**
     * @param string $owner   video host identifier
     * @param string $mediaId host-specific media identifier
     * @param string $url     upstream media URL
     */
    public function __construct(private readonly string $owner, private readonly string $mediaId, private readonly string $url)
    {
    }
    /**
     * Start (or extend) the cooldown for this media id.
     *
     * @param array<string,string> $headers      lowercase response headers
     * @param string               $upstreamHost origin of the upstream URL (log context only)
     * @return void
     */
    public function cooldownFile(array $headers, string $upstreamHost = ''): void
    {
    }
    /**
     * Reset the strike memory for this media id after a clean response.
     *
     * @return void
     */
    public function decay(): void
    {
    }
    /**
     * Claim the current request chain so a redirect loop cannot add more than one strike.
     *
     * @param string $ip client IP of the request chain
     * @return bool true when this request chain may record a strike
     */
    public function hasClaimedWindow(string $ip): bool
    {
    }
    /**
     * Keep the throttle-relevant part of one upstream header line, then forward it to the
     * regular header handler.
     *
     * @param string $header raw upstream header line
     * @param callable(string):int $forward regular header handler of the stream
     * @return int bytes consumed, or -1 to make cURL abandon the transfer
     */
    public function header(string $header, callable $forward): int
    {
    }
    /**
     * Throttle-relevant headers collected so far.
     *
     * @return array<string,string>
     */
    public function headers(): array
    {
    }
    /**
     * Report whether upstream must not be contacted for this media id right now.
     *
     * @return bool true while the file cooldown is active
     */
    public function isBlocked(): bool
    {
    }
    /**
     * Cache key scoped to the source host, the upstream host and the given scope.
     *
     * @param string $prefix key namespace
     * @param string $scope media id or fixed tier name
     * @return string cache key
     */
    public function key(string $prefix, string $scope): string
    {
    }
    /**
     * Note this media id in the correlation ledger and report a host that is throttled as a whole.
     *
     * @param string $upstreamHost origin of the upstream URL (log context only)
     * @return void
     */
    public function noteCorrelation(string $upstreamHost = ''): void
    {
    }
    /**
     * Apply the guard policy to a finished upstream response.
     *
     * @param int    $status       upstream HTTP status
     * @param int    $errno        cURL error number
     * @param string $ip           client IP of the request chain
     * @param string $upstreamHost origin of the upstream URL (log context only)
     * @return void
     */
    public function record(int $status, int $errno, string $ip, string $upstreamHost = ''): void
    {
    }
    /**
     * Remaining seconds of a guard entry, 0 when absent or expired.
     *
     * @param string $key cache key
     * @return int seconds left
     */
    public function remaining(string $key): int
    {
    }
    /**
     * Remember the throttle-relevant part of one upstream header line.
     *
     * @param string $header raw upstream header line
     * @return void
     */
    public function remember(string $header): void
    {
    }
}

/**
 * Shared stream state and playlist-parsing helpers.
 *
 * @method void commitCacheFile()
 * @property ?ServerRequestInterface $request
 * @property string $vHost
 * @property string $vID
 * @property bool $isLive
 * @property string $vURL
 * @property bool $enableCacheFile
 */
trait StreamParser
{
    use \GDPlayer\Stream\Http\StreamParserSupport;
    /** @var resource|null $fpChunk */
    private $fpChunk;
    /** @var resource|null $fpVerbose */
    private $fpVerbose;
    protected string $ampQry = '&';
    protected string $copyrightText = 'GDPlayer (c) 2020~ | gdplayer.to | @gdplayerto';
    protected string $endChars = " &?#\n\r\t\v\x00\v";
    /** @var array<string, array<string, int|string>> $parsedUrls */
    protected array $parsedUrls = [];
    protected string $token = '';
    protected string $vUrlOrigin = '';
    /**
     * Append the `gt` token parameter to a URL query string.
     *
     * @param string $url URL to extend
     * @return string URL carrying the token, trailing delimiters trimmed
     */
    protected function addTokenToUrl(string $url = ''): string
    {
    }
    /**
     * Rewrite an upstream URL into an encrypted local bypass path.
     *
     * Normalises the path, swaps custom extensions back to their originals and keeps the
     * original query (presigned values encrypted) together with the live flag.
     *
     * @param string $val upstream URL or relative path
     * @param string $separator path separator inserted by the caller
     * @return string local bypass URL, or an empty string when the input is blank
     */
    protected function bypassURL(string $val, string $separator): string
    {
    }
    /**
     * Return the current request method.
     *
     * @return string HTTP method, defaulting to GET when it cannot be read
     */
    protected function getMethod(): string
    {
    }
    /**
     * Parse a URL and memoise the result, keeping at most 50 entries.
     *
     * @param string $url
     * @return array<string, int|string>
     */
    protected function getParsedUrl(string $url): array
    {
    }
    /**
     * Return the raw request target including path and query string.
     *
     * @return string request target taken from the PSR-7 request or server vars
     */
    protected function getRequestTarget(): string
    {
    }
    /**
     * Resolve a possibly relative URL against the current video origin.
     *
     * @param string $val absolute URL, root-relative path, or path relative to the video URL
     * @return string absolute URL
     */
    protected function parseBaseUrl(string $val): string
    {
    }
    /**
     * Flush the cache file, unlock and close the chunk and verbose handles.
     *
     * The handles are released before the cache promotion: Windows refuses to move a file
     * that this process still has open (`Access is denied`, code 5).
     */
    public function closeFopen(): void
    {
    }
    /**
     * Read a request header from the PSR-7 request, falling back to server vars.
     *
     * @param string $name header name
     * @return string header value, or an empty string when the header is absent
     */
    public function getHeaderLine(string $name): string
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
 * URL repair and path normalisation helpers shared by StreamParser consumers.
 */
trait StreamParserSupport
{
    /**
     * Return the original and custom stream extension maps.
     *
     * @return array<string, mixed>
     */
    protected static function getCustomExtensions(): array
    {
    }
    /**
     * Create the URL encryption helper.
     *
     * @return Security
     */
    protected static function getSecurity(): \GDPlayer\Core\Security\Security
    {
    }
    /**
     * Resolve `.` and `..` segments and escape encoded slashes in a path.
     *
     * @param string[] $pathParts
     * @return string[]
     */
    protected function normalizedPathParts(array $pathParts = []): array
    {
    }
}

namespace GDPlayer\Stream\Playlist;

/**
 * HLS (m3u8) playlist stream handler.
 */
final class HLS extends \GDPlayer\Stream\Playlist\PlaylistServer
{
    use \GDPlayer\Stream\Playlist\HLSParser;
    public bool $isMP4 = false;
    public bool $isMPD = false;
    /**
     * Live when an EXTINF segment exists but no EXT-X-ENDLIST terminator yet.
     *
     * @param string $content playlist contents
     * @return bool
     */
    protected function isPlaylistLive(string $content): bool
    {
    }
    /**
     * Parse the original playlist; the separator is chosen from the EXTINF marker used upstream.
     *
     * @param string $content original playlist
     * @return string
     */
    protected function parseOriginalContent(string $content): string
    {
    }
    /**
     * Rewrite master playlist URLs before sending them to the client.
     *
     * @param string $content playlist contents
     * @return string
     */
    protected function preparePlaylistContent(string $content): string
    {
    }
}

/**
 * HLS playlist parsing and rewriting helpers.
 */
trait HLSParser
{
    use \GDPlayer\Stream\Http\StreamParser;
    protected string $copyrightText = 'GDPlayer (c) 2020~ | gdplayer.to | @gdplayerto';
    protected string $extInf = '#EXT-X-STREAM-INF';
    protected string $hlsSeparator = '/hls/';
    /**
     * Rewrite the variant URLs of a master playlist so each one carries this instance token.
     *
     * @param string $content raw master playlist
     * @return string rewritten playlist
     */
    protected function modifyMasterContent(string $content = ''): string
    {
    }
    /**
     * Rewrite a media playlist so every segment and key URI is served through this instance.
     *
     * @param string $m3u8Content raw media playlist
     * @param string $separator path prefix used to rebuild segment URLs
     * @return string rewritten playlist, empty when the input is empty
     */
    protected function parsePlaylist(string $m3u8Content = '', string $separator = '/hls/'): string
    {
    }
    /**
     * HLS segment separator, following the stream engine that is available.
     *
     * The playlist is written with the engine slug in a single pass, so no follow-up
     * `str_replace` over the output buffer is needed: RoadRunner → `/stream-ts3/`,
     * Swoole → `/stream-ts2/`, plain PHP → `/stream-ts/`.
     *
     * @return string
     */
    protected function tsSeparator(): string
    {
    }
}

/**
 * MPD (DASH) manifest stream handler.
 */
final class MPD extends \GDPlayer\Stream\Playlist\PlaylistServer
{
    use \GDPlayer\Stream\Playlist\MPDParser;
    public bool $isMPD = true;
    /**
     * Pemisah query MPD memakai entitas XML, bukan ampersand mentah.
     *
     * @return string
     */
    protected function ampQuerySeparator(): string
    {
    }
    /**
     * Live MPD is marked by the type="dynamic" attribute on the MPD element.
     *
     * @param string $content manifest contents
     * @return bool
     */
    protected function isPlaylistLive(string $content): bool
    {
    }
    /**
     * Parse the original DASH manifest; only passed through when its content really is MPD.
     *
     * @param string $content original manifest
     * @return string
     */
    protected function parseOriginalContent(string $content): string
    {
    }
    /**
     * Tidy the live manifest before sending it to the client.
     *
     * The repairMPD() call is kept exactly as in the previous code, and so is its behavior:
     * the return value is not used and the content is sent as-is.
     *
     * @param string $content manifest contents
     * @return string
     */
    protected function repairLivePlaylist(string $content): string
    {
    }
}

/**
 * MPD (DASH) manifest parsing and rewriting helpers.
 */
trait MPDParser
{
    use \GDPlayer\Stream\Http\StreamParser;
    protected string $copyrightText = 'GDPlayer (c) 2020~ | gdplayer.to | @gdplayerto';
    /** @var array<string, array<int, string>> $regexCache */
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
     * DASH segment separator, following the stream engine that is ready for use.
     *
     * Same as HLS: the manifest is written directly with the engine slug, without a
     * follow-up `str_replace` over the output buffer.
     *
     * @return string
     */
    protected function segSeparator(): string
    {
    }
}

/**
 * Playlist serving base class shared by the HLS and MPD handlers.
 *
 * The live marker MUST be declared by each handler through the abstract hook below:
 * HLS uses the presence of EXTINF segments without EXT-X-ENDLIST, while MPD uses the
 * type="dynamic" attribute on the MPD element. Live is never written to the cache
 * file; VOD is.
 */
abstract class PlaylistServer extends \GDPlayer\Stream\Stream
{
    protected string $ampQry = '&';
    /** true when the playlist body being served came from the cache file (read-only request). */
    protected bool $playlistCacheHit = false;
    /**
     * Query separator in rewritten URLs. MPD uses the XML entity (&amp;).
     *
     * @return string
     */
    protected function ampQuerySeparator(): string
    {
    }
    /**
     * Retry the playlist upstream through the cURL CLI when PHP cURL produced no usable response.
     *
     * The returned body follows the same playlist pipeline as a regular fetch (live check, cache
     * promotion, URL rewriting, response headers); status <200 or >=400 yields null.
     *
     * @return null|string playlist body, null when the CLI transfer failed
     */
    protected function fallbackCurlCli(): ?string
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
     * Cached content is used as-is; original content is parsed through the handler hook.
     *
     * @return string
     */
    protected function resolvePlaylistContent(): string
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
    /**
     * Serve the (cached or freshly parsed) playlist to the client.
     *
     * @return void
     */
    public function playlistStream(): void
    {
    }
}

namespace GDPlayer\Support;

/**
 * The single gateway for starting external processes.
 *
 * Routes shell_exec(), exec(), popen() and proc_open() through one class so system
 * process usage is easy to audit and swap out later. The class adds no logic of its
 * own: building the command, escaping, and parsing output stay the caller's job, so
 * existing callers behave exactly as before.
 *
 * Calling those four functions from outside this class is rejected by
 * `disallowed-calls.neon` (PHPStan).
 */
final class ProcessRunner
{
    /**
     * Run a command and return its stdout split into lines.
     *
     * @param string $command shell command, already escaped by the caller
     * @return list<string>
     */
    public static function lines(string $command): array
    {
    }
    /**
     * Start a process with caller-supplied descriptors (proc_open).
     *
     * @param string $command shell command, already escaped by the caller
     * @param array<int, array{0: string, 1?: string}> $descriptors proc_open descriptor spec
     * @param array<int, resource> $pipes proc_open pipes, filled by reference
     * @return resource|false
     */
    public static function open(string $command, array $descriptors, array &$pipes)
    {
    }
    /**
     * Run a command and return its whole stdout.
     *
     * @param string $command shell command, already escaped by the caller
     * @return string|null null when no shell is available or the run failed
     */
    public static function output(string $command): ?string
    {
    }
    /**
     * Open a pipe to a command and close it again, enough to detach a background job.
     *
     * On Windows the pipe is closed immediately, and cmd.exe prints
     * "The process tried to write to a nonexistent pipe." when the detached child writes
     * to the already-closed handle. Sending the output to NUL keeps the handle unused.
     *
     * @param string $command shell command, already escaped by the caller
     * @param string $mode pipe mode, defaults to 'r'
     */
    public static function pipe(string $command, string $mode = 'r'): void
    {
    }
    /**
     * Run a command and discard its output (fire and forget).
     *
     * @param string $command shell command, already escaped by the caller
     */
    public static function run(string $command): void
    {
    }
}

/**
 * Builds a ZIP archive from a directory (used by plugin and theme sync).
 *
 * Files are read up front and written through addFromString(): addFile() would only read
 * them at close(), so a file that disappears or changes midway raises a "Read error"
 * warning instead of a return value that can be inspected.
 *
 * The archive is written to `<zip>.part` and then moved with rename(), so the file served
 * to other servers is never half-written. The archive name carries the content stamp of the
 * directory (see stamp()), so unchanged content is not rebuilt.
 */
final class ZipBuilder
{
    /**
     * Artifacts left out of the archive. Tooling and git rewrite all of them without
     * changing the content used at runtime; if they were counted, the stamp would keep
     * changing and the archive would be rebuilt on every cycle.
     *
     * @var string[] regex patterns matched against the relative path
     */
    private const EXCLUDED = ['/\.git\//', '/(^|\/)logs\//', '/^\.phpunit\.cache\//', '/^\.scannerwork\//', '/^node_modules\//', '/^\.idea\//', '/^\.vscode\//'];
    /** Maximum age of a temporary archive (seconds) before prune() removes it. */
    private const MAX_AGE = 3600;
    /**
     * Build $zipPath from the content of $sourceDir (without .git/, logs/ and *.lock).
     *
     * @param string                $sourceDir  source directory
     * @param string                $zipPath    destination ZIP file
     * @param array<string, string> $logContext extra context for logging
     * @return bool true when the archive was built and promoted to $zipPath
     */
    public static function hasBuiltArchive(string $sourceDir, string $zipPath, array $logContext = []): bool
    {
    }
    /**
     * Delete temporary archives (zip/part) older than MAX_AGE inside $tmpDir.
     *
     * @param string $tmpDir plugin/theme tmp directory
     * @return int number of files removed
     */
    public static function prune(string $tmpDir): int
    {
    }
    /**
     * Content fingerprint of a directory: path|size|mtime of every file, without reading bodies.
     *
     * @param string $sourceDir source directory
     * @return string 40 hex characters, or '' when the directory does not exist
     */
    public static function stamp(string $sourceDir): string
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
     * @param ServerRequestInterface $request active request
     * @param ResponseInterface $response response being built (for status/header/cookie)
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
     * @return string|ResponseInterface
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
     * @return ResponseInterface|null 401/403 response when not allowed, null when allowed to continue
     */
    protected function requireAdmin(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Login guard inside the controller.
     *
     * @return ResponseInterface|null 401 response when not logged in, null when allowed to continue
     */
    protected function requireLogin(): ?\Psr\Http\Message\ResponseInterface
    {
    }
    /**
     * Render the view then turn its output into a response.
     *
     * @param ServerRequestInterface $request active request from PSR-15 (may differ from the one in the constructor
     *                                        when middleware replaced it, so the latest version is always used)
     * @return ResponseInterface response ready to send
     */
    final public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
    }
}

/**
 * Static error page (400/401/403/404/500/503).
 *
 * Replaces the 6 legacy `includes/views/frontend/{status}.php` files: one class with a status map
 * instead of 6 twin classes. There is no file include and no path-based theme override anymore;
 * themes render their own error page through `theme.json` (`frontend:error`).
 */
final class ErrorPageView
{
    /** @var array<int, array{0: string, 1: string}> status => [title, description] */
    private const PAGES = [400 => ['400 Bad Request', 'The page is disabled.'], 401 => ['401 Unauthorized', 'You are not allowed to access the page.'], 403 => ['403 Forbidden', 'You are not allowed to access the page.'], 404 => ['404 Page Not Found', 'The page you are looking for was not found.'], 500 => ['500 Internal Server Error', 'Sorry, the server is currently unavailable. Please contact admin.'], 503 => ['503 Service Unavailable', 'Sorry, the server is currently unavailable. Please try again later.']];
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
     * @return ResponseInterface error page response; status stays $status even when the body comes from the theme
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
     * @param ServerRequestInterface $request active request
     * @return ResponseInterface|string response ready to send, or the HTML body
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
    /** @var array<string, array<string, class-string<ViewInterface>>> */
    private static array $maps = [];
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
     * Drop the theme view map so a changed view file in the same path is read again.
     */
    public static function reset(): void
    {
    }
}
