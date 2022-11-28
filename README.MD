## cbr-course-finder

![PHP Composer](https://github.com/ArtARTs36/cbr-course-finder/workflows/Testing/badge.svg?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<a href="https://poser.pugx.org/artarts36/cbr-course-finder/d/total.svg">
<img src="https://poser.pugx.org/artarts36/cbr-course-finder/d/total.svg" alt="Total Downloads">
</a>


This package provides feature for searching currency courses for russian rouble

## Install

You must have implementation of psr/http-client-implementation

Run command: `composer require artarts36/cbr-course-finder`

## Usage

```php
$f = new \ArtARTs36\CbrCourseFinder\Finder(new \GuzzleHttp\Client());

var_dump($f->findAt(new \DateTime())->mapOnIsoCode());
```
