<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = Tarea::where('usuario_id', Auth::id())->orderBy('fecha_vencimiento')->paginate(5);
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_vencimiento' => 'required|date',
        ], [
            'titulo.required' => 'El campo Título es obligatorio.',
            'fecha_vencimiento.required' => 'El campo Fecha de Vencimiento es obligatorio.',
            'fecha_vencimiento.date' => 'El campo Fecha de Vencimiento debe ser una fecha válida.',
        ]);
    

        $task = Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'completado' => false,
            'usuario_id' => Auth::id(),
        ]);

        Mail::to(Auth::user()->email)->send(new \App\Mail\TareaCreated($task));

        return redirect()->route('tareas.index')->with('success', 'Tarea creada con éxito.');
    }

    public function complete(Tarea $task)
    {
        $task->completado = true;
        $task->save();

        Mail::to($task->user->email)->send(new \App\Mail\TareaCompleted($task));

        return redirect()->route('tareas.index')->with('success', 'Tarea marcada como completada.');
    }

    public function destroy(Tarea $task)
    {
        if ($task->usuario_id !== Auth::id()) {
            return redirect()->route('tareas.index')->with('error', 'No tienes permiso para eliminar esta tarea.');
        }

        $task->delete(); 

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada con éxito.');
    }


}
