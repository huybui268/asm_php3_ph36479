<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginGoogleController extends Controller
{

    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleCallback()
    // {
    //     try {

    //         $user = Socialite::driver('google')->user();

    //         $finduser = User::where('google_id', $user->id)->first();
    //         if ($finduser) {
    //             Auth::login($finduser);
    //             return redirect($finduser->role === 'admin' ? '/dashboard' : '/');
    //         } else {
    //             $newUser = User::create([
    //                 'fullname' => $user->name,
    //                 'email' => $user->email,
    //                 'google_id' => $user->id,
    //                 'password' => Str::random(15)
    //             ]);
    //             Auth::login($newUser);

    //             return redirect('/');
    //         }
    //     } catch (Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }
}
