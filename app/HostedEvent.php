<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostedEvent extends Model
{
    protected $fillable = ['event_id', 'user_id'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function store($event_id)
    {
        $hosted = static::create([
            'event_id' => $event_id,
            'user_id' => auth()->id(),
        ]);
    }

    public static function updateHostedEvent($event_id)
    {
        $hosted_update = static::updateOrCreate(
            ['event_id' => $event_id],
            [
                'event_id' => $event_id,
                'user_id' => auth()->id(),
            ]
        );
    }

    public static function userHostedEvent($id)
    {
        return static::with('event')->where('user_id', $id)->orderBy('id', 'DESC')->get();
    }

    /*
     * Dont get confused, this function is for the admin to get all users hosted events
     * it is for super-admin and admin
     * */
    public static function getAllHostedEvent()
    {
        if(auth()->user()->hasRole(['super-admin', 'admin']))
            return static::with('event')->get();

        return false;
    }
}
