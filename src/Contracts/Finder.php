<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

interface Finder
{
    /**
     * Find courses on date.
     * @throws SearchException
     */
    public function findOnDate(\DateTimeInterface $date): CourseCollection;
}
