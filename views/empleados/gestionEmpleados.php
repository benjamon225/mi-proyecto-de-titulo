<h1>Gestión de Empleados</h1>
<?php if (isset($_SESSION['empleado']) && $_SESSION['empleado'] == 'complete'): ?>
    <strong class="alert_green">El empleado se ha registrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('empleado'); ?>

<?php if (isset($_SESSION['edicion']) && $_SESSION['edicion'] == 'complete'): ?>
    <strong class="alert_green">Los datos del empleado se han editado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('edicion'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_red">El empleado No se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
    <strong class="alert_green">El empleado se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div>
      <div class="col s6" style='float: left;'>
    <form class="example" action="<?=base_url?>?controller=empleado&action=buscar" method="POST" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Buscar.." name="palabra">
  <button type="submit" ><i class="fa fa-search"></i></button>
    </form> <br>
      </div>
        <div class="col s6" style='float: right;'>
<a href="<?= base_url ?>?controller=Empleado&action=crear" class="button button-small">Nuevo Empleado</a>
        </div>
    </div>
</div>

<table>
    
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Rut</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
  
          <?php while ($em = $empleados->fetch_object()): ?>
        <tr>
            <td><?= $em->id; ?></td>
            <td><?= $em->nombre; ?></td>
            <td><?= $em->apellido; ?></td>
            <td><?= $em->direccion; ?></td>
            <td><?= $em->telefono; ?></td>
            <td><?= $em->rut; ?></td>
            <td><?= $em->estado; ?></td>
            
            <td>
                <a href="<?= base_url ?>?controller=empleado&action=editar&id=<?= $em->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>?controller=empleado&action=eliminar&id=<?= $em->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
            
        </tr>
    <?php endwhile; ?>
</table>

