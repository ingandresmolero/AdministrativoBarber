<?php

session_start();
$rol = $_SESSION["Role"];
$usuario = $_SESSION["username"];

include("../php/dbconn.php");
$datos = "SELECT * FROM tbladmin WHERE UserName='$usuario'";

$datos =$conn ->prepare($datos);
$datos->execute();
$row = $datos->fetch();
$userid = $row['ID'];
if (!isset($_SESSION['username'])) {
      session_destroy();
    header('location: ../index.php');
}

?>