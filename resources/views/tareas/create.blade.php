@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">Agregar Tarea</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-500 text-white p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tareas.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 
                       @error('titulo') border-red-500 @enderror" 
                       id="titulo" 
                       name="titulo" 
                       value="{{ old('titulo') }}" 
                       required>
                @error('titulo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" 
                          id="descripcion" 
                          name="descripcion" 
                          rows="4">{{ old('descripcion') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-700">Fecha de Vencimiento</label>
                <input type="date" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 
                       @error('fecha_vencimiento') border-red-500 @enderror" 
                       id="fecha_vencimiento" 
                       name="fecha_vencimiento" 
                       value="{{ old('fecha_vencimiento') }}" 
                       required>
                @error('fecha_vencimiento')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition duration-200">Crear Tarea</button>
        </form>
    </div>
@endsection
