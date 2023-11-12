<?php

namespace App\Models\viewmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; 
class tprl extends Model
{
    use HasFactory;
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
        // $b = DB::select('SELECT
        //             a.MaAnime,
        //             a.Anime,
        //             a.Anh,
        //             a.LP,
        //             a.TongSoTap,
        //             Max(tp.Tap) AS MaxTap,
        //             Sum(tp.Views) AS TongViews,
        //             Sum(tp.Comments) AS TongComments
        //         from tb_anime a
        //         join tb_tlanime tla on tla.MaAnime = a.MaAnime
        //         join tb_tapphim tp on tp.MaAnime = a.MaAnime
        //         Where
        //             tla.MaTL = ? 
        //         GROUP BY
        //             a.MaAnime,
        //             a.Anime,
        //             a.Anh,
        //             a.LP,
        //             a.TongSoTap
        //         ORDER BY
        //             TongViews DESC,
        //             a.MaAnime DESC
                
        // ',[$mostFrequentMaTL])->paginate(12);
        $b = DB::table('tb_anime as a')
                ->join('tb_tlanime as tla', 'tla.MaAnime', '=', 'a.MaAnime')
                ->join('tb_tapphim as tp', 'tp.MaAnime', '=', 'a.MaAnime')
                ->where('tla.MaTL', $mostFrequentMaTL)
                ->groupBy('a.MaAnime', 'a.Anime', 'a.Anh', 'a.LP', 'a.TongSoTap')
                ->orderByDesc('TongViews')
                ->orderByDesc('a.MaAnime')
                ->select([
                    'a.MaAnime',
                    'a.Anime',
                    'a.Anh',
                    'a.LP',
                    'a.TongSoTap',
                    DB::raw('Max(tp.Tap) AS MaxTap'),
                    DB::raw('Sum(tp.Views) AS TongViews'),
                    DB::raw('Sum(tp.Comments) AS TongComments'),
                ])
                ->paginate(12);

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
    public function popular(){
        $a = DB::table('tb_anime as a')
            ->join('tb_tapphim as tp', 'tp.MaAnime', '=', 'a.MaAnime')
            ->select([
                'a.MaAnime',
                'a.Anime',
                'a.Anh',
                'a.LP',
                'a.TongSoTap',
                DB::raw('Max(tp.Tap) AS MaxTap'),
                DB::raw('Sum(tp.Views) AS TongViews'),
                DB::raw('Sum(tp.Comments) AS TongComments'),
            ])
            ->groupBy('a.MaAnime', 'a.Anime', 'a.Anh', 'a.LP', 'a.TongSoTap')
            ->orderByDesc('TongViews')
            ->paginate(12);
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
        $a = DB::table('tb_anime as a')
            ->join('tb_tapphim as tp', 'tp.MaAnime', '=', 'a.MaAnime')
            ->join('tb_tlanime as tla', 'tla.MaAnime', '=', 'a.MaAnime')
            ->where('tla.MaTL', 'TL0003')
            ->select([
                'a.MaAnime',
                'a.Anime',
                'a.Anh',
                'a.LP',
                'a.TongSoTap',
                DB::raw('Max(tp.Tap) AS MaxTap'),
                DB::raw('Sum(tp.Views) AS TongViews'),
                DB::raw('Sum(tp.Comments) AS TongComments'),
            ])
            ->groupBy('a.MaAnime', 'a.Anime', 'a.Anh', 'a.LP', 'a.TongSoTap')
            ->orderByDesc('TongViews')
            ->paginate(12);
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
    public function recently(){
        $a = DB::table('tb_anime as a')
            ->join('tb_tapphim as tp', 'tp.MaAnime', '=', 'a.MaAnime')
            ->select([
                'a.MaAnime',
                'a.Anime',
                'a.Anh',
                'a.LP',
                'a.TongSoTap',
                DB::raw('Max(tp.Tap) AS MaxTap'),
                DB::raw('Sum(tp.Views) AS TongViews'),
                DB::raw('Sum(tp.Comments) AS TongComments'),
            ])
            ->groupBy('a.MaAnime', 'a.Anime', 'a.Anh', 'a.LP', 'a.TongSoTap')
            ->orderByDesc('a.MaAnime')
            ->paginate(12);
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
    public function category($id){
        $a = DB::table('tb_anime as a')
                ->join('tb_tlanime as tla', 'tla.MaAnime', '=', 'a.MaAnime')
                ->join('tb_tapphim as tp', 'tp.MaAnime', '=', 'a.MaAnime')
                ->where('tla.MaTL', '=', $id)
                ->groupBy('a.MaAnime', 'a.Anime', 'a.Anh', 'a.LP', 'a.TongSoTap')
                ->orderByDesc('a.MaAnime')
                ->select([
                    'a.MaAnime',
                    'a.Anime',
                    'a.Anh',
                    'a.LP',
                    'a.TongSoTap',
                    DB::raw('Max(tp.Tap) AS MaxTap'),
                    DB::raw('Sum(tp.Views) AS TongViews'),
                    DB::raw('Sum(tp.Comments) AS TongComments'),
                ])
                ->paginate(12);
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
}
