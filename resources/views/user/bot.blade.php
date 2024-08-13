 <!-- component -->
 <div class="fixed bottom-0 right-0 mb-4 mr-4">
     <button id="open-chat"
         class=" text-white py-2 px-4 rounded-md transition duration-300 flex items-center cursor-default">
         <img src="{{ asset('icon/chat-bot.png') }}" class="w-24 h-24 cursor-pointer" alt="Specialization Icon">
     </button>
 </div>
 <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96">
     <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
         <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
             <p class="text-lg font-semibold">Admin Bot</p>
             <button id="close-chat" class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
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
         "how are you": "I'm good, thank you!",
         "what's your name": "I'm a chatbot created to assist you.",
         "what can you do": "I can help answer your questions and provide information.",
         "bye": "Goodbye! Have a great day!",
         "thank you": "You're welcome!",
         "help": "How can I assist you today?",
         "what time is it": "I'm not sure about the exact time, but you can check your device's clock.",
         "tell me a joke": "Why don't scientists trust atoms? Because they make up everything!",
         "what's the weather like": "I don't have real-time weather information. Please check a weather website or app.",
         "where are you from": "I'm from the digital world!",
         "what's your favorite color": "I don't have preferences, but I can help you find information about any color.",
         "how old are you": "I don't have an age. I was created to assist you now!",
         "can you play music": "I can't play music, but I can help you find music apps or services.",
         "what's the meaning of life": "That's a deep question! Many believe it's about finding purpose and happiness.",
         "who created you": "I was created by a team of developers to help answer questions and assist users.",
         "what is ai": "AI stands for Artificial Intelligence. It's technology designed to simulate human intelligence.",
         "can you tell me a fact": "Sure! Did you know honey never spoils? Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3,000 years old and still edible!",
         "how do i contact support": "You can usually contact support via email or through the help section of the website or app.",
         "what's your favorite food": "I don't eat, but I can help you find recipes or information about any food!",
         "can you set a reminder": "I can't set reminders, but you can use a reminder app or your device's built-in features.",
         "what are the clinic hours": "Our clinic is open from 9 AM to 5 PM, Monday through Friday.",
         "how do i make an appointment": "You can make an appointment by calling us or using our online appointment system.",
         "do you accept walk-ins": "Yes, we do accept walk-ins, but we recommend making an appointment for faster service.",
         "what should i bring to my appointment": "Please bring a valid ID, your insurance card, and any relevant medical records.",
         "can i reschedule my appointment": "Yes, you can reschedule by calling us at least 24 hours in advance.",
         "do you offer telemedicine services": "Yes, we offer telemedicine services. You can schedule a virtual appointment through our website.",
         "what insurance do you accept": "We accept most major insurance providers. Please contact us to confirm if we accept your insurance.",
         "do you have any payment plans": "We offer flexible payment plans. Please speak to our billing department for more details.",
         "can i get a prescription refill": "Yes, you can request a prescription refill through our website or by calling our office.",
         "what is your cancellation policy": "We require at least 24 hours' notice for cancellations. Failure to do so may result in a cancellation fee.",
         "are your doctors board-certified": "Yes, all our doctors are board-certified in their respective specialties.",
         "do you offer lab tests on-site": "Yes, we offer a range of lab tests on-site.",
         "how can i get my test results": "You can obtain your test results by logging into your patient portal or by contacting our office.",
         "what is your policy on missed appointments": "Missed appointments may incur a fee. Please inform us in advance if you cannot make it.",
         "how can i contact the doctor directly": "You can contact the doctor through our office during business hours or via the patient portal.",
         "do you offer any specialty services": "Yes, we offer various specialty services. Please visit our website for a complete list.",
         "can i bring a companion to my appointment": "Yes, you can bring a companion with you to your appointment.",
         "what languages are spoken at the clinic": "We have staff who speak multiple languages. Please let us know if you need assistance in a specific language.",
         "do you have parking available": "Yes, we have parking available for our patients.",
         "can i update my personal information": "Yes, you can update your personal information through our patient portal or by contacting our office.",
         "how do i prepare for my first visit": "Please fill out the new patient forms available on our website before your first visit.",
         "what should i do if i have an emergency": "In case of an emergency, please go to the nearest emergency room or call 911.",
         "how can i provide feedback about my visit": "You can provide feedback through our website or by contacting our office directly.",
         "do you offer immunizations": "Yes, we offer a variety of immunizations. Please check with our office for availability.",
         "what is the process for filing an insurance claim": "We will assist you with filing your insurance claim during your visit.",
         "can i access my medical records online": "Yes, you can access your medical records through our patient portal.",
         "are there any additional fees for consultations": "Consultation fees vary. Please contact our office for more information.",
         "do you offer any discounts for new patients": "We offer promotional discounts for new patients from time to time. Please inquire during your appointment.",
         "what happens if i need to cancel my appointment on short notice": "Cancellation on short notice may incur a fee. Please contact us as soon as possible.",
         "can i get a referral to a specialist": "Yes, we can provide referrals to specialists if needed.",
         "how do i know if my appointment is confirmed": "You will receive a confirmation email or call once your appointment is scheduled.",
         "do you have a patient portal": "Yes, we have a patient portal where you can manage your appointments, view test results, and more.",
         "how can i check if my insurance covers a procedure": "You can contact your insurance provider or ask us to verify coverage for you.",
         "can i get a copy of my medical records": "Yes, you can request a copy of your medical records by contacting our office."
     };

     // Function to normalize and clean up user input
     function normalizeInput(input) {
         return input.toLowerCase().replace(/[^\w\s]/g, '').trim();
     }

     // Function to toggle the chatbox visibility
     function toggleChatbox() {
         chatContainer.classList.toggle("hidden");
         isChatboxOpen = !isChatboxOpen; // Toggle the state
     }

     // Add event listeners to buttons
     openChatButton.addEventListener("click", toggleChatbox);
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

     // Add an event listener to handle "Enter" key for sending messages
     userInput.addEventListener("keyup", function(event) {
         if (event.key === "Enter") {
             const userMessage = userInput.value;
             if (userMessage.trim() !== "") {
                 addUserMessage(userMessage);
                 respondToUser(userMessage);
                 userInput.value = "";
             }
         }
     });

     // Function to add user message to chatbox
     function addUserMessage(message) {
         const messageElement = document.createElement("div");
         messageElement.classList.add("mb-2", "text-right");
         messageElement.innerHTML = `<p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
         chatbox.appendChild(messageElement);
         chatbox.scrollTop = chatbox.scrollHeight;
     }

     // Function to add bot response to chatbox
     function addBotMessage(message) {
         const messageElement = document.createElement("div");
         messageElement.classList.add("mb-2");
         messageElement.innerHTML =
             `<p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">${message}</p>`;
         chatbox.appendChild(messageElement);
         chatbox.scrollTop = chatbox.scrollHeight;
     }

     // Function to handle bot responses based on user input
     function respondToUser(userMessage) {
         const normalizedInput = normalizeInput(userMessage);
         const response = Object.keys(qaPairs).find(key => normalizedInput.includes(key)) ||
             "Sorry, I didn't understand that.";
         addBotMessage(qaPairs[response] || response);
     }
 </script>
