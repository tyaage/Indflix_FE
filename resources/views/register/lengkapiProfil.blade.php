@extends('layouts.main')
@section('container')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-cstmdark rounded-md shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-12 space-y-4  sm:p-12">
                <h1 class="text-3xl  font-bold leading-tight tracking-tight text-dark md:text-2xl flex justify-center text-white">
                    Lengkapi Profilmu
                </h1>
                <p class="pb-7 text-white text-center">Bantu kami untuk melengkapi profil kamu, supaya kamu bisa menonton konten ini.</p>
                <form class="space-y-4 md:space-y-6" method="post">
                    @csrf
                    {{-- Email --}}
                    <div>
                        <input type="email" name="email" id="email" class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" placeholder="Email" autofocus required value="{{ old('email') }}">
                    </div>
                    {{-- Password --}}
                    <div>
                        <input type="password" name="password" id="password" placeholder="Tahun Lahir" class="text-cstmdark sm:text-sm rounded-lg block w-full p-2.5" required>
                    </div>
                    
                    {{-- Gender --}}
                    <div class="flex gap-4 pb-10">
                        <div class="w-full flex items-center bg-white rounded-lg p-5">
                            <input type="radio" id="male" name="gender" value="male" class="text-cstmdark rounded focus:ring-primary-600 focus:border-primary-600">
                            <label for="male" class="ml-2">Laki-laki</label>
                        </div>
                        <div class="w-full flex items-center bg-white rounded-lg p-5">
                            <input type="radio" id="female" name="gender" value="female" class="text-cstmdark rounded focus:ring-primary-600 focus:border-primary-600">
                            <label for="female" class="ml-2">Perempuan</label>
                        </div>
                    </div>

                    <div class="w-full bg-cstmorange text-cstmdark font-bold rounded-lg text-md px-5 py-2.5 text-center">
                        <button type="submit" class="w-full">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
