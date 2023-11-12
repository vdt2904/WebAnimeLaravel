<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\theloai;
use App\Models\tdtm;
use App\Models\tlanime;

class TheLoaiController extends Controller
{
    public function index()
    {
        $list = new theloai();
        $ds = $list->getall();
        $ds = theloai::paginate(5);
        return view('admin.theloai.index', compact('ds'));
    }
    public function create()
    {
        $table = 'tb_theloai';
        $column = 'MaTL';
        $mamd = 'TL0001';
        $ma = new tdtm();
        $ma = $ma->ma($table, $column, $mamd);
        // dd($ma);
        return view('admin.theloai.create', compact('ma'));
    }
    public function adddata(Request $request)
    {
        $tl = new theloai();
        $data = [
            'MaTL' => $request->matl,
            'TheLoai' => $request->theloai,
            'ThongTin' => $request->ThongTin,
        ];
        $add = $tl->insertdata($data);
        return redirect()->route('admin.theloai');
    }
    public function edit(Request $request, $id)
    {
        if (!empty($id)) {
            $tl = new theloai();
            $tldetail = $tl->getdetail($id);
            if (!empty($tldetail[0])) {
                $request->session()->put('MaTL', $id);
                $tldetail = $tldetail[0];
            } else {
                return redirect()->route('admin.theloai')->with('msg', 'blog không tồn tại');
            }
        } else {
            return redirect()->route('admin.theloai')->with('msg', 'lien ket không tồn tại');
        }
        //dd($blogdetail);
        return view('admin.theloai.edit', compact('tldetail'));
    }
    public function edittl(Request $request)
    {
        $MaTL = $request->session()->get('MaTL');
        $tl = new theloai();
        $tldetail = $tl->getdetail($MaTL);
        if (!empty($tldetail[0])) {
            $dataupdate = [
                'MaTL' => $MaTL,
                'TheLoai' => $request->theloai,
                'ThongTin' => $request->ThongTin,
            ];
        }
        $tl->updatedata($dataupdate, $MaTL);
        return redirect()->route('admin.theloai');
    }
    public function delete($id){
        $tl= new theloai();
        $tt = new tlanime();
        $ttdetail = $tt->getdetail($id);
        if(!empty($ttdetail)){
            return redirect()->route('admin.theloai')->with('msg','Xóa không thành công');
        }
        $tl->deletedata($id);
        return redirect()->route('admin.theloai')->with('successMsg','Xóa thành công');
    }
}
