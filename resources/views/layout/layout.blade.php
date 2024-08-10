<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    @include('component.nav-bar')
    <div class="flex items-center justify-center w-screen">
        <div class="w-[1275px]">
            <div class="px-5 md:px-0">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- component -->
    <div class="fixed bottom-0 right-0 mb-4 mr-4">
        <button id="open-chat"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Chat with Admin Bot
        </button>
    </div>
    <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                <p class="text-lg font-semibold">Admin Bot</p>
                <button id="close-chat"
                    class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div id="chatbox" class="p-4 h-80 overflow-y-auto">
                <!-- Chat messages will be displayed here -->
            </div>
            <div class="p-4 border-t flex">
                <input id="user-input" type="text" placeholder="Type a message"
                    class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="send-button"
                    class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
            </div>
        </div>
    </div>
    <script>
        const chatbox = document.getElementById("chatbox");
        const chatContainer = document.getElementById("chat-container");
        const userInput = document.getElementById("user-input");
        const sendButton = document.getElementById("send-button");
        const openChatButton = document.getElementById("open-chat");
        const closeChatButton = document.getElementById("close-chat");

        let isChatboxOpen = true; // Set the initial state to open

        // Predefined Q&A pairs
        const qaPairs = {
            "hi": "hello",
            "hello": "hi",
            "how are you?": "I'm good, thank you!",
            "what's your name?": "I'm a chatbot created to assist you.",
            "what can you do?": "I can help answer your questions and provide information.",
            "bye": "Goodbye! Have a great day!",
            "thank you": "You're welcome!",
            "help": "How can I assist you today?",
            "what time is it?": "I'm not sure about the exact time, but you can check your device's clock.",
            "tell me a joke": "Why don't scientists trust atoms? Because they make up everything!",
            "what's the weather like?": "I don't have real-time weather information. Please check a weather website or app.",
            "where are you from?": "I'm from the digital world!",
            "what's your favorite color?": "I don't have preferences, but I can help you find information about any color.",
            "how old are you?": "I don't have an age. I was created to assist you now!",
            "can you play music?": "I can't play music, but I can help you find music apps or services.",
            "what's the meaning of life?": "That's a deep question! Many believe it's about finding purpose and happiness.",
            "who created you?": "I was created by a team of developers to help answer questions and assist users.",
            "what is AI?": "AI stands for Artificial Intelligence. It's technology designed to simulate human intelligence.",
            "can you tell me a fact?": "Sure! Did you know honey never spoils? Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3,000 years old and still edible!",
            "how do I contact support?": "You can usually contact support via email or through the help section of the website or app.",
            "what's your favorite food?": "I don't eat, but I can help you find recipes or information about any food!",
            "can you set a reminder?": "I can't set reminders, but you can use a reminder app or your device's built-in features.",
            "What are the clinic hours?": "Our clinic is open from 9 AM to 5 PM, Monday through Friday.",
            "How do I make an appointment?": "You can make an appointment by calling us or using our online appointment system.",
            "Do you accept walk-ins?": "Yes, we do accept walk-ins, but we recommend making an appointment for faster service.",
            "What should I bring to my appointment?": "Please bring a valid ID, your insurance card, and any relevant medical records.",
            "Can I reschedule my appointment?": "Yes, you can reschedule by calling us at least 24 hours in advance.",
            "Do you offer telemedicine services?": "Yes, we offer telemedicine services. You can schedule a virtual appointment through our website.",
            "What insurance do you accept?": "We accept most major insurance providers. Please contact us to confirm if we accept your insurance.",
            "Do you have any payment plans?": "We offer flexible payment plans. Please speak to our billing department for more details.",
            "Can I get a prescription refill?": "Yes, you can request a prescription refill through our website or by calling our office.",
            "What is your cancellation policy?": "We require at least 24 hours' notice for cancellations. Failure to do so may result in a cancellation fee.",
            "Are your doctors board-certified?": "Yes, all our doctors are board-certified in their respective specialties.",
            "Do you offer lab tests on-site?": "Yes, we offer a range of lab tests on-site.",
            "How can I get my test results?": "You can obtain your test results by logging into your patient portal or by contacting our office.",
            "What is your policy on missed appointments?": "Missed appointments may incur a fee. Please inform us in advance if you cannot make it.",
            "How can I contact the doctor directly?": "You can contact the doctor through our office during business hours or via the patient portal.",
            "Do you offer any specialty services?": "Yes, we offer various specialty services. Please visit our website for a complete list.",
            "Can I bring a companion to my appointment?": "Yes, you can bring a companion with you to your appointment.",
            "What languages are spoken at the clinic?": "We have staff who speak multiple languages. Please let us know if you need assistance in a specific language.",
            "Do you have parking available?": "Yes, we have parking available for our patients.",
            "Can I update my personal information?": "Yes, you can update your personal information through our patient portal or by contacting our office.",
            "How do I prepare for my first visit?": "Please fill out the new patient forms available on our website before your first visit.",
            "What should I do if I have an emergency?": "In case of an emergency, please go to the nearest emergency room or call 911.",
            "How can I provide feedback about my visit?": "You can provide feedback through our website or by contacting our office directly.",
            "Do you offer immunizations?": "Yes, we offer a variety of immunizations. Please check with our office for availability.",
            "What is the process for filing an insurance claim?": "We will assist you with filing your insurance claim during your visit.",
            "Can I access my medical records online?": "Yes, you can access your medical records through our patient portal.",
            "Are there any additional fees for consultations?": "Consultation fees vary. Please contact our office for more information.",
            "Do you offer any discounts for new patients?": "We offer promotional discounts for new patients from time to time. Please inquire during your appointment.",
            "What happens if I need to cancel my appointment on short notice?": "Cancellation on short notice may incur a fee. Please contact us as soon as possible.",
            "Can I get a referral to a specialist?": "Yes, we can provide referrals to specialists if needed.",
            "How do I know if my appointment is confirmed?": "You will receive a confirmation email or call once your appointment is scheduled.",
            "Do you have a patient portal?": "Yes, we have a patient portal where you can manage your appointments, view test results, and more.",
            "How can I check if my insurance covers a procedure?": "You can contact your insurance provider or ask us to verify coverage for you.",
            "Can I get a copy of my medical records?": "Yes, you can request a copy of your medical records by contacting our office."
        };

        // Function to toggle the chatbox visibility
        function toggleChatbox() {
            chatContainer.classList.toggle("hidden");
            isChatboxOpen = !isChatboxOpen; // Toggle the state
        }

        // Add an event listener to the open chat button
        openChatButton.addEventListener("click", toggleChatbox);

        // Add an event listener to the close chat button
        closeChatButton.addEventListener("click", toggleChatbox);

        // Add an event listener to the send button
        sendButton.addEventListener("click", function() {
            const userMessage = userInput.value;
            if (userMessage.trim() !== "") {
                addUserMessage(userMessage);
                respondToUser(userMessage);
                userInput.value = "";
            }
        });

        userInput.addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                const userMessage = userInput.value;
                addUserMessage(userMessage);
                respondToUser(userMessage);
                userInput.value = "";
            }
        });

        function addUserMessage(message) {
            const messageElement = document.createElement("div");
            messageElement.classList.add("mb-2", "text-right");
            messageElement.innerHTML = `<p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
            chatbox.appendChild(messageElement);
            chatbox.scrollTop = chatbox.scrollHeight;
        }

        function addBotMessage(message) {
            const messageElement = document.createElement("div");
            messageElement.classList.add("mb-2");
            messageElement.innerHTML =
                `<p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">${message}</p>`;
            chatbox.appendChild(messageElement);
            chatbox.scrollTop = chatbox.scrollHeight;
        }

        function respondToUser(userMessage) {
            const response = qaPairs[userMessage] ||
                "I'm sorry, I didn't understand that. Could you please ask another question?";
            setTimeout(() => {
                addBotMessage(response);
            }, 500);
        }

        // Automatically open the chatbox on page load
        toggleChatbox();
    </script>

    @include('component.footer')
</body>
