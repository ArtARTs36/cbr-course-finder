<?php

namespace ArtARTs36\CbrCourseFinder\Contracts;

interface UrlResolver
{
    /**
     * Resolve url on date.
     */
    public function resolve(\DateTimeInterface $date): string;
}
