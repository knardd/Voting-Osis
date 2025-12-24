<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Voting OSIS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <livewire:candidate-list :wire:key="auth()->id() ?? 'guest'" />
    
    @livewireScripts
    @stack('scripts')
    @stack('styles')
</body>
</html>
