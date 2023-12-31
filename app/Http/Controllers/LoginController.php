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

    public function login(Request $request)
    {
        $user = Userss::where('Email', $request->Email)->first();
        if ($user && Hash::check($request->Password, $user->Password)) {
            $request->session()->put('InforUser', $user);
            return redirect()->route('HomeLayout')->with('success', 'Login successful! Welcome ' . $user->TenND);
        } else {
            return redirect()->route('LoginHome')->withErrors(['Email or passworf incorrect!']);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('InforUser');
        return redirect()->route('HomeLayout')->with('success', 'Logout successful!');;
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

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $existingUser = Userss::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new Userss();
            $newUser->TenND = $user->name;
            $newUser->email = $user->email;
            $newUser->password = bcrypt(123456);
            $newUser->save();
            //auth()->login($newUser, true);
        }

        return redirect()->to('/');
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $existingUser = Userss::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new Userss();
            $newUser->insertuser([
                'MaND' => Userss::count() + 1,
                'TenND' => $user->name,
                'Email' => $user->email,
                'Password' => bcrypt(123456),
                'SDT' => '0',
                'LoaiND' => 1,

            ]);
            Auth::login($newUser, true);
        }

        return redirect()->route('HomeLayout');
    }
}
