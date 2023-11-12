<?php

namespace App\Http\Controllers;

use App\Models\Animess;
use App\Models\review;
use DateTime;
use DateTimeZone;
use App\Models\Userss;
use Google\Service\AnalyticsReporting\Segment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilmDetailsController extends Controller
{
    public function index($id)
    {
        $filmdetails = DB::table('tb_anime')
            ->join('tb_tlanime', 'tb_anime.MaAnime', '=', 'tb_tlanime.MaAnime')
            ->join('tb_theloai', 'tb_tlanime.MaTL', '=', 'tb_theloai.MaTL')
            ->join('tb_hangphim', 'tb_anime.MaHP', '=', 'tb_hangphim.MaHP')

            ->where('tb_anime.MaAnime', $id)
            ->get();      
        $filmdetailhp = DB::table('tb_anime')->join('tb_hangphim', 'tb_anime.MaHP', '=', 'tb_hangphim.MaHP')->where('tb_anime.MaAnime', $id)
            ->get();
        // $reviewfilms = DB::table('tb_review')
        //     ->join('tb_anime', 'tb_anime.MaAnime', '=', 'tb_review.Anime')
        //     ->join('tb_nguoidung', 'tb_anime.MaND', '=', 'tb_review.MaND')
        //     ->select('tenND')
        //     ->where('tb_anime.MaAnime', $id)->get();
        $rate = review::join('tb_anime', 'tb_anime.MaAnime', '=', 'tb_review.MaAnime')->where('tb_anime.MaAnime',$id)
            ->sum('tb_review.Rate');
        $countrate = (review::count());
        if($countrate == 0){
            $ratetb = 0;
        }else{
            $ratetb = $rate / (review::count());
        }
        
        $review = DB::table('tb_review')
            ->join('tb_anime', 'tb_review.MaAnime', '=', 'tb_anime.MaAnime')
            ->join('tb_nguoidung', 'tb_review.MaND', '=', 'tb_nguoidung.MaND')
            ->select('tb_review.Review', 'tb_review.Rate', 'tb_review.Review', 'tb_nguoidung.TenND', 'tb_nguoidung.Email', 'tb_review.NgayReview')
            ->where('tb_review.MaAnime', $id)
            ->get();

        // dd($filmdetails);
        $video = DB::table('tb_blog')->where('MaAnime',$id)->first();
        $might = DB::select('SELECT
                        a.MaAnime,
                        a.Anime,
                        a.AnhNgang,
                        a.LP,
                        a.TongSoTap,
                        Max(tp.Tap) AS MaxTap,
                        Sum(tp.Views) AS TongViews,
                        Sum(tp.Comments) AS TongComments
                    FROM
                        tb_anime a
                        JOIN tb_tapphim tp ON tp.MaAnime = a.MaAnime
                        Join tb_tlanime tla on tla.MaAnime = a.MaAnime
                    Where
                        tla.MaTL in (SELECT MaTL from tb_tlanime where MaAnime = ? )
                        and a.MaAnime != ?
                    GROUP BY
                        a.MaAnime,
                        a.Anime,
                        a.AnhNgang,
                        a.LP,
                        a.TongSoTap
                        ORDER BY
                        RAND()
                    LIMIT 4
                ',[$id,$id]);
                
        return view('FilmDetails', compact('filmdetails', 'review', 'ratetb', 'countrate','video','might'));
    }
    public function  SendReview(Request $request)
    {
        $newreview = new review();
        $now = new DateTime();
        $timezone = new DateTimeZone('Asia/Ho_Chi_Minh'); // Chọn múi giờ mới, ví dụ 'Asia/Ho_Chi_Minh'
        $time = $now->setTimezone($timezone)->format('Y-m-d ');
        $newreview->insertreview(
            [
                'MaAnime' => $request->segment(2),
                'MaND'    => session('InforUser.MaND'),
                'Review'  => $request->input('review'),
                'Rate'    => 4,
                'NgayReview' =>  $time
            ]
        );
        return redirect()->back();
    }

    public function rateAnime(Request $request)
    {


        // Retrieve data from the request
        $animeId = $request->segment(2);
        $iduser = $request->session()->get('InforUser.MaND');
        $userRating = $request->input('user_rating');
        if (!empty($userRating)) {
            $userRating = $userRating;
        } else {
            $userRating = 4;
        }
        $user = new Userss();
        $user->updatend($iduser, ['Rate' => $userRating]);

        return response()->json(['success' => true, 'message' => 'Rating updated successfully']);
    }
}
