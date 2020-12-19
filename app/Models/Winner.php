<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id'
    ];

    public function mobile()
    {
        return $this->belongsTo(Mobile::class, 'mobile_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function code()
    {
        return $this->belongsTo(EventCode::class, 'event_code_id', 'id');
    }

}
