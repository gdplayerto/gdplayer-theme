<?php

/*
 * File: home.php
 * Project: GDPlayer
 * File Created: Friday, 8th April 2022 1:19:13 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 18th July 2026 12:20:09 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2025 https://github.com/gdplayerto
 */

declare(strict_types=1);

use GDPlayer\Config\App;
use GDPlayer\Config\Config;
use GDPlayer\Helper\StreamConfig;
use GDPlayer\Presentation\HTML;
use GDPlayer\Presentation\Views;

session_write_close();
$config = new Config();
if (StreamConfig::isCurrentHostLoadBalancer()) {
    Views::loadPage403();
    return;
}

$generatorDir = App::TEMPLATES_PATH . 'frontend/player-generator/';
$widgetDir = App::TEMPLATES_PATH . 'widget/';
echo HTML::renderTemplate(__DIR__ . '/../templates/homepage.twig', [
    'link_examples' => HTML::hostLinkExample(),
    'disqus_shortname' => $config->get('disqus_shortname') ?? '',
    'templates' => [
        'player_form' => HTML::loadTemplate($generatorDir . 'form.twig'),
        'player_result' => HTML::loadTemplate($generatorDir . 'result.twig'),
        'disqus' => HTML::loadTemplate($widgetDir . 'disqus.twig'),
        'link_examples' => HTML::loadTemplate($widgetDir . 'link-example.twig'),
    ],
]);
