<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

use ArtARTs36\CbrCourseFinder\Data\CourseBag;

interface Finder
{
    /**
     * Find courses on date.
     * @throws SearchException
     */
    public function findOnDate(\DateTimeInterface $date): CourseBag;
}
