<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen text-gray-800">
    <div class="bg-white rounded-lg shadow-lg p-8 w-80">
        <h1 class="text-blue-600 text-2xl mb-6 text-center">Iniciar Sesión</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition duration-200">Iniciar Sesión</button>
        </form>
        <div class="mt-4 text-sm text-gray-600 text-center">
            <p>No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>
