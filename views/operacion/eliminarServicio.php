<?php
    include("../../php/dbconn.php");
$id=$_GET['ID'];


        $sql = "DELETE FROM tblservices WHERE ID=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Eliminacion Hecha!")</script>';
           header('Location: ../mant_servicios.php');
        
    


    




?>