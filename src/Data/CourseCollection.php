<?php

namespace ArtARTs36\CbrCourseFinder\Data;

use ArtARTs36\CbrCourseFinder\Contracts;

class CourseCollection implements Contracts\CourseCollection
{
    /**
     * @param array<Course> $courses
     */
    public function __construct(
        private array $courses,
    ) {
        //
    }

    public function all(): array
    {
        return $this->courses;
    }

    public function getByIsoCode(CurrencyCode $isoCode): ?Course
    {
        return $this->filter(function (Course $course) use ($isoCode) {
            return $course->currency->isoCode->value === $isoCode->value;
        })->first();
    }

    public function filterByIsoCodes(array $codes): Contracts\CourseCollection
    {
        $codeMap = [];

        foreach ($codes as $code) {
            $codeMap[$code->value] = true;
        }

        return $this->filter(function (Course $course) use ($codeMap) {
            return isset($codeMap[$course->currency->isoCode->value]);
        });
    }

    /**
     * @param callable(Course): bool $callback
     */
    public function filter(callable $callback): self
    {
        return $this->newCollection(array_filter($this->courses, $callback));
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->courses);
    }

    /**
     * @return \Traversable<Course>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->courses);
    }

    public function first(): ?Course
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->courses[array_key_first($this->courses)];
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function mapOnIsoCode(): array
    {
        /** @var array<string, Course> $courses */
        $courses = [];

        foreach ($this->courses as $course) {
            $courses[$course->currency->isoCode->value] = $course;
        }

        return $courses;
    }

    /**
     * @param array<Course> $courses
     */
    protected function newCollection(array $courses): self
    {
        return new self($courses);
    }
}
