<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password', 'billing_address', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rules()
    {
        return [
            'full_name'=>'required|string|max:255',
            'email'=>'required|email',
            'phone'=>'nullable|numeric',
            'billing_address'=>'nullable|string|max:255',
        ];
    }

    public static function updateUser($user, $request)
    {
        $user->full_name = $request->full_name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->billing_address=$request->billing_address;

        if ($user->update())
            return true;
        else
            return false;
    }

    public static function userData($id)
    {
        return static::find($id);
    }

    public static function canApproveOrDeclineEvent()
    {
        if (auth()->user()->hasRole(['super-admin', 'admin']))
            return true;

        return false;
    }
}
