<?php

/*
 * File: HomeView.php
 * Project: GDPlayer
 * File Created: Thursday, 22nd October 2026 3:39:00 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Thursday, 29th October 2026 11:14:52 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use GDPlayer\Config\App;
use GDPlayer\Config\Config;
use GDPlayer\Presentation\HTML;
use Psr\Http\Message\ServerRequestInterface;

/**
 * gdplayer theme front page (generator form + widgets).
 */
final class HomeView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        $config = new Config();
        $generatorDir = App::TEMPLATES_PATH . 'frontend/player-generator/';
        $widgetDir = App::TEMPLATES_PATH . 'widget/';

        return $this->renderTemplate('homepage.twig', [
            'link_examples' => HTML::hostLinkExample(),
            'disqus_shortname' => $config->get('disqus_shortname') ?? '',
            'templates' => [
                'player_form' => HTML::loadTemplate($generatorDir . 'form.twig'),
                'player_result' => HTML::loadTemplate($generatorDir . 'result.twig'),
                'disqus' => HTML::loadTemplate($widgetDir . 'disqus.twig'),
                'link_examples' => HTML::loadTemplate($widgetDir . 'link-example.twig'),
            ],
        ], $request);
    }
}
