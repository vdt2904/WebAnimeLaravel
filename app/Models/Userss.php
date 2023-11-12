<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;


class Userss extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = "tb_nguoidung";

    public function getall()
    {
        // $users = DB::select('SELECT * from tb_nguoidung');
        $users = DB::table($this->table)->get();
        return $users;
    }

    public function getDetail($id)
    {
        $users = DB::table($this->table)->where('MaND', $id)->first();
        return $users;
    }
    public function insertnd($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function updatend($id, $data)
    {
        return DB::table($this->table)->where('Email', $id)->update($data);
    }
    // Đảm bảo rằng bạn đã định nghĩa đầy đủ các phương thức cần thiết của giao diện Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Thay 'id' bằng tên cột làm khóa chính trong bảng của bạn
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password; // Thay 'password' bằng tên cột chứa mật khẩu trong bảng của bạn
    }

    public function getRememberToken()
    {
        // Implement this method if you are using "remember me" functionality
    }

    public function setRememberToken($value)
    {
        // Implement this method if you are using "remember me" functionality
    }

    public function getRememberTokenName()
    {
        // Implement this method if you are using "remember me" functionality

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
