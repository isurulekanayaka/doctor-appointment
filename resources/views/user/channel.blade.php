<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @vite('resources/css/app.css')
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
        <div class="container mx-auto mb-10">
            <div class="">
                <h1 class="text-5xl text-green-500 font-bold mb-10 text-center mt-10">Find Your Doctor</h1>
                <div class="md:h-32 border md:flex bg-blue-50 rounded-2xl border-blue-100 p-4 gap-5">
                    <div class="flex items-center md:w-1/5 mt-5 md:mt-0 text-center md:text-left">
                        <img src="{{ asset('icon/doctor.png') }}" class="w-6 h-6 text-blue-500" alt="Doctor Icon">
                        <input type="text" placeholder="Doctor Name"
                            class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none" />
                    </div>
                    <div class="flex items-center md:w-1/5 mt-5 md:mt-0 text-center md:text-left">
                        <img src="{{ asset('icon/hospital.png') }}" class="w-6 h-6 text-blue-500" alt="Hospital Icon">
                        <select class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none">
                            <option value="" disabled selected>Any Hospital</option>
                            <option value="hospital1">Hospital 1</option>
                            <option value="hospital2">Hospital 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="flex items-center md:w-1/5 mt-5 md:mt-0 text-center md:text-left">
                        <img src="{{ asset('icon/Specialization.png') }}" class="w-6 h-6 text-blue-500"
                            alt="Specialization Icon">
                        <select class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none">
                            <option value="" disabled selected>Any Specialization</option>
                            <option value="specialization1">Specialization 1</option>
                            <option value="specialization2">Specialization 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="flex items-center md:w-1/5 mt-5 md:mt-0 text-center md:text-left">
                        <img src="{{ asset('icon/calendar.png') }}" class="w-6 h-6 text-blue-500" alt="calendar Icon">
                        <input type="text" id="datepicker" placeholder="Select Date"
                            class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none" />
                    </div>
                
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            flatpickr("#datepicker", {
                                dateFormat: "Y-m-d", // You can customize the date format here
                            });
                        });
                    </script>
                    <div class="flex items-center md:w-1/5 mt-5 md:mt-0 text-center md:text-left">
                        <button
                            class="flex items-center justify-center text-lg px-5 text-center font-bold text-white bg-blue-500 border border-blue-500 rounded-xl h-12 hover:text-blue-500 hover:bg-white mt-8">Search</button>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 grid-rows mt-10 gap-5">
                    {{-- To do foreach --}}
                    <div class="border border-green-100 bg-green-50 rounded-lg p-4">
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <img src="{{ asset('images/doc-tmp.jpeg') }}" alt="Doctor's Photo"
                                    class="w-24 h-auto rounded-full">
                            </div>
                            <div>
                                <div class="flex items-center mb-2">
                                    <label class="font-semibold mr-2">Doctor Name:</label>
                                    <p class="text-gray-700">John</p>
                                </div>
                                <div class="flex items-center mb-2">
                                    <label class="font-semibold mr-2">Specialization:</label>
                                    <p class="text-gray-700">Psychology</p>
                                </div>
                                <div class="flex items-center">
                                    <label class="font-semibold mr-2">Hospital:</label>
                                    <p class="text-gray-700">Base Hospital Colombo</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, velit
                                porro optio earum cupiditate aliquam? Illum ullam sunt, iusto distinctio possimus nobis
                                porro numquam error voluptatibus nostrum ad quis illo.</p>
                        </div>
                        <div class="flex gap-5 mt-1">
                            <button
                                class="text-base px-2 text-center font-semibold border border-blue-500 rounded-xl h-12 text-blue-500 bg-white w-32"
                                onclick="openModal('John', 'Psychology', 'Base Hospital Colombo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, velit porro optio earum cupiditate aliquam? Illum ullam sunt, iusto distinctio possimus nobis porro numquam error voluptatibus nostrum ad quis illo.')">Details</button>
                            <button
                                class="text-base px-2 text-center font-semibold text-white bg-blue-500 border border-blue-500 rounded-xl h-12 hover:text-blue-500 hover:bg-white w-32">Appointment</button>
                        </div>
                    </div>
                    {{-- end foreach --}}
                </div>

                <!-- Modal -->
                <div id="detailsModal"
                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
                    <div class="bg-white rounded-lg p-8 w-1/3">
                        <h2 class="text-xl font-bold mb-4">Doctor Details</h2>
                        <div id="modalContent">
                            <!-- Details will be injected here -->
                        </div>
                        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                            onclick="closeModal()">Close</button>
                    </div>
                </div>


            </div>
        </div>
    @endsection
    <script>
        function openModal(name, specialization, hospital, description) {
            document.getElementById('modalContent').innerHTML = `
                <p><strong>Doctor Name:</strong> ${name}</p>
                <p><strong>Specialization:</strong> ${specialization}</p>
                <p><strong>Hospital:</strong> ${hospital}</p>
                <p><strong>Description:</strong> ${description}</p>
            `;
            document.getElementById('detailsModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('detailsModal').classList.add('hidden');
        }
    </script>

</body>

</html>
