<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Hero Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('hero-sections.update', $heroSection) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <x-label for="title" :value="__('Title')" />
                    <x-input id="title" class="block w-full mt-1" type="text" name="title"
                        value="{{ $heroSection->title }}" required autofocus />

                    <x-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" rows="4" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ $heroSection->description }}</textarea>

                    <x-label for="hero_image" :value="__('Hero Image')" />
                    <input id="hero_image" type="file" name="hero_image" class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" required />
                    @if ($heroSection->getFirstMediaUrl('hero_image'))
                        <img src="{{ $heroSection->getFirstMediaUrl('hero_image') }}" width="200">
                    @endif

                    {{-- <button type="submit">Update</button> --}}
                    <div class="flex items-center justify-center">
                        <x-button type="submit">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
