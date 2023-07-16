<?php
session_start();
$rol = $_SESSION["Role"];

if (!isset($_SESSION['username'])) {
      session_destroy();
    header('location: ../index.php');
}

?>