<?php

declare(strict_types=1);

namespace PolymarketPhp\Polymarket\Enums;

enum OrderStatus: string
{
    case MATCHED = 'matched';
    case LIVE = 'live';
    case DELAYED = 'delayed';
    case UNMATCHED = 'unmatched';
}
