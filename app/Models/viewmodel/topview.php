<?php

namespace App\Models\viewmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; 
class topview extends Model
{
    use HasFactory;
    public function TopDay(){
        $a = DB::select('SELECT
                a.MaAnime,
                a.Anime,
                a.AnhNgang,
                a.LP,
                a.TongSoTap,
                MAX(tp.Tap) AS MaxTap,
                COUNT(v.ID) AS TotalViews
            FROM
                tb_view v
                JOIN tb_tapphim tp ON v.MaTP = tp.MaTP
                JOIN tb_anime a ON tp.MaAnime = a.MaAnime
            WHERE
                v.NgayXem >= CURDATE()
            GROUP BY
                a.MaAnime,
                a.Anime,
                a.AnhNgang,
                a.LP,
                a.TongSoTap
            ORDER BY
                TotalViews DESC
            LIMIT 5');
        return $a;
    }
    public function TopWeek(){
        $startOfWeek = Carbon::now()->startOfWeek();
        $a = DB::select('SELECT
                a.MaAnime,
                a.Anime,
                a.AnhNgang,
                a.LP,
                a.TongSoTap,
                MAX(tp.Tap) AS MaxTap,
                COUNT(v.ID) AS TotalViews
            FROM
                tb_view v
                JOIN tb_tapphim tp ON v.MaTP = tp.MaTP
                JOIN tb_anime a ON tp.MaAnime = a.MaAnime
            WHERE
                v.NgayXem >= ? AND v.NgayXem < DATE_ADD(?, INTERVAL 1 WEEK)
            GROUP BY
                a.MaAnime,
                a.Anime,
                a.AnhNgang,
                a.LP,
                a.TongSoTap
            ORDER BY
                TotalViews DESC
            LIMIT 5',[$startOfWeek, $startOfWeek]);
        return $a;
    }
    public function TopMonth(){
        $a = DB::select("SELECT
            a.MaAnime,
            a.Anime,
            a.AnhNgang,
            a.LP,
            a.TongSoTap,
            MAX(tp.Tap) AS MaxTap,
            COUNT(v.ID) AS TotalViews
        FROM
            tb_view v
            JOIN tb_tapphim tp ON v.MaTP = tp.MaTP
            JOIN tb_anime a ON tp.MaAnime = a.MaAnime
        WHERE
            MONTH(v.NgayXem) = MONTH(CURRENT_DATE())
            AND YEAR(v.NgayXem) = YEAR(CURRENT_DATE())
        GROUP BY
            a.MaAnime,
            a.Anime,
            a.AnhNgang,
            a.LP,
            a.TongSoTap
        ORDER BY
            TotalViews DESC
        LIMIT 5");
        return $a;
    }
    public function TopYear(){
        $a = DB::select('SELECT
                a.MaAnime,
                a.Anime,
                a.AnhNgang,
                a.LP,
                a.TongSoTap,
                MAX(tp.Tap) AS MaxTap,
                COUNT(v.ID) AS TotalViews
            FROM
                tb_view v
                JOIN tb_tapphim tp ON v.MaTP = tp.MaTP
                JOIN tb_anime a ON tp.MaAnime = a.MaAnime
            WHERE
                YEAR(v.NgayXem) = YEAR(CURRENT_DATE())
            GROUP BY
                a.MaAnime,
                a.Anime,
                a.AnhNgang,
                a.LP,
                a.TongSoTap
            ORDER BY
                TotalViews DESC
            LIMIT 5');
        return $a;
    }
    public function newcomments(){
        $a = DB::select('SELECT
                    a.MaAnime,
                    a.Anime,
                    a.Anh,
                    a.LP,
                    tp.Views
                from tb_anime a
                join tb_tapphim tp on tp.MaAnime = a.MaAnime
                join tb_comments cmt on cmt.MaTP = tp.MaTP
                GROUP BY a.Anime, a.Anh,a.MaAnime,a.LP,tp.Views
                ORDER BY MAX(cmt.NgayComment) DESC
        ');
        $c = DB::select('SELECT
                a.MaAnime,  
                tl.MaTL,
                TheLoai
            from tb_anime a
            join tb_tlanime tla on tla.MaAnime = a.MaAnime
            join tb_theloai tl on tl.MaTL = tla.MaTL
            ORDER BY
                TheLoai ASC
        ');
        $data = [
            $a,$c
        ];
        return $data;
    }
}
