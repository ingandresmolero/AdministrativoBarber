<?php
    include("../../php/dbconn.php");

    if(isset($_POST['crear'])){
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['clave'];
        $rol = $_POST['rol'];

        $sql = "INSERT INTO usuarios(nombre, user, passw, rol) VALUES ('$nombre','$usuario','$contrasena','$rol')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

      
           header('Location: ../usuarios.php');
        
    }


    




?>