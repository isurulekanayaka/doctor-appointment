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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Add Doctor</h1>

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
                        <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                </div>
                <div class="max-w-4xl bg-white p-8 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-4 text-center">Doctor Details</h2>
                    <form action="{{route('addDoctor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" id="id"
                            value="{{ isset($doctor) ? $doctor->id : old('id') }}" hidden>

                        <div class="grid grid-cols-2 gap-6">

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text" name="name" id="name"
                                    value="{{ isset($doctor) ? $doctor->name : old('name') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter doctor's name" required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input type="email" name="email" id="email"
                                    value="{{ isset($doctor) ? $doctor->email : old('email') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter doctor's email address" required>
                            </div>

                            <div class="mb-4">
                                <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact
                                    Number:</label>
                                <input type="text" name="contact" id="contact"
                                    value="{{ isset($doctor) ? $doctor->contact : old('contact') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter doctor's contact number" required>
                            </div>

                            <div class="mb-4">
                                <label for="specialty" class="block text-gray-700 text-sm font-bold mb-2">Specialty:</label>
                                <input type="text" name="specialty" id="specialty"
                                    value="{{ isset($doctor) ? $doctor->specialty : old('specialty') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter doctor's specialty" required>
                            </div>

                            <div class="mb-4">
                                <label for="qualifications"
                                    class="block text-gray-700 text-sm font-bold mb-2">Qualifications:</label>
                                <textarea name="qualifications" id="qualifications" rows="3"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter doctor's qualifications" required>{{ isset($doctor) ? $doctor->qualifications : old('qualifications') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                                <textarea name="address" id="address" rows="3"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter doctor's address" required>{{ isset($doctor) ? $doctor->address : old('address') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">Years of
                                    Experience:</label>
                                <input type="number" name="experience" id="experience"
                                    value="{{ isset($doctor) ? $doctor->experience : old('experience') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter years of experience" required>
                            </div>

                            <div class="mb-4">
                                <label for="profile_image" class="block text-gray-700 text-sm font-bold mb-2">Profile
                                    Image:</label>
                                <input type="file" name="profile_image" id="profile_image"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>

                        </div>

                        <div class="flex items-center mt-6 justify-center">
                            <button type="submit"
                                class="bg-blue-500 px-16 text-white font-bold border border-blue-500 hover:bg-transparent hover:text-blue-500 text-xl py-3 rounded-lg">
                                Add Doctor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
