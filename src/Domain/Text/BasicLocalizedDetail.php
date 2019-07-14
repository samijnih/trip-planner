<?php

declare(strict_types=1);

namespace Domain\Text;

use Domain\Language\Language;

class BasicLocalizedDetail implements LocalizedDetail
{
    /**
     * @var Language
     */
    protected $language;

    /**
     * @var Title
     */
    protected $title;

    /**
     * @var Description
     */
    protected $description;

    /**
     * Constructor.
     *
     * @param Language    $language
     * @param Title       $title
     * @param Description $description
     */
    public function __construct(Language $language, Title $title, Description $description)
    {
        $this->language = $language;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return Language
     */
    public function language(): Language
    {
        return $this->language;
    }

    /**
     * @return Title
     */
    public function title(): Title
    {
        return $this->title;
    }

    /**
     * @return Description
     */
    public function description(): Description
    {
        return $this->description;
    }
}