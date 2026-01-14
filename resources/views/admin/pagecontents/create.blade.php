@extends('layouts.auth')

@section('content')
@include('layouts.message')
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-2xl font-bold mb-6 text-blue-700">Tambah Halaman Website</h2>

        <form method="POST" action="{{ route('admin.pagecontents.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block font-semibold mb-1">Kategori</label>
                    <select id="kategori" name="kategori" class="w-full border-gray-300 rounded p-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="profil">Profil</option>
                        <option value="layanan">Layanan Medis</option>
                        <option value="penunjang">Penunjang Medis</option>
                        <option value="informasi">Informasi</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Sub Kategori</label>
                    <select id="sub_kategori" name="sub_kategori" class="w-full border-gray-300 rounded p-2" required>
                        <option value="">-- Pilih Sub Kategori --</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul</label>
                <input type="text" name="judul" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Isi Halaman</label>
                <textarea name="isi" rows="6" class="w-full border-gray-300 rounded p-2"></textarea>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-1">Upload Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('admin.pagecontents.index') }}" class="ml-3 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</div>

<script>
    const subKategoriMap = {
        profil: ['sejarah', 'visi-misi', 'struktur-organisasi', 'prestasi-indikator'],
        layanan: ['igd', 'rawat-jalan', 'mcu','rawat-inap'],
        penunjang: ['farmasi', 'laboratorium', 'radiologi', 'fisioterapi'],
        informasi: ['jadwal-poli','pengaduan','pendaftaran-online','hak-pasien']
    };

    const kategoriSelect = document.getElementById('kategori');
    const subKategoriSelect = document.getElementById('sub_kategori');

    kategoriSelect.addEventListener('change', function() {
        const selectedKategori = this.value;

        // kosongkan sub-kategori sebelumnya
        subKategoriSelect.innerHTML = '<option value="">-- Pilih Sub Kategori --</option>';

        if (subKategoriMap[selectedKategori]) {
            subKategoriMap[selectedKategori].forEach(sub => {
                const option = document.createElement('option');
                option.value = sub;
                option.text = sub.replace(/-/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                subKategoriSelect.appendChild(option);
            });
        }
    });
</script>
@endsection
