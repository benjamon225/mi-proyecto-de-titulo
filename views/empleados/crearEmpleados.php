<?php if(isset($edit) && isset($em) && is_object($em)): ?>
<h1>Editar Info Empleado <?= $em->nombre?></h1>
 <?php $url_action = base_url."?controller=empleado&action=save&id=".$em->id;?>
<?php $value = "Editar"?>
<?php else: ?>
<h1>Ingresar Nuevo Empleado</h1>
 <?php $url_action = base_url."?controller=empleado&action=save";?>
<?php $value = "Validar RUT e Ingresar"?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action?>" method="POST" onsubmit="return Vempleados();">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"  value="<?= isset($em) && is_object($em) ? $em->nombre : '';?>" />

        <label for="apelldio">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="<?= isset($em) && is_object($em) ? $em->apellido : '';?>" />
        
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" value="<?= isset($em) && is_object($em) ? $em->direccion : '';?>" />

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value="<?= isset($em) && is_object($em) ? $em->telefono : '';?>" />

        <label for="rut">Ingrese RUT</label>
        <input type="text" id="rut" name="rut" required oninput="checkRut(this)" value="<?= isset($em) && is_object($em) ? $em->rut : '';?>" >
        
        <label for="estado">Estado</label>
        <select name="estado" id="estado">
        <option value=" ">Seleccione</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <input type="submit" value="<?=$value?>" class="button"/>
        <script src="js/validarRUT.js"></script>
    </form>
</div>

