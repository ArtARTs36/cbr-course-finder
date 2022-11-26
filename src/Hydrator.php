<?php

namespace ArtARTs36\CbrCourseFinder;

use ArtARTs36\CbrCourseFinder\Data\Course;
use ArtARTs36\CbrCourseFinder\Exception\InvalidDataException;

final class Hydrator implements Contracts\Hydrator
{
    public function hydrate(array $raw): array
    {
        $courses = [];

        if (! isset($raw['Valute']) || ! is_iterable($raw['Valute'])) {
            throw new InvalidDataException('No data found in response.Valute');
        }

        foreach ($raw['Valute'] as $course) {
            $courses[] = $this->hydrateRow($course);
        }

        return $courses;
    }

    /**
     * @param array<mixed> $row
     * @throws InvalidDataException
     */
    private function hydrateRow(array $row): Course
    {
        if (! isset($row['CharCode']) || ! is_string($row['CharCode'])) {
            throw new InvalidDataException('No data found in response.Valute[].CharCode');
        }

        if (! isset($row['Name']) || ! is_string($row['Name'])) {
            throw new InvalidDataException('No data found in response.Valute[].Name');
        }

        if (! isset($row['Nominal']) || ! is_numeric($row['Nominal'])) {
            throw new InvalidDataException('No data found in response.Valute[].Nominal');
        }

        if (! isset($row['Value']) || ! is_float($row['Value'])) {
            throw new InvalidDataException('No data found in response.Valute[].Value');
        }

        if (! isset($row['Previous']) || ! is_float($row['Previous'])) {
            throw new InvalidDataException('No data found in response.Valute[].Previous');
        }

        return new Course(
            $row['CharCode'],
            $row['Name'],
            (float) $row['Nominal'],
            $row['Value'],
            $row['Previous'],
        );
    }
}
