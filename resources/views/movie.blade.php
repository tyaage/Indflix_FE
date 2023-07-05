@extends('layouts.main')

@section('container')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="/" class="no-underline">Kembali</a>
                    </button>
                </div>

                <div class="p-6">
                    <div class="max-w-4xl mx-auto bg-gray-100 border border-gray-300 rounded-lg shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">{{ $movie->name }}</h2>

                        <p class="text-base text-gray-700 mb-2">{{ $movie->synopsis }}</p>

                        <p class="text-base text-gray-700 mb-2">Actors: {{ $movie->actor }}</p>
                        <p class="text-base text-gray-700 mb-2">Writer: {{ $movie->writer }}</p>
                        <p class="text-base text-gray-700 mb-2">Year: {{ $movie->year }}</p>

                        @if ($movie->image)
                            <img src="{{ asset($movie->image) }}" alt="Movie Image" class="max-w-full h-auto mb-4">
                        @else
                            No Image
                        @endif

                        @if ($movie->genre->count() > 0)
                            <p class="text-base font-bold mb-2">Genre:</p>
                            <ul class="ml-6">
                                @foreach ($movie->genre as $genre)
                                    <li class="text-sm text-gray-600 mb-2">{{ $genre->name }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <p class="text-base text-gray-700 mb-2">Total Likes: {{ $movie->likes }}</p>

                        <form action="/{{ $movie->slug }}/like" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Like
                            </button>
                        </form>

                        <div class="video-container">
                            <video controls class="w-full">
                                <source src="{{ $movie->video }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
