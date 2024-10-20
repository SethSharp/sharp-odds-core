<?php

namespace  SethSharp\SharpOddsCore\Database\Factories\Betting;

use Illuminate\Database\Eloquent\Factories\Factory;
use SethSharp\SharpOddsCore\Domain\Betting\Models\Market;

class MarketFactory extends Factory
{
    protected $model = Market::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
        ];
    }
}
