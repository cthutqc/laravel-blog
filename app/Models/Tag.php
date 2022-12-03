<?php

namespace App\Models;

use Cthutqc\ViewCount\ViewCountable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tag extends Model
{
    use SoftDeletes, HasSlug, HasFactory, ViewCountable;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->preventOverwrite();
    }

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function posts():BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

}
