<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

use ArtARTs36\CbrCourseFinder\Data\Course;

/**
 * @extends \IteratorAggregate<Course>
 */
interface CourseCollection extends \Countable, \IteratorAggregate
{
    /**
     * Get Course by ISO code.
     */
    public function getByIsoCode(string $isoCode): ?Course;

    /**
     * Get first course.
     */
    public function first(): ?Course;

    /**
     * Get Course by name.
     */
    public function getByCurrencyName(string $name): ?Course;

    /**
     * Filter by list of ISO codes.
     * @param array<string> $codes
     */
    public function filterByIsoCodes(array $codes): CourseCollection;

    /**
     * Determine is empty.
     */
    public function isEmpty(): bool;

    /**
     * Map to dict with ISO code as key.
     * @return array<string, Course>
     */
    public function mapOnIsoCode(): array;
}
