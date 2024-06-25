<div class="barra contenedor-sm">
    <p>Bienvenido: <?php echo $nombre ?? ''; ?> </p>
    <a href="/logout" class="btn">Cerrar sesión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>
    <div class="barra-servicios contenedor-sm">
        <a class="btn-actions" href="/admin">Ver Citas</a>
        <a class="btn-actions" href="/admin/servicios">Ver servicios</a>
        <a class="btn-actions" href="/admin/servicios/crear">Nuevo Servicio</a>
    </div>
<?php } ?>