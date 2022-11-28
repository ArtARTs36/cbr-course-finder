<?php

namespace ArtARTs36\CbrCourseFinder\Tests\Unit;

use ArtARTs36\CbrCourseFinder\Data\Course;
use ArtARTs36\CbrCourseFinder\Data\CourseCollection;
use ArtARTs36\CbrCourseFinder\Data\Currency;
use ArtARTs36\CbrCourseFinder\Data\CurrencyCode;
use PHPUnit\Framework\TestCase;

final class CourseCollectionTest extends TestCase
{
    public function providerForTestMapOnIsoCode(): array
    {
        return [
            [
                [],
                [],
            ],
            [
                [
                    $c1 = new Course(new Currency(CurrencyCode::ISO_AMD, ''), 10, 1, 1),
                    $c2 = new Course(new Currency(CurrencyCode::ISO_AUD, ''), 10, 1, 1),
                ],
                [
                    'AMD' => $c1,
                    'AUD' => $c2,
                ],
            ],
        ];
    }

    /**
     * @covers \ArtARTs36\CbrCourseFinder\Data\CourseCollection::mapOnIsoCode
     * @dataProvider providerForTestMapOnIsoCode
     */
    public function testMapOnIsoCode(array $courses, array $expected): void
    {
        self::assertEquals($expected, (new CourseCollection($courses))->mapOnIsoCode());
    }
}
