<?php

namespace Domain\Betting\DataObjects;

use Spatie\LaravelData\Data;
use Domain\Code\DataObjects\SportData;
use Spatie\LaravelData\DataCollection;
use Domain\Code\DataObjects\CompetitorData;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

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
