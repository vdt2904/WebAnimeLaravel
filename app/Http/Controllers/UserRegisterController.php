<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Userss;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function index()
    {

        return view('SignupHome');
    }

    public function insertuser(Request $request)
    {
        $newuser = new Userss();
        $numberphoneRegex = '/^\d{10}$/';
        $cgmailRegex = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
        $cpasRegex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
        $cnameRegex = '/^([a-zA-Z]+\s?)*[a-zA-Z]+$/';
        $pass = $request->Password;
        $repass = $request->CFPassword;
        $email = $request->Email;
        $name = $request->TenND;
        $numberphone = $request->SDT;
        if (!preg_match($cgmailRegex, $email)) {
            return redirect()->route('signup')->withErrors(['Invalid email']);
        }
        if (Userss::where('Email', '=', $email)->exists()) {
            return redirect()->route('signup')->withErrors(['Email already exists']);
        }
        if (!preg_match($cnameRegex, $name)) {
            return redirect()->route('signup')->withErrors(['Invalid name']);
        }

        if (!preg_match($cpasRegex, $pass)) {
            return redirect()->route('signup')->withErrors(['Invalid password']);
        }

        if ($pass != $repass) {
            return redirect()->route('signup')->withErrors(['Passwords do not match']);
        }

        if (!preg_match($numberphoneRegex, $numberphone)) {
            return redirect()->route('signup')->withErrors(['invalid phone number']);
        }

        if (Userss::where('SDT', '=', $numberphone)->exists()) {
            return redirect()->route('signup')->withErrors(['Phone number already exists']);
        }

        $lastMaND = Userss::max('MaND');
        $newMaND = $lastMaND + 1;
        $newuser->insertnd([
            'MaND' => $newMaND + 1,
            'TenND' => $request->TenND,
            'Email' => $request->Email,
            'Password' => bcrypt($request->Password),
            'SDT' => $request->SDT,
            'LoaiND' => 1,
        ]);
        return redirect()->route('LoginHome');
    }
}
