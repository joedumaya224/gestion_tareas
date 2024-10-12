<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full">
            <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Welcome to the Task Management System</h1>
            <div class="text-center mb-4">
                <p class="text-gray-600">Manage your tasks efficiently and stay organized!</p>
            </div>
            <div class="flex flex-col space-y-4">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white rounded-md py-2 hover:bg-blue-600 transition duration-200 text-center">Login</a>
                <a href="{{ route('register') }}" class="bg-green-500 text-white rounded-md py-2 hover:bg-green-600 transition duration-200 text-center">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
