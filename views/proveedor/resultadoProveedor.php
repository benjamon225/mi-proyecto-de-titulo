<h1>Resultados</h1>
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
    
         <?php while ($re = $resultado->fetch_object()): ?>
        <tr>
            <td><?= $re->id; ?></td>
            <td><?= $re->nombre; ?></td>
            <td><?= $re->correo; ?></td>
            <td><?= $re->telefono; ?></td>
            <td><?= $re->rut; ?></td>
            <td><?= $re->direccion; ?></td>
            <td>
                <a href="<?= base_url ?>?controller=proveedor&action=editar&id=<?= $re->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>?controller=proveedor&action=eliminar&id=<?= $re->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    
</table>
<br><a href="<?= base_url ?>?controller=proveedor&action=tabla" class="button button-small">Volver</a>