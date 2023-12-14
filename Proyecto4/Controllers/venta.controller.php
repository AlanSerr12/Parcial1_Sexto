<?php
require_once('../Models/cls_venta.model.php');
$venta = new Clase_Venta;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $venta->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_venta = $_POST["id_venta"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $venta->uno($id_venta); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $id_producto = $_POST["id_producto"];
        $Cantidad = $_POST["Cantidad"];
        $Total = $_POST["Total"];
        $Fecha_venta = $_POST["Fecha_venta"];
        $datos = array(); //defino un arreglo
        $datos = $venta->insertar($id_producto,$Cantidad,$Total, $Fecha_venta); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_venta = $_POST["id_venta"];
        $id_producto = $_POST["id_producto"];
        $Cantidad = $_POST["Cantidad"];
        $Total = $_POST["Total"];
        $Fecha_venta = $_POST["Fecha_venta"];
        $datos = array(); //defino un arreglo
        $datos = $provincias->actualizar($id_venta, $id_producto,$Cantidad,$Total, $Fecha_venta); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $id_venta = $_POST["id_venta"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $venta->eliminar($id_venta); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
