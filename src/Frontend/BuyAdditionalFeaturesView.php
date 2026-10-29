<?php

/*
 * File: BuyAdditionalFeaturesView.php
 * Project: GDPlayer
 * File Created: Thursday, 22nd October 2026 3:39:00 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Thursday, 29th October 2026 11:14:39 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * BuyAdditionalFeaturesView page.
 */
final class BuyAdditionalFeaturesView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('buy-additional-features.twig', [
            'title' => 'Buy GDPlayer Additional Features',
            'description' => 'Buy GDPlayer Additional Features only on the official site. '
                . 'Expand your streaming capabilities with premium add-on hosts and integrations.',
        ], $request);
    }
}
