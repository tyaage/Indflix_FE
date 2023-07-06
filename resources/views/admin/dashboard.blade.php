@extends('layouts.main')
@section('container')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="l p-5 sm:px-5 lg:px-8">
            <div class="bg-cstmdark overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-4xl font-bold text-white mb-10">Welcome to the Dashboard Admin!</h1>
                <div class="flex gap-5 justify-center">
                    <div class="flex items-center bg-cstmorange w-1/4 justify-center p-4 rounded-md font-bold text-cstmdark hover:cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <a href="/admin/movie" class="hover:underline">Movie</a>
                    </div>
                    <div class="flex items-center bg-cstmorange w-1/4 justify-center p-4 rounded-md font-bold text-cstmdark hover:cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <a href="/admin/genre" class= "hover:underline">Genre</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
