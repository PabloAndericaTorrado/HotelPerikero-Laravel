{{-- resources/views/recepcionista/dashboard.blade.php --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de Recepcionista</div>

                <div class="card-body">
                    ¡Bienvenido al panel de recepcionista, {{ Auth::user()->name }}!

                    {{-- Puedes agregar contenido específico para el dashboard del recepcionista --}}
                </div>
            </div>
        </div>
    </div>
</div>
