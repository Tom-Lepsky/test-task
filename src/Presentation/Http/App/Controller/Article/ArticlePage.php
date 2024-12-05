<?php

namespace App\Presentation\Http\App\Controller\Article;

use App\Application\Service\ArticleService;
use DomainException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticlePage extends AbstractController
{
    public const ARTICLE_DETAIL_PAGE_ID = 'app_article_get_by_id';

    public function __construct(readonly private ArticleService $articleService) {}

    #[Route(path: '/article/{slug}', name: self::ARTICLE_DETAIL_PAGE_ID, requirements: ['slug' => '^[\w-]+$'], methods: ['GET'], priority: 2)]
    public function __invoke(string $slug): Response
    {
        $article = null;
        try {
            $article = $this->articleService->getArticleBySlug($slug);
        } catch (DomainException) {
            $this->createNotFoundException();
        }

        return $this->json($article);
    }
}
