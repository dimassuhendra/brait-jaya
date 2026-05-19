<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = DB::table('products')->count();
        $categoryCount = DB::table('categories')->count();

        // Mengambil jumlah log error atau temuan
        // Jika nilainya 0, maka akan diganti dengan placeholder 'ALL'
        $errorLogsRaw = DB::table('products')->whereNull('name')->count(); // Contoh query
        $errorDisplay = $errorLogsRaw === 0 ? 'ALL' : $errorLogsRaw;

        return view('admin.dashboard', compact('productCount', 'categoryCount', 'errorDisplay'));
    }
}
