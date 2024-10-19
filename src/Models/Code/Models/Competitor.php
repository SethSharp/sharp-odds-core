<?php

namespace Domain\Code\Models;

use Domain\Code\Enums\CompetitorType;
use Illuminate\Database\Eloquent\Model;
use Domain\Betting\Models\SportingEvent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
