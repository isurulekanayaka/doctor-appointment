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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Hospital Dashboard</h1>

        <div class="flex justify-between items-center mt-12  mx-5">
            <!-- Add Hospital Button -->
            <div>
                <a href="{{ route('admin.addhospital') }}"><button
                        class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">
                        Add Hospital
                    </button></a>
            </div>
            <div>
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
            </div>

        </div>

        <div class="mt-8 mx-5">
            <!-- Hospitals Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Hospital Name</th>
                            <th class="px-4 py-2 border">Location</th>
                            <th class="px-4 py-2 border">Contact Number</th>
                            <th class="px-4 py-2 border">Number of Beds</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospital as $hospital)
                            <tr>
                                <td class="px-4 py-2 border">{{ $hospital->name }}</td>
                                <td class="px-4 py-2 border">{{ $hospital->address }}</td>
                                <td class="px-4 py-2 border">{{ $hospital->contact }}</td>
                                <td class="px-4 py-2 border">{{ $hospital->email }}</td>
                                <td class="px-4 py-2 border">
                                    <!-- Edit Button -->
                                    <form action="{{ route('updatehospital') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $hospital->id }}">
                                        <button type="submit"
                                            class="border border-green-500 px-4 py-2 rounded hover:bg-green-600">
                                            Edit
                                        </button>
                                    </form>

                                    <!-- Delete Button -->
                                    <form action="{{ route('deletehospital') }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $hospital->id }}">
                                        <button type="submit"
                                            class="border border-red-500 px-4 py-2 rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        <!-- Additional rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

</body>

</html>
