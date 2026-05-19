@extends('layouts.admin-app')

@section('title', 'Katalog Layanan')

@section('content')
    <div class="p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Katalog Produk & Layanan</h2>
                <p class="text-slate-500 text-sm mt-1">Kelola portofolio, gambar, dan deskripsi produk.</p>
            </div>
            <button onclick="openAddModal()"
                class="bg-brand-primary hover:bg-[#e68a00] text-white font-bold py-2.5 px-6 rounded-lg transition-colors shadow-lg shadow-brand-primary/30 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Data
            </button>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white text-sm uppercase tracking-wider">
                        <th class="p-4 font-semibold">Visual</th>
                        <th class="p-4 font-semibold">Nama Item</th>
                        <th class="p-4 font-semibold">Kategori</th>
                        <th class="p-4 font-semibold text-right">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @foreach ($products as $product)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="w-16 h-16 object-cover rounded-lg border border-slate-200 shadow-sm">
                                @else
                                    <div
                                        class="w-16 h-16 bg-slate-100 rounded-lg border border-slate-200 flex items-center justify-center text-slate-400 text-xs font-bold">
                                        N/A</div>
                                @endif
                            </td>
                            <td class="p-4 font-bold text-slate-800">{{ $product->name }}</td>
                            <td class="p-4"><span
                                    class="bg-brand-primary/10 text-brand-primary border border-brand-primary/20 py-1 px-3 rounded-full text-xs font-bold">{{ $product->category_name }}</span>
                            </td>
                            <td class="p-4 text-right flex justify-end gap-2 items-center h-full pt-6">
                                <button onclick="openEditModal({{ json_encode($product) }})"
                                    class="p-2 bg-slate-100 text-slate-600 hover:text-brand-primary hover:bg-brand-primary/10 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus data ini secara permanen?');" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="p-2 bg-slate-100 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal_overlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 hidden transition-opacity"
        onclick="closeModals()"></div>

    <div id="modal_add"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden flex-col max-h-[90vh]">
        <div class="bg-slate-900 px-6 py-4 flex justify-between items-center">
            <h3 class="text-white font-bold text-lg">Tambah Data Layanan</h3>
            <button onclick="closeModals()" class="text-slate-400 hover:text-white"><svg class="w-6 h-6" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg></button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Layanan</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                        <select name="category_id" required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Layanan</label>
                    <textarea name="long_description" rows="4" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Unggah Foto (Opsional)</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-primary/10 file:text-brand-primary hover:file:bg-brand-primary hover:file:text-white transition-all cursor-pointer border border-slate-200 rounded-lg">
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeModals()"
                        class="px-5 py-2.5 text-slate-600 font-bold hover:bg-slate-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-brand-primary hover:bg-[#e68a00] text-white font-bold rounded-lg shadow-lg shadow-brand-primary/30">Simpan
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal_edit"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden flex-col max-h-[90vh]">
        <div class="bg-slate-900 px-6 py-4 flex justify-between items-center">
            <h3 class="text-white font-bold text-lg">Edit Data Layanan</h3>
            <button onclick="closeModals()" class="text-slate-400 hover:text-white"><svg class="w-6 h-6" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg></button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="form_edit" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf @method('PUT')
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Layanan</label>
                        <input type="text" name="name" id="edit_name" required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                        <select name="category_id" id="edit_category" required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Layanan</label>
                    <textarea name="long_description" id="edit_desc" rows="4" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Ganti Foto (Biarkan kosong jika tidak
                        diubah)</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-primary/10 file:text-brand-primary hover:file:bg-brand-primary hover:file:text-white transition-all cursor-pointer border border-slate-200 rounded-lg">
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeModals()"
                        class="px-5 py-2.5 text-slate-600 font-bold hover:bg-slate-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-brand-primary hover:bg-[#e68a00] text-white font-bold rounded-lg shadow-lg shadow-brand-primary/30">Perbarui
                        Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openAddModal() {
            document.getElementById('modal_overlay').classList.remove('hidden');
            document.getElementById('modal_add').classList.remove('hidden');
            document.getElementById('modal_add').classList.add('flex');
        }

        function openEditModal(product) {
            document.getElementById('modal_overlay').classList.remove('hidden');
            document.getElementById('modal_edit').classList.remove('hidden');
            document.getElementById('modal_edit').classList.add('flex');

            document.getElementById('form_edit').action = '/admin/products/' + product.id;
            document.getElementById('edit_name').value = product.name;
            document.getElementById('edit_category').value = product.category_id;
            document.getElementById('edit_desc').value = product.long_description;
        }

        function closeModals() {
            document.getElementById('modal_overlay').classList.add('hidden');
            document.getElementById('modal_add').classList.add('hidden');
            document.getElementById('modal_add').classList.remove('flex');
            document.getElementById('modal_edit').classList.add('hidden');
            document.getElementById('modal_edit').classList.remove('flex');
        }
    </script>
@endpush
