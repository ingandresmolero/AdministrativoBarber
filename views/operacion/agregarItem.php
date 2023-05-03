<?php
session_start();
$username = $_SESSION['username'];
include("../../php/dbconn.php");


if (!isset($_POST["codigo2"]) || !isset($_POST["nombre"]) || !isset($_POST["costo"]) || !isset($_POST["existencia"]) || !isset($_POST["cantidad"])) {
    exit("Faltan datos");
}

$codigo =$_POST["codigo2"];
$nombre =$_POST["nombre"];
$costo =$_POST["costo"];
$existencia =$_POST["existencia"];
$cantidad =$_POST["cantidad"];
$fecha_reg = date("Ymd");
$resultado = $existencia + $cantidad;

$query2 = "UPDATE stock SET existencia='$resultado' WHERE codigo = '$codigo'";
$query3 = "INSERT INTO reportes( codigo,  ingreso, usuario, fecha_creacion) VALUES ('$codigo','$cantidad','$username','$fecha_reg')";

$stmt2= $conn->prepare($query2);
$stmt3= $conn->prepare($query3);
$stmt3 -> execute();
$stmt2 -> execute();
echo '<script>alert("Se Genero una Carga")</script>';
header("Location: anadir_stock.php");



