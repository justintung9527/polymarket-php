<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources;

use PolymarketPhp\Polymarket\Http\AsyncClientInterface;
use PolymarketPhp\Polymarket\Http\HttpClientInterface;

abstract class Resource
{
    public function __construct(
        protected readonly HttpClientInterface $httpClient,
        protected readonly ?AsyncClientInterface $asyncClient = null,
    ) {}
}
