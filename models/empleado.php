<?php

class empleado{
    
    private $id;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $rut;
    private $estado;
    private $db;


        
    public function __construct() {
        $this->db = database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getRut() {
        return $this->rut;
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

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setTelefono($telefono) {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    function setRut($rut) {
        $this->rut = $this->db->real_escape_string($rut);
    }
    
    function setEstado($estado) {
        $this->estado = $this->db->real_escape_string($estado);
    }



     public function save(){
        $sql="INSERT INTO empleados VALUES (NULL, '{$this->getNombre()}','{$this->getApellido()}', '{$this->getDireccion()}', '{$this->getTelefono()}','{$this->getRut()}','{$this->getEstado()}')";
        $save = $this->db->query($sql);
         $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function tabla() {
        $empleados = $this->db->query("SELECT * FROM empleados");
        return $empleados;
    }
    
      public function delete() {
        $sql = "DELETE FROM empleados WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        if ($delete) {
            $result = true;
        }

        $result = false;
    }

    public function getOne() {
        $empleado = $this->db->query("SELECT * FROM empleados WHERE id={$this->getId()}");
        return $empleado->fetch_object();
    }
    
      public function edit() {
        $sql = "UPDATE empleados SET nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',direccion='{$this->getDireccion()}', telefono='{$this->getTelefono()}', rut='{$this->getRut()}', estado='{$this->getEstado()}'WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
     public function buscar($palabra){
      
        $buscar = $this->db->query("SELECT * FROM empleados WHERE nombre LIKE '%$palabra%' or apellido LIKE '%$palabra%'");
        return $buscar;
        
     
    }

}
