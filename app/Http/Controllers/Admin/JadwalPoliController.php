<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPoli;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalPoliController extends Controller
{
    public function index()
    {
        $data = JadwalPoli::with('dokter')->get();
        return view('admin.jadwalpoli.index', compact('data'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        return view('admin.jadwalpoli.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli'        => 'required|string',
            'hari'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
            'dokter_id'   => 'nullable|exists:dokters,id',
        ]);

        try {
            JadwalPoli::create([
                'poli'        => $request->poli,
                'hari'        => $request->hari,
                'jam_mulai'   => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'dokter_id'   => $request->dokter_id,
            ]);

            return redirect()->route('admin.jadwalpoli.index')
                ->with('success', 'Jadwal poli berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Jadwal poli gagal disimpan');
        }
    }

    public function edit(JadwalPoli $jadwalpoli)
    {
        $dokter = Dokter::all();
        return view('admin.jadwalpoli.edit', compact('jadwalpoli', 'dokter'));
    }

    public function update(Request $request, JadwalPoli $jadwalpoli)
    {
        $request->validate([
            'poli'        => 'required|string',
            'hari'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
            'dokter_id'   => 'nullable|exists:dokters,id',
        ]);

        try {
            $jadwalpoli->update([
                'poli'        => $request->poli,
                'hari'        => $request->hari,
                'jam_mulai'   => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'dokter_id'   => $request->dokter_id,
            ]);

            return redirect()->route('admin.jadwalpoli.index')
                ->with('success', 'Jadwal poli berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Jadwal poli gagal diupdate');
        }
    }

    public function destroy(JadwalPoli $jadwalpoli)
    {
        try {
            $jadwalpoli->delete();
            return back()->with('success', 'Jadwal poli dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Jadwal poli gagal dihapus');
        }
    }
}
