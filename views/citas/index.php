<h1 class="page-title">Agenda una nueva cita</h1>
<p class="page-subtitle">Configura tu cita</p>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<div id="app">
    <nav class="tabs contenedor-sm">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
    <div id="paso-1" class="seccion contenedor-sm">
        <h2 class="text-left">Servicios</h2>
        <p class="text-left">Elige tus servicios</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>

    <div id="paso-2" class="seccion contenedor-sm">
        <h2 class="text-left">Tus datos y Cita</h2>
        <p class="text-left">Coloca tus datos y fecha de tu cita</p>
        <form class="form">
            <div class="campo">
                <label for="nombre">Cliente</label>
                <input 
                    type="text" 
                    id="nombre"
                    placeholder="Tu nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                >
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input 
                    id="fecha"
                    type="date" 
                    min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                >
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <input 
                    type="time"
                    id="hora"
                >
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>">
        </form>
    </div>

    <div id="paso-3" class="seccion contenido-resumen contenedor-sm">
        <h2 class="text-left">Resumen</h2>
        <p class="text-left">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion contenedor-sm">
        <button
            id="anterior"
            class="btn"
        >&laquo; Anterior</button>

        <button
            id="siguiente"
            class="btn"
        >Siguiente &raquo;</button>
    </div>

</div>

<?php $script = "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    "; 

?>