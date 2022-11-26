<?php

namespace ArtARTs36\CbrCourseFinder;

use ArtARTs36\CbrCourseFinder\Data\CourseCollection;
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

    public function findOnDate(\DateTimeInterface $date): Contracts\CourseCollection
    {
        $response = json_decode(
            $this->sendRequest($this->urlResolver->resolve($date)),
            true,
        );

        if (! is_array($response)) {
            throw new InvalidDataException('Unexpected response');
        }

        return $this->responseToCollection($response);
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
     */
    protected function responseToCollection(array $response): CourseCollection
    {
        if (! isset($response['Date']) || ! is_string($response['Date'])) {
            throw new InvalidDataException('Invalid response.Date');
        }

        $date = new \DateTime($response['Date']);

        return new CourseCollection($this->hydrator->hydrate($response), $date);
    }
}
