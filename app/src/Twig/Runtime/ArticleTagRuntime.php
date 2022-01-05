<?php

declare(strict_types=1);

namespace App\Twig\Runtime;

use App\Articles\ArticleRepository;
use Twig\Extension\RuntimeExtensionInterface;

final class ArticleTagRuntime implements RuntimeExtensionInterface
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $repository)
    {
        $this->articleRepository = $repository;
    }

    public function getTags(int $count): array
    {
        return $this->articleRepository->findTags($count);
    }
}
