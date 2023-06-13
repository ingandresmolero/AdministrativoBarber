<?php

//OPERACION DE ELIMINAR UN PRODUCTO 
include("../php/conex.php");
$montototal=$_POST['montototal'];
var_dump($montototal);


if (isset($_POST['eliminar'])){
    echo "Elimiinar";
    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    $sql1="DELETE FROM tblassignedproducts WHERE id_assigned='$idproduct'";


    $stmt = mysqli_query($conexion,$sql1);
    header('location:venta.php?billing='.$invoice.'');
};

// OPERACION DE PROCESAR FACTURA A ESTATUS PENDIENTE
if(isset($_POST['procesar'])){
    

    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    
    $sql2="select tblcustomers.ID,tblinvoice.ServiceId, tblinvoice.AssignedUserID,tblinvoice.Userid as usuario,tblinvoice.PostingDate,tblassignedproducts.id_products FROM tblinvoice JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID JOIN tblassignedproducts ON tblassignedproducts.invoice = tblinvoice.BillingId where tblinvoice.BillingID = '$invoice' ";
    $stmt2=mysqli_query($conexion,$sql2);
    $lista=mysqli_fetch_array($stmt2);
    $date=$lista['PostingDate'];
    $usuario=$lista['usuario'];
    $serviceid=$lista['ServiceId'];
    $userid=$lista['ID'];
    $assigned=$lista['AssignedUserID'];
    $product=$lista['id_products'];

    

    $factura="INSERT INTO facturas( usuario, id_customer, billing, id_services, id_products, monto) VALUES ('$assigned','$usuario','$invoice','$serviceid','$product','$montototal')";

    $sql4="UPDATE tblinvoice SET estado='procesada' WHERE BillingId='$invoice'";
   
    $stmt = mysqli_query($conexion,$sql4);
    $stmt3 = mysqli_query($conexion,$factura);
    header('location:invoices.php');
};

// OPERACION DE ELIMINAR SERVICIO DE BILLING

if (isset($_POST['eliminarservicio'])){
    echo "Elimiinar";
    $invoice = $_POST['invoice'];
    $serviceide = $_POST['serviceid'];
    $sql3="DELETE FROM tblinvoice WHERE BillingId= '$invoice' AND ServiceId='$serviceide'";
    $stmt = mysqli_query($conexion,$sql3);
    header('location:venta.php?billing='.$invoice.'');
};


// TOTALIZAR OPERACION

if(isset($_POST['totalizar'])){
    $metodo = $_POST['metodo'];
    $referencia = $_POST['referencia'];
    $abono = $_POST['abono'];
    $fecha = date("d/m/Y");
    $tasa=$_POST['tasa'];

    // $billing = $_POST['invoice'];
    // $usuario = $_POST['invoice'];
    // $estado = $_POST['invoice'];
    // $detalle = $_POST['invoice'];
    // $monto = $_POST['invoice'];
    // $customer = $_POST['invoice'];
    // $barbero = $_POST['invoice'];


}