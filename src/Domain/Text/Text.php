<?php

declare(strict_types=1);

namespace Domain\Text;

class Text
{
    /**
     * @var null|string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param null|string $value
     */
    protected function __construct(?string $value)
    {
        $this->value = $value;
    }

    /**
     * @param  null|string $value
     *
     * @return static
     */
    public static function fromValue(?string $value): Text
    {
        if (null !== $value && empty($value)) {
            $value = null;
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