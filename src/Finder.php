<?php

namespace ArtARTs36\CbrCourseFinder;

use ArtARTs36\CbrCourseFinder\Data\CourseBag;
use ArtARTs36\CbrCourseFinder\Data\CourseCollection;
use ArtARTs36\CbrCourseFinder\Data\CurrencyCode;
use ArtARTs36\CbrCourseFinder\Exception\CourseNotSetException;
use ArtARTs36\CbrCourseFinder\Exception\InvalidDataException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class Finder implements Contracts\Finder
{
    private Contracts\UrlResolver $urlResolver;

    private Contracts\Hydrator $hydrator;

    public function __construct(
        private ClientInterface $client,
        ?Contracts\UrlResolver $urlResolver = null,
        ?Contracts\Hydrator $hydrator = null
    ) {
        $this->urlResolver = $urlResolver ?? new UrlResolver();
        $this->hydrator = $hydrator ?? new Hydrator();
    }

    public function findOnDate(\DateTimeInterface $date): CourseBag
    {
        $response = $this->sendRequest($this->urlResolver->resolve($date));

        $respDecoded = json_decode($response, true);

        if (! is_array($respDecoded)) {
            throw new InvalidDataException(sprintf('Unexpected response: %s', $response));
        }

        return $this->responseToCourseBag($respDecoded);
    }

    /**
     * @throws Exception\NetworkException
     */
    protected function sendRequest(string $url): string
    {
        try {
            return $this
                ->client
                ->sendRequest(new Request('GET', $url))
                ->getBody()
                ->getContents();
        } catch (\Throwable $e) {
            throw new Exception\NetworkException('Search failed: ' . $e->getMessage(), previous: $e);
        }
    }

    /**
     * @param array<mixed> $response
     * @throws InvalidDataException
     * @throws CourseNotSetException
     */
    protected function responseToCourseBag(array $response): CourseBag
    {
        if (isset($response['code']) && $response['code'] === 404) {
            throw new CourseNotSetException();
        }

        if (! isset($response['Date']) || ! is_string($response['Date'])) {
            throw new InvalidDataException('Invalid response.Date');
        }

        $courses = new CourseCollection($this->hydrator->hydrate($response));

        return new CourseBag($courses, new \DateTime($response['Date']), CurrencyCode::ISO_RUB);
    }
}
