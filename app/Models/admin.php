<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    public function getdetail($tk , $mk){
        return DB::table($this->table)->where('Username',$tk)->where('Password',$mk)->get();
    }
}
