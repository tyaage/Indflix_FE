@extends('layouts.main')

@section('container')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <button class="bg-cstmdark hover:bg-cstmlightdark text-white font-bold py-2 px-4 rounded mt-12 mt-48 lg:mt-32">
                        <a href="/" class="no-underline">Kembali</a>
                    </button>
                </div>

                <div class="w-full max-w-screen-xl mx-auto bg-gray-100 border border-gray-300 shadow-lg p-6">
                    <h2 class="text-3xl font-bold mb-4">{{ $movie->name }}</h2>
                    <hr class="my-5 border-gray-500">

                    <p class="text-base text-cstmdark mb-2 bg-gray-50 p-5 shadow-sm rounded-md mt-10">{{ $movie->synopsis }}</p>

                    <p class="text-base text-cstmdark mb-2 mt-10 font-semibold">Actors: {{ $movie->actor }}</p>
                    <p class="text-base text-cstmdark mb-2 font-semibold">Writer: {{ $movie->writer }}</p>
                    <p class="text-base text-cstmdark mb-2 font-semibold">Year: {{ $movie->year }}</p>

                    @if ($movie->image)
                        <img src="{{ asset($movie->image) }}" alt="Movie Image" class="max-w-full w-full h-auto mt-10 mb-4 rounded-md shadow-sm">
                    @else
                        No Image
                    @endif

                    @if ($movie->genre->count() > 0)
                        <p class="text-base text-cstmdark font-bold mt-10 mb-2">Genre:</p>
                        <ul class="flex gap-3">
                            @foreach ($movie->genre as $genre)
                                <li class="text-sm text-cstmdark bg-cstmorange px-3 py-2 mb-2 font-semibold rounded-md shadow-sm">{{ $genre->name }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <p class="text-base text-cstmdark mt-10 mb-2 font-semibold">Total Likes: {{ $movie->likes }}</p>

                    <form action="/{{ $movie->slug }}/like" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded mb-10">
                            Like
                        </button>
                    </form>

                    <div class="video-container">
                        <video controls class="w-full rounded-md shadow-sm">
                            <source src="{{ $movie->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
