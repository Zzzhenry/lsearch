<?php

namespace Zhenry\Lsearch\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait SearchableTrait
{
    /**
     * Apply request data to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function apply(Builder $builder): Builder
    {
        return static::applyDecoratorsFromRequest($builder);
    }

    /**
     * Map request data to descorator classes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private static function applyDecoratorsFromRequest(Builder $query)
    {
        foreach (request()->all() as $filterName => $value) {

            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }

        return $query;
    }

    /**
     * Search filter decorator class.
     *
     * @param string $name
     * @return string
     */
    private static function createFilterDecorator(string $name): string
    {
        return str_replace(
            class_basename(static::class),
            Str::studly($name),
            static::class
        );
    }

    /**
     * Determine if a given class exists.
     *
     * @param string $decorator
     * @return boolean
     */
    private static function isValidDecorator(string $decorator): bool
    {
        return class_exists($decorator);
    }
}
