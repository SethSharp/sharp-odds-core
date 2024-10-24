<?php

namespace SethSharp\SharpOddsCore\Domain\Code\DataObjects;

use Spatie\LaravelData\Data;
use SethSharp\SharpOddsCore\Domain\Code\Enums\CompetitorType;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class CompetitorData extends Data
{
    public function __construct(
        public CompetitorType $type,
        public string $slug,
        public string $score,
        public string $location,
        public string $display_name,
    ) {
    }
}
