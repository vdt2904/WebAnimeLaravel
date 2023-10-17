<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tb_hangphim extends Model
{
    use HasFactory;
    protected $table = "tb_hangphim";
    protected $primaryKey = 'MaHP';
    protected $fillable = ['MaHP', 'HangPhim',];
}
