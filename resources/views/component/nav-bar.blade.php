
    <nav class="flex items-center justify-center w-screen h-20 font-serif bg-slate-100">
        <div class="w-[1275px] flex justify-between px-5 md:px-0 py-6 ">
            <div class="flex items-center w-full">
                <a class="text-3xl font-bold text-green-500" href="#">
                    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                    Logo Here.
                </a>
                <!-- Nav Links -->
                <ul class="hidden px-4 mx-auto space-x-12 font-semibold text-blue-500 md:flex">
                    <li><a class="hover:text-blue-700" href="#">Home</a></li>
                    <li><a class="hover:text-blue-700" href="#">Category</a></li>
                    <li><a class="hover:text-blue-700" href="#">Collections</a></li>
                    <li><a class="hover:text-blue-700" href="#">Contact Us</a></li>
                </ul>
            </div>
            <!-- Sign In / Register      -->
            <div class="flex gap-5 mr-8 md:mr-1">
                <div class="relative group">
                    <a class="flex items-center justify-center px-5 text-center text-white bg-blue-500 border border-blue-500 w-28 rounded-xl group-hover:text-blue-500 group-hover:bg-white"
                        href="#">
                        Login
                        <svg class="hidden w-4 h-4 ml-2 group-hover:block" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <a class="self-center navbar-burger md:hidden" href="#" onclick="openmenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-blue-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>
    <!-- Responsive Menu -->
    <div id="responsive-menu" class="fixed flex flex-col hidden bg-white border right-5 xl:hidden">
        <a class="flex w-full h-8 px-4 hover:text-blue-700 hover:bg-slate-100" href="#">Home</a>
        <a class="flex w-full h-8 px-4 hover:text-blue-700 hover:bg-slate-100" href="#">Collections</a>
        <a class="flex w-full h-8 px-4 hover:text-blue-700 hover:bg-slate-100" href="#">Contact Us</a>
        <a class="flex w-full h-8 px-4 hover:text-blue-700 hover:bg-slate-100" href="#">Category</a>
    </div>


    <script>
        function openmenu() {
                const menu = document.getElementById('responsive-menu');
                menu.classList.toggle('hidden');
            }
    </script>
