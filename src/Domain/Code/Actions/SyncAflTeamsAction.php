<?php

namespace SethSharp\SharpOddsCore\Models\Code\Actions;

use Domain\Code\Models\Competitor;
use Domain\Code\Enums\AflTeamsEnum;
use SethSharp\SharpOddsCore\Models\Code\Models\Sport;
use SethSharp\SharpOddsCore\Models\Code\Enums\SportType;
use SethSharp\SharpOddsCore\Models\Code\Enums\CompetitorType;

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
