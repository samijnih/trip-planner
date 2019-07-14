<?php

declare(strict_types=1);

namespace Domain\DataStructure;

/**
 * A Collection has only integer indexes.
 */
abstract class TypedCollectionStructure extends TypedStructure
{
    /**
     * {@inheritDoc}
     *
     * @return static
     */
    public static function create(array $elements): TypedStructure
    {
        $elements = array_values($elements);

        return new static($elements);
    }

    /**
     * @param object $element
     */
    public function append(object $element): void
    {
        $this->validateElementType($element, $this->getType());

        $this->elements[] = $element;
    }
}