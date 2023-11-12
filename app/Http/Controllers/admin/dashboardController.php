<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userss;
use App\Models\Animess;
use App\Models\dashboard;



class dashboardController extends Controller
{
    public function Index(){
        $a = new dashboard();
        $dashboard = $a->dashboard();
        //dd($dashboard);
        return View('admin.dashboard.index',compact('dashboard'));
    }
    public function userlist(){
        $userss = new Userss();
        $userslist1 = $userss->getall(); 
       
        return View('admin.users.userlist',compact('userslist1'));
    }
    
    
}
