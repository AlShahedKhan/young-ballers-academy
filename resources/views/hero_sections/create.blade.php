<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Hero Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('hero-sections.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Title Field -->
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block w-full mt-1" type="text" name="title" required autofocus />
                        <x-input-error for="title" :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description Field -->
                    <div>
                        <x-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="4" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                        <x-input-error for="description" :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Hero Image Upload -->
                    <div>
                        <x-label for="hero_image" :value="__('Hero Image')" />
                        <input id="hero_image" type="file" name="hero_image" class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" required />
                        <x-input-error for="hero_image" :messages="$errors->get('hero_image')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end">
                        <x-button>
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
