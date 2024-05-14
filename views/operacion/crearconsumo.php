<?php
include("../../php/dbconn.php");
include("../../php/conex.php");

if (isset($_POST['crear'])) {

    $configuracion = "SELECT * FROM tblconfig";
    $stmt = $conn->prepare($configuracion);
    $stmt->execute();
    $resultado = $stmt->fetch();

    $contadorinterno = intval($resultado['NControlInterno']);
    $nombre = $_POST['servidor'];
 
    $sumadorFactura = $contadorinterno + 1;
    $fechacreacion = date("Y-m-d");

    $facturacion = "INSERT INTO consumo_interno( intern, servidor, fecha_creacion) VALUES ('$contadorinterno','$nombre','$fechacreacion')";

    $actualizarcontador = "UPDATE tblconfig SET NControlInterno='$sumadorFactura'";


    $stmtact = $conn->prepare($actualizarcontador);
    $stmtact->execute();

    $stmtact2 = $conn->prepare($facturacion);
    $stmtact2->execute();


    header('Location: ../consumo_interno.php');
    



  

}
