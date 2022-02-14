<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'our_score',
        'opponent_score',
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

    public function scopeFuture(Builder $query): Builder
    {
        return $query->where(function ($q) {
            $q->where('date', '>', now())
                ->whereNull('our_score')
                ->whereNull('opponent_score');
        });
    }

    public function scopePast(Builder $query): Builder
    {
        return $query->where(function ($q) {
            $q->where('date', '<', now())
                ->whereNotNull('our_score')
                ->whereNotNull('opponent_score');
        });
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
