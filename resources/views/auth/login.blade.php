<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login OSIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex justify-center items-center p-4">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h1 class="text-xl font-semibold mb-4 text-center">Login Pemilihan OSIS</h1>

        @if($errors->any())
            <div class="mb-3 bg-red-100 text-red-700 p-2 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- NIS --}}
            <div class="mb-6">
                <label for="nis" class="block font-medium">NIS</label>
                <input type="text" id="nis" name="nis" required
                    class="w-full mt-1 mb-3 border-gray-300 rounded-md">
            </div>

            {{-- Password --}}
            <div class="mb-4">
            <label for="password" class="block font-medium">Password</label>
            <input type="password" id="password" name="password" required
                    class="w-full mt-1 mb-4 border-gray-300 rounded-md">
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
                Login
            </button>

            <footer>
                <p class="pt-4 text-blue-500">2025 Dibuat Oleh Kenn</p>
            </footer>
        </form>
    </div>

</body>
</html>
