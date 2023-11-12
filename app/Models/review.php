<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class review extends Model
{
    use HasFactory;
    protected $table = 'tb_review';
    public function getall()
    {
        $review = DB::select('SELECT * from tb_review');
        return $review;
    }
    public function insertreview($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function deletedata($id){
        return DB::table($this->table)->where('ID',$id)->orWhere('MaAnime', $id)->delete();
    }
}
