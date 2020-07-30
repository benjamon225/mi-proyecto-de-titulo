<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tienda de Camisetas</title>
        <link rel="stylesheet" href="assets/css/styles.css"/>
    </head>
    <body>
        <!--cabecera-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png"/>
                <a href="index.php">
                    <h1>Tienda de Camisetas </h1>
                </a>
            </div>
        </header>
        <!--menu-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoría1
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoría2
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoría3
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoría4
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoría5
                    </a>
                </li>
            </ul>
            
        </nav>
        <div id="content">
            <!--barra lateral-->
            <aside id="lateral">
                
                <div id="loguin" class="block_aside">
                    <form action="" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        
                        <label for="password">Contraseña</label>
                        <input type="password" name="password"/>
                        <br>
                        <input type="submit" value="enviar"/>
                    </form>
                    <br><br>
                    <a href="#">Mis pedidos</a><br>
                    <a href="#">Gestionar pedidos</a><br>
                    <a href="#">Seguir pedidos</a><br>
                </div>
                
            </aside>
        
        <!--contenido central-->
        <div id="central">
            
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta Azul Bordada</h2>
                <p>30 Euros</p>
                <a href="#">Comprar</a>
            </div><!--Fin producto-->
            
             <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta Azul Bordada</h2>
                <p>30 Euros</p>
                <a href="#">Comprar</a>
            </div><!--Fin producto-->
            
             <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta Azul Bordada</h2>
                <p>30 Euros</p>
                <a href="#">Comprar</a>
            </div><!--Fin producto-->
            
             <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta Azul Bordada</h2>
                <p>30 Euros</p>
                <a href="#">Comprar</a>
            </div><!--Fin producto-->
            
        </div><!--fin central-->
        </div>
        
        <footer id="footer">
            <p>Desarrollado por mi &COPY;</p>
        </footer>
        
    </body>
</html>
