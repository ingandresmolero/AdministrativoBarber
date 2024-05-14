<?php
include("../../php/conex.php");

if(isset($_POST['asignarmetodobs'])){
  $invoice = $_POST['invoice'];
  $idmetodo=$_POST['idmetodo'];
  $detallebs = $_POST['detallesbs'];
  $montobs =$_POST['monto_pagobs'];
  $tasa = $_POST['tasa'];
  $fecha_pago = date("Y-m-d");

//   $montousd = intval($montobs / $tasa); 
echo 'monto';
var_dump($montobs);
 
  $sqlinsertpago = "INSERT INTO cuentas_cobrar( invoice, idmetodo, monto,detalle,fecha_creacion) VALUES ('$invoice','$idmetodo','$montobs','$detallebs','$fecha_pago')";
  
     $stmt3 = mysqli_query($conexion,$sqlinsertpago);
     header('location:../venta.php?billing='.$invoice.'');

}

   
      if(isset($_POST['asignarmetodousd'])){
        $invoice = $_POST['invoice'];
        $idmetodo=$_POST['idmetodo'];
        $monto =$_POST['monto_pago'];
        $detalle = $_POST['detalles'];
        $fecha_pago = date("Y-m-d");
    
 
   $sqlinsertpago = "INSERT INTO cuentas_cobrar( invoice, idmetodo, monto,detalle,fecha_creacion) VALUES ('$invoice','$idmetodo','$monto','$detalle','$fecha_pago')";
   echo 'PAGO DOLARES';

//    var_dump($sqlinsert);
//    echo '<hr>';
//    var_dump($sqlinsertservicio);

     $stmt2 = mysqli_query($conexion,$sqlinsertpago);
     header('location:../venta.php?billing='.$invoice.'');
       
        
    }






?>