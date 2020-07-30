<?php

require_once 'models/proyecto.php';

class proyectoController
{
    //esta es la vista principal del programa
    public function index()
    {
        require_once 'views/proyecto/welcome.php';
    }
    //funcion para registrar en la base de datos
    public function save()
    {
         //compruebo que los datos lleguen por POST
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $presupuesto = isset($_POST['presupuesto']) ? $_POST['presupuesto'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
             //si llegan, asigno los datos a los atributos de la clase
            if ($nombre && $direccion && $presupuesto && $tipo && $estado) {
                $proyecto = new Proyecto();
                $proyecto->setNombre($nombre);
                $proyecto->setDireccion($direccion);
                $proyecto->setPresupuesto($presupuesto);
                $proyecto->setTipo_id($tipo);
                $proyecto->setEstado($estado);
                
                //hago una condicion, si llega un id por medio del boton editar, se llamara a la funcion de editar
                //si llega sin ningun parametro se ocupara la funcion de save
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $proyecto->setId($id);
                    $edit = $proyecto->edit();

                    if($edit){
                        $_SESSION['edicion'] = 'complete';
                    }
                } else {
                    $save = $proyecto->save();
                }
                 //creo sesiones dependiendo de si el resultado es bueno o malo, para enviar alertas
                if ($save) {
                    $_SESSION['proyecto'] = 'complete';
                } else {
                    $_SESSION['proyecto'] = 'failed';
                }
            } else {
                $_SESSION['proyecto'] = 'failed';
            }
        } else {
            $_SESSION['proyecto'] = 'failed';
        }
        //redirecciono a la pagina para mostrar datos
        header("Location:" . base_url . '?controller=proyecto&action=tabla');
    
    }
  //funcion que enviar al formulario de registro
    public function crear()
    {

        require_once 'views/proyecto/crearProyecto.php';
    }

    public function eliminar()
    {
        //compruebo que llegue el id del objeto a eliminar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $proyecto = new Proyecto();
            //asigno el id que recibi al atributo de la clase
            $proyecto->setId($id);
            //llamo a la funcion eliminar
            $delete = $proyecto->delete();
            //creo sesiones para identificar el resultado
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
         //renderizo la vista hacia la tabla nuevamente
        header("Location:" . base_url . '?controller=proyecto&action=tabla');
    }

    public function editar()
    {
         //compruebo que llegue el id del objeto a editar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            $proyecto = new Proyecto();
             //asigno el id que recibi al atributo de la clase
            $proyecto->setId($id);
            //llamo al metodo de la clase
            $pro = $proyecto->getOne();
            //renderizo la vista hacia al formulario para editar
            require_once 'views/Proyecto/crearProyecto.php';
        } else {
            header("Location:" . base_url . '?controller=proyecto&action=tabla');
        }
    }

    public function buscar(){
         //verifico que llegue el parametro por POST
        if ($_POST['palabra']) {
            $palabra = $_POST['palabra'];
            $proyecto = new Proyecto();
             //llamo a la funcion asignandole la palabra por parametros
            $resultado = $proyecto->buscar($palabra);
            //renderizo la vista nuevamente
            require_once 'views/Proyecto/resultadoProyecto.php';
        } else {
            //si no llega nada por POST imprimo este mensaje
            echo '<h2>No has ingresado nada en la barra de Busqueda</h2>';
        }
        
    }

    public function tabla()
    {

        //funcion para mostrar los datos en la tabla
        $proyecto = new Proyecto();
        $proyectos = $proyecto->tabla();
        require_once 'views/Proyecto/gestionProyecto.php';
    }
}
