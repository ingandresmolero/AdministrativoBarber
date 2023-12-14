<?php
include("../../php/conex.php");

if(isset($_POST['asignarmetodobs'])){
  $idservidor = $_POST['idservidor'];
  $invoice = $_POST['invoice'];
  $idmetodo=$_POST['idmetodo'];
  $detallebs = $_POST['detallesbs'];
  $montobs =$_POST['monto_pagobs'];
  $tasa = $_POST['tasa'];
  $fecha_pago = date("d/m/Y");

//   $montousd = intval($montobs / $tasa); 
echo 'monto';
var_dump($montobs);
 
  $sqlinsertpago = "INSERT INTO historicos_pago(idmetodo, monto,fecha, idservidor) VALUES ('$idmetodo','$monto','$fecha_pago','$idservidor')";
  
     $stmt3 = mysqli_query($conexion,$sqlinsertpago);
     header('location:../procesarpago.php?userid='.$idservidor.'');

}


   
      if(isset($_POST['asignarmetodousd'])){
        $idservidor = $_POST['idservidor'];
        $invoice = $_POST['invoice'];
        $idmetodo=$_POST['idmetodo'];
        $monto =$_POST['monto_pago'];
        $detalle = $_POST['detalles'];
        $fecha_pago = date("d/m/Y");
        
        $sqlinsertpago = "INSERT INTO historicos_pago(idmetodo, monto,fecha, idservidor) VALUES ('$idmetodo','$monto','$fecha_pago','$idservidor')";
          echo 'PAGO DOLARES';
          var_dump($_POST['idservidor']);
          $stmt2 = mysqli_query($conexion,$sqlinsertpago);
          header('location:../procesarpago.php?userid='.$idservidor.'');
       
        
    }






?>