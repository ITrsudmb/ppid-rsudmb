@extends('layouts.app')

@section('content')

<style>
/* Hilangkan scrollbar di mobile */
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

/* Container scroll horizontal */
.auto-scroll-wrapper {
    overflow: hidden;
    position: relative;
}

.auto-scroll-content {
    display: flex;
    gap: 1rem;
    flex-wrap: nowrap;
}
</style>

<!-- RUNNING TEXT AGENDA -->
@if(count($agenda) > 0)
<div class="bg-blue-900 text-white py-2 overflow-hidden">
    <marquee behavior="scroll" direction="left" class="text-sm sm:text-base font-semibold tracking-wide">
        @foreach ($agenda as $ag)
            📌 {{ $ag->judul }} — {{ $ag->tanggal }} — {{ $ag->lokasi }} &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
        @endforeach
    </marquee>
</div>
@endif

<!-- HERO SECTION -->
<section class="relative bg-cover bg-center h-[300px] sm:h-[420px] md:h-[520px]"
         style="background-image: url('https://rsudmuarabengkal.66ghz.com/public/assets/img/rsud.jpg');">
    <div class="absolute inset-0 bg-blue-900/60"></div>
    <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center px-4 sm:px-6 text-white">
        <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold leading-tight">RSUD Muara Bengkal</h1>
        <p class="text-sm sm:text-lg md:text-xl mt-2 sm:mt-3 max-w-full sm:max-w-2xl">
            Memberikan pelayanan kesehatan yang profesional, cepat, dan berorientasi pada pasien.
        </p>
        <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row gap-3 sm:gap-4">
            <a href="/layanan" class="bg-white text-blue-700 font-semibold px-4 py-2 sm:px-5 sm:py-3 rounded-lg shadow hover:bg-gray-200 text-sm sm:text-base text-center transition">
                Lihat Layanan
            </a>
            <a href="/igd" class="bg-red-600 text-white font-semibold px-4 py-2 sm:px-5 sm:py-3 rounded-lg shadow hover:bg-red-700 text-sm sm:text-base text-center transition">
                IGD 24 Jam
            </a>
        </div>
    </div>
</section>

<!-- FITUR UTAMA -->
<section class="py-10 sm:py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-10 text-blue-900">
            Layanan Medis RSUD Muara Bengkal
        </h2>

        <!-- Desktop Grid -->
        <div class="hidden sm:grid sm:grid-cols-4 gap-6">
            @foreach ([
                [
                    'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966327.png',
                    'title'=>'Instalasi Gawat Darurat',
                    'desc'=>'Layanan darurat 24 jam dengan tenaga medis profesional.',
                    'bg'=>'bg-red-50',
                    'border'=>'border-red-200',
                    'text'=>'text-red-700'
                ],
                [
                    'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966320.png',
                    'title'=>'Rawat Jalan',
                    'desc'=>'Pelayanan rawat jalan yang nyaman dengan dokter spesialis.',
                    'bg'=>'bg-blue-50',
                    'border'=>'border-blue-200',
                    'text'=>'text-blue-700'
                ],
                [
                    'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966301.png',
                    'title'=>'MCU',
                    'desc'=>'Medical Check Up untuk pemeriksaan kesehatan menyeluruh.',
                    'bg'=>'bg-green-50',
                    'border'=>'border-green-200',
                    'text'=>'text-green-700'
                ],
                [
                    'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966315.png',
                    'title'=>'Rawat Inap',
                    'desc'=>'Fasilitas perawatan inap dengan pelayanan optimal.',
                    'bg'=>'bg-purple-50',
                    'border'=>'border-purple-200',
                    'text'=>'text-purple-700'
                ]
            ] as $f)
            <div class="bg-white border {{ $f['border'] }} shadow-lg p-4 sm:p-6 rounded-2xl 
                        text-center hover:scale-105 transition-transform duration-300">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full {{ $f['bg'] }} flex items-center justify-center">
                    <img src="{{ $f['icon'] }}" class="w-10" alt="">
                </div>
                <h3 class="font-bold text-lg sm:text-xl mb-2 {{ $f['text'] }}">
                    {{ $f['title'] }}
                </h3>
                <p class="text-gray-600 text-xs sm:text-sm">
                    {{ $f['desc'] }}
                </p>
            </div>
            @endforeach
        </div>

        <!-- Mobile Scroll -->
        <div class="auto-scroll-wrapper sm:hidden">
            <div id="fitur-scroll" class="auto-scroll-content no-scrollbar">
                @foreach ([
                    [
                        'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966327.png',
                        'title'=>'IGD',
                        'desc'=>'Layanan darurat 24 jam.',
                        'bg'=>'bg-red-50',
                        'border'=>'border-red-200',
                        'text'=>'text-red-700'
                    ],
                    [
                        'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966320.png',
                        'title'=>'Rawat Jalan',
                        'desc'=>'Pelayanan dokter spesialis.',
                        'bg'=>'bg-blue-50',
                        'border'=>'border-blue-200',
                        'text'=>'text-blue-700'
                    ],
                    [
                        'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966301.png',
                        'title'=>'MCU',
                        'desc'=>'Pemeriksaan kesehatan.',
                        'bg'=>'bg-green-50',
                        'border'=>'border-green-200',
                        'text'=>'text-green-700'
                    ],
                    [
                        'icon'=>'https://cdn-icons-png.flaticon.com/512/2966/2966315.png',
                        'title'=>'Rawat Inap',
                        'desc'=>'Perawatan pasien inap.',
                        'bg'=>'bg-purple-50',
                        'border'=>'border-purple-200',
                        'text'=>'text-purple-700'
                    ]
                ] as $f)
                <div class="min-w-[220px] bg-white border {{ $f['border'] }} shadow-lg p-4 
                            rounded-2xl text-center shrink-0">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full {{ $f['bg'] }} flex items-center justify-center">
                        <img src="{{ $f['icon'] }}" class="w-8" alt="">
                    </div>
                    <h3 class="font-bold {{ $f['text'] }} mb-1">
                        {{ $f['title'] }}
                    </h3>
                    <p class="text-gray-600 text-xs">
                        {{ $f['desc'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



<!-- DATA DOKTER -->
<section class="py-10 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-6 sm:mb-10 text-center">Dokter</h2>

        <!-- Desktop Grid -->
        <div class="hidden sm:grid sm:grid-cols-3 gap-6">
            @foreach($dokter as $d)
            <div class="bg-gray-50 rounded-xl shadow p-4 sm:p-6 text-center hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('storage/'.$d->foto) }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow">
                <h3 class="font-bold text-lg sm:text-xl">{{ $d->nama }}</h3>
                <p class="text-blue-700 font-semibold text-sm sm:text-base mt-1">{{ $d->jenis }}</p>
                <p class="text-blue-700 font-semibold text-sm sm:text-base mt-1">{{ $d->spesialis }}</p>
                <p class="text-gray-600 text-xs sm:text-sm mt-1 sm:mt-2">{{ $d->jadwal }}</p>
            </div>
            @endforeach
        </div>

        <!-- Mobile Scroll -->
        <div class="auto-scroll-wrapper sm:hidden">
            <div id="dokter-scroll" class="auto-scroll-content no-scrollbar">
                @foreach($dokter as $d)
                <div class="min-w-[200px] shrink-0 snap-start bg-gray-50 rounded-xl shadow p-4 text-center">
                    <img src="{{ asset('storage/'.$d->foto) }}" class="w-24 h-24 object-cover rounded-full mx-auto mb-2 shadow">
                    <h3 class="font-bold text-lg">{{ $d->nama }}</h3>
                    <p class="text-blue-700 font-semibold text-sm mt-1">{{ $d->jenis }}</p>
                    <p class="text-gray-600 text-xs mt-1">{{ $d->jadwal }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- BERITA TERBARU -->
<section class="py-10 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-6 sm:mb-10 text-center">Berita Terbaru</h2>

        <!-- Desktop Grid -->
        <div class="hidden sm:grid sm:grid-cols-3 gap-6">
            @foreach ($berita as $item)
            <div class="bg-white rounded-xl overflow-hidden shadow p-3 hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('storage/'.$item->gambar) }}" class="h-48 w-full object-cover">
                <h3 class="font-bold text-base sm:text-lg mt-2">{{ $item->judul }}</h3>
                <p class="text-gray-500 text-xs sm:text-sm mb-1">{{ $item->tanggal }}</p>
                <p class="text-gray-700 text-xs sm:text-sm mb-2">{{ Str::limit($item->isi, 120) }}</p>
                <a href="/berita/{{ $item->id }}" class="text-blue-600 font-semibold text-xs sm:text-sm">Baca Selengkapnya →</a>
            </div>
            @endforeach
        </div>

        <!-- Mobile Scroll -->
        <div class="auto-scroll-wrapper sm:hidden">
            <div id="berita-scroll" class="auto-scroll-content no-scrollbar">
                @foreach ($berita as $item)
                <div class="min-w-[250px] shrink-0 snap-start bg-white rounded-xl overflow-hidden shadow p-3">
                    <img src="{{ asset('storage/'.$item->gambar) }}" class="h-40 w-full object-cover">
                    <h3 class="font-bold text-base mt-2">{{ $item->judul }}</h3>
                    <p class="text-gray-500 text-xs mb-1">{{ $item->tanggal }}</p>
                    <p class="text-gray-700 text-xs mb-2">{{ Str::limit($item->isi, 120) }}</p>
                    <a href="/berita/{{ $item->id }}" class="text-blue-600 font-semibold text-xs">Baca Selengkapnya →</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- MAKlumat -->
<section class="py-10 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-6 sm:mb-10 text-center">
            Maklumat Pelayanan
        </h2>

        <!-- DESKTOP GRID -->
        <div class="hidden sm:grid sm:grid-cols-3 gap-6">
            @foreach($maklumat as $m)
            <div class="bg-white rounded-xl shadow overflow-hidden hover:scale-105 transition duration-300">

                @if($m->foto)
                    <img src="{{ asset('storage/'.$m->foto) }}" 
                         class="w-full h-56 object-cover">
                @endif

                <div class="p-5">
                    <h3 class="font-bold text-xl mb-2">{{ $m->judul }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-4">
                        {!! nl2br(e($m->keterangan)) !!}
                    </p>
                </div>

            </div>
            @endforeach
        </div>

        <!-- MOBILE HORIZONTAL SCROLL -->
        <div class="auto-scroll-wrapper sm:hidden mt-4">
            <div class="auto-scroll-content no-scrollbar">

                @foreach($maklumat as $m)
                <div class="min-w-[260px] max-w-[260px] bg-white rounded-xl shadow overflow-hidden shrink-0">

                    @if($m->foto)
                        <img src="{{ asset('storage/'.$m->foto) }}" 
                             class="w-full h-40 object-cover">
                    @endif

                    <div class="p-4">
                        <h3 class="font-bold text-base mb-1">{{ $m->judul }}</h3>
                        <p class="text-gray-600 text-xs leading-relaxed line-clamp-4">
                            {!! nl2br(e($m->keterangan)) !!}
                        </p>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>


<!-- SURVEI KEPUASAN PENGUNJUNG -->
<section class="py-10 bg-gray-50 mt-10">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-2xl p-6">

        <h3 class="text-xl font-bold text-center text-blue-700 mb-3">
            Bagaimana Pelayanan RSUD Muara Bengkal?
        </h3>

        <p class="text-center text-gray-600 text-sm mb-4">
            Berikan penilaian Anda untuk peningkatan layanan kami.
        </p>

        <!-- Emoticons -->
        <div class="grid grid-cols-5 gap-4 text-4xl justify-center text-center mb-5">

            <button onclick="selectEmoji(1)" id="emoji-1"
                    class="p-2 hover:scale-125 transition">😡</button>

            <button onclick="selectEmoji(2)" id="emoji-2"
                    class="p-2 hover:scale-125 transition">😞</button>

            <button onclick="selectEmoji(3)" id="emoji-3"
                    class="p-2 hover:scale-125 transition">😐</button>

            <button onclick="selectEmoji(4)" id="emoji-4"
                    class="p-2 hover:scale-125 transition">🙂</button>

            <button onclick="selectEmoji(5)" id="emoji-5"
                    class="p-2 hover:scale-125 transition">😍</button>

        </div>

        <!-- Kolom Saran -->
        <textarea id="saran"
                  class="w-full border rounded-lg p-3 text-sm"
                  rows="3"
                  placeholder="Tulis saran Anda (opsional)..."></textarea>

        <!-- Tombol Submit -->
        <button onclick="sendSurvey()"
                class="mt-4 w-full bg-blue-700 text-white py-2 rounded-lg hover:bg-blue-800 transition">
            Kirim Survei
        </button>
    </div>
</section>

<script>
let selectedNilai = 0;

function selectEmoji(id) {
    selectedNilai = id;

    // Efek highlight emoji
    for (let i = 1; i <= 5; i++) {
        document.getElementById('emoji-' + i).classList.remove('scale-125', 'text-blue-600');
    }
    document.getElementById('emoji-' + id).classList.add('scale-125', 'text-blue-600');
}

function sendSurvey() {
    if (selectedNilai === 0) {
        alert("Silakan pilih emoji dulu!");
        return;
    }

    const saran = document.getElementById("saran").value;

    fetch("/informasi/survei", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            nilai: selectedNilai,
            saran: saran
        })
    })
    .then(res => res.json())
    .then(data => {
        alert("Terima kasih! Survei Anda telah terkirim.");
        selectedNilai = 0;
        document.getElementById("saran").value = "";
    })
    .catch(err => {
        console.error(err);
        alert("Terjadi kesalahan saat mengirim survei.");
    });
}
</script>


<!-- CTA IGD -->
<section class="py-8 sm:py-14 bg-blue-700 text-white">
    <div class="max-w-7xl mx-auto text-center px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold mb-2 sm:mb-4">Butuh Bantuan Medis Darurat?</h2>
        <p class="text-sm sm:text-lg mb-4 sm:mb-6">Instalasi Gawat Darurat (IGD) siap melayani 24 jam.</p>
        <a href="tel:081234567890" class="bg-white text-blue-700 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold shadow hover:bg-gray-200 text-sm sm:text-base">
            Hubungi IGD Sekarang: 0812-3456-7890
        </a>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileScroll = window.matchMedia("(max-width: 639px)");
    if (!mobileScroll.matches) return;

    function setupScroll(id, speed = 50) {
        const content = document.getElementById(id);
        if (!content) return;

        // duplicate konten untuk loop seamless
        content.innerHTML += content.innerHTML;

        const totalWidth = content.scrollWidth / 2;

        gsap.to(content, {
            x: -totalWidth,
            duration: totalWidth / speed,
            ease: "linear",
            repeat: -1
        });
    }

    setupScroll('fitur-scroll', 80);
    setupScroll('dokter-scroll', 60);
    setupScroll('berita-scroll', 50);
});
</script>


@endsection
