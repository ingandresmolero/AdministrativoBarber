<?php
    include("../php/dbconn.php");
    $tasasql = "SELECT * FROM tasabs";
    $stmt = $conn->prepare($tasasql);
    $stmt->execute();

    $listado = $stmt->fetch();

    $tasadia = $listado['monto_bcv'];
    $tasafecha = $listado['fecha_creacion'];

    
?>