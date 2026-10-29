<?php

/*
 * File: SharerView.php
 * Project: GDPlayer
 * File Created: Thursday, 22nd October 2026 3:39:00 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Thursday, 29th October 2026 11:15:01 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use GDPlayer\Config\Config;
use GDPlayer\Helper\Validation;
use GDPlayer\Http\HttpResponseException;
use GDPlayer\Service\Login;
use GDPlayer\View\ErrorPageView;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Google Drive sharer page: enabled only when the feature is on, or for admins.
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
            'description' => 'Generate direct links and download Google Drive files '
                . 'without signing in to a Google account.',
        ], $request);
    }
}
