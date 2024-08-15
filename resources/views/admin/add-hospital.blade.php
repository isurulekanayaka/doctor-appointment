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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Add Hospital</h1>

        <div class="container mt-10 mx-5">

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
                    <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
            </div>

            {{-- TO ALERT JS --}}
            {{-- <script>
                // Hide success alert after 10 seconds
                setTimeout(function() {
                    let successAlert = document.getElementById('success-alert');
                    if (successAlert) {
                        successAlert.style.display = 'none';
                    }
                }, 1000);

                // Hide error alert after 10 seconds
                setTimeout(function() {
                    let errorAlert = document.getElementById('error-alert');
                    if (errorAlert) {
                        errorAlert.style.display = 'none';
                    }
                }, 1000);
            </script> --}}

            <div class="flex mx-auto justify-center">
                {{-- <!-- Owner Details -->
                    <div class="mr-5 max-w-lg bg-white p-8 shadow-lg rounded-lg  w-1/2">
                        <h2 class="text-xl font-bold mb-4">Owner Details</h2>
                        
                        <div class="mb-4">
                            <label for="owner_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="owner_name" id="owner_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter owner's name" required>
                        </div>
            
                        <div class="mb-4">
                            <label for="owner_email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="owner_email" id="owner_email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter owner's email address" required>
                        </div>
            
                        <div class="mb-4">
                            <label for="owner_contact" class="block text-gray-700 text-sm font-bold mb-2">Contact Number:</label>
                            <input type="text" name="owner_contact" id="owner_contact" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter owner's contact number" required>
                        </div>
            
                        <div class="mb-4">
                            <label for="owner_address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                            <textarea name="owner_address" id="owner_address" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter owner's address" required></textarea>
                        </div>
                    </div> --}}

                <!-- Hospital Details -->
                <div class="max-w-lg bg-white p-8 shadow-lg rounded-lg w-1/2">
                    <h2 class="text-xl font-bold mb-4">Hospital Details</h2>
                    <form action="{{ route('addhospital') }}" method="POST">
                        @csrf
                        <input type="text" name="id" id="id"
                            value="{{ isset($hospital) ? $hospital->id : old('id') }}" hidden>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name"
                                value="{{ isset($hospital) ? $hospital->name : old('name') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter hospital name" required>

                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email"
                                value="{{ isset($hospital) ? $hospital->email : old('email') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter hospital email address" required>
                        </div>

                        <div class="mb-4">
                            <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact
                                Number:</label>
                            <input type="text" name="contact" id="contact"
                                value="{{ isset($hospital) ? $hospital->contact : old('contact') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter hospital contact number" required>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                            <textarea name="address" id="address" rows="3"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter hospital address" required>{{ isset($hospital) ? $hospital->address : old('address') }}</textarea>

                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                            <input type="password" name="password" id="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                readonly>
                        </div>

                        <div class="flex items-center mt-6 justify-center">
                            <button type="submit"
                                class="bg-blue-500 px-16 text-white font-bold border border-blue-500 hover:bg-transparent hover:text-blue-500 text-xl py-3 rounded-lg">
                                Add Hospital
                            </button>
                        </div>
                    </form>
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

            </div>


        </div>
    @endsection

</body>

</html>
