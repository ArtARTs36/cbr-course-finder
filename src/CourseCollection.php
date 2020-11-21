<?php

namespace ArtARTs36\CbrCourseFinder;

class CourseCollection implements Contracts\CourseCollection
{
    protected $courses;

    protected $date;

    /**
     * @param array<Course> $courses
     */
    public function __construct(array $courses, \DateTimeInterface $date)
    {
        $this->courses = $courses;
        $this->date = $date;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->courses);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->courses[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->courses[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->courses[$offset]);
    }

    public function getByIsoCode(string $isoCode): ?Course
    {
        return $this->filter(function (Course $course) use ($isoCode) {
            return $course->equalsIsoCode($isoCode);
        })->first();
    }

    public function getByName(string $name): ?Course
    {
        return $this->filter(function (Course $course) use ($name) {
            return $course->equalsName($name);
        })->first();
    }

    public function filter(\Closure $callback = null): self
    {
        return $this->newCollection(array_filter($this->courses, $callback));
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->courses);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->courses);
    }

    public function first(): ?Course
    {
        if (! isset($this->courses[array_key_first($this->courses)])) {
            return null;
        }

        return $this->courses[array_key_first($this->courses)];
    }

    public function getActualDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function isEmpty(): bool
    {
        return empty($this->courses);
    }

    protected function newCollection(array $courses): self
    {
        return new static($courses, $this->date);
    }
}
