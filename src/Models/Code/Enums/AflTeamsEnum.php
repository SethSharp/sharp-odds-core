<?php

namespace Domain\Code\Enums;

enum AflTeamsEnum: string
{
    case GOLD_COAST_SUNS = 'gold_coast_suns';
    case SYDNEY_SWANS = 'sydney_swans';

    public function displayName(): string
    {
        return match ($this) {
            self::GOLD_COAST_SUNS => 'Gold Coast Suns',
            self::SYDNEY_SWANS => 'Sydney Swans',
        };
    }

    public function searchableName(): string
    {
        return match ($this) {
            self::GOLD_COAST_SUNS => 'tigers',
            self::SYDNEY_SWANS => 'sydney swans',
        };
    }
}
