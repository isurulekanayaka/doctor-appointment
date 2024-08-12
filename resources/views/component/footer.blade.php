<footer class="flex items-center justify-center w-screen bg-blue-950">
    <div class="w-[1275px]">
        <div class="justify-between gap-24 px-5 py-6 md:px-0 md:flex ">
            <div class="w-3/5">
                <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                <a href="{{ route('userhome.index') }}"><img src="{{ asset('images/dlogo.png') }}" alt="" class="w-24 h-24"></a>
                <h3 class="mt-2 font-mono text-slate-300">+94 71 0 288 225</h3>
                <h3 class="mt-2 text-slate-300 text-nowrap">info@doctorchannelling.com</h3>
                <h3 class="mt-2 text-slate-300 text-nowrap">doctorchannelling PLC, No: 108,</h3>
                <h3 class="text-slate-300">W A D Ramanayake Mawatha,</h3>
                <h3 class="text-slate-300">Colombo 2, Sri Lanka.</h3>
            </div>
            <div class="w-1/5 md:flex md:flex-col">
                <h2 class="text-white">Other</h2>
                <a href="{{route('userabout')}}" class="mt-2 text-slate-300 hover:text-white">About</a>
                <a href="{{route('userfqa')}}" class="mt-2 text-slate-300 hover:text-white">FQA</a>
                <a href="{{route('usercontact.index')}}" class="mt-2 text-slate-300 hover:text-white">Contact Us</a>
                <a href="{{route('userchannel.index')}}" class="mt-2 text-slate-300 hover:text-white">Channel</a>
            </div>
            <div class="w-1/5">
                <h2 class="mb-2 text-white">Social Media</h2>
                <div class="gap-3 social-icons md:flex md:flex-col">
                    <a href="https://facebook.com" class="text-slate-300 hover:text-white"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" class="text-slate-300 hover:text-white"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" class="text-slate-300 hover:text-white"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" class="text-slate-300 hover:text-white"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div>
            <hr>
            <div class="my-5">
                <h3 class="text-center text-white">2024 All Right Reserved</h3>
            </div>
        </div>

    </div>
</footer>
