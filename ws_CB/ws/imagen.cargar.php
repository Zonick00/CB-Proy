<?php

require_once '../logica/Sesion.clase.php';
require_once '../util/funciones/Funciones.clase.php';


$p_nombreImagen = $_FILES["imagen"]["name"];
$carpeta_destino = dirname(_file_)."/imagenes/".$p_nombreImagen;
        
move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino);

Funciones::imprimeJSON($carpeta_destino);