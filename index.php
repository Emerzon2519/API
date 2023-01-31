<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers:*');

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");


include_once 'servicio.php';
$servicios = new Servicios();
$var = explode("/", $_GET['url']);

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if($var[0] == 'vista'){
        $servicios->getVista();
    }else if($var[0] == 'buscar'){
        if(isset($var[1])){
            $id = $var[1];
            $servicios->getBuscar($var[1]);
        }
    }elseif($var[0] == 'editar'){
        $body = file_get_contents('php://input');
        $array = json_decode($body, true);
        $servicios->getNuevo($array);}
    else{
        echo('Request method not allowed');
    }
    
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if($var[0] == 'nuevo'){
            $body = file_get_contents('php://input');
            $array = json_decode($body, true);
            $servicios->getNuevo($array);
    }
}else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    
    if($var[0] == 'eliminar'){
        if(isset($var[1])){
            $id = $var[1];
            $servicios->getEliminar($var[1]);
        }
    }else{
        echo('Request method not allowed');
    }
}else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    if($var[0] == 'editar'){
        $body = file_get_contents('php://input');
        $array = json_decode($body, true);
        $servicios->getEditar($array);
    }
}
