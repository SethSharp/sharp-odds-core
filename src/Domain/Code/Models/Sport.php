<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SethSharp\SharpOddsCore\Models\Code\Enums\SportType;
use SethSharp\SharpOddsCore\Domain\Betting\Models\Market;
use SethSharp\SharpOddsCore\Models\Code\DataObjects\SportData;
use SethSharp\SharpOddsCore\Domain\Betting\Models\SportingEvent;

class Sport extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => SportType::class
    ];

    /**
     * @return HasMany<Competitor>
     */
    public function competitors(): HasMany
    {
        return $this->hasMany(Competitor::class);
    }

    /**
     * @return HasMany<SportingEvent>
     */
    public function sportingEvents(): HasMany
    {
        return $this->hasMany(SportingEvent::class);
    }

    /**
     * @return HasMany<Market>
     */
    public function markets(): HasMany
    {
        return $this->hasMany(Market::class);
    }

    public function buildSportData(bool $withEventCounts = false): SportData
    {
        return SportData::from([
            'id' => $this->id,
            'name' => $this->name,
            'display_name' => $this->name->displayName(),
            'game_duration' => $this->game_duration,
            'total_live_events' => $withEventCounts
                ? $this->sportingEvents()->currentlyLive($this)->count()
                : null
        ]);
    }
}
