## cbr-course-finder

This package provides feature for searching currency courses for russian rouble

## Install

You must have implementation of psr/http-client-implementation

Run command: `composer require artarts36/cbr-course-finder`

## Usage 

```php
$f = new \ArtARTs36\CbrCourseFinder\Finder(new \GuzzleHttp\Client());

var_dump($f->findOnDate(new \DateTime())->mapOnIsoCode());
```
