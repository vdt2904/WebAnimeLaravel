<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class loaiphim extends Model
{
    use HasFactory;
    protected $table = "tb_loaiphim";

    public function getall(){
        $lp = DB::select('SELECT * from tb_loaiphim');        
        return $lp;
    }
    public function getdetail($id){
        return DB::table($this->table)->where('MaLP',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('MaLP',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('MaLP',$id)->delete();
    }
}
