<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the file exists in storage
        $source = public_path('images/hero.jpg'); // Place the original file in public/images
        $destination = storage_path('app/public/images/hero.jpg');

        // Copy the file to storage
        if (!File::exists($destination)) {
            File::copy($source, $destination);
        }

        // Create the HeroSection entry
        $heroSection = HeroSection::create([
            'title' => 'Welcome to Young Ballers Academy',
            'description' => 'Unlock your full potential on the pitch...',
        ]);

        // Attach the file using Spatie MediaLibrary
        $heroSection->addMedia($destination)
                    ->toMediaCollection('hero_image');
    }
}
