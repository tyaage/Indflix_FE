@extends('layouts.main')

@section('container')
    <h1 class="text-3xl font-bold mb-20">Movies</h1>
    <div class="flex mb-4">
        <a href="{{ route('admin.dashboard') }}" class="mr-2">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                Kembali
            </button>
        </a>
        <a href="{{ route('movie.create') }}">
            <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">
                Tambah Movie
            </button>
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 mb-4">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white px-4 py-2 mb-4">{{ session('error') }}</div>
    @endif

    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="bg-gray-200 border px-4 py-2">Name</th>
                <th class="bg-gray-200 border px-4 py-2">Genre</th>
                <th class="bg-gray-200 border px-4 py-2">Actor</th>
                <th class="bg-gray-200 border px-4 py-2">Synopsis</th>
                <th class="bg-gray-200 border px-4 py-2">Writer</th>
                <th class="bg-gray-200 border px-4 py-2">Year</th>
                <th class="bg-gray-200 border px-4 py-2">Image</th>
                <th class="bg-gray-200 border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td class="border px-4 py-2">{{ $movie->name }}</td>
                    <td class="border px-4 py-2">
                        @foreach ($movie->genre as $gen)
                            {{ $gen->name }}
                        @endforeach
                    </td>
                    <td class="border px-4 py-2">{{ $movie->actor }}</td>
                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($movie->synopsis, 100) }}</td>
                    <td class="border px-4 py-2">{{ $movie->writer }}</td>
                    <td class="border px-4 py-2">{{ $movie->year }}</td>
                    <td class="border px-4 py-2">
                        @if ($movie->image)
                            <img src="{{ asset($movie->image) }}" alt="Movie Image" class="max-w-32 max-h-32">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('movie.edit', $movie->id) }}">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                                Edit
                            </button>
                        </a>
                        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
