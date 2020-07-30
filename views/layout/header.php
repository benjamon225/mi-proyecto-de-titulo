<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Proyecto de Título</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css" />
    <script src="js/formularos.js"></script>
</head>

<body>
    <!--cabecera-->
    <header id="header">
        <div id="logo">
            <img class="image headLog" src="<?= base_url ?>assets/img/logochico.JPG" />
            <a href="index.php">
                <h1>Building CB</h1>
            </a>
        </div>
    </header>
    <!--menu-->
    <nav id="menu">
        <ul>

            <?php if (isset($_SESSION['admin'])) : ?>
                <li> <a href="<?= base_url ?>?controller=usuario&action=tabla">Gestionar Usuarios</a></li>
                <li> <a href="<?= base_url ?>?controller=tipo&action=index">Tipos de Proyectos</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])) : ?>
                <li> <a href="<?= base_url ?>?controller=proyecto&action=tabla">Gestionar Proyectos</a></li>
                <li> <a href="<?= base_url ?>?controller=Empleado&action=tabla">Gestión de Empleados</a></li>
                <li> <a href="<?= base_url ?>?controller=Proveedor&action=tabla">Gestión de Proveedores</a></li>
                <li> <a href="<?= base_url ?>?controller=contacto&action=index">Ayuda</a></li>
            <?php endif; ?>
        </ul>

    </nav>

    <div id="content">