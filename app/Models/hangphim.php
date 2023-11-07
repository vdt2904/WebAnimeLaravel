<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class hangphim extends Model
{
    use HasFactory;
    protected $table = "tb_hangphim";

    public function getall(){
        $hp = DB::select('SELECT * from tb_hangphim');        
        return $hp;
    }
    public function getdetail($id){
        return DB::table($this->table)->where('MaHP',$id)->get();
    }

    public function insertdata($data){
        return DB::table($this->table)->insert($data);
    }

    public function updatedata($data,$id){
        return DB::table($this->table)->where('MaHP',$id)->update($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('MaHP',$id)->delete();
    }
}
