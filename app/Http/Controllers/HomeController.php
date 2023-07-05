<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function getData(Request $request)
    {
        $bannerMovies = DB::table('movie')
        ->whereNotNull('image')
        ->inRandomOrder()
        ->limit(5) // Ubah jumlah film yang ingin ditampilkan sebagai banner
        ->get();

        $popularMovies = Movie::orderBy('likes', 'desc')->take(10)->get();

        $newestMovies = Movie::orderBy('created_at', 'desc')->take(10)->get();

        return view('home', compact('bannerMovies', 'popularMovies', 'newestMovies'));
    }
}
