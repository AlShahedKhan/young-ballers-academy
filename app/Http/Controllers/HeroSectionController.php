<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('hero_sections.index', compact('heroSections'));
    }

    public function create()
    {
        return view('hero_sections.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'hero_image' => 'required|image'
        ]);

        $heroSection = HeroSection::create($request->only('title', 'description'));

        if ($request->hasFile('hero_image')) {
            $heroSection->addMediaFromRequest('hero_image')->toMediaCollection('hero_image');
        }

        return redirect()->route('hero-sections.index');
    }

    public function edit(HeroSection $heroSection)
    {
        return view('hero_sections.edit', compact('heroSection'));
    }


    public function update(Request $request, HeroSection $heroSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'hero_image' => 'nullable|image'
        ]);

        $heroSection->update($request->only('title', 'description'));

        if ($request->hasFile('hero_image')) {
            $heroSection->clearMediaCollection('hero_image'); // Clear existing images
            $heroSection->addMediaFromRequest('hero_image')->toMediaCollection('hero_image'); // Add new image
        }

        return redirect()->route('hero-sections.index')->with('success', 'Hero Section updated successfully.');
    }

    public function destroy(HeroSection $heroSection)
    {
        $heroSection->delete();
        return redirect()->route('hero-sections.index')->with('success', 'Hero Section deleted successfully.');
    }
}
