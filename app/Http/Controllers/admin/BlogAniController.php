<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bloganime;
use DB;
class BlogAniController extends Controller
{
    // 
    public function BAlist(){
        $list1 = new bloganime();
        $ds  = $list1->getall();
        if(!empty($ds)){
            $ds= bloganime::paginate(5);
        }      
        return view('admin.blogani.list', compact('ds'));
    }
    public function create()
    {
        $maanime = DB::select('SELECT MaAnime,Anime from tb_anime');
        $idblog = DB::select('SELECT IDBlog,TenBlog from tb_ourblog');
        return view('admin.blogani.create',compact('maanime','idblog'));
    }
    public function uploadtrailer(Request $request){
        $folder = 'WebAnime/anime/'.$request->maanime.'/trailer';
        $publicId = $request->maanime;
        $response = cloudinary()->uploadVideo($request->file('video')->getRealPath(), [
            'public_id' => $publicId,
            'folder' => $folder,
        ])->getSecurePath();
        $datainsert = [
            'MaAnime' => $request->maanime,
            'IDBlog' => $request->idblog,
            'Trailer' => $response,
        ];
        $trailer = new bloganime();
        $addd = $trailer->insertdata($datainsert);
        return redirect()->route('admin.bloganime');
    }
}
