<?php
include("../../php/dbconn.php");
$id = $_GET['ID'];
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $costo =$_POST['costo'];

    $sql = "UPDATE tblservices SET ServiceName='$nombre',Cost='$costo' WHERE ID=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $add = $stmt->fetchAll();

    if ($stmt > 0) {
        error_log($stmt);
    } else {
        echo '<script> alert("Actualizacion completa !")</script>';
        header('Location: ../mant_servicios.php');
    }
}
