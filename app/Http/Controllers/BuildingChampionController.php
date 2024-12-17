<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingChampion;
use Illuminate\Support\Facades\Storage;

class BuildingChampionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildingChampions = BuildingChampion::all();
        return view('building_champions.index', compact('buildingChampions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('building_champions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        // Handle file uploads and save file paths
        $image1Path = $request->hasFile('image1') ? $request->file('image1')->store('images', 'public') : null;
        $image2Path = $request->hasFile('image2') ? $request->file('image2')->store('images', 'public') : null;
        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('images', 'public') : null;

        // Create the record
        BuildingChampion::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image1' => $image1Path,
            'image2' => $image2Path,
            'logo' => $logoPath,
        ]);

        return redirect()->route('building-champions.index')->with('success', 'Building Champions section created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuildingChampion $buildingChampion)
    {
        return view('building_champions.edit', compact('buildingChampion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuildingChampion $buildingChampion)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        // Handle file uploads and delete old files if new ones are uploaded
        if ($request->hasFile('image1')) {
            if ($buildingChampion->image1) {
                Storage::disk('public')->delete($buildingChampion->image1);
            }
            $buildingChampion->image1 = $request->file('image1')->store('images', 'public');
        }

        if ($request->hasFile('image2')) {
            if ($buildingChampion->image2) {
                Storage::disk('public')->delete($buildingChampion->image2);
            }
            $buildingChampion->image2 = $request->file('image2')->store('images', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($buildingChampion->logo) {
                Storage::disk('public')->delete($buildingChampion->logo);
            }
            $buildingChampion->logo = $request->file('logo')->store('images', 'public');
        }

        // Update the record
        $buildingChampion->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('building-champions.index')->with('success', 'Building Champions section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuildingChampion $buildingChampion)
    {
        // Delete associated files
        if ($buildingChampion->image1) {
            Storage::disk('public')->delete($buildingChampion->image1);
        }

        if ($buildingChampion->image2) {
            Storage::disk('public')->delete($buildingChampion->image2);
        }

        if ($buildingChampion->logo) {
            Storage::disk('public')->delete($buildingChampion->logo);
        }

        // Delete the record
        $buildingChampion->delete();

        return redirect()->route('building-champions.index')->with('success', 'Building Champions section deleted successfully!');
    }
}
