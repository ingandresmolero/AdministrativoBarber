<?php
include("../../php/conex.php");

   
      if(isset($_POST['asignarservicio'])){
        $invoice = $_POST['invoice'];
        $idmetodo=$_POST['idmetodo'];
        $monto =$_POST['monto_pago'];
        $fecha_pago = date("d/m/Y");
     
    
 
   $sqlinsertpago = "INSERT INTO cuentas_cobrar( invoice, idmetodo, monto,fecha_creacion) VALUES ('$invoice','$idmetodo','$monto','$fecha_pago')";
//    var_dump($sqlinsert);
//    echo '<hr>';
//    var_dump($sqlinsertservicio);

    $stmt2 = mysqli_query($conexion,$sqlinsertpago);
    header('location:../venta.php?billing='.$invoice.'');
       
        
    }






?>