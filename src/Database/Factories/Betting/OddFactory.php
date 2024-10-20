<?php

namespace  SethSharp\SharpOddsCore\Database\Factories\Betting;

use Illuminate\Database\Eloquent\Factories\Factory;
use SethSharp\SharpOddsCore\Domain\Betting\Models\Odd;
use SethSharp\SharpOddsCore\Domain\Betting\Models\Bookmaker;
use SethSharp\SharpOddsCore\Domain\Betting\Models\SportingEvent;

class OddFactory extends Factory
{
    protected $model = Odd::class;

    public function definition(): array
    {
        return [
            'sporting_event_id' => SportingEvent::factory(),
            'bookmaker_id' => Bookmaker::factory(),
            'odds_data' => []
        ];
    }
}
