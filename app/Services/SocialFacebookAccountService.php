<?php

namespace App\Services;

use App\Role;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetFBUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'full_name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
                $user->attachRole(Role::subscriber());
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }

    public function createOrGetTWUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('twitter')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'twitter'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'full_name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
                $user->attachRole(Role::subscriber());
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}