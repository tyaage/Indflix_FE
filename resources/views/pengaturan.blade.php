@extends('layouts.main')
@section('container')
    <h1 class="text-3xl font-bold mb-16">Pengaturan</h1>
    <div class="flex justify-center">

        <div class="w-3/4">
            <a href="/" class="mr-2">
                <button class="px-4 py-2 mb-4 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                    Kembali
                </button>
            </a>
            <!-- Menampilkan pesan sukses -->
            @if (session('profile-success'))
                <div class="bg-green-100 text-green-800 py-2 px-4 mb-2 rounded">
                    {{ session('profile-success') }}
                </div>
            @endif

            <div class="form-container mt-8">
                <!-- Menampilkan pesan sukses -->
                @if (session('profile-success'))
                    <div class="bg-green-100 text-green-800 py-2 px-4 mb-4 rounded">
                        {{ session('profile-success') }}
                    </div>
                @endif
                <form method="POST" action="/ubah-profile">
                    @csrf
                    <label for="name" class="mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ session('user')['name'] }}"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.name') ? '' : 'mb-4' }}">

                    <label for="email" class="mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ session('user')['email'] }}"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.email') ? '' : 'mb-4' }}">
                    @if (session()->has('error'))
                        <p class="text-red-500 text-sm mb-1">{{ session('error.email.0') }}</p>
                    @endif

                    <label for="gender" class="mb-1">Gender</label>
                    <select name="gender" id="gender"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.gender') ? '' : 'mb-4' }}">
                        <option value="L" {{ session('user')['gender'] === 'L' ? 'selected' : '' }}>Male</option>
                        <option value="P" {{ session('user')['gender'] === 'P' ? 'selected' : '' }}>Female</option>
                        @if (session()->has('error'))
                            <p class="text-red-500 text-sm mb-1">{{ session('error.gender.0') }}</p>
                        @endif
                    </select>

                    <label for="birth_year" class="mb-1">Birth Year</label>
                    <input type="number" name="birth_year" id="birth_year" value="{{ session('user')['birth_year'] }}"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.birth_year') ? '' : 'mb-4' }}">
                    @if (session()->has('error'))
                        <p class="text-red-500 text-sm mb-1">{{ session('error.birth_year.0') }}</p>
                    @endif

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Update
                        Profile</button>
                </form>
            </div>



            <div class="form-container mt-8">
                <!-- Menampilkan pesan sukses -->
                @if (session('password-success'))
                    <div class="bg-green-100 text-green-800 py-2 px-4 mb-4 rounded">
                        {{ session('password-success') }}
                    </div>
                @endif
                <form method="POST" action="/ubah-password">
                    @csrf
                    <label for="current_password" class="mb-1">Current Password</label>
                    <input type="password" name="current_password" id="current_password"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.current_password') ? '' : 'mb-4' }}">
                    @if (session()->has('error'))
                        <p class="text-red-500 text-sm mb-1">{{ session('error.current_password.0') }}</p>
                    @endif

                    <label for="new_password" class="mb-1">New Password</label>
                    <input type="password" name="new_password" id="new_password"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.new_password') ? '' : 'mb-4' }}">
                    @if (session()->has('error'))
                        <p class="text-red-500 text-sm mb-1">{{ session('error.new_password.0') }}</p>
                    @endif

                    <label for="new_password_confirmation" class="mb-1">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.new_password_confirmation') ? '' : 'mb-4' }}">
                    @if (session()->has('error'))
                        <p class="text-red-500 text-sm mb-1">{{ session('error.new_password_confirmation.0') }}</p>
                    @endif

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Change
                        Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
