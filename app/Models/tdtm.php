<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class tdtm extends Model
{
    use HasFactory;
    public function ma($table,$ma,$mamd){
        $data = DB::table($table)->orderBy($ma,'desc')->first();
        if(!empty($data)){
            $maht = $data->$ma;
            $KT = substr($maht, 0, 3);
            $number = intval(substr($maht, 3));
            $number = $number + 1 ;
            $maht = $KT . str_pad($number, 3, '0', STR_PAD_LEFT);
        }else{
            $maht = $mamd;
        }
        return $maht;
    }
}
