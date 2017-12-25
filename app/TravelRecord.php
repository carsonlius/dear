<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRecord extends Model
{
    protected $fillable = ['type', 'protagonist', 'owner', 'title', 'content', 'location'];
}
