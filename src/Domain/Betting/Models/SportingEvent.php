<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\Models;

use Carbon\Carbon;
use Domain\Code\Models\Sport;
use Domain\Code\Models\Competitor;
use Spatie\LaravelData\DataCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use SethSharp\SharpOddsCore\Models\Code\DataObjects\CompetitorData;
use SethSharp\SharpOddsCore\Models\Betting\DataObjects\SportEventData;

class SportingEvent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'commence_time' => 'datetime'
    ];

    /**
     * @return BelongsToMany<Competitor>
     */
    public function competitors(): BelongsToMany
    {
        return $this->belongsToMany(Competitor::class, 'event_competitors', 'sporting_event_id', 'competitor_id')
            ->withPivot('location', 'score')
            ->withTimestamps();
    }

    /**
     * @return HasMany<Odd>
     */
    public function odds(): HasMany
    {
        return $this->hasMany(Odd::class);
    }

    /**
     * @return BelongsTo<Sport, SportingEvent>
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * @return HasMany<EventUrls>
     */
    public function urls(): HasMany
    {
        return $this->hasMany(EventUrls::class);
    }

    public function scopeSport(Builder $query, Sport $sport): Builder
    {
        return $query->where('sport_id', $sport->id);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereBetween('commence_time', [
            now()->startOfDay(),
            now()->endOfDay()
        ]);
    }

    public function scopeWithinRange(Builder $query, string $end, string $start = null): Builder
    {
        if (!$start) {
            $start = now();
        }

        return $query->whereBetween('commence_time', [
            $start,
            $end
        ]);
    }

    public function scopeCurrentlyLive(Builder $query, Sport $sport): Builder
    {
        return $query->whereBetween('commence_time', [
            now()->subMinutes(80),
            now()
        ]);
    }

    public function scopeCurrentlyNotLive(Builder $query, $end): Builder
    {
        return $query->whereBetween('commence_time', [
            now()->addSeconds(30),
            $end
        ]);
    }

    public function isLive(): bool
    {
        // TODO: needs to account for half time scores + any overflow etc
        $commenceTime = Carbon::parse($this->commence_time);
        $endTime = $commenceTime->copy()->addMinutes($this->sport->game_duration);

        return now()->between($commenceTime, $endTime);
    }

    public function buildSportEventData(): SportEventData
    {
        $this->loadMissing(['competitors', 'sport']);

        $date = Carbon::parse($this->commence_time);

        return new SportEventData(
            id: $this->id,
            slug: $this->slug,
            is_live: $this->isLive(),
            commence_time: $date->format('D dS H:i'),
            display_time: $date->isToday()
                ? $date->format('g:i A')
                : $date->format('D g:i A'),
            event_uuid: $this->event_uuid,
            event_name: $this->event_name,
            sport: $this->sport->buildSportData(),
            competitors: CompetitorData::collect($this->competitors->map(fn (Competitor $competitor
            ) => CompetitorData::from([
                'type' => $competitor->type,
                'slug' => $competitor->slug,
                /** @phpstan-ignore-next-line */
                'score' => $competitor->pivot->score,
                /** @phpstan-ignore-next-line */
                'location' => $competitor->pivot->location,
                'display_name' => $competitor->display_name
            ])
            )->toArray(), DataCollection::class)
        );
    }
}
