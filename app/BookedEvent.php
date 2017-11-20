<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedEvent extends Model
{
    protected $fillable = ['event_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public static function userBookedEvent($id)
    {
        return static::with('event')->where('user_id', $id)->orderBy('id', 'DESC')->get();
    }

    public static function booked($id)
    {
        return static::firstOrCreate(
            [
                'user_id'=>auth()->id(),
                'event_id'=>$id,
            ],
            [
            'user_id'=>auth()->id(),
            'event_id'=>$id,
        ]);
    }

    public static function isBooked($event_id)
    {
        $model = static::where('event_id', '=', $event_id, 'AND')->where('user_id', '=', auth()->id())->first();

        if ($model)
            return true;

        return false;
    }

    public static function hasPaidBooked($event_id)
    {
        $model = static::where('event_id', '=', $event_id, 'AND')->where('user_id', '=', auth()->id())->first();

        if ($model)
        {
            if ($model->payment_status == Payment::PAID)
                return true;
        }
        return false;
    }

    public static function updatePaymentStatus($event_id)
    {
        $model = static::where('event_id', '=', $event_id, 'AND')->where('user_id', '=', auth()->id())->first();

        if ($model)
        {
            $model->payment_status = Payment::PAID;
            $model->update();
            return true;
        }
        return false;
    }
}
