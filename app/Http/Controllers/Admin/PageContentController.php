<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContent;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    public function index()
    {
        $pages = PageContent::orderBy('kategori')->get();
        return view('admin.pagecontents.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pagecontents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'judul' => 'required',
            'isi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('kategori', 'sub_kategori', 'judul', 'isi');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('page_images', 'public');
        }

        PageContent::create($data);

        return redirect()->route('admin.pagecontents.index')->with('success', 'Halaman berhasil ditambahkan!');
    }

public function edit(PageContent $halaman)
{
    return view('admin.pagecontents.edit', compact('halaman'));
}

public function update(Request $request, PageContent $halaman)
{
    $request->validate([
        'kategori' => 'required',
        'sub_kategori' => 'required',
        'judul' => 'required',
        'isi' => 'nullable',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only('kategori', 'sub_kategori', 'judul', 'isi');

    if ($request->hasFile('gambar')) {
        if ($halaman->gambar && Storage::disk('public')->exists($halaman->gambar)) {
            Storage::disk('public')->delete($halaman->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('page_images', 'public');
    }

    $halaman->update($data);

    return redirect()->route('admin.pagecontents.index')->with('success', 'Halaman berhasil diperbarui!');
}

public function destroy(PageContent $halaman)
{
    if ($halaman->gambar && Storage::disk('public')->exists($halaman->gambar)) {
        Storage::disk('public')->delete($halaman->gambar);
    }
    $halaman->delete();

    return redirect()->route('admin.pagecontents.index')->with('success', 'Halaman berhasil dihapus!');
}
}
