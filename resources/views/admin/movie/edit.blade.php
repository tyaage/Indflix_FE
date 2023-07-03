@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-20">Edit Movie</h1>
    <a href="{{ route('movie.index') }}"><button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</button></a>
    <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data"
        class="w-96 mx-auto mt-8">
        @csrf
        @method('PUT')

        <label for="name" class="block">Name:</label>
        <input type="text" name="name" value="{{ $movie->name }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="genres" class="block">Genre:</label>
        @foreach ($genres as $genre)
            <div class="inline-block mr-2">
                <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                    @if (in_array($genre->id, $selectedGenres)) checked @endif class="form-checkbox h-5 w-5 text-blue-600">
                <label for="genre" class="ml-1">{{ $genre->name }}</label>
            </div>
        @endforeach

        <label for="actor" class="block">Actor:</label>
        <input type="text" name="actor" value="{{ $movie->actor }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="synopsis" class="block">Synopsis:</label>
        <textarea name="synopsis" required class="w-full border border-gray-300 rounded p-2 mb-4">{{ $movie->synopsis }}</textarea>

        <label for="writer" class="block">Writer:</label>
        <input type="text" name="writer" value="{{ $movie->writer }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="year" class="block">Year:</label>
        <input type="number" name="year" value="{{ $movie->year }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="minimum_age" class="block">Minimum Age:</label>
        <input type="number" name="minimum_age" value="{{ $movie->minimum_age }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <label for="image" class="block">Image:</label>
        @if ($movie->image)
            <div class="flex items-center mb-4">
                <img src="{{ asset($movie->image) }}" alt="Movie Image" class="max-w-24 h-auto mr-2">
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete
                    Image</button>
            </div>
        @endif
        <input type="file" name="image" class="mb-4">

        <label for="video" class="block">Video:</label>
        <input type="text" name="video" value="{{ $movie->video }}" required
            class="w-full border border-gray-300 rounded p-2 mb-4">

        <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>
@endsection

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
