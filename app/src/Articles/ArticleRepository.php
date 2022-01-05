<?php

declare(strict_types=1);

namespace App\Articles;

interface ArticleRepository
{
    /**
     * @param positive-int $count
     *
     * @return string[]
     */
    public function findTags(int $count): array;
}
