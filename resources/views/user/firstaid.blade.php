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

        .hidde {
            display: none !important;
        }

        @media (min-width: 1024px) {

            /* Adjust this breakpoint if needed */
            .lg\:bloc {
                display: block !important;
            }
        }

        #map {
            height: 300px;
            width: 100%;
        }
    </style>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
    <div class="my-10">
        <div class="text-center">
            <h1 class="text-5xl text-green-500 font-bold mb-10">First Aid Consulting</h1>
        </div>
        {{-- hero section start --}}
        <div class="mt-10 mb-20">
            <div class="mx-auto max-w-screen-2xl">
                <div class="w-full max-w-7xl md:mt-16">
                    <blockquote class="relative grid items-center bg-white shadow-xl md:grid-cols-3 rounded-xl">
                        <div class="hidde lg:bloc">
                            <img class="object-cover w-full h-full rounded-l-xl"
                                style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);"
                                src="{{ asset('images/firstaid.jpg') }}">
                        </div>
                        <article class="relative p-6 md:p-8 md:col-span-2">
                            <div class="flex items-center gap-12 mb-10">
                                <h2 class="text-2xl font-semibold text-blue-500 lg:text-4xl">Immediate Help and Guidance
                                    in Emergencies</h2>
                            </div>
                            <div class="space-y-8">
                                <p class="text-base text-justify sm:leading-relaxed md:text-xl leading-relaxed">
                                    In emergencies, timely intervention can make all the difference. Our guide to first
                                    aid equips you with the knowledge and skills necessary to provide immediate help and
                                    support when it's needed the most. From treating cuts and scrapes to handling more
                                    serious injuries, you'll find clear, concise instructions to ensure you're prepared
                                    for any situation. Empower yourself with the confidence to act swiftly and
                                    effectively in emergencies, and become a vital resource for those around you.
                                </p>
                            </div>
                        </article>
                    </blockquote>
                </div>
            </div>
        </div>
        {{-- hero section end --}}

        {{-- Common First Aid Situations start --}}
        <div class="mt-10 bg-blue-50 pb-5 rounded-lg border-b shadow-xl ">
            <div class="p-5">
                <h1 class="text-green-500 text-5xl font-bold text-center ">Common First Aid Situations</h1>
            </div>
            <div class="mt-5 grid md:grid-cols-2 gap-5 mx-5">
                <!-- Cuts and Scrapes Section -->
                <div class="border p-5 rounded-lg border-red-100 bg-red-50">
                    <h1 class="text-xl font-semibold mb-5 text-blue-500">Cuts and Scrapes</h1>
                    <div class="flex">
                        <div class="w-1/3">
                            <img src="{{ asset('images/cut_scrape.jpg') }}" alt="Cuts and Scrapes"
                                class="w-full h-auto" />
                        </div>
                        <div class="w-2/3 pl-5">
                            <p class="text-sm">Details about treating cuts and scrapes.</p>
                            <ul class="list-disc pl-5 mt-2">
                                <li>Wash your hands with soap and water.</li>
                                <li>Clean the cut or scrape with water and mild soap.</li>
                                <li>Apply an antiseptic to prevent infection.</li>
                                <li>Cover the wound with a sterile bandage or dressing.</li>
                                <li>Change the bandage daily or whenever it becomes dirty or wet.</li>
                                <li>Watch for signs of infection, such as redness, swelling, or pus.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Burns Section -->
                <div class="border p-5 rounded-lg border-red-100 bg-red-50">
                    <h1 class="text-xl font-semibold mb-5 text-blue-500">Burns</h1>
                    <div class="flex">
                        <div class="w-1/3">
                            <img src="{{ asset('images/burns.jpg') }}" alt="Burns" class="w-full h-auto" />
                        </div>
                        <div class="w-2/3 pl-5">
                            <p class="text-sm">Details about treating burns.</p>
                            <ul class="list-disc pl-5 mt-2">
                                <li>Cool the burn with running water for at least 10 minutes.</li>
                                <li>Cover the burn with a sterile, non-stick dressing or cloth.</li>
                                <li>Avoid applying creams, ointments, or ice directly to the burn.</li>
                                <li>Seek medical attention for severe burns.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Choking Section -->
                <div class="border p-5 rounded-lg border-red-100 bg-red-50">
                    <h1 class="text-xl font-semibold mb-5 text-blue-500">Choking</h1>
                    <div class="flex">
                        <div class="w-1/3">
                            <img src="{{ asset('images/choking.jpg') }}" alt="Choking" class="w-full h-auto" />
                        </div>
                        <div class="w-2/3 pl-5">
                            <p class="text-sm">Details about helping someone who is choking.</p>
                            <ul class="list-disc pl-5 mt-2">
                                <li>Encourage the person to cough if they can.</li>
                                <li>If coughing fails, give 5 back blows between the shoulder blades.</li>
                                <li>Perform 5 abdominal thrusts (Heimlich maneuver).</li>
                                <li>Call emergency services if the person cannot breathe.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Sprains and Strains Section -->
                <div class="border p-5 rounded-lg border-red-100 bg-red-50">
                    <h1 class="text-xl font-semibold mb-5 text-blue-500">Sprains and Strains</h1>
                    <div class="flex">
                        <div class="w-1/3">
                            <img src="{{ asset('images/sprains.jpg') }}" alt="Sprains and Strains"
                                class="w-full h-auto" />
                        </div>
                        <div class="w-2/3 pl-5">
                            <p class="text-sm">Details about treating sprains and strains.</p>
                            <ul class="list-disc pl-5 mt-2">
                                <li>Rest the injured area.</li>
                                <li>Ice the area for 15-20 minutes every 2-3 hours.</li>
                                <li>Compress the area with an elastic bandage.</li>
                                <li>Elevate the injured limb above heart level.</li>
                                <li>Seek medical attention if there is severe pain or swelling.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        {{-- Common First Aid Situations end --}}

        {{-- Find Nearby Doctors start --}}
        <div class="mt-20 ">
            <h1 class="text-green-500 text-5xl font-semibold text-center">Find Nearby Doctors</h1>
            <div class="border-b p-5 shadow-xl rounded-2xl">
                <!-- Map and Location -->
                <div class="mt-4">
                    <h3 class="text-xl font-semibold mb-2 text-blue-500">Use Our Interactive Map</h3>
                    <p class="text-lg mb-5">Find doctors and emergency services near you using our interactive map:</p>
                    <div id="map" class="mt-2"></div>
                </div>
            </div>
            <div class="mt-10 bg-blue-50 pb-5 rounded-lg border-b shadow-xl p-8">
                <div class="flex gap-5">
                    <!-- Contact Information -->
                    <div class="mt-5 w-1/2">
                        <h3 class="text-xl font-semibold mb-5 text-blue-500">Emergency Contacts</h3>
                        <p class="text-lg">Here are some essential contacts for emergency situations:</p>
                        <ul class="list-disc pl-5 mt-2">
                            <li><strong>Emergency Services:</strong> Dial 1990 or your local emergency number.</li>
                            <li><strong>Poison Control:</strong> <a href="tel:+94 71 0 288 225"
                                    class="text-blue-500">+94 71 0 288 225</a></li>
                        </ul>
                    </div>

                    <!-- Search Functionality -->
                    <div class="mt-5 w-1/2">
                        <h3 class="text-xl font-semibold mb-5 text-blue-500">Search for Nearby Doctors</h3>
                        <p class="text-lg">Enter your location to search for doctors:</p>
                        <form action="search_results.html" method="GET" class="mt-2">
                            <input type="text" name="location" placeholder="Enter your location"
                                class="border p-2 w-full" required />
                            <button
                                class="mt-5 bg-blue-500 px-16 text-white font-bold border border-blue-500 hover:bg-transparent hover:text-blue-500 text-xl py-3 rounded-lg">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Find Nearby Doctors end --}}

    </div>

    @endsection
    <!-- Google Maps JavaScript API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
    <script>
        function initMap() {
            // Create a map centered on a default location
            var defaultLocation = { lat: 37.7749, lng: -122.4194 }; // Default to San Francisco
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: defaultLocation
            });

            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Update map to center on user's location
                    map.setCenter(pos);

                    // Add a marker for the user's location
                    new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: 'You are here'
                    });
                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            new google.maps.InfoWindow({
                content: browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.',
                position: pos
            }).open(map);
        }
    </script>

</body>

</html>
