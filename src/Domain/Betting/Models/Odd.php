<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\Models;

use Spatie\LaravelData\DataCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SethSharp\SharpOddsCore\Domain\Code\Models\Competitor;
use SethSharp\SharpOddsCore\Domain\Betting\DataObjects\MarketData;
use SethSharp\SharpOddsCore\Database\Factories\Betting\OddFactory;

class Odd extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'odds_data' => DataCollection::class . ':' . MarketData::class
    ];

    protected static function newFactory()
    {
        return new OddFactory();
    }

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
