<h1 class="page-title">Editar Servicio</h1>
<p class="page-subtitle">Administración de Servicios</p>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <form class="form" method="POST">
        <?php include_once __DIR__ . "/formulario.php" ?>
        <input type="submit" class="btn" value="Actualizar Servicio">
    </form>
</div>