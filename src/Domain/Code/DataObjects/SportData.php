<?php

namespace SethSharp\SharpOddsCore\Domain\Code\DataObjects;

use Spatie\LaravelData\Data;
use SethSharp\SharpOddsCore\Domain\Code\Enums\SportType;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class SportData extends Data
{
    public function __construct(
        public int $id,
        public SportType $name,
        public string $display_name,
        public string $game_duration,
        public ?int $total_live_events,
    ) {
    }
}
