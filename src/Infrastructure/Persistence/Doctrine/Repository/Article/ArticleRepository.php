<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use App\Domain\RepositoryFilter\ArticleFilter\ArticleFilter;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ObjectRepository;
use DomainException;

class ArticleRepository implements ArticleRepositoryInterface
{
    private ObjectRepository $repository;

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $em->getRepository(Article::class);
    }

    public function findBySlug(string $slug): Article
    {
        $article = $this->repository->findOneBy(['slug' => $slug]);
        if (!$article instanceof Article) {
            throw new DomainException('Article not found.');
        }

        return $article;
    }

    /**
     * @param ArticleFilter $filter
     * @return array<Article>
     */
    public function findAll(ArticleFilter $filter): array
    {
        return $this
            ->filter($filter)
            ->getQuery()
            ->getResult();
    }

    private function filter(ArticleFilter $filter): QueryBuilder
    {
        $ex = $this->em->getExpressionBuilder();
        $qb = $this->em->createQueryBuilder()
            ->select('a')
            ->from(Article::class, 'a');

        if ($filter->active !== null) {
            $qb->andWhere($ex->eq('a.active', ':active'))
                ->setParameter('active', $filter->active);
        }

        return $qb;
    }
}
