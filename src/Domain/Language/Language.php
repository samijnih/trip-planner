<?php

declare(strict_types=1);

namespace Domain\Language;

use OutOfBoundsException;

final class Language
{
    public const FR = 'fr';
    public const EN = 'en';
    public const ES = 'es';
    public const DE = 'de';
    public const NL = 'nl';
    public const IT = 'it';
    public const DA = 'da';
    public const SV = 'sv';
    public const PT = 'pt';

    public const AVAILABLE = [
        self::FR,
        self::EN,
        self::ES,
        self::DE,
        self::NL,
        self::IT,
        self::DA,
        self::SV,
        self::PT,
    ];

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
     * @param  string $language
     *
     * @return Language
     */
    public static function createFromLanguage(string $language): Language
    {
        if (!in_array($language, self::AVAILABLE, true)) {
            throw new OutOfBoundsException("Cannot create class Language with unavailable language '$language'.");
        }

        return new self($language);
    }
}