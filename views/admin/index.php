<div class="app-admin">
    <h1 class="page-title">Panel de administración</h1>

    <?php include_once __DIR__ . '/../templates/barra.php' ?>

    <div class="contenedor-sm">
        <h2 class="text-left">Buscar citas</h2>
        <div class="busqueda">
            <form action="" class="form">
                <div class="campo">
                    <label for="fecha"></label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $fecha ?>">
                </div>
            </form>
        </div>

        <?php if(count($citas) === 0) {
            echo "<h2>No hay citas</h2>";
        }?>

        <div id="citas-admin">
            <ul class="citas">
            <?php 
                $idCita = 0;
                foreach( $citas as $key => $cita ) {
                    if($idCita !== $cita->id) {    
                        $total = 0;     
            ?>
                <li>
                    <h3 class="text-left">Cita</h3>
                    <p>Id: <span><?php echo $cita->id; ?></span></p>
                    <p>Hora: <span><?php echo $cita->hora; ?></span></p>
                    <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
                    <p>Email: <span><?php echo $cita->email; ?></span></p>
                    <p>telefono: <span><?php echo $cita->telefono; ?></span></p>
                    <h3 class="text-left">Servicios</h3>
                    <?php
                    $idCita = $cita->id;
                } $total += $cita->precio; ?>
                    <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>
                <?php 

                    $actual = $cita->id;
                    $proximo = $citas[$key + 1]->id ?? 0; 

                    if(esUltimo($actual, $proximo)) { ?>

                        <p class="total">Total: <span>$ <?php echo $total; ?></span></p>

                        
                        <form action="/api/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                            <input type="submit" class="btn-delete" value="Eliminar">
                        </form>

                    <?php } ?>

            <?php } ?>
            </ul>
        </div>
    </div>
</div>


<?php   
    $script = "<script src='build/js/buscador.js'></script>"

?>
