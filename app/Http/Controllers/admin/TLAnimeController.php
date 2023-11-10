<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tlanime;
use Illuminate\Support\Facades\DB;
class TLAnimeController extends Controller
{
    public function index(){
        $list = new tlanime();
        $ds = $list->getall();
        if(!empty($ds)){
            $ds = tlanime::paginate(5);
        }
        return view('admin.tlanime.index',compact('ds'));
    }
    public function create(){
        $ani = DB::select('SELECT * from tb_anime');
        $tl = DB::select('SELECT * from tb_theloai');
        return view('admin.tlanime.create',compact('ani','tl'));
    }
    public function adddata(Request $request){
        $tla = new tlanime();
        $data = [
            'MaAnime' =>$request->maanime,
            'MaTL' =>$request->matl,
        ];
        $add = $tla->insertdata($data);
        return redirect()->route('admin.tlanime');
    }
    public function edit(Request $request,$id){
        if(!empty($id)){
            $tla = new tlanime();
            $tladetail = $tla->getdetail($id);
            if(!empty($tladetail[0])){
                $request->session()->put('ID',$id);
                $tladetail = $tladetail[0];
            }else{
                return redirect()->route('admin.tlanime')->with('msg','không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.tlanime')->with('msg','Liên kết không tồn tại');
        }
        $ani = DB::select('SELECT * from tb_anime');
        $tl = DB::select('SELECT * from tb_theloai');
        return view('admin.tlanime.edit',compact('tladetail','ani','tl'));
    }
    public function edittla(Request $request){
        $ID = $request->session()->get('ID');
        $tla = new tlanime();
        $tladetail = $tla->getdetail($ID);
        if(!empty($tladetail[0])){
            $dataupdate = [
                'MaAnime' => $request->maanime,
                'MaTL' =>$request->matl,
            ];
        }        
        $tla->updatedata($dataupdate,$ID);
        return redirect()->route('admin.tlanime');
    }
    public function delete($id){
        $tla = new tlanime();
        $tla->deletedata($id);
        return redirect()->route('admin.tlanime')->with('msg','Xóa thành công');
    }
}
