<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * DmcaView page.
 */
final class DmcaView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('dmca.twig', [
            'title' => 'DMCA Takedown Policy',
            'description' => 'DMCA Takedown Policy',
        ], $request);
    }
}
