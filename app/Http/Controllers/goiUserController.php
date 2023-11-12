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
        $tg = Carbon::now();
        $sql = DB::select('SELECT count(MaGoi) FROM tb_thanhtoan tt JOIN tb_nguoidung nd on tt.MaND = nd.MaND WHERE nd.MaND = ' . session('InforUser.MaND') . ' AND ' . ' NgayHetHan > ?', [$tg]);
        return View('Goilayout', compact('packages', 'sql'));
    }
}
