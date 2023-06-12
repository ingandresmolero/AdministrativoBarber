<?php
session_start();
$username = $_SESSION['username'];
include("../../php/dbconn.php");


if (!isset($_POST["codigo2"]) || !isset($_POST["nombre"]) || !isset($_POST["costo"]) || !isset($_POST["existencia"]) || !isset($_POST["cantidad"])) {
    var_dump($_POST["codigo2"]);
    var_dump($_POST["nombre"]);
    var_dump($_POST["costo"]);
    var_dump($_POST["existencia"]);
    var_dump($_POST["cantidad"]);
   
    exit("Faltan datos");
}

$codigo =$_POST["codigo2"];
$nombre =$_POST["nombre"];
$factura =$_POST["factura_com"];
$proveedor =$_POST["proveedor"];
$costo =$_POST["costo"];
$existencia =$_POST["existencia"];
$cantidad =$_POST["cantidad"];
$monto = $_POST["monto_com"];
$fecha_reg = date("D/m/y");
$resultado = $existencia + $cantidad;

$query2 = "UPDATE stock SET existencia='$resultado' WHERE codigo = '$codigo'";
$query3 = "INSERT INTO reportes( codigo,  ingreso, usuario, fecha_creacion,representante,monto,factura_comp) VALUES ('$codigo','$cantidad','$username','$fecha_reg','$proveedor','$monto','$factura')";

$stmt2= $conn->prepare($query2);
$stmt3= $conn->prepare($query3);
$stmt3 -> execute();
$stmt2 -> execute();
echo '<script>alert("Se Genero una Carga")</script>';
header("Location: ../reportes.php");



 