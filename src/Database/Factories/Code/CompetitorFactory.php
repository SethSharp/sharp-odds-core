<?php

namespace  SethSharp\SharpOddsCore\Database\Factories\Code;

use Illuminate\Database\Eloquent\Factories\Factory;
use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use SethSharp\SharpOddsCore\Domain\Code\Models\Competitor;
use SethSharp\SharpOddsCore\Domain\Code\Enums\NrlTeamsEnum;
use SethSharp\SharpOddsCore\Domain\Code\Enums\CompetitorType;

class CompetitorFactory extends Factory
{
    protected $model = Competitor::class;

    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        $rndKey = array_rand(NrlTeamsEnum::cases());

        return [
            'sport_id' => Sport::factory(),
            'type' => CompetitorType::TEAM->value,
            'slug' => NrlTeamsEnum::cases()[$rndKey]->value,
            'display_name' => $name,
        ];
    }
}
