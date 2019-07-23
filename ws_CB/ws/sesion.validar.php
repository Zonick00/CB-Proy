<?php

require_once '../logica/Sesion.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["dni"]) || ! isset($_POST["clave"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos", "");
    exit();
}

$dni = $_POST["dni"];
$clave = $_POST["clave"];

try {
    $objSesion = new Sesion();
    $objSesion->setDni($dni);
    $objSesion->setClave($clave);
    $resultado = $objSesion->validarSesion();

    
    if ($resultado["estado"] == "Activo"){
        //unset( $resultado["estado"] );
        
        /*Generar un token de seguridad*/
        require_once 'token.generar.php';
        $token = generarToken(null, 60*60);
        $resultado["token"] = $token;
        /*Generar un token de seguridad*/

        Funciones::imprimeJSON($resultado);
        //Funciones::imprimeJSON(200, "Bienvenido a la aplicación móvil", $resultado);
    }else{
        Funciones::imprimeJSON($resultado);
    }
    
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}