<?php

/*
 * File: PageRenderTest.php
 * Description: Render every gdplayer theme view through the real template pipeline
 * Project: GDPlayer
 * File Created: Thursday, 12th November 2026 3:39:52 am
 * Author: GDPlayer Developer (@url:`https://t.me/gdplayerto`)
 * -----
 * Last Modified: Thursday, 12th November 2026 3:39:52 am
 * Modified By: GDPlayer Developer (https://t.me/gdplayerto>)
 * -----
 * Copyright 2020 - 2026 @url:`https://github.com/gdplayerto`
 */

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Tests\Frontend;

use GDPlayer\Config\Config;
use GDPlayer\Http\HttpResponseException;
use GDPlayer\Model\LoadBalancer;
use GDPlayer\Theme\Gdplayer\Frontend\BuyAdditionalFeaturesView;
use GDPlayer\Theme\Gdplayer\Frontend\BuyView;
use GDPlayer\Theme\Gdplayer\Frontend\ChangelogView;
use GDPlayer\Theme\Gdplayer\Frontend\DmcaView;
use GDPlayer\Theme\Gdplayer\Frontend\HomeView;
use GDPlayer\Theme\Gdplayer\Frontend\PrivacyView;
use GDPlayer\Theme\Gdplayer\Frontend\SharerView;
use GDPlayer\Theme\Gdplayer\Frontend\SitemapView;
use GDPlayer\Theme\Gdplayer\Frontend\TermsView;
use Nyholm\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Renders each theme view with a real PSR-7 request, so a green run proves the
 * whole pipeline (theme template + core widgets + SQLite-backed settings), not
 * only that the classes exist. Guards (sharer feature off, load balancer host)
 * are covered with their own state so every test stays order-independent.
 */
final class PageRenderTest extends TestCase
{
    private ServerRequestInterface $request;

    protected function setUp(): void
    {
        $this->request = (new ServerRequest('GET', BASE_URL . '/'))
            ->withHeader('User-Agent', 'PHPUnit/10.0');
    }

    protected function tearDown(): void
    {
        (new LoadBalancer())->setCriteria('link', BASE_URL)->hasDeleted();
    }

    public function testDmcaPageRendersPolicyBody(): void
    {
        $html = (new DmcaView())->render($this->request);

        self::assertStringContainsString('<!DOCTYPE html>', $html);
        self::assertStringContainsString('<base href="' . BASE_URL . '">', $html);
        self::assertStringContainsString('DMCA Takedown Policy', $html);
    }

    public function testTermsPageRendersConditionsBody(): void
    {
        $html = (new TermsView())->render($this->request);

        self::assertStringContainsString('Terms and Conditions', $html);
    }

    public function testPrivacyPageRendersPolicyBody(): void
    {
        $html = (new PrivacyView())->render($this->request);

        self::assertStringContainsString('Privacy Policy', $html);
    }

    public function testChangelogPageRendersTitle(): void
    {
        $html = (new ChangelogView())->render($this->request);

        self::assertStringContainsString('<title>Change Log', $html);
    }

    public function testBuyPageRendersSalesCopy(): void
    {
        $html = (new BuyView())->render($this->request);

        self::assertStringContainsString('The Ultimate Video Player Solution For', $html);
    }

    public function testBuyAdditionalFeaturesPageRendersSalesCopy(): void
    {
        $html = (new BuyAdditionalFeaturesView())->render($this->request);

        self::assertStringContainsString('Additional Features', $html);
    }

    public function testHomePageRendersGeneratorForm(): void
    {
        $html = (new HomeView())->render($this->request);

        self::assertStringContainsString('Create Video Player', $html);
        self::assertStringContainsString('Player Configuration', $html);
    }

    public function testSharerPageRendersWhenFeatureEnabled(): void
    {
        (new Config())->save('enable_gsharer', '1');
        $html = (new SharerView())->render($this->request);

        self::assertStringContainsString('Google Drive Bypass Engine', $html);
    }

    public function testSharerPageIsForbiddenWhenFeatureDisabled(): void
    {
        (new Config())->save('enable_gsharer', '0');

        try {
            (new SharerView())->render($this->request);
            self::fail('SharerView must throw HttpResponseException while the feature is off');
        } catch (HttpResponseException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
        }
    }

    public function testSitemapReturnsXmlUrlSet(): void
    {
        $response = (new SitemapView())->render($this->request);
        $xml = (string) $response->getBody();

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('application/xml; charset=UTF-8', $response->getHeaderLine('Content-Type'));
        self::assertStringContainsString('<urlset', $xml);
        self::assertStringContainsString(\rtrim(BASE_URL, '/') . '/buy/', $xml);
    }

    public function testLoadBalancerHostIsForbidden(): void
    {
        (new LoadBalancer())->insert([
            'name' => 'PHPUnit Load Balancer',
            'link' => BASE_URL,
            'disallow_hosts' => '',
            'disallow_continent' => '',
        ]);

        try {
            (new DmcaView())->render($this->request);
            self::fail('Page view must throw HttpResponseException on a load balancer host');
        } catch (HttpResponseException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
        }
    }
}
