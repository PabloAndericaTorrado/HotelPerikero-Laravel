@component('mail::message')
    # Reserva Confirmada, {{ $cliente }}

    Te confirmamos que tu reserva ha sido exitosa y está esperándote. Aquí tienes los detalles importantes de tu estancia:

    @component('mail::table')
        **Detalles de la Reserva:** <br>
        ------------------------------
        | Detalles       | Descripción  |
        | ------------- |-------------:|
        | **ID de Reserva** | {{ $id }} |
        | **Tipo de habitación** | {{ $habitacion }} |
        | **Fecha de Entrada** | {{ $check_in }} |
        | **Fecha de Salida** | {{ $check_out }} |
        | **Precio Total** | {{ number_format($precio, 2) }}€ |

    @endcomponent
    --------------------------------------
    @component('mail::table')
        **Servicios Adicionales:**
        @foreach ($serviciosListados as $servicio)
            <br> - {{ $servicio }}
        @endforeach
    @endcomponent
    --------------------------------------
    @component('mail::table')
        **Parking** <br>
        @if($parking_id)
            - Plaza: {{ $parking_id }}
            - Matricula: {{ $matricula }}
        @else
            - No hay información de parking.
        @endif
    @endcomponent

    Para cualquier pregunta o cambio en tu reserva, estamos a tu disposición.

    Agradecemos enormemente tu preferencia y nos entusiasma la oportunidad de ofrecerte una experiencia memorable.

    Saludos cordiales,
    El Equipo del Hotel
@endcomponent
