<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class theloai extends Model
{
    use HasFactory;
    protected $table = "tb_theloai";

    public function getall(){
        return DB::table($this->table)->get();
    }
    public function getdetail($id){
        return DB::table($this->table)->where('MaTL',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('MaTL',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('MaTL',$id)->delete();
    }
}
