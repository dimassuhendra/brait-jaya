<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Advantage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Mengambil data aktif dari database
        $hero = HeroSection::where('is_active', true)->first();
        $categories = Category::with(['products.portfolios'])->get();
        $advantages = Advantage::orderBy('order_position', 'asc')->get();
        $testimonials = Testimonial::latest()->get();

        return view('welcome', compact('hero', 'categories', 'advantages', 'testimonials'));    }
}
