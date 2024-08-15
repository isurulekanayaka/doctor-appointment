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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6 ">Admin Dashboard</h1>
        <div class="mt-12">
            <div class="md:flex-row flex-col flex w-full">
                <!-- Hospitals Card -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md md:w-1/3 mx-5 my-5 md:my-0">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <img src="{{ asset('icon/hospital-white.png') }}" class="w-8 h-8 text-blue-500" alt="hospital Icon">
                    </div>
                    <div class="p-6 text-right">
                        <p class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600">All
                            Hospitals</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-snug text-blue-gray-900">
                            {{ $hospitalCount }}</h4>
                        <p
                            class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600 mt-4 mb-20">
                            Manage and monitor all registered hospitals in the system.</p>
                        <div class="absolute bottom-5 right-5">
                            <a href="{{ route('admin.hospital') }}" class="">
                                <button
                                    class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                    Hospitals
                                </button>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Doctors Card -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md md:w-1/3 mx-5 my-5 md:my-0">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <img src="{{ asset('icon/doctor-white.png') }}" class="w-8 h-8 text-blue-500" alt="hospital Icon">
                    </div>
                    <div class="p-6 text-right">
                        <p class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600">All
                            Doctors</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-snug text-blue-gray-900">
                            {{ $doctorCount }}</h4>
                        <p
                            class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600 mt-4 mb-20">
                            View and manage doctor profiles and their specializations.</p>
                        <div class="absolute bottom-5 right-5">
                            <a href="{{ route('admin.doctor') }}" class="">
                                <button
                                    class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                    Doctors
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md md:w-1/3 mx-5 my-5 md:my-0">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                            class="w-8 h-8 text-white">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="p-6 text-right ">
                        <p class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600">All
                            Users</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-snug text-blue-gray-900">
                            {{ $userCount }}</h4>
                        <p
                            class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600 mt-4 mb-20">
                            Oversee all user accounts, including patients and staff.</p>
                        <div class="absolute bottom-5 right-5">
                            <a href="{{ route('admin.user') }}" class="">
                                <button
                                    class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                    Users
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- User Reviews Section -->
        {{-- <div class="mt-12 mx-5">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full">
                <div
                    class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="w-8 h-8 text-white">
                        <path fill-rule="evenodd"
                            d="M12 2a10 10 0 100 20 10 10 0 000-20zM8.293 12.293a1 1 0 011.414 0L11 13.586V9a1 1 0 112 0v4.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="p-6 text-right">
                    <p class="block antialiased font-sans text-lg leading-normal font-normal text-blue-gray-600">User
                        Reviews</p>
                    <h4
                        class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-snug text-blue-gray-900">
                        1,250
                    </h4>
                </div>
                <div class="p-6">
                    <h5 class="text-lg font-semibold text-blue-gray-700 mb-4">Latest Reviews View</h5>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border">User</th>
                                    <th class="px-4 py-2 border">Review</th>
                                    <th class="px-4 py-2 border">Rating</th>
                                    <th class="px-4 py-2 border">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">John Doe</td>
                                    <td class="px-4 py-2 border">Great service!</td>
                                    <td class="px-4 py-2 border">5 stars</td>
                                    <td class="px-4 py-2 border">2024-08-12</td>
                                </tr>
                                <!-- Additional rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection

</body>

</html>
