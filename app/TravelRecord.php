<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRecord extends Model
{
    protected $fillable = ['type', 'protagonist', 'owner', 'title', 'content', 'location', 'shot_time'];
    protected $dates = [
        'created_at',
        'updated_at',
        'shot_time'
    ];



//    protected $casts = [
//        'shot_time' => 'date'
//    ];

    
}
