<h1>Resultados</h1>
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
    
         <?php while ($re = $resultado->fetch_object()): ?>
    <tr>
            <td><?= $re->id; ?></td>
            <td><?= $re->nombre; ?></td>
            <td><?= $re->apellido; ?></td>
            <td><?= $re->direccion; ?></td>
            <td><?= $re->telefono; ?></td>
            <td><?= $re->rut; ?></td>
            <td><?= $re->estado; ?></td>
            <td>
                <a href="<?= base_url ?>?controller=empleado&action=editar&id=<?= $re->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>?controller=empleado&action=eliminar&id=<?= $re->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>
<br><a href="<?= base_url ?>?controller=empleado&action=tabla" class="button button-small">Volver</a>