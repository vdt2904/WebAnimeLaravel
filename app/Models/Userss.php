<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;


class Userss extends Model
{
    use HasFactory;
    protected $table = "tb_nguoidung";

    public function getall()
    {
        // $users = DB::select('SELECT * from tb_nguoidung');
        $users = DB::table($this->table)->get();
        return $users;
    }
    public function insertuser($data)
    {

        return  DB::table($this->table)->insert($data);
    }
    public function updateuser($id, $data)
    {
        return DB::table($this->table)->where('id', '=', $id)->update($data);
    }

    public function deleteuser($id)
    {
        return DB::table($this->table)->where('id', '=', $id)->delete();
    }
}
