<?php
    include("../../php/dbconn.php");
$id=$_GET['userid'];


        $sql = "DELETE FROM usuarios WHERE id_usuario=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Eliminacion Hecha!")</script>';
           header('Location: ../usuarios.php');
        
    


    




?>