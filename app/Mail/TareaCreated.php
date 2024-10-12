<?php

namespace App\Mail;

use App\Models\Tarea;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TareaCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $tarea;

    public function __construct(Tarea $tarea)
    {
        $this->tarea = $tarea;
    }

    public function build()
    {
        return $this->subject('Nueva Tarea Creada')
                    ->view('emails.tarea_created') // Asegúrate de que esta vista exista
                    ->with([
                        'task' => $this->tarea,
                    ]);
    }

    // Eliminar el método envelope() si no lo necesitas.
    // Eliminar el método content() si usas solo build().

    public function attachments()
    {
        return [];
    }
}
