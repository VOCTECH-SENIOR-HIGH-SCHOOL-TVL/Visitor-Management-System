<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Voctech</title>
        <link rel="icon" href="{{ asset('image/30441-removebg-preview (1).png') }}" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data="{ sidebarOpen: true }">
    <div class="min-h-screen flex bg-gray-100">

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'w-64' : 'w-0'" class="bg-blue-900 text-white transition-all duration-300 overflow-hidden">
            <div class="h-16 flex items-center justify-between px-4">
                <span class="text-xl font-bold">Admin</span>
                <button @click="sidebarOpen = !sidebarOpen" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="px-4 py-4 space-y-4">
                <a href="{{ route('dashboard') }}" class="block py-2 hover:bg-blue-800 rounded">Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="block py-2 hover:bg-blue-800 rounded">Profile</a>
                <a href="{{ route('visitors.index') }}" class="block py-2 hover:bg-blue-800 rounded">Visitor Management</a>
                <a href="{{ route('contacts.index') }}" class="block py-2 hover:bg-blue-800 rounded">Student & Admin</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1">
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>