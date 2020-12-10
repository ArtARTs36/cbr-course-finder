<?php

namespace ArtARTs36\CbrCourseFinder;

use GuzzleHttp\ClientInterface;

class Finder implements Contracts\Finder
{
    public const DEFAULT_BASE_URL = 'https://www.cbr-xml-daily.ru/';
    protected const URL_CURRENT_DATE = self::DEFAULT_BASE_URL . 'daily_json.js';
    protected const DATE_FORMAT = 'Y/m/d';

    protected $client;

    protected $baseUrl;

    public function __construct(ClientInterface $client, string $baseUrl = self::DEFAULT_BASE_URL)
    {
        $this->client = $client;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOnDate(\DateTimeInterface $date): Contracts\CourseCollection
    {
        return $this->responseToCollection(json_decode($this->sendRequest($this->resolveUrl($date)), true));
    }

    protected function resolveUrl(\DateTimeInterface $date): string
    {
        $date = $date->format(static::DATE_FORMAT);

        return $date === date(static::DATE_FORMAT) ?
            static::URL_CURRENT_DATE : $this->baseUrl . "/archive/{$date}/daily_json.js";
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function sendRequest(string $url): string
    {
        return $this->client->request('GET', $url)->getBody()->getContents();
    }

    /**
     * @throws \Exception
     */
    protected function responseToCollection(array $response): CourseCollection
    {
        $date = new \DateTime($response['Date']);

        $courses = array_map(function (array $item) {
            return new Course($item['CharCode'], $item['Name'], $item['Nominal'], $item['Value'], $item['Previous']);
        }, $response['Valute']);

        return new CourseCollection(array_values($courses), $date);
    }
}
