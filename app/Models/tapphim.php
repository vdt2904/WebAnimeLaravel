<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class tapphim extends Model
{
    use HasFactory;
    protected $table = "tb_tapphim";

    public function getall(){
        return DB::select('SELECT * from tb_tapphim');
    }
    public function getdetail($id){
        return DB::table($this->table)->where('MaTP',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('MaTP',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('MaTP',$id)->delete();
    }
}
