<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket;

use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use PolymarketPhp\Polymarket\Http\AsyncClientInterface;
use PolymarketPhp\Polymarket\Http\GuzzleHttpClient;
use PolymarketPhp\Polymarket\Http\HttpClientInterface;
use PolymarketPhp\Polymarket\Resources\Gamma\Comments;
use PolymarketPhp\Polymarket\Resources\Gamma\Events;
use PolymarketPhp\Polymarket\Resources\Gamma\Health;
use PolymarketPhp\Polymarket\Resources\Gamma\Markets;
use PolymarketPhp\Polymarket\Resources\Gamma\Series;
use PolymarketPhp\Polymarket\Resources\Gamma\Sports;
use PolymarketPhp\Polymarket\Resources\Gamma\Tags;

/**
 * Gamma API Client.
 *
 * Handles all Gamma API operations (read-only market data).
 * https://gamma-api.polymarket.com
 *
 * Resources:
 * - Health: API health check
 * - Sports: Sports metadata and teams
 * - Tags: Tag management and relationships
 * - Events: Event information and metadata
 * - Markets: Market information and metadata
 * - Series: Series information
 * - Comments: Market and event comments
 * - Search: Global search across markets, events, and profiles
 */
class Gamma
{
    private readonly HttpClientInterface $httpClient;

    public function __construct(
        private readonly Config $config,
        ?HttpClientInterface $httpClient = null,
        private readonly ?AsyncClientInterface $asyncClient = null,
    ) {
        $this->httpClient = $httpClient ?? new GuzzleHttpClient($this->config->gammaBaseUrl, $this->config);
    }

    public function health(): Health
    {
        return new Health($this->httpClient, $this->asyncClient);
    }

    public function sports(): Sports
    {
        return new Sports($this->httpClient, $this->asyncClient);
    }

    public function tags(): Tags
    {
        return new Tags($this->httpClient, $this->asyncClient);
    }

    public function events(): Events
    {
        return new Events($this->httpClient, $this->asyncClient);
    }

    public function markets(): Markets
    {
        return new Markets($this->httpClient, $this->asyncClient);
    }

    public function series(): Series
    {
        return new Series($this->httpClient, $this->asyncClient);
    }

    public function comments(): Comments
    {
        return new Comments($this->httpClient, $this->asyncClient);
    }

    /**
     * Search markets, events, and profiles.
     *
     * @param array<string, mixed> $filters
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function search(string $query, array $filters = []): array
    {
        $response = $this->httpClient->get('/public-search', [
            'q' => $query,
            ...$filters,
        ]);

        return $response->json();
    }

    public function asyncClient(): ?AsyncClientInterface
    {
        return $this->asyncClient;
    }
}
