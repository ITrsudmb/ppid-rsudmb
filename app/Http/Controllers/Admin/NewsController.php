<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $path = $request->file('gambar')?->store('berita', 'public');

            News::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $path,
            ]);

            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Data tidak berhasil disimpan.');
        }
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $path = $news->gambar;

            // Jika ada upload gambar baru → hapus lama → simpan baru
            if ($request->hasFile('gambar')) {
                if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
                    Storage::disk('public')->delete($news->gambar);
                }

                $path = $request->file('gambar')->store('berita', 'public');
            }

            $news->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $path,
            ]);

            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Data tidak berhasil diupdate.');
        }
    }

    public function destroy(News $news)
    {
        try {
            if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
                Storage::disk('public')->delete($news->gambar);
            }

            $news->delete();

            return back()->with('success', 'Berita dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Berita gagal dihapus.');
        }
    }

    public function download()
    {
        $data = News::latest()->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Judul');
        $sheet->setCellValue('C1', 'Isi');
        $sheet->setCellValue('D1', 'Gambar');
        $sheet->setCellValue('E1', 'Tanggal');

        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->judul);
            $sheet->setCellValue('C' . $row, strip_tags($item->isi)); 
            $sheet->setCellValue('D' . $row, $item->gambar);
            $sheet->setCellValue('E' . $row, $item->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="data-berita.xlsx"',
        ]);
    }

}
