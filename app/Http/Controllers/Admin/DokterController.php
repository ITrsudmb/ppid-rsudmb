<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::all();
        return view('admin.dokter.index', compact('data'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama'       => 'required|string|max:255',
                'jenis'      => 'required|in:umum,spesialis',
                'spesialis'  => 'nullable|required_if:jenis,spesialis|max:255',
                'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->only(['nama', 'jenis', 'spesialis']);

            // Upload foto jika ada
            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('dokter', 'public');
            }

            Dokter::create($data);

            return redirect()->route('admin.dokter.index')
                ->with('success', 'Data dokter berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Data dokter tidak berhasil disimpan!');
        }
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        try {
            $request->validate([
                'nama'       => 'required|string|max:255',
                'jenis'      => 'required|in:umum,spesialis',
                'spesialis'  => 'nullable|required_if:jenis,spesialis|max:255',
                'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->only(['nama', 'jenis', 'spesialis']);

            // Jika update foto
            if ($request->hasFile('foto')) {

                // Hapus foto lama jika ada
                if ($dokter->foto && Storage::disk('public')->exists($dokter->foto)) {
                    Storage::disk('public')->delete($dokter->foto);
                }

                // Upload foto baru
                $data['foto'] = $request->file('foto')->store('dokter', 'public');
            }

            $dokter->update($data);

            return redirect()->route('admin.dokter.index')
                ->with('success', 'Data dokter berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Data dokter tidak berhasil diupdate!');
        }
    }

    public function destroy(Dokter $dokter)
    {
        try {
            // Hapus foto dari storage
            if ($dokter->foto && Storage::disk('public')->exists($dokter->foto)) {
                Storage::disk('public')->delete($dokter->foto);
            }

            $dokter->delete();

            return back()->with('success', 'Data dokter telah dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Data dokter gagal dihapus!');
        }
    }

        public function downloadPdf()
    {
        $dokters = Dokter::all();

        $pdf = Pdf::loadView('admin.dokter.download', compact('dokters'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('data-dokter.pdf');
    }
}
