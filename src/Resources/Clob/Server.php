<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources\Clob;

use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use PolymarketPhp\Polymarket\Resources\Resource;

class Server extends Resource
{
    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function healthCheck(): array
    {
        return $this->httpClient->get('/')->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getTime(): array
    {
        return $this->httpClient->get('/time')->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getFeeRate(string $tokenId): array
    {
        return $this->httpClient->get('/fee-rate', ['token_id' => $tokenId])->json();
    }
}
