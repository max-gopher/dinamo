<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'guest_id',
        'date',
        'time',
        'league_id',
        'tur',
        'owner_score',
        'guest_score'
    ];

    protected $casts = ['date' => 'datetime'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'owner_id');
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'guest_id');
    }

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}
