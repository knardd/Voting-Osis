<div class="fixed inset-0 bg-blue-50 bg-opacity-80 flex items-center justify-center z-50 p-4 backdrop-blur-sm">
  <div class="bg-white rounded-3xl w-full max-w-md shadow-xl border border-blue-100 transform transition-all duration-300 scale-95 animate-fadeIn">
    
    <!-- Header -->
    <div class="text-center pt-8 pb-2 px-6">
      <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-2">Vote Berhasil!</h2>
      <p class="text-gray-600 text-sm">Terima kasih telah berpartisipasi dalam Pemilihan Ketua OSIS 2025/2026.</p>
    </div>

    <!-- Body -->
    <div class="px-8 pb-8 flex flex-col items-center">
      <!-- Success Badge -->
      <div class="w-28 h-28 rounded-full bg-blue-50 flex items-center justify-center mb-6 border-4 border-blue-100">
        <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>

      <!-- Message -->
      <p class="text-gray-700 text-center text-base leading-relaxed px-2 mb-8">
        Suara Anda telah <span class="font-semibold text-blue-700">berhasil direkam</span> dan tidak dapat diubah.  
        Partisipasi Anda sangat berarti untuk kemajuan sekolah kita!
      </p>

      <!-- Button -->
      <button
        wire:click="beranda"
        class="w-full max-w-xs bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200"
      >
        Kembali ke Beranda
      </button>
    </div>
  </div>
</div>
