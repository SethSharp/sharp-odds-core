<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class BookmakerEventData extends Data
{
    public function __construct(
        public int $id,
        public string $slug,
        public string $display_name,
        /** @var DataCollection<int, MarketData> $market_data */
        public DataCollection $market_data
    ) {
    }
}
