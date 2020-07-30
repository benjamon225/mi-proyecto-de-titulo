<?php
    class auto
    {
        private $nombre;
        private $marca;
        private $kilometraje;
        private $año;
        private $modelo;
        private $db;

        public function __construct()
        {
            $this->db = database::connect();
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getMarca()
        {
            return $this->marca;
        }

        public function setMarca($marca)
        {
            $this->marca = $marca;
        }

        public function getKilometraje()
        {
            return $this->kilometraje;
        }

        public function setKilometraje($kilometraje)
        {
            $this->kilometraje = $kilometraje;
        }

        public function getAño()
        {
            return $this->año;
        }

        public function setAño($año)
        {
            $this->año = $año;
        }

        public function getModelo()
        {
            return $this->modelo;
        }

        public function setModelo($modelo)
        {
            $this->modelo = $modelo;
        }
    }
