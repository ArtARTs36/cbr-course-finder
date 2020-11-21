<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

interface Finder
{
    public function getOnDate(\DateTimeInterface $date): CourseCollection;
}
