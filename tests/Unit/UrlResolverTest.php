<?php

namespace ArtARTs36\CbrCourseFinder\Tests\Unit;

use ArtARTs36\CbrCourseFinder\UrlResolver;
use PHPUnit\Framework\TestCase;

final class UrlResolverTest extends TestCase
{
    public function providerForTestResolve(): array
    {
        return [
            [
                new \DateTime(),
                'http://site.ru/daily_json.js',
            ],
        ];
    }

    /**
     * @covers \ArtARTs36\CbrCourseFinder\UrlResolver::resolve
     * @dataProvider providerForTestResolve
     */
    public function testResolve(\DateTimeInterface $date, string $expected): void
    {
        $resolver = new UrlResolver('http://site.ru');

        self::assertEquals($expected, $resolver->resolve($date));
    }
}
