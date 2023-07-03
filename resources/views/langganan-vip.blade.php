@extends('layouts.main')

@section('container')
    <div class="flex justify-center items-center h-screen">
        <form method="POST" action="/langganan-vip" class="max-w-sm">
            @csrf

            <h2 class="text-2xl font-semibold mb-4">Beli Langganan VIP</h2>

            <div class="mb-4">
                <input type="radio" id="duration_7" name="duration" value="7" class="mr-2">
                <label for="duration_7" class="inline-block font-medium">1 Minggu</label>
            </div>

            <div class="mb-4">
                <input type="radio" id="duration_30" name="duration" value="30" class="mr-2">
                <label for="duration_30" class="inline-block font-medium">1 Bulan</label>
            </div>

            <div class="mb-4">
                <input type="radio" id="duration_60" name="duration" value="60" class="mr-2">
                <label for="duration_60" class="inline-block font-medium">2 Bulan</label>
            </div>

            <div class="mb-4">
                <input type="radio" id="duration_90" name="duration" value="90" class="mr-2">
                <label for="duration_90" class="inline-block font-medium">3 Bulan</label>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Beli
            </button>
        </form>
    </div>
@endsection
