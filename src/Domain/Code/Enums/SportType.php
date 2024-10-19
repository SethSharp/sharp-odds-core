<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Enums;

use SethSharp\OddsApi\Enums\SportsEnum;

enum SportType: string
{
    case NRL = SportsEnum::RUGBYLEAGUE_NRL->value;
    case AFL = SportsEnum::AUSSIERULES_AFL->value;

    // TODO: This will probably become the total minutes
    // Probably doesn't need to be part of the db either
    // can also define other locally defined times here without DB logic
    public function gameMinutes(): int
    {
        return match ($this) {
            self::NRL, self::AFL => 80
        };
    }

    public function displayName(): string
    {
        return match ($this) {
            self::NRL => 'Rugby League',
            self::AFL => 'Aussie Rules Football'
        };
    }
}
