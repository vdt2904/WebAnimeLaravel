<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animess;



class AnimeController extends Controller
{
    public function animelist(){
        $userss = new Animess();
        $userslist1 = $userss->getall(); 
        dd($userslist1);
        return View('admin.animes.animelist',compact('userslist1'));
    }
}
