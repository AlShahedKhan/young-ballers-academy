<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('welcome', compact('heroSections'));
    }
}
