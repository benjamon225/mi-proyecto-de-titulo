<?php

class tipoProyecto
{

    private $id;
    private $tipo_proyecto;
    private $db;

    function __construct()
    {
        $this->db = database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getTipo_proyecto()
    {
        return $this->tipo_proyecto;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setTipo_proyecto($tipo_proyecto)
    {
        $this->tipo_proyecto = $tipo_proyecto;
    }

    public function save()
    {
        $sql = "INSERT INTO tipo_proyecto VALUES(NULL,'{$this->getTipo_proyecto()}');";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getAll()
    {
        $tps = $this->db->query("SELECT * FROM tipo_proyecto ORDER BY id DESC;");
        return $tps;
    } //fin listar

    public function delete()
    {
        $sql = "DELETE * FROM tipo_proyecto WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);

        if ($delete) {
            $result = true;
        }

        $result = false;
    }
}
