<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-800">
  <section class="mx-auto">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-md shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-dark md:text-2xl">
                    Log in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" method="post">
                    @csrf
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@example.com" autofocus required value="{{ old ('email') }}">
                    </div>
                    {{-- Password --}}
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    </div>

                    <div class="w-full bg-gray-800 text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <button type="submit" class="w-full">Sign in</button>
                    </div>
                    
                    <p class="text-sm font-light text-gray-500 text-center">
                        Don’t have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>