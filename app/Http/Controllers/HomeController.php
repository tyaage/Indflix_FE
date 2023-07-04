<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function getData(Request $request)
    {

        $response = Http::get('http://localhost:8000/api/');

        if ($response->successful()) {
            $data = $response->json();

            $bannerMovies = $data['bannerMovies'];
            $popularMovies = $data['popularMovies'];
            $newestMovies = $data['newestMovies'];

            return view('home', compact('bannerMovies', 'popularMovies', 'newestMovies'));
        } else {
            abort(500, 'Failed to retrieve data from API');
        }
    }
}
