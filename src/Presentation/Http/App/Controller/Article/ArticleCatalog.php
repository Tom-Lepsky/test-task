<?php

namespace App\Presentation\Http\App\Controller\Article;

use App\Application\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleCatalog extends AbstractController
{
    public const ARTICLE_CATALOG_PAGE_ID = 'app_article_catalog';

    public function __construct(readonly private ArticleService $articleService) {}

    #[Route(path: '/article', name: self::ARTICLE_CATALOG_PAGE_ID, methods: ['GET'], priority: 1)]
    public function __invoke(): Response
    {
        $articles = $this->articleService->getArticlesCatalog();
        return $this->json($articles);
    }
}
