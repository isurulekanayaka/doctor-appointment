<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">

        <h2 class="font-bold text-2xl">E - <span class="bg-green-500 text-white px-2 rounded-md">Channeling</span></h2>
    </a>
    <ul class="mt-4">
        <span class="text-gray-400 font-bold">ADMIN</span>
        <li class="mb-1 group">
            <a href="{{ route('hospital.dashboard') }}"
                class="flex font-semibold items-center py-2 px-4 text-black hover:bg-blue-500 rounded-md">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>

        <span class="text-gray-400 font-bold">Pages</span>
        <li class="mb-1 group">
            <a href="{{ route('hospital.appointment') }}"
                class="flex font-semibold items-center py-2 px-4 text-black hover:bg-blue-500 rounded-md">
                <img src="{{ asset('icon/appointment.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="hospital Icon">
                <span class="text-sm">Appointment</span>
            </a>
        </li>
        <li class="mb-1 group">
            <ul class="">
                <a href="{{ route('hospital.doctor') }}"
                    class="flex font-semibold items-center py-2 px-4 text-black hover:bg-blue-500 rounded-md">
                    <img src="{{ asset('icon/doctor.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="Doctor Icon">
                    <span class="text-sm">Doctors</span>
                </a>
                <li class="px-10 text-black rounded-md whitespace-nowrap">
                    <a href="{{ route('hospital.doctorAddHospital')}}" class="hover:bg-blue-500 px-2 py-2 rounded-md">
                       -> Add Doctor
                    </a>
                </li>
                <li class="py-1 px-10 text-black rounded-md whitespace-nowrap">
                    <a href="{{ route('hospital.addDoctor') }}"  class="hover:bg-blue-500 px-2 py-2 rounded-md">
                        -> Register Doctor
                    </a>
                </li>
            </ul>
        </li>
               
        <li class="mb-1 group">
            <a href="{{ route('hospital.channeling') }}"
                class="flex font-semibold items-center py-2 px-4 text-black hover:bg-blue-500 rounded-md">
                <img src="{{ asset('icon/profile-black.png') }}" class="w-6 h-6 text-blue-500 mr-3"
                    alt="channeling Icon">
                <span class="text-sm">Channeling</span>
            </a>
        </li>
        {{-- <li class="mb-1 group">
            <a href="{{ route('hospital.payment') }}"
                class="flex font-semibold items-center py-2 px-4 text-black hover:bg-blue-500 rounded-md">
                <img src="{{ asset('icon/payment.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="payment Icon">
                <span class="text-sm">Payment Summery</span>
            </a>
        </li> --}}
        <span class="text-gray-400 font-bold">Setting</span>
        <li class="mb-1 group">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="flex font-semibold items-center py-2 px-4 text-black hover:bg-blue-500 rounded-md">
                    <img src="{{ asset('icon/logout.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="logout Icon">
                    <span class="text-sm">Log out</span>
                </button>
            </form>
        </li>
    </ul>
</div>
