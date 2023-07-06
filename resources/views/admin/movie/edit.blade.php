@extends('layouts.main')
@section('container')
    <div class="w-full mx-auto max-w-screen-xl p-5 bg-gray-100 shadow-sm">
        <h1 class="text-3xl font-bold mb-10 pt-48 lg:pt-32">Edit Movie</h1>

        <a href="{{ route('movie.index') }}" class="mb-4 inline-block">
            <button class="px-4 py-2 bg-cstmdark hover:bg-cstmlightdark text-white rounded-md shadow-sm font-semibold">Kembali</button>
        </a>

        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name" class="block text-cstmdark font-semibold">Name:</label>
            <input type="text" name="name" value="{{ $movie->name }}" required class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">

            <label for="genres" class="block text-cstmdark font-semibold">Genre:</label>
            <div class="grid grid-cols-3 gap-4 mt-2 mb-5 bg-gray-50 p-5 rounded-md shadow-sm">
                @foreach ($genres as $genre)
                <div class="flex items-center">
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                        @if (in_array($genre->id, $selectedGenres)) checked @endif class="form-checkbox h-5 w-5 text-blue-600">
                    <label for="genre" class="ml-1">{{ $genre->name }}</label>
                </div>
                @endforeach
            </div>

            <label for="actor" class="block text-cstmdark font-semibold">Actor:</label>
            <input type="text" name="actor" value="{{ $movie->actor }}" required
                class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">

            <label for="synopsis" class="block text-cstmdark font-semibold">Synopsis:</label>
            <textarea name="synopsis" required class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">{{ $movie->synopsis }}</textarea>

            <label for="writer" class="block text-cstmdark font-semibold">Writer:</label>
            <input type="text" name="writer" value="{{ $movie->writer }}" required
                class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">

            <label for="year" class="block text-cstmdark font-semibold">Year:</label>
            <input type="number" name="year" value="{{ $movie->year }}" required
                class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">

            <label for="minimum_age" class="block text-cstmdark font-semibold">Minimum Age:</label>
            <input type="number" name="minimum_age" value="{{ $movie->minimum_age }}" required
                class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">

            <label for="image" class="block text-cstmdark font-semibold">Image:</label>
            @if ($movie->image)
                <div class="flex items-center mt-2 mb-5">
                    <img src="{{ asset($movie->image) }}" alt="Movie Image" class="max-w-24 h-auto mr-2">
                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete
                        Image</button>
                </div>
            @endif
            <input type="file" name="image" class="mt-2 mb-5">

            <label for="video" class="block text-cstmdark font-semibold">Video:</label>
            <input type="text" name="video" value="{{ $movie->video }}" required class="w-full border border-gray-300 rounded p-2 mt-2 mb-5">

            <button type="submit"
                class="mt-6 mb-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">Update Movie</button>
        </form>
    </div>
@endsection
@section('js')
    <script>
        // Script to handle delete image button
        const deleteImageButton = document.querySelector('.bg-red-500');
        deleteImageButton.addEventListener('click', function() {
            const currentImageContainer = document.querySelector('.flex');
            currentImageContainer.remove();

            // Set input value to trigger image deletion on the server
            const deleteImageInput = document.createElement('input');
            deleteImageInput.type = 'hidden';
            deleteImageInput.name = 'delete_image';
            deleteImageInput.value = '1';
            const form = document.querySelector('form');
            form.appendChild(deleteImageInput);
        });
    </script>
@endsection
