<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TBGoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{

    public function Index(){
        $goi = DB::table('tb_goi')->paginate(1);
        
        return view('register',['goi'=>$goi]);
    }
    public function store(Request $request)
    {
        $goi = new TBGoi();
        $goi->MaGoi = $request->input('MaGoi');
        $goi->ThoiGianSD = $request->input('ThoiGianSD');
        $goi->Gia = $request->input('Gia');
        $goi->GhiChu = $request->input('GhiChu');
        $goi->save();

        return view('addregister')->with('success', 'Gói đăng kí đã được thêm thành công!');
    }
}
  

?>