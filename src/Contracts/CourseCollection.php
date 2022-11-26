<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

use ArtARTs36\CbrCourseFinder\Data\Course;

interface CourseCollection extends \Countable, \IteratorAggregate
{
    public function getByIsoCode(string $isoCode): ?Course;

    public function first(): ?Course;

    public function getActualDate(): \DateTimeInterface;

    public function getByName(string $name): ?Course;

    /**
     * @param array<string> $codes
     */
    public function filterByIsoCodes(array $codes): CourseCollection;

    public function isEmpty(): bool;

    /**
     * @return array<string, Course>
     */
    public function mapOnIsoCode(): array;
}
