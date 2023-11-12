<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\viewmodel\watch;
class animewatchController extends Controller
{
    //
    public function watch($maanime,$matp){
        $a = new watch();
        $b = $a->getdata($maanime,$matp);
        return View('home.watch',compact('b'));
    }
    public function comments($matp, $page, $perPage){
        $a = new watch();
        return $a->getcmt($matp, $page, $perPage);
    }
}
