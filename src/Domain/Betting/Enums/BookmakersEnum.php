<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\Enums;
enum BookmakersEnum: string
{
    case SPORTS_BET = 'sports_bet';
    case POINTS_BET = 'points_bet';
    case LAD_BROKES = 'lad_brokes';

    public function displayName(): string
    {
        return match ($this) {
            self::SPORTS_BET => 'Sports Bet',
            self::POINTS_BET => 'Points Bet',
            self::LAD_BROKES => 'Lad Brokes',
        };
    }
}
