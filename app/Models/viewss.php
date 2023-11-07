<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewss extends Model
{
    use HasFactory;
    protected $table = "tb_view";
    public function deletedata($id){
        return DB::table($this->table)->where('ID',$id)->orWhere('MaTP', $id)->delete();
    }
}
