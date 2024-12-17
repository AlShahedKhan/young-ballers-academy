<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Building Champions Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('building-champions.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Title Field -->
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block w-full mt-1" type="text" name="title" value="{{ old('title') }}" required autofocus />
                        <x-input-error for="title" :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description Field -->
                    <div>
                        <x-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="4" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('description') }}</textarea>
                        <x-input-error for="description" :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Image 1 Upload with Preview -->
                    <div>
                        <x-label for="image1" :value="__('Image 1')" />
                        <input id="image1" type="file" name="image1" class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" accept="image/*" onchange="previewImage(event, 'image1-preview')" />
                        <x-input-error for="image1" :messages="$errors->get('image1')" class="mt-2" />
                        <img id="image1-preview" class="mt-3 w-32 h-32 object-cover rounded hidden" alt="Image 1 Preview" />
                    </div>

                    <!-- Image 2 Upload with Preview -->
                    <div>
                        <x-label for="image2" :value="__('Image 2')" />
                        <input id="image2" type="file" name="image2" class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" accept="image/*" onchange="previewImage(event, 'image2-preview')" />
                        <x-input-error for="image2" :messages="$errors->get('image2')" class="mt-2" />
                        <img id="image2-preview" class="mt-3 w-32 h-32 object-cover rounded hidden" alt="Image 2 Preview" />
                    </div>

                    <!-- Logo Upload with Preview -->
                    <div>
                        <x-label for="logo" :value="__('Logo')" />
                        <input id="logo" type="file" name="logo" class="block w-full mt-1 border-gray-300 shadow-sm rounded-md" accept="image/*" onchange="previewImage(event, 'logo-preview')" />
                        <x-input-error for="logo" :messages="$errors->get('logo')" class="mt-2" />
                        <img id="logo-preview" class="mt-3 w-24 h-24 object-contain rounded-full hidden" alt="Logo Preview" />
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

    <!-- JavaScript for Image Previews -->
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
