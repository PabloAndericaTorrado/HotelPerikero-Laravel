@component('mail::message')
    @component('mail::panel')
        ## Reserva Confirmada {{ $cliente }}

        Estamos emocionados de confirmar tu reserva con nosotros. Aquí están los detalles:

        **ID de Reserva:** {{ $id }}
        **Tipo de habitación:** {{ $habitacion }}
        **Fecha de Entrada:** {{ $check_in->format('d-m-Y') }}
        **Fecha de Salida:** {{ $check_out->format('d-m-Y') }}
        **Precio Total:** {{ number_format($precio, 2) }}€


        Para cualquier pregunta o cambio en tu reserva, no dudes en contactarnos.

        Gracias por elegirnos,
        Esperamos brindarte una experiencia inolvidable.

        Saludos,
        El Equipo del Hotel.
    @endcomponent
@endcomponent
