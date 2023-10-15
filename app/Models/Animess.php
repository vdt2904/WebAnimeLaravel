<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Animess extends Model
{
    use HasFactory;
    protected $table = "tb_anime";

    public function getall(){
        $animes = DB::select('SELECT * from tb_anime');
        
        return $animes;
    }
}
