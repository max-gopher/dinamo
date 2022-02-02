<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Article extends Model implements TaggableInterface
{
    use HasFactory, TaggableTrait;

    protected $fillable = ['name', 'image', 'content', 'date', 'category_id'];

    protected $casts = ['date' => 'datetime'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
