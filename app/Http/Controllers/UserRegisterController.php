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
        $cpasRegex = '/^[a-zA-Z0-9]{8}$/';
        $cnameRegex = '/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/';
        $pass = $request->Password;
        $repass = $request->RePassword;
        $email = $request->Email;
        $name = $request->TenND;
        $numberphone = $request->SDT;
        if (!preg_match($cgmailRegex, $email)) {
            return redirect()->route('signup')->withErrors(['Email không hợp lệ']);
        }
        if (Userss::where('Email', '=', $email)->exists()) {
            return redirect()->route('signup')->withErrors(['Email đã tồn tại']);
        }
        if (!preg_match($cnameRegex, $name)) {
            return redirect()->route('signup')->withErrors(['Tên không hợp lệ']);
        }

        if (!preg_match($cpasRegex, $pass)) {
            return redirect()->route('signup')->withErrors(['Mật khẩu không hợp lệ']);
        }

        if ($pass != $repass) {
            return redirect()->route('signup')->withErrors(['Mật khẩu không trùng khớp']);
        }

        if (!preg_match($numberphoneRegex, $numberphone)) {
            return redirect()->route('signup')->withErrors(['Số điện thoại không hợp lệ']);
        }

        if (Userss::where('SDT', '=', $numberphone)->exists()) {
            return redirect()->route('signup')->withErrors(['Số điện thoại đã tồn tại']);
        }

        $newuser->insertuser([
            'MaND' => $count = Userss::count() + 1,
            'TenND' => $request->TenND,
            'Email' => $request->Email,
            'Password' => bcrypt($request->Password),
            'SDT' => $request->SDT,
            'LoaiND' => 1,
        ]);
        return redirect()->route('LoginHome');
    }
}
