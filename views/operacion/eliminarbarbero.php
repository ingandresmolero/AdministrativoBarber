<?php
    include("../../php/dbconn.php");
$id=$_GET['userid'];


        $sql = "DELETE FROM tblbarber WHERE idbarber=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Eliminacion Hecha!")</script>';
           header('Location: ../barberos.php');
        
    


    




?>