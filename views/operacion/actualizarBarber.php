<?php
    include("../../php/dbconn.php");
$id=$_GET['userid'];
    if(isset($_POST['actualizar'])){
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['passw'];
        $rol = $_POST['rol'];

        $sql = "UPDATE usuarios SET nombre='$nombre',passw='$contrasena',rol='$rol' WHERE id_usuario=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $add = $stmt->fetchAll();

        if($stmt > 0){
           error_log($stmt);

        }else{
           echo '<script> alert("Actualizacion completa !")</script>';
           header('Location: ../usuarios.php');
        }
    }


    




?>