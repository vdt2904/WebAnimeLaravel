<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tb_theloai;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class theloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = DB::select('select * from tb_theloai');
        return view('admin.theloai.index', compact('theloai'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.theloai.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $MaTL = $request->input('MaTL');
        $TheLoai = $request->input('TheLoai');
        $ThongTin = $request->input('ThongTin');

        $mtl = DB::select("select * from tb_theloai where MaTL = '$MaTL'");
        if ($mtl) {
            return redirect()->route('theloai.index')->with('error', 'Mã thể loại đã tồn tại.');
        } else {
            $sql = "INSERT INTO tb_theloai (MaTL, TheLoai, ThongTin) VALUES ('$MaTL', '$TheLoai', '$ThongTin')";
        }
        DB::insert($sql);

        return redirect()->route('theloai.index')->with('success', 'Thêm thành công');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($MaTL)
    {
        $theloai = tb_theloai::find($MaTL); // Sử dụng Eloquent để lấy đối tượng theo ID
        return view('admin/theloai/edit', compact('theloai', 'MaTL'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaTL)
    {
        $TheLoai = $request->input('TheLoai');
        $ThongTin = $request->input('ThongTin');

        // Kiểm tra xem bản ghi có tồn tại trong cơ sở dữ liệu không
        $existingRecord = DB::table('tb_theloai')->where('MaTL', $MaTL)->first();

        if (!$existingRecord) {
            return redirect()->route('theloai.index')->with('error', 'Không tìm thấy thể loại phim');
        }

        // Thực hiện truy vấn SQL để cập nhật dữ liệu
        DB::table('tb_theloai')
            ->where('MaTL', $MaTL)
            ->update([
                'TheLoai' => $TheLoai,
                'ThongTin' => $ThongTin,
            ]);

        return redirect()->route('theloai.index')->with('success', 'Cập nhật thành công');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("delete from tb_theloai where MaTL = ?", [$id]);
        return redirect()->route('theloai.index')->with('success', 'Xóa thành công');
    }
}
