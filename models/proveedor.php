<?php

class proveedor{
    
    private $id;
    private $nombre;
    private $correo;
    private $telefono;
    private $rut;
    private $direccion;
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

    function getCorreo() {
        return $this->correo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getRut() {
        return $this->rut;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    
    public function save() {
        $sql = "INSERT INTO proveedor VALUES (NULL, '{$this->getNombre()}','{$this->getCorreo()}','{$this->getTelefono()}','{$this->getRut()}','{$this->getDireccion()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function tabla() {
        $proveedores = $this->db->query("SELECT * FROM proveedor");
        return $proveedores;
    }

    public function delete() {
        $sql = "DELETE FROM proveedor WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        if ($delete) {
            $result = true;
        }

        $result = false;
    }

    public function getOne() {
        $proveedor = $this->db->query("SELECT * FROM proveedor WHERE id={$this->getId()}");
        return $proveedor->fetch_object();
    }

    public function edit() {
        $sql = "UPDATE proveedor SET nombre='{$this->getNombre()}',correo='{$this->getCorreo()}',telefono='{$this->getTelefono()}', rut='{$this->getRut()}',direccion='{$this->getDireccion()}'WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
      public function buscar($palabra){
      
        $buscar = $this->db->query("SELECT * FROM proveedor WHERE nombre LIKE '%$palabra%'");
        return $buscar;
        
     
    }


}

