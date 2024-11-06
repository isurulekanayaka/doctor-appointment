<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .day-button {
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .day-button:hover {
            background-color: #e0e0e0;
        }

        .day-button.bg-green-500 {
            background-color: #38a169;
            /* Tailwind CSS Green */
            color: white;
        }
    </style>
</head>

<body class="text-gray-800 font-inter">

    @extends('layout.hospital-layout')

    @section('hospital-content')
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Add Doctor</h1>
        <form action="{{ route('hospital.searchnewdoctor') }}" method="POST">
            @csrf
            <div class="flex justify-end items-center mt-12 mx-5 gap-3">
                <div>
                    <input type="text" name="name" class="py-2 border border-black rounded px-2"
                        placeholder="Search by name" value="{{ request('name') }}">
                </div>
                <div>
                    <input type="text" name="doctor_id" class="py-2 border border-black rounded px-2"
                        placeholder="Search by doctor id" value="{{ request('doctor_id') }}">
                </div>
                <div>
                    <button type="submit"
                        class="bg-green-500 px-4 py-2 rounded hover:bg-green-600 border border-green-500">Search</button>
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
                                        <button onclick="openModal({{ $doctor->id }})"
                                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                            Add
                                        </button>
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

        {{-- start popup --}}
        <!-- Modal Background -->
        <div id="channelingModal"
            class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex justify-center items-center z-50">
            <!-- Modal Content -->
            <div class="bg-white rounded-lg w-1/3 p-6">
                <h2 class="text-xl font-bold mb-4">Add Channeling Details</h2>

                <!-- Form Fields -->
                <form action="{{ route('hospital.newdoctorAddHospital') }}" method="POST" id="channelingForm">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="id" id="id" readonly hidden>
                        <label class="block text-gray-700">Channel Category</label>
                        <select name="channelCategory" class="w-full px-4 py-2 border rounded" required>
                            <option value="">Select a category</option>
                            <option value="General Consultation">General Consultation</option>
                            <option value="Specialized Consultation">Specialized Consultation</option>
                            <option value="Emergency Service">Emergency Service</option>
                            <option value="Telemedicine">Telemedicine</option>
                            <option value="Pediatrics">Pediatrics</option>
                            <option value="Orthopedics">Orthopedics</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Oncology">Oncology</option>
                            <option value="Psychiatry">Psychiatry</option>
                            <option value="Gynecology">Gynecology</option>
                            <option value="Dental Care">Dental Care</option>
                            <option value="Physical Therapy">Physical Therapy</option>
                            <option value="Radiology">Radiology</option>
                            <option value="Laboratory Services">Laboratory Services</option>
                            <option value="Nutritional Counseling">Nutritional Counseling</option>
                            <option value="Occupational Health">Occupational Health</option>
                            <option value="Rehabilitation Services">Rehabilitation Services</option>
                            <option value="Mental Health Counseling">Mental Health Counseling</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Start Time</label>
                        <input type="time" name="startTime" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">End Time</label>
                        <input type="time" name="endTime" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Average Time (minutes)</label>
                        <input type="number" name="avgTime" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Days of the Week -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Available Days</label>
                        <div class="grid grid-cols-7 gap-2 mt-2">
                            <button type="button" class="day-button" data-day="sunday">Sun</button>
                            <button type="button" class="day-button" data-day="monday">Mon</button>
                            <button type="button" class="day-button" data-day="tuesday">Tue</button>
                            <button type="button" class="day-button" data-day="wednesday">Wed</button>
                            <button type="button" class="day-button" data-day="thursday">Thu</button>
                            <button type="button" class="day-button" data-day="friday">Fri</button>
                            <button type="button" class="day-button" data-day="saturday">Sat</button>
                        </div>
                        <input type="hidden" name="days[]" id="selectedDays" value="">
                    </div>

                    <!-- Modal Buttons -->
                    <div class="flex justify-end gap-5">
                        <button type="button" onclick="closeModal()"
                            class="text-red-500 px-4 py-2 rounded mr-2 border border-red-600">
                            Cancel
                        </button>
                        <button type="submit"
                            class="border border-green-500 text-green-500 px-4 py-2 rounded hover:text-green-500">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- end popup --}}
        <script>
            // JavaScript for opening and closing the modal
            function openModal(id) {
                document.getElementById('channelingModal').classList.remove('hidden');
                document.getElementById('id').value = id;
            }

            function closeModal() {
                document.getElementById('channelingModal').classList.add('hidden');
            }
        </script>
        {{-- calender start --}}
        <script>
            const dayButtons = document.querySelectorAll('.day-button');
            const selectedDaysInput = document.getElementById('selectedDays');
            let selectedDays = [];

            dayButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const day = button.getAttribute('data-day');

                    // Toggle selected class
                    button.classList.toggle('bg-green-500');
                    button.classList.toggle('text-white');

                    // Add or remove the day from the selectedDays array
                    if (selectedDays.includes(day)) {
                        selectedDays = selectedDays.filter(d => d !== day);
                    } else {
                        selectedDays.push(day);
                    }

                    // Update the hidden input with the selected days
                    selectedDaysInput.value = selectedDays.join(',');
                });
            });
        </script>
        {{-- calender end --}}
    @endsection

</body>

</html>
