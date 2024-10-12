<?php

namespace App\Mail;

use App\Models\Tarea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TareaCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $tarea;

    public function __construct(Tarea $tarea)
    {
        $this->tarea = $tarea;
    }

    public function build()
    {
        return $this->subject('Tarea Completada')
                    ->view('emails.tarea_completed')  // Asegúrate de que esta vista exista
                    ->with([  // Pasar datos a la vista, si es necesario
                        'tarea' => $this->tarea, // Puedes usar $this->tarea en tu vista
                    ]);
    }


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
