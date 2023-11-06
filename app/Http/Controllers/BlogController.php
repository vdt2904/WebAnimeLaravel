<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bloganime;
use App\Models\blogss;
use App\Models\review;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $blog = new bloganime();
        $data = $blog->getall();
        return view('BlogLayout', compact('data'));
    }
    public function detail($id)
    {
        $blog = new blogss(); // Assuming Blogss is the correct class name
        $data = $blog->getDetail($id); // Assuming getDetail is the correct method name

        // Uncomment the line below if you want to check the content of $data
        // dd($data);
        //Getreview
        $review = DB::table('tb_review')->join('tb_anime', 'MaAnime')
            ->join('tb_blog', 'MaAnime')->join('tb_ourblog', 'IDBlog')
            ->join('tb_nguoidung', 'MaND')->select('seclect * from tb_review ')->Where('MaAnime', 'ID');

        //return view('BlogDetail', compact('data')); // Pass the data to the view using the compact function
    }
    public function  SendReview(Request $request)
    {
        $newreview = new review();
        $newreview->insertreview();
    }
}
