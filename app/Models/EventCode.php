<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCode extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    protected $dates = [
        'expires_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function winners()
    {
        return $this->hasMany(Winner::class, 'event_code_id', 'id')->where('is_win', true);
    }

    public function registered()
    {
        return $this->hasMany(Winner::class, 'event_code_id', 'id');

    }

}
