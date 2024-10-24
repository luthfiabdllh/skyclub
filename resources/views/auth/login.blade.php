<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="p-26">


    <div class="flex justify-between center">
        <div class="w-128">
            <img class="mb-9" src="{{ Storage::url('images/icon_auth.svg') }}" alt="">
            <div class=" space-y-4 mb-12">
                <h4 class="text-4xl font-bold"> Login</h4>
                <p class="text-base">Login untuk akses akun SKY CLUB anda</p>
                {{-- allert --}}
                @if (session()->has('errorLogin'))
                    <div id="alert-2"
                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session()->get('errorLogin') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div id="alert-3"
                        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session()->get('success') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                {{-- allert end --}}
            </div>
            <form action="{{ route('login.authentication') }}" method="POST">
                @csrf
                <div class="space-y-6 mb-10">
                    <div class="relative">
                        <input type="text" name="username" placeholder="username" value="{{ old('username') }}"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label for="username"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Username</label>
                    </div>
                    <div class="relative ">
                        <input type="password" name="password" placeholder="password" required
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label for="password"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Password</label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        <a href="/forgot-password"
                            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                            password?</a>
                    </div>
                </div>
                <button type="submit" class=" bg-red-600 rounded py-2 font-semibold text-white w-full">Sign in</button>
            </form>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center mt-4">
                Don’t have an account <a href="/register"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign Up</a>
            </p>
            <div class="flex items-center mt-10">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="px-4 text-gray-400">atau masuk dengan</span>
                <div class="flex-grow border-t border-gray-200"></div>
            </div>
            <div class="flex mt-10 space-x-4 ">
                <div class=" border w-full py-4 border-black">
                    <img class="mx-auto" src="{{ Storage::url('images/facebook.svg') }}" alt="">
                </div>
                <div class=" border w-full py-4 border-black">
                    <img class="mx-auto" src="{{ Storage::url('images/google.svg') }}" alt="">
                </div>
                <div class=" border w-full py-4 border-black">
                    <img class="mx-auto" src="{{ Storage::url('images/apple.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div>
            <img class="rounded-3xl" src="{{ Storage::url('images/carousel.svg') }}" alt="">
        </div>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
