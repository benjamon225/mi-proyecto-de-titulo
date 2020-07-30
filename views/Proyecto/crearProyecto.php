<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar Proyeto <?= $pro->nombre?></h1>
 <?php $url_action = base_url."?controller=proyecto&action=save&id=".$pro->id;?>
<?php $value = "Editar"?>
<?php else: ?>
<h1>Crear nuevo Proyecto</h1>
 <?php $url_action = base_url."?controller=proyecto&action=save";?>
<?php $value = "Ingresar"?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action ?>" method="POST" onsubmit="return Vpro();" >

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : '';?>" />

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" value="<?= isset($pro) && is_object($pro) ? $pro->direccion : '';?>" />


        <label for="presupuesto">Presupuesto</label>
        <input type="text" name="presupuesto" id="presupuesto" value="<?= isset($pro) && is_object($pro) ? $pro->presupuesto : '';?>" />

        <label for="tipo">Tipo de Proyecto</label>
        <?php $tipo_proyecto = utils::showTipos(); ?>
        <select name="tipo" id="tipo">
            <option value=" ">Seleccione</option>
            <?php while ($tp = $tipo_proyecto->fetch_object()):?>
                <option value="<?= $tp->id ?>"<?= isset($pro) && is_object($pro) && $tp->id == $pro->tipo_id ? 'selected' : '';?>>
                    <?= $tp->tipo_proyecto ?>
                </option>          
            <?php endwhile; ?>
        </select>
        
        <label for="estado">Estado del Proyecto</label>
        <select name="estado" id="estado">
            <option value=" ">Seleccione</option>
            <option value="activo">Activo</option>
            <option value="progreso">En proceso</option>
            <option value="inactivo">Inactivo</option>
        </select>


        <input type="submit" value="<?=$value?>"/>


    </form>
</div>
