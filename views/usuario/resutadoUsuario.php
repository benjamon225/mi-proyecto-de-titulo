<h1>Resultados</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>E-Mail</th>
        <th>Rol</th>
        <th>Acciones </th>
    </tr>
    
         <?php while ($re = $resultado->fetch_object()): ?>
    <tr>
            <td><?= $re->id; ?></td>
            <td><?= $re->nombre; ?></td>
            <td><?= $re->apellidos; ?></td>
            <td><?= $re->email; ?></td>
            <td><?= $re->rol; ?></td>
            <td>
          
            <a href="<?= base_url ?>?controller=usuario&action=eliminar&id=<?= $re->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
   
        </tr>
    <?php endwhile; ?>
    
</table>
<br><a href="<?= base_url ?>?controller=usuario&action=tabla" class="button button-small">Volver</a>
