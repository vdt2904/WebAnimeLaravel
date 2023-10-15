<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userss;
use App\Models\Animess;



class dashboardController extends Controller
{
    public function Index(){
        return View('AdminLayout');
    }
    public function userlist(){
        $userss = new Userss();
        $userslist1 = $userss->getall(); 
       
        return View('admin.users.userlist',compact('userslist1'));
    }
    public function animelist(){
        $userss = new Animess();
        $userslist1 = $userss->getall(); 
        return View('admin.animes.animelist',compact('userslist1'));
    }
    
}
