<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body class="text-gray-800 font-inter">

    @extends('layout.hospital-layout')

    @section('hospital-content')
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6 ">Hospital Dashboard</h1>
        <div class="mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 w-full">
                <!-- Appointment Card -->
                <div class="relative flex flex-col bg-white rounded-xl shadow-md text-gray-700 px-5 py-5 mx-5">
                    <div class="absolute -mt-4 mx-4 h-16 w-16 bg-gradient-to-tr from-blue-600 to-blue-400 rounded-xl shadow-blue-500/40 shadow-lg grid place-items-center">
                        <img src="{{ asset('icon/appointment-white.png') }}" class="w-8 h-8 text-blue-500" alt="Appointment Icon">
                    </div>
                    <div class="p-6 text-right">
                        <div class="mb-10">
                            <p class="text-lg font-normal text-blue-gray-600">All Appointments</p>
                            <h4 class="text-4xl font-semibold text-blue-gray-900">2,300</h4>
                            <p class="text-lg font-normal text-blue-gray-600 mt-4 mb-20">
                                Manage and monitor all registered appointments in the system.
                            </p>
                        </div>
            
                        <div class="absolute bottom-5 right-3 mt-2">
                            <a href="" class="text-lg text-blue-500 hover:underline mt-4 inline-block">View
                                Details</a>
                            <button class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                Appointments</button>
                        </div>
                    </div>
                </div>
            
                <!-- Doctors Card -->
                <div class="relative flex flex-col bg-white rounded-xl shadow-md text-gray-700 px-5 py-5 mr-5">
                    <div class="absolute -mt-4 mx-4 h-16 w-16 bg-gradient-to-tr from-blue-600 to-blue-400 rounded-xl shadow-blue-500/40 shadow-lg grid place-items-center">
                        <img src="{{ asset('icon/doctor-white.png') }}" class="w-8 h-8 text-blue-500" alt="Doctor Icon">
                    </div>
                    <div class="p-6 text-right">
                        <p class="text-lg font-normal text-blue-gray-600">All Doctors</p>
                        <h4 class="text-4xl font-semibold text-blue-gray-900">5,500</h4>
                        <p class="text-lg font-normal text-blue-gray-600 mt-4 mb-20">
                            View and manage doctor profiles and their specializations.
                        </p>
                        <div class="absolute bottom-5 right-3 mt-2">
                            <a href="" class="text-lg text-blue-500 hover:underline mt-4 inline-block">View
                                Details</a>
                            <button class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                Doctors</button>
                        </div>
                    </div>
                </div>
            
                <!-- Users Card -->
                <div class="relative flex flex-col bg-white rounded-xl shadow-md text-gray-700 px-5 py-5 mx-5">
                    <div class="absolute -mt-4 mx-4 h-16 w-16 bg-gradient-to-tr from-blue-600 to-blue-400 rounded-xl shadow-blue-500/40 shadow-lg grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-8 h-8 text-white">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="p-6 text-right">
                        <p class="text-lg font-normal text-blue-gray-600">All Users</p>
                        <h4 class="text-4xl font-semibold text-blue-gray-900">10,200</h4>
                        <p class="text-lg font-normal text-blue-gray-600 mt-4 mb-20">
                            Oversee all user accounts, including patients and staff.
                        </p>
                        <div class="absolute bottom-5 right-3 mt-2">
                            <a href="" class="text-lg text-blue-500 hover:underline mt-4 inline-block">View
                                Details</a>
                            <button class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                Users</button>
                        </div>
                    </div>
                </div>
            
                <!-- Payments Card -->
                <div class="relative flex flex-col bg-white rounded-xl shadow-md text-gray-700 px-5 py-5 mr-5">
                    <div class="absolute -mt-4 mx-4 h-16 w-16 bg-gradient-to-tr from-blue-600 to-blue-400 rounded-xl shadow-blue-500/40 shadow-lg grid place-items-center">
                        <img src="{{ asset('icon/payment-white.png') }}" class="w-8 h-8 text-blue-500" alt="Payment Icon">
                    </div>
                    <div class="p-6 text-right">
                        <p class="text-lg font-normal text-blue-gray-600">All Payments</p>
                        <h4 class="text-4xl font-semibold text-blue-gray-900">10,200</h4>
                        <p class="text-lg font-normal text-blue-gray-600 mt-4 mb-20">
                            Manage and monitor all payments made through the system.
                        </p>
                        <div class="absolute bottom-5 right-3 mt-2">
                            <a href="" class="text-lg text-blue-500 hover:underline mt-4 inline-block">View
                                Details</a>
                            <button class="mt-4 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">Manage
                                Payments</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    @endsection

</body>

</html>
