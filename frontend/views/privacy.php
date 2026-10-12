<?php

/*
 * File: privacy.php
 * Project: GDPlayer
 * File Created: Friday, 8th April 2022 1:19:13 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:20:26 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2025 https://github.com/gdplayerto
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

echo HTML::renderTemplate(__DIR__ . '/../templates/privacy.twig', [
    'title' => 'Privacy Policy',
    'description' => 'By using this site, you agree to follow all the privacy policies set out on this page.'
]);
