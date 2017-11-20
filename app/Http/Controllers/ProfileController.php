<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myAccount()
    {
        $user = auth()->user();
        return view('profile.profile', compact('user'));
    }

    public function updateProfile(Request $r)
    {
        $this->validate($r, User::rules());

        $update = User::updateUser(auth()->user(), $r);

        if ($update)
        {
            flash("<strong>".auth()->user()->full_name."'s profile successfully updated!</strong>")->success();
            return back();
        }

        flash('<strong>Error occurred: please try again')->error();
        return back();

    }
}
