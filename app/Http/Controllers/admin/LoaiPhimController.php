<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loaiphim;
use App\Models\tdtm;
use Illuminate\Support\Facades\DB;
class LoaiPhimController extends Controller
{
    public function index(){
        $list = new loaiphim();
        $ds = $list->getall();
        if(!empty($ds)){
            $ds = loaiphim::paginate(5);
        }
        return view('admin.loaiphim.index',compact('ds'));
    }
    public function create(){
        $table = 'tb_loaiphim';
        $column = 'MaLP';
        $mamd = 'LP0001';
        $ma = new tdtm();
        $ma = $ma->ma($table,$column,$mamd);
       // dd($ma);
        return view('admin.loaiphim.create',compact('ma'));
    }
    public function adddata(Request $request){
        $lp = new loaiphim();
        $data = [
            'MaLP' => $request->malp,
            'LoaiPhim' =>$request->loaiphim,
        ];
        $add = $lp->insertdata($data);
        return redirect()->route('admin.loaiphim');
    }
    public function edit(Request $request,$id){
        if(!empty($id)){
            $lp = new loaiphim();
            $lpdetail = $lp->getdetail($id);
            if(!empty($lpdetail[0])){
                $request->session()->put('MaLP',$id);
                $lpdetail = $lpdetail[0];
            }else{
                return redirect()->route('admin.loaiphim')->with('msg','Hãng phim không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.loaiphim')->with('msg','Liên kết không tồn tại');
        }
        //dd($blogdetail);
        return view('admin.loaiphim.edit',compact('lpdetail'));
    }
    public function editlp(Request $request){
        $MaLP = $request->session()->get('MaLP');
        $lp = new loaiphim();
        $lpdetail = $lp->getdetail($MaLP);
        if(!empty($lpdetail[0])){
            $dataupdate = [
                'MaLP' => $MaLP,
                'loaiPhim' => $request->loaiphim,
            ];
        }        
        $lp->updatedata($dataupdate,$MaLP);
        return redirect()->route('admin.loaiphim');
    }
    public function delete($id){
        $check = DB::select('SELECT * from tb_anime Where MaLP = ? ',[$id]);
        if(!empty($check)){
            return redirect()->route('admin.loaiphim')->with('msg','Xóa không thành công');
        }
        $del = new loaiphim();
        $del->deletedata($id);
        return redirect()->route('admin.loaiphim')->with('successMsg','Xóa thành công');
    }
}
