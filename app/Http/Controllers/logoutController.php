<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function index()
    {
        return View('LoginHome');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('InforUser.Email');
        return View('LoginHome');
    }
}
