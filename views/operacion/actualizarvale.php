<?php
    include("../../php/dbconn.php");
$id=$_GET['valeid'];
    if(isset($_POST['actualizar'])){
        $nombre = $_POST['estado'];

        $sql = "UPDATE valesm2  SET UserName='$nombre',Password='$contrasena',Role='$rol' WHERE id_usuario=$id";
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