<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use PolymarketPhp\Polymarket\Client;
use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use GuzzleHttp\Promise\Utils;

$client = new Client();

try {
    $markets = $client->gamma()->markets()->list(['active' => true], limit: 10);

	var_dump($markets);

} catch (PolymarketException) {
	/* Handle exception */
}
