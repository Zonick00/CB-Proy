<?php

require_once '../datos/Conexion.clase.php';

class Sesion extends Conexion {
    private $dni;
    private $clave;
    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }
    function getDni() {
        return $this->dni;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    public function validarSesion() {
        try {
            $sql = "select * from f_validar_sesion(:p_dni, md5(:p_clave))";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $this->getDni());
            $sentencia->bindParam(":p_clave", $this->getClave());
            //$sentencia->execute(array(":p_dni"=> $this->getDni(), ":p_clave"=> $this->getClave()));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }


}
