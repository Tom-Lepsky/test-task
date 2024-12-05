<?php

namespace App\Application\Service;

use App\Domain\DTO\Article\ArticleOutputDTO;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use App\Domain\RepositoryFilter\ArticleFilter\ArticleFilter;
use App\Domain\Service\DataTransformer\ArticleDataTransformer\ArticleCatalogDataTransformer;
use App\Domain\Service\DataTransformer\ArticleDataTransformer\ArticleDataTransformer;
use DomainException;

class ArticleService
{

    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleDataTransformer $articleDataTransformer
    ) {}

    /**
     * @param string $slug
     * @return ArticleOutputDTO
     * @throws DomainException
     */
    public function getArticleBySlug(string $slug): ArticleOutputDTO
    {
        $article = $this->articleRepository->findBySlug($slug);
        return $this->articleDataTransformer->transformDetail($article);
    }

    /**
     * @return array<ArticleRepositoryInterface>
     */
    public function getArticlesCatalog(): array
    {
        $filter = new ArticleFilter(true);
        $articles = $this->articleRepository->findAll($filter);

        $output = [];
        foreach ($articles as $article) {
            $output[] = $this->articleDataTransformer->transformCatalog($article);
        }

        return $output;
    }
}
