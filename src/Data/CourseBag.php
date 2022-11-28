<?php

namespace ArtARTs36\CbrCourseFinder\Data;

use ArtARTs36\CbrCourseFinder\Contracts\CourseCollection;

class CourseBag
{
    public function __construct(
        public CourseCollection   $courses,
        public \DateTimeInterface $actualDate,
        public CurrencyCode       $toCurrencyIsoCode,
    ) {
        //
    }
}
