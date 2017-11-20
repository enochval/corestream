<?php

namespace App\Http\Controllers\Auth;

use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class TwitterAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetTWUser(Socialite::driver('twitter')->user());
        auth()->login($user);

        return redirect()->to('/home');
    }
}
