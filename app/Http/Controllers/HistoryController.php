<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function index()
    {
        $sql = DB::select('SELECT g.MaGoi,tt.NgayMua,g.Gia,g.ThoiGianSD,g.GhiChu FROM tb_nguoidung nd JOIN tb_thanhtoan tt on nd.MaND = tt.MaND JOIN tb_goi g on g.MaGoi = tt.MaGoi WHERE nd.MaND = ' . session('InforUser.MaND'));
        return View('HistoryLayout', compact('sql'));
    }
    public function purchase(Request $request)
    {
        $maGoi = $request->input('MaGoi');
        $tg = Carbon::now();
        $a = DB::select('SELECT ThoiGianSD FROM tb_goi WHERE MaGoi = ?', [$maGoi]);
        $tghh = $tg->copy()->addMonths($a[0]->ThoiGianSD);
        $data = [
            'MaND' => session('InforUser.MaND'),
            'MaGoi' => $request->MaGoi,
            'NgayMua' => $tg,
            'NgayHetHan' => $tghh
        ];
        DB::table('tb_thanhtoan')->insert($data);
        $b = DB::select('UPDATE tb_nguoidung set LoaiND = 1 where MaND = '.sesssion('InforUser.MaND'));
        return redirect()->route('history');
    }
}
