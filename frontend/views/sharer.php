<?php

/*
 * File: sharer.php
 * Project: GDPlayer
 * File Created: Sunday, 6th August 2023 12:41:20 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:20:32 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2025 https://github.com/gdplayerto
 */

declare(strict_types=1);

use GDPlayer\Config\Config;
use GDPlayer\Helper\Validation;
use GDPlayer\Presentation\HTML;
use GDPlayer\Presentation\Views;
use GDPlayer\Service\Login;

session_write_close();

$config = new Config();
$enableGsharer = Validation::validateBoolean($config->get('enable_gsharer'));
$isAdmin = Login::isCurrentUserAdmin();
if (!$enableGsharer && !$isAdmin) {
    Views::loadPage403();
    return;
}

echo HTML::renderTemplate(__DIR__ . '/../templates/gdrive-sharer.twig', [
    'title' => 'Google Drive Direct Link Generator & Downloader',
    'description' => 'Generate direct links and download Google Drive files without signing in to a Google account.'
]);
