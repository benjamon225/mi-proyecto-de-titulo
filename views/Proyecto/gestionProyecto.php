<h1>Gestion de Proyectos</h1>
<?php if (isset($_SESSION['proyecto']) && $_SESSION['proyecto'] == 'complete'): ?>
    <strong class="alert_green">El proyecto se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('proyecto'); ?>

<?php if (isset($_SESSION['edicion']) && $_SESSION['edicion'] == 'complete'): ?>
    <strong class="alert_green">El proyecto se ha editado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('edicion'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_red">El proyecto No se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
    <strong class="alert_green">El proyecto se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div>
      <div class="col s6" style='float: left;'>
    <form class="example" action="<?= base_url ?>?controller=proyecto&action=buscar" method="POST" style="margin:auto;max-width:300px">
        <input type="text" placeholder="Buscar.." name="palabra">
        <button type="submit" ><i class="fa fa-search"></i></button>
        </form><br>
      </div>
    
    <div class="col s6" style='float: right;'>
        <br><a href="<?= base_url ?>?controller=proyecto&action=crear" class="button button-small">Nuevo Proyecto</a>
    
      </div>
    </div>   
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Presupuesto</th>
        <th>Estado</th>
        <th>Tipo Proyecto</th>
        <th>Acciones</th>
    </tr>

    <?php while ($pro = $proyectos->fetch_object()): ?>
  
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->direccion; ?></td>
            <td><?= $pro->presupuesto; ?></td>
            <td><?= $pro->estado; ?></td>
            <td><?= $pro->tipo_id; ?></td>
            <td>
                <a href="<?= base_url ?>?controller=proyecto&action=editar&id=<?= $pro->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>?controller=proyecto&action=eliminar&id=<?= $pro->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
   
    <?php endwhile; ?>
</table>



