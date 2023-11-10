<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogss;
use Cloudinary\Api\Upload\UploadApi;
use App\Models\bloganime;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BlogsController extends Controller
{
    public function blogslist(){
        $userss = new blogss();
        $userslist1 = $userss->getall(); 
        if(!empty($userslist1)){
            $userslist1= Blogss::paginate(5);
        }
        
        //dd($userslist1);
        return View('admin.blogs.bloglist',compact('userslist1'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function uploadblogs(Request $request)
    {
        $folder = 'WebAnime/blog/img';
        $response = cloudinary()->upload($request->file('image')->getRealPath(), [
            'folder' => $folder,
        ])->getSecurePath();
        
        $datainsert = [
            'TenBlog' => $request->name,
            'Anh' => $response,
            'ThongTin' => $request->ThongTin,
            'NgayDang' => $request-> publish_date,
        ];
        $blogs = new Blogss();
        $addd = $blogs->insertblogs($datainsert);
        return redirect()->route('admin.blogs');
    }

    public function edit(Request $request,$id){
        if(!empty($id)){
            $blo = new blogss();
            $blogdetail = $blo->getdetail($id);
            if(!empty($blogdetail[0])){
                $request->session()->put('IDBlog',$id);
                $blogdetail = $blogdetail[0];
            }else{
                return redirect()->route('admin.blogs')->with('msg','blog không tồn tại');
            }
        }
        else{
            return redirect()->route('admin.blogs')->with('msg','lien ket không tồn tại');
        }
        //dd($blogdetail);
        return view('admin.blogs.edit',compact('blogdetail'));

    }

    public function editblog(Request $request){
        $IDBlog = $request->session()->get('IDBlog');
        $blo = new blogss();
        $blogdetail = $blo->getdetail($IDBlog);
        if(!empty($blogdetail[0])){
            if(!empty($request->file('image'))){
                $parts = pathinfo($blogdetail[0]->Anh);
                $publicId = $parts['filename']; 
                $folder = 'WebAnime/blog/img';
                $response = cloudinary()->upload($request->file('image')->getRealPath(), 
                ['folder' => $folder,])->getSecurePath();                
               // $uploadApi= cloudinary()->destroy('img/'.$publicId);
                cloudinary::destroy('WebAnime/blog/img/'.$publicId);
            }else{
                $response = $blogdetail[0]->Anh;
            }
            $dataupdate = [
                'TenBlog' => $request->name,
                'Anh' => $response,
                'ThongTin' => $request->ThongTin,
                'NgayDang' => $request-> publish_date,
            ];
        }
        
        $blo->updateblogs($dataupdate,$IDBlog);
        return redirect()->route('admin.blogs');
    }
    public function delete($id){
        $blogani = new bloganime();
        $a = $blogani->getdetail($id);
        if(!empty($a)){
            return redirect()->route('admin.blogs')->with('msg','Xóa không thành công');
        }
        $blo = new blogss();
        $blogdetail = $blo->getdetail($IDBlog);
        $parts = pathinfo($blogdetail[0]->Anh);
        $publicId = $parts['filename']; 
        cloudinary::destroy('WebAnime/blog/img/'.$publicId);
        $blo->deletedata($id);
        return redirect()->route('admin.blogs')->with('msg','Xóa thành công');
    }
    
}
