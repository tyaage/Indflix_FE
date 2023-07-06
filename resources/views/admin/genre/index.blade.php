@extends('layouts.main')

@section('container')
    <div class="w-full mx-auto max-w-screen-xl p-5 bg-gray-100 shadow-sm">
        <h1 class="text-2xl font-bold mb-10 pt-48 lg:pt-32">Genre List</h1>
        <div class="flex mb-4 gap-3">
            <a href="{{ route('admin.dashboard') }}">
                <button class="px-4 py-2 text-white bg-cstmdark rounded-md hover:bg-cstmlightdark font-semibold">Kembali</button>
            </a>
            <a href="{{ route('genre.create') }}">
                <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 font-semibold">Create Genre</button>
            </a>
        </div>


        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-200 text-red-800 py-2 px-4 mb-4">{{ session('error') }}</div>
        @endif

        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="bg-gray-200 border border-gray-300 py-2 px-4 text-left">No.</th>
                    <th class="bg-gray-200 border border-gray-300 py-2 px-4 text-left">Name</th>
                    <th class="bg-gray-200 border border-gray-300 py-2 px-4 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    @foreach ($genre as $gen)
                        <tr>
                            <td class="border border-gray-300 py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $gen['name'] }}</td>
                            <td class="border border-gray-300 py-2 px-4">
                                <a href="{{ route('genre.edit', $gen['id']) }}"
                                    class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                <form action="{{ route('genre.destroy', $gen['id']) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this genre?')"
                                        class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
