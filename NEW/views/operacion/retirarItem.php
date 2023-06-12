<?php
session_start();
$username = $_SESSION['username'];
include("../../php/dbconn.php");

if (!isset($_POST["codigo2"]) || !isset($_POST["nombre"]) || !isset($_POST["costo"]) || !isset($_POST["existencia"]) || !isset($_POST["cantidad"])) {
    exit("Faltan datos");
}

$codigo =$_POST["codigo2"];
$notaretiro =$_POST["nota_retiro"];
$represretiro =$_POST["repres_retiro"];
$nombre =$_POST["nombre"];
$costo =$_POST["costo"];
$existencia =$_POST["existencia"];
$montoretiro =$_POST["monto_reti"];
$cantidad =$_POST["cantidad"];
$fecha_reg = date("d/m/Y");

$resultado = $existencia - $cantidad;

$query2 = "UPDATE stock SET existencia='$resultado' WHERE codigo = '$codigo'";
$query3 = "INSERT INTO reportes( codigo,  egreso, usuario, fecha_creacion,representante,monto,nota_ret) VALUES ('$codigo','$cantidad','$username','$fecha_reg','$represretiro','$montoretiro','$notaretiro')";

$stmt2= $conn->prepare($query2);
$stmt3= $conn->prepare($query3);
$stmt3 -> execute();
$stmt2 -> execute();

echo '<script>alert("Se Genero un Retiro")</script>';
header("Location: ../reportesIE.php");



