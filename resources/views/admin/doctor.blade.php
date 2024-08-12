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
        <button class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">
            Add Doctor
        </button>
    </div>
    
    <div class="mt-8 mx-5">
        <!-- Doctors Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Doctor Name</th>
                        <th class="px-4 py-2 border">Specialty</th>
                        <th class="px-4 py-2 border">Contact Number</th>
                        <th class="px-4 py-2 border">Associated Hospital</th>
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
                </tbody>
            </table>
        </div>
    </div>
    
    @endsection

</body>

</html>
