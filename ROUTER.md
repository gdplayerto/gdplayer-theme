# GDPlayer Theme — Router

> Tema default GDPlayer dengan halaman standar player.

## Entry Point

Theme aktif dimuat via `ThemeManager::getActiveThemePath()`.

## Frontend Routes

Theme meng-override halaman via struktur folder:
```
{theme}/frontend/views/{page}.php
```

### Main Pages

| URI Pattern | File | Purpose |
|-------------|------|---------|
| `/` | `frontend/views/index.php` | Homepage |
| `/changelog` | `frontend/views/changelog.php` | Version history |
| `/dmca` | `frontend/views/dmca.php` | DMCA takedown policy |
| `/privacy` | `frontend/views/privacy.php` | Privacy policy |
| `/terms` | `frontend/views/terms.php` | Terms of service |
| `/sharer/{hash}` | `frontend/views/sharer.php` | Social share page |
| `/sitemap` | `frontend/views/sitemap.php` | XML sitemap |
| `/buy` | `frontend/views/buy.php` | Purchase page |
| `/buy-additional-features` | `frontend/views/buy-additional-features.php` | Additional features purchase |

## Integration with Main App

Theme hanya menyediakan override halaman frontend. Routing utama tetap melalui `public/index.php`:

```
Priority chain:
1. Plugin routes → PluginRouteRegistry::resolve() (tb_plugin_routes, fallback plugin.json)
2. Active theme → {theme}/frontend/views/{page}.php
3. Core fallback → controller `src/Modules/<Modul>/Controllers/*` (view core lama sudah pensiun 2026-10-15)
```

## No Custom AJAX Endpoints

Theme ini tidak menambahkan endpoint AJAX baru. Semua AJAX dilayani controller modul `src/Modules/<Modul>/Controllers/*AjaxController.php` (kelas lama `src/Ajax/*` = dead code, tidak dipakai).
