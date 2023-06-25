@extends('layouts.main')
@section('container')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-cstmdark rounded-md shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-12 space-y-4  sm:p-12">
                <h1
                    class="text-3xl pb-7 font-bold leading-tight tracking-tight text-dark md:text-2xl flex justify-center text-white">
                    Login
                </h1>
                <form class="space-y-4 md:space-y-6" method="post" action="/login">
                    @csrf
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
                        <input type="password" name="password" id="password" placeholder="Kata sandi"
                            class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" required>
                    </div>

                    <a href="#" class="font-medium text-cstmorange flex justify-end hover:underline">Lupa sandi?</a>

                    <div class="w-full bg-cstmorange text-cstmdark font-bold rounded-lg text-md px-5 py-2.5 text-center">
                        <button type="submit" class="w-full">Login</button>
                    </div>

                    <p class="text-medium font-light text-white text-center">
                        Belum punya akun? <a href="/register"
                            class="font-medium hover:underline text-cstmorange">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // Mengambil semua elemen dengan kelas "group"
        const dropdowns = document.querySelectorAll('.group');

        // Menambahkan event listener untuk setiap elemen dropdown
        dropdowns.forEach((dropdown) => {
            // Mengambil elemen anak pertama sebagai toggle
            const toggle = dropdown.children[0];

            // Menambahkan event listener saat toggle di klik
            toggle.addEventListener('click', () => {
                // Toggle class "hidden" pada elemen dropdown
                dropdown.children[1].classList.toggle('hidden');
            });

            // Menambahkan event listener saat mengklik di luar dropdown
            document.addEventListener('click', (event) => {
                // Mengecek apakah elemen yang diklik berada di dalam dropdown atau tidak
                if (!dropdown.contains(event.target)) {
                    // Menyembunyikan dropdown jika diklik di luar dropdown
                    dropdown.children[1].classList.add('hidden');
                }
            });
        });
    </script>
@endsection
