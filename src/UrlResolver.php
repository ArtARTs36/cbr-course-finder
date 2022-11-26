<?php

namespace ArtARTs36\CbrCourseFinder;

final class UrlResolver implements Contracts\UrlResolver
{
    private const DEFAULT_BASE_URL = 'https://www.cbr-xml-daily.ru/';
    private const DATE_FORMAT = 'Y/m/d';
    private const URL_CURRENT_DATE = self::DEFAULT_BASE_URL . 'daily_json.js';

    public function __construct(
        private string $baseUrl = self::DEFAULT_BASE_URL,
    ) {
        //
    }

    public function resolve(\DateTimeInterface $date): string
    {
        $date = $date->format(self::DATE_FORMAT);

        return $date === date(self::DATE_FORMAT) ?
            self::URL_CURRENT_DATE :
            $this->baseUrl . "/archive/{$date}/daily_json.js";
    }
}
