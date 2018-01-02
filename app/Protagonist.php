<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protagonist extends Model
{
    protected $fillable = ['name_en', 'name', 'location', 'intro'];

    public function showProtagonist()
    {
        return self::first();
    }

    public function show()
    {
        return self::all();
    }
}
