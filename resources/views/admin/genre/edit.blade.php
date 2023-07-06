@extends('layouts.main')

@section('container')
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col justify-center items-center w-1/4 max-w-screen-sm bg-gray-100 shadow-sm rounded-md p-5">
            <h1 class="text-3xl font-bold mb-6">Edit Genre</h1>
            <a href="{{ route('genre.index') }}" class="inline-block mb-4">
                <button class="px-4 py-2 text-white bg-cstmdark rounded hover:bg-cstmlightdark font-semibold">Back</button>
            </a>
            <form action="{{ route('genre.update', $genre['id']) }}" method="POST" class="w-full max-w-md">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-md font-semibold text-cstmdark">Name:</label>
                    <input type="text" name="name" value="{{ $genre['name'] }}"
                        class="px-4 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:border-blue-500">
                    @if (session()->has('error'))
                        <p class="text-red-500">{{ session('error.name.0') }}</p>
                    @endif
                </div>
                <button type="submit"
                    class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 w-full font-semibold">Update Genre</button>
            </form>
        </div>
    </div>
@endsection
