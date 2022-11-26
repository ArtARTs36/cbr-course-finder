<?php

namespace ArtARTs36\CbrCourseFinder\Data;

class Course
{
    protected $isoCode;

    protected $name;

    protected $nominal;

    protected $value;

    protected $previousValue;

    public function __construct(string $isoCode, string $name, float $nominal, float $value, float $previousValue)
    {
        $this->isoCode = $isoCode;
        $this->name = $name;
        $this->nominal = $nominal;
        $this->value = $value;
        $this->previousValue = $previousValue;
    }

    public function equalsIsoCode(string $isoCode): bool
    {
        return $this->isoCode === $isoCode;
    }

    public function equalsName(string $name): bool
    {
        return $this->name === $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNominal(): float
    {
        return $this->nominal;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getPreviousValue(): float
    {
        return $this->previousValue;
    }
}
