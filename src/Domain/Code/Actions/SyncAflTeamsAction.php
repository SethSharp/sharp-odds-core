<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Actions;

use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use SethSharp\SharpOddsCore\Domain\Code\Enums\SportType;
use SethSharp\SharpOddsCore\Domain\Code\Models\Competitor;
use SethSharp\SharpOddsCore\Domain\Code\Enums\AflTeamsEnum;
use SethSharp\SharpOddsCore\Domain\Code\Enums\CompetitorType;

class SyncAflTeamsAction
{
    public function __invoke(): void
    {
        $afl = Sport::query()->firstWhere('name', SportType::AFL->value);

        collect(AflTeamsEnum::cases())
            ->each(function (AflTeamsEnum $team) use ($afl) {
                Competitor::firstOrCreate([
                    'sport_id' => $afl->id,
                    'type' => CompetitorType::TEAM->value,
                    'slug' => $team->value,
                    'display_name' => $team->displayName(),
                ]);
            });
    }
}
