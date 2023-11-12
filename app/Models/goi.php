<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class goi extends Model
{
    use HasFactory;
    protected $table = "tb_goi";

    public function getall(){
        $goi = DB::select('SELECT * from tb_goi');        
        return $goi;
    }
    public function getdetail($id){
        return DB::table($this->table)->where('MaGoi',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('MaGoi',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('MaGoi',$id)->delete();
    }
}
