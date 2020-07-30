<?php


class utils{
    public static function deleteSession($name){
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
      return $name;
    }
    
    public static function isAdmin(){
        if (!isset($_SESSION['admin'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }
    

     public static function showTipos(){
        require_once 'models/tipoProyecto.php';
        $tp = new tipoProyecto();
        $tps = $tp->getAll();
        
        return $tps;
    }
}

