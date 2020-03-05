<?php

declare(strict_types=1);

namespace Domain\Text;

use LengthException;

class FixedLengthString
{
    protected const LENGTH = 255;

    /**
     * @var string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param string $value
     */
    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param  string $value
     *
     * @return static
     */
    public static function fromValue(string $value): self
    {
        if (strlen($value) > self::LENGTH) {
            throw new LengthException('Value cannot be greater than '.self::LENGTH.' characters.');
        }

        return new static($value);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}