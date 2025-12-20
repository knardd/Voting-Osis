<div>

    <!-- Header Hero -->
    <div class="w-full bg-gradient-to-r from-blue-800 to-blue-600 text-white py-20 px-4 text-center">
        <img src="{{ asset('storage/osis2.png') }}" class="rounded-full w-24 h-24 mx-auto mb-10 shadow-lg ring-4 ring-white/20" alt="Logo OSIS">

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-2">PEMILIHAN KETUA OSIS</h1>
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-10">2025/2026</h2>

        <p class="text-lg md:text-xl mb-2 max-w-2xl mx-auto">Suara Anda Menentukan Masa Depan Sekolah Ini</p>
        <p class="text-lg md:text-xl font-medium">Pilih Kandidat Secara Bijak</p>
    </div>

<div class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Aturan Voting</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl shadow-lg card-hover">
                    <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Tidak Bisa Diubah</h3>
                    <p class="text-gray-600 text-center text-sm">Voting tidak bisa diubah kembali setelah dikonfirmasi</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl shadow-lg card-hover">
                    <div class="w-14 h-14 bg-purple-600 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Satu Kali Kesempatan</h3>
                    <p class="text-gray-600 text-center text-sm">Setiap pemilih hanya diberikan satu kali kesempatan</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl shadow-lg card-hover">
                    <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Baca Visi & Misi</h3>
                    <p class="text-gray-600 text-center text-sm">Pastikan membaca visi misi setiap kandidat</p>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl shadow-lg card-hover">
                    <div class="w-14 h-14 bg-orange-600 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Data Terjaga</h3>
                    <p class="text-gray-600 text-center text-sm">Data Anda akan dijaga kerahasiaannya</p>
                </div>
            </div>
        </div>
    </div>

<!-- Daftar Kandidat -->
<div class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Pengenalan Kandidat</h2>
        <p class="text-center text-gray-600 mb-20">Kenali visi, misi, dan program kerja masing-masing kandidat</p>

        @foreach ($candidates as $index => $candidate)
            @php
                $isEven = ($index % 2 === 1); // index 0 = ganjil (Paslon 1), index 1 = genap (Paslon 2), dst.
                $colorClass = match(($index % 3)) {
                    0 => ['bg' => 'blue-50', 'text' => 'blue-700', 'border' => 'blue-100', 'badge' => 'blue-600'],
                    1 => ['bg' => 'purple-50', 'text' => 'purple-700', 'border' => 'purple-100', 'badge' => 'purple-600'],
                    2 => ['bg' => 'green-50', 'text' => 'green-700', 'border' => 'green-100', 'badge' => 'green-600'],
                    default => ['bg' => 'gray-50', 'text' => 'gray-700', 'border' => 'gray-100', 'badge' => 'gray-600'],
                };
            @endphp

            <div class="flex flex-col {{ $isEven ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-8 {{ $loop->last ? '' : 'mb-16' }} bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <!-- Foto -->
                <div class="w-full md:w-1/3 flex justify-center">
                    <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}" class="w-64 h-64 object-cover rounded-2xl border-4 border-{{ $colorClass['border'] }} shadow-md">
                </div>

                <!-- Visi & Misi -->
                <div class="w-full md:w-2/3 {{ $colorClass['bg'] }} p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="{{ $colorClass['badge'] }} text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">{{ $index + 1 }}</span>
                        <h1>Paslon {{ $candidate->id }}</h1>
                        <h3 class="text-2xl font-bold {{ $colorClass['text'] }}">{{ $candidate->name }}</h3>
                    </div>

                    <div class="space-y-5">
                        <!-- Visi -->
                        <div>
                            <h4 class="font-semibold {{ $colorClass['text'] }} flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Visi
                            </h4>
                            <p class="text-gray-700 leading-relaxed pl-5">{{ $candidate->visi }}</p>
                        </div>

                        <!-- Misi -->
                        <div>
                            <h4 class="font-semibold {{ $colorClass['text'] }} flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Misi
                            </h4>
                            <ul class="pl-5 text-gray-700 space-y-1">
                                @foreach (explode("\n", $candidate->misi) as $misi)
                                    <li>{{ $misi }}</li>
                                @endforeach
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Footer Modern -->
<footer class="bg-gradient-to-r from-blue-800 to-blue-600 py-12">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h3 class="text-white text-xl font-medium mb-6">Siap memberikan suara Anda?</h3>
        <button
            wire:click="openModal"
            class="px-8 py-4 bg-white text-blue-700 font-bold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300"
        >
            Pilih Kandidat Sekarang
        </button>
        <p class="text-blue-200 text-sm mt-6">Partisipasi Anda adalah kunci perubahan!</p>
    </div>
</footer>

    @if ($showModal)        
<div class="fixed inset-0 bg-black flex bg-opacity-50 items-center justify-center z-50 p-4">
    <!-- Modal Content -->
    <div class="bg-white rounded-3xl w-full max-w-3xl shadow-2xl animate-slideUp relative">
      
      <!-- Tombol Close di pojok kanan atas -->
      <button wire:click="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full p-2 transition-all z-10">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

      <!-- Modal Header -->
      <div class="text-center pt-8 pb-6 px-8">
        <h2 class="text-3xl font-bold text-blue-600 mb-2">Pilih Kandidat Anda</h2>
        <p class="text-gray-500 text-sm">Klik pada kandidat pilihan Anda</p>
      </div>

      <!-- Modal Body - 3 Kandidat Horizontal -->
<div class="px-8 pb-8">
    @if ($candidates->count() > 0)
        <!-- Tentukan jumlah kolom berdasarkan jumlah kandidat -->
        @php
            $cols = match(true) {
                $candidates->count() >= 3 => 'grid-cols-3',
                $candidates->count() == 2 => 'grid-cols-2',
                default => 'grid-cols-1',
            };
        @endphp

        <div class="grid {{ $cols }} gap-6 justify-items-center">
            @foreach ($candidates as $candidate)
                @php
                    $color = match(($loop->index % 3)) {
                        0 => 'blue',
                        1 => 'purple',
                        2 => 'green',
                        default => 'blue',
                    };
                @endphp

                <div class="text-center border-4 border-{{ $color }}-200 shadow-md rounded-2xl p-4 hover:shadow-xl transition-all duration-300 hover:scale-110 max-w-xs">
                    <div class="relative mb-4">
                        <div class="absolute -top-2 -left-2 w-10 h-10 bg-{{ $color }}-600 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg z-10">
                            {{ $loop->index + 1 }}
                        </div>
                        <img 
                            src="{{ $candidate->photo ? asset('storage/' . $candidate->photo) : asset('images/default-avatar.png') }}" 
                            alt="{{ $candidate->name }}" 
                            class="w-full h-auto max-h-64 object-cover rounded-xl"
                        >
                    </div>
                    <h3 class="font-bold text-gray-800 mb-3">Paslon {{ $candidate->id }}</h3>
                    <button 
                        wire:click="selectCandidate({{ $candidate->id }})" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl transition-all hover:shadow-lg flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Pilih Kandidat
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 py-8">Belum ada kandidat tersedia.</p>
    @endif
</div>
      
    </div>
  </div>
  </div>
</div>
@endif
</div>