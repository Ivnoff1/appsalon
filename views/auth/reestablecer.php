
<h1 class="page-title">Reestablece tu contraseña</h1>
<p class="page-subtitle">Ingresa tu nueva contraseña</p>

<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <?php if($error) return; ?>
    <form class="form" method="POST">

        <div class="campo">
            <label for="password">Contraseña</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                placeholder="Tu contraseña"
            >
        </div>

        <input type="submit" class="btn" value="Cambiar contraseña">

    </form>

    <div class="acciones">
        <a href="/registro">¿Aún no tienes una cuenta? Crea una</a>
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    </div>
</div>