<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class OddsData extends Data
{
    public function __construct(
        public float|null $value,
        public string|null $subject,
    ) {
    }
}
