<?php

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241203204007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("insert into article (title, slug, active, view, description, created_at) VALUES ('article_1', 'article-1', true, 321, 'article_description_1', '2024-12-03 10:24:20')");
        $this->addSql("insert into article (title, slug, active, view, description, created_at) VALUES ('article_2', 'article-2', true, 4567, 'article_description_2', '2024-12-03 10:25:20')");
        $this->addSql("insert into article (title, slug, active, view, description, created_at) VALUES ('article_3', 'article-3', true, 10324, 'article_description_3', '2024-12-03 10:26:20')");
        $this->addSql("insert into article (title, slug, active, view, description, created_at) VALUES ('article_4', 'article-4', true, 2345178, 'article_description_4', '2024-12-03 10:27:20')");
        $this->addSql("insert into article (title, slug, active, view, description, created_at) VALUES ('article_5', 'article-5', false, 67, 'article_description_5', '2024-12-03 10:28:20')");
        $this->addSql("insert into article (title, slug, active, view, description, created_at) VALUES ('article_6', 'article-6', true, 1928475, 'article_description_6', '2024-12-03 10:29:20')");
    }

    public function down(Schema $schema): void {}
}
