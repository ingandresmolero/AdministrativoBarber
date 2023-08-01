<?php
    include("../../php/dbconn.php");
$id=$_GET['userid'];


        $sql = "DELETE FROM tbladmin WHERE ID=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Eliminacion Hecha!")</script>';
           header('Location: ../usuarios.php');
        
    


    




?>