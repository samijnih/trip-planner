<?php

declare(strict_types=1);

namespace Domain;

use LengthException;

class FixedLengthString
{
    protected const LENGTH = 255;

    /**
     * @var null|string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param null|string $value
     */
    private function __construct(?string $value)
    {
        $this->value = $value;
    }

    /**
     * @param  null|string $value
     *
     * @return static
     */
    public static function fromValue(?string $value): self
    {
        if (strlen($value) > self::LENGTH) {
            throw new LengthException('Value cannot be greater than '.self::LENGTH.' characters.');
        }

        return new static($value);
    }

    /**
     * @return null|string
     */
    public function value(): ?string
    {
        return $this->value;
    }
}