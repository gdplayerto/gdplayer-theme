<?php

/*
 * File: dmca.php
 * Project: GDPlayer
 * File Created: Wednesday, 19th February 2025 8:49:38 am
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:19:11 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

use GDPlayer\Helper\StreamConfig;
use GDPlayer\Presentation\HTML;
use GDPlayer\Presentation\Views;

session_write_close();
if (StreamConfig::isCurrentHostLoadBalancer()) {
    Views::loadPage403();
    return;
}

echo HTML::renderTemplate(__DIR__ . '/../templates/dmca.twig', [
    'title' => 'DMCA Takedown Policy',
    'description' => 'DMCA Takedown Policy'
]);
