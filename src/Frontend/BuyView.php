<?php

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
            'description' => 'Buy GDPlayer Google Drive Video Player Full Version only on the official site. '
                . 'Get lifetime update support.',
        ], $request);
    }
}
