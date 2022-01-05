<?php

declare(strict_types=1);

namespace Test\App\Twig\Extension;

use App\Articles\ImmutableArticleRepository;
use App\Twig\Extension\ArticleTagExtension;
use App\Twig\Runtime\ArticleTagRuntime;
use Twig\RuntimeLoader\FactoryRuntimeLoader;
use Twig\Test\IntegrationTestCase;

final class ArticleTagExtensionTest extends IntegrationTestCase
{
    protected function getFixturesDir(): string
    {
        return __DIR__;
    }

    protected function getExtensions(): iterable
    {
        yield new ArticleTagExtension();
    }

    protected function getRuntimeLoaders(): iterable
    {
        yield new FactoryRuntimeLoader([
            ArticleTagRuntime::class => function (): ArticleTagRuntime {
                return new ArticleTagRuntime(new ImmutableArticleRepository([
                    'dogs', 'cats', 'pigs', 'pigeons', 'monkeys', 'bats', 'elephants', 'tigers',
                ]));
            },
        ]);
    }
}
