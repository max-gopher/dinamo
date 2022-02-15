<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'season_id',
        'games',
        'win',
        'fail',
        'draw',
        'scored',
        'conceded',
        'score'
    ];

    public function club (): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function season (): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
