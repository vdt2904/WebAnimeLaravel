<?php

namespace App\Models\viewmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; 
class watch extends Model
{
    use HasFactory;
    public function getdata($maanime,$matp){
        $a = DB::select('SELECT 
                    tp.MaAnime,
                    a.Anime,
                    tp.Video,
                    tp.NenVideo,
                    tp.MaTP
                from tb_tapphim tp
                join tb_anime a on a.MaAnime = tp.MaAnime
                where MaTP = ?
        ',[$matp]);
        $b = DB::select('SELECT
                    tp.Tap,
                    tp.MaTP
                from tb_tapphim tp
                join tb_anime a on a.MaAnime = tp.MaAnime
                where a.MaAnime = ?
        ',[$maanime]);
        $data=[
            $a,$b
        ];
        return $data;
    }
}
