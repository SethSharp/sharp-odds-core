<?php

namespace SethSharp\SharpOddsCore\Domain\Betting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SethSharp\SharpOddsCore\Domain\Code\Models\Sport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SethSharp\SharpOddsCore\Database\Factories\Betting\MarketFactory;

class Market extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return new MarketFactory();
    }

    /**
     * @return HasMany<Odd>
     */
    public function odds(): HasMany
    {
        return $this->hasMany(Odd::class);
    }

    /**
     * @return BelongsTo<Sport, Market>
     */
    public function sportModel(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    // todo: potentially make a trait helper for other models which may use this
    public function scopeSport(Builder $query, Sport $sport): Builder
    {
        return $query->where('sport_id', $sport->id);
    }
}
