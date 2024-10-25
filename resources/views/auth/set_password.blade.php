<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="p-26">
    <div class="flex justify-between center">
        <div class=" w-512px">
            <img class="mb-9" src="{{ Storage::url('images/icon_auth.svg') }}" alt="">
            <div class=" space-y-4 mb-12">
                <a href="/login" class="flex space-x-1">
                    <img src="{{ Storage::url('images/arrow_left.svg') }}" alt=""><span>Back to login</span>
                </a>
                <h4 class="text-4xl font-bold">Set a password</h4>
                <p class="text-base">Your previous password has been reseted. Please set a new password for your account.</p>
            </div>

            <form action="{{ route('setPassword.update') }}" method="POST">
                @csrf
                <div class="space-y-6 mb-8">
                    <div class="relative">
                        <input type="password" name="password" placeholder="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                        <label for="username" class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Create Password</label>
                    </div>
                    <div class="relative ">
                        <input type="password" name="password" placeholder="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="number" class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Re-enter Password</label>
                    </div>
                </div>
                <button type="submit" class=" bg-red-600 rounded py-2 font-semibold text-white w-full">Submit</button>
            </form>
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
            <img class="rounded-3xl" src="{{ Storage::url('images/carousel.svg') }}" alt="" >
        </div>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
