<?php

namespace SethSharp\SharpOddsCore\Models\Code\Actions;

use SethSharp\SharpOddsCore\Models\Code\Models\Sport;
use SethSharp\SharpOddsCore\Models\Code\Enums\SportType;

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
