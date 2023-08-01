<?php

//OPERACION DE ELIMINAR UN PRODUCTO 
include("../php/conex.php");
$montototal=$_POST['montototal'];
$barbero=$_POST['barbero'];


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
    // $serviceide = $_POST['serviceid'];
    $idservicio = $_POST['idservicio2'];
    $sql3="DELETE FROM tblassignedservice WHERE  idservicioasignado='$idservicio'";
   
     $stmt = mysqli_query($conexion,$sql3);
     header('location:venta.php?billing='.$invoice.'');
};

// OPERACION DE ELIMINAR METODO DE BILLING

if (isset($_POST['eliminarmetodo'])){
    echo "Elimiinar";
    $invoice = $_POST['invoice'];
    $idcuenta = $_POST['idcuenta'];
    $sql3="DELETE FROM cuentas_cobrar WHERE invoice= '$invoice' AND idcuenta='$idcuenta'";
    $stmt = mysqli_query($conexion,$sql3);
    header('location:venta.php?billing='.$invoice.'');
};

// TOTALIZAR OPERACION

if(isset($_POST['totalizar'])){
    $fecha = date("d/m/Y");
    $tasa=$_POST['tasa'];
    $monto_cancelado = $_POST['monto_cancelado'];
    $billing = $_POST['invoice'];
    $monto = $_POST['montototal'];
    $estatus = $_POST['estatus'];




//Insertar en tabla Transacciones ya con metodos de pagos varios
    $totalizado_factura = "INSERT INTO transacciones( invoice, monto_total, tasa_dia, estatus, monto_cancelado, fecha_creacion) VALUES ('$billing','$monto','$tasa','$estatus','$monto_cancelado','$fecha')";

    $actu="UPDATE tblinvoice SET estado='pagado' WHERE BillingId='$billing'";


    $stmt5=mysqli_query($conexion,$actu);

    $stmt4= mysqli_query($conexion,$totalizado_factura);
    header('location:lista_facturas.php');


}


// if(isset($_POST['totalizar'])){
//     $metodo = $_POST['metodo'];
//     $referencia = $_POST['referencia'];
//     $abono = $_POST['abono'];
//     $fecha = date("d/m/Y");
//     $tasa=$_POST['tasa'];
//     $monto_cancelado = $_POST['monto_cancelado'];

//     $billing = $_POST['invoice'];
//     $customer = $_POST['customer'];
//     $estado = $_POST['estado'];
//     $detalle = $_POST['detalle'];
//     $monto = $_POST['montototal'];
//     $usuario = $_POST['usuario'];
//     $barbero = $_POST['barbero'];


// //Insertar datos en tabla facturas
//     $totalizar="INSERT INTO facturas( usuario, id_customer, billing, barbero, monto, detalle, estado, metodo, abono, tasa, fecha) VALUES ('$usuario','$customer','$billing','$barbero','$monto','$detalle','$estado','$metodo','$abono','$tasa','$fecha')";
// //Insertar en tabla Transacciones ya con metodos de pagos varios
//     $totalizado_factura = "INSERT INTO transacciones( invoice, monto_total, tasa_dia, estatus, monto_cancelado, fecha_creacion) VALUES ('$billing','$monto','$tasa','$estatus','$monto_cancelado','$fecha')";

//     $actu="UPDATE tblinvoice SET estado='pagado' WHERE BillingId='$billing'";


//     $stmt5=mysqli_query($conexion,$actu);

//     $stmt4= mysqli_query($conexion,$$totalizado_factura);
//     header('location:lista_facturas.php');


// }