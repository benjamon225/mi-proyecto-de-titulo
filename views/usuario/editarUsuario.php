<?php if(isset($edit) && isset($us) && is_object($us)): ?>
<h1>Editar Info Usuario <?= $us->nombre?> Con los k</h1>
 <?php $url_action = base_url."?controller=usuario&action=save&id=".$us->id;?>
<?php endif; ?>

<?php  if(isset($_SESSION['register']) && $_SESSION['register'] =='complete'): ?>

    <strong>Registro Completado Correctamente</strong>
    
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
    
    <strong>Registro Fallido</strong>
    
<?php endif ?>

<?php utils::deleteSession('register'); ?>

<div class="form_container">

<form action="<?= $url_action?>" method="POST" onsubmit="return edit();">
    
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre"  value="<?= isset($us) && is_object($us) ? $us->nombre : '';?>" />
    
    <label for="apellido">Apellido</label>
    <input type="text" name="apellidos" id="apellidos" value="<?= isset($us) && is_object($us) ? $us->apellidos : '';?>" />
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= isset($us) && is_object($us) ? $us->email : '';?>"  />
    
   
    <input type="submit" value="Editar"/>
</form>
</div>