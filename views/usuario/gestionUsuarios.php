<h1>Gestión de Usuario.</h1>
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>

    <strong>Registro Completado Correctamente</strong>

<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>

    <strong>Registro Fallido</strong>

<?php endif ?>

<?php utils::deleteSession('register'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_red">El Usuario No se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong class="alert_green">El Usuario se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div>
        <div class="col s6" style='float: left;'>
            <form class="example" action="<?= base_url ?>?controller=usuario&action=buscar" method="POST" style="margin:auto;max-width:300px">
                <input type="text" placeholder="Buscar.." name="palabra">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form><br>
        </div>
        <div class="col s6" style='float: right;'>
            <a href="<?= base_url ?>?controller=usuario&action=registro" class="button button-small">Registrar Usuarios</a>
        </div>
    </div>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>

    <?php while ($us = $usuarios->fetch_object()) : ?>
        <tr>
            <td><?= $us->id; ?></td>
            <td><?= $us->nombre; ?></td>
            <td><?= $us->apellidos; ?></td>
            <td><?= $us->email; ?></td>
            <td><?= $us->rol; ?></td>
            <td>

                <a href="<?= base_url ?>?controller=usuario&action=eliminar&id=<?= $us->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>