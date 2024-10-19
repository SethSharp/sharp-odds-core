<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Actions;

use SethSharp\OddsApi\Enums\SportsEnum;
use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use SethSharp\SharpOddsCore\Domain\Code\Models\Competitor;
use SethSharp\SharpOddsCore\Domain\Code\Enums\NrlTeamsEnum;
use SethSharp\SharpOddsCore\Domain\Code\Enums\CompetitorType;

class SyncNrlTeamsAction
{
    public function __invoke(): void
    {
        $nrl = Sport::query()->firstWhere('name', SportsEnum::RUGBYLEAGUE_NRL->value);

        collect(NrlTeamsEnum::cases())
            ->each(function (NrlTeamsEnum $team) use ($nrl) {
                Competitor::firstOrCreate([
                    'sport_id' => $nrl->id,
                    'type' => CompetitorType::TEAM->value,
                    'slug' => $team->value,
                    'display_name' => $team->displayName(),
                ]);
            });
    }
}
