<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Kokomi;
use Illuminate\Http\Request;
use App\Models\Userss;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use App\Models\resetpass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        return redirect()->route('HomeLayout')->with('success', 'Logout successful!');
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
        // dd($user);
        $existingUser = Userss::where('email', $user->email)->first();
        $newUser = new Userss();

        if ($existingUser) {
            session()->put('InforUser', $user);
        } else {
            $newMaND = Userss::max('MaND') + 1;
            $newUser->insertnd([
                'MaND'  =>  $newMaND,
                'TenND' => $user->name,
                'Email' => $user->email,
                'Password' => bcrypt(12345678),
                'SDT' => 1,
                'LoaiND' => 1,
            ]);

            session()->put('InforUser', $user);
        }
        return redirect()->route('HomeLayout')->with('success', 'Login successful! Welcome ' . $user->TenND);
    }
    public function handleTwitterCallback()
    {
        $user = Socialite::driver('twitter')->user();
        // dd($user);
        $existingUser = Userss::where('email', $user->email)->first();
        $newUser = new Userss();

        if ($existingUser) {
            session()->put('InforUser', $user);
        } else {
            $newUser->insertnd([
                'MaND'  => Userss::count() + 1,
                'TenND' => $user->name,
                'Email' => $user->email,
                'Password' => bcrypt(12345678),
                'SDT' => 1,
                'LoaiND' => 1,
            ]);

            session()->put('InforUser', $user);
        }
        return redirect()->route('HomeLayout')->with('success', 'Login successful! Welcome ' . $user->TenND);
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        //dd($user);
        $existingUser = Userss::where('Email', $user->email)->first();
        $newUser = new Userss();

        if ($existingUser) {
            session()->put('InforUser', $existingUser);
        } else {
            $lastMaND = Userss::max('MaND');
            $newMaND = $lastMaND + 1;
            $newUser->insertnd([
                'MaND'  =>  $newMaND,
                'TenND' => $user->name,
                'Email' => $user->email,
                'Password' => bcrypt(12345678),
                'SDT' => 1,
                'LoaiND' => 1,
            ]);

            session()->put('InforUser', $user);
        }
        return redirect()->route('HomeLayout')->with('success', 'Login successful! Welcome ' . $user->name);
    }

    public function ForgotPassword()
    {
        return view('ForgotPassword');
    }
    public function SendEmail(Request $request)
    {
        $resetpassword = new resetpass();
        $user = Userss::where('Email', $request->Email)->first();
        if (!$user) {
            return redirect()->route('ForgotPassword')->withErrors(['Email not found!']);
        } else {
            $token = Str::random(64);
            $request->session()->put('token', $token);
            $details = [
                'link' => Route('GetResetPassword', ['token' => $token]),
                'time' => date('Y-m-d H:i:s')

            ];
            $currentDateTime = date('Y-m-d H:i:s');
            $resetpassword->insertresetpass([
                'ID' => resetpass::max('ID') + 1,
                'Email' => $request->Email,
                'Token' => $token,
                'MaND' => $user->MaND,
                'NewPass' => $user->Password,
                'Time' => $currentDateTime,
            ]);
            Mail::to($request->Email)->send(new Kokomi($details));
            return redirect()->route('ForgotPassword')->with('success', 'Send email successful!');
        }
    }

    public function ChangePassword(Request $request)
    {
        $expirationTime = now()->subMinutes(5);
        $resetpassword = resetpass::where('Token', session('token'))->first();

        if (!$resetpassword) {
            return redirect()->route('ForgotPassword')->withErrors(['Invalid or expired token!']);
        }

        if (!is_null($resetpassword->created_at)) {
            if ($resetpassword->created_at->lt($expirationTime)) {
                $resetpassword->deleteresetpass(session('token'));
                return redirect()->route('ForgotPassword')->withErrors(['Token has expired!']);
            }
        } else {
            $resetpassword->deleteresetpass(session('token'));
            $rgxpassword = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
            if (!preg_match($rgxpassword, $request->password)) {
                return redirect()->route('ResetPassword')->withErrors(['Password must be 8 characters long and contain only letters and numbers!']);
            } else {
                $user = Userss::where('Email', $resetpassword->Email)->first();
                $user->updatend($user->Email, [
                    'Password' => bcrypt($request->password),
                ]);
                return redirect()->route('LoginHome')->with('success', 'Change password successful!');
            }
        }
    }
}
