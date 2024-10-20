<?php

namespace  SethSharp\SharpOddsCore\Database\Factories\Betting;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use SethSharp\SharpOddsCore\Domain\Code\Models\Competitor;
use SethSharp\SharpOddsCore\Domain\Code\Enums\LocationType;
use SethSharp\SharpOddsCore\Domain\Betting\Models\SportingEvent;

class SportingEventFactory extends Factory
{
    protected $model = SportingEvent::class;

    public function definition(): array
    {
        $eventName = $this->faker->words(4, true);

        return [
            'sport_id' => Sport::factory(),
            'slug' => Str::slug($eventName),
            'event_name' => $eventName,
            'event_uuid' => $this->faker->uuid,
            'commence_time' => now()->addDays(random_int(4, 8))
        ];
    }

    public function live(): static
    {
        return $this->state(fn (array $attributes) => [
            'commence_time' => now(),
        ]);
    }

    public function withCompetitors(int $competitorCount = 2): self
    {
        return $this->afterCreating(function ($event) use ($competitorCount) {
            $competitors = Competitor::factory($competitorCount)->create();

            for ($x = 0; $x < $competitorCount; $x++) {
                $event->competitors()->attach([
                    $competitors[$x]->id => [
                        'location' => LocationType::cases()[array_rand(LocationType::cases())]->value
                    ],
                ]);
            }
        });
    }
}
