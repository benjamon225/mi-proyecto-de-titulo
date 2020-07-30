 <?php if (!isset($_SESSION['identity'])): ?>
<h1>Bienvenido</h1>
<h4> Inicia Sesión en el sistema para utilizarlo.</h4><br>
<h4> Gestiona los Datos que desees con nuestro Software.</h4><br><br><br>
<h2>Disfruta tu experiencia.</h2>
<?php else:?>
<?php require_once 'views/inicioSesion.php';?>
<?php endif; ?>
