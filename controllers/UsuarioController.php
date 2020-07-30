<?php

require_once 'models/usuario.php';

class usuarioController
{

    public function index()
    {
        echo "Controlador Usuarios, Acción index";
    }
    //metodo que me lleva al formulario de registro
    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
//metodo para registrar a los usuarios
    public function save()
    {
        //compruebo que me lleguen los datos por post
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                //instancio la clase y le asigno los atributos por medio del objeto que vienen de post
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                //aqui llamo a la funcion save
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $usuario->setId($id);
                    $save = $usuario->edit();
                } else {
                    $save = $usuario->save();
                }
                //creo sesiones dependiendo del resultado
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        //si el resultado en correcto redirecciono a otra vista
        header("Location:" . base_url . '?controller=usuario&action=tabla');
    }
//funcion para el login
    public function login()
    {
        //compruebo que los datos me llegan por POST
        if (isset($_POST)) {
            // Identificar al usuario
            // Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            //llamo a la funcion
            $identity = $usuario->login();
            //creo una session y objeto del usuario que ingreso al sistema
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                //creo otra sesion por si el rol del usuario es admin
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificación fallida !!';
            }
        }
        header("Location:" . base_url);
    }
//funcion para cerrar la sesión
    public function logout()
    {
        //cierro las sesiones de los usuarios
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        //redirecciono a la pagina principal
        header("Location:" . base_url);
    }

    public function tabla()
    {

        //mando a llamar el metodo en la clase para listar todos los usuarios
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        //redirecciono a la vista que contiene la tabla
        require_once 'views/usuario/gestionusuarios.php';
    }

    public function eliminar()
    {
        //verifico que el id del seleccionado llegue por GET
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new Usuario();
            //le asigno el id que recibi al atributo de la clase
            $usuario->setId($id);
            //llamo el metodo eliminar
            $delete = $usuario->eliminar();
            //creo un session segun el resultado 
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header("Location:" . base_url . '?controller=usuario&action=tabla');
    }
//funcion para buscar datos
    public function buscar()
    {
        //compruebo que la palabra llegue del formulario por POST
        if ($_POST['palabra']) {
            $palabra = $_POST['palabra'];
            $usuario = new Usuario();
            //llamo al  mmetodo busar de la clase
            $resultado = $usuario->buscar($palabra);
            //redirecciono a la vista de resultados
            require_once 'views/usuario/resutadoUsuario.php';
        } else {
            //si no llega nada por post envio este mensaje
            echo '<h2>No has ingresado nada en la barra de Busqueda</h2>';
        }
    }

    public function editar() {
        //compruebo que llegue el id del objeto a editar
       if (isset($_GET['id'])) {
           $id = $_GET['id'];
           $edit = true;
           $usuario = new usuario();
           //asigno el id que recibi al atributo de la clase
           $usuario->setId($id);
           $us = $usuario->getOne();
           //renderizo la vista hacia al formulario para editar
           require_once 'views/usuario/editarUsuario.php';
       } else {
           header("Location:" . base_url . '?controller=usuario&action=tabla');
       }
   }


}

// fin clase