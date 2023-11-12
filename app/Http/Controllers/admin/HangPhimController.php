<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hangphim;
use App\Models\tdtm;
class HangPhimController extends Controller
{
    public function index(){
        $list = new hangphim();
        $ds = $list->getall();
        if(!empty($ds)){
            $ds = hangphim::paginate(5);
        }
        return view('admin.hangphim.index',compact('ds'));
    }
    public function create(){
        $table = 'tb_hangphim';
        $column = 'MaHP';
        $mamd = 'HP0001';
        $ma = new tdtm();
        $ma = $ma->ma($table,$column,$mamd);
       // dd($ma);
        return view('admin.hangphim.create',compact('ma'));
    }
    public function adddata(Request $request){
        $hp = new hangphim();
        $data = [
            'MaHP' => $request->mahp,
            'HangPhim' =>$request->hangphim,
        ];
        $add = $hp->insertdata($data);
        return redirect()->route('admin.hangphim');
    }
    public function edit(Request $request,$id){
        if(!empty($id)){
            $hp = new hangphim();
            $hpdetail = $hp->getdetail($id);
            if(!empty($hpdetail[0])){
                $request->session()->put('MaHP',$id);
                $hpdetail = $hpdetail[0];
            }else{
                return redirect()->route('admin.hangphim')->with('msg','Hãng phim không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.hangphim')->with('msg','Liên kết không tồn tại');
        }
        //dd($blogdetail);
        return view('admin.hangphim.edit',compact('hpdetail'));
    }
    public function edithp(Request $request){
        $MaHP = $request->session()->get('MaHP');
        $hp = new hangphim();
        $hpdetail = $hp->getdetail($MaHP);
        if(!empty($hpdetail[0])){
            $dataupdate = [
                'MaHP' => $MaHP,
                'HangPhim' => $request->hangphim,
            ];
        }        
        $hp->updatedata($dataupdate,$MaHP);
        return redirect()->route('admin.hangphim');
    }
    public function delete($id){
        $del = new hangphim();
        $del->deletedata($id);
        return redirect()->route('admin.hangphim')->with('msg','Xóa thành công');
    }
}
