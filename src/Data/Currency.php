<?php

namespace ArtARTs36\CbrCourseFinder\Data;

class Currency
{
    public function __construct(
        public readonly CurrencyCode $isoCode,
        public readonly string $name,
    ) {
        //
    }
}
