<nav class="font-poppins w-full fixed bg-cstmdark border-gray-200 z-10 px-10">
    <div class="flex flex-wrap justify-between items-center mx-auto p-4">
        <a href="/" class="text-4xl font-bold uppercase tracking-wide text-cstmorange">Indflix</a>

        <form class="w-1/2">
            <!-- Form pencarian -->
        </form>

        <div class="text-white flex flex-wrap items-center">
            <a href="#">
                <!-- Icon notifikasi -->
            </a>

            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="relative group">
                        <a class="nav-link dropdown-toggle flex justify-between items-center font-semibold -ml-14 px-4 lg:px-5 py-2 lg:py-2.5"
                            role="button" aria-haspopup="true">
                            Welcome back, <span class="ml-1 text-cstmorange">{{ auth()->user()->name }}</span>
                            {{-- Drop Arrow Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4 ml-1">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <ul class="absolute z-30 hidden mt-1 bg-white shadow-md rounded-sm py-2">
                            <li>
                                <a href="/akun"
                                    class="dropdown-item flex items-center font-semibold text-sm tracking-wide px-4 py-2 text-black hover:text-cstmteal transition-colors duration-300">
                                    {{-- Account Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-4 h-4 mr-1">
                                        <path
                                            d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                    </svg> Account
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item flex items-center font-semibold text-sm tracking-wide px-4 py-2 text-cstmdark hover:text-cstmcrimson transition-colors duration-300">
                                        {{-- Logout Icon --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-4 h-4 mr-1">
                                            <path fill-rule="evenodd"
                                                d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M19 10a.75.75 0 00-.75-.75H8.704l1.048-.943a.75.75 0 10-1.004-1.114l-2.5 2.25a.75.75 0 000 1.114l2.5 2.25a.75.75 0 101.004-1.114l-1.048-.943h9.546A.75.75 0 0019 10z"
                                                clip-rule="evenodd" />
                                        </svg>Log out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li id="login-button"
                        class="bg-cstmorange nav-item flex items-center text-cstmdark font-semibold rounded-md shadow text-sm ml-5 px-4 lg:px-5 py-2 lg:py-2.5 mr-2 tracking-wide cursor-pointer">
                        <a href="/login" class="nav-link">Log in</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="ml-1 w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
