<?php

/*
 * File: changelog.php
 * Project: GDPlayer
 * File Created: Sunday, 6th August 2023 12:41:20 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 7:16:27 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2025 https://github.com/gdplayerto
 */

declare(strict_types=1);

use GDPlayer\Helper\Stream;
use GDPlayer\Presentation\HTML;
use GDPlayer\Presentation\Views;

session_write_close();
if (Stream::isCurrentHostLoadBalancer()) {
    Views::loadPage403();
    exit;
}

echo HTML::renderTemplate(__DIR__ . '/../templates/changelog.twig', [
    'title' => 'Change Log',
    'description' => 'These change logs indicate that this website is being kept up to date.'
]);
