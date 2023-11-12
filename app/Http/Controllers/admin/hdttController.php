<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\thanhtoan;
class hdttController extends Controller
{
    public function index(){
        $data = thanhtoan::paginate(5);
        return View('admin.hdtt.index',compact('data'));
    }
}
