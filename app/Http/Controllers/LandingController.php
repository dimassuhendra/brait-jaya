<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Advantage;
use App\Models\Testimonial;
use App\Models\ServiceArea;
use App\Models\Comment;
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

        return view('welcome', compact('hero', 'categories', 'advantages', 'testimonials'));
    }

    public function showService($id)
    {
        // Mengambil produk beserta relasi harga dan komentar yang sudah di-approve
        $service = Product::with(['category', 'prices', 'comments' => function ($q) {
            $q->where('is_approved', true)->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        // Navigasi Previous & Next
        $previous = Product::where('id', '<', $service->id)->orderBy('id', 'desc')->first();
        $next = Product::where('id', '>', $service->id)->orderBy('id', 'asc')->first();

        // Data untuk Sidebar
        $categories = Category::with('products')->get();
        $recentArticles = Product::orderBy('created_at', 'desc')->take(2)->get();
        $otherServices = Product::where('id', '!=', $service->id)->inRandomOrder()->take(8)->get();

        // Data Area Layanan (Bisa disesuaikan pengambilannya)
        $serviceAreas = ServiceArea::all();

        return view('service-detail', compact(
            'service',
            'previous',
            'next',
            'categories',
            'recentArticles',
            'otherServices',
            'serviceAreas'
        ));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'message' => 'required|string'
        ]);

        $comment = new Comment();
        $comment->product_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $comment->message = $request->message;
        $comment->is_approved = false; // Menunggu persetujuan admin
        $comment->save();

        return redirect()->back()->with('success', 'Pesan Anda telah dikirim dan sedang menunggu moderasi.');
    }
}
