<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Cviebrock\EloquentSluggable\Sluggable;
use JetBrains\PhpStorm\ArrayShape;

class Article extends Model implements TaggableInterface
{
    use HasFactory, TaggableTrait, Sluggable;

    protected $fillable = ['name', 'image', 'content', 'date', 'category_id'];

    protected $casts = ['date' => 'datetime'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    #[ArrayShape(['slug' => "string[]"])]
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
