<?php
include("../../php/conex.php");

        $idservicioasignado = $_POST['idservicioasignado'];
        $propina = $_POST['propina'];
        $detalle = $_POST['detalle'];
        $invoice = $_POST['billing'];

        $stmt = mysqli_query($conexion,"UPDATE tblassignedservice SET detalle='$detalle',propina='$propina' WHERE idservicioasignado = $idservicioasignado");

        header('location:../venta.php?billing='.$invoice.'');
    



?>