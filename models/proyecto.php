<?php

class Proyecto {

    private $id;
    private $nombre;
    private $direccion;
    private $presupuesto;
    private $tipo_id;
    private $estado;
    private $db;

    function __construct() {
        $this->db = database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getPresupuesto() {
        return $this->presupuesto;
    }

    function getTipo_id() {
        return $this->tipo_id;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setPresupuesto($presupuesto) {
        $this->presupuesto = $this->db->real_escape_string($presupuesto);
    }

    function setTipo_id($tipo_id) {
        $this->tipo_id = $this->db->real_escape_string($tipo_id);
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function save() {
        $sql = "INSERT INTO proyecto VALUES (NULL, '{$this->getNombre()}','{$this->getDireccion()}', '{$this->getPresupuesto()}', '{$this->getTipo_id()}', '{$this->getEstado()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function tabla() {
        $proyectos = $this->db->query("SELECT * FROM proyecto");
        return $proyectos;
    }

    public function delete() {
        $sql = "DELETE FROM proyecto WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        if ($delete) {
            $result = true;
        }

        $result = false;
    }

    public function getOne() {
        $proyecto = $this->db->query("SELECT * FROM proyecto WHERE id={$this->getId()} ");
        return $proyecto->fetch_object();
    }

    public function edit() {
        $sql = "UPDATE proyecto SET nombre='{$this->getNombre()}',direccion='{$this->getDireccion()}', presupuesto='{$this->getPresupuesto()}', tipo_id='{$this->getTipo_id()}', estado='{$this->getEstado()}'WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
    public function buscar($palabra){
      
        $buscar = $this->db->query("SELECT * FROM proyecto WHERE nombre LIKE '%$palabra%' or direccion LIKE '%$palabra%'");
        return $buscar;
        
     
    }

}
