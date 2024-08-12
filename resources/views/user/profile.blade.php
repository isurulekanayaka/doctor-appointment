<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }
    </style>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
    <div class="container mx-auto my-10 p-6 bg-white shadow-lg rounded-lg max-w-lg">
        <h2 class="text-4xl text-center text-green-500 font-bold mb-8">My Profile</h2>
        <form class="space-y-6">
            <div class="flex flex-col">
                <label for="firstName" class="text-lg font-semibold text-gray-700 mb-2">First Name</label>
                <input type="text" id="firstName" name="firstName" class="p-2 border border-gray-300 rounded-md" placeholder="Enter your first name">
            </div>
            <div class="flex flex-col">
                <label for="lastName" class="text-lg font-semibold text-gray-700 mb-2">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="p-2 border border-gray-300 rounded-md" placeholder="Enter your last name">
            </div>
            <div class="flex flex-col">
                <label for="birthday" class="text-lg font-semibold text-gray-700 mb-2">Birthday</label>
                <input type="date" id="birthday" name="birthday" class="p-2 border border-gray-300 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="gender" class="text-lg font-semibold text-gray-700 mb-2">Gender</label>
                <select id="gender" name="gender" class="p-2 border border-gray-300 rounded-md">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="phoneNumber" class="text-lg font-semibold text-gray-700 mb-2">Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" class="p-2 border border-gray-300 rounded-md" placeholder="Enter your phone number">
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-lg font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" class="p-2 border border-gray-300 rounded-md" placeholder="Enter your email">
            </div>
            <div class="flex flex-col">
                <label for="address" class="text-lg font-semibold text-gray-700 mb-2">Address</label>
                <input type="text" id="address" name="address" class="p-2 border border-gray-300 rounded-md" placeholder="Enter your address">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-white hover:text-blue-500 border border-blue-500 font-semibold">Update Profile</button>
        </form>
    </div>
    
    @endsection
</body>

</html>
