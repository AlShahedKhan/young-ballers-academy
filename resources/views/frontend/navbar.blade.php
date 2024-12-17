<!-- resources/views/navbar.blade.php -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-2xl font-bold">
            <span class="text-purple-600 tracking-wide">YOUNG</span>
            <span class="text-teal-400">BALLERS ACADEMY</span>
        </a>

        <!-- Menu Items -->
        <ul class="hidden md:flex space-x-8 font-semibold text-gray-600">
            <li><a href="#" class="hover:text-gray-800 transition">HOME</a></li>
            <li><a href="#" class="hover:text-gray-800 transition">ABOUT US</a></li>
            <li><a href="#" class="hover:text-gray-800 transition">MEMBERSHIP</a></li>
            <li><a href="#" class="hover:text-gray-800 transition">WHY USE US</a></li>
        </ul>

        <!-- Buttons: Login, Register, Contact Us -->
        <div class="flex space-x-4 items-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-gray-600 hover:text-gray-800 transition font-semibold">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-gray-600 font-semibold hover:text-gray-800 transition">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="text-gray-600 font-semibold hover:text-gray-800 transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif

            <a href="#"
               class="bg-gradient-to-r from-purple-400 to-teal-400 text-white px-6 py-2 rounded-full hover:opacity-90 transition">
                CONTACT US
            </a>
        </div>
    </div>
</nav>
