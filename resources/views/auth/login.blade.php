<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="font-serif">
    @extends('layout.layout')
    @section('content')
    
    <div class="flex items-center justify-center md:my-0 h-[90vh] mt-20 md:mt-0">
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-screen-xl gap-4 bg-white rounded-lg shadow-xl p-4 md:p-8">
            <!-- Registration Form -->
            <div class="md:w-2/5 bg-white p-8 rounded shadow-md border items-center justify-center w-screen">
                <h2 class="text-2xl font-bold mb-6">Register</h2>

                <!-- Google Sign In Button -->
                <button
                    class="w-full flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded mb-4 hover:bg-green-600">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M21.35 11.1h-9.9v2.8h5.98c-.56 2.42-2.5 4.14-4.93 4.14-2.93 0-5.32-2.39-5.32-5.32s2.39-5.32 5.32-5.32c1.38 0 2.64.52 3.6 1.37l2.11-2.11c-1.51-1.4-3.49-2.26-5.71-2.26-4.55 0-8.25 3.69-8.25 8.25s3.69 8.25 8.25 8.25c4.08 0 7.55-2.97 8.23-6.84.09-.45.14-.91.14-1.39 0-.53-.05-1.04-.14-1.53z" />
                    </svg>
                    Sign in with Google
                </button>

                <!-- Email Sign In Form -->
                <form>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your email">
                    </div>
                    <div class="">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your password">
                    </div>
                    <div class="mb-6 flex justify-end mt-1">
                        <a href="#" class="text-blue-500 hover:text-blue-700 ">Forgot Password?</a>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                            Sign In
                        </button>
                    </div>
                    <div class="flex justify-center text-sm">
                        <a href="{{route('user.register')}}" class="text-blue-500 hover:text-blue-700">Create New Account</a>
                    </div>
                </form>
            </div>

            <!-- Image Section -->
            <div class="md:w-3/5">
                <img src="{{ asset('images/login2.jpg') }}" alt="Login Image" class="rounded-lg h-full w-full object-cover">
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
