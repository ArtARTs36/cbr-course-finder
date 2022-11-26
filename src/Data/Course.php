<?php

namespace ArtARTs36\CbrCourseFinder\Data;

class Course
{
    public function __construct(
        public string $isoCode,
        public string $name,
        public float $nominal,
        public float $value,
        public float $previousValue,
    ) {
        //
    }

    public function equalsIsoCode(string $isoCode): bool
    {
        return $this->isoCode === $isoCode;
    }

    public function equalsName(string $name): bool
    {
        return $this->name === $name;
    }
}
