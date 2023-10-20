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
    public function getdetail($id){
        return DB::table($this->table)->where('MaAnime',$id)->get();
    }
    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('MaAnime',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('MaAnime',$id)->delete();
    }

}
