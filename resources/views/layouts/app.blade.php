<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestión de Tareas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-8nOdP68cFNhH0scHjaKXl9b5/hoZx1cV5H9vH3f7CPXwwG2DLf0rqlUu7/qYgFzU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMpW+2s5c2L1aO4BL5G70wh8z0dW9x9/ZK3hEj" crossorigin="anonymous">
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen">
        <!-- Navegación personalizada -->
        <nav class="bg-blue-600 text-white p-4 shadow">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex space-x-4">
                    <a href="{{ route('tareas.index') }}" class="hover:bg-blue-500 px-3 py-2 rounded">Tareas</a>
                    <a href="{{ route('tareas.create') }}" class="hover:bg-blue-500 px-3 py-2 rounded">Crear Tarea</a>
                </div>
                <div class="flex items-center">
                    <span class="mr-4">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="hover:bg-blue-500 px-3 py-2 rounded" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>


        @if (isset($header))
            <header class="bg-white shadow mb-4">
                <div class="container mx-auto py-4 text-center">
                    <h1 class="text-2xl font-semibold text-gray-800">{{ $header }}</h1>
                </div>
            </header>
        @endif

        <main class="container mx-auto mt-3 p-6 bg-white rounded-lg shadow">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-+Z1lB2U5xD7X/dNQJtM+6q+2gG9sYZQ5C6yRkuNcMCDqcPpX+6sYBa6C0T5YgPTM" crossorigin="anonymous"></script>
</body>
</html>
