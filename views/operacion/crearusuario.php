<?php
    include("../../php/dbconn.php");

    if(isset($_POST['crear'])){
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contrasena = md5($_POST['clave']);
        $rol = $_POST['rol'];
        

        if($rol != 'servidor'){
            $sql = "INSERT INTO tbladmin (AdminName, UserName, Password, Role) VALUES ('$nombre','$usuario','$contrasena','$rol')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
          
               header('Location: ../usuarios.php');
        }else if($rol =='servidor') {
            $sql = "INSERT INTO tbladmin (AdminName, UserName, Password, Role) VALUES ('$nombre','$usuario','$contrasena','$rol')";
            $sqlservidor ="INSERT INTO tblbarber( nombre, porcentaje, usuario, pass, Codigo, Puesto, Telefono) VALUES ('$nombre','0','$usuario','$contrasena','0','0','0')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $stmt2 = $conn->prepare($sqlservidor);
            $stmt2->execute();
    
          
               header('Location: ../usuarios.php');
        }

       
        
    }


    




?>