<?php

namespace App\Models\viewmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; 
class homedata extends Model
{
    use HasFactory;
    public function recently(){
        $a = DB::select('SELECT
                a.MaAnime,
                a.Anime,
                a.Anh,
                a.LP,
                a.TongSoTap,
                Max(tp.Tap) AS MaxTap,
                Sum(tp.Views) AS TongViews,
                Sum(tp.Comments) AS TongComments
            FROM
                tb_anime a
                JOIN tb_tapphim tp ON tp.MaAnime = a.MaAnime
            GROUP BY
                a.MaAnime,
                a.Anime,
                a.Anh,
                a.LP,
                a.TongSoTap
            ORDER BY
                a.MaAnime DESC
            LIMIT 5
        ');
        $b = DB::select('SELECT
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
            $a,$b
        ];
        return $data;
    }
    public function popular(){
        $a = DB::select('SELECT
                a.MaAnime,
                a.Anime,
                a.Anh,
                a.LP,
                a.TongSoTap,
                Max(tp.Tap) AS MaxTap,
                Sum(tp.Views) AS TongViews,
                Sum(tp.Comments) AS TongComments
            FROM
                tb_anime a
                JOIN tb_tapphim tp ON tp.MaAnime = a.MaAnime
            GROUP BY
                a.MaAnime,
                a.Anime,
                a.Anh,
                a.LP,
                a.TongSoTap
            ORDER BY
                TongViews DESC
            LIMIT 5
        ');
        $b = DB::select('SELECT
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
            $a,$b
        ];
        return $data;
    }
    public function liveaction(){
        $a = DB::select('SELECT
                a.MaAnime,
                a.Anime,
                a.Anh,
                a.LP,
                a.TongSoTap,
                Max(tp.Tap) AS MaxTap,
                Sum(tp.Views) AS TongViews,
                Sum(tp.Comments) AS TongComments
            FROM
                tb_anime a
                JOIN tb_tapphim tp ON tp.MaAnime = a.MaAnime
                Join tb_tlanime tla ON tla.MaAnime = a.MaAnime
            Where
                tla.MaTL = "TL0003"
            GROUP BY
                a.MaAnime,
                a.Anime,
                a.Anh,
                a.LP,
                a.TongSoTap
            ORDER BY
                TongViews DESC
            LIMIT 5
        ');
        $b = DB::select('SELECT
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
            $a,$b
        ];
        return $data;
    }
    public function trending(){
        $a = DB::select('SELECT
                    a.MaAnime,
                    tla.MaTL,
                    Max(bl.IDBlog) as newBlog
                from 
                    tb_anime a
                Join 
                    tb_tlanime tla on tla.MaAnime = a.MaAnime
                Join 
                    tb_blog bl on bl.MaAnime = a.MaAnime
                GROUP BY
                    a.MaAnime, tla.MaTL
                order by
                     newBlog DESC                    
        ');
        $maTLCounts = [];
        foreach ($a as $item) {
            $maTL = $item->MaTL;
            if (!isset($maTLCounts[$maTL])) {
                $maTLCounts[$maTL] = 1;
            } else {
                $maTLCounts[$maTL]++;
            }
        }        
        // Now $maTLCounts contains the count of each MaTL
        arsort($maTLCounts); // Sort the array in descending order by count      
        $mostFrequentMaTL = key($maTLCounts); // Get the key (MaTL) with the highest count
        $b = DB::select('SELECT
                    a.MaAnime,
                    a.Anime,
                    a.Anh,
                    a.LP,
                    a.TongSoTap,
                    Max(tp.Tap) AS MaxTap,
                    Sum(tp.Views) AS TongViews,
                    Sum(tp.Comments) AS TongComments
                from tb_anime a
                join tb_tlanime tla on tla.MaAnime = a.MaAnime
                join tb_tapphim tp on tp.MaAnime = a.MaAnime
                Where
                    tla.MaTL = ? 
                GROUP BY
                    a.MaAnime,
                    a.Anime,
                    a.Anh,
                    a.LP,
                    a.TongSoTap
                ORDER BY
                    TongViews DESC,
                    a.MaAnime DESC
                LIMIT 5
        ',[$mostFrequentMaTL]);
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
            $b,$c
        ];
        return $data;
    }
    public function caro(){
        $a = DB::select('SELECT
                    a.MaAnime,
                    tl.MaTL,
                    tl.TheLoai
                from tb_anime a
                join tb_tlanime tla on tla.MaAnime = a.MaAnime
                join tb_theloai tl on tl.MaTL = tla.MaTL       
        ');
        $b = DB::select('SELECT
                    a.MaAnime,
                    a.AnhNgang,
                    a.LP,
                    a.Anime
                from tb_anime a
                join tb_blog bl on bl.MaAnime = a.MaAnime  
                where bl.IDBLog = (SELECT Max(IDBlog) from tb_ourblog)
                Order by Rand()
                Limit 3     
        ');
        $data=[
            $b,$a
        ];
        return $data;
    }
}
