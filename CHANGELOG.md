# Changelog

All notable changes to the **GDPlayer Theme v1** repository will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [0.0.2] - 2026-11-04

### Added
- Added asset cache configuration for the backend and frontend.
- Added a Swoole Proxy changelog card to the changelog page and updated the navigation links.
- Added release notes for GDPlayer 5.0.0, Swoole Proxy 0.0.9 and RoadRunner Proxy 0.0.5 to the changelog page.
- Added sitemap response headers through the core response emitter, so they also work under long-running runtimes.

### Changed
- Improved the changelog page: it now mirrors the core and plugin release notes, including the plugin and theme sync improvements.
- Improved frontend assets: stylesheet version bump, a download page template and patch release notes.
- Improved homepage sections with search-snippet hints disabled and updated proxy documentation.

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
