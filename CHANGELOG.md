# Changelog

All notable changes to the **GDPlayer Theme v1** repository will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [0.0.2] - 2026-10-16

### Added
- Added GitHub Actions CI workflow for static analysis and linting (`phpstan`, `php-cs-fixer`, `phpcs`, `php-lint`).
- Added asset cache configuration `.htaccess` for backend and frontend.
- Added Swoole Proxy plugin changelog accordion and updated navigation links.
- Updated changelog page template (`changelog.twig`) with comprehensive release notes for GDPlayer v4.8.7, Swoole Proxy v0.0.8, and RoadRunner Proxy v0.0.5.

### Changed
- Frontend sitemap view emits its `Content-Type` header through the core emitter (dual-sink, long-running compatible).
- Synchronized frontend changelog templates with latest core and plugin release entries.
- Bumped frontend CSS to v0.0.2, added download-page template, and synced patch version release notes.
- Added `nosnippet` attributes to homepage sections and updated Cloudflare WARP proxy documentation.

## [0.0.1] - 2026-08-27

### Added
- Updated changelog page template with comprehensive release notes for GDPlayer, Swoole Proxy, and RoadRunner Proxy plugins.
- Added Custom Headers configuration to the backend navigation bar.
- Updated Swoole and RoadRunner plugin changelog sections in the frontend theme.
- Added release notes and changelog template updates for latest system releases.

### Fixed
- Fixed raw advertisement handling in frontend views (`3cff287`).
- General theme stability and template bug fixes (`c3c2b7c`).

### Changed
- Updated frontend `changelog.twig` and `sitemap.php` templates (`41b6551`).
- Updated release notes and changelog documentation for v4.8.2 and v4.8.4 (`8dca858`, `5afc50f`, `5477766`, `0528f26`, `86bfb8e`, `5a58ccc`).

### Initial
- Initial release of GDPlayer Theme v0.0.1 (`0bd61d1`, `a20d37b`).
