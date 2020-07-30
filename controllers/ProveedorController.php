<?php
require_once 'models/proveedor.php';
class ProveedorController{
    //funcion para mostrar los datos por tabla
    public function tabla() {
        $proveedor = new proveedor();
        //llamo a la funcion de la clase
        $proveedores = $proveedor->tabla();
        //renderizo la vista
        require_once 'views/proveedor/gestionProveedor.php';
    }
    //funcion que lleva al formulario de registro 
    public function crear(){
        require_once 'views/proveedor/crearProveedor.php';
    }
    //funcion para registrar en la base de datos
     public function save() {
         //compruebo que los datos lleguen por POST
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $rut = isset($_POST['rut']) ? $_POST['rut'] : false;

            //si llegan, asigno los datos a los atributos de la clase
            if ($nombre && $correo && $telefono && $direccion && $rut) {
                $proveedor = new proveedor();
                $proveedor->setNombre($nombre);
                $proveedor->setCorreo($correo);
                $proveedor->setTelefono($telefono);
                $proveedor->setDireccion($direccion);
                $proveedor->setRut($rut);

                //hago una condicion, si llega un id por medio del boton editar, se llamara a la funcion de editar
                //si llega sin ningun parametro se ocupara la funcion de save
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $proveedor->setId($id);
                    $edit=$proveedor->edit();
                    if($edit){
                        $_SESSION['edicion'] = 'complete';
                    }
                } else {
                     $save=$proveedor->save();
                }

                //creo sesiones dependiendo de si el resultado es bueno o malo, para enviar alertas
                if ($save) {
                    $_SESSION['proveedor'] = 'complete';
                } else {
                    $_SESSION['proveedor'] = 'failed';
                }
            } else {
                $_SESSION['proveedor'] = 'failed';
            }
        } else {
            $_SESSION['proveedor'] = 'failed';
        }
        //redirecciono a la pagina para mostrar datos
        header("Location:" . base_url . '?controller=proveedor&action=tabla');
    }

      public function eliminar(){
        //compruebo que llegue el id del objeto a eliminar
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $proveedor = new proveedor();
             //asigno el id que recibi al atributo de la clase
            $proveedor->setId($id);
             //llamo a la funcion eliminar
            $delete=$proveedor->delete();
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
        header("Location:". base_url . '?controller=proveedor&action=tabla');
        }
        
           public function editar() {
            //compruebo que llegue el id del objeto a editar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            $proveedor = new proveedor();
             //asigno el id que recibi al atributo de la clase
            $proveedor->setId($id);
            //llamo al metodo de la clase
            $pro = $proveedor->getOne();
            //renderizo la vista hacia al formulario para editar
            require_once 'views/proveedor/crearProveedor.php';
        } else {
            header("Location:" . base_url . '?controller=proveedor&action=tabla');
        }
    }
       public function buscar(){
        //verifico que llegue el parametro por POST
        if ($_POST['palabra']) {
            $palabra = $_POST['palabra'];
            $proveedor = new proveedor();
            //llamo a la funcion asignandole la palabra por parametros
            $resultado = $proveedor->buscar($palabra);
             //renderizo la vista nuevamente
            require_once 'views/proveedor/resultadoProveedor.php';
        } else {
             //si no llega nada por POST imprimo este mensaje
            echo '<h2>No has ingresado nada en la barra de Busqueda</h2>';
        }
        
    }
        
}
