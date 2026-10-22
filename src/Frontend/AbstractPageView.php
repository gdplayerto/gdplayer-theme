<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use GDPlayer\Helper\StreamConfig;
use GDPlayer\Http\HttpResponseException;
use GDPlayer\Presentation\HTML;
use GDPlayer\View\ErrorPageView;
use GDPlayer\View\ViewInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Dasar view halaman theme gdplayer: guard load-balancer + render Twig.
 */
abstract class AbstractPageView implements ViewInterface
{
    /**
     * @param string $template nama file template relatif terhadap `frontend/templates/`
     * @param array<string, mixed> $data variabel template
     * @param ServerRequestInterface $request request aktif
     * @return string HTML hasil render
     */
    protected function renderTemplate(string $template, array $data, ServerRequestInterface $request): string
    {
        \session_write_close();
        if (StreamConfig::isCurrentHostLoadBalancer()) {
            throw new HttpResponseException(ErrorPageView::forStatus(403));
        }

        return HTML::renderTemplate(
            \dirname(__DIR__, 2) . '/frontend/templates/' . $template,
            $data + ['request' => $request, 'current_url' => $request->getRequestTarget()]
        );
    }
}
