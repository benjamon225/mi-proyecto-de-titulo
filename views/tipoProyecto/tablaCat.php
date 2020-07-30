<h1>Gestionar Categorías</h1>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_red">La categoría No se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
    <strong class="alert_green">La categoría se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
    <div class="row">
    <div>
      <div class="col s6" style='float: right;'>
<a href="<?=base_url?>?controller=tipo&action=crear" class="button button-small">Crear Categoría</a>
      </div>
    </div>
    </div>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while ($tip = $tipos->fetch_object()): ?>

        <tr>

            <td>
                <?= $tip->id; ?>
            </td>
            <td>
                <?= $tip->tipo_proyecto; ?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

