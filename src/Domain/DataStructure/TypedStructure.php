<?php

declare(strict_types=1);

namespace Domain\DataStructure;

use ArrayIterator;
use InvalidArgumentException;

abstract class TypedStructure implements Structure
{
    /**
     * @var array
     */
    protected $elements;

    /**
     * @return string
     */
    abstract protected function getType(): string;

    /**
     * Constructor.
     *
     * @param array $elements
     */
    protected function __construct(array $elements)
    {
        $ofType = $this->getType();

        if (false === $this->validateElementsType($elements, $ofType)) {
            $class = static::class;

            throw new InvalidArgumentException("Cannot create class $class with non $ofType values.");
        }

        $this->elements = $elements;
    }

    /**
     * @param  array $elements
     *
     * @return static
     */
    public static function create(array $elements): TypedStructure
    {
        return new static($elements);
    }

    /**
     * @param  array  $elements
     * @param  string $ofType
     *
     * @return bool
     */
    private function validateElementsType(array $elements, string $ofType): bool
    {
        foreach ($elements as &$element) {
            if (!$this->validateElementType($element, $ofType)) {
                return false;
            }
        }

        unset($element);

        return true;
    }

    /**
     * @param  object $element
     * @param  string $ofType
     *
     * @return bool
     */
    protected function validateElementType(object $element, string $ofType): bool
    {
        return $element instanceof $ofType;
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function hasCountBetween(int $a, int $b): bool
    {
        $count = $this->count();

        return $count >= $a && $count <= $b;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->elements);
    }
}