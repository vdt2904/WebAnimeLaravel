<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tb_theloai extends Model
{
    use HasFactory;
    protected $table = "tb_theloai";
    protected $primaryKey = 'MaTL';
    protected $fillable = ['MaTL', 'TheLoai', 'ThongTin',];
}
