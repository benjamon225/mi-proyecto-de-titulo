<?php
require_once 'models/tipoProyecto.php';

class tipoController
{

    public function index()
    {

        $tipo = new tipoProyecto();
        $tipos = $tipo->getAll();

        require_once 'views/tipoProyecto/tablaCat.php';
    }
    public function crear()
    {
        require_once 'views/tipoProyecto/crear.php';
    }

    public function save()
    {

        //guardar la categoria
        if (isset($_POST) && isset($_POST['tipo_proyecto'])) {
            $tipo = new tipoProyecto();
            $tipo->setTipo_proyecto($_POST['tipo_proyecto']);
            $save = $tipo->save();
        }

        //redireccionar
        header("Location:" . base_url . '?controller=tipo&action=index');
    }

    public function eliminar()
    {
        //compruebo que llegue el id del objeto a eliminar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $cat = new tipoProyecto();
            //asigno el id que recibi al atributo de la clase
            $cat->setId($id);
            //llamo a la funcion eliminar
            $delete=$cat->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
                $_SESSION['delete'] = 'failed';
        }
         //renderizo la vista hacia la tabla nuevamente
        header("Location:". base_url . '?controller=tipo&action=index');
        }
    }

