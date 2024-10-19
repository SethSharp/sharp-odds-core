<?php

namespace SethSharp\SharpOddsCore\Models\Betting\Traits;

use Illuminate\Support\Str;

trait SportingEventHelpers
{
    public function buildEventName(string $competitorOne, string $competitorTwo): string
    {
        return $competitorOne . ' vs ' . $competitorTwo;
    }

    public function buildSlugName(string $competitorOne, string $competitorTwo, string $uuid): string
    {
        return Str::slug($this->buildEventName($competitorOne, $competitorTwo)) . '-' . $uuid;
    }
}
