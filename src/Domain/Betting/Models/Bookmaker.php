<?php

namespace SethSharp\SharpOddsCore\Models\Betting\Models;

use Spatie\LaravelData\DataCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SethSharp\SharpOddsCore\Models\Betting\Enums\BookmakersEnum;
use SethSharp\SharpOddsCore\Models\Betting\DataObjects\MarketData;
use SethSharp\SharpOddsCore\Models\Betting\DataObjects\BookmakerEventData;

class Bookmaker extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => BookmakersEnum::class
    ];

    /**
     * @return HasMany<Odd>
     */
    public function odds(): HasMany
    {
        return $this->hasMany(Odd::class);
    }

    /**
     * @return HasMany<EventUrls>
     */
    public function urls(): HasMany
    {
        return $this->hasMany(EventUrls::class);
    }

    public function getLatestOddsForEvent(SportingEvent $sportingEvent)
    {
        return $this->odds()
            ->where('sporting_event_id', $sportingEvent->id)
            ->latest()
            ->first();
    }

    public function buildBettingDataForSportingEvent(SportingEvent $sportingEvent): BookmakerEventData
    {
        return new BookmakerEventData(
            id: $this->id,
            slug: $this->name->value,
            display_name: $this->name->displayName(),
            market_data: MarketData::collect(
                $this->getLatestOddsForEvent($sportingEvent)?->odds_data,
                DataCollection::class
            )
        );
    }
}
