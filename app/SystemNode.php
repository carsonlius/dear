<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemNode extends Model
{
    protected $fillable = ['pid', 'name', 'label', 'node', 'listorder', 'is_show'];
}
