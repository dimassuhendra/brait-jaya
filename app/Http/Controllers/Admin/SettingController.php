<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        // Mengambil data pengaturan (asumsi menggunakan tabel site_settings)
        $settings = DB::table('site_settings')->first() ?? (object)[
            'hero_title' => '',
            'hero_subtitle' => '',
            'hero_video_url' => '',
            'hero_cta_text' => '',
            'contact_address' => '',
            'contact_email' => '',
            'contact_whatsapp' => ''
        ];

        return view('admin.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string',
            'hero_video_url' => 'required|url',
            'hero_cta_text' => 'required|string|max:50',
            'contact_address' => 'required|string',
            'contact_email' => 'required|email',
            'contact_whatsapp' => 'required|string',
        ]);

        $settings = DB::table('site_settings')->first();

        if ($settings) {
            DB::table('site_settings')->where('id', $settings->id)->update($data);
        } else {
            DB::table('site_settings')->insert($data);
        }

        return back()->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
