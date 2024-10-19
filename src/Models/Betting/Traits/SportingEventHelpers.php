<?php

namespace Domain\Betting\Traits;

use Illuminate\Support\Str;
use Domain\Code\Models\Competitor;

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
