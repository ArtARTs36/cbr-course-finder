<?php

namespace ArtARTs36\CbrCourseFinder\Data;

class Course
{
    public function __construct(
        public Currency $currency,
        public float $nominal,
        public float $value,
        public float $previousValue,
    ) {
        //
    }
}
