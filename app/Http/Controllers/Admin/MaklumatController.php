<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maklumat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaklumatController extends Controller
{
    public function index()
    {
        $data = Maklumat::all();
        return view('admin.maklumat.index', compact('data'));
    }

    public function create()
    {
        return view('admin.maklumat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $data = $request->only(['judul','keterangan']);

            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('maklumat', 'public');
            }

            Maklumat::create($data);

            return redirect()->route('admin.maklumat.index')
                ->with('success', 'Maklumat berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Data tidak berhasil disimpan');
        }
    }

    public function edit(Maklumat $maklumat)
    {
        return view('admin.maklumat.edit', compact('maklumat'));
    }

    public function update(Request $request, Maklumat $maklumat)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $data = $request->only(['judul','keterangan']);

            if ($request->hasFile('foto')) {

                // Hapus foto lama jika ada
                if ($maklumat->foto && Storage::disk('public')->exists($maklumat->foto)) {
                    Storage::disk('public')->delete($maklumat->foto);
                }

                // Upload foto baru
                $data['foto'] = $request->file('foto')->store('maklumat', 'public');
            }

            $maklumat->update($data);

            return redirect()->route('admin.maklumat.index')
                ->with('success', 'Maklumat berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Data tidak berhasil diupdate');
        }
    }

    public function destroy(Maklumat $maklumat)
    {
        try {
            // Hapus foto di storage
            if ($maklumat->foto && Storage::disk('public')->exists($maklumat->foto)) {
                Storage::disk('public')->delete($maklumat->foto);
            }

            $maklumat->delete();

            return back()->with('success', 'Maklumat telah dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Maklumat gagal dihapus');
        }
    }
}
