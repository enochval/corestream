<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'package_id', 'category_id', 'title', 'description', 'event_type', 'event_date_time', 'amount', 'image_id', 'event_status', 'payment_status', 'link', 'link_status'
    ];

    const
        EVENT_PENDING = 0,
        EVENT_APPROVED = 1,
        EVENT_COMPLETED = 2,
        EVENT_PUBLISHED = 3,
        EVENT_CANCELED = 4,
        FREE_EVENT = 0,
        PAID_EVENT = 1,
        LINK_DISABLED = 0,
        LINK_ENABLED = 1;

    const IMAGE_CLASS = ['mfp-zoom-in', 'mfp-newspaper', 'mfp-move-horizontal', 'mfp-move-from-top', 'mfp-3d-unfold', 'mfp-zoom-out'];

    public static function rules()
    {
        return [
            'title'=>'required|string|max:255',
            'description'=>'required',
            'event_type'=>'required',
            'event_date_time'=>'required',
            'amount'=>'nullable|numeric',
            'image'=>'required|mimes:jpeg,bmp,png',
            'category_id'=>'numeric|required',
            'package_id'=>'numeric|required',
        ];
    }

    public static function store($input)
    {
        $image = static::upload($input);

        $event = static::firstOrCreate([
                    'title'=>$input->title,
                    'description'=>$input->description,
                    'event_type'=>$input->event_type,
                    'event_date_time'=>$input->event_date_time,
                    'amount'=>$input->amount,
                    'user_id'=>auth()->id(),
                    'image_id'=>$image->id,
                    'event_status'=> static::EVENT_PENDING,
                    'category_id'=>$input->category_id,
                    'package_id'=>$input->package_id,
                    'payment_status'=>Payment::NOT_PAID,
                ]);

        $image->event_id = $event->id;
        $image->save();

        HostedEvent::store($event->id);

        return $event;
    }

    public static function updateEvent($id, $input)
    {
        $image = static::upload($input);

        $update = static::updateOrCreate(
            ['id' => $id],
            [
                'title'=>$input->title,
                'description'=>$input->description,
                'event_type'=>$input->event_type,
                'event_date_time'=>$input->event_date_time,
                'amount'=> ($input->event_type == static::PAID_EVENT) ? $input->amount : null,
                'user_id'=>auth()->id(),
                'image_id'=>$image->id,
                'event_status'=> static::EVENT_PENDING,
                'category_id'=>$input->category_id,
                'package_id'=>$input->package_id,
            ]
        );

        $image->event_id = $update->id;
        $image->update();

        HostedEvent::updateHostedEvent($update->id);

        return $update;
    }

    public static function updateEventPaymentStatus($id)
    {
        $event = static::find($id);
        if ($event)
        {
            $event->payment_status = Payment::PAID;
            $event->update();
            return true;
        }
        return false;
    }

    public static function upload($file)
    {
        $photo_name = time().'.'.$file->image->getClientOriginalExtension();
        $photo_path = 'avatars/'.auth()->user()->full_name.'/images/'.$photo_name;

        if ($file->image->move(public_path('avatars/'.auth()->user()->full_name.'/images'), $photo_name))
        {
            $image = Image::create([
                        'name'=>$file->file('image')->getClientOriginalName(),
                        'image_path'=>$photo_path,
                    ]);
            if ($image)
                return $image;
        }else
            return false;
    }

    public static function singleEvent($id)
    {
        $event = static::find($id);
        if ($event)
            return $event;
        else
            return false;
    }

    //  check how to use this relationship to save dynamically the event id on the image table on the store function on this class
    /*
     * this is the new one from the web site and it is the new communication of this new na wah for the new complete checking of the confirmation page
     * */

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function eventByCategory($id)
    {
        return static::where('category_id', $id)->paginate(10);
    }

    public function hosted_event()
    {
        return $this->belongsTo(HostedEvent::class,  'id', 'event_id');
    }

    public function booked_event()
    {
        return $this->belongsTo(BookedEvent::class,  'id', 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function userCreatedThisEvent()
    {
        if ($this->user_id == auth()->id())
            return true;

        return false;
    }

    public static function approve($id)
    {
        $event = static::singleEvent($id);
        if ($event)
        {
            $event->event_status = Event::EVENT_APPROVED;
            $event->update();
            return true;
        }
        return false;
    }

    public static function decline($id)
    {
        $event = static::singleEvent($id);
        if ($event)
        {
            $event->event_status = static::EVENT_CANCELED;
            $event->update();
            return true;
        }
        return false;
    }

    public static function isApproved($id)
    {
        $event = static::singleEvent($id);
        if ($event)
        {
            if ($event->event_status == static::EVENT_APPROVED)
                return true;
        }
        return false;
    }

    public static function isDeclined($id)
    {
        $event = static::singleEvent($id);
        if ($event)
        {
            if ($event->event_status == static::EVENT_CANCELED)
                return true;
        }
        return false;
    }

    public static function hostHasPaid($id)
    {
        $event = static::find($id);

        if ($event)
        {
            if ($event->payment_status == Payment::PAID)
                return true;
        }
        return false;
    }

    public static function updateEventLink($id, $r)
    {
        $event = static::singleEvent($id);
        if($event)
        {
            $event->link = $r->uri;
            $event->update();
            return true;
        }
        return false;
    }

    public static function goLive($id)
    {
        $event = static::singleEvent($id);
        if($event)
        {
            $event->link_status = self::LINK_ENABLED;
            $event->update();
            return true;
        }
        return false;
    }

    public static function disableLink($id)
    {
        $event = static::singleEvent($id);
        if($event)
        {
            $event->link_status = self::LINK_DISABLED;
            $event->update();
            return true;
        }
        return false;
    }

    public static function bookedHasPaid($id)
    {
        $event = static::find($id);

        if ($event)
        {
            if ($event->booked_event->payment_status == Payment::PAID)
                return true;
        }
        return false;
    }
}
