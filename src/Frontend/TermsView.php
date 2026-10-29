<?php

/*
 * File: TermsView.php
 * Project: GDPlayer
 * File Created: Thursday, 22nd October 2026 3:39:00 pm
 * Author: GDPlayer Developer (https://t.me/gdplayerto)
 * -----
 * Last Modified: Thursday, 29th October 2026 11:15:07 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 https://github.com/gdplayerto
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * TermsView page.
 */
final class TermsView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('terms.twig', [
            'title' => 'Terms & Conditions',
            'description' => 'Terms and conditions that must be met between the website owner '
                . 'and the users of the services provided on this website.',
        ], $request);
    }
}
