<h1 class="page-title">Nuevo Servicio</h1>
<p class="page-subtitle">Crea un nuevo servicio</p>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <form class="form" method="POST" action="/admin/servicios/crear">
        <?php include_once __DIR__ . "/formulario.php" ?>
        <input type="submit" class="btn" value="Crear Servicio">

    </form>
</div>