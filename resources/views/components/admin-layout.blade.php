<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilu OSIS - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @livewireStyles
</head>
<body class="flex bg-gray-50">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg h-screen fixed flex flex-col">
        <div class="p-6 border-b">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('storage/osis2.png') }}" alt="" class="w-10 h-10">
                <h1 class="text-xl font-bold text-gray-800">Pemilu OSIS</h1>
            </div>
        </div>
        <nav class="mt-6 px-4">
            <ul class="space-y-2">
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center px-4 py-3 text-gray-700 bg-blue-50 rounded-lg font-medium' : 'flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg' }}">
                    <i class="fa-solid fa-house mr-3 text-blue-600"></i> Dashboard
                </a></li>
                <li><a href="{{ route('admin.create.user') }}" class="{{ request()->routeIs('admin.create.user') ? 'flex items-center px-4 py-3 text-gray-700 bg-blue-50 rounded-lg font-medium' : 'flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg' }}">
                    <i class="fa-solid fa-user-plus mr-3 text-blue-600"></i>User
                </a></li>
                <li><a href="{{ route('admin.create.candidate') }}" class="{{ request()->routeIs('admin.create.candidate') ? 'flex items-center px-4 py-3 text-gray-700 bg-blue-50 rounded-lg font-medium' : 'flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg' }}">
                    <i class="mr-2 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z" clip-rule="evenodd" />
                        </svg>
                    </i>Candidate
                </a></li>
            </ul>
        </nav>

        <!-- Logout Button (paling bawah) -->
        <div class="px-4 py-4 mt-auto">
            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg font-medium transition-colors">
                    <i class="fa-solid fa-right-from-bracket mr-3 text-red-600"></i> Log Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <main class="ml-64 flex-1 p-6">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>