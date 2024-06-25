
<h1 class="page-title">Login</h1>
<p class="page-subtitle">Inicia sesión en AppSalón</p>

<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <form class="form" method="POST" action="/">

        <div class="campo">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                placeholder="Ingresa tu correo electronico"
            >
        </div>

        <div class="campo">
            <label for="password">Contraseña</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                placeholder="Tu contraseña"
            >
        </div>

        <input type="submit" class="btn" value="Iniciar Sesión">

    </form>

    <div class="acciones">
        <a href="/registro">¿Aún no tienes una cuenta? Crea una</a>
        <a href="/recuperar">¿Olvidaste tu contraseña?</a>
    </div>
</div>
