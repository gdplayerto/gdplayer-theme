<?php

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
            'description' => 'Terms and conditions that must be met between the website owner and the users of the services provided on this website.',
        ], $request);
    }
}
