<?php

include("../../php/dbconn.php");

if(isset($_POST['crear'])){
    $nombre =$_POST["nombre"];



    $query2 = "INSERT INTO metodos_pago (nombre) VALUES ('$nombre')";
    
    
    $stmt2= $conn->prepare($query2);
    $stmt2 -> execute();
    echo '<script>alert("Se Creo un metodo")</script>';
    header("Location: ../metodospagos.php");
    
}

