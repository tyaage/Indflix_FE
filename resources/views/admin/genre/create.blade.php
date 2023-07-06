@extends('layouts.main')

@section('container')
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col justify-center items-center w-1/4 max-w-screen-sm bg-gray-100 shadow-sm rounded-md p-5">
            <h1 class="text-2xl font-bold mb-6">Create Genre</h1>
            <a href="{{ route('genre.index') }}" class="mb-4 inline-block">
                <button class="px-4 py-2 text-white bg-cstmdark rounded hover:bg-cstmlightdark font-semibold">Back</button>
            </a>
            <form action="{{ route('genre.store') }}" method="POST" class="w-full max-w-md">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-md font-semibold text-cstmdark">Name:</label>
                    <input type="text" name="name" class="px-4 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:border-blue-500"
                        value="{{ old('name') }}">
                    @if (session()->has('error'))
                        <p class="text-red-500">{{ session('error.name.0') }}</p>
                    @endif
                </div>
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 w-full font-semibold">Create Genre</button>
            </form>
        </div>
    </div>
@endsection
