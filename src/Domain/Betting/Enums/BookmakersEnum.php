<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\Enums;

use SethSharp\OddsApi\Enums\BookmakersEnum as OddsApiBookmakersEnum;

enum BookmakersEnum: string
{
    case SPORTS_BET = OddsApiBookmakersEnum::SPORTSBET->value;
    case POINTS_BET = OddsApiBookmakersEnum::POINTSBETAU->value;
    case LAD_BROKES = OddsApiBookmakersEnum::LADBROKES_AU->value;

    public function displayName(): string
    {
        return match ($this) {
            self::SPORTS_BET => 'Sports Bet',
            self::POINTS_BET => 'Points Bet',
            self::LAD_BROKES => 'Lad Brokes',
        };
    }
}
