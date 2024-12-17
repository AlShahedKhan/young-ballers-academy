<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Hero Sections') }}
            </h2>
            @if ($heroSections->isEmpty())
                <x-button>
                    <a href="{{ route('hero-sections.create') }}">
                        {{ __('Create') }}
                    </a>
                </x-button>
            @endif



        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @forelse ($heroSections as $heroSection)
                    <!-- Hero Section Item -->
                    <div class="mb-6 border-b pb-4">
                        <!-- Title -->
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                            <x-label>{{ __('Title') }}</x-label>
                            {{ $heroSection->title }}
                        </h2>

                        <!-- Description -->
                        <p class="text-gray-600 mb-4">
                            <x-label>{{ __('Description') }}</x-label>
                            {{ $heroSection->description }}
                        </p>

                        <x-label>{{ __('Hero Image') }}</x-label>
                        <!-- Hero Image -->
                        @if ($heroSection->getFirstMediaUrl('hero_image'))
                            <img src="{{ $heroSection->getFirstMediaUrl('hero_image') }}" alt="Hero Image"
                                class="w-full h-48 object-cover rounded mb-4">
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex space-x-4">
                            <!-- Edit Button -->
                            <x-button>
                                <a href="{{ route('hero-sections.edit', $heroSection) }}">
                                    {{ __('Update') }}
                                </a>
                            </x-button>

                            <!-- Delete Button -->
                            <form action="{{ route('hero-sections.destroy', $heroSection->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>


                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-center">
                        {{ __('No Hero Sections found.') }}
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
