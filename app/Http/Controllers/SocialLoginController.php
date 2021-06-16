<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\AuthUser;

class SocialLoginController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->stateless()->redirect();
    }

    public function callback($service)
    {
        $serviceUser = Socialite::driver($service)->stateless()->user();

        $email = $serviceUser->getEmail();
        $name = $serviceUser->getName();
        $id = $serviceUser->getId();

        // dd($email, $name, $id);

        $user = AuthUser::where('email', $email)->first();

        if (!$user) {
            $hash = Hash::make($email.$name.$id);
            $user = AuthUser::create([
                'email' => $email,
                'name' => $name,
                'driver' => $service,
                'driverId' => $id,
                'hash' => $hash
            ]);
        }

        dd($serviceUser, $email, $name, $id, $user, $hash);
    }
}
