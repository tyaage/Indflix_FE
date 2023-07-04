@extends('layouts.main')
@section('container')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-cstmdark rounded-md shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-12 space-y-4  sm:p-12">
                <h1
                    class="text-3xl pb-7 font-bold leading-tight tracking-tight text-dark md:text-2xl flex justify-center text-white">
                    Register
                </h1>
                <form class="space-y-4 md:space-y-6" method="post" action="/register">
                    @csrf
                    <div>
                        <input type="name" name="name" id="name"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" placeholder="Nama" autofocus
                            value="{{ old('name') }}">
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.name.0') }}</span>
                        @endif
                    </div>
                    {{-- Email --}}
                    <div>
                        <input type="email" name="email" id="email"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" placeholder="Email" autofocus
                            value="{{ old('email') }}">
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.email.0') }}</span>
                        @endif
                    </div>

                    {{-- Password --}}
                    <div>
                        <input type="password" name="password" id="password" placeholder="Kata sandi (Minimal 8 karakter)"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5">
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.password.0') }}</span>
                        @endif
                    </div>

                    {{-- Masukan ulang password --}}
                    <div class="mb-10">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Masukkan ulang kata sandi"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5">
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.password.0') }}</span>
                        @endif
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.password_confirmation.0') }}</span>
                        @endif
                    </div>

                    {{-- Gender --}}
                    <div>
                        <select name="gender" class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5">
                            <option disabled selected>-Pilih Gender-</option>
                            <option value="L" @if (old('gender') == 'L') selected @endif>Male</option>
                            <option value="P" @if (old('gender') == 'P') selected @endif>Female</option>
                        </select>
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.gender.0') }}</span>
                        @endif
                    </div>

                    {{-- Birth Year --}}
                    <div>
                        <input type="text" placeholder="Masukkan tahun lahir" name="birth_year"
                            value="{{ old('birth_year') }}" class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5">
                        @if (session()->has('error'))
                            <span class="text-red-500">{{ session('error.birth_year.0') }}</span>
                        @endif
                    </div>

                    <div class="pt-10">
                        <div
                            class="w-full bg-cstmorange text-cstmdark font-bold rounded-lg text-md px-5 py-2.5 text-center">
                            <button type="submit" class="w-full">Register</button>
                        </div>
                    </div>

                    <p class="text-medium font-light text-white text-center">
                        Sudah punya akun? <a href="/login" class="font-medium hover:underline text-cstmorange">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
