<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index()
    {
        $ttnd = DB::table('tb_nguoidung')->where('MaND',session('InforUser.MaND'))->first();
        //dd($ttnd);
        return View('UserDetail',compact('ttnd'));
    }
}
