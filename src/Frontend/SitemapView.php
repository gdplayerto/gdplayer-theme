<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use GDPlayer\Http\HttpFactory;
use GDPlayer\View\ViewInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Sitemap XML theme gdplayer (response PSR-7, tanpa echo/header langsung).
 */
final class SitemapView implements ViewInterface
{
    public function render(ServerRequestInterface $request): ResponseInterface
    {
        \session_write_close();

        $content = <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>%1$s/</loc>
        <lastmod>2021-11-19T07:47:44+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>%1$s/buy/</loc>
        <lastmod>2026-07-02T17:00:00+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>%1$s/buy-additional-features/</loc>
        <lastmod>2026-07-02T17:00:00+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>%1$s/sharer/</loc>
        <lastmod>2021-11-19T07:47:44+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>%1$s/changelog/</loc>
        <lastmod>2021-11-19T07:47:44+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>%1$s/terms/</loc>
        <lastmod>2021-11-19T07:47:44+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>%1$s/privacy/</loc>
        <lastmod>2021-11-19T07:47:44+00:00</lastmod>
        <priority>0.80</priority>
    </url>
</urlset>
XML;

        return HttpFactory::createResponse(200)
            ->withHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->withBody(HttpFactory::createStream(\sprintf($content, \rtrim(BASE_URL, '/'))));
    }
}
