<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/home');

            } else {
                if ($user->user['verified_email']) {
                    $newUser = $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'picture' => $user->avatar,
                        'password' => encrypt('123456dummy'),
                    ]);

                    Auth::login($newUser);
                    return redirect('/home');
                } else {
                    $err = "Email is not verified";
                    dd($err);
                }
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home');
    }
}
