<?php

namespace SethSharp\SharpOddsCore\Models\Betting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventUrls extends Model
{
    use HasFactory;

    protected $table = 'bookmaker_event_urls';

    protected $guarded = [];
}
