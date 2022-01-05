<?php

declare(strict_types=1);

namespace App\Articles;

final class ImmutableArticleRepository implements ArticleRepository
{
    /** @var string[] */
    private array $tags;

    /**
     * @param string[] $tags
     */
    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /** {@inheritDoc} */
    public function findTags(int $count): array
    {
        return \array_slice($this->tags, 0, $count);
    }
}
