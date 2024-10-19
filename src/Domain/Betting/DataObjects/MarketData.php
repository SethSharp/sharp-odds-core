<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class MarketData extends Data
{
    public function __construct(
        public string|null $label,
        public string|null $last_updated,
        /** @var DataCollection<int, OddsData> $odds */
        public DataCollection|null $odds
    ) {
    }
}
