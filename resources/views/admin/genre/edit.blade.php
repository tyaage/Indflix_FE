@extends('layouts.main')

@section('container')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-3xl font-bold mb-6">Edit Genre</h1>
        <a href="{{ route('genre.index') }}" class="inline-block mb-4">
            <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Back</button>
        </a>
        <form action="{{ route('genre.update', $genre['id']) }}" method="POST" class="w-full max-w-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" value="{{ $genre['name'] }}"
                    class="px-4 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:border-blue-500">
                @if (session()->has('error'))
                    <p class="text-red-500">{{ session('error.name.0') }}</p>
                @endif
            </div>
            <button type="submit"
                class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 w-full">Update</button>
        </form>
    </div>
@endsection
