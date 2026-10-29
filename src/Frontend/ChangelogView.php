<?php

/*
 * File: ChangelogView.php
 * Project: GDPlayer
 * File Created: Thursday, 22nd October 2026 3:39:00 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Thursday, 29th October 2026 11:14:45 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * ChangelogView page.
 */
final class ChangelogView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('changelog.twig', [
            'title' => 'Change Log',
            'description' => 'These change logs indicate that this website is being kept up to date.',
        ], $request);
    }
}
