<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['league_id', 'year'];

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function games_past(): HasMany
    {
        return $this->games()->past();
    }

    public function tour(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function getSelectedAttribute()
    {
        return request()->get('seasonId') == $this->id;
    }
}
