<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class resetpass extends Model
{
    use HasFactory;
    protected $table = 'tb_resetpass';
    public function getall()
    {
        $resetpass = DB::select('SELECT * from tb_resetpass');
        return $resetpass;
    }
    public function insertresetpass($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function getresetpass($id)
    {
        $resetpass = DB::select('SELECT * from tb_resetpass where MaND = ?', [$id]);
        return $resetpass;
    }
    public function updateresetpass($id, $data)
    {
        return DB::table($this->table)->where('MaND', $id)->update($data);
    }
    public function deleteresetpass($id)
    {
        return DB::table($this->table)->where('MaND', $id)->delete();
    }
}
