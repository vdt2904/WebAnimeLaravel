<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class blogss extends Model
{
    use HasFactory;
    protected $table = "tb_ourblog";
    public function getall(){
        $animes = DB::select('SELECT * from tb_ourblog');
        return $animes;
    }

    public function insertblogs($data){
        return DB::table($this->table)->insert($data);
    }
}
