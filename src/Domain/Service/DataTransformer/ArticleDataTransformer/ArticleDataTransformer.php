<?php

namespace App\Domain\Service\DataTransformer\ArticleDataTransformer;

use App\Domain\DTO\Article\ArticleCatalogOutputDTO;
use App\Domain\DTO\Article\ArticleOutputDTO;
use App\Domain\Entity\Article\Article;
use App\Presentation\Http\App\Controller\Article\ArticlePage;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ArticleDataTransformer
{
    public function __construct(private readonly UrlGeneratorInterface $urlGenerator) {}

    public function transformCatalog(Article $from): ArticleCatalogOutputDTO
    {
        $to = new ArticleCatalogOutputDTO();
        $to
            ->setTitle($from->getTitle())
            ->setLink($this->urlGenerator->generate(ArticlePage::ARTICLE_DETAIL_PAGE_ID, ['slug' => $from->getSlug()]));

        return $to;
    }

    public function transformDetail(Article $from): ArticleOutputDTO
    {
        $to = new ArticleOutputDTO();
        $to
            ->setId($from->getId())
            ->setSlug($from->getSlug())
            ->setActive($from->isActive())
            ->setTitle($from->getTitle())
            ->setDescription($from->getDescription())
            ->setView($from->getView())
            ->setCreatedAt($from->getCreatedAt());

        return $to;
    }
}
