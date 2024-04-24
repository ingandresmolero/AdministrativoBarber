<?php
include("../../php/conex.php");



//PAGO EN BOLIVARES
if (isset($_POST['asignarmetodobs'])) {
  $idservidor = $_POST['idservidor'];
  $invoice = $_POST['invoice'];
  $idmetodo = $_POST['idmetodo'];
  $detallebs = $_POST['detallesbs'];
  $montobs = $_POST['monto_pagobs'];
  $tasa = $_POST['tasa'];

  $fecha_desde = $_POST['fecha_desde'];
  $fecha_hasta = $_POST['fecha_hasta'];



  //   $montousd = intval($montobs / $tasa); 
  echo 'monto';
  

  $sqlinsertpago = "INSERT INTO historicos_pago(idmetodo, monto,fecha, idservidor) VALUES ('$idmetodo','$montobs','$fecha_desde','$idservidor')";
  var_dump($sqlinsertpago);
  // var_dump($fecha_hasta);
  // var_dump($fecha_desde);

  $stmt3 = mysqli_query($conexion, $sqlinsertpago);
  header('location:../procesarpago.php?userid=' . $idservidor . '&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'');
}


//PAGO EN DOLARES
if (isset($_POST['asignarmetodousd'])) {

  $idservidor = $_POST['idservidor'];
  $invoice = $_POST['invoice'];
  $idmetodo = $_POST['idmetodo'];
  $monto = $_POST['monto_pago'];
  $detalle = $_POST['detalles'];
  $fecha_pago = $_POST['fecha_desde'];
  $fecha_desde = $_POST['fecha_desde2'];
  $fecha_hasta = $_POST['fecha_hasta2'];

 


  $sqlinsertpago = "INSERT INTO historicos_pago(idmetodo, monto,fecha, idservidor) VALUES ('$idmetodo','$monto','$fecha_desde2','$idservidor')";
  

  var_dump($fecha_hasta);
  var_dump($fecha_desde);
  // var_dump($_POST['idservidor']);
  $stmt2 = mysqli_query($conexion, $sqlinsertpago);
  header('location:../procesarpago.php?userid=' . $idservidor . '&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'');
}

//TOTALIZAR PAGO DE USUARIOS
if(isset($_POST['totalizarpago'])){
  
}

