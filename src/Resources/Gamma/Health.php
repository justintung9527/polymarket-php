<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources\Gamma;

use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use PolymarketPhp\Polymarket\Resources\Resource;

class Health extends Resource
{
    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function check(): array
    {
        $response = $this->httpClient->get('/');

        return $response->json();
    }
}
