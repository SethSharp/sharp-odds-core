<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Actions;

use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use SethSharp\SharpOddsCore\Domain\Code\Enums\SportType;

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
