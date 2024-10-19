<?php

namespace SethSharp\SharpOddsCore\Models\Code\Enums;

enum NrlTeamsEnum: string
{
    case WESTS_TIGERS = 'wests_tigers';
    case NORTH_QUEENSLAND_COWBOYS = 'north_queensland_cowboys';
    case NEW_ZEALAND_WARRIORS = 'new_zealand_warriors';
    case PARRAMATTA_EELS = 'parramatta_eels';
    case DOLPHINS = 'dolphins';
    case SYDNEY_ROOSTERS = 'sydney_roosters';
    case GOLD_COAST_TITANS = 'gold_coast_titans';
    case BRISBANE_BRONCOS = 'brisbane_broncos';
    case MELBOURNE_STORM = 'melbourne_storm';
    case ST_GEORGE_ILLAWARRA_DRAGONS = 'st_george_illawarra_dragons';
    case CRONULLA_SUTHERLAND_SHARKS = 'cronulla_sutherland_sharks';
    case SOUTH_SYDNEY_RABBITOHS = 'south_sydney_rabbitohs';
    case PENRITH_PANTHERS = 'penrith_panthers';
    case NEWCASTLE_KNIGHTS = 'newcastle_knights';
    case CANTERBURY_BULLDOGS = 'canterbury_bulldogs';
    case CANBERRA_RAIDERS = 'canberra_raiders';
    case MANLY_WARRINGAH_SEA_EAGLES = 'manly_warringah_sea_eagles'; // todo: Double check this one

    public function displayName(): string
    {
        return match ($this) {
            self::WESTS_TIGERS => 'Wests Tigers',
            self::NORTH_QUEENSLAND_COWBOYS => 'North Queensland Cowboys',
            self::NEW_ZEALAND_WARRIORS => 'New Zealand Warriors',
            self::PARRAMATTA_EELS => 'Parramatta Eels',
            self::DOLPHINS => 'Dolphins',
            self::SYDNEY_ROOSTERS => 'Sydney Roosters',
            self::GOLD_COAST_TITANS => 'Gold Coast Titans',
            self::BRISBANE_BRONCOS => 'Brisbane Broncos',
            self::MELBOURNE_STORM => 'Melbourne Storm',
            self::ST_GEORGE_ILLAWARRA_DRAGONS => 'St George Illawarra Dragons',
            self::CRONULLA_SUTHERLAND_SHARKS => 'Cronulla Sutherland Sharks',
            self::SOUTH_SYDNEY_RABBITOHS => 'South Sydney Rabbitohs',
            self::PENRITH_PANTHERS => 'Penrith Panthers',
            self::NEWCASTLE_KNIGHTS => 'Newcastle Knights',
            self::CANTERBURY_BULLDOGS => 'Canterbury Bulldogs',
            self::CANBERRA_RAIDERS => 'Canberra Raiders',
            self::MANLY_WARRINGAH_SEA_EAGLES => 'Manly Sea Eagles',
        };
    }

    public function searchableName(): string
    {
        return match ($this) {
            self::WESTS_TIGERS => 'tigers',
            self::NORTH_QUEENSLAND_COWBOYS => 'cowboys',
            self::NEW_ZEALAND_WARRIORS => 'warriors',
            self::PARRAMATTA_EELS => 'eels',
            self::DOLPHINS => 'dolphins',
            self::SYDNEY_ROOSTERS => 'roosters',
            self::GOLD_COAST_TITANS => 'titans',
            self::BRISBANE_BRONCOS => 'broncos',
            self::MELBOURNE_STORM => 'storm',
            self::ST_GEORGE_ILLAWARRA_DRAGONS => 'dragons',
            self::CRONULLA_SUTHERLAND_SHARKS => 'sharks',
            self::SOUTH_SYDNEY_RABBITOHS => 'rabbitohs',
            self::PENRITH_PANTHERS => 'panthers',
            self::NEWCASTLE_KNIGHTS => 'knights',
            self::CANTERBURY_BULLDOGS => 'bulldogs',
            self::CANBERRA_RAIDERS => 'raiders',
            self::MANLY_WARRINGAH_SEA_EAGLES => 'sea eagles',
        };
    }
}
