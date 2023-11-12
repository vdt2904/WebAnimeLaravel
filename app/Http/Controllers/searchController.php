<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animess;

class searchController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->search;

        $data = Animess::where(function ($query) use ($searchTerm) {
            $query->where('MaAnime', 'like', '%' . $searchTerm . '%')
                ->orWhere('Anime', 'like', '%' . $searchTerm . '%');
        })->get();
        $output = '';

        if (count($data) > 0) {
            $output .= '<ul class="movie-list" style ="list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;">';

            foreach ($data as $row) {
                $output .= '<li class="movie-item">';
                $output .= '<img style="width:40%;" src="' . $row->Anh . '" alt="' . $row->Anime . '">';
                $output .= '<h3 style="font-size:15px;line-height: 60px;color:#fff;margin-left:5px;" >' . $row->Anime . '</h3>';
                $output .= '</li>';
            }

            $output .= '</ul>';
        }
        return $output;
    }
}
