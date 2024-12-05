<?php

namespace App\Domain\DTO\Article;

class ArticleCatalogOutputDTO
{
    protected string $title;

    protected string $link;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;
        return $this;
    }
}
