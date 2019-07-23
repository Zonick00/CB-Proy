<?php

require_once '../util/jwt/vendor/autoload.php';
require_once '../util/jwt/auth.php';


function generarToken($data, $timeToken){
    return Auth::SignIn($data, $timeToken);
}
