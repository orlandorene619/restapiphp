<?php

    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/categoria.php");

    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);
    switch($_GET["op"]){
        case "GetAll":
            $datos = $categoria->get_categoria();
            echo json_encode($datos);
        break;

        case "GetId":
            $datos = $categoria->get_categoria_id($body["cat_id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            $datos = $categoria->insertar_cat($body["cat_nom"], $body["cat_obs"]);
            echo "Correcto";
        break;

        case "Actualizar":
            $datos = $categoria->actualizar_cat($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Actualizado");
            break;

        case "Eliminar": 
            $datos = $categoria->eliminar_cat($body["cat_id"]);
            echo json_encode("Eliminado");
        break;
        }

       

?>