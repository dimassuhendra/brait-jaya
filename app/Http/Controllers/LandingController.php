<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Product;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Mengambil data aktif dari database
        $hero = HeroSection::where('is_active', true)->first();
        $categories = \App\Models\Category::with(['products.portfolios'])->get();

        return view('welcome', compact('hero', 'categories'));
    }
}
