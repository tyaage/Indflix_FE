<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GenreController extends Controller
{
    public function index()
    {
        $accessToken = session('access_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken // Menambahkan token ke header permintaan
        ])->get('http://localhost:8000/api/genre');

        if ($response->successful()) {
            $genres = $response->json();

            return view('admin.genre.index', compact('genres'));
        } else {
            abort(500, 'Failed to retrieve data from API');
        }
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function store(Request $request)
    {
        $accessToken = session('access_token');
        $csrfToken = csrf_token();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'X-CSRF-TOKEN' => $csrfToken,
        ])->post('http://localhost:8000/api/genre', [
            'name' => $request->input('name')
        ]);

        if ($response->successful()) {
            // Sukses
            $responseData = $response->json();
            // dd($responseData);
            return redirect()->route('genre.index')->with('success', $responseData['message']);
        } else {
            // Error
            $errorResponse = $response->json();
            return redirect()->back()->with('error', $errorResponse['message'])->withInput($errorResponse['oldInput']);
        }
    }

    public function edit($id)
    {
        $accessToken = session('access_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('http://localhost:8000/api/genre/'.$id.'/edit');

        if ($response->successful()) {
            $genre = $response->json();

            return view('admin.genre.edit', compact('genre'));
        } else {
            abort(500, 'Failed to retrieve data from API');
        }
    }

    public function update(Request $request, Genre $genre)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:genre,name,' . $genre->id
        ]);
        // Update slug based on name
        $validatedData['slug'] = Str::slug($validatedData['name']);

        $genre->update($validatedData);

        return redirect()->route('genre.index')->with('success', 'Genre updated successfully.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre deleted successfully.');
    }
}
