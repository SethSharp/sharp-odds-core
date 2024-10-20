<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;
use SethSharp\SharpOddsCore\Domain\Code\DataObjects\SportData;
use SethSharp\SharpOddsCore\Domain\Code\DataObjects\CompetitorData;

#[TypeScript]
class SportEventData extends Data
{
    public function __construct(
        public int $id,
        public string $slug,
        public bool $is_live,
        public string $commence_time,
        public string $display_time,
        public string $event_uuid,
        public string $event_name,
        public SportData $sport,
        /** @var DataCollection<int, CompetitorData> $competitors */
        public DataCollection $competitors
    ) {
    }
}
