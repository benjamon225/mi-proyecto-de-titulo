<?php

require_once 'models/empleado.php';

class EmpleadoController {
    //funcion que envia al formulario para registrar a los empleados
    public function crear() {
        
        require_once 'views/empleados/crearEmpleados.php';
    }
    //funcion para registrar en base de datos
    public function save() {
        //compruebo que me lleguen todos los datos requeridos por POST
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $rut = isset($_POST['rut']) ? $_POST['rut'] : false;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : false;



            //si los datos existen, se asignan a los atributos de la clase
            if ($nombre && $apellido && $direccion && $telefono && $rut && $estado) {
                $empleado = new empleado();
                $empleado->setNombre($nombre);
                $empleado->setApellido($apellido);
                $empleado->setDireccion($direccion);
                $empleado->setTelefono($telefono);
                $empleado->setRut($rut);
                $empleado->setEstado($estado);

                //hago una condicion, si llega un id por medio del boton editar, se llamara a la funcion de editar
                //si llega sin ningun parametro se ocupara la funcion de save
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $empleado->setId($id);
                    $edit = $empleado->edit();
                    if($edit){
                        $_SESSION['edicion'] = 'complete';
                    }
                } else {
                    $save = $empleado->save();
                }

                //creo sesiones dependiendo de si el resultado es bueno o malo, para enviar alertas
                if ($save) {
                    $_SESSION['empleado'] = 'complete';
                } else {
                    $_SESSION['empleado'] = 'failed';
                }
            } else {
                $_SESSION['empleado'] = 'failed';
            }
        } else {
            $_SESSION['empleado'] = 'failed';
        }
        //redirecciono a la pagina para mostrar datos
        header("Location:" . base_url . '?controller=empleado&action=tabla');
    }

    public function tabla() {
        //llamo a la funcion que esta en la clase para mostrar los datos
        $empleado = new empleado();
        $empleados = $empleado->tabla();
        //renderizo la vista hacia la tabla de datos
        require_once 'views/empleados/gestionEmpleados.php';
    }

    public function eliminar() {
        //compruebo que llegue el id del objeto a eliminar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $empleado = new empleado();
            //asigno el id que recibi al atributo de la clase
            $empleado->setId($id);
            //llamo a la funcion eliminar
            $delete = $empleado->delete();
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
        header("Location:" . base_url . '?controller=empleado&action=tabla');
    }

    public function editar() {
         //compruebo que llegue el id del objeto a editar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            $empleado = new empleado();
            //asigno el id que recibi al atributo de la clase
            $empleado->setId($id);
            $em = $empleado->getOne();
            //renderizo la vista hacia al formulario para editar
            require_once 'views/empleados/crearEmpleados.php';
        } else {
            header("Location:" . base_url . '?controller=emppleado&action=tabla');
        }
    }
    
       public function buscar(){
        //verifico que llegue el parametro por POST
        if ($_POST['palabra']) {
            $palabra = $_POST['palabra'];
            $empleado = new empleado();
            //llamo a la funcion asignandole la palabra por parametros
            $resultado = $empleado->buscar($palabra);
            //renderizo la vista nuevamente
            require_once 'views/empleados/resultadoEmpleado.php';
        } else {
            //si no llega nada por POST imprimo este mensaje
            echo '<h2>No has ingresado nada en la barra de Busqueda</h2>';
        }
        
    }

}
