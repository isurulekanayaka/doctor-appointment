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

<body class="bg-blue-50 text-gray-800">
    @extends('layout.layout')
    @section('content')
    <div class="container">
        <header class="text-center mt-10">
            <h1 class="text-5xl font-bold text-green-500 mb-5">Frequently Asked Questions</h1>
            <p class="text-xl text-blue-500">Find answers to common questions about our doctor appointment services</p>
        </header>

        <div class="relative flex flex-col items-center mx-10 mt-10 shadow-xl rounded-xl">
            <div x-data="accordion(1)" class="w-full">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">How do I book an online doctor appointment?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>Visit our website and select your preferred doctor.</li>
                            <li>Choose a convenient date and time for your appointment.</li>
                            <li>Fill out the required information and confirm your booking.</li>
                            <li>Receive a confirmation email with appointment details.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div x-data="accordion(2)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">What should I do if I need to reschedule my appointment?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>Log in to your account on our website.</li>
                            <li>Navigate to your appointment history.</li>
                            <li>Select the appointment you wish to reschedule.</li>
                            <li>Choose a new date and time and confirm the changes.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div x-data="accordion(3)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">Can I cancel my appointment?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>Log in to your account on our website.</li>
                            <li>Go to your appointment history.</li>
                            <li>Select the appointment you wish to cancel.</li>
                            <li>Follow the prompts to confirm the cancellation.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div x-data="accordion(4)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">Are online consultations available?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <p>Yes, we offer online consultations. You can book an online appointment through our website just like an in-person appointment.</p>
                    </div>
                </div>
            </div>

            <div x-data="accordion(5)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">What payment methods are accepted?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>We accept various payment methods including credit/debit cards, online banking, and mobile wallets.</li>
                            <li>Ensure that your payment method is ready when booking an appointment.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div x-data="accordion(6)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">Is my personal information secure?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <p>Yes, we prioritize the security and privacy of your personal information. All data is encrypted and stored securely.</p>
                    </div>
                </div>
            </div>

            <div x-data="accordion(7)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">Do I need to create an account to book an appointment?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <p>Yes, creating an account allows you to easily manage your appointments, reschedule, or cancel if needed.</p>
                    </div>
                </div>
            </div>

            <div x-data="accordion(8)" class="w-full mt-4">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">How can I contact customer support?</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-50">
                    <div class="px-6 pb-4 text-gray-600">
                        <p>You can contact our customer support via the contact form on our website, email, or by calling our support hotline.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center my-10">
            <h2 class="text-2xl font-bold">For any other questions or assistance, feel free to <a href="#" class="text-blue-500">contact us!</a></h2>
        </div>
    </div>

    <script>
        // FAQ Accordion
        document.addEventListener("alpine:init", () => {
            Alpine.store("accordion", {
                tab: 0
            });

            Alpine.data("accordion", (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? "-rotate-180" : "";
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : "";
                }
            }));
        });
    </script>
    @endsection
</body>

</html>
