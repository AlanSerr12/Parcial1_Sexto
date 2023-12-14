<?php
require_once('cls_conexion.model.php');
class Clase_Venta
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT Ventas.id_venta, Producto.Nombre as producto, Ventas.Cantidad, Ventas.Total, Ventas.Fecha_venta  FROM `Ventas` inner JOIN Producto on Producto.id_producto = Ventas.id_producto";
            //$cadena = "SELECT * FROM `Ventas`";
           // $cadena = "SELECT Ventas.id_venta, Ventas.Cantidad, Ventas.Total, Ventas.Fecha_venta, Producto.Nombre as producto 
                 //  FROM `Ventas` 
                   //INNER JOIN Producto ON Producto.id_producto = Ventas.id_producto";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($id_venta)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Ventas` WHERE id_venta=$id_venta";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($id_producto,$Cantidad,$Total,$Fecha_venta)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `Ventas`(id_producto,`Cantidad`,`Total`,`Fecha_venta`) VALUES ($id_producto,'$Cantidad', '$Total','$Fecha_venta')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($id_venta, $id_producto, $Cantidad,$Total,$Fecha_venta)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `Ventas` SET id_producto=$id_producto, `Cantidad`='$Cantidad', `Total`='$Total', `Fecha_venta`='$Fecha_venta'  WHERE `id_venta`='$id_venta'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_venta)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from ventas where id_venta=$id_venta";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}
