<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kategori
        $catInfra = Category::create(['name' => 'Infrastructure & Server', 'slug' => 'infrastructure-server']);
        $catSecurity = Category::create(['name' => 'Security System', 'slug' => 'security-system']);
        $catSoftware = Category::create(['name' => 'Software Development', 'slug' => 'software-development']);
        $catNetwork = Category::create(['name' => 'Networking', 'slug' => 'networking']);

        // 2. Produk (Dibuat lebih banyak per kategori)
        $productsData = [
            // Infrastructure
            ['cat' => $catInfra->id, 'name' => 'NAS Storage Server', 'desc' => 'Penyimpanan terpusat aman.', 'feat' => ['RAID Support', 'Auto Backup']],
            ['cat' => $catInfra->id, 'name' => 'Web Server Custom', 'desc' => 'Setup server Linux/Windows.', 'feat' => ['Nginx/Apache', 'SSL Setup']],
            ['cat' => $catInfra->id, 'name' => 'Cloud Hosting', 'desc' => 'Hosting performa tinggi.', 'feat' => ['99.9% Uptime', 'DDoS Protection']],
            // Security
            ['cat' => $catSecurity->id, 'name' => 'Smart CCTV IP Camera', 'desc' => 'Kamera pengawas resolusi tinggi.', 'feat' => ['4K Vision', 'Mobile App']],
            ['cat' => $catSecurity->id, 'name' => 'Access Control (Door Lock)', 'desc' => 'Sistem pintu akses biometrik.', 'feat' => ['Fingerprint', 'RFID Card']],
            ['cat' => $catSecurity->id, 'name' => 'Alarm System Terpadu', 'desc' => 'Alarm anti-maling otomatis.', 'feat' => ['Motion Sensor', 'Sirine']],
            // Networking
            ['cat' => $catNetwork->id, 'name' => 'Enterprise LAN Installation', 'desc' => 'Jaringan kabel kantor stabil.', 'feat' => ['Gigabit Speed', 'Cable Management']],
            ['cat' => $catNetwork->id, 'name' => 'Bandwidth Management', 'desc' => 'Pembagian internet merata (MikroTik).', 'feat' => ['Queue Tree', 'Firewall']],
            ['cat' => $catNetwork->id, 'name' => 'Fiber Optic Point-to-Point', 'desc' => 'Koneksi antar gedung jarak jauh.', 'feat' => ['Low Latency', 'High Speed']],
            // Software
            ['cat' => $catSoftware->id, 'name' => 'Company Profile Website', 'desc' => 'Web modern untuk identitas bisnis.', 'feat' => ['Responsive', 'SEO Friendly']],
            ['cat' => $catSoftware->id, 'name' => 'Sistem ERP Custom', 'desc' => 'Aplikasi manajemen sumber daya.', 'feat' => ['Database Terpusat', 'Realtime Chart']],
            ['cat' => $catSoftware->id, 'name' => 'E-Commerce Platform', 'desc' => 'Toko online dengan payment gateway.', 'feat' => ['Cart System', 'Midtrans Integration']],
        ];

        $products = [];
        foreach ($productsData as $p) {
            $products[] = Product::create([
                'category_id' => $p['cat'],
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'image' => null, // Biarkan null agar pakai fallback UI
                'short_description' => $p['desc'],
                'long_description' => 'Detail deskripsi ' . $p['name'],
                'features' => $p['feat'], // Sudah otomatis jadi JSON karena $casts di Model
                'is_active' => true,
            ]);
        }

        // 3. Portofolio dummy untuk ditampilkan di sisi kanan
        $portfoliosData = [
            ['title' => 'Instalasi Jaringan Gedung Pemkot', 'client' => 'Pemerintah Daerah'],
            ['title' => 'Sistem CCTV Gudang Logistik', 'client' => 'PT. Logistik Cepat'],
            ['title' => 'Pembuatan Web Portal Berita', 'client' => 'Media Nasional'],
            ['title' => 'Setup NAS Server Farmasi', 'client' => 'Klinik Sehat'],
        ];

        foreach ($portfoliosData as $idx => $portData) {
            $portfolio = Portfolio::create([
                'title' => $portData['title'],
                'client_name' => $portData['client'],
                'image' => null,
                'description' => 'Deskripsi proyek ' . $portData['title'],
                'project_date' => now()->subMonths(rand(1, 10)),
            ]);

            // Kaitkan portofolio ke beberapa produk secara acak agar muncul di kategori yang sesuai
            $portfolio->products()->attach([$products[$idx * 3]->id, $products[($idx * 3) + 1]->id]);
        }
    }
}
