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
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6">Channeling Management</h1>

        <div class="mt-8 mx-5">
            <!-- Channeling Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Doctor Name</th>
                            <th class="px-4 py-2 border">Channel Name</th>
                            <th class="px-4 py-2 border">Start Time</th>
                            <th class="px-4 py-2 border">End Time</th>
                            <th class="px-4 py-2 border">Average Time</th>
                            <th class="px-4 py-2 border">Days</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($channels as $channel)
                            <tr>
                                <td class="px-4 py-2 border">{{ $channel->doctor->name }}</td>
                                <td class="px-4 py-2 border">{{ $channel->channel_name }}</td>
                                <td class="px-4 py-2 border">{{ $channel->start_time }}</td>
                                <td class="px-4 py-2 border">{{ $channel->end_time }}</td>
                                <td class="px-4 py-2 border">{{ $channel->avg_time }}</td>

                                <!-- Display selected days in a user-friendly way -->
                                <td class="px-4 py-2 border">
                                    @php
                                        $days = [];
                                        if ($channel->sunday) {
                                            $days[] = 'Sun';
                                        }
                                        if ($channel->monday) {
                                            $days[] = 'Mon';
                                        }
                                        if ($channel->tuesday) {
                                            $days[] = 'Tue';
                                        }
                                        if ($channel->wednesday) {
                                            $days[] = 'Wed';
                                        }
                                        if ($channel->thursday) {
                                            $days[] = 'Thu';
                                        }
                                        if ($channel->friday) {
                                            $days[] = 'Fri';
                                        }
                                        if ($channel->saturday) {
                                            $days[] = 'Sat';
                                        }
                                    @endphp
                                    {{ implode(', ', $days) }}
                                </td>

                                <td class="px-4 py-2 border">
                                    <!-- Edit button with onclick event to open modal with data -->
                                    <button onclick="openEditModal({{ json_encode($channel) }})"
                                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                        Edit
                                    </button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-2 border text-center text-gray-500">
                                    No channels available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Popup Modal -->
                <div id="channelingModal"
                    class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex justify-center items-center z-50">
                    <!-- Modal Content -->
                    <div class="bg-white rounded-lg w-1/3 p-6">
                        <h2 class="text-xl font-bold mb-4">Edit Channeling Details</h2>

                        <!-- Form Fields -->
                        <form action="#" method="POST" id="channelingForm">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="mb-4">
                                <label class="block text-gray-700">Channel Category</label>
                                <select name="channelCategory" id="channelCategory" class="w-full px-4 py-2 border rounded"
                                    required>
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
                                <input type="time" name="startTime" id="startTime"
                                    class="w-full px-4 py-2 border rounded" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">End Time</label>
                                <input type="time" name="endTime" id="endTime" class="w-full px-4 py-2 border rounded"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">Average Time (minutes)</label>
                                <input type="number" name="avgTime" id="avgTime" class="w-full px-4 py-2 border rounded"
                                    required>
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

                <script>
                    function openEditModal(channel) {
                        // Show modal
                        document.getElementById('channelingModal').classList.remove('hidden');

                        // Populate form fields with channel data
                        document.getElementById('id').value = channel.id;
                        const categorySelect = document.getElementById('channelCategory');
                        categorySelect.value = channel.channel_category || "";
                        document.getElementById('startTime').value = channel.start_time;
                        document.getElementById('endTime').value = channel.end_time;
                        document.getElementById('avgTime').value = channel.avg_time;

                        // Populate selected days
                        const selectedDaysInput = document.getElementById('selectedDays');
                        const selectedDays = [];

                        document.querySelectorAll('.day-button').forEach(button => {
                            const day = button.getAttribute('data-day');
                            if (channel[day]) {
                                button.classList.add('bg-green-500', 'text-white');
                                selectedDays.push(day);
                            } else {
                                button.classList.remove('bg-green-500', 'text-white');
                            }
                        });

                        selectedDaysInput.value = selectedDays.join(',');
                    }

                    function closeModal() {
                        document.getElementById('channelingModal').classList.add('hidden');
                    }

                    // Toggle day selection and update the hidden input
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
                        color: white;
                    }
                </style>

            </div>
        </div>
    @endsection

</body>

</html>
