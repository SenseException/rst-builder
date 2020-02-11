<?php

declare(strict_types=1);

namespace Budgegeria\RstBuild;

use Doctrine\RST\Builder;

class Creator
{
    /**
     * @var Builder
     */
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function create(string $path) : void
    {
        $this->builder->build($path);
    }
}