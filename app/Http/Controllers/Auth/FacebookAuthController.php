<?php

namespace App\Http\Controllers\Auth;

use App\Services\SocialFacebookAccountService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetFBUser(Socialite::driver('facebook')->stateless()->user());
        auth()->login($user);

        return redirect()->to('/home');
    }
}
