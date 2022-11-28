<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

use ArtARTs36\CbrCourseFinder\Data\Course;
use ArtARTs36\CbrCourseFinder\Data\CurrencyCode;

/**
 * @extends \IteratorAggregate<Course>
 */
interface CourseCollection extends \Countable, \IteratorAggregate
{
    /**
     * Get courses array.
     * @return array<Course>
     */
    public function all(): array;

    /**
     * Get first course.
     */
    public function first(): ?Course;

    /**
     * Filter by list of ISO codes.
     * @param array<CurrencyCode> $codes
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
