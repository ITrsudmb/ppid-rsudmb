@extends('layouts.auth')

@section('content')
@include('layouts.message')

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-xl shadow w-full max-w-lg">

        <h2 class="text-2xl font-bold text-blue-700 mb-6">
            Upload Galeri (Foto / Video)
        </h2>

        {{-- FORM --}}
        <form id="uploadForm"
              method="POST"
              action="{{ route('admin.gallery.store') }}"
              enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">
                    Judul (Opsional)
                </label>
                <input type="text"
                       name="judul"
                       class="w-full border border-gray-300 rounded p-2">
            </div>

            {{-- File --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">
                    Pilih File
                </label>
                <input type="file"
                       name="file"
                       id="fileInput"
                       accept="image/*,video/*"
                       class="w-full"
                       required>
            </div>

            {{-- PROGRESS BAR --}}
            <div id="progressWrapper" class="hidden mb-4">
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div id="progressBar"
                         class="bg-blue-600 h-3 w-0 transition-all"></div>
                </div>
                <p id="progressText"
                   class="text-sm text-gray-600 mt-1 text-center">
                    0%
                </p>
            </div>

            {{-- BUTTON --}}
            <div class="flex items-center gap-3">
                <button type="submit"
                        id="submitBtn"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Upload
                </button>

                <a href="{{ route('admin.gallery.index') }}"
                   class="text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>

{{-- SCRIPT PROGRESS --}}
<script>
document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    const progressWrapper = document.getElementById('progressWrapper');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const submitBtn = document.getElementById('submitBtn');

    submitBtn.disabled = true;
    progressWrapper.classList.remove('hidden');

    xhr.upload.addEventListener('progress', function (e) {
        if (e.lengthComputable) {
            const percent = Math.round((e.loaded / e.total) * 100);
            progressBar.style.width = percent + '%';
            progressText.innerText = percent + '%';
        }
    });

    xhr.onload = function () {
        if (xhr.status === 200) {
            progressText.innerText = 'Upload selesai ✔';
            window.location.href = "{{ route('admin.gallery.index') }}";
        } else {
            alert('Upload gagal!');
            submitBtn.disabled = false;
        }
    };

    xhr.onerror = function () {
        alert('Terjadi kesalahan jaringan!');
        submitBtn.disabled = false;
    };

    xhr.open('POST', form.action);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.send(formData);
});
</script>
@endsection
