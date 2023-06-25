@extends('layouts.main')

@section('container')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h1 class="text-4xl font-bold mb-8">Welcome to the Dashboard Admin!</h1>
                <div class="flex items-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <a href="/admin/movie" class="text-blue-500 hover:underline">Movie</a>
                </div>
                <div class="flex items-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <a href="/admin/genre" class="text-blue-500 hover:underline">Genre</a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.pengaturan') }}" class="text-blue-500 hover:underline">Pengaturan</a>
                </div>
                <form method="POST" action="/logout" class="mt-8">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-md hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
