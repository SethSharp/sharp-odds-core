<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\Models;

use Domain\Code\Models\Competitor;
use Spatie\LaravelData\DataCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SethSharp\SharpOddsCore\Models\Betting\DataObjects\MarketData;

class Odd extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'odds_data' => DataCollection::class . ':' . MarketData::class
    ];

    /**
     * @return BelongsTo<Competitor, Odd>
     */
    public function competitor(): BelongsTo
    {
        return $this->belongsTo(Competitor::class);
    }

    /**
     * @return BelongsTo<Bookmaker, Odd>
     */
    public function bookmaker(): BelongsTo
    {
        return $this->belongsTo(Bookmaker::class);
    }

    /**
     * @return BelongsTo<SportingEvent, Odd>
     */
    public function sportingEvent(): BelongsTo
    {
        return $this->belongsTo(SportingEvent::class);
    }

    /**
     * @return BelongsTo<Market, Odd>
     */
    public function market(): BelongsTo
    {
        return $this->belongsTo(Market::class);
    }
}
