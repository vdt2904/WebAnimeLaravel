<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tapphim;
use App\Models\viewss;
use App\Models\commentss;
use Illuminate\Support\Facades\DB;
use App\Models\tdtm;
class TapPhimController extends Controller
{
    public function index(){
        $list1 = new tapphim();
        $ds  = $list1->getall();        
        if(!empty($ds)){
            $ds= tapphim::paginate(5);
        }           
        return view('admin.tapphim.index', compact('ds'));
    }
    public function create()
    {
        $table = 'tb_tapphim';
        $column = 'MaTP';
        $mamd = 'TP0001';
        $ma = new tdtm();
        $ma = $ma->ma($table,$column,$mamd);
        $maanime = DB::select('SELECT MaAnime,Anime from tb_anime');
        return view('admin.tapphim.create',compact('maanime','ma'));
    }
    public function adddata(Request $request){
        set_time_limit(180);
        $folder = 'WebAnime/anime/'.$request->maanime.'/tap/';
        $publicId = 'ep'.$request->tap;
        $publicId1 = 'im'.$request->tap;
        $response = cloudinary()->uploadVideo($request->file('video')->getRealPath(), [
            'public_id' => $publicId,
            'folder' => $folder,
        ])->getSecurePath();
        $response1 = cloudinary()->upload($request->file('image')->getRealPath(), [
            'public_id' => $publicId1,
            'folder' => $folder,
        ])->getSecurePath();
        $datainsert = [
            'MaTP' => $request->matp,
            'MaAnime' => $request->maanime,
            'Tap' => $request->tap,
            'Views' => $request->views,
            'Comments' => $request->comments,
            'NgayPhatSong' => $request->publish_date,
            'Video' => $response,
            'NenVideo' => $response1,
        ];
        $tapphim = new tapphim();
        $addd = $tapphim->insertdata($datainsert);
        return redirect()->route('admin.tapphim');
    }
    public function edit(Request $request,$id){
        if(!empty($id)){
            $tp = new tapphim();
            $tpdetail = $tp->getdetail($id);
            if(!empty($tpdetail[0])){
                $request->session()->put('MaTP',$id);
                $tpdetail = $tpdetail[0];
            }else{
                return redirect()->route('admin.tapphim')->with('msg','tập phim không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.tapphim')->with('msg','lien ket không tồn tại');
        }
        $maanime = DB::select('SELECT MaAnime,Anime from tb_anime');
        return view('admin.tapphim.edit',compact('tpdetail','maanime'));
    }
    public function edittp(Request $request){
        set_time_limit(180);
        $MaTP = $request->session()->get('MaTP');
        $tp = new tapphim();
        $tpdetail = $tp->getdetail($MaTP);
        if(!empty($tpdetail[0])){
            if(!empty($request->file('image'))&&!empty($request->file('video'))){
                $folder = 'WebAnime/anime/'.$request->maanime.'/tap/';
                $publicId = 'ep'.$request->tap;
                $publicId1 = 'im'.$request->tap;
                $response = cloudinary()->uploadVideo($request->file('video')->getRealPath(), [
                    'public_id' => $publicId,
                    'folder' => $folder,
                ])->getSecurePath();
                $response1 = cloudinary()->upload($request->file('image')->getRealPath(), [
                    'public_id' => $publicId1,
                    'folder' => $folder,
                ])->getSecurePath();
            }else{
                $response = $tpdetail[0]->Video;
                $response1 = $tpdetail[0]->NenVideo;
            }
            $dataupdate = [
                'MaAnime' => $request->maanime,
                'Tap' => $request->tap,
                'Views' => $request->views,
                'Comments' => $request->comments,
                'NgayPhatSong' => $request->publish_date,
                'Video' => $response,
                'NenVideo' => $response1,
            ];
        }
        $tp->updatedata($dataupdate,$MaTP);
        return redirect()->route('admin.tapphim');
    }
    public function delete($id){
        $tp = new tapphim();
        $a = $tp->getdetail($id)->first();
        $duongdan = 'WebAnime/anime/'.$a->MaAnime.'/tap/ep'.$a->tap;
        cloudinary::destroy($duongdan,["resource_type" => "video"]);
        $duongdan1 = 'WebAnime/anime/'.$a->MaAnime.'/tap/im'.$a->tap;
        cloudinary::destroy($duongdan1);
        $views = new viewss();
        $views->deletadata($id);
        $comments = new commentss();
        $comments->deletadata($id);
        $tp->deletedata($id);
        return redirect()->route('admin.tapphim')->with('msg','Xóa thành công');
    }
}
