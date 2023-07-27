<?php
    include("../../php/dbconn.php");
$id=$_GET['idproduct'];


        $sql = "DELETE FROM tblproducts WHERE idproducts=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Eliminacion Hecha!")</script>';
           header('Location: ../stock.php');
        
    


    




?>