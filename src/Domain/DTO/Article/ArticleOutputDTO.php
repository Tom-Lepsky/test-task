<?php

namespace App\Domain\DTO\Article;

use DateTimeImmutable;

class ArticleOutputDTO
{
    protected int $id;

    protected string $slug;

    protected bool $active;

    protected string $title;

    protected string $view;

    protected string $description;

    protected string $createdAt;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function setView(int $view): static
    {
        $this->view = match (true) {
            $view >= 1_000_000 => sprintf("%dM", intval($view / 1_000_000)),
            $view >= 1000 => sprintf("%dK", intval($view / 1000)),
            default => $view,
        };
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt->format('Y-m-d H:m:i');
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;
        return $this;
    }
}
