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
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
            required
          />
        </div>
      </div>

      <!-- Submit Button -->
      <button
        type="submit"
        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-200"
      >
        Sign In
      </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-gray-400 text-xs mt-8">
      © 2025 Created by <span class="text-blue-500 font-semibold">Kennard</span>
    </p>
  </div>
</body>
</html>