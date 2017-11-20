<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['user_id', 'event_id', 'created_at', 'updated_at'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function store($id)
    {
        return $this->firstOrCreate(
            ['event_id'=>$id, 'user_id'=>auth()->id()],
            [
                'event_id'=>$id,
                'user_id'=>auth()->id(),
                'created_at'=>Carbon::now(),
            ]);
    }
}
