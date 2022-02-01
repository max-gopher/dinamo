<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'name'];

    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class, 'league_club');
    }
}
