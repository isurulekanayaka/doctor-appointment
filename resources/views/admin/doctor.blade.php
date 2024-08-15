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
    <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Doctor Dashboard</h1>

    <div class="flex justify-between items-center mt-12 mx-5">
        <!-- Add Doctor Button -->
        <a href="{{route('admin.addDoctor')}}"><button class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">
            Add Doctor
        </button></a>
    </div>
    
    <div class="mt-8 mx-5">
        <!-- Doctors Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">Name</th>
                        <th class="py-2 px-4 border">Email</th>
                        <th class="py-2 px-4 border">Contact</th>
                        <th class="py-2 px-4 border">Specialty</th>
                        {{-- <th class="py-2 px-4 border">Experience</th> --}}
                        {{-- <th class="py-2 px-4 border">Address</th> --}}
                        {{-- <th class="py-2 px-4 border">Profile Image</th> --}}
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($doctors as $doctor)
                        <tr>
                            <td class="py-2 px-4 border">{{ $doctor->name }}</td>
                            <td class="py-2 px-4 border">{{ $doctor->email }}</td>
                            <td class="py-2 px-4 border">{{ $doctor->contact }}</td>
                            <td class="py-2 px-4 border">{{ $doctor->specialty }}</td>
                            {{-- <td class="py-2 px-4 border">{{ $doctor->experience }}</td>
                            <td class="py-2 px-4 border">{{ $doctor->address }}</td>
                            <td class="py-2 px-4 border">
                                @if($doctor->profile_image)
                                    <img src="{{ asset('profile/' . $doctor->profile_image) }}" alt="Profile Image" class="w-16 h-16 object-cover">
                                @else
                                    No Image
                                @endif
                            </td> --}}
                            <td class="px-4 py-2 border">
                                <!-- Edit Button -->
                                <form action="{{route('updatedoctor')}}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                                    <button type="submit"
                                        class="border border-green-500 px-4 py-2 rounded hover:bg-green-600">
                                        Edit
                                    </button>
                                </form>

                                <!-- Delete Button -->
                                <form action="{{route('deletedoctor')}}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                                    <button type="submit"
                                        class="border border-red-500 px-4 py-2 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-2 px-4 text-center">No doctors found</td>
                        </tr>
                    @endforelse
                </tbody>
                {{-- <thead>
                    <tr>
                        <th class="px-4 py-2 border">Doctor Name</th>
                        <th class="px-4 py-2 border">Specialty</th>
                        <th class="px-4 py-2 border">Contact Number</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border">Dr. John Doe</td>
                        <td class="px-4 py-2 border">Cardiology</td>
                        <td class="px-4 py-2 border">(123) 456-7890</td>
                        <td class="px-4 py-2 border">General Hospital</td>
                        <td class="px-4 py-2 border">
                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                Edit
                            </button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Additional rows here -->
                </tbody> --}}
            </table>
        </div>
    </div>
    
    @endsection

</body>

</html>
