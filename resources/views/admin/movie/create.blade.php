@extends('layouts.main')

@section('container')
    <h1 class="text-3xl font-bold mb-16">Add Movie</h1>
    <a href="{{ route('movie.index') }}" class="mb-4 inline-block">
        <button class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Kembali</button>
    </a>

    <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        @csrf
        <label for="name" class="mt-6 text-gray-700 font-medium">Name:</label>
        <input type="text" name="name" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

        <label for="genres" class="mt-6 text-gray-700 font-medium">Genres:</label>
        <div class="grid grid-cols-3 gap-4 mt-2">
            @foreach ($genres as $genre)
                <div class="flex items-center">
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="mr-2">
                    <label for="genre" class="text-gray-700">{{ $genre->name }}</label>
                </div>
            @endforeach
        </div>

        <label for="actor" class="mt-6 text-gray-700 font-medium">Actor:</label>
        <input type="text" name="actor" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

        <label for="synopsis" class="mt-6 text-gray-700 font-medium">Synopsis:</label>
        <textarea name="synopsis" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500"></textarea>

        <label for="writer" class="mt-6 text-gray-700 font-medium">Writer:</label>
        <input type="text" name="writer" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

        <label for="year" class="mt-6 text-gray-700 font-medium">Year:</label>
        <input type="number" name="year" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

        <label for="minimum_age" class="mt-6 text-gray-700 font-medium">Minimum Age:</label>
        <input type="number" name="minimum_age" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

        <label for="image" class="mt-6 text-gray-700 font-medium">Image:</label>
        <input type="file" name="image" class="mt-2">

        <label for="video" class="mt-6 text-gray-700 font-medium">Video:</label>
        <input type="text" name="video" required
            class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

        <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Add</button>
    </form>
@endsection
