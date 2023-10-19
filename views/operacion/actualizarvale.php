<?php
    include("../../php/dbconn.php");

    if(isset($_POST['actualizar'])){
        $estado = $_POST['estado'];
        $id=$_POST['idvale'];
        $sql = "UPDATE vales SET estado='$estado' where idvale='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $add = $stmt->fetchAll();


        if($stmt > 0){
           error_log($stmt);

        }else{
           echo '<script> alert("Actualizacion completa !")</script>';
           header('Location: ../vales.php');
        }
    }


    




?>