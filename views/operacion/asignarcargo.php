<?php
include("../../php/conex.php");
include("../../php/dbconn.php");

$configuracion = "SELECT * FROM tblconfig";
$stmt= $conn ->prepare($configuracion);
$stmt ->execute();
$resultado = $stmt->fetch();

    $clienteid = $_POST['idcliente'];

    $usuarioid = $_POST['usuarioid'];
    $contadorfactura = intval($resultado['NControlCargo']);
    $sumadorFactura = $contadorfactura + 1;
    $fechacreacion = date("Y-m-d");

    //QUERYS
$facturacion = "INSERT INTO tblcargo( Userid, AssignedUserID, BillingId,  estado) VALUES ('$clienteid','$usuarioid','$contadorfactura','pendiente')";

$actualizarcontador = "UPDATE tblconfig SET NControl='$sumadorFactura'";

//EJECUCION


    $stmt = $conn->prepare($facturacion);
        $stmt->execute();
    $stmt2 = $conn->prepare($actualizarcontador);
        $stmt2->execute();
        header('location:../lista_facturas_prot.php');
   
?>