<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * PrivacyView page.
 */
final class PrivacyView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('privacy.twig', [
            'title' => 'Privacy Policy',
            'description' => 'By using this site, you agree to follow all the privacy policies set out on this page.',
        ], $request);
    }
}
