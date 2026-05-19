@extends('layouts.admin-app')

@section('title', 'Kelola Keunggulan')

@section('content')
    <div class="p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Manajemen Section Keunggulan</h2>
                <p class="text-slate-500 text-sm mt-1">Atur poin-poin alasan utama klien memilih PT. BRAIT JAYA SOLUSINDO.
                </p>
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
                        <th class="p-4 font-semibold w-24 text-center">Urutan</th>
                        <th class="p-4 font-semibold">Judul Keunggulan</th>
                        <th class="p-4 font-semibold">Deskripsi</th>
                        <th class="p-4 font-semibold text-right">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse ($advantages as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4 text-center">
                                <span
                                    class="bg-slate-100 text-slate-800 px-3 py-1 rounded-md font-bold text-xs border border-slate-200">
                                    Posisi #{{ $item->order_position }}
                                </span>
                            </td>
                            <td class="p-4 font-bold text-slate-800">{{ $item->title }}</td>
                            <td class="p-4 text-sm max-w-md text-slate-600 leading-relaxed">{{ $item->description }}</td>
                            <td class="p-4 text-right flex justify-end gap-2 items-center h-full pt-6">
                                <button onclick="openEditModal({{ json_encode($item) }})"
                                    class="p-2 bg-slate-100 text-slate-600 hover:text-brand-primary hover:bg-brand-primary/10 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <form action="{{ route('admin.advantages.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus poin keunggulan ini secara permanen?');" class="inline">
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
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center italic text-slate-400">Belum ada data keunggulan. Klik
                                Tambah Data untuk mengisi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal_overlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 hidden transition-opacity"
        onclick="closeModals()"></div>

    <div id="modal_add"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-xl bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden flex-col max-h-[90vh]">
        <div class="bg-slate-900 px-6 py-4 flex justify-between items-center">
            <h3 class="text-white font-bold text-lg">Tambah Poin Keunggulan</h3>
            <button onclick="closeModals()" class="text-slate-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="{{ route('admin.advantages.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Keunggulan</label>
                        <input type="text" name="title" required placeholder="Contoh: Keamanan Berlapis"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="order_position" value="1" required min="1"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Poin</label>
                    <textarea name="description" rows="4" required placeholder="Masukkan penjelasan singkat aspek keunggulan..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white"></textarea>
                </div>
                <div class="pt-2 flex justify-end gap-3">
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
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-xl bg-white rounded-2xl shadow-2xl z-50 hidden overflow-hidden flex-col max-h-[90vh]">
        <div class="bg-slate-900 px-6 py-4 flex justify-between items-center">
            <h3 class="text-white font-bold text-lg">Edit Poin Keunggulan</h3>
            <button onclick="closeModals()" class="text-slate-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="form_edit" method="POST" class="space-y-5">
                @csrf @method('PUT')
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Keunggulan</label>
                        <input type="text" name="title" id="edit_title" required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="order_position" id="edit_order" required min="1"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Poin</label>
                    <textarea name="description" id="edit_description" rows="4" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-brand-primary outline-none bg-slate-50 focus:bg-white"></textarea>
                </div>
                <div class="pt-2 flex justify-end gap-3">
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

        function openEditModal(item) {
            document.getElementById('modal_overlay').classList.remove('hidden');
            document.getElementById('modal_edit').classList.remove('hidden');
            document.getElementById('modal_edit').classList.add('flex');

            document.getElementById('form_edit').action = '/admin/advantages/' + item.id;
            document.getElementById('edit_title').value = item.title;
            document.getElementById('edit_order').value = item.order_position;
            document.getElementById('edit_description').value = item.description;
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
