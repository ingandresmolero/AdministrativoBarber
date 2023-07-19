<?php
    include("../../php/dbconn.php");

    if(isset($_POST['crear'])){
        $usuario = $_POST['userid'];
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $barbero = $_POST['idbarber'];
        $tipocliente = $_POST['tipo_cliente'];
        
        $sql = "INSERT INTO tblcustomers(  Name, assignedbarber, Email, MobileNumber, Gender, cedula, Details, assignedBy) VALUES ('$nombre','$barbero','0','0','$tipocliente','$cedula','0',$usuario')";

 $stmt = $conn->prepare($sql);
 $stmt->execute();
var_dump($stmt);
      
//            header('Location: ../Protocolo.php');
        
    }


    




?>