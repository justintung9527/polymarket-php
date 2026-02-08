<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use PolymarketPhp\Polymarket\Client;
use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use GuzzleHttp\Promise\Utils;

$client = new Client();

try {
     $client->auth();

     $orders = $client
	     ->clob()
	     ->orders()
	     ->get('60487116984468020978247225474488676749601001829886755968952521846780452448915');

	 var_dump($orders);
} catch (PolymarketException) {
	/* Handle exception */
}
