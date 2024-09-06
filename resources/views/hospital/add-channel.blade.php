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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6 ">Add Channel</h1>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="w-1/3 bg-white p-8 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-4 text-center">Doctor Details</h2>
                    <form action="{{ route('hospital.addChannel') }}" method="POST">
                        @csrf <!-- Add CSRF token for security in Laravel -->

                        <div class="mb-4">
                            <label for="doctor" class="block text-sm font-medium text-gray-700">Select Doctor</label>
                            <select name="doctor_hospital_id" id="doctor"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-1 border">
                                <option value="" selected disabled>Select Doctor</option>
                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}">
                                        {{ $channel->doctor->doctor_id }} - {{ $channel->doctor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" name="date" id="date"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm  p-1 border" required>
                        </div>

                        <div class="mb-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="time" name="start_time" id="start_time"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm  p-1 border" required>
                        </div>

                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="time" name="end_time" id="end_time"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm  p-1 border" required>
                        </div>

                        <div class="mb-4">
                            <label for="patient_channel_time_avg" class="block text-sm font-medium text-gray-700">Patient
                                Channel Time Avg (minutes)</label>
                            <input type="number" name="patient_channel_time_avg" id="patient_channel_time_avg"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm  p-1 border" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price (RS)</label>
                            <input type="number" step="0.01" name="price" id="price"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm  p-1 border" required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
