@extends('layouts.main')

@section('container')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <a href="/" class="mb-4 inline-block text-blue-500">Kembali</a>

            @if (session('profile-success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('profile-success') }}
                </div>
            @endif

            @if ($errors->any(['name', 'email', 'gender', 'birth_year']))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach (['name', 'email', 'gender', 'birth_year'] as $field)
                            @foreach ($errors->get($field) as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container">
                <form method="POST" action="/ubah-profile">
                    @csrf
                    <label for="name" class="mt-4">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

                    <label for="email" class="mt-4">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

                    <label for="gender" class="mt-4">Gender</label>
                    <select name="gender" id="gender"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">
                        <option value="L" {{ $user->gender === 'L' ? 'selected' : '' }}>Male</option>
                        <option value="P" {{ $user->gender === 'P' ? 'selected' : '' }}>Female</option>
                    </select>

                    <label for="birth_year" class="mt-4">Birth Year</label>
                    <input type="number" name="birth_year" id="birth_year" value="{{ $user->birth_year }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

                    <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Update
                        Profile</button>
                </form>
            </div>

            @if (session('password-success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-6">
                    {{ session('password-success') }}
                </div>
            @endif

            @if ($errors->any(['current_password', 'new_password', 'new_password_confirmation']))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-6">
                    <ul>
                        @foreach (['current_password', 'new_password', 'new_password_confirmation'] as $field)
                            @foreach ($errors->get($field) as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container mt-6">
                <form method="POST" action="/ubah-password">
                    @csrf
                    <label for="current_password" class="mt-4">Current Password</label>
                    <input type="password" name="current_password" id="current_password"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

                    <label for="new_password" class="mt-4">New Password</label>
                    <input type="password" name="new_password" id="new_password"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

                    <label for="new_password_confirmation" class="mt-4">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="w-full px-4 py-2 border border-gray-300 rounded mt-2 focus:outline-none focus:border-blue-500">

                    <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Change
                        Password</button>
                </form>
            </div>
        </div>
    </div>

@endsection
