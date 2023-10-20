<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class bloganime extends Model
{
    use HasFactory;
    protected $table = "tb_blog";

    public function getall(){
        return DB::table($this->table)->get();
    }
    public function getdetail(){
        return DB::table($this->table)->where('ID',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('ID',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('ID',$id)->delete();
    }
}
