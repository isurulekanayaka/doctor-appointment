<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .login {
            background: url('{{ asset('images/login-bg.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            /* Required for absolute positioning within */
            height: 100vh;
            width: 200%;
            /* Adjust height as needed */
        }

        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust opacity as needed */
        }
    </style>
</head>

<body class="font-serif">
    <div class="flex items-center h-screen w-[1275px] border border-white">
        <div class="flex dark-overlay">
            <div class="flex items-center w-full h-full bg-cover login">
                <div class="text-white dark-overlay"></div>
            </div>
            <div class=" w-full h-full flex items-center justify-center bg-[#08090d]">
                <form class="max-w-sm p-10 m-4 bg-white rounded shadow-xl bg-opacity-70 w-lvw">

                    <!-- Title -->
                    <p class="mb-6 text-2xl font-bold text-center text-blue-500">LOGIN</p>

                    <!-- Email input -->
                    <div class="mb-4">
                        <label class="block text-sm text-gray-700" for="email">E-mail</label>
                        <input
                            class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:bg-white"
                            type="email" id="email" placeholder="Enter your email" aria-label="email" required>
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <label class="block text-sm text-gray-700" for="password">Password</label>
                        <input
                            class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:bg-white"
                            type="password" id="password" placeholder="Enter your password" aria-label="password"
                            required>
                    </div>

                    <!-- Login button and forgot password link -->
                    <div class="flex items-center justify-between mb-6">
                        <button
                            class="px-4 py-2 font-light tracking-wider text-white bg-gray-900 rounded hover:bg-gray-800 focus:outline-none"
                            type="submit">Login</button>
                        <a class="text-sm text-gray-700 hover:text-red-400" href="#">Forgot password?</a>
                    </div>

                    <!-- Create account link -->
                    <div class="text-center">
                        <a class="text-sm text-gray-700 hover:text-red-400" href="#">Create New Account</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
