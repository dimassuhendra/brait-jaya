<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori Utama
        $catInfrastructure = Category::create(['name' => 'Infrastructure & Server', 'slug' => 'infrastructure-server']);
        $catSecurity = Category::create(['name' => 'Security System', 'slug' => 'security-system']);
        $catSoftware = Category::create(['name' => 'Software Development', 'slug' => 'software-development']);
        $catNetworking = Category::create(['name' => 'Networking', 'slug' => 'networking']);

        // 2. Data Produk/Layanan
        $products = [
            [
                'category_id' => $catInfrastructure->id,
                'name' => 'NAS & File Server Integration',
                'short_description' => 'Solusi penyimpanan data terpusat untuk kolaborasi tim yang aman dan efisien.',
                'long_description' => 'Kami menyediakan layanan instalasi NAS Server menggunakan perangkat kelas industri. Cocok untuk kantor yang membutuhkan sinkronisasi data real-time, backup otomatis, dan akses data jarak jauh yang aman.',
                'features' => ['Backup Otomatis', 'Akses Remote Aman', 'Redundansi Data (RAID)', 'User Management'],
                'image' => 'products/nas-server.jpg',
            ],
            [
                'category_id' => $catSecurity->id,
                'name' => 'Smart CCTV Surveillance',
                'short_description' => 'Sistem monitoring keamanan 24/7 dengan akses langsung dari perangkat mobile Anda.',
                'long_description' => 'Instalasi CCTV profesional dengan teknologi IP Camera termutakhir. Mendukung fitur deteksi gerak, night vision, dan penyimpanan cloud maupun lokal.',
                'features' => ['High Definition 4K', 'Mobile Apps Monitoring', 'Night Vision Ganda', 'Motion Detection'],
                'image' => 'products/cctv-system.jpg',
            ],
            [
                'category_id' => $catNetworking->id,
                'name' => 'Enterprise Office Networking',
                'short_description' => 'Pembangunan infrastruktur jaringan LAN/WLAN yang stabil untuk mendukung produktivitas.',
                'long_description' => 'Pemasangan jaringan kantor skala menengah hingga besar menggunakan perangkat MikroTik/Ubiquiti. Termasuk manajemen bandwidth dan sistem keamanan firewall.',
                'features' => ['Manajemen Bandwidth', 'Hotspot Gateway', 'Load Balancing', 'Firewall Security'],
                'image' => 'products/networking.jpg',
            ],
            [
                'category_id' => $catSoftware->id,
                'name' => 'Custom Web & App Development',
                'short_description' => 'Transformasikan ide bisnis Anda menjadi platform digital yang responsif dan powerful.',
                'long_description' => 'Pembuatan website company profile, e-commerce, hingga sistem informasi manajemen yang dibangun menggunakan framework Laravel.',
                'features' => ['Responsive Design', 'SEO Optimized', 'Integrasi API', 'Dashboard Admin Custom'],
                'image' => 'products/software-dev.jpg',
            ],
        ];

        foreach ($products as $p) {
            Product::create([
                'category_id' => $p['category_id'],
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'image' => $p['image'],
                'short_description' => $p['short_description'],
                'long_description' => $p['long_description'],
                'features' => json_encode($p['features']), // Cast ke JSON
                'is_active' => true,
            ]);
        }
    }
}
