<?php

namespace  SethSharp\SharpOddsCore\Database\Factories\Code;

use Illuminate\Database\Eloquent\Factories\Factory;
use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use SethSharp\SharpOddsCore\Domain\Code\Enums\SportType;

class SportFactory extends Factory
{
    protected $model = Sport::class;

    public function definition(): array
    {
        return [
            'name' => SportType::NRL->value,
            'game_duration' => 80
        ];
    }
}
