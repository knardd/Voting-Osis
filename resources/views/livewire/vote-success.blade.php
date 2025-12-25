<div 
  x-data="{ 
    show: false, 
    confettiColors: ['#2dd4bf', '#0ea5e9', '#34d399', '#22d3ee', '#10b981'],
    
    init() {
      setTimeout(() => { this.show = true; }, 100);
      this.createConfetti();
    },
    
    createConfetti() {
      const container = this.$refs.confettiContainer;
      for (let i = 0; i < 30; i++) {
        setTimeout(() => {
          const confetti = document.createElement('div');
          confetti.className = 'confetti rounded-full';
          confetti.style.left = `${Math.random() * 100}%`;
          confetti.style.top = '-10px';
          confetti.style.backgroundColor = this.confettiColors[Math.floor(Math.random() * this.confettiColors.length)];
          confetti.style.animationDelay = `${Math.random() * 0.5}s`;
          container.appendChild(confetti);
          setTimeout(() => confetti.remove(), 2500);
        }, i * 60);
      }
    },
    
    goHome() {
      // window.location.href = '/';
      alert('Redirect ke beranda...');
    }
  }"
  class="fixed inset-0 flex items-center justify-center p-4 bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50 font-sans"
>
  <!-- Background blur elements (opsional, bisa dihapus jika terlalu ramai) -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-20 -right-20 w-80 h-80 bg-teal-200 rounded-full opacity-10 blur-3xl"></div>
    <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-emerald-200 rounded-full opacity-10 blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-cyan-200 rounded-full opacity-5 blur-3xl"></div>
  </div>

  <!-- Confetti Container -->
  <div x-ref="confettiContainer" class="absolute inset-0 pointer-events-none overflow-hidden"></div>

  <!-- Main Card -->
  <div 
    x-show="show"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    class="relative bg-white/80 backdrop-blur-xl rounded-3xl w-full max-w-md shadow-2xl border border-white/60 overflow-hidden"
  >
    <!-- Success Badge -->
    <div class="relative mt-8 mb-6 flex justify-center">
      <div class="w-36 h-36 rounded-full bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center shadow-lg animate-scaleIn">
        <div class="rounded-full bg-white w-28 h-28 flex items-center justify-center">
          <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24">
            <defs>
              <linearGradient id="tealToEmerald" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#2dd4bf" />
                <stop offset="100%" stop-color="#34d399" />
              </linearGradient>
            </defs>
            <path
              class="checkmark-path"
              stroke="url(#tealToEmerald)"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="3"
              d="M5 13l4 4L19 7"
            />
          </svg>
        </div>
      </div>
    </div>

    <!-- Header -->
    <div class="text-center px-6">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 animate-slideUp-1">
        Vote Berhasil!
      </h1>
      <div class="w-20 h-1 bg-gradient-to-r from-teal-400 to-emerald-500 rounded-full mx-auto mb-6 animate-slideUp-1"></div>
    </div>

    <!-- Message -->
    <div class="text-center px-6 mb-8 animate-slideUp-3">
      <p class="text-gray-600 text-base leading-relaxed">
        Terima kasih telah berpartisipasi dalam pemilihan.
        <br class="hidden md:block">
        Suara Anda telah berhasil direkam dan 
        <span class="font-semibold text-emerald-600">tidak dapat diubah</span>.
      </p>
    </div>

    <!-- Konfirmasi Paslon -->
    <div class="text-center mb-8 animate-slideUp-2 px-6">
      <div class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 text-sm font-medium px-3 py-1.5 rounded-full mb-3">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
        </svg>
        Kandidat Terpilih
      </div>
      <p class="font-bold text-gray-900 text-xl md:text-2xl">
        {{ $candidate->name }}
      </p>
    </div>

    <!-- Button -->
    <div class="flex justify-center pb-8 px-6">
      <button
        wire:click="logout"
        class="w-full max-w-xs bg-gradient-to-br from-teal-500 to-emerald-600 hover:from-teal-600 hover:to-emerald-700 text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 animate-slideUp-4 active:scale-[0.98]"
      >
        Kembali ke Beranda
      </button>
    </div>
  </div>
</div>

@push('styles')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

  body {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
  }

  @keyframes scaleIn {
    from { opacity: 0; transform: scale(0.5); }
    to { opacity: 1; transform: scale(1); }
  }
  
  @keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  @keyframes confetti {
    0% { opacity: 1; transform: translateY(0) rotate(0deg); }
    100% { opacity: 0; transform: translateY(100vh) rotate(360deg) scale(0.8); }
  }
  
  .animate-scaleIn { animation: scaleIn 0.5s ease-out 0.3s both; }
  .animate-slideUp-1 { animation: slideUp 0.5s ease-out 0.1s both; }
  .animate-slideUp-2 { animation: slideUp 0.5s ease-out 0.3s both; }
  .animate-slideUp-3 { animation: slideUp 0.5s ease-out 0.5s both; }
  .animate-slideUp-4 { animation: slideUp 0.5s ease-out 0.7s both; }
  
  .confetti {
    position: absolute;
    width: 8px;
    height: 8px;
    animation: confetti 2.2s cubic-bezier(0.1, 0.8, 0.2, 1) forwards;
  }
  
  @keyframes checkmark {
    0% { stroke-dashoffset: 100; }
    100% { stroke-dashoffset: 0; }
  }
  
  .checkmark-path {
    stroke-dasharray: 100;
    stroke-dashoffset: 100;
    animation: checkmark 0.6s ease-out 0.5s forwards;
  }
</style>
@endpush