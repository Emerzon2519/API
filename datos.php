<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers:*');

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");



include_once 'conexion.php';

class Datos extends bdcertus{
    // Crear na funcion pocada Procedimiento almacenado que se requera ejecutar

    function Nuevo($array){
        $id = $array['Id'];
        $nom = $array['Nombre'];
        $ape = $array['Apellido'];
        $cor = $array['Correo'];
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_Nuevo(:d1, :d2,:d3, :d4)");
        $stm->bindParam(':d1', $id);
        $stm->bindParam(':d2', $nom);
        $stm->bindParam(':d3', $ape);
        $stm->bindParam(':d4', $cor);
        $stm->execute();
        return $stm;
    }

    function Buscar($id){
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_Buscar(:d1)");
        $stm->bindParam(':d1', $id);
        $stm->execute();
        return $stm;
    }

    function Vista(){
        // Ejecutara el sp_Vista (sp -> Stored Procedure = Procedimiento Almacenado)
        $bdcertus = $this->Conexion();
        $stm = $bdcertus->prepare('call sp_Vista()');
        $stm->execute();
        return $stm;
    }

    function Editar($array){
            $id = $array['Id'];
            $nom = $array['Nombre'];
            $ape = $array['Apellido'];
            $cor = $array['Correo'];
            $cn = $this->Conexion();
            $stm = $cn->prepare("call sp_Actualizar(:d1, :d2,:d3, :d4)");
            $stm->bindParam(':d1', $id);
            $stm->bindParam(':d2', $nom);
            $stm->bindParam(':d3', $ape);
            $stm->bindParam(':d4', $cor);
            $stm->execute();
            return $stm;
    }

    function Eliminar($id){
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_Eliminar(:d1)");
        $stm->bindParam(':d1', $id);
        $stm->execute();
        return $stm;
    }

    
}