<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class League extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'league_club');
    }
}
