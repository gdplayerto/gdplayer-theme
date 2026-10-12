<?php

/*
 * File: buy-additional-host.php
 * Project: GDPlayer
 * File Created: Wednesday, 30th April 2025 3:45:47 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:18:51 pm
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

echo HTML::renderTemplate(__DIR__ . '/../templates/buy-additional-features.twig', [
    'title' => 'Buy GDPlayer Additional Features',
    'description' => 'Buy GDPlayer Additional Features only on the official site.'
        . 'Expand your streaming capabilities with premium add-on hosts and integrations.'
]);
