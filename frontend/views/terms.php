<?php

/*
 * File: terms.php
 * Project: GDPlayer
 * File Created: Friday, 8th April 2022 1:19:13 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:20:49 pm
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

echo HTML::renderTemplate(__DIR__ . '/../templates/terms.twig', [
    'title' => 'Terms & Conditions',
    'description' => <<<'EOD'
Terms and conditions that must be met between the website owner and the users of
    the services provided on this website.
EOD
]);
