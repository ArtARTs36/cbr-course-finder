<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

use ArtARTs36\CbrCourseFinder\Course;

interface CourseCollection extends \ArrayAccess, \Countable, \IteratorAggregate
{
    public function getByIsoCode(string $isoCode): ?Course;

    public function first(): ?Course;

    public function getActualDate(): \DateTimeInterface;

    public function getByName(string $name): ?Course;
}
