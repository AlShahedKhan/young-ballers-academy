@include('frontend.layout')

<!-- Hero Section with Image -->
<section class="relative h-screen flex items-center">
    <!-- Image Background -->
    {{-- <img src="{{ asset('images/hero.jpg') }}" alt="Hero Background" class="absolute inset-0 w-full h-full object-cover"> --}}
    @forelse ($heroSections as $heroSection)
        @if ($heroSection->getFirstMediaUrl('hero_image'))
            <img src="{{ $heroSection->getFirstMediaUrl('hero_image') }}" alt="Hero Image"
                class="absolute inset-0 w-full h-full object-cover">
        @endif
    @endforeach

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 lg:px-16">
        <div class="w-full max-w-2xl">
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-white mb-4">
                Welcome to Young <br> Ballers Academy
            </h1>
            <!-- Description -->
            <p class="text-lg md:text-xl text-gray-100 mb-8">
                Unlock your full potential on the pitch with expert coaching, state-of-the-art facilities,
                and personalized training programs tailored to every skill level.
            </p>
            <!-- Button -->
            <a href="#"
                class="inline-block px-8 py-3 bg-gradient-to-r from-purple-400 to-teal-400 text-white font-semibold rounded-md shadow-md hover:opacity-90 transition">
                Start Training Today
            </a>
        </div>
    </div>
</section>

<!-- Section: Building Champions -->
<section class="py-12 lg:py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-16 flex flex-col lg:flex-row items-center gap-12">
        <!-- Left: Images -->
        <div class="flex gap-6 lg:w-1/2">
            <!-- First Image -->
            <div class="w-1/2">
                <img src="{{ asset('images/coach1.jpg') }}" alt="Training Image 1"
                    class="w-full h-auto rounded-lg shadow-md">
            </div>
            <!-- Second Image -->
            <div class="w-1/2 relative">
                <img src="{{ asset('images/coach2.jpg') }}" alt="Training Image 2"
                    class="w-full h-auto rounded-lg shadow-md">
                <!-- Logo -->
                <img src="{{ asset('images/logo.jpg') }}" alt="Academy Logo"
                    class="absolute bottom-0 right-0 w-16 h-16 lg:w-20 lg:h-20 rounded-full shadow-md">
            </div>
        </div>

        <!-- Right: Text Content -->
        <div class="lg:w-1/2">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-800 mb-6">
                Building Champions, On <br> and Off the Field
            </h2>
            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                At Young Ballers Academy, we believe football is more than just a sport – it’s a journey of
                discipline, teamwork, and passion. Our mission is to nurture talent, foster confidence, and instill
                a love for the beautiful game in every player we train.
            </p>
            <!-- Button -->
            <a href="#"
                class="inline-block px-6 py-3 bg-gradient-to-r from-purple-400 to-teal-400 text-white font-semibold rounded-md shadow-md hover:opacity-90 transition">
                Get In Touch
            </a>
        </div>
    </div>
</section>
