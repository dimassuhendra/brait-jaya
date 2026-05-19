<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function index()
    {
        // Mengurutkan posisi dari nilai terkecil ke terbesar
        $advantages = Advantage::orderBy('order_position', 'asc')->get();
        return view('admin.advantages', compact('advantages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_position' => 'required|integer',
        ]);

        Advantage::create($request->all());

        return redirect()->route('admin.advantages.index')
            ->with('success', 'Poin keunggulan baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_position' => 'required|integer',
        ]);

        $advantage = Advantage::findOrFail($id);
        $advantage->update($request->all());

        return redirect()->route('admin.advantages.index')
            ->with('success', 'Poin keunggulan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $advantage = Advantage::findOrFail($id);
        $advantage->delete();

        return redirect()->route('admin.advantages.index')
            ->with('success', 'Poin keunggulan berhasil dihapus secara permanen.');
    }
}
