<?php
include("../php/dbconn.php");
    $fecha = $_POST['fecha'];

    $fecha2 = new DateTime($fecha);
    $fecha2->format('d/m/Y');

    $fechaactual = $fecha2->format('d/m/Y');
$select = "SELECT * FROM transacciones where fecha_creacion = '$fechaactual'";

   $stmt = $conn->prepare($select);
   $stmt->execute();

   $row= $stmt->fetch();

   var_dump($row);