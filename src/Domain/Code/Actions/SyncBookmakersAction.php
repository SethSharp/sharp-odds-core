<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Actions;

use SethSharp\SharpOddsCore\Domain\Betting\Models\Bookmaker;
use SethSharp\SharpOddsCore\Domain\Betting\Enums\BookmakersEnum;

class SyncBookmakersAction
{
    public function __invoke(): void
    {
        collect(BookmakersEnum::cases())
            ->each(function (BookmakersEnum $bookmakersEnum) {
                Bookmaker::firstOrCreate([
                    'name' => $bookmakersEnum->value
                ]);
            });
    }
}
