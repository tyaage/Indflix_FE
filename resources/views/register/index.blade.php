@extends('layouts.main')
@section('container')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-cstmdark rounded-md shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-12 space-y-4  sm:p-12">
                <h1
                    class="text-3xl pb-7 font-bold leading-tight tracking-tight text-dark md:text-2xl flex justify-center text-white">
                    Register
                </h1>
                <form class="space-y-4 md:space-y-6" method="post">
                    @csrf
                    <div>
                        {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label> --}}
                        <input type="name" name="name" id="name"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" placeholder="Nama" autofocus
                            required value="{{ old('name') }}">
                    </div>
                    {{-- Email --}}
                    <div>
                        {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label> --}}
                        <input type="email" name="email" id="email"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" placeholder="Email" autofocus
                            required value="{{ old('email') }}">
                    </div>

                    {{-- Password --}}
                    <div>
                        {{-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label> --}}
                        <input type="password" name="password" id="password" placeholder="Kata sandi (Minimal 8 karakter)"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" required>
                    </div>

                    {{-- Masukan ulang password --}}
                    <div class="mb-10">
                        {{-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label> --}}
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Masukkan ulang kata sandi"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" required>
                    </div>

                    {{-- Gender --}}
                    <div>
                        <select name="gender" required class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5">
                            <option disabled selected>-Pilih Gender-</option>
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                        @error('gender')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Birth Year --}}
                    <div>
                        <input type="text" placeholder="Masukkan tahun lahir" name="birth_year"
                            value="{{ old('birth_year') }}" class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5"
                            required>
                        @error('birth_year')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
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
