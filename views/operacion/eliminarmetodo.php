<?php
    include("../../php/dbconn.php");
$id=$_GET['idmetodo'];


        $sql = "DELETE FROM metodos_pago WHERE idmetodo=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Eliminacion Hecha!")</script>';
           header('Location: ../metodospagos.php');
        
    


    




?>