
<h1 class="page-title">Crea una cuenta</h1>
<p class="page-subtitle">Registrate en AppSalón</p>



<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <form class="form" method="POST" action="/registro">

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre"
                placeholder="Ingresa tu nombre"
                value="<?php echo s($usuario->nombre); ?>"
            >
        </div>

        <div class="campo">
            <label for="apellido">Apellido</label>
            <input 
                type="text" 
                name="apellido" 
                id="apellido"
                placeholder="Ingresa tu apellido"
                value="<?php echo s($usuario->apellido); ?>"
            >
        </div>

        <div class="campo">
            <label for="telefono">Teléfono</label>
            <input 
                type="tel" 
                name="telefono" 
                id="telefono"
                placeholder="Ingresa tu teléfono"
                value="<?php echo s($usuario->telefono); ?>"
            >
        </div>
    
        <div class="campo">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                placeholder="Ingresa tu correo electronico"
                value="<?php echo s($usuario->email); ?>"
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

        <input type="submit" class="btn" value="Crear cuenta">

    </form>

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/recuperar">¿Olvidaste tu contraseña?</a>
    </div>
</div>