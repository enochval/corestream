<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [];

    public static function subscriber()
    {
        return static::where('name', '=', 'subscriber')->first();
    }
}
