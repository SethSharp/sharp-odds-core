<?php

namespace  SethSharp\SharpOddsCore\Database\Factories\Betting;

use Illuminate\Database\Eloquent\Factories\Factory;
use SethSharp\SharpOddsCore\Domain\Betting\Models\Bookmaker;

class BookmakerFactory extends Factory
{
    protected $model = Bookmaker::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
