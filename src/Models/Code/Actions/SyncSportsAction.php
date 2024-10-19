<?php

namespace Domain\Code\Actions;

use Domain\Code\Models\Sport;
use Domain\Code\Enums\SportType;

class SyncSportsAction
{
    public function __invoke(): void
    {
        collect(SportType::cases())
            ->each(function (SportType $sport) {
                Sport::firstOrCreate([
                    'name' => $sport->value,
                    'game_duration' => $sport->gameMinutes()
                ]);
            });
    }
}
