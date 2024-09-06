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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Add Doctor</h1>
        <form action="{{ route('hospital.searchnewdoctor') }}" method="POST">
            @csrf
            <div class="flex justify-end items-center mt-12 mx-5 gap-3">
                <div>
                    <input type="text" name="name" class="py-2 border border-black rounded px-2" placeholder="Search by name" value="{{ request('name') }}">
                </div>
                <div>
                    <input type="text" name="doctor_id" class="py-2 border border-black rounded px-2" placeholder="Search by doctor id" value="{{ request('doctor_id') }}">
                </div>
                <div>
                    <button type="submit" class="bg-green-500 px-4 py-2 rounded hover:bg-green-600 border border-green-500">Search</button>
                </div>
            </div>
        </form>
        <div class="container mt-10 ">
            <div class="mt-8 w-full mx-5">
                <!-- Doctors Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Doctor ID</th>
                                <th class="px-4 py-2 border">Doctor Name</th>
                                <th class="px-4 py-2 border">Specialization</th>
                                <th class="px-4 py-2 border">Contact Number</th>
                                <th class="px-4 py-2 border">Email Address</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $doctor->doctor_id }}</td>
                                    <td class="px-4 py-2 border">{{ $doctor->name }}</td>
                                    <td class="px-4 py-2 border">{{ $doctor->specialty }}</td>
                                    <td class="px-4 py-2 border">{{ $doctor->contact }}</td>
                                    <td class="px-4 py-2 border">{{ $doctor->email }}</td>
                                    <td class="px-4 py-2 border justify-center flex">
                                        <a href="{{ route('hospital.newdoctorAddHospital', ['doctor_id' => $doctor->id]) }}">
                                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                                Add
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-2 border text-center">
                                        No doctors found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
