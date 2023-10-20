<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bloganime;
class BlogAniController extends Controller
{
    // 
    public function BAlist(){
        $list1 = new bloganime();
        $ds  = $list1->getall();
        $ds= bloganime::paginate(5);
        return view('admin.blogani.list', compact('ds'));
    }
}
