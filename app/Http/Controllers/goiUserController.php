<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class goiUserController extends Controller
{
    public function index()
    {
        $list = new Goi();
        $packages = $list->getall();
        $packages = Goi::paginate(10);
        //dd($sql);
        return View('Goilayout', compact('packages'));
    }
}
