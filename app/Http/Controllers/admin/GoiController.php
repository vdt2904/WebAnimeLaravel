<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goi;
use App\Models\tdtm;
use App\Models\thanhtoan;
class GoiController extends Controller
{
    //
    public function index(){
        $list = new Goi();
        $ds = $list->getall();
        if(!empty($ds)){
            $ds = Goi::paginate(5);
        }
        return view('admin.goi.index',compact('ds'));
    }
    public function create(){
        $table = 'tb_goi';
        $column = 'MaGoi';
        $mamd = 'MG0001';
        $ma = new tdtm();
        $ma = $ma->ma($table,$column,$mamd);
       // dd($ma);
        return view('admin.goi.create',compact('ma'));
    }
    public function adddata(Request $request){
        $g = new Goi();
        $data = [
            'MaGoi' => $request->magoi,
            'ThoiGianSD' =>$request->thoigiansd,
            'Gia' =>$request->gia,
            'GhiChu' =>$request->ghichu,
        ];
        $add = $g->insertdata($data);
        return redirect()->route('admin.goi');
    }
    public function edit(Request $request,$id){
        if(!empty($id)){
            $g = new Goi();
            $gdetail = $g->getdetail($id);
            if(!empty($gdetail[0])){
                $request->session()->put('MaGoi',$id);
                $gdetail = $gdetail[0];
            }else{
                return redirect()->route('admin.goi')->with('msg','Goi không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.goi')->with('msg','Liên kết không tồn tại');
        }
        //dd($blogdetail);
        return view('admin.goi.edit',compact('gdetail'));
    }
    public function editg(Request $request){
        $MaGoi = $request->session()->get('MaGoi');
        $g = new Goi();
        $gdetail = $g->getdetail($MaGoi);
        if(!empty($gdetail[0])){
            $dataupdate = [
                'MaGoi' => $MaGoi,
                'ThoiGianSD' =>$request->thoigiansd,
                'Gia' =>$request->gia,
                'GhiChu' =>$request->ghichu,
            ];
        }        
        $g->updatedata($dataupdate,$MaGoi);
        return redirect()->route('admin.goi');
    }
    public function delete($id){
        $g= new Goi();
        $tt = new thanhtoan();
        $ttdetail = $tt->getdetail($id);
        if(!empty($ttdetail)){
            return redirect()->route('admin.goi')->with('msg','Xóa không thành công');
        }
        $g->deletedata($id);
        return redirect()->route('admin.goi')->with('successMsg','Xóa thành công');
    }
}
