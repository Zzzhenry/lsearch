<?php

namespace Zhenry\Lsearch\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    /**
     * Apply given value to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param mixed                                 $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function apply(Builder $builder, $value): Builder;
}
