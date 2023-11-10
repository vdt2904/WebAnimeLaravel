<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\viewmodel\topview;
class apilayoutController extends Controller
{
    //
    public function topday(){
        $topview = new topview();
        return $topview->TopDay();
    }
    public function topweek(){
        $topview = new topview();
        return $topview->TopWeek();
    }
    public function topmonth(){
        $topview = new topview();
        return $topview->TopMonth();
    }
    public function topyear(){
        $topview = new topview();
        return $topview->TopYear();
    }
    public function newcomments(){
        $ncmt = new topview();
        return $newcomment = $ncmt->newcomments();
    }
}
