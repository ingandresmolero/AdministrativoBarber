<?php

//OPERACION DE ELIMINAR UN PRODUCTO 
include("../php/conex.php");
$idhistorico = $_POST['idhistorico'];

// $montototal=$_POST['montototal'];
// $barbero=$_POST['barbero'];


if (isset($_POST['eliminarhistorico'])){
    $idhistorico = $_POST['idhistorico'];
    $idservidor = $_POST['idservidor'];

    $sql1="DELETE FROM historicos_pago WHERE idhistorico='$idhistorico' and idservidor='$idservidor'";
    $stmtc= mysqli_query($conexion,$sql1);
    header('location:procesarpago.php?userid='.$idservidor.'');
};

//ELIMINAR PROIDUCTO INTERNO
if (isset($_POST['eliminar_interno'])){
    
    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];

    $sql3="SELECT * FROM tblproducts WHERE idproducts='$idproducto'";
        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);
        $cantidad_stock = $fila['cantidad'];

        $monto_final =  intval($cantidad) + intval($cantidad_stock);

    $sql1="DELETE FROM tblassignedproducts_intern WHERE id_assignedintern='$idproduct'";

    $actsql = "UPDATE tblproducts SET cantidad='$monto_final' WHERE idproducts='$idproducto'";
    
    $stmtact = mysqli_query($conexion,$actsql);
    $stmt = mysqli_query($conexion,$sql1);
    header('location:hoja_consumo.php?id='.$invoice.'');
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

if (isset($_POST['eliminarservicio_interno'])){
    echo "Elimiinar";
   
    $invoice = $_POST['invoice'];
    // $serviceide = $_POST['serviceid'];
    $idservicio = $_POST['idservicio2'];
    $sql3="DELETE FROM tblassignedservice_intern WHERE  idserviciointerno='$idservicio'";
   
     $stmt = mysqli_query($conexion,$sql3);
     header('location:hoja_consumo.php?id='.$invoice.'');
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

// OPERACION DE ELIMINAR ABONO  

if (isset($_POST['eliminarabono'])){
    $idconsumo = $_POST['idconsumo'];
    $invoice = $_POST['invoice'];
    $idcuenta = $_POST['idcuenta'];
    $sql3="DELETE FROM consumo_fondo WHERE invoice= '$invoice' AND id_consumo='$idconsumo'";
    $stmt = mysqli_query($conexion,$sql3);
    header('location:venta.php?billing='.$invoice.'');
};

// ELIMINAR SERVICIO ADICIONAL
if (isset($_POST['eliminaradicional'])){
   
    $invoice = $_POST['invoice'];
    $idadicional = $_POST['idservicioadicional'];
    $sql3="DELETE FROM servicios_adicional WHERE id_billing= '$invoice' AND idservicioadicional='$idadicional'";
    $stmt = mysqli_query($conexion,$sql3);
    header('location:venta.php?billing='.$invoice.'');
};

if (isset($_POST['eliminaradicional_interno'])){
   
    $invoice = $_POST['invoice'];
    $idadicional = $_POST['idservicioadicional'];
    $sql3="DELETE FROM servicios_adicional_interno WHERE intern= '$invoice' AND idservicioadicionalintern='$idadicional'";
    $stmt = mysqli_query($conexion,$sql3);
    header('location:hoja_consumo.php?id='.$invoice.'');
};

// TOTALIZAR OPERACION

if(isset($_POST['totalizar'])){
    $fecha = date("d/m/Y");
    $tasa=$_POST['tasa'];
    $monto_cancelado = $_POST['monto_cancelado'];
    $billing = $_POST['invoice'];
    $monto = $_POST['montototal'];
    $estatus = $_POST['estatus'];
    $saldo = $_POST['saldofinal'];



//Insertar en tabla Transacciones ya con metodos de pagos varios
    $totalizado_factura = "INSERT INTO transacciones( invoice, monto_total, tasa_dia, estatus, monto_cancelado,saldo,fecha_creacion) VALUES ('$billing','$monto','$tasa','$estatus','$monto_cancelado','$saldo','$fecha')";

    $actu="UPDATE tblinvoice SET estado='pagado' WHERE BillingId='$billing'";


    $stmt5=mysqli_query($conexion,$actu);

    $stmt4= mysqli_query($conexion,$totalizado_factura);
    header('location:lista_facturas.php');


}

// SUMAR Y RESTA DE PRODUCTOS

if(isset($_POST['sumar'])){
    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];

    $sql3="SELECT * FROM tblassignedproducts WHERE id_products='$idproducto'";
    $sql31="SELECT * FROM tblproducts inner join tblassignedproducts on tblproducts.idproducts = tblassignedproducts.id_products WHERE id_products='$idproducto'";

        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);

        $stmtc1= mysqli_query($conexion,$sql31);
        $fila1 = mysqli_fetch_array($stmtc1);
        $cantidad_stock = $fila['cantidad'];

        $monto_final =  intval($cantidad) + 1;
        $monto_actual = intval($fila1['precio'] * $monto_final);


    $sql1="UPDATE tblassignedproducts SET cantidad='$monto_final', monto='$monto_actual' WHERE id_assigned='$idproduct'";

    
    
    $stmt = mysqli_query($conexion,$sql1);
    header('location:venta.php?billing='.$invoice.'');

}

if(isset($_POST['sumar_interno'])){
    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];

    $sql3="SELECT * FROM tblassignedproducts_intern WHERE id_products='$idproducto'";
        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);
        $cantidad_stock = $fila['cantidad'];

        $monto_final =  intval($cantidad) + 1;

    $sql1="UPDATE tblassignedproducts_intern SET cantidad='$monto_final' WHERE id_assignedintern='$idproduct'";

    
    
    $stmt = mysqli_query($conexion,$sql1);
    header('location:hoja_consumo.php?id='.$invoice.'');

}

if(isset($_POST['restar'])){
    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];

    
    $sql3="SELECT * FROM tblassignedproducts WHERE id_products='$idproducto'";
    $sql31="SELECT * FROM tblproducts inner join tblassignedproducts on tblproducts.idproducts = tblassignedproducts.id_products WHERE id_products='$idproducto'";

    $stmtc= mysqli_query($conexion,$sql3);
    $fila = mysqli_fetch_array($stmtc);

    $stmtc1= mysqli_query($conexion,$sql31);
    $fila1 = mysqli_fetch_array($stmtc1);
    $cantidad_stock = $fila['cantidad'];

    $monto_final =  intval($cantidad) - 1;
    $monto_actual = intval($fila1['precio'] * $monto_final);


$sql1="UPDATE tblassignedproducts SET cantidad='$monto_final', monto='$monto_actual' WHERE id_assigned='$idproduct'";

    
    
    $stmt = mysqli_query($conexion,$sql1);
    header('location:venta.php?billing='.$invoice.'');

}

if(isset($_POST['restar_interno'])){
    $invoice = $_POST['invoice'];
    $idproduct = $_POST['product'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];

    $sql3="SELECT * FROM tblassignedproducts_intern WHERE id_products='$idproducto'";
        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);
        $cantidad_stock = $fila['cantidad'];

        $monto_final =  intval($cantidad) - 1;

    $sql1="UPDATE tblassignedproducts_intern SET cantidad='$monto_final' WHERE id_assignedintern='$idproduct'";

    
    
    $stmt = mysqli_query($conexion,$sql1);
    header('location:hoja_consumo.php?id='.$invoice.'');

}


//PRECIO LIBRE

if(isset($_POST['preciolibre'])){
    $invoice = $_POST['invoice'];
    $idservicio = $_POST['idservicio2'];
    $precio = $_POST['preciolibremonto'];
    $preciolibre = "UPDATE tblassignedservice SET monto='$precio' WHERE idservicioasignado='$idservicio' ";
    $stmtlibre = mysqli_query($conexion,$preciolibre);
    header('location:venta.php?billing='.$invoice.'');
}

if(isset($_POST['preciolibre_interno'])){
    $invoice = $_POST['invoice'];
    $idservicio = $_POST['idservicio2'];
    $precio = $_POST['preciolibremonto'];
    $preciolibre = "UPDATE tblassignedservice_intern SET monto='$precio' WHERE idserviciointerno='$idservicio' ";
    $stmtlibre = mysqli_query($conexion,$preciolibre);
    header('location:hoja_consumo.php?id='.$invoice.'');
}

if(isset($_POST['guardar'])){
    $intern = $_POST['inter'];
    $totalpago = $_POST['saldofinal'];
    $montocancelado = $_POST['monto_cancelado'];
    $fecha = date("d/m/Y");
    $queryactualizacion = "UPDATE consumo_interno SET saldo='$montocancelado',fecha_act='$fecha' WHERE intern='$intern'";
    echo 'Guardar de Hoja';
    $stmtactusaldo = mysqli_query($conexion,$queryactualizacion);
    header('location:hoja_consumo.php?id='.$intern.'');
}