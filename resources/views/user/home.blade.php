<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.2.2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body {
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }

        /* carousel style start */
        .carousel-cell {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.5s ease, transform 0.5s ease;
            background-repeat: no-repeat;
            background-size: cover;
            width: 1275px;
            /* Set the width of the div */
            height: 700px;
            /* Set the height of the div */
            position: relative;
        }

        .carousel-cell.is-selected {
            opacity: 1;
            transform: scale(1);
        }

        /* .carousel-cell::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
        /* z-index: 1; */
        /* } */
        */ .carousel-cell>* {
            position: relative;
            z-index: 2;
        }

        /* carousel style end */

        @keyframes slideIn {
            from {
                transform: translateY(100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes jump {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-slideIn {
            animation: slideIn 1s ease-out forwards;
        }

        .animate-fadeIn {
            animation: fadeIn 1.5s ease-in forwards;
        }

        .animate-jump {
            animation: jump 1s ease-in-out infinite;
        }

        .animate-jump:hover {
            animation-play-state: paused;
        }

        .font-matching {
            font-family: 'YourMatchingFont', sans-serif;
            /* Replace with your desired font */
        }
    </style>
</head>

<body>
    @extends('layout.layout')
    @section('content')
        <div class="">
            <div class="my-10">
                <div class="">
                    {{-- carousel start --}}
                    {{-- https://flickity.metafizzy.co/options --}}
                    <div class="carousel"
                        data-flickity='{ "wrapAround": true, "autoPlay": 2500, "pageDots": false, "prevNextButtons": false }'>

                        <!-- Slide 1 -->
                        <div class="carousel-cell" style="background-image: url('{{ asset('images/doc3.png') }}');">
                            <div class="flex flex-col justify-end w-2/3 h-full gap-12 pb-48 mx-10 md:mx-0 animate-slideIn">
                                <h1 class="text-[90px] leading-none font-bold text-green-500 font-matching animate-fadeIn">
                                    Book Your Doctor
                                    Appointment</h1>
                                <p class="mt-2 text-3xl text-black font-matching animate-fadeIn leading-relaxed">Easily
                                    schedule appointments with top-rated doctors who provide personalized care for your
                                    unique needs.</p>
                                <div class="flex gap-5">
                                    <a href="#"
                                        class="px-5 py-2 mt-5 text-2xl text-white bg-blue-500 border border-blue-500 w-fit rounded-xl animate-jump hover:bg-transparent hover:text-blue-500 font-bold">Book
                                        Now</a>
                                    <a href="#"
                                        class="px-5 py-2 mt-5 text-2xl text-blue-500 border border-blue-500 w-fit rounded-xl animate-jump hover:bg-transparent hover:text-blue-500 font-bold">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-cell" style="background-image: url('{{ asset('images/doc2.png') }}');">
                            <div class="flex flex-col justify-end w-2/3 h-full gap-12 pb-48 mx-10 md:mx-0 animate-slideIn">
                                <h1 class="text-[90px] leading-none  font-bold text-green-500 font-matching animate-fadeIn">
                                    Find Specialists
                                    Near You</h1>
                                <p class="mt-2 text-3xl text-black font-matching animate-fadeIn leading-relaxed">Find the
                                    right specialist for your health needs.</p>
                                <div class="flex gap-5">
                                    <a href="#"
                                        class="px-5 py-2 mt-5 text-2xl text-white bg-blue-500 border border-blue-500 w-fit rounded-xl animate-jump hover:bg-transparent hover:text-blue-500 font-bold">Find
                                        Now</a>
                                    <a href="#"
                                        class="px-5 py-2 mt-5 text-2xl text-blue-500 border border-blue-500 w-fit rounded-xl animate-jump hover:bg-transparent hover:text-blue-500 font-bold">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-cell" style="background-image: url('{{ asset('images/doc1.png') }}');">
                            <div class="flex flex-col justify-end w-2/3 h-full gap-12 pb-48 mx-10 md:mx-0 animate-slideIn">
                                <h1 class="text-[90px] leading-none  font-bold text-green-500 font-matching animate-fadeIn">
                                    Virtual
                                    Consultations</h1>
                                <div>
                                    <p class="mt-2 text-3xl text-black font-matching animate-fadeIn leading-relaxed">Get
                                        medical
                                        advice anytime,</p>
                                    <p class="text-3xl text-black font-matching animate-fadeIn leading-relaxed"> anywhere
                                        from home.</p>

                                </div>
                                <div class="flex gap-5">
                                    <a href="#"
                                        class="px-5 py-2 mt-5 text-2xl text-white bg-blue-500 border border-blue-500 w-fit rounded-xl animate-jump hover:bg-transparent hover:text-blue-500 font-bold">Consult
                                        Now</a>
                                    <a href="#"
                                        class="px-5 py-2 mt-5 text-2xl text-blue-500 border border-blue-500 w-fit rounded-xl animate-jump hover:bg-transparent hover:text-blue-500 font-bold">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- carousel end --}}

                    {{-- Find Doctor Start --}}
                    <div class="mt-10">
                        <div class="text-center">
                            <h1 class="text-5xl text-green-500 font-bold mb-10">Channel Your Doctor</h1>
                            <div
                                class="mt-5 border pt-6 px-6 mx-auto flex justify-center items-center bg-blue-50 w-full max-w-3xl border-blue-200 rounded-lg">
                                <!-- Centered content -->
                                <form action="" class="space-y-4 w-full flex flex-col mb-10">
                                    <div class="flex items-center space-x-2 border-b border-blue-500 py-2 px-4 rounded-md">
                                        <!-- Heroicons icon for text input -->
                                        <img src="{{ asset('icon/doctor.png') }}" class="w-6 h-6 text-blue-500"
                                            alt="Doctor Icon">
                                        <input type="text" placeholder="Doctor - Max 20 Characters"
                                            class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none" />
                                    </div>
                                    <div class="flex items-center space-x-2 border-b border-blue-500 py-2 px-4 rounded-md">
                                        <!-- Heroicons icon for select input -->
                                        <img src="{{ asset('icon/hospital.png') }}" class="w-6 h-6 text-blue-500"
                                            alt="Hospital Icon">
                                        <select
                                            class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none">
                                            <option value="" disabled selected>Any Hospital</option>
                                            <option value="hospital1">Hospital 1</option>
                                            <option value="hospital2">Hospital 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    <div class="flex items-center space-x-2 border-b border-blue-500 py-2 px-4 rounded-md">
                                        <!-- Heroicons icon for select input -->
                                        <img src="{{ asset('icon/Specialization.png') }}" class="w-6 h-6 text-blue-500"
                                            alt="Specialization Icon">
                                        <select
                                            class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none">
                                            <option value="" disabled selected class="">Any Specialization
                                            </option>
                                            <option value="specialization1">Specialization 1</option>
                                            <option value="specialization2">Specialization 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    <div class="flex items-center space-x-2 border-b border-blue-500 py-2 px-4 rounded-md">
                                        <!-- Heroicons icon for date input -->
                                        <img src="{{ asset('icon/calendar.png') }}" class="w-6 h-6 text-blue-500"
                                            alt="calendar Icon">
                                        <input type="text" id="datepicker" placeholder="Select Date"
                                            class="border-none p-3 rounded-md w-full text-xl bg-transparent outline-none" />
                                    </div>

                                    <div class="flex items-center space-x-2 text-center justify-center">
                                        <!-- Heroicons icon for date input -->
                                        <button
                                            class="mt-5 bg-blue-500 px-16 text-white font-bold border border-blue-500 hover:bg-transparent hover:text-blue-500 text-xl py-3 rounded-lg">Search</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                    {{-- Find Doctor End --}}

                    {{-- our service start --}}
                    <div class="mt-10">
                        <div class="text-center">
                            <h1 class="text-5xl text-green-500 font-bold">Our Service</h1>
                            <div class="mt-10 flex w-full gap-4">
                                <div class="w-1/4 border p-4 text-center bg-blue-100 rounded-md border-blue-600">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <svg class="mx-auto mb-4 w-8 h-8 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v1M12 20v-1M4.22 4.22a6 6 0 011.06 1.06m12.86 12.86a6 6 0 001.06-1.06M4 12H3m18 0h-1m-4.22-7.78a6 6 0 00-1.06 1.06M5.22 17.78a6 6 0 001.06-1.06M19.78 5.22a6 6 0 00-1.06-1.06M5.22 5.22a6 6 0 001.06 1.06m12.86-1.06a6 6 0 011.06 1.06M12 6v2m0 8v2" />
                                    </svg>
                                    <h3 class="text-3xl text-blue-500 font-semibold mb-3">Doctor Near Me</h3>
                                    <p class="text-xl">Channeling appointments with local doctors.</p>
                                </div>
                                <div class="w-1/4 border p-4 text-center bg-gray-100 rounded-md border-gray-600">
                                    <!-- Heroicons icon for 'Chat Consultation' -->
                                    <svg class="mx-auto mb-4 w-8 h-8 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 15a2 2 0 00-2-2H4a2 2 0 00-2 2v4a2 2 0 002 2h15l4 4v-4z" />
                                    </svg>
                                    <h3 class="text-3xl text-gray-500 font-semibold mb-3">Chat Consultation</h3>
                                    <p class="text-xl">Chat with a doctor for quick consultations.</p>
                                </div>
                                <div class="w-1/4 border p-4 text-center bg-orange-100 rounded-md border-orange-600">
                                    <!-- Heroicons icon for 'First Aid' -->
                                    <svg class="mx-auto mb-4 w-8 h-8 text-orange-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12H9m0 0H3m6 0v6m6-6v6m6-6v6m-6-6v6m-6-6v6m0 0h6m6 0h6m-6-6V6m-6 6V6M9 6H3m6 0h6" />
                                    </svg>
                                    <h3 class="text-3xl text-orange-500 font-semibold mb-3">First Aid</h3>
                                    <p class="text-xl">Emergency situations and first aid guidance.</p>
                                </div>

                                <div class="w-1/4 border p-4 text-center bg-yellow-100 rounded-md border-yellow-600">
                                    <!-- Heroicons icon for 'Medical Report' -->
                                    <svg class="mx-auto mb-4 w-8 h-8 text-yellow-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h10M7 16h10M4 6a1 1 0 011-1h14a1 1 0 011 1v12a1 1 0 01-1 1H5a1 1 0 01-1-1V6z" />
                                    </svg>
                                    <h3 class="text-3xl text-yellow-500 font-semibold mb-3">Medical Report</h3>
                                    <p class="text-xl">Medical tests and reports.</p>
                                </div>

                            </div>

                        </div>

                    </div>
                    {{-- our service end --}}

                </div>

            </div>
        </div>
    @endsection

    {{-- carousel sripts start --}}
    <script src="https://unpkg.com/flickity@2.2.2/dist/flickity.pkgd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elem = document.querySelector('.carousel');
            var flkty = new Flickity(elem, {
                wrapAround: true,
                autoPlay: 2500,
                pageDots: false,
                prevNextButtons: false
            });
        });
    </script>
    {{-- carousel sripts end --}}
    {{-- calender --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datepicker", {
                dateFormat: "Y-m-d", // You can customize the date format here
            });
        });
    </script>
</body>

</html>
