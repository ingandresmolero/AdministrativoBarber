<?php

include("../../php/dbconn.php");


if (!isset($_POST["codigo2"]) || !isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["existencia"]) || !isset($_POST["costo"])|| !isset($_POST["precio_1"]) ) {
    exit("Faltan datos");
}

$codigo =$_POST["codigo2"];
$nombre =$_POST["nombre"];
$descripcion =$_POST["descripcion"];
$existencia =$_POST["existencia"];
$unidad =$_POST["unidad"];
$costo =$_POST["costo"];
$precio =$_POST["precio_1"];


$query2 = "INSERT INTO stock ( codigo, nombre, descripcion,existencia,costo,precio_1,unidades) VALUES ('$codigo','$nombre','$descripcion','$existencia','$costo','$precio','$unidad')";


$stmt2= $conn->prepare($query2);
$stmt2 -> execute();
echo '<script>alert("Se Creo un codigo")</script>';
header("Location: ../stock.php");
