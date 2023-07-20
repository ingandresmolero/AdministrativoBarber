<?php
include("../../php/conex.php");

   
      if(isset($_POST['asignarservicio'])){
        $invoice = $_POST['invoice'];
        $idservice=$_POST['idservice'];
        $idbarber =$_POST['idbarber'];
     
        $sql="select tblcustomers.ID,tblinvoice.ServiceId, tblinvoice.AssignedUserID,tblinvoice.Userid  as usuario,tblinvoice.PostingDate  FROM tblinvoice JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID where tblinvoice.BillingID = '$invoice' ";
        $stmt=mysqli_query($conexion,$sql);
        $row = mysqli_fetch_array($stmt);
        $date=$row['PostingDate'];
        $usuario=$row['usuario'];
        $userid=$row['ID'];
        $assigned=$row['AssignedUserID'];

         //INSERTAR EL NUEVO SERVICIO
//    $sqlinsert="INSERT INTO tblinvoice (Userid,ServiceId,AssignedUserID,BillingID,PostingDate) VALUES ('$userid','$idservice','$assigned','$invoice','$date')";
 
   $sqlinsertservicio = "INSERT INTO tblassignedservice( invoice, servicio, idbarbero, cantidad, detalle) VALUES ('$invoice','$idservice','$idbarber','1','0')";
//    var_dump($sqlinsert);
//    echo '<hr>';
//    var_dump($sqlinsertservicio);

    $stmt2 = mysqli_query($conexion,$sqlinsertservicio);
    header('location:../venta.php?billing='.$invoice.'');
       
        
    }






?>