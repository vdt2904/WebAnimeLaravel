<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Userss extends Model
{
    use HasFactory;
    protected $table = "tb_nguoidung";
    
    public function getall(){
       // $users = DB::select('SELECT * from tb_nguoidung');
        $users = DB::table($this->table)->get();
        return $users;
    }

}
