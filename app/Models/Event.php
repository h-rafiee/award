<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    protected $guarded = [
        'id'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function codes()
    {
        return $this->hasMany(EventCode::class, 'event_id', 'id');
    }

    public function winners()
    {
        return $this->hasMany(Winner::class, 'event_id', 'id')->where('is_win', true);
    }

    public function registered()
    {
        return $this->hasMany(Winner::class, 'event_id', 'id');
    }

}
