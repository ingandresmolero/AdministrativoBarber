<?php
include("../../php/conex.php");
include("../../php/dbconn.php");
if (isset($_POST['crearcita'])) {
    $usuario = $_POST['username'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $tipocliente = $_POST['tipo_cliente'];

    //Contador de Factura

    $configuracion = "SELECT * FROM tblconfig";
    $stmt2 = $conn->prepare($configuracion);
    $stmt2->execute();
    $resultado = $stmt2->fetch();
    $contadorfactura = intval($resultado['NControl']);
    $sumadorFactura = $contadorfactura + 1;

    //INFORMACION DE USUARIO

    $query2 = "SELECT * FROM tbladmin WHERE UserName='$usuario'";
    $datosusuario = $conn->prepare($query2);
    $datosusuario->execute();
    $resultadousuarios = $datosusuario->fetch();
    $idusuario = $resultadousuarios['ID'];

    // Insertar el usuario
    $sql = "INSERT INTO tblcustomers (`Name`, `assignedbarber`, `Email`, `MobileNumber`, `Gender`, `cedula`, `Details`, `assignedBy`)
VALUES ('$nombre', '0', '0', '0', '$tipocliente', '$cedula', '0', '$idusuario')";
    $stmt = mysqli_query($conexion, $sql);

    // Obtener el ID de usuario recién creado
    $nuevoUserID = mysqli_insert_id($conexion);
    // var_dump($nuevoUserID);

    // Crear una nueva factura
    $facturacion = "INSERT INTO tblinvoice (Userid, AssignedUserID, BillingId, estado)
        VALUES ('$nuevoUserID', '$idusuario', '$contadorfactura', 'pendiente')";
    $stmt3 = $conn->prepare($facturacion);
    $stmt3->execute();

    //ACTUALIZACION DE CONTADOR DE FACTURA
    $actualizarcontador = "UPDATE tblconfig SET NControl='$sumadorFactura'";
    $stmt4 = $conn->prepare($actualizarcontador);
    $stmt4->execute();

    header('location: ../lista_facturas.php');
}
