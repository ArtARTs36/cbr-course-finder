<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

use ArtARTs36\CbrCourseFinder\Data\Course;
use ArtARTs36\CbrCourseFinder\Exception\InvalidDataException;

interface Hydrator
{
    /**
     * @param array<mixed> $raw
     * @return array<Course>
     * @throws InvalidDataException
     */
    public function hydrate(array $raw): array;
}
