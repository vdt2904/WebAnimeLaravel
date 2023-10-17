<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tb_hangphim;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class hangphimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hangphim = DB::select('select * from tb_hangphim');
        return view('admin.hangphim.index', compact('hangphim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.hangphim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $MaHP = $request->input('MaHP');
        $HangPhim = $request->input('HangPhim');

        $mtl = DB::select("select * from tb_hangphim where MaHP = '$MaHP'");
        if ($mtl) {
            return redirect()->route('hangphim.index')->with('error', 'Mã hãng phim đã tồn tại.');
        } else {
            $sql = "INSERT INTO tb_hangphim (MaHP,HangPhim) VALUES ('$MaHP', '$HangPhim')";
        }
        DB::insert($sql);

        return redirect()->route('hangphim.index')->with('success', 'Thêm thành công');
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
    public function edit($MaHP)
    {
        $hangphim = tb_hangphim::find($MaHP); // Sử dụng Eloquent để lấy đối tượng theo ID
        return view('admin/hangphim/edit', compact('hangphim', 'MaHP'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaHP)
    {
        $HangPhim = $request->input('HangPhim');

        // Kiểm tra xem bản ghi có tồn tại trong cơ sở dữ liệu không
        $existingRecord = DB::table('tb_hangphim')->where('MaHP', $MaHP)->first();

        if (!$existingRecord) {
            return redirect()->route('hangphim.index')->with('error', 'Không tìm thấy thể loại phim');
        }

        // Thực hiện truy vấn SQL để cập nhật dữ liệu
        DB::table('tb_hangphim')
            ->where('MaHP', $MaHP)
            ->update([
                'HangPhim' => $HangPhim,
            ]);

        return redirect()->route('hangphim.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("delete from tb_hangphim where MaHP = ?", [$id]);
        return redirect()->route('hangphim.index')->with('success', 'Xóa thành công');
    }
}
