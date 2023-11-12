<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class dashboard extends Model
{
    use HasFactory;
    public function dashboard(){
        $moneymonth = DB::select('SELECT Sum(Gia) as Tien 
                                from tb_thanhtoan tt 
                                join tb_goi g on g.MaGoi = tt.MaGoi
                                WHERE MONTH(tt.NgayMua) = MONTH(CURRENT_DATE())
                                AND YEAR(tt.NgayMua) = YEAR(CURRENT_DATE())
                                ');
        $tongtien = DB::select('SELECT Sum(Gia) as TongTien
                        from tb_thanhtoan tt 
                        join tb_goi g on g.MaGoi = tt.MaGoi');
        $SoLuongUser = DB::select('SELECT count(MaND) as sl
                                from tb_nguoidung');
        $SoLuongUserVip = DB::select('SELECT count(MaND) as sl
        from tb_nguoidung where LoaiND = 1 ');
        $data = [
            'Tien' => $moneymonth[0]->Tien,
            'TongTien' => $tongtien[0]->TongTien,
            'SLUsers' => $SoLuongUser[0]->sl,
            'SLUsersVip' => $SoLuongUserVip[0]->sl,
        ];
        //dd($data);
        return $data;
    }
}
