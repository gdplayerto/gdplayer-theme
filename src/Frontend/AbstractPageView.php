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
 * Base view for gdplayer theme pages: load-balancer guard + Twig render.
 */
abstract class AbstractPageView implements ViewInterface
{
    /**
     * @param string $template template file name relative to `frontend/templates/`
     * @param array<string, mixed> $data template variables
     * @param ServerRequestInterface $request active request
     * @return string rendered HTML
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
