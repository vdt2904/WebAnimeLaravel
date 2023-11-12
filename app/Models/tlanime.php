<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class tlanime extends Model
{
    use HasFactory;
    protected $table = "tb_tlanime";

    public function getall(){
        return DB::select('SELECT * from tb_tlanime');
    }
    public function getdetail($id){
        return DB::table($this->table)->where('ID',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('ID',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('ID',$id)->orWhere('MaAnime', $id)->delete();
    }
}
