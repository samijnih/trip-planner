<?php

declare(strict_types=1);

namespace Domain\Planner\Accommodation;

use Domain\Language\Language;
use Domain\Text\BasicLocalizedDetail;
use Domain\Text\Description;
use Domain\Text\Title;

final class ExtendedLocalizedDetail extends BasicLocalizedDetail
{
    /**
     * @var Website
     */
    private $website;

    /**
     * Constructor.
     *
     * @param Language    $language
     * @param Title       $title
     * @param Description $description
     * @param Website     $website
     */
    public function __construct(
        Language $language,
        Title $title,
        Description $description,
        Website $website
    ) {
        parent::__construct($language, $title, $description);

        $this->website = $website;
    }
}
