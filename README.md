
# Documentación del Proyecto de Reserva de Hotel con Parking

## Índice

- [Introducción](#introducción)
- [Requisitos del sistema](#requisitos-del-sistema)
- [Configuración inicial](#configuración-inicial)
- [Funcionalidades](#funcionalidades)
  - [Reservas de Habitación](#reservas-de-habitación)
  - [Gestión de Parking](#gestión-de-parking)
  - [Panel de Recepcionista](#panel-de-recepcionista) 
  - [Panel de Gestor de Parking](#panel-de-gestor-de-parking)

## Introducción

Este documento proporciona una visión general de un sistema de reserva de habitaciones de hotel con la funcionalidad adicional de reservar plazas de parking. El sistema permite a los usuarios seleccionar una habitación y, opcionalmente, una plaza de parking durante su estancia.

## Requisitos del sistema

- PHP >= 7.3
- Composer
- MySQL

## Configuración inicial

1. Clona el repositorio del proyecto.
2. Ejecuta `composer install` para instalar dependencias.
3. Ejecuta composer require pusher/pusher-php-server
4. Ejecuta npm install --save laravel-echo pusher-js
5. Configura tu archivo `.env` con las credenciales de la base de datos.
6. Ejecuta `php artisan migrate` para configurar la base de datos.
7. Ejecuta `php artisan db:seed` para rellenar la base de datos.
8. Inicia el servidor de desarrollo con ` php artisan serve --host=192.168.33.20`.
9. Compila y desarrolla los assets del frontend como JavaScript y CSS con `npm run dev`.

## Información de Inicio de Sesión
1. **ADMIN:** admin@admin.com / admin
2. **USER**  john.doe@example.com / password1

## Funcionalidades

### Reservas de Habitación

- **Crear Reserva**: Los usuarios pueden reservar una habitación seleccionando las fechas de check-in y check-out.
- - **Verificar Disponibilidad**: El sistema verifica la disponibilidad de las habitaciones para las fechas seleccionadas.
- **Ver Reserva**: Los usuarios pueden ver los detalles de sus reservas.
- **Modificar Reserva**: Los usuarios pueden modificar sus reservas existentes.
- **Cancelar Reserva**: Los usuarios pueden cancelar sus reservas.

### Gestión de Parking

- **Reservar Parking**: Durante la reserva de una habitación, los usuarios pueden optar por reservar una plaza de parking.
- **Verificar Disponibilidad**: El sistema verifica la disponibilidad de las plazas de parking para las fechas seleccionadas.
- **Asignación de Parking**: Una plaza de parking disponible se asigna automáticamente a la reserva.
- **Liberar Parking**: Cuando una reserva se cancela, la plaza de parking correspondiente se libera.

### Panel de Recepcionista

- **Crear Reservas Telefónicas**: El recepcionista puede introducir reservas en el sistema que se han recibido por teléfono.
- **Confirmar Reserva**: El recepcionista puede confirmar las reservas realizadas, asegurando la asignación de habitaciones y parking si es necesario.
- **Cancelar Reserva**: El recepcionista tiene la capacidad de cancelar reservas según sea necesario.
- **Ver Reservas Diarias**: Hay una funcionalidad para que el recepcionista vea todas las reservas para el día actual, facilitando la gestión diaria del hotel.

### Panel de Gestor de Parking

- **Visualización de Espacios**: El gestor de parking puede ver el estado actual de las plazas de parking.
- **Asignación de Plazas de Parking**: Puede asignar plazas de parking a las reservas que lo requieran.
- **Liberación de Plazas de Parking**: Cuando una reserva se cancela o termina, el gestor de parking puede marcar la plaza como disponible nuevamente.

## Video Demostración

[![Demostración]](https://drive.google.com/file/d/1RwiQEp_Cu14HrR0IgDVlKmnMjDvbfDLF/view?usp=sharing)
