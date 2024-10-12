@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Lista de Tareas</h1>

        @if (session('success'))
            <div class="alert alert-success mb-4 bg-green-500 text-white p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($tareas->isEmpty())
            <div class="alert alert-info mt-3 bg-blue-100 text-blue-800 p-4 rounded">
                No tienes tareas pendientes.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 text-left text-gray-600 font-semibold">Título</th>
                            <th class="py-2 px-4 text-left text-gray-600 font-semibold">Descripción</th>
                            <th class="py-2 px-4 text-left text-gray-600 font-semibold">Fecha de Vencimiento</th>
                            <th class="py-2 px-4 text-left text-gray-600 font-semibold">Estado</th>
                            <th class="py-2 px-4 text-left text-gray-600 font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareas as $tarea)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-4 text-gray-700">{{ $tarea->titulo }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $tarea->descripcion }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') }}</td>
                                <td class="py-2 px-4">
                                    @if ($tarea->completado)
                                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full">Completada</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded-full">Pendiente</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 flex space-x-2">
                                    @if (!$tarea->completado)
                                        <form action="{{ route('tareas.complete', $tarea) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="bg-blue-500 text-white rounded-full px-5 py-2 text-sm hover:bg-blue-600" title="Marcar como completada y enviar al correo">
                                                Finalizar
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta tarea?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white rounded-full px-5 py-2 text-sm hover:bg-red-600" title="Eliminar tarea">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $tareas->links() }}
            </div>
        @endif
    </div>
@endsection
