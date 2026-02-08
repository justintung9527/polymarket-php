<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources\Clob;

use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use PolymarketPhp\Polymarket\Resources\Resource;

class Authentication extends Resource
{
    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function createApiKey(array $payload = []): array
    {
        return $this->httpClient->post('/create-api-key', $payload)->json();
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function deriveApiKey(array $payload = []): array
    {
        return $this->httpClient->get('/derive-api-key', $payload)->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getApiKeys(): array
    {
        return $this->httpClient->get('/api-keys')->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function deleteApiKey(): array
    {
        return $this->httpClient->delete('/api-key')->json();
    }
}
