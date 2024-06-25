<h1 class="page-title">Recupera tu contraseña</h1>
<p class="page-subtitle">Recupera tu acceso en AppSalón</p>

<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <form class="form" method="POST" action="/recuperar">

        <div class="campo">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                placeholder="Ingresa tu correo electronico"
            >
        </div>

        <input type="submit" class="btn" value="Enviar Instrucciones">

    </form>

    <div class="acciones">
        <a href="/registro">¿Aún no tienes una cuenta? Crea una</a>
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    </div>
</div>