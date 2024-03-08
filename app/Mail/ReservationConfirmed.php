<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmed extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($reservation)
    {
        $this->reservation = $reservation;


    }

    public function build()
    {
        // Asumiendo que ya has cargado la relación 'reservaParking' como se muestra en los puntos anteriores.
        $serviciosListados = $this->reservation->servicios->pluck('nombre')->toArray();


        // Usa la reserva que ya tiene la relación cargada.
        return $this->markdown('emails.reservation.confirmed')
            ->with([
                'cliente' => $this->reservation->usuario->name,
                'habitacion' => $this->reservation->habitacion->tipo,
                'check_in' => $this->reservation->check_in,
                'check_out' => $this->reservation->check_out,
                'precio' => number_format($this->reservation->precio_total, 2),
                'id' => $this->reservation->id,
                'serviciosListados' => $serviciosListados,
                'parking_id' => $this->reservation->reservaParking ? $this->reservation->reservaParking->parking_id : null,
                'matricula' => $this->reservation->reservaParking ? $this->reservation->reservaParking->matricula : null,
            ]);
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reserva Confirmada!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reservation.confirmed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
