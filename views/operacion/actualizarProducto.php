<?php
include("../../php/dbconn.php");
$id = $_GET['idproduct'];
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $costo =$_POST['costo'];
    $deposito = $_POST['deposito'];
    $sql = "UPDATE tblproducts SET nombre='$nombre',precio='$costo',cantidad='$cantidad',deposito='$deposito' WHERE idproducts=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $add = $stmt->fetchAll();

    if ($stmt > 0) {
        error_log($stmt);
    } else {
        echo '<script> alert("Actualizacion completa !")</script>';
        header('Location: ../stock.php');
    }
}
