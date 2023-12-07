<?php
include("../../php/conex.php");

if (isset($_POST['asignarabono'])){
  $invoice = $_POST['invoice'];
  $querycliente = "SELECT tblcustomers.Name, tblcustomers.cedula,tblcustomers.ID from tblinvoice join tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId = '$invoice' ";
  $stmt = mysqli_query($conexion,$querycliente);
  $row = mysqli_fetch_array($stmt);

  $cliente = $row['ID'];
  $abonmonto = $_POST['montoabono'];
  $saldo=$_POST['saldo'];
  $restante = $saldo - $abonmonto;
  $queryabono = "INSERT INTO consumo_fondo (invoice,saldo,cliente, aplicado) VALUES ('$invoice','$restante','$cliente','$abonmonto')";

  $stmt2= mysqli_query($conexion,$queryabono);
  header('location:../venta.php?billing='.$invoice.'');

}



if(isset($_POST['quitarabono'])){
  $invoice = $_POST['invoice'];
  $querycliente = "SELECT tblcustomers.Name, tblcustomers.cedula,tblcustomers.ID from tblinvoice join tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId = '$invoice' ";

  $stmt = mysqli_query($conexion,$querycliente);
  $row = mysqli_fetch_array($stmt);


  $cliente = $row['ID'];
  $cargomonto = ($_POST['montocargo']) * (-1);
  $saldo=$_POST['saldo'];
  $restante = $saldo - $cargomonto;
  $querycargo = "INSERT INTO consumo_fondo (invoice,saldo,cliente, aplicado) VALUES ('$invoice','$restante','$cliente','$cargomonto')";
  // var_dump($querycargo);
  // var_dump($cargomonto);
  $stmt2= mysqli_query($conexion,$querycargo);
  header('location:../venta.php?billing='.$invoice.'');

}

//ASIGNAR ABONO
