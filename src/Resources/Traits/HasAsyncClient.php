<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources\Traits;

use PolymarketPhp\Polymarket\Exceptions\AsyncClientNotConfiguredException;
use PolymarketPhp\Polymarket\Http\AsyncClientInterface;

trait HasAsyncClient
{
    /**
     * @throws AsyncClientNotConfiguredException
     */
    private function getAsyncClient(): AsyncClientInterface
    {
        if (!$this->asyncClient instanceof AsyncClientInterface) {
            throw AsyncClientNotConfiguredException::notConfigured();
        }

        return $this->asyncClient;
    }
}
