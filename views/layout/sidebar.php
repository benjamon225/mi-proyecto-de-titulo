<!--barra lateral-->

<aside id="lateral">

    <div id="loguin" class="block_aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Inicio de Sesión</h3>
            <form action="<?= base_url ?>?controller=usuario&action=login" method="POST"  onsubmit="return Vlogin()">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" />
                <br>
                <input type="submit" value="Enviar"/>
                
            </form>
        <?php else : ?>
            <h3>Bienvenido <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
            <ul>
                <li><a class="cerrar" href="<?= base_url ?>?controller=usuario&action=logout">Cerrar Sesión</a></li>
            </ul>
        <?php endif ?>
        <br><br>
        <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'Identificación fallida !!') : ?>
            <strong class="alert_red">Email o contraseña Incorrectos.</strong>
        <?php endif; ?>
        <?php Utils::deleteSession('error_login'); ?>
    </div>

</aside>
<!--contenido central-->
<div id="central">