<?php
include("../../php/conex.php");

if (isset($_POST['asignarabono'])){
  $invoice = $_POST['invoice'];
  $querycliente = "SELECT tblcustomers.Name, tblcustomers.cedula,tblcustomers.ID from tblinvoice join tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId = '$invoice' ";
  $stmt = mysqli_query($conexion,$querycliente);
  $row = mysqli_fetch_array($stmt);

  $cliente = $row['ID'];
  $fecha = date("d-m-Y");
  $abonmonto = $_POST['montoabono'];
  // $saldo=$_POST['saldo'];
  // $restante = $saldo - $abonmonto;
  // $queryabono = "INSERT INTO consumo_fondo (invoice,saldo,cliente, aplicado) VALUES ('$invoice','$restante','$cliente','$abonmonto')";
  $queryabono2 = "INSERT INTO operaciones_clientes( `idcliente`, `fecha`, `invoice`, `aplicado`, `status`) VALUES ('$cliente','$fecha','$invoice','$abonmonto','abono')";

  // $stmt2= mysqli_query($conexion,$queryabono);
  $stmt3= mysqli_query($conexion,$queryabono2);
  header('location:../venta.php?billing='.$invoice.'');

}
if(isset($_POST['aplicarcargo'])){
  $invoice = $_POST['invoice'];
  $querycliente = "SELECT tblcustomers.Name, tblcustomers.cedula,tblcustomers.ID from tblinvoice join tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId = '$invoice' ";
  $stmt = mysqli_query($conexion,$querycliente);
  $row = mysqli_fetch_array($stmt);
  $cliente = $row['ID'];
  $fecha = date("d-m-Y");
  $cargo = ($_POST['montocargo']*-1);
  $querycargo = "INSERT INTO operaciones_clientes( `idcliente`, `fecha`, `invoice`, `aplicado`, `status`) VALUES ('$cliente','$fecha','$invoice','$cargo','restante')";

  // $stmt2= mysqli_query($conexion,$queryabono);
  $stmtcargo= mysqli_query($conexion,$querycargo);
  header('location:../venta.php?billing='.$invoice.'');

}


if(isset($_POST['eliminarabono'])){
  $invoice = $_POST['invoice'];
  $idconsumo = $_POST['idconsumo'];
  $queryeliminar = "DELETE FROM `operaciones_clientes` WHERE IDoperaciones='$idconsumo' AND invoice='$invoice'";
  var_dump($queryeliminar);

  // $querycliente = "SELECT tblcustomers.Name, tblcustomers.cedula,tblcustomers.ID from tblinvoice join tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId = '$invoice' ";

  // $stmt = mysqli_query($conexion,$querycliente);
  // $row = mysqli_fetch_array($stmt);


  // $cliente = $row['ID'];
  // $cargomonto = ($_POST['montocargo']) * (-1);
  // $saldo=$_POST['saldo'];
  // $restante = $saldo - $cargomonto;
  // $querycargo = "INSERT INTO consumo_fondo (invoice,saldo,cliente, aplicado) VALUES ('$invoice','$restante','$cliente','$cargomonto')";
  // // var_dump($querycargo);
  // // var_dump($cargomonto);
  // $stmt2= mysqli_query($conexion,$querycargo);
  // header('location:../venta.php?billing='.$invoice.'');

}

//ASIGNAR ABONO
