<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- Favicon --}}
    <link rel="icon" href="#" type="image/x-icon">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    <!-- Font Poppins -->

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Flowbite for Tailwind --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <title>Indflix</title>
    <style>
        .scroll-fixed {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>

<body>
    @php
        if (Session::has('user') && Session::has('token')) {
            $user = Session::get('user');
            $is_admin = $user['is_admin'];
        } else {
            // Penanganan jika data pengguna tidak tersedia
        }
    @endphp
    @include('partials.navbar')
    <div class="font-poppins w-full">
        @yield('container')
    </div>
    @include('partials.footer')
    {{-- Flowbite Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    {{-- Dropdown --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            dropdownToggle.addEventListener('click', function() {
                const dropdownMenu = dropdownToggle.nextElementSibling;
                dropdownMenu.classList.toggle('hidden');
            });
        });
    </script>
    {{-- Logout --}}
    <script>
        function logoutUser() {
            // Hapus token dari localStorage
            localStorage.removeItem('token');

            // Hapus data pengguna dari localStorage
            localStorage.removeItem('user');

            // Redirect ke halaman login atau halaman awal
            window.location.href = '/'; // Ganti '/login' dengan halaman tujuan setelah logout
        }
    </script>

    @yield('js')
</body>

</html>
