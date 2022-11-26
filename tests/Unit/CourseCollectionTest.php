<?php

namespace ArtARTs36\CbrCourseFinder\Tests\Unit;

use ArtARTs36\CbrCourseFinder\Data\Course;
use ArtARTs36\CbrCourseFinder\Data\CourseCollection;
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
                    $c1 = new Course('key1', '', 1, 1, 1),
                    $c2 = new Course('key2', '', 1, 1, 1),
                ],
                [
                    'key1' => $c1,
                    'key2' => $c2,
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
        self::assertEquals($expected, (new CourseCollection($courses, new \DateTime()))->mapOnIsoCode());
    }
}
