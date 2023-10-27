<?php
include("../../php/conex.php");

if(isset($_POST['asignaradicional'])){
  $invoice = $_POST['invoice'];
  $idmetodo=$_POST['idmetodo'];
  $detalle = $_POST['detalles'];
  $monto =$_POST['monto_pago'];
  $tasa = $_POST['tasa'];
  $fecha_pago = date("d/m/Y");
  $idusuario = $_POST['idusuario'];

//   $montousd = intval($montobs / $tasa); 

 
  $sqlinsertadicional = "INSERT INTO servicios_adicional( id_billing, id_usuario, id_metodo,monto,detalles) VALUES ('$invoice','$idusuario','$idmetodo','$monto','$detalle')";
  
     $stmt3 = mysqli_query($conexion,$sqlinsertadicional);
     header('location:../venta.php?billing='.$invoice.'');
}