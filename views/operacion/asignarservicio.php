<?php
include("../../php/conex.php");

   
      if(isset($_POST['asignarservicio'])){
        $invoice = $_POST['invoice'];
        $idservice=$_POST['idservice'];
        $idbarber =$_POST['idbarber'];
        
        $producto = "SELECT Cost FROM tblservices where ID='$idservice'";
        $stmt3 = mysqli_query($conexion,$producto);
        $row2 = mysqli_fetch_array($stmt3);
        $costo = $row2['Cost'];
     
        $sql="select tblcustomers.ID,tblinvoice.ServiceId, tblinvoice.AssignedUserID,tblinvoice.Userid  as usuario,tblinvoice.PostingDate  FROM tblinvoice JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID where tblinvoice.BillingID = '$invoice' ";
        $stmt=mysqli_query($conexion,$sql);
        $row = mysqli_fetch_array($stmt);
        $date=$row['PostingDate'];
        $usuario=$row['usuario'];
        $userid=$row['ID'];
        $assigned=$row['AssignedUserID'];

         //INSERTAR EL NUEVO SERVICIO
//    $sqlinsert="INSERT INTO tblinvoice (Userid,ServiceId,AssignedUserID,BillingID,PostingDate) VALUES ('$userid','$idservice','$assigned','$invoice','$date')";
 
   $sqlinsertservicio = "INSERT INTO tblassignedservice( invoice, servicio, idbarbero, cantidad,monto,detalle,propina) VALUES ('$invoice','$idservice','$idbarber','1','$costo','0','0')";

//    var_dump($sqlinsert);
//    echo '<hr>';
//    var_dump($sqlinsertservicio);

    $stmt2 = mysqli_query($conexion,$sqlinsertservicio);
    header('location:../venta.php?billing='.$invoice.'');
       
        
    }

    
    if(isset($_POST['asignarservicio_interno'])){
      $invoice = $_POST['invoice'];
      $idservice=$_POST['idservice'];
      $idbarber =$_POST['idbarber'];
      
      $producto = "SELECT Cost FROM tblservices where ID='$idservice'";
      $stmt3 = mysqli_query($conexion,$producto);
      $row2 = mysqli_fetch_array($stmt3);
      $costo = $row2['Cost'];
   
      $sql="select tblcustomers.ID,tblinvoice.ServiceId, tblinvoice.AssignedUserID,tblinvoice.Userid  as usuario,tblinvoice.PostingDate  FROM tblinvoice JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID where tblinvoice.BillingID = '$invoice' ";
      $stmt=mysqli_query($conexion,$sql);
      $row = mysqli_fetch_array($stmt);
     

       //INSERTAR EL NUEVO SERVICIO
//    $sqlinsert="INSERT INTO tblinvoice (Userid,ServiceId,AssignedUserID,BillingID,PostingDate) VALUES ('$userid','$idservice','$assigned','$invoice','$date')";

 $sqlinsertservicio = "INSERT INTO tblassignedservice_intern( intern, servicio, idbarbero, cantidad,monto,detalle,propina) VALUES ('$invoice','$idservice','$idbarber','1','$costo','0','0')";

//    var_dump($sqlinsert);
//    echo '<hr>';
//    var_dump($sqlinsertservicio);

  $stmt2 = mysqli_query($conexion,$sqlinsertservicio);
  header('location:../hoja_consumo.php?id='.$invoice.'');




    }

?>