<?php
require_once('../Models/cls_producto.models.php');
$producto = new Clase_Producto;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $producto->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_producto = $_POST["id_producto"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $producto->uno($id_producto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Precio = $_POST["Precio"];
        $Stock = $_POST["Stock"];
        $Proveedor = $_POST["Proveedor"];

        $datos = array(); //defino un arreglo
        $datos = $producto->insertar($Nombre,$Precio,$Stock,$Proveedor); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_producto = $_POST["id_producto"];
        $Nombre = $_POST["Nombre"];
        $Precio = $_POST["Precio"];
        $Stock = $_POST["Stock"];
        $Proveedor = $_POST["Proveedor"];
        
        $datos = array(); //defino un arreglo
        $datos = $producto->actualizar($id_producto, $Nombre,$Precio,$Stock,$Proveedor); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $id_producto = $_POST["id_producto"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $producto->eliminar($id_producto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
