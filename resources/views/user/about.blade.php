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
    </style>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
        <div class="container mx-auto mb-10">
            <div class="">
                <div class="mt-20">
                    <div class="text-center">
                        <h1 class="text-5xl text-green-500 font-bold mb-10 text-center mt-10">About Us</h1>
                        <div class="container mx-auto px-4 mt-10 p-8 bg-white rounded-lg">
                            <!-- Introduction Section -->
                            <div class="text-center mb-12">
                                <p class="text-2xl text-black">
                                    We are dedicated to providing top-notch medical services and consultations to our
                                    community. Our team of experienced professionals is committed to your health and
                                    well-being.
                                </p>
                            </div>

                            <!-- Image and Text Content -->
                            <div class="flex flex-col md:flex-row items-center justify-center gap-8 shadow-lg pb-10 rounded-lg px-5">
                                <!-- Image -->
                                <div class="md:w-1/2">
                                    <img src="{{ asset('images/about.jpg') }}" alt="About Us"
                                        class="w-full rounded-lg shadow-lg">
                                </div>
                                <!-- Text Content -->
                                <div class="md:w-1/2 text-justify">
                                    <h3 class="text-2xl font-semibold text-blue-500 mb-4 flex items-center gap-2">
                                        <img src="{{ asset('icon/mission1.png') }}" class="w-8 h-8" alt="Mission Icon">
                                        Our Mission
                                    </h3>
                                    <p class="text-lg text-black mb-4">
                                        Our mission is to offer high-quality medical services, combining advanced technology
                                        with compassionate care. We strive to make healthcare accessible and affordable for
                                        everyone.
                                    </p>
                                    <h3 class="text-2xl font-semibold text-blue-500 mb-4 flex items-center gap-2">
                                        <img src="{{ asset('icon/values.png') }}" class="w-8 h-8" alt="Values Icon">
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

                            <!-- Our Team Section -->
                            <div class="mt-16">
                                <h2 class="text-3xl font-bold text-green-500 mb-6">Meet Our Team</h2>
                                <div class="flex flex-wrap gap-8 justify-center shadow-lg pb-10 rounded-lg px-5">
                                    <!-- Team Member 1 -->
                                    <div class="w-full md:w-1/3 lg:w-1/4 text-center">
                                        <img src="{{ asset('images/member1.jpg') }}" alt="Team Member 1"
                                            class="w-32 h-32 mx-auto rounded-full shadow-lg">
                                        <h4 class="text-xl font-semibold mt-4">Dr. John Doe</h4>
                                        <p class="text-lg text-gray-600">Chief Medical Officer</p>
                                    </div>
                                    <!-- Team Member 2 -->
                                    <div class="w-full md:w-1/3 lg:w-1/4 text-center">
                                        <img src="{{ asset('images/member2.jpg') }}" alt="Team Member 2"
                                            class="w-32 h-32 mx-auto rounded-full shadow-lg">
                                        <h4 class="text-xl font-semibold mt-4">Jane Smith</h4>
                                        <p class="text-lg text-gray-600">Lead Nurse</p>
                                    </div>
                                    <!-- Team Member 3 -->
                                    <div class="w-full md:w-1/3 lg:w-1/4 text-center">
                                        <img src="{{ asset('images/member3.jpg') }}" alt="Team Member 3"
                                            class="w-32 h-32 mx-auto rounded-full shadow-lg">
                                        <h4 class="text-xl font-semibold mt-4">Dr. Emily Davis</h4>
                                        <p class="text-lg text-gray-600">Pediatrician</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Our History Section -->
                            <div class="mt-16">
                                <h2 class="text-3xl font-bold text-green-500 mb-6">Our History</h2>
                                <div class="shadow-lg pb-10 rounded-lg">
                                    <p class="text-lg text-black mb-4">
                                    Established in 2000, we have grown from a small practice to a leading medical service
                                    provider in the region. Our journey is marked by a commitment to innovation and
                                    excellence in patient care.
                                </p>
                                <p class="text-lg text-black">
                                    Over the years, we have expanded our services, invested in cutting-edge technology, and
                                    built a team of dedicated professionals. Our history is a testament to our dedication to
                                    improving healthcare outcomes for our community.
                                </p>
                                </div>
                                
                            </div>

                            <!-- Testimonials Section -->
                            <div class="mt-16">
                                <h2 class="text-3xl font-bold text-green-500 mb-6">What Our Patients Say</h2>
                                <div class="flex flex-col md:flex-row gap-8 shadow-lg pb-10 rounded-lg px-5">
                                    <!-- Testimonial 1 -->
                                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg w-full md:w-1/2">
                                        <p class="text-lg text-gray-700 mb-4">
                                            "The care I received here was exceptional. The staff were professional, and the
                                            facilities were top-notch. I highly recommend this practice."
                                        </p>
                                        <h4 class="text-xl font-semibold text-blue-500">Alex Johnson</h4>
                                        <p class="text-gray-600">Satisfied Patient</p>
                                    </div>
                                    <!-- Testimonial 2 -->
                                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg w-full md:w-1/2">
                                        <p class="text-lg text-gray-700 mb-4">
                                            "I felt welcomed and cared for from the moment I walked in. The doctors are
                                            knowledgeable, and the environment is warm and friendly."
                                        </p>
                                        <h4 class="text-xl font-semibold text-blue-500">Maria Garcia</h4>
                                        <p class="text-gray-600">Long-term Patient</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
</body>

</html>
