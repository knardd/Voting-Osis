<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sistem Voting</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    /* Custom Animations */
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    
    @keyframes pulse-slow {
      0%, 100% { opacity: 0.2; }
      50% { opacity: 0.3; }
    }

    @keyframes slide-up {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fade-in {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      75% { transform: translateX(10px); }
    }

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }

    .animate-pulse-slow {
      animation: pulse-slow 4s ease-in-out infinite;
    }

    .animate-slide-up {
      animation: slide-up 0.6s ease-out;
    }

    .animate-fade-in {
      animation: fade-in 0.8s ease-out;
    }

    .animate-shake {
      animation: shake 0.5s ease-in-out;
    }

    /* Stagger delays for form elements */
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }

    /* Input focus glow effect */
    .input-glow:focus {
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1),
                  0 0 20px rgba(59, 130, 246, 0.2);
    }

    /* Button ripple effect */
    @keyframes ripple {
      0% {
        transform: scale(0);
        opacity: 1;
      }
      100% {
        transform: scale(4);
        opacity: 0;
      }
    }

    .ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.6);
      width: 20px;
      height: 20px;
      animation: ripple 0.6s ease-out;
      pointer-events: none;
    }

    /* Hide elements before Alpine loads */
    [x-cloak] { display: none !important; }
  </style>
</head>
<body 
  class="bg-gradient-to-br from-purple-100 via-blue-50 to-pink-100 min-h-screen p-4 relative overflow-hidden"
  x-data="loginApp()"
  x-init="init()"
>
  
  <!-- Animated Decorative Background Circles -->
  <div class="absolute top-10 right-20 w-32 h-32 bg-blue-400 rounded-full opacity-20 blur-3xl animate-pulse-slow"></div>
  <div class="absolute bottom-20 left-20 w-40 h-40 bg-pink-400 rounded-full opacity-20 blur-3xl animate-pulse-slow delay-200"></div>
  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-300 rounded-full opacity-10 blur-3xl animate-pulse-slow delay-100"></div>

  <!-- Floating particles -->
  <div class="absolute top-20 left-1/4 w-4 h-4 bg-blue-300 rounded-full animate-float opacity-60"></div>
  <div class="absolute top-40 right-1/4 w-6 h-6 bg-purple-300 rounded-full animate-float opacity-60 delay-200"></div>
  <div class="absolute bottom-40 left-1/3 w-5 h-5 bg-pink-300 rounded-full animate-float opacity-60 delay-100"></div>

  <!-- Container -->
  <div class="flex flex-col items-center justify-center min-h-screen relative z-10">
    
    <!-- Error Alert with Alpine.js -->
    <div 
      x-show="showError" 
      x-cloak
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 transform -translate-y-4"
      x-transition:enter-end="opacity-100 transform translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 transform translate-y-0"
      x-transition:leave-end="opacity-0 transform -translate-y-4"
      class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-full max-w-md px-4"
    >
      <div class="flex items-start p-4 text-sm text-red-700 rounded-2xl bg-red-50 shadow-lg border border-red-100" 
           :class="{ 'animate-shake': showError }"
           role="alert">
        <svg class="w-5 h-5 me-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <div class="flex-1">
          <span class="font-semibold">Login Gagal!</span>
          <span class="block mt-1" x-text="errorMessage"></span>
        </div>
      </div>
    </div>

    <!-- Login Card with Animations -->
    <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md animate-slide-up hover:shadow-3xl transition-shadow duration-300">
      
      <!-- Logo with Float Animation -->
      <img src="{{ asset('storage/osis2.png') }}" class="rounded-full w-20 h-20 mx-auto mb-6 shadow-lg ring-4 ring-white/20" alt="Logo OSIS">

      <!-- Header Text -->
      <h1 class="text-3xl font-bold text-center bg-gradient-to-r from-blue-500 to-indigo-600 text-transparent bg-clip-text mb-2 animate-fade-in">Welcome</h1>
      <p class="text-center text-gray-500 text-sm mb-8 animate-fade-in delay-100">Login untuk memilih kandidat terbaik</p>

      <!-- Login Form -->
      <form method="POST" action="{{ route('login.post') }}" @submit.prevent="handleSubmit($event)">
        @csrf

        <!-- Token Field with Animation -->
        <div class="mb-5 animate-slide-up delay-200" x-data="{ focused: false }">
          <label for="token" class="block text-gray-700 font-medium mb-2 text-left">Token</label>
          <div class="relative">
            <span 
              class="absolute left-4 top-1/2 transform -translate-y-1/2 transition-colors duration-200"
              :class="focused ? 'text-blue-500' : 'text-gray-400'"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </span>
            <input
              id="token"
              name="token"
              type="text"
              placeholder="Masukkan Token Anda"
              @focus="focused = true"
              @blur="focused = false"
              class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all input-glow"
              required
            />
          </div>
        </div>

        <!-- Password Field with Animation -->
        <div class="mb-6 animate-slide-up delay-300" x-data="{ focused: false, showPassword: false }">
          <label for="password" class="block text-gray-700 font-medium mb-2 text-left">Password</label>
          <div class="relative">
            <span 
              class="absolute left-4 top-1/2 transform -translate-y-1/2 transition-colors duration-200"
              :class="focused ? 'text-blue-500' : 'text-gray-400'"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </span>
            <input
              id="password"
              name="password"
              :type="showPassword ? 'text' : 'password'"
              placeholder="Masukkan password Anda"
              @focus="focused = true"
              @blur="focused = false"
              class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all input-glow"
              required
            />
            
            <!-- Toggle Password with Smooth Transition -->
            <button
              type="button"
              @click="showPassword = !showPassword"
              class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none transition-all duration-200 hover:scale-110"
            >
              <svg 
                x-show="!showPassword" 
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                class="w-5 h-5" 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                fill="currentColor"
              >
                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
              </svg>
              <svg 
                x-show="showPassword" 
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                class="w-5 h-5" 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                fill="currentColor"
              >
                <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Submit Button with Ripple Effect -->
        <div class="animate-slide-up delay-400">
          <button
            type="submit"
            :disabled="isLoading"
            @click="createRipple($event)"
            class="relative overflow-hidden w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 disabled:opacity-70 disabled:cursor-not-allowed"
          >
            <span x-show="!isLoading" class="transition-opacity duration-200">Sign In</span>
            <span 
              x-show="isLoading" 
              x-cloak
              x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              class="flex items-center justify-center"
            >
              <svg class="animate-spin h-5 w-5 mr-2" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              Loading...
            </span>
          </button>
        </div>
      </form>

      <!-- Footer with Animation -->
      <p class="text-center text-gray-400 text-xs mt-8 animate-fade-in delay-400">
        © 2025 Created by <span class="text-blue-500 font-semibold">Kennard</span>
      </p>
    </div>
  </div>

  <script>
    function loginApp() {
      return {
        isLoading: false,
        showError: false,
        errorMessage: '',

        init() {
          @if (session('login_error'))
            this.showError = true;
            this.errorMessage = @json(session('login_error'));
            this.autoHideError();
          @endif
        },

        handleSubmit(e) {
          this.isLoading = true;
          this.showError = false;
          // Form akan auto-submit ke Laravel
          e.target.submit()
        },

        createRipple(event) {
          if (this.isLoading) return;
          
          const button = event.currentTarget;
          const ripple = document.createElement('span');
          const rect = button.getBoundingClientRect();
          
          const size = Math.max(rect.width, rect.height);
          const x = event.clientX - rect.left - size / 2;
          const y = event.clientY - rect.top - size / 2;
          
          ripple.style.width = ripple.style.height = size + 'px';
          ripple.style.left = x + 'px';
          ripple.style.top = y + 'px';
          ripple.classList.add('ripple');
          
          button.appendChild(ripple);
          
          setTimeout(() => ripple.remove(), 600);
        },

        closeError() {
          this.showError = false;
        },

        autoHideError() {
          setTimeout(() => {
            this.showError = false;
          }, 5000);
        }
      }
    }
  </script>
</body>
</html>