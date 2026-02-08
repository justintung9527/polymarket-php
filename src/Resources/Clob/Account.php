<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources\Clob;

use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use PolymarketPhp\Polymarket\Resources\Resource;

class Account extends Resource
{
    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getBalanceAllowance(array $params = []): array
    {
        return $this->httpClient->get('/balance-allowance', $params)->json();
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function updateBalanceAllowance(array $params = []): array
    {
        return $this->httpClient->get('/update-balance-allowance', $params)->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getNotifications(): array
    {
        return $this->httpClient->get('/notifications')->json();
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function dropNotifications(array $params = []): array
    {
        return $this->httpClient->delete('/notifications', $params)->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getClosedOnlyMode(): array
    {
        return $this->httpClient->get('/closed-only')->json();
    }
}
