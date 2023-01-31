<?php

class bdcertus{

    public function __construct(){

    }

    function Conexion(){
        $cn = new PDO('mysql:host=localhost; dbname=certus', 'root', '');
        return $cn;
    }

}