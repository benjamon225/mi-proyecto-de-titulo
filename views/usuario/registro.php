<?php if(isset($edit) && isset($us) && is_object($us)): ?>
<h1>Editar Info Usuario <?= $us->nombre?></h1>
 <?php $url_action = base_url."?controller=usuario&action=save&id=".$us->id;?>
<?php $value = "Editar"?>
<?php?>
<?php else: ?>
<h1>Registrar Usuario</h1>
 <?php $url_action = base_url."?controller=usuario&action=save";?>
<?php $value = "Validar RUT e Ingresar"?>
<?php endif; ?>

<div class="wrapper">
  <div class="form" >

<form action="<?= $url_action?>" method="POST" onsubmit="return Vuser();">
    
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" />
    
    <label for="apellido">Apellido</label>
    <input type="text" name="apellidos" id="apellidos"/>
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email" />
    
    <label for="password">Password</label>
    <input type="password" name="password"  id="password"/>
    
    <input type="submit" value="Registrar"/>
</form>

      </div>
  
     <div class="image" style='float: right;'>
     <img class="image backArrow" src="<?= base_url ?>assets/img/construc.JPEG"  width="470" height="313" > 
     </div>
    
</div>
    
