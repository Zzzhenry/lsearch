<?php

namespace Zhenry\Lsearch\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface SearchableInterface
{
    /**
     * Apply request data to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function apply(Builder $builder): Builder;
}
