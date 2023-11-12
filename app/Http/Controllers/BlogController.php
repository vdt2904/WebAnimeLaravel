<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bloganime;
use App\Models\blogss;
use App\Models\review;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class BlogController extends Controller
{
    public function index()
    {

        $data = DB::table('tb_blog')
            ->join('tb_ourblog', 'tb_blog.IDBlog', '=', 'tb_ourblog.IDBlog')
            ->select('*')
            ->paginate(3);

        //  dd($data);
        return view('BlogLayout', compact('data'));
    }

    public function detail($id)
    {
        $blog = new blogss(); // Assuming Blogss is the correct class name
        $data = DB::table('tb_blog')
            ->join('tb_ourblog', 'tb_blog.IDBlog', '=', 'tb_ourblog.IDBlog')
            ->where('tb_blog.IDBlog', $id)->get();

        // dd($data);
        //Getreview
        $review = DB::table('tb_review')
            ->join('tb_anime', 'tb_review.MaAnime', '=', 'tb_anime.MaAnime')
            ->join('tb_nguoidung', 'tb_review.MaND', '=', 'tb_nguoidung.MaND')
            ->select('tb_review.Review', 'tb_review.Rate', 'tb_review.Review', 'tb_nguoidung.TenND', 'tb_nguoidung.Email')
            ->where('tb_review.MaAnime', $id)
            ->get();

        // dd($review);
        return view('BlogDetail', compact('data')); // Pass the data to the view using the compact function
    }
}
