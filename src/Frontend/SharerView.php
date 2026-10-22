<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use GDPlayer\Config\Config;
use GDPlayer\Helper\Validation;
use GDPlayer\Http\HttpResponseException;
use GDPlayer\Service\Login;
use GDPlayer\View\ErrorPageView;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Halaman sharer Google Drive: hanya aktif bila fitur diaktifkan atau admin.
 */
final class SharerView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        $config = new Config();
        $enableGsharer = Validation::validateBoolean($config->get('enable_gsharer'));
        if (!$enableGsharer && !Login::isCurrentUserAdmin()) {
            throw new HttpResponseException(ErrorPageView::forStatus(403));
        }

        return $this->renderTemplate('gdrive-sharer.twig', [
            'title' => 'Google Drive Direct Link Generator & Downloader',
            'description' => 'Generate direct links and download Google Drive files without signing in to a Google account.',
        ], $request);
    }
}
