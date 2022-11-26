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
        return $this
            ->responseToCollection(
                json_decode(
                    $this->sendRequest($this->urlResolver->resolve($date)),
                    true,
                )
            );
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
     * @throws InvalidDataException
     */
    protected function responseToCollection(array $response): CourseCollection
    {
        $date = new \DateTime($response['Date']);

        return new CourseCollection($this->hydrator->hydrate($response), $date);
    }
}
