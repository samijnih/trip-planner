<?php

declare(strict_types=1);

namespace Domain\DataStructure;

/**
 * A Set is a collection of unique values.
 */
abstract class TypedSetStructure extends TypedStructure
{
    /**
     * {@inheritDoc}
     *
     * @return static
     */
    public static function create(array $elements): TypedStructure
    {
        $elements = array_values(array_unique($elements));

        return new static($elements);
    }
}