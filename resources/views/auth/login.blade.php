<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sistem Voting</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-blue-50 to-pink-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
  
  <!-- Decorative Background Circles -->
  <div class="absolute top-10 right-20 w-32 h-32 bg-blue-400 rounded-full opacity-20 blur-3xl"></div>
  <div class="absolute bottom-20 left-20 w-40 h-40 bg-pink-400 rounded-full opacity-20 blur-3xl"></div>
  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-300 rounded-full opacity-10 blur-3xl"></div>

  <!-- Login Card -->
  <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md relative z-10">
    
    <!-- Logo -->
    <img src="{{ asset('storage/osis2.png') }}" class="rounded-full w-20 h-20 mx-auto mb-6 shadow-lg ring-4 ring-white/20" alt="Logo OSIS">

    <!-- Header Text -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Welcome</h1>
    <p class="text-center text-gray-500 text-sm mb-8">Login untuk memilih kandidat terbaik</p>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <!-- NIS Field -->
      <div class="mb-5">
        <label for="nis" class="block text-gray-700 font-medium mb-2 text-left">NIS</label>
        <div class="relative">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </span>
          <input
            id="nis"
            name="nis"
            type="text"
            placeholder="Masukkan NIS Anda"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
            required
          />
        </div>
      </div>

<!-- Password Field -->
<div class="mb-6">
  <label for="password" class="block text-gray-700 font-medium mb-2 text-left">Password</label>
  <div class="relative">
    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
      </svg>
    </span>
    <input
      id="password"
      name="password"
      type="password"
      placeholder="Masukkan password Anda"
      class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
      required
    />
    @error('login')
    <div class="text-sm text-red-600 text-start">
        {{ $message }}
    </div>
@enderror

    <!-- Toggle Password Visibility Button -->
    <button
      type="button"
      id="togglePassword"
      class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
    >
      <svg id="eyeOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      </svg>
<svg id="eyeClose" class="w-5 h-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
</svg>
    </button>
  </div>
</div>

      <!-- Submit Button -->
      <button
        id="loginBtn"
        type="submit"
        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-200"
      >
      <span id="btnText">Sign In</span>
      <span id="btnLoading" class="hidden items-center justify-center">
    <svg aria-hidden="true" class="w-4 h-4 text-neutral-tertiary animate-spin fill-brand me-1" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    Loading...</span>
      </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-gray-400 text-xs mt-8">
      © 2025 Created by <span class="text-blue-500 font-semibold">Kennard</span>
    </p>
  </div>
</body>
<script>
  const form = document.querySelector('form');
  const btnText = document.getElementById('btnText');
  const btnLoading = document.getElementById('btnLoading');
  const btn = document.getElementById('loginBtn');

    // Toggle password visibility
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const eyeOpen = document.getElementById('eyeOpen');
  const eyeClose = document.getElementById('eyeClose');

  togglePassword.addEventListener('click', () => {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';

    eyeOpen.classList.toggle('hidden', isPassword);
    eyeClose.classList.toggle('hidden', !isPassword);
  });

  form.addEventListener('submit', () => {
    btn.disabled = true;
    btnText.classList.add('hidden');
    btnLoading.classList.remove('hidden');
    btnLoading.classList.add('flex');
  });
</script>
</html>