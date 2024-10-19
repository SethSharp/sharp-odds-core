<?php

namespace SethSharp\SharpOddsCore\Models\Betting\Enums;
enum AflMarketsEnum: string
{
    case HEAD_TO_HEAD = 'head_to_head';
    case LINE = 'line';
    
    public static function getEnumValuesAsString(): string
    {
        $keys = array_map(fn ($case) => $case->value, self::cases());

        return implode(', ', $keys);
    }
}
