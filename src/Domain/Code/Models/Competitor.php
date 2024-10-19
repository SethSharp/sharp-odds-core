<?php

namespace SethSharp\SharpOddsCore\Domain\Code\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use SethSharp\SharpOddsCore\Models\Code\Enums\CompetitorType;
use SethSharp\SharpOddsCore\Domain\Betting\Models\SportingEvent;

class Competitor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type' => CompetitorType::class,
    ];

    /**
     * @return BelongsToMany<SportingEvent>
     */
    public function sportingEvents(): BelongsToMany
    {
        return $this->belongsToMany(SportingEvent::class, 'event_competitors', 'sporting_event_id')
            ->withTimestamps();
    }

    /**
     * @return BelongsTo<Sport, Competitor>
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
}
