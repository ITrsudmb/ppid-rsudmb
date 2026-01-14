<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SurveiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|integer|min:1|max:5',
            'saran' => 'nullable|string'
        ]);

        Survei::create([
            'nilai' => $request->nilai,
            'saran' => $request->saran
        ]);

        session(['survei_done' => true]);

        return response()->json(['success' => true]);
    }

    public function grafik()
    {
        $chart = Survei::selectRaw('nilai, COUNT(*) as total')
            ->groupBy('nilai')
            ->get();

        return view('survei.grafik', compact('chart'));
    }

    /* =============================
        DOWNLOAD HARIAN
    ============================== */
    public function downloadHarian()
    {
        $data = Survei::whereDate('created_at', now())->get();
        return $this->exportExcel($data, 'survei-harian.xlsx');
    }

    /* =============================
        DOWNLOAD BULANAN ✅
    ============================== */
    public function downloadBulanan()
    {
        $data = Survei::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();

        return $this->exportExcel($data, 'survei-bulanan.xlsx');
    }

    /* =============================
        DOWNLOAD TAHUNAN
    ============================== */
    public function downloadTahunan()
    {
        $data = Survei::whereYear('created_at', now()->year)->get();
        return $this->exportExcel($data, 'survei-tahunan.xlsx');
    }

    /* =============================
        EXPORT HELPER (WAJIB ADA)
    ============================== */
    private function exportExcel($data, $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray(
            ['ID', 'Nilai', 'Saran', 'Tanggal'],
            null,
            'A1'
        );

        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A'.$row, $item->id);
            $sheet->setCellValue('B'.$row, $item->nilai);
            $sheet->setCellValue('C'.$row, $item->saran);
            $sheet->setCellValue('D'.$row, $item->created_at->format('d-m-Y H:i'));
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }


public function hasil()
{
    // ===============================
    // DATA TABLE
    // ===============================
    $data = Survei::latest()->get();

    $now = now(); // timezone ikut config/app.php

    // ===============================
    // ✅ GRAFIK HARIAN (Tanggal bulan ini)
    // ===============================
    $harian = Survei::whereYear('created_at', $now->year)
        ->whereMonth('created_at', $now->month)
        ->selectRaw('DAY(created_at) as hari, COUNT(*) as total')
        ->groupBy('hari')
        ->orderBy('hari')
        ->pluck('total', 'hari')
        ->toArray();

    // ===============================
    // ✅ GRAFIK BULANAN (Jan–Des tahun ini)
    // ===============================
    $bulanan = Survei::whereYear('created_at', $now->year)
        ->selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan')
        ->toArray();

    // ===============================
    // ✅ GRAFIK TAHUNAN (Jan–Des tahun ini)
    // ===============================
    // (sama seperti bulanan tapi dipisah biar jelas)
    $tahunan = $bulanan;

    return view('admin.survei.hasil', compact(
        'data',
        'harian',
        'bulanan',
        'tahunan'
    ));
}


        // ✅ TAMBAHKAN INI
    public function destroy($id)
    {
        $survei = Survei::findOrFail($id);
        $survei->delete();

        return back()->with('success', 'Data survei berhasil dihapus');
    }

    /* =============================
   DOWNLOAD FILTER (HARI / BULAN / TAHUN)
============================= */
public function downloadFilter(Request $request)
{
    $request->validate([
        'tipe' => 'required|in:harian,bulanan,tahunan',
        'tanggal' => 'nullable|date',
        'bulan' => 'nullable|integer|min:1|max:12',
        'tahun' => 'nullable|integer|min:2020|max:' . now()->year,
    ]);

    $query = Survei::query();

    if ($request->tipe === 'harian') {
        $query->whereDate(
            'created_at',
            $request->tanggal ?? now()->toDateString()
        );

        $filename = 'survei-harian-' .
            ($request->tanggal ?? now()->format('Y-m-d')) . '.xlsx';
    }

    if ($request->tipe === 'bulanan') {
        $query->whereMonth(
                'created_at',
                $request->bulan ?? now()->month
            )
            ->whereYear(
                'created_at',
                $request->tahun ?? now()->year
            );

        $filename = 'survei-bulanan-' .
            ($request->bulan ?? now()->month) . '-' .
            ($request->tahun ?? now()->year) . '.xlsx';
    }

    if ($request->tipe === 'tahunan') {
        $query->whereYear(
            'created_at',
            $request->tahun ?? now()->year
        );

        $filename = 'survei-tahunan-' .
            ($request->tahun ?? now()->year) . '.xlsx';
    }

    $data = $query->get();

    return $this->exportExcel($data, $filename);
}

}

