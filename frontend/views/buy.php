<?php

/*
 * File: buy.php
 * Project: GDPlayer
 * File Created: Wednesday, 30th April 2025 3:46:07 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:18:57 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2025 https://github.com/gdplayerto
 */

declare(strict_types=1);

use GDPlayer\Presentation\HTML;
use GDPlayer\Presentation\Views;

session_write_close();
if (GDPlayer\Helper\Stream::isCurrentHostLoadBalancer()) {
    Views::loadPage403();
    return;
}

echo HTML::renderTemplate(__DIR__ . '/../templates/buy.twig', [
    'title' => 'Buy GDPlayer Google Drive Video Player',
    'description' => <<<'EOD'
Buy GDPlayer Google Drive Video Player Full Version only on the official site.
    Get lifetime update support.
EOD,
]);
