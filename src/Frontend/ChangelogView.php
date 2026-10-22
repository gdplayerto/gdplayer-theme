<?php

declare(strict_types=1);

namespace GDPlayer\Theme\Gdplayer\Frontend;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Halaman ChangelogView.
 */
final class ChangelogView extends AbstractPageView
{
    public function render(ServerRequestInterface $request): string
    {
        return $this->renderTemplate('changelog.twig', [
            'title' => 'Change Log',
            'description' => 'These change logs indicate that this website is being kept up to date.',
        ], $request);
    }
}
