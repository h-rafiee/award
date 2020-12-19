<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function allCodes()
    {
        $this->hasMany(Winner::class, 'mobile_id', 'id');
    }

    public function wins()
    {
        return $this->hasMany(Winner::class, 'mobile_id', 'id')->where('is_win', true);
    }

}
