<h1>Resultados</h1>
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
    <?php while ($re = $resultado->fetch_object()) : ?>
        <tr>
            <td><?= $re->id; ?></td>
            <td><?= $re->nombre; ?></td>
            <td><?= $re->direccion; ?></td>
            <td><?= $re->presupuesto; ?></td>
            <td><?= $re->estado; ?></td>
            <td><?= $re->tipo_id; ?></td>
            <td>
                <a href="<?= base_url ?>?controller=proyecto&action=editar&id=<?= $re->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>?controller=proyecto&action=eliminar&id=<?= $re->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br><a href="<?= base_url ?>?controller=proyecto&action=tabla" class="button button-small">Volver</a>

<!--    <tr>
        <th><?= isset($resultado) && is_object($resultado) ? $resultado->id : ''; ?></th>
        <th><?= isset($resultado) && is_object($resultado) ? $resultado->nombre : ''; ?></th>
        <th><?= isset($resultado) && is_object($resultado) ? $resultado->direccion : ''; ?></th>
        <th><?= isset($resultado) && is_object($resultado) ? $resultado->presupuesto : ''; ?></th>
        <th><?= isset($resultado) && is_object($resultado) ? $resultado->estado : ''; ?></th>
        <th><?= isset($resultado) && is_object($resultado) ? $resultado->tipo_id : ''; ?></th>
    </tr>-->