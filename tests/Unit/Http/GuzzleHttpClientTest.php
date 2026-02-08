<?php

declare(strict_types=1);

use GuzzleHttp\Client as GuzzleClient;
use PolymarketPhp\Polymarket\Config;
use PolymarketPhp\Polymarket\Http\GuzzleHttpClient;

describe('GuzzleHttpClient', function (): void {
    it('exposes internal Guzzle client', function (): void {
        $config = new Config();
        $client = new GuzzleHttpClient('https://example.com', $config);

        $guzzle = $client->getGuzzleClient();

        expect($guzzle)->toBeInstanceOf(GuzzleClient::class);
    });
});
