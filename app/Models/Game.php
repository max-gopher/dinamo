<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JetBrains\PhpStorm\ArrayShape;

class Game extends Model
{
    use HasFactory;

    const WHO_OWNER = 'owner';
    const WHO_GUEST = 'guest';

    protected $fillable = [
        'opponent_id',
        'date',
        'time',
        'season_id',
        'tur',
        'owner_score',
        'guest_score',
        'who'
    ];

    protected $casts = ['date' => 'datetime'];

    public function opponent(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'opponent_id');
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    #[ArrayShape([self::WHO_OWNER => "string", self::WHO_GUEST => "string"])]
    public static function getWhoOptions(): array
    {
        return [
            self::WHO_OWNER => 'Хозяин',
            self::WHO_GUEST => 'Гость'
        ];
    }
}
