<h1 class="page-title">Servicios</h1>
<p class="page-subtitle">Administración de Servicios</p>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<ul class="servicios contenedor-sm">
    <?php foreach($servicios as $servicio) {?>
        <li>
            <p>Nombre: <span><?php echo $servicio->nombre; ?></span></p>
            <p>Precio: <span>$<?php echo $servicio->precio; ?></span></p>
            <div class="acciones">
                <a class="btn" href="/admin/servicios/actualizar?id=<?php echo $servicio->id ?>">Editar</a>
                <form action="/admin/servicios/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $servicio->id ?>">
                    <input class="btn-delete" type="submit" value="Eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>