<?php
    include("../../php/dbconn.php");
$id=$_GET['billing'];


        $sql = "UPDATE tblinvoice SET estado='anulado' WHERE billingId=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


           echo '<script> alert("Anulacion Hecha!")</script>';
           header('Location: ../lista_facturas.php');
        
    


    




?>