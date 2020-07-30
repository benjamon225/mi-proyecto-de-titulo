<h1>Gestión de Proveedores</h1>
<?php if (isset($_SESSION['proveedor']) && $_SESSION['proveedor'] == 'complete'): ?>
    <strong class="alert_green">El proveedor se ha registrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('proveedor'); ?>

<?php if (isset($_SESSION['edicion']) && $_SESSION['edicion'] == 'complete'): ?>
    <strong class="alert_green">El proveedor se ha editado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('edicion'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_red">El proveedor NO se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
    <strong class="alert_green">El proveedor se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div>
      <div class="col s6" style='float: left;'>
<form class="example" action="<?= base_url ?>?controller=proveedor&action=buscar" method="POST" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Buscar.." name="palabra">
  <button type="submit"><i class="fa fa-search"></i></button>
</form><br>
      </div>
           <div class="col s6" style='float: right;'>
<br><a href="<?= base_url ?>?controller=Proveedor&action=crear" class="button button-small">Nuevo Proveedor</a>
           </div>
    </div>
</div>

<table>
    
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Rut</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
  
    
        <?php while ($pro = $proveedores->fetch_object()): ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->correo; ?></td>
            <td><?= $pro->telefono; ?></td>
            <td><?= $pro->rut; ?></td>
            <td><?= $pro->direccion; ?></td>
            <td>
                <a href="<?= base_url ?>?controller=proveedor&action=editar&id=<?= $pro->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>?controller=proveedor&action=eliminar&id=<?= $pro->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
  
</table>
