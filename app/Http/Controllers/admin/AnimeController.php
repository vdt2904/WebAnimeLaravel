<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animess;
use App\Models\tapphim;
use App\Models\bloganime;
use App\Models\tlanime;
use App\Models\review;
use Illuminate\Support\Facades\DB;
use App\Models\tdtm;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AnimeController extends Controller
{
    public function animelist(){
        $userss = new Animess();
        $userslist1 = $userss->getall(); 
        if(!empty($userslist1)){
            $userslist1 = Animess::paginate(5);
        }
       //dd($userslist1);
        return View('admin.animes.animelist',compact('userslist1'));
    }
    public function create()
    {
        $table = 'tb_anime';
        $column = 'MaAnime';
        $mamd = 'MA0001';
        $ma = new tdtm();
        $ma = $ma->ma($table,$column,$mamd);
        $mahp = DB::select('SELECT * from tb_hangphim');
        $malp = DB::select('SELECT * from tb_loaiphim');
        return view('admin.animes.create',compact('mahp','ma','malp'));
    }
    public function uploadanimes(Request $request){
        $request->validate([
            'anime' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'anime.required' => 'Tên anime không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'image.max' => 'Dung lượng hình ảnh không được vượt quá 2MB',
        ]);
        $folder = 'WebAnime/anime/'.$request->maanime.'/img';
        $publicId = $request->maanime;
        $response = cloudinary()->upload($request->file('image')->getRealPath(), [
            'public_id' => $publicId,
            'folder' => $folder,
        ])->getSecurePath();
        $folder1 = 'WebAnime/anime/'.$request->maanime.'/img';
        $publicId1 = 'N'.$request->maanime;
        $response1 = cloudinary()->upload($request->file('image1')->getRealPath(), [
            'public_id' => $publicId1,
            'folder' => $folder1,
        ])->getSecurePath();
        $datainsert = [
            'MaAnime' => $request->maanime,
            'Anime' => $request->anime,
            'Anh' => $response,
            'AnhNgang' => $response1,
            'NgayPhatSong' => $request->publish_date,
            'ThongTin' => $request->ThongTin,
            'MaHP' => $request-> mahp,
            'TongSoTap' => $request-> tongsotap,
            'MaLP' => $request-> malp,
            'LP' => $request-> loai,
            'status' => $request-> status,
        ];
        $animes = new Animess();
        $addd = $animes->insertdata($datainsert);
        return redirect()->route('admin.animes');
    }
    public function edit(Request $request,$id){
        if(!empty($id)){
            $ani = new Animess();
            $anidetail = $ani->getdetail($id);
            if(!empty($anidetail[0])){
                $request->session()->put('MaAnime',$id);
                $anidetail = $anidetail[0];
            }else{
                return redirect()->route('admin.animes')->with('msg','blog không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.animes')->with('msg','lien ket không tồn tại');
        }
        $mahp = DB::select('SELECT * from tb_hangphim');
        $malp = DB::select('SELECT * from tb_loaiphim');
        return view('admin.animes.edit',compact('anidetail','mahp','malp'));
    }
    public function edita(Request $request){
        $MaAnime = $request->session()->get('MaAnime');
        $ani = new Animess();
        $anigdetail = $ani->getdetail($MaAnime);
        if(!empty($anigdetail[0])){
            if(!empty($request->file('image'))){
                $folder = 'WebAnime/anime/'.$MaAnime.'/img';
                $publicId = $MaAnime;
                $response = cloudinary()->upload($request->file('image')->getRealPath(), [
                    'public_id' => $publicId,
                    'folder' => $folder,
                ])->getSecurePath();
            }else{
                $response = $anigdetail[0]->Anh;
            }
            if(!empty($request->file('image1'))){
                $folder1 = 'WebAnime/anime/'.$MaAnime.'/img';
                $publicId1 = 'N'.$MaAnime;
                $response1 = cloudinary()->upload($request->file('image1')->getRealPath(), [
                    'public_id' => $publicId1,
                    'folder' => $folder1,
                ])->getSecurePath();
            }else{
                $response1 = $anigdetail[0]->AnhNgang;
            }
            $dataupdate = [
                'Anime' => $request->anime,
                'Anh' => $response,
                'AnhNgang' => $response1,
                'NgayPhatSong' => $request->publish_date,
                'ThongTin' => $request->ThongTin,
                'MaHP' => $request-> mahp,
                'TongSoTap' => $request-> tongsotap,
                'MaLP' => $request-> malp,
                'LP' => $request-> loai,
                'status' => $request-> status,
            ];
        }
        $ani->updatedata($dataupdate,$MaAnime);
        return redirect()->route('admin.animes');
    }
    public function delete($id){
        $ani = new Animess();
        $a = $ani->getdetail($id)->first();
        $tp = new tapphim();
        $b = $tp->getbymaAnime($id);
        if(!empty($b)){
            return redirect()->route('admin.animes')->with('msg','Xóa thất bại');
        }
        $blogani = new bloganime();
        $blogani->deletedata($id);
        $tlani = new tlanime();
        $tlani->deletedata($id);
        $rev = new review();
        $rev->deletedata($id);
        $duongdan = 'WebAnime/anime/'.$id.'/trailer/'.$id;
        cloudinary::destroy($duongdan,["resource_type" => "video"]);
        $duongdan1 = 'WebAnime/anime/'.$id.'/img/'.$id;
        cloudinary::destroy($duongdan1);
        $duongdan2 = 'WebAnime/anime/'.$id.'/img/N'.$id;
        cloudinary::destroy($duongdan2);
        return redirect()->route('admin.animes')->with('msg','Xóa thành công');
    }
}
