<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class loginAdminController extends Controller
{
    public function index()
    {
        if (session('email')) {
            return redirect('/admin/dashboard');
        }
        return view('LoginAdmin');
    }
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $message = [
            'email.required' => 'Email đang trống!!!',
            'password.required' => 'Password đang trống!!!'
        ];
        $request->validate($rules, $message);

        $email = $request->input('email');
        $password = $request->input('password');
        $admin = DB::table('admin')->select('password')->where('email', $email)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            if (isset($request['remember']) && !empty($request['remember'])) {
                setcookie("email", $request['email'], time() + 3600);
                setcookie("password", $request['password'], time() + 3600);
            } else {
                setcookie("email", "");
                setcookie("password", "");
            }
            $request->session()->put('email', $email);
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Đăng nhập thất bại');
        }
    }
}
