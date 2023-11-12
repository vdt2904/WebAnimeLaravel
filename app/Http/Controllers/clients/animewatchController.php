<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\viewmodel\watch;
use Illuminate\Support\Facades\DB;
class animewatchController extends Controller
{
    //
    public function watch($maanime,$matp){
        $nd = DB::table('tb_nguoidung')->where('MaND',session('InforUser.MaND'))->first();
        $fim = DB::table('tb_anime')->where('MaAnime',$maanime)->first();
        if($nd == null){
            return redirect(route('LoginHome'));
        }
        if($fim->LP == 1 && $nd->LoaiND == 0){
            return redirect(route('goiLayout'));
        }
        $a = new watch();
        $b = $a->getdata($maanime,$matp);
        return View('home.watch',compact('b'));
    }
    public function comments($matp, $page, $perPage){
        $a = new watch();
        return $a->getcmt($matp, $page, $perPage);
    }
    public function insertcmt(Request $request,$maanime){
        $data=[         
            'MaND' => session('InforUser.MaND'),
            'MaTP' => $maanime,
            'Comment' => $request->cmt,
            'NgayComment' => now()
        ];
        $a = new watch();
        return $a->cmt($data);
    }
    public function insertView(Request $request, $ma)
    {
        // Lấy thông tin cần thiết từ request và session
        $maND = session('InforUser.MaND');
        $maTP = $ma;
        $ngayXem = now();

        // Insert vào bảng tb_view
        $data = [
            'MaND' => $maND,
            'MaTP' => $maTP,
            'NgayXem' => $ngayXem,
        ];

        $a = new watch();
        return $a->insertview($data);
    }
}
