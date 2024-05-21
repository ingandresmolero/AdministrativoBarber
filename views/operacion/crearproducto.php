<?php
    include("../../php/dbconn.php");

    if(isset($_POST['crear'])){
        $nombre = $_POST['nombre'];
        $pvp = $_POST['pvp'];
        $cantidad = $_POST['cantidad'];
        $deposito = $_POST['deposito'];
     

        $sql = "INSERT INTO tblproducts(nombre, cantidad, precio, deposito) VALUES ('$nombre','$cantidad','$pvp','$deposito')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

      
           header('Location: ../stock.php?pagina=1');
        
    }


    




?>