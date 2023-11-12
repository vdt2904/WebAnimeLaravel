<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\viewmodel\tprl;
use Illuminate\Support\Facades\DB;
class categoryController extends Controller
{
    public function trending(){
        $c = 'TRENDING NOW';
        $a = new tprl();
        $b = $a->trending();
        return View('home.trending',compact('b','c'));
    }
    public function popular(){
        $c = 'POPULAR SHOWS';
        $a = new tprl();
        $b = $a->popular();
        return View('home.trending',compact('b','c'));
    }
    public function liveaction(){
        $c = 'Live Action';
        $a = new tprl();
        $b = $a->liveaction();
        return View('home.trending',compact('b','c'));
    }
    public function recently(){
        $c = 'RECENTLY ADDED SHOWS';
        $a = new tprl();
        $b = $a->recently();
        return View('home.trending',compact('b','c'));
    }
    public function category($id){
        $tl = DB::table('tb_theloai')->where('MaTL',$id)->first();
        $c = $tl->TheLoai;
        $a = new tprl();
        $b = $a->category($id);
        return View('home.trending',compact('b','c'));
    }
}
