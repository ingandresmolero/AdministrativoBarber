<?php
    include("../../php/conex.php");

    if(isset($_POST['crear'])){
        $usuario = $_POST['userid'];
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $barbero = $_POST['idbarber'];
        $tipocliente = $_POST['tipo_cliente'];
        
        $sql = "INSERT INTO tblcustomers (`Name`,`assignedbarber`,`Email`,`MobileNumber`,`Gender`,`cedula`, `Details`, `assignedBy`) VALUES ('$nombre','0','0','0','$tipocliente','$cedula','0','$usuario')";

 $stmt = mysqli_query($conexion,$sql);

      
header('Location: ../Protocolo.php');
        
    }


    




?>