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

    public function providerForTestFilterByIsoCodes(): array
    {
        return [
            [
                [
                    new Course(new Currency(CurrencyCode::ISO_AMD, ''), 1, 1, 1),
                ],
                [CurrencyCode::ISO_RUB],
                [],
            ],
            [
                [
                    $c1 = new Course(new Currency(CurrencyCode::ISO_RUB, ''), 1, 1, 1),
                ],
                [CurrencyCode::ISO_RUB],
                [$c1],
            ],
        ];
    }

    /**
     * @covers \ArtARTs36\CbrCourseFinder\Data\CourseCollection::filterByIsoCodes
     * @dataProvider providerForTestFilterByIsoCodes
     */
    public function testFilterByIsoCodes(array $data, array $isoCode, array $expected): void
    {
        self::assertEquals($expected, (new CourseCollection($data))->filterByIsoCodes($isoCode)->all());
    }

    public function providerForTestIsEmpty(): array
    {
        return [
            [
                [],
                true,
            ],
            [
                [
                    new Course(new Currency(CurrencyCode::ISO_RUB, ''), 1, 1, 1),
                ],
                false,
            ],
        ];
    }

    /**
     * @covers \ArtARTs36\CbrCourseFinder\Data\CourseCollection::isEmpty
     * @dataProvider providerForTestIsEmpty
     */
    public function testIsEmpty(array $data, bool $expected): void
    {
        self::assertEquals($expected, (new CourseCollection($data))->isEmpty());
    }

    public function providerForTestCount(): array
    {
        return [
            [
                [],
                0,
            ],
            [
                [
                    new Course(new Currency(CurrencyCode::ISO_RUB, ''), 1, 1, 1),
                ],
                1,
            ],
            [
                [
                    new Course(new Currency(CurrencyCode::ISO_RUB, ''), 1, 1, 1),
                    new Course(new Currency(CurrencyCode::ISO_RUB, ''), 1, 1, 1),
                ],
                2,
            ],
        ];
    }

    /**
     * @covers \ArtARTs36\CbrCourseFinder\Data\CourseCollection::count
     * @dataProvider providerForTestCount
     */
    public function testCount(array $data, int $expected): void
    {
        self::assertCount($expected, new CourseCollection($data));
    }
}
