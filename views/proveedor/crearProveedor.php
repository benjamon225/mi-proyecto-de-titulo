<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar Info Proveedor <?= $pro->nombre?></h1>
 <?php $url_action = base_url."?controller=proveedor&action=save&id=".$pro->id;?>
<?php $value = "Editar"?>
<?php else: ?>
<h1>Ingresar Nuevo Proveedor</h1>
 <?php $url_action = base_url."?controller=proveedor&action=save";?>
<?php $value = "Ingresar"?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action?>" method="POST" onsubmit="return Vv();">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : '';?>" />

        <label for="correo">Correo Electrónico</label>
        <input type="email" name="correo" id="email" value="<?= isset($pro) && is_object($pro) ? $pro->correo : '';?>" />

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value="<?= isset($pro) && is_object($pro) ? $pro->telefono : '';?>" />

        <label for="rut">Rut</label>
        <input type="text" id="rut" name="rut" required oninput="checkRut(this)" value="<?= isset($pro) && is_object($pro) ? $pro->rut : '';?>" />
        <p>(Ej: 99999999-9)</p>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" value="<?= isset($pro) && is_object($pro) ? $pro->direccion : '';?>" />

        <input type="submit" value="<?=$value?>" class="button"/>
        <script src="js/validarRUT.js"></script>

    </form>
</div>
