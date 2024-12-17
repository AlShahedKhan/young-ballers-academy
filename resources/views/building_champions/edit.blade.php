<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Building Champions Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('building-champions.update', $buildingChampion->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block w-full mt-1" type="text" name="title"
                            value="{{ $buildingChampion->title }}" required autofocus />
                        <x-input-error for="title" :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description Field -->
                    <div>
                        <x-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="4"
                            class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ $buildingChampion->description }}</textarea>
                        <x-input-error for="description" :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Image 1 Upload -->
                    <div>
                        <x-label for="image1" :value="__('Image 1')" />
                        <input id="image1" type="file" name="image1"
                            class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" />
                        <x-input-error for="image1" :messages="$errors->get('image1')" class="mt-2" />
                        @if ($buildingChampion->image1)
                            <img src="{{ asset('storage/' . $buildingChampion->image1) }}" alt="Image 1" class="w-32 h-32 mt-3 rounded">
                        @endif
                    </div>

                    <!-- Image 2 Upload -->
                    <div>
                        <x-label for="image2" :value="__('Image 2')" />
                        <input id="image2" type="file" name="image2"
                            class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" />
                        <x-input-error for="image2" :messages="$errors->get('image2')" class="mt-2" />
                        @if ($buildingChampion->image2)
                            <img src="{{ asset('storage/' . $buildingChampion->image2) }}" alt="Image 2" class="w-32 h-32 mt-3 rounded">
                        @endif
                    </div>

                    <!-- Logo Upload -->
                    <div>
                        <x-label for="logo" :value="__('Logo')" />
                        <input id="logo" type="file" name="logo"
                            class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" />
                        <x-input-error for="logo" :messages="$errors->get('logo')" class="mt-2" />
                        @if ($buildingChampion->logo)
                            <img src="{{ asset('storage/' . $buildingChampion->logo) }}" alt="Logo" class="w-24 h-24 mt-3 rounded-full">
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end">
                        <x-button type="submit">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
