<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logoutAdminController extends Controller
{
    public function index()
    {
        return view('admin/loginAdmin');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('email');
        return redirect('/admin/loginadmin');
    }
}
