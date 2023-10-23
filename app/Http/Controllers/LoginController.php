<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userss;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{

    public function index()
    {
        return view('LoginHome');
    }
    public function authenticate(Request $request)
    {
        $user = Userss::where('Email', $request->Email)->first();
        if ($user && Hash::check($request->Password, $user->Password)) {
            return redirect()->route('HomeLayout');
        } else {
            return redirect()->route('LoginHome')->withErrors(['Email hoặc mật khẩu không đúng']);
        }
    }

    //     public function handleFacebookCallback()
    //     {
    //         $user = Socialite::driver('facebook')->user();
    //         $existingUser = Userss::where('email', $user->email)->first();

    //         if ($existingUser) {
    //             auth()->login($existingUser, true);
    //         } else {
    //             $newUser = new Userss();
    //             $newUser->TenND = $user->name;
    //             $newUser->email = $user->email;
    //             $newUser->password = bcrypt(123456);
    //             $newUser->save();
    //             //auth()->login($newUser, true);
    //         }

    //         return redirect()->to('/');
    //     }
    //     public function handleGoogleCallback()
    //     {
    //         $user = Socialite::driver('google')->user();
    //         $existingUser = Userss::where('email', $user->email)->first();

    //         if ($existingUser) {
    //             auth()->login($existingUser, true);
    //         } else {
    //             $newUser = new Userss();
    //             $newUser->insertuser([
    //                 'MaND' => $user->id,
    //                 'TenND' => $user->name,
    //                 'email' => $user->email,
    //                 'password' => bcrypt(123456),
    //             ]);
    //             // auth()->login($newUser, true);
    //         }

    //         return redirect('/');
    //     }
    // }
}
