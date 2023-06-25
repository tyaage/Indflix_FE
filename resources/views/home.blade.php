@extends('layouts.main')
@section('container')
    {{-- Hero Image --}}
    <div class="w-full h-full mt-16 sm:mt-0">
        <img src="/assets/img/banner-sample.jpg" alt="Hero Image" class="w-full object-cover">
        <div class="absolute inset-0 flex flex-col items-start justify-center px-10">
            <div class="flex flex-col w-1/3 mx-5">
                <p class="text-white text-md sm:text-xl md:text-4xl font-bold mb-8">Stars Wars</p>
                <p class="text-white text-md sm:text-xl md:text-xl font-sm">The Imperial Forces -- under orders from cruel Darth Vader (David Prowse) -- hold Princess Leia (Carrie Fisher) hostage, in their efforts to quell the rebellion against the Galactic Empire. Luke Skywalker (Mark Hamill) and Han Solo (Harrison Ford), captain of the Millennium Falcon, work together with the companionable droid duo R2-D2 (Kenny Baker) and C-3PO (Anthony Daniels) to rescue the beautiful princess, help the Rebel Alliance, and restore freedom and justice to the Galaxy.</p>
            </div>
            <a href="#" class="flex bg-cstmorange text-cstmdark py-3 px-5 rounded-md items-center mt-8 ml-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                </svg> 
                <span class="ml-2 font-bold">Mainkan</span>
            </a>
        </div>  
    </div>

    {{-- Movies --}}
    <div class="p-10 ">
        <p class="bg-cstmdark rounded-md shadow-sm text-white text-4xl font-bold text-center py-5 mb-10">Popular on Indflix</p>
        {{-- Movie Card --}}
        <div class="flex flex-wrap justify-center gap-10">
            <div class="object-cover">
                <img src="/assets/img/hero-img.jpg" alt="Movie" class="rounded-md shadow-sm w-64 h-64">
            </div>
        </div>
    </div>
@endsection
