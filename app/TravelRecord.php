<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRecord extends Model
{
    protected $fillable = ['type', 'protagonist', 'owner', 'title', 'content', 'location', 'shot_time'];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

//    protected $casts = [可以实现数据的转型 类似与访问器
//        'shot_time' => ''
//    ];

    
}
