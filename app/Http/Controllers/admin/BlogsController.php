<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogss;
class BlogsController extends Controller
{
    public function blogslist(){
        $userss = new blogss();
        $userslist1 = $userss->getall(); 
        $userslist1= Blogss::paginate(5);

        return View('admin.blogs.bloglist',compact('userslist1'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function uploadblogs(Request $request)
    {
        $folder = 'img';
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
}
