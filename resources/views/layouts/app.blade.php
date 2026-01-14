<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'RSUD Muara Bengkal' }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body { height: 100%; margin: 0; display: flex; flex-direction: column; }
        main { flex: 1; transition: opacity 0.4s ease-in-out; }
        .dropdown-link { padding: 8px 15px; display: block; border-radius: 6px; }
        .dropdown-link:hover { background: #E8F5E9; }
        .footer-link:hover { text-decoration: underline; }

        /* Marquee modern */
        .animate-marquee {
            display: inline-flex;
            animation: marquee 20s linear infinite;
        }
        .animate-marquee:hover { animation-play-state: paused; }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-[#0A6847] text-white shadow-lg" x-data="{ open:false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 sm:gap-3 font-semibold text-lg sm:text-xl">
                <img src="{{ asset('images/logo_rsud.png') }}" class="h-8 sm:h-10" alt="Logo">
                RSUD Muara Bengkal
            </a>

            <!-- DESKTOP MENU -->
            <ul class="hidden md:flex items-center gap-4 sm:gap-6 font-medium text-sm sm:text-base">

                <li>
                    <a href="{{ route('beranda') }}" class="hover:text-[#F9D342] flex items-center gap-1">
                        <i class="ri-home-4-line text-base sm:text-xl"></i> Beranda
                    </a>
                </li>

                <!-- PROFIL -->
                <li class="relative" x-data="{drop:false}">
                    <button @click="drop=!drop" class="flex items-center gap-1 hover:text-[#F9D342] text-sm sm:text-base">
                        <i class="ri-community-line text-base sm:text-xl"></i> Profil
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div x-show="drop" @click.outside="drop=false"
                         class="absolute bg-white text-black shadow-md rounded-md mt-2 w-40 sm:w-48 z-50 py-2 text-sm sm:text-base">
                        <a href="{{ route('profil.sejarah') }}" class="dropdown-link">Sejarah</a>
                        <a href="{{ route('profil.visi-misi') }}" class="dropdown-link">Visi & Misi</a>
                        <a href="{{ route('profil.struktur') }}" class="dropdown-link">Struktur Organisasi</a>
                        <a href="{{ route('profil.prestasi') }}" class="dropdown-link">Prestasi & Indikator</a>
                    </div>
                </li>

                <!-- LAYANAN MEDIS -->
                <li class="relative" x-data="{drop:false}">
                    <button @click="drop=!drop" class="flex items-center gap-1 hover:text-[#F9D342] text-sm sm:text-base">
                        <i class="ri-hospital-line text-base sm:text-xl"></i> Layanan Medis
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div x-show="drop" @click.outside="drop=false"
                         class="absolute bg-white text-black shadow-md rounded-md mt-2 w-40 sm:w-48 z-50 py-2 text-sm sm:text-base">
                         <a href="{{ route('layanan.igd') }}" class="dropdown-link">IGD</a>
                         <a href="{{ route('layanan.rawat-jalan') }}" class="dropdown-link">Rawat Jalan</a>
                         <a href="{{ route('layanan.mcu') }}" class="dropdown-link">MCU</a>
                         <a href="{{ route('layanan.rawat-inap') }}" class="dropdown-link">Rawat Inap</a>
                    </div>
                </li>

                <!-- PENUNJANG MEDIS -->
                <li class="relative" x-data="{drop:false}">
                    <button @click="drop=!drop" class="flex items-center gap-1 hover:text-[#F9D342] text-sm sm:text-base">
                        <i class="ri-health-book-line text-base sm:text-xl"></i> Penunjang Medis
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div x-show="drop" @click.outside="drop=false"
                         class="absolute bg-white text-black shadow-md rounded-md mt-2 w-44 sm:w-52 z-50 py-2 text-sm sm:text-base">
                        <a href="{{ route('layanan.farmasi') }}" class="dropdown-link">Farmasi</a>
                        <a href="{{ route('layanan.laboratorium') }}" class="dropdown-link">Laboratorium</a>
                        <a href="{{ route('layanan.radiologi') }}" class="dropdown-link">Radiologi</a>
                        <a href="{{ route('layanan.fisioterapi') }}" class="dropdown-link">Fisioterapi</a>
                    </div>
                </li>

                <!-- INFORMASI -->
                <li class="relative" x-data="{drop:false}">
                    <button @click="drop=!drop" class="flex items-center gap-1 hover:text-[#F9D342] text-sm sm:text-base">
                        <i class="ri-information-line text-base sm:text-xl"></i> Informasi
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div x-show="drop" @click.outside="drop=false"
                         class="absolute bg-white text-black shadow-md rounded-md mt-2 w-52 sm:w-60 z-50 py-2 text-sm sm:text-base">
                         <a href="{{ route('informasi.jadwal-poli') }}" class="dropdown-link">Jadwal Poli</a>
                         <a href="{{ route('informasi.dokter') }}" class="dropdown-link">Dokter</a>
                         <a href="{{ route('informasi.agenda') }}" class="dropdown-link">Agenda</a>
                         <a href="{{ route('informasi.maklumat') }}" class="dropdown-link">Maklumat</a>
                         <a href="{{ route('informasi.pendaftaran-online') }}" class="dropdown-link">Alur Pendaftaran Online</a>
                         <a href="{{ route('informasi.pengaduan') }}" class="dropdown-link">Alur Pengaduan Online</a>
                         <a href="{{ route('informasi.hak') }}" class="dropdown-link">Hak Dan Kewajiban Pasien</a>
                         <a href="{{ route('informasi.gallery-video') }}" class="dropdown-link">Gallery Video</a>
                         <a href="{{ route('informasi.gallery') }}" class="dropdown-link">Gallery Foto</a>
                    </div>
                </li>
            </ul>

            <button @click="open=!open" class="md:hidden text-2xl sm:text-3xl">
                <i class="ri-menu-line"></i>
            </button>

        </div>

        <!-- MOBILE MENU -->
        <div x-show="open" class="md:hidden bg-[#0F8A5F] text-white px-4 sm:px-6 py-4 space-y-3 text-sm sm:text-base">
            <a href="{{ route('beranda') }}" class="block font-medium">Beranda</a>
            <p class="font-semibold">Profil</p>
            <a class="block pl-4 opacity-90" href="{{ route('profil.sejarah') }}">Sejarah</a>
            <a class="block pl-4 opacity-90" href="{{ route('profil.visi-misi') }}">Visi & Misi</a>
            <a class="block pl-4 opacity-90" href="{{ route('profil.struktur') }}">Struktur Organisasi</a>
            <a class="block pl-4 opacity-90" href="{{ route('profil.prestasi') }}">Prestasi</a>
            <p class="font-semibold">Layanan Medis</p>
            <a class="block pl-4 opacity-90" href="{{ route('layanan.igd') }}">IGD</a>
            <a class="block pl-4 opacity-90" href="{{ route('layanan.rawat-jalan') }}">Rawat Jalan</a>
            <a class="block pl-4 opacity-90" href="{{ route('layanan.mcu') }}">MCU</a>
            <p class="font-semibold">Informasi</p>
            <a class="block pl-4 opacity-90" href="{{ route('informasi.jadwal-poli') }}">Jadwal Poli</a>
            <a class="block pl-4 opacity-90" href="{{ route('informasi.maklumat') }}">Maklumat</a>
            <a class="block pl-4 opacity-90" href="{{ route('informasi.agenda') }}">Agenda</a>
            <a class="block pl-4 opacity-90" href="{{ route('informasi.dokter') }}">Dokter</a>
        </div>
    </nav>

    {{-- <!-- RUNNING TEXT AGENDA -->
    @if(isset($agenda) && $agenda->count() > 0)
    <div class="bg-[#0A6847] text-white py-2 overflow-hidden" id="running-agenda">
        <div class="whitespace-nowrap flex animate-marquee text-xs sm:text-sm md:text-base">
            @foreach ($agenda as $ag)
                <span class="mx-4 sm:mx-6 md:mx-8 font-semibold">
                    📌 {{ $ag->judul }} — {{ \Carbon\Carbon::parse($ag->tanggal)->translatedFormat('d F Y') }} — {{ $ag->lokasi ?? '-' }}
                </span>
            @endforeach
            @foreach ($agenda as $ag)
                <span class="mx-4 sm:mx-6 md:mx-8 font-semibold">
                    📌 {{ $ag->judul }} — {{ \Carbon\Carbon::parse($ag->tanggal)->translatedFormat('d F Y') }} — {{ $ag->lokasi ?? '-' }}
                </span>
            @endforeach
        </div>
    </div>
    @endif --}}

    <!-- MAIN CONTENT -->
    <main id="main-content" class="grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#0A6847] text-white py-6 sm:py-8 mt-6 sm:mt-10 text-xs sm:text-sm">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 px-4 sm:px-6">
            <div>
                <h3 class="text-sm sm:text-lg font-semibold mb-1 sm:mb-2">RSUD Muara Bengkal</h3>
                <p class="text-xs sm:text-sm text-green-100">Pelayanan kesehatan terbaik untuk masyarakat Kutai Timur.</p>
            </div>
            <div>
                <h3 class="text-sm sm:text-lg font-semibold mb-1 sm:mb-2">Kontak</h3>
                <p class="text-xs sm:text-sm">📍 Jl. Utama Muara Bengkal</p>
                <p class="text-xs sm:text-sm">☎ 0812-3456-7890</p>
                <p class="text-xs sm:text-sm">✉ info@rsudmb.go.id</p>
            </div>
            <div>
                <h3 class="text-sm sm:text-lg font-semibold mb-1 sm:mb-2">Link Cepat</h3>
                <ul class="space-y-1">
                    <li><a href="/igd" class="footer-link">IGD 24 Jam</a></li>
                    <li><a href="/rawat-jalan" class="footer-link">Rawat Jalan</a></li>
                    <li><a href="/jadwal-dokter" class="footer-link">Jadwal Dokter</a></li>
                    <li><a href="/berita" class="footer-link">Berita</a></li>
                </ul>
            </div>
        </div>
        <p class="text-center text-xs sm:text-sm mt-4 sm:mt-6 text-green-200">© {{ date('Y') }} RSUD Muara Bengkal • PPID</p>
    </footer>

    <!-- SMOOTH AUTO REFRESH -->
    <script>
        const refreshInterval = 30000; // 30 detik
        async function refreshContent() {
            try {
                const response = await fetch(window.location.href);
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");

                // update main content
                const newContent = doc.querySelector("#main-content");
                if(newContent){
                    const main = document.querySelector("#main-content");
                    main.style.opacity = 0;
                    setTimeout(() => {
                        main.innerHTML = newContent.innerHTML;
                        main.style.opacity = 1;
                    }, 200);
                }

                // update running text agenda
                const newAgenda = doc.querySelector("#running-agenda");
                if(newAgenda){
                    document.querySelector("#running-agenda").innerHTML = newAgenda.innerHTML;
                }

            } catch (error) {
                console.error("Gagal refresh konten:", error);
            }
        }

        setInterval(refreshContent, refreshInterval);
    </script>

</body>
</html>
