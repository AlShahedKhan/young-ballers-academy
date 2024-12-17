<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Building Champions') }}
            </h2>
            @if ($buildingChampions->isEmpty())
                <x-button>
                    <a href="{{ route('building-champions.create') }}">
                        {{ __('Create') }}
                    </a>
                </x-button>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @forelse ($buildingChampions as $champion)
                    <!-- Building Champions Section -->
                    <div class="mb-6 border-b pb-4">
                        <!-- Title -->
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                            <x-label>{{ __('Title') }}</x-label>
                            {{ $champion->title }}
                        </h2>

                        <!-- Description -->
                        <p class="text-gray-600 mb-4">
                            <x-label>{{ __('Description') }}</x-label>
                            {{ $champion->description }}
                        </p>

                        <!-- Images -->
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <!-- Image 1 -->
                            @if ($champion->image1)
                                <div>
                                    <x-label>{{ __('Image 1') }}</x-label>
                                    <img src="{{ asset('storage/' . $champion->image1) }}" alt="Image 1"
                                        class="w-full h-32 object-cover rounded">
                                </div>
                            @endif

                            <!-- Image 2 -->
                            @if ($champion->image2)
                                <div>
                                    <x-label>{{ __('Image 2') }}</x-label>
                                    <img src="{{ asset('storage/' . $champion->image2) }}" alt="Image 2"
                                        class="w-full h-32 object-cover rounded">
                                </div>
                            @endif

                            <!-- Logo -->
                            @if ($champion->logo)
                                <div>
                                    <x-label>{{ __('Logo') }}</x-label>
                                    <img src="{{ asset('storage/' . $champion->logo) }}" alt="Logo"
                                        class="w-24 h-24 object-contain rounded-full mx-auto">
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-4">
                            <!-- Edit Button -->
                            <x-button>
                                <a href="{{ route('building-champions.edit', $champion) }}">
                                    {{ __('Update') }}
                                </a>
                            </x-button>

                            <!-- Delete Button -->
                            <form action="{{ route('building-champions.destroy', $champion->id) }}" method="POST"
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
                        {{ __('No Building Champions sections found.') }}
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
