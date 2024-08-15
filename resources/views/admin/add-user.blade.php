<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body class="text-gray-800 font-inter">

    @extends('layout.admin-layout')

    @section('admin-content')
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Add User</h1>
        <div class="container mt-10 mx-5">
            <div class="flex mx-auto justify-center">
                <div class="fixed top-0 right-0 m-4 mt-36">
                    @if (session('success'))
                        <div id="success-alert"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div id="error-alert"
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                </div>
                <div class="max-w-lg bg-white p-8 shadow-lg rounded-lg w-1/2">
                    <h2 class="text-xl font-bold mb-4">Add User</h2>
                    <form action="{{route('addUser')}}" method="POST">
                        @csrf
                        <input type="text" name="id" id="id"
                            value="{{ isset($user) ? $user->id : old('id') }}" hidden>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name"
                                value="{{ isset($user) ? $user->name : old('name') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter user name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email"
                                value="{{ isset($user) ? $user->email : old('email') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter user email address" required>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                            <select name="role" id="role"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                                <option value="">Select role</option>
                                <option value="admin" {{ isset($user) && $user->type === 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="user" {{ isset($user) && $user->type === 'user' ? 'selected' : '' }}>
                                    User
                                </option>
                            </select>
                        </div>                        

                        <div class="mb-4">
                            <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact Number:</label>
                            <input type="text" name="contact" id="contact"
                                value="{{ isset($user) ? $user->contact : old('contact') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter contact number" required>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                            <textarea name="address" id="address" rows="3"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter address" required>{{ isset($user) ? $user->address : old('address') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                            <input type="password" name="password" id="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                readonly>
                        </div>

                        <script>
                            // Function to generate a random password
                            function generatePassword(length) {
                                const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$!0123456789";
                                let password = "";
                                for (let i = 0; i < length; i++) {
                                    const randomIndex = Math.floor(Math.random() * charset.length);
                                    password += charset[randomIndex];
                                }
                                return password;
                            }

                            // Auto-generate password and set it in the password field
                            document.getElementById('password').value = generatePassword(12);
                        </script>

                        <div class="flex items-center mt-6 justify-center">
                            <button type="submit"
                                class="bg-blue-500 px-16 text-white font-bold border border-blue-500 hover:bg-transparent hover:text-blue-500 text-xl py-3 rounded-lg">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endsection

</body>

</html>
