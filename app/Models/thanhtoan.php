<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhtoan extends Model
{
    use HasFactory;
    protected $table = "tb_thanhtoan";
    public function getdetail($id){
        return DB::table($this->table)->where('MaGoi',$id)->get();
    }
}
