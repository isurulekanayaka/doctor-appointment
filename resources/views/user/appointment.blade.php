<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .day {
            background-color: #f0f0f0;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
        }

        .today {
            background-color: #d1fae5;
        }

        .day:hover {
            background-color: #bae6fd;
            cursor: pointer;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .weekday {
            font-weight: bold;
            text-align: center;
            padding: 5px 0;
        }

        .selected {
            background-color: #a5b4fc;
            /* Example color for selected day */
            color: white;
        }
    </style>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
        <div class="container mx-auto mb-10">
            <div class="mb-20">
                <h1 class="text-5xl text-green-500 font-bold mb-10 text-center mt-10">Book Doctor Appointment</h1>
            </div>

            <div class="block w-full md:space-x-4 md:flex gap-5">
                <!-- Calendar Section -->
                <div class="md:w-1/3 bg-white p-4 shadow-lg rounded-lg w-full">
                    <div class="calendar-header">
                        <button id="prev-month" class="bg-gray-300 px-4 py-2 rounded">Prev</button>
                        <h2 id="calendar-title" class="text-2xl font-semibold text-center">Loading...</h2>
                        <button id="next-month" class="bg-gray-300 px-4 py-2 rounded">Next</button>
                    </div>
                    <!-- Weekdays Header -->
                    <div id="weekday-header" class="calendar"></div>
                    <!-- Calendar Days -->
                    <div id="calendar" class="calendar"></div>
                </div>

                <!-- Time Schedule Section -->
                <div class="md:w-2/3 bg-white p-4 shadow-lg rounded-lg w-full">
                    <h2 class="text-2xl font-semibold text-center mb-4">Time Schedule</h2>
                    <!-- Time Slots -->
                    <div id="time-slots" class="space-y-2">
                        <!-- Example Time Slots -->
                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-lg">
                            <span>08:00 AM - 09:00 AM</span>
                            <button class="bg-blue-500 text-white px-4 py-1 rounded">Book</button>
                        </div>
                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-lg">
                            <span>09:00 AM - 10:00 AM</span>
                            <button class="bg-blue-500 text-white px-4 py-1 rounded">Book</button>
                        </div>
                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-lg">
                            <span>10:00 AM - 11:00 AM</span>
                            <button class="bg-blue-500 text-white px-4 py-1 rounded">Book</button>
                        </div>
                        <!-- Continue for more time slots -->
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 shadow-lg rounded-lg mb-6 mt-20">
                <h2 class="text-5xl text-green-500 font-bold text-center mb-10">Personal Information</h2>
                <form id="appointment-form" class="space-y-4">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <div class="flex flex-col w-1/2">
                                <label for="appointment-date" class="font-semibold mb-1">Select Date</label>
                                <input type="text" id="appointment-date" name="appointment_date"
                                    class="p-2 border border-gray-300 rounded" placeholder="Select your appointment date">
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="appointment-time" class="font-semibold mb-1">Select Time</label>
                                <input type="text" id="appointment-time" name="appointment_time"
                                    class="p-2 border border-gray-300 rounded" placeholder="Select your appointment time">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="name" class="font-semibold mb-1">Full Name</label>
                        <input type="text" id="name" name="name" class="p-2 border border-gray-300 rounded"
                            placeholder="Enter your full name">
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="font-semibold mb-1">Email Address</label>
                        <input type="email" id="email" name="email" class="p-2 border border-gray-300 rounded"
                            placeholder="Enter your email address">
                    </div>
                    <div class="flex flex-col">
                        <label for="phone" class="font-semibold mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="p-2 border border-gray-300 rounded"
                            placeholder="Enter your phone number">
                    </div>
                    <div class="flex flex-col">
                        <label for="reason" class="font-semibold mb-1">Reason for Appointment</label>
                        <textarea id="reason" name="reason" class="p-2 border border-gray-300 rounded"
                            placeholder="Briefly describe the reason for your visit" rows="4"></textarea>
                    </div>
                    {{-- <a href="{{ route('user.payment') }}">
                        <button type="submit"
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-white hover:text-blue-500 border border-blue-500 font-semibold">Submit</button>
                    </a> --}}
                </form>
                <a href="{{ route('user.payment') }}">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-white hover:text-blue-500 border border-blue-500 font-semibold">Submit</button>
                </a>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const calendarEl = document.getElementById('calendar');
                const titleEl = document.getElementById('calendar-title');
                const prevMonthBtn = document.getElementById('prev-month');
                const nextMonthBtn = document.getElementById('next-month');
                const weekdayHeaderEl = document.getElementById('weekday-header');
                const timeSlots = document.getElementById('time-slots');

                let currentMonth = new Date().getMonth();
                let currentYear = new Date().getFullYear();
                let selectedDay = null; // Track the currently selected day
                const today = new Date();

                function renderCalendar(month, year) {
                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();
                    const todayDate = today.getDate();
                    const todayMonth = today.getMonth();
                    const todayYear = today.getFullYear();

                    let daysHTML = '';
                    let weekdaysHTML = '';

                    // Create weekdays header
                    const weekdays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    weekdays.forEach(day => {
                        weekdaysHTML += `<div class="weekday">${day}</div>`;
                    });

                    // Add empty days at the beginning of the calendar grid
                    for (let i = 0; i < (firstDay === 0 ? 6 : firstDay - 1); i++) {
                        daysHTML += `<div class="day"></div>`;
                    }

                    // Add days in the month
                    for (let i = 1; i <= lastDate; i++) {
                        const dayClass = (i === todayDate && month === todayMonth && year === todayYear) ? 'day today' :
                            'day';
                        const selectedClass = (selectedDay === i && month === currentMonth && year === currentYear) ?
                            'selected' : '';
                        daysHTML += `<div class="day ${selectedClass}" data-day="${i}">${i}</div>`;
                    }

                    // Add empty days at the end of the calendar grid
                    const totalDays = (firstDay === 0 ? 6 : firstDay - 1) + lastDate;
                    for (let i = totalDays; i < 42; i++) {
                        daysHTML += `<div class="day"></div>`;
                    }

                    weekdayHeaderEl.innerHTML = weekdaysHTML;
                    calendarEl.innerHTML = daysHTML;
                    titleEl.textContent = `${getMonthName(month)} ${year}`;
                }

                function getMonthName(month) {
                    return new Date(currentYear, month).toLocaleString('default', {
                        month: 'long'
                    });
                }

                function selectDate(day) {
                    const selectedDate = new Date(currentYear, currentMonth, day);
                    // TO DO Call backend
                    // alert('Selected Date: ' + selectedDate.toDateString());
                    updateTimeSlots(selectedDate.toDateString());
                    selectedDay = day; // Update the selected day
                    renderCalendar(currentMonth, currentYear); // Re-render to apply selected class
                }

                function updateTimeSlots(date) {
                    timeSlots.innerHTML = `
                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-lg">
                            <span>${date} - 08:00 AM - 09:00 AM</span>
                            <button class="bg-blue-500 text-white px-4 py-1 rounded">Book</button>
                        </div>
                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-lg">
                            <span>${date} - 09:00 AM - 10:00 AM</span>
                            <button class="bg-blue-500 text-white px-4 py-1 rounded">Book</button>
                        </div>
                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-lg">
                            <span>${date} - 10:00 AM - 11:00 AM</span>
                            <button class="bg-blue-500 text-white px-4 py-1 rounded">Book</button>
                        </div>
                    `;
                }

                function handleDefaultDate() {
                    selectDate(today.getDate()); // Default select today
                }

                calendarEl.addEventListener('click', function(event) {
                    if (event.target.classList.contains('day')) {
                        const day = parseInt(event.target.getAttribute('data-day'));
                        selectDate(day);
                    }
                });

                prevMonthBtn.addEventListener('click', function() {
                    if (currentMonth === 0) {
                        currentMonth = 11;
                        currentYear--;
                    } else {
                        currentMonth--;
                    }
                    renderCalendar(currentMonth, currentYear);
                    handleDefaultDate(); // Set default date to today after changing month
                });

                nextMonthBtn.addEventListener('click', function() {
                    if (currentMonth === 11) {
                        currentMonth = 0;
                        currentYear++;
                    } else {
                        currentMonth++;
                    }
                    renderCalendar(currentMonth, currentYear);
                    handleDefaultDate(); // Set default date to today after changing month
                });

                // Initial render
                renderCalendar(currentMonth, currentYear);
                handleDefaultDate(); // Set default date to today on initial load
            });
        </script>
    @endsection
</body>

</html>
