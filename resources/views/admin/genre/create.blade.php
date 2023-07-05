@extends('layouts.main')

@section('container')
    <div class="container mx-auto max-w-md p-4 bg-white rounded shadow-lg">
        <h1 class="text-2xl font-bold mb-20">Create Genre</h1>
        <a href="{{ route('genre.index') }}" class="mb-4 inline-block">
            <button class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Back</button>
        </a>
        <form action="{{ route('genre.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-gray-800">Name:</label>
                <input type="text" name="name" class="w-full py-2 px-4 border border-gray-300 rounded"
                    value="{{ old('name') }}">
                @if (session()->has('error'))
                    <p class="text-red-500">{{ session('error.name.0') }}</p>
                @endif
            </div>
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Create</button>
        </form>
    </div>
@endsection
