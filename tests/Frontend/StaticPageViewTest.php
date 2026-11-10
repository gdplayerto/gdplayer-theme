<?php

/*
 * File: StaticPageViewTest.php
 * Description: Cover wiring of the gdplayer theme static page views
 * Project: GDPlayer
 * File Created: Tuesday, 10th November 2026 10:20:00 pm
 * Author: GDPlayer Developer (@url:`https://t.me/gdplayerto`)
 * -----
 * Last Modified: Tuesday, 10th November 2026 10:52:00 pm
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 @url:`https://github.com/gdplayerto`
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Tests\Frontend;

use GDPlayer\Theme\Gdplayer\Frontend\DmcaView;
use GDPlayer\Theme\Gdplayer\Frontend\PrivacyView;
use GDPlayer\Theme\Gdplayer\Frontend\TermsView;
use GDPlayer\View\ViewInterface;
use PHPUnit\Framework\TestCase;

/**
 * Template rendering butuh `resources/templates/` milik instalasi monolit (widget &
 * layout core), jadi test standalone cukup menjaga wiring view → template berkas nyata.
 */
final class StaticPageViewTest extends TestCase
{
    public function testEveryStaticPageIsAView(): void
    {
        self::assertInstanceOf(ViewInterface::class, new DmcaView());
        self::assertInstanceOf(ViewInterface::class, new TermsView());
        self::assertInstanceOf(ViewInterface::class, new PrivacyView());
    }

    public function testEveryStaticPageHasItsTemplateFile(): void
    {
        $templates = \dirname(__DIR__, 2) . '/frontend/templates/';

        foreach (['dmca.twig', 'terms.twig', 'privacy.twig', 'homepage.twig'] as $template) {
            self::assertFileExists($templates . $template);
        }
    }
}
