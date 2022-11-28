<?php

namespace ArtARTs36\CbrCourseFinder\Exception;

use ArtARTs36\CbrCourseFinder\Contracts\SearchException;

class CourseNotSetException extends \Exception implements SearchException
{
    public static function create(\DateTimeInterface $date): self
    {
        return new self(sprintf('Course not set at %s', $date->format('Y-m-d')));
    }
}
