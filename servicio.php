<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers:*');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");


include_once 'datos.php';

class Servicios{
    // Tantos metodos como datos tenga (Cada Tabla)
    function getVista(){
        $datos = new Datos();
        $lista = array();
        $res = $datos->Vista()->fetchAll();
        foreach($res as $row){
            $r["Id"]= $row["Id"];
            $r["Nombre"]= $row["Nombre"];
            $r['Apellido'] = $row['Apellido'];
            $r['Correo'] = $row['Correo'];
            array_push($lista, $r);
        }
        echo json_encode($lista);
    }

    function getNuevo($array){
        $datos = new Datos();
        try{
            $datos->Nuevo($array);
            echo "El registro se inserto satisfactoriamente";
        }catch(Exception $e){
            echo "El registro no se inserto";
        }
    }
    function getBuscar($id){
        $datos = new Datos();
        $lista = array();
        $res = $datos->Buscar($id);

        if($res->rowCount()==1){
            $row = $res->fetch();
            $r["Id"]= $row["Id"];
            $r["Nombre"]= $row["Nombre"];
            $r['Apellido'] = $row['Apellido'];
            $r['Correo'] = $row['Correo'];
            array_push($lista, $r);
        }else{
            $r["Id"]= "";
            $r["Nombre"]= "";
            $r['Apellido'] = "";
            $r['Correo'] = "";
            array_push($lista, $r);
        }
        echo json_encode($lista);
    }

    function getEliminar($id){
        $datos = new Datos();
        try{
            $datos->Eliminar($id);
            echo "El registro se elimino satisfactoriamente";
        }catch(Exception $e){
            echo "El registro no se elimino";
        }
    }

    function getEditar($array){
        $datos = new Datos();
        try{
            $datos->Editar($array);
            echo "El registro se edito satisfactoriamente";
        }catch(Exception $e){
            echo "El registro no se edito";
        }
    }
}