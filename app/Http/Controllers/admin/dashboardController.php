<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userss;
use App\Models\Animess;



class dashboardController extends Controller
{
    public function Index(){
        return View('admin.dashboard.index');
    }
    public function userlist(){
        $userss = new Userss();
        $userslist1 = $userss->getall(); 
       
        return View('admin.users.userlist',compact('userslist1'));
    }
    
    
}
