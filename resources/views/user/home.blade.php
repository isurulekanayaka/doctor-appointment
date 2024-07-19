<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.2.2/dist/flickity.min.css">
    <style>
        body {
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        /* carousel style start */
        .carousel-cell {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.5s ease, transform 0.5s ease;
            background-repeat: no-repeat;
            background-size: cover;
            width: 1275px; /* Set the width of the div */
            height: 700px; /* Set the height of the div */
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
            z-index: 1;
        } */

        .carousel-cell>* {
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
    <div>
        <div class="my-10">
            <div class="">
                {{-- carousel start --}}
                {{-- https://flickity.metafizzy.co/options --}}
                <div class="carousel"
                    data-flickity='{ "wrapAround": true, "autoPlay": 5000, "pageDots": false, "prevNextButtons": false }'>

                    <div class="carousel-cell" style="background-image: url('{{ asset('images/doc3.png') }}');">
                        <div class="flex flex-col h-full justify-end mx-10 w-1/2 pb-16 animate-slideIn gap-4">
                            <h1 class="text-green-500 text-5xl font-bold font-matching animate-fadeIn">Book Your Doctor
                                Appointment</h1>
                            <p class="text-white mt-2 text-xl font-matching animate-fadeIn">Easily schedule appointments
                                with top-rated doctors
                                who provide personalized care for your unique needs.</p>
                            <a href="#"
                                class="mt-5 bg-blue-500 w-fit px-5 py-1 border border-blue-500 rounded-xl text-white text-2xl animate-jump hover:bg-transparent hover:text-blue-500">Book
                                Now</a>
                        </div>
                    </div>
{{-- 
                    <div class="carousel-cell" style="background-image: url('{{ asset('images/doctor2.jpg') }}');">
                        <div class="flex flex-col h-full justify-end mx-10 w-1/2 pb-16 animate-slideIn gap-4">
                            <h1 class="text-green-500 text-5xl font-bold font-matching animate-fadeIn">Effortless Booking</h1>
                            <p class="text-white mt-2 text-xl font-matching animate-fadeIn">Our streamlined appointment system allows you to schedule visits with a few simple clicks. No more waiting on hold.</p>
                            <a href="#" class="mt-5 bg-blue-500 w-fit px-5 py-1 border border-blue-500 rounded-xl text-white text-2xl animate-jump hover:bg-transparent hover:text-blue-500">Book Now</a>
                        </div>
                    </div>

                    <div class="carousel-cell" style="background-image: url('{{ asset('images/doctor3.jpg') }}');">
                        <div class="flex flex-col h-full justify-end mx-10 w-1/2 pb-16 animate-slideIn gap-4">
                            <h1 class="text-green-500 text-5xl font-bold font-matching animate-fadeIn">Comprehensive Care</h1>
                            <p class="text-white mt-2 text-xl font-matching animate-fadeIn">From routine check-ups to specialized consultations, find the care you need with top-rated medical professionals.</p>
                            <a href="#" class="mt-5 bg-blue-500 w-fit px-5 py-1 border border-blue-500 rounded-xl text-white text-2xl animate-jump hover:bg-transparent hover:text-blue-500">Book Now</a>
                        </div>
                    </div> --}}

                </div>
                {{-- carousel end --}}
                </div>
                <div class=" mt-10">
                    <div class="text-center">
                        <h1></h1>
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
                autoPlay: 5000,
                pageDots: false,
                prevNextButtons: false
            });
        });
    </script>
    {{-- carousel sripts end --}}
</body>

</html>
