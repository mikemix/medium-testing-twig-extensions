<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use App\Twig\Runtime\ArticleTagRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class ArticleTagExtension extends AbstractExtension
{
    /** {@inheritDoc} */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_tags', [ArticleTagRuntime::class, 'getTags']),
        ];
    }
}
