<?php

/*
 * File: BuyView.php
 * Project: GDPlayer
 * File Created: Thursday, 22nd October 2026 3:39:00 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Saturday, 21st November 2026 4:56:21 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * BuyView page.
 */
final class BuyView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('buy.twig', [
            'title' => 'Buy GDPlayer Google Drive Video Player',
            'description' => \implode(' ', [
                'Buy GDPlayer Google Drive Video Player Full Version only on the official site.',
                'Every license includes 1 year of updates and support.',
            ]),
        ], $request);
    }
}
