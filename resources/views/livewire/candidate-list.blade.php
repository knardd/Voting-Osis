<div>

    <!-- Header Hero -->
    <div class="w-full bg-gradient-to-r from-blue-800 to-blue-600 text-white py-20 px-4 text-center">
        <img src="{{ asset('storage/osis2.png') }}" class="rounded-full w-24 h-24 mx-auto mb-10 shadow-lg ring-4 ring-white/20" alt="Logo OSIS">

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-2">PEMILIHAN KETUA OSIS</h1>
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-10">2025/2026</h2>

        <p class="text-lg md:text-xl mb-2 max-w-2xl mx-auto">Suara Anda Menentukan Masa Depan Sekolah Ini</p>
        <p class="text-lg md:text-xl font-medium">Pilih Kandidat Secara Bijak</p>
    </div>

<div class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Aturan Voting</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300 ">
                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Tidak Bisa Diubah</h3>
                    <p class="text-gray-600 text-center text-sm">Voting tidak bisa diubah kembali setelah dikonfirmasi</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Satu Kali Kesempatan</h3>
                    <p class="text-gray-600 text-center text-sm">Setiap pemilih hanya diberikan satu kali kesempatan</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">Baca Visi & Misi</h3>
                    <p class="text-gray-600 text-center text-sm">Pastikan membaca visi misi setiap kandidat</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 mx-auto">
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
<div class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Pengenalan Kandidat</h2>
        <p class="text-center text-gray-600 mb-20">Kenali visi, misi, dan program kerja masing-masing kandidat</p>

        @foreach ($candidates as $index => $candidate)
            @php
                $isEven = ($index % 2 === 1); // true = paslon genap → gambar di kanan
            @endphp

            <div class="flex flex-col md:flex-row {{ $isEven ? 'md:flex-row-reverse' : '' }} items-center gap-12 mb-20">
                <!-- Gambar Kandidat -->
                <div class="w-full md:w-1/2 flex {{ $isEven ? 'md:justify-start' : 'md:justify-end' }}">
                    <div class="w-full max-w-md aspect-[3/2] rounded-2xl shadow-xl overflow-hidden">
                    <img 
                        src="{{ asset('storage/' . $candidate->photo) }}" 
                        alt="{{ $candidate->name }}" 
                        class="w-full h-full object-cover"
                    >
                </div>
                </div>

                <!-- Detail: Visi & Misi (latar biru muda) -->
                <div class="w-full md:w-1/2 bg-blue-50 p-6 rounded-2xl shadow-md">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white w-11 h-11 text-xl rounded-lg flex items-center justify-center font-bold">
                            {{ $index + 1 }}
                        </span>
                        <div>
                            <h3 class="text-2xl font-bold text-transparent bg-gradient-to-r from-blue-500 to-indigo-600 bg-clip-text">{{ $candidate->name }}</h3>
                        </div>
                    </div>

                    <!-- Visi -->
                    <div class="mb-4">
                            <h4 class="font-semibold text-xl text-blue-700 flex items-center gap-2 mb-1">
                                <div class="w-10 h-10 flex items-center justify-center bg-blue-100 rounded-lg">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
  <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.176 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152-.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248ZM15.75 14.25a3.75 3.75 0 1 1-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 0 1 1.925-3.546 3.75 3.75 0 0 1 3.255 3.718Z" clip-rule="evenodd" />
</svg>
                            </div>
                                Visi
                            </h4>
                        <p class="text-gray-700 leading-relaxed pl-12">{{ $candidate->visi }}</p>
                    </div>

                    <!-- Misi -->
                    <div>
                        <h4 class="font-semibold text-xl text-blue-700 flex items-center gap-2 mb-1">
                                                            <div class="w-10 h-10 flex items-center justify-center bg-blue-100 rounded-lg">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
  <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
</svg>
                            </div>
                            Misi
                        </h4>
                        <ul class="pl-12 text-gray-700 space-y-1 list-disc">
                            @foreach (explode("\n", trim($candidate->misi)) as $misi)
                                @if (trim($misi))
                                    <li>{{ trim($misi) }}</li>
                                @endif
                            @endforeach
                        </ul>
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
            class="px-8 py-4 bg-white text-blue-700 font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300"
        >
            Pilih Kandidat Sekarang
        </button>
        <p class="text-blue-200 text-sm mt-6">Partisipasi Anda adalah kunci perubahan!</p>
    </div>
</footer>

    @if ($showModal)        
<div class="fixed inset-0 bg-black flex bg-opacity-50 backdrop-blur-sm items-center justify-center z-50 p-4">
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

                <div class="relative text-center border-4 shadow-md rounded-2xl p-4 hover:shadow-xl transition-all duration-300 hover:scale-110 max-w-xs">
                    <div class="mb-4">
                        <div class="absolute -top-2 -left-2 w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg z-10">
                            {{ $candidate->id }}
                        </div>
                        <img 
                            src="{{ $candidate->photo ? asset('storage/' . $candidate->photo) : asset('images/default-avatar.png') }}" 
                            alt="{{ $candidate->name }}" 
                            class="w-full h-auto max-h-64 object-cover rounded-xl"
                        >
                    </div>
                    <h3 class="font-bold text-gray-800 mb-3 text-lg">{{ $candidate->name }}</h3>
                    <button 
                        wire:click="selectCandidate({{ $candidate->id }})" 
                        class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 px-4 rounded-xl transition-all hover:shadow-lg flex items-center justify-center gap-2"
                    >
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pin-icon lucide-pin"><path d="M12 17v5"/><path d="M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z"/></svg>                        Pilih Kandidat
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