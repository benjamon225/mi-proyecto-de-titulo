<?php

class Usuario{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function save(){
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);
		var_dump($save);
		$result = false;
                
		if($save){
			$result = true;
		}
                
		return $result;
	}
	
	public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}		
		return $result;
	}
	
        public function getAll(){
            $usuarios = $this->db->query("SELECT * FROM usuarios");
        return $usuarios;
        }
	
	public function eliminar(){
            $sql = "DELETE FROM usuarios WHERE id={$this->id}";
            $delete = $this->db->query($sql);
            
            if ($delete) {
                $result = true;
            }
            
            $result = false;
        }
           public function buscar($palabra){
      
        $buscar = $this->db->query("SELECT * FROM usuarios WHERE nombre LIKE '%$palabra%' or apellidos LIKE '%$palabra%'");
        return $buscar;
        
     
	}
	
    public function getOne() {
        $usuario = $this->db->query("SELECT * FROM usuarios WHERE id={$this->getId()}");
        return $usuario->fetch_object();
	}
	
	public function edit() {
        $sql = "UPDATE usuarios SET nombre='{$this->getNombre()}',apellido='{$this->getApellidos()}',email='{$this->getEmail()}';";
		$save = $this->db->query($sql);
		var_dump($save);
		die();
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}