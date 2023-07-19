<?php
include("../../php/conex.php");
include("../../php/dbconn.php");

$configuracion = "SELECT * FROM tblconfig";
$stmt= $conn ->prepare($configuracion);
$stmt ->execute();
$resultado = $stmt->fetch();
var_dump($resultado['NControl']);
    $clienteid = $_POST['idcliente'];
    $usuarioid = $_POST['usuarioid'];
    $contadorfactura = intval($resultado['NControl']);
    $sumadorFactura = $contadorfactura + 1;
    $fechacreacion = date("d/m/Y");

    //QUERYS
$facturacion = "INSERT INTO tblinvoice( Userid, AssignedUserID, BillingId,  estado) VALUES ('$clienteid','$usuarioid','$contadorfactura','pendiente')";

$actualizarcontador = "UPDATE tblconfig SET NControl='$sumadorFactura'";

//EJECUCION
    var_dump($facturacion);
    var_dump($actualizarcontador);

    $stmt = $conn->prepare($facturacion);
        $stmt->execute();
    $stmt2 = $conn->prepare($actualizarcontador);
        $stmt2->execute();
        header('location:../lista_facturas.php');
   
?>