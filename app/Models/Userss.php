<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class Userss extends Model
{
    use HasFactory;
    protected $table = "tb_nguoidung";

    public function getall(){
        $users = FacadesDB::select('SELECT * from tb_nguoidung');
        
        return $users;
    }

}
