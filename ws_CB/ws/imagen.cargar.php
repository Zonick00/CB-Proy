<?php

require_once '../logica/Sesion.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_REQUEST["token"])){
    Funciones::imprimeJSON("Debe especificar un token");
    exit();
}

try {
    if (validarToken($_REQUEST["token"])) {
        Funciones::imprimeJSON("hola")
        $p_nombreImagen = $_FILES["imagen"]["name"];
        $carpeta_destino = '../imagenes/';
        
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino.$p_nombreImagen);
        
    }
    
} catch (Exception $exc) {
    Funciones::imprimeJSON($exc->getMessage());
}
