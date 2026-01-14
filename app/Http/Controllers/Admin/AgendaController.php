<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::orderBy('tanggal', 'DESC')->paginate(10);
        return view('admin.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul'      => 'required|string|max:255',
                'tanggal'    => 'required|date',
                'lokasi'     => 'nullable|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            Agenda::create([
                'judul'      => $request->judul,
                'tanggal'    => $request->tanggal,
                'lokasi'     => $request->lokasi,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('admin.agenda.index')
                ->with('success', 'Agenda berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Agenda tidak berhasil disimpan!');
        }
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        try {
            $request->validate([
                'judul'      => 'required|string|max:255',
                'tanggal'    => 'required|date',
                'lokasi'     => 'nullable|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            $agenda->update([
                'judul'      => $request->judul,
                'tanggal'    => $request->tanggal,
                'lokasi'     => $request->lokasi,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('admin.agenda.index')
                ->with('success', 'Agenda berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Agenda tidak berhasil diperbarui!');
        }
    }

    public function destroy(Agenda $agenda)
    {
        try {
            $agenda->delete();

            return redirect()->route('admin.agenda.index')
                ->with('success', 'Agenda berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Agenda gagal dihapus!');
        }
    }
}
