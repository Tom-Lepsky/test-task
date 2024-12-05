<?php

namespace App\Domain\RepositoryFilter\ArticleFilter;

class ArticleFilter
{
    public function __construct(public ?bool $active = null) {}
}
