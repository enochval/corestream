<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];

    public static function eventCategory()
    {
        return static::orderBy('name')->pluck('name', 'id')->toArray();
    }

}
