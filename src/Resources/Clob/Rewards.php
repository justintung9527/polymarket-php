<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Resources\Clob;

use PolymarketPhp\Polymarket\Exceptions\PolymarketException;
use PolymarketPhp\Polymarket\Resources\Resource;

class Rewards extends Resource
{
    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getCurrentRewards(): array
    {
        return $this->httpClient->get('/rewards-markets-current')->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getForMarket(string $conditionId): array
    {
        return $this->httpClient->get("/rewards-markets/{$conditionId}")->json();
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getEarningsForDay(array $params): array
    {
        return $this->httpClient->get('/earnings-for-user-for-day', $params)->json();
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getTotalEarningsForDay(array $params): array
    {
        return $this->httpClient->get('/total-earnings-for-user-for-day', $params)->json();
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getUserEarningsAndMarketsConfig(array $params): array
    {
        return $this->httpClient->get('/rewards-earnings-percentages', $params)->json();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws PolymarketException
     */
    public function getRewardPercentages(): array
    {
        return $this->httpClient->get('/liquidity-reward-percentages')->json();
    }
}
