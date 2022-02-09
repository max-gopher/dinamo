<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'name'];

    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class, 'league_club');
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'opponent_id');
    }
}
