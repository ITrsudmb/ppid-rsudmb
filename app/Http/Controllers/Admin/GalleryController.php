<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'file'  => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240',
        ]);

        try {
            $file = $request->file('file');

            if (!$file->isValid()) {
                return back()->with('error', 'File tidak valid.');
            }

            $mime = $file->getMimeType();

            if (str_starts_with($mime, 'video')) {
                $folder = 'galeri/video';
                $tipe   = 'video';
            } else {
                $folder = 'galeri/image';
                $tipe   = 'image';
            }

            $path = $file->store($folder, 'public');

            Gallery::create([
                'judul' => $request->judul,
                'file'  => $path,
                'tipe'  => $tipe,
            ]);

            return redirect()
                ->route('admin.gallery.index')
                ->with('success', 'File berhasil diunggah!');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->file && Storage::disk('public')->exists($gallery->file)) {
            Storage::disk('public')->delete($gallery->file);
        }

        $gallery->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }
}
