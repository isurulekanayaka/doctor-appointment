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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">User Dashboard</h1>

        <div class="flex justify-between items-center mt-12 mx-5">
            <!-- Add User Button -->
            <a href="{{ route('admin.addUser') }}"><button
                    class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">
                    Add User
                </button></a>
        </div>

        <div class="mt-8 mx-5">
            <!-- Users Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">User Name</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Contact</th>
                            <th class="px-4 py-2 border">Role</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 border">{{ $user->name }}</td>
                                <td class="px-4 py-2 border">{{ $user->email }}</td>
                                <td class="px-4 py-2 border">{{ $user->contact }}</td>
                                <td class="px-4 py-2 border">{{ $user->type }}</td>
                                <td class="px-4 py-2 border">
                                    <!-- Edit Button -->
                                    <form action="{{ route('updateuser') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit"
                                            class="border border-green-500 px-4 py-2 rounded hover:bg-green-600">
                                            Edit
                                        </button>
                                    </form>

                                    <!-- Delete Button -->
                                    <form action="{{ route('deleteuser') }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
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
