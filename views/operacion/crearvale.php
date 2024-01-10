<?php
include("../../php/conex.php");

   
      if(isset($_POST['asignarvale'])){
       
        $idbarber =$_POST['idbarber'];
        $metodo = $_POST['metodo'];
        $monto = $_POST['monto'];
        $detalles = $_POST['detalles'];
        $fecha = date("d/m/Y");

        $sql="INSERT INTO  vales (idbarber ,  monto ,  detalle ,  fecha , metodo_pago ) VALUES ('$idbarber','$monto','$detalles','$fecha','$metodo') ";
        
        $stmt=mysqli_query($conexion,$sql);
       
        
    header('location:../vales.php');
       
        
    }






?>