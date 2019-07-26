<?php

require_once '../logica/Sesion.clase.php';
require_once '../util/funciones/Funciones.clase.php';


$p_nombreImagen = $_FILES["imagen"]["name"];
$carpeta_destino ="ws-CB/imagenes/".$p_nombreImagen;
        
move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino);

Funciones::imprimeJSON($_FILES["imagen"]["tmp_name"]);