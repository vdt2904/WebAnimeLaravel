<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bloganime;

use Illuminate\Support\Facades\DB;
use Cloudinary\Api\Upload\UploadApi;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BlogAniController extends Controller
{
    // 
    public function BAlist()
    {
        $list1 = new bloganime();
        $ds  = $list1->getall();
        if (!empty($ds)) {
            $ds = bloganime::paginate(5);
        }
        return view('admin.blogani.list', compact('ds'));
    }
    public function create()
    {
        $maanime = DB::select('SELECT MaAnime,Anime from tb_anime');
        $idblog = DB::select('SELECT IDBlog,TenBlog from tb_ourblog');
        return view('admin.blogani.create', compact('maanime', 'idblog'));
    }
    public function uploadtrailer(Request $request)
    {
        $request->validate([
            'maanime' => 'required',
            'video' => 'required|mimes:mp4,mp3,mov,mov|max:102400',
            'idblog' => 'required'
        ],[
            'maanime.required' => 'Anime không được để trống',
            'idblog.required' => 'IDBlog không được để trống',
            'video.required' => 'Video không được để trống',
            'video.image' => 'File phải là video',
            'video.mimes' => 'Video phải có định dạng: mp4, mp3, mov, mov',
            'video.max' => 'Dung lượng video không được vượt quá 100MB',
        ]);
        $check = DB::select('SELECT * from tb_blog where MaAnime = ? and IDBlog = ?',[$request->maanime,$request->idblog]);
        if(!empty($check)){
            return redirect()->back()->withErrors(['error' => 'Đã tồn tại']);
        }
        $folder = 'WebAnime/anime/' . $request->maanime . '/trailer';
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
    public function edit(Request $request, $id)
    {
        if (!empty($id)) {
            $anib = new bloganime();
            $anibdetail = $anib->getdetail($id);
            if (!empty($anibdetail[0])) {
                $request->session()->put('ID', $id);
                $anibdetail = $anibdetail[0];
            } else {
                return redirect()->route('admin.bloganime')->with('msg', 'blog không tồn tại');
            }
        } else {
            return redirect()->route('admin.bloganime')->with('msg', 'lien ket không tồn tại');
        }
        $maanime = DB::select('SELECT MaAnime,Anime from tb_anime');
        $idblog = DB::select('SELECT IDBlog,TenBlog from tb_ourblog');
        return view('admin.blogani.edit', compact('anibdetail', 'maanime', 'idblog'));
    }
    public function editbla(Request $request)
    {
        $ID = $request->session()->get('ID');
        $anib = new bloganime();
        $anibdetail = $anib->getdetail($ID);
        if (!empty($anibdetail[0])) {
            if (!empty($request->file('image'))) {
                $folder = 'WebAnime/anime/' . $request->maanime . '/trailer';
                $publicId = $request->maanime;
                $response = cloudinary()->uploadVideo($request->file('video')->getRealPath(), [
                    'public_id' => $publicId,
                    'folder' => $folder,
                ])->getSecurePath();
            } else {
                $response = $anibdetail[0]->Trailer;
            }
            $dataupdate = [
                'MaAnime' => $request->maanime,
                'IDBlog' => $request->idblog,
                'Trailer' => $response,
            ];
        }
        $anib->updatedata($dataupdate, $ID);
        return redirect()->route('admin.bloganime');
    }
    public function delete($id){
        $blogani = new bloganime();
        $a = $blogani->getdetail($id)->first();
        $duongdan = 'WebAnime/anime/'.$a->MaAnime.'/trailer/'.$a->MaAnime;
        cloudinary::destroy($duongdan,["resource_type" => "video"]);
        $blogani->deletedata($id);
        return redirect()->route('admin.bloganime')->with('msg','Xóa thành công');
    }
}
