<?php

namespace App\Domain\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\RepositoryFilter\ArticleFilter\ArticleFilter;
use DomainException;

interface ArticleRepositoryInterface
{
    /**
     * @param string $slug
     * @return Article
     * @throws DomainException
     */
    public function findBySlug(string $slug): Article;

    /**
     * @param ArticleFilter $filter
     * @return array<Article>
     */
    public function findAll(ArticleFilter $filter): array;
}
