<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\viewmodel\homedata;
class HomeController extends Controller
{
    public function index(){
        $a = new homedata();
        $recently = $a->recently();
        $popular = $a->popular();
        $liveaction = $a->liveaction();
        $trending = $a->trending();
        $caro = $a->caro();
        return View('home.index',compact('recently','popular','liveaction','trending','caro'));
    }
}
