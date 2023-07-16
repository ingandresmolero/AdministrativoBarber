<?php
    include("../../php/dbconn.php");
$id=$_GET['userid'];
    if(isset($_POST['actualizar'])){
        $nombre = $_POST['nombre'];
        $user = $_POST['user'];
        $codigo = $_POST['Codigo'];
        $porcentaje = $_POST['porcentaje'];
        $puesto = $_POST['puesto'];
        $telefono = $_POST['telefono'];
        $contrasena = $_POST['passw'];
        

        $sql = "UPDATE tblbarber SET nombre='$nombre',usuario='$user',Codigo='$codigo',Puesto='$puesto',porcentaje='$porcentaje',puesto='$puesto',Telefono='$telefono',pass='$contrasena' WHERE idbarber=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $add = $stmt->fetchAll();

        if($stmt > 0){
           error_log($stmt);

        }else{
           echo '<script> alert("Actualizacion completa !")</script>';
           header('Location: ../barberos.php');
        }
    }


    




?>