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
                    <div class="mt-20">
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
                    <div class="mt-20">
                        <div class="text-center">
                            <h1 class="text-5xl text-green-500 font-bold">Our Service</h1>
                            <div class="mt-10 flex md:flex-row flex-col w-full gap-4">
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/near-doctor.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">Doctor Near Me</h3>
                                    <p class="text-xl">Channeling appointments with local doctors.</p>
                                </div>

                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/chat.png') }}" class="w-24 h-24" alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">Chat Consultation</h3>
                                    <p class="text-xl">Chat with a doctor for quick consultations.</p>
                                </div>
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/first-aid.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">First Aid</h3>
                                    <p class="text-xl">Emergency situations and first aid guidance.</p>
                                </div>
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/medical-report.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">Medical Report</h3>
                                    <p class="text-xl">Medical tests and reports.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- our service end --}}

                    {{-- Top Specialists start --}}
                    <div class="mt-20">
                        <div class="text-center">
                            <h1 class="text-5xl text-green-500 font-bold">Top Specialists</h1>
                            <div class="mt-10 flex md:flex-row flex-col  w-full gap-4">
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/general-physician.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">General Physician</h3>
                                    <p class="text-xl">Diagnoses and treats general medical conditions.</p>
                                </div>
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/cardiologist.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">Cardiologist</h3>
                                    <p class="text-xl">Specializes in heart and blood vessel diseases.</p>
                                </div>
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/gynecologist1.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">Gynecologist</h3>
                                    <p class="text-xl">Specializes in women's health and reproductive systems.</p>
                                </div>
                                <div
                                    class="md:w-1/4 w-screen cursor-pointer py-16 border p-4 text-center bg-gray-100 rounded-md border-gray-600 hover:bg-blue-500 hover:text-white transition-all">
                                    <!-- Heroicons icon for 'Doctor Near Me' -->
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('icon/pediatrician.png') }}" class="w-24 h-24"
                                            alt="Specialization Icon">
                                    </div>
                                    <h3 class="text-3xl font-semibold mb-3">Pediatrician</h3>
                                    <p class="text-xl">Specializes in children's health and diseases.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Top Specialists end --}}

                    {{-- About Us start --}}
                    <div class="mt-20">
                        <div class="text-center">
                            <h1 class="text-5xl text-green-500 font-bold">About Us</h1>
                    
                            <div class="container mx-auto px-4 mt-10 shadow-xl pb-5 rounded-lg">
                                <div class="text-center mb-12">
                                    <p class="text-2xl text-black">
                                        We are dedicated to providing top-notch medical services and consultations to
                                        our community. Our team of experienced professionals is committed to your health and
                                        well-being.
                                    </p>
                                </div>
                                <div class="flex flex-col md:flex-row items-center justify-center gap-8">
                                    <!-- Image -->
                                    <div class="md:w-1/2">
                                        <img src="{{ asset('images/about.jpg') }}" alt="About Us"
                                            class="w-full rounded-lg shadow-lg">
                                    </div>
                                    <!-- Text Content -->
                                    <div class="md:w-1/2 text-justify">
                                        <h3 class="text-2xl font-semibold text-blue-500 mb-4 flex items-center gap-2">
                                            <!-- Heroicons icon for 'Mission' -->
                                            <img src="{{ asset('icon/mission1.png') }}" class="w-8 h-8"
                                            alt="Specialization Icon">
                                            Our Mission
                                        </h3>
                                        <p class="text-lg text-black mb-4">
                                            Our mission is to offer high-quality medical services, combining advanced
                                            technology with compassionate care. We strive to make healthcare accessible
                                            and affordable for everyone.
                                        </p>
                                        <h3 class="text-2xl font-semibold text-blue-500 mb-4 flex items-center gap-2">
                                            <!-- Heroicons icon for 'Values' -->
                                            <img src="{{ asset('icon/values.png') }}" class="w-8 h-8"
                                            alt="Specialization Icon">
                                            Our Values
                                        </h3>
                                        <ul class="list-disc list-inside text-lg text-black">
                                            <li>Compassion and Respect</li>
                                            <li>Innovation and Excellence</li>
                                            <li>Integrity and Transparency</li>
                                            <li>Teamwork and Collaboration</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
