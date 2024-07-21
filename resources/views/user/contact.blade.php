<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }
        .contact{
            background: url('{{ asset('images/contactt.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: full;
            width: 100%;
        }
    </style>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
    <div class="container mx-auto mb-10 mt-5">
        <div class="md:flex-row flex flex-col-reverse rounded-lg shadow-lg ">
            <div class="lg:w-1/2 contact flex items-end">
                <div class="md:text-left font-semibold text-white p-4 w-full rounded-md" style="background-color: rgba(0, 0, 0, 0.77);">
                    <p class="text-lg mb-2">+94 71 0 288 225</p>
                    <p class="text-lg mb-2">info@doctorchannelling.com</p>
                    <p class="text-lg mb-2">doctorchannelling PLC, No: 108,</p>
                    <p class="text-lg mb-2">W A D Ramanayake Mawatha,</p>
                    <p class="text-lg">Colombo 2, Sri Lanka.</p>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="p-5">
                    <h1 class="text-5xl text-green-500 font-bold mb-10">Get In Touch</h1>
                    <form action="#" method="POST" id="contactForm">
                        <div class="mb-2">
                            <label for="fullName" class="block text-gray-700 font-semibold">Full name*</label>
                            <input type="text" id="fullName" name="fullName"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block text-gray-700 font-semibold ">Email*</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="block text-gray-700 font-semibold ">Phone number (optional)</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-2">
                            <label for="message" class="block text-gray-700 font-semibold ">How we can help?*</label>
                            <textarea id="message" name="message" rows="4"
                                class="w-full px-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required></textarea>
                        </div>
                        <div class="">
                            <button type="submit"
                                class="w-full bg-blue-500 text-white font-bold border border-blue-500 hover:bg-transparent hover:text-blue-500 text-xl py-3 rounded-lg transition-all duration-300">Send
                                message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
