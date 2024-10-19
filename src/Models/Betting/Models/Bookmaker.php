<?php

namespace Domain\Betting\Models;

use Spatie\LaravelData\DataCollection;
use Illuminate\Database\Eloquent\Model;
use Domain\Betting\Enums\BookmakersEnum;
use Domain\Betting\DataObjects\MarketData;
use Domain\Betting\DataObjects\BookmakerEventData;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
