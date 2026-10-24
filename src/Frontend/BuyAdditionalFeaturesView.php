<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * BuyAdditionalFeaturesView page.
 */
final class BuyAdditionalFeaturesView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('buy-additional-features.twig', [
            'title' => 'Buy GDPlayer Additional Features',
            'description' => 'Buy GDPlayer Additional Features only on the official site. '
                . 'Expand your streaming capabilities with premium add-on hosts and integrations.',
        ], $request);
    }
}
