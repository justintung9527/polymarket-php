<?php

declare(strict_types=1);

use Danielgnh\PolymarketPhp\Client;
use Danielgnh\PolymarketPhp\Exceptions\NotFoundException;
use Danielgnh\PolymarketPhp\Http\BatchResult;
use Danielgnh\PolymarketPhp\Http\FakeGuzzleHttpClient;
use GuzzleHttp\Promise\PromiseInterface;

beforeEach(function (): void {
    $this->fakeHttp = new FakeGuzzleHttpClient();
    $this->client = new Client(clobHttpClient: $this->fakeHttp);
});

describe('Clob Markets::getAsync', function (): void {
    it('returns a promise that resolves to market data', function (): void {
        $marketData = ['condition_id' => 'test-id', 'tokens' => []];
        $this->fakeHttp->addJsonResponse('GET', '/market/test-id', $marketData);

        $promise = $this->client->clob()->markets()->getAsync('test-id');

        expect($promise)->toBeInstanceOf(PromiseInterface::class);

        $result = $promise->wait();
        expect($result)->toBe($marketData);
    });
});

describe('Clob Markets::listAsync', function (): void {
    it('returns a promise that resolves to market list', function (): void {
        $marketsData = ['next_cursor' => '', 'data' => []];
        $this->fakeHttp->addJsonResponse('GET', '/markets', $marketsData);

        $promise = $this->client->clob()->markets()->listAsync();

        expect($promise)->toBeInstanceOf(PromiseInterface::class);

        $result = $promise->wait();
        expect($result)->toBe($marketsData);
    });
});

describe('Clob Markets::getMany', function (): void {
    it('fetches multiple markets in parallel', function (): void {
        $market1 = ['condition_id' => 'id1'];
        $market2 = ['condition_id' => 'id2'];

        $this->fakeHttp->addJsonResponse('GET', '/market/id1', $market1);
        $this->fakeHttp->addJsonResponse('GET', '/market/id2', $market2);

        $result = $this->client->clob()->markets()->getMany(['id1', 'id2']);

        expect($result)->toBeInstanceOf(BatchResult::class);
        expect($result->allSucceeded())->toBeTrue();
        expect($result['id1'])->toBe($market1);
    });

    it('handles partial failures', function (): void {
        $this->fakeHttp->addJsonResponse('GET', '/market/id1', ['condition_id' => 'id1']);
        $this->fakeHttp->addExceptionResponse('GET', '/market/id2', new NotFoundException('Not found'));

        $result = $this->client->clob()->markets()->getMany(['id1', 'id2']);

        expect($result->hasFailures())->toBeTrue();
        expect($result->succeeded)->toHaveCount(1);
        expect($result->failed)->toHaveCount(1);
    });
});
