@extends('layouts.main')
@section('container')
    <div class="w-full mx-auto max-w-screen-xl p-5 bg-gray-100 shadow-sm">
        <h1 class="text-3xl font-bold mb-10 pt-48 lg:pt-32">Tambah Movie</h1>
        
        <a href="{{ route('movie.index') }}" class="mb-4 inline-block">
            <button class="px-4 py-2 bg-cstmdark hover:bg-cstmlightdark text-white rounded-md shadow-sm font-semibold">Kembali</button>
        </a>

        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name" class="mt-6 text-cstmdark font-semibold">Name:</label>
            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5">
            <label for="genres" class="mt-6 text-cstmdark font-semibold">Genres:</label>
            <div class="grid grid-cols-3 gap-4 mt-2 mb-5 bg-gray-50 p-5 rounded-md shadow-sm">
                @foreach ($genres as $genre)
                    <div class="flex items-center">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="mr-2">
                        <label for="genre" class="text-cstmlightdark">{{ $genre->name }}</label>
                    </div>
                @endforeach
            </div>

            <label for="actor" class="mt-6 text-cstmdark font-semibold">Actor:</label>
            <input type="text" name="actor" required
                class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5">

            <label for="synopsis" class="mt-6 text-cstmdark font-semibold">Synopsis:</label>
            <textarea name="synopsis" required
                class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5"></textarea>

            <label for="writer" class="mt-6 text-cstmdark font-semibold">Writer:</label>
            <input type="text" name="writer" required
                class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5">

            <label for="year" class="mt-6 text-cstmdark font-semibold">Year:</label>
            <input type="number" name="year" required
                class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5">

            <label for="minimum_age" class="mt-6 text-cstmdark font-semibold">Minimum Age:</label>
            <input type="number" name="minimum_age" required
                class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5">

            <label for="image" class="mt-6 text-cstmdark font-semibold">Image:</label>
            <input type="file" name="image" class="mt-2 mb-5">

            <br>

            <label for="video" class="mt-6 text-cstmdark font-semibold">Video:</label>
            <input type="text" name="video" required class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500 mb-5">
            <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md mb-5 font-semibold">Tambah Movie</button>
        </form> 
    </div>
@endsection
