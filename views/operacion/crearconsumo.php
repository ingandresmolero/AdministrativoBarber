<?php
    include("../../php/dbconn.php");
    include("../../php/conex.php");

    if(isset($_POST['crear'])){
        $nombre = $_POST['barbero'];
        $cantidad = $_POST['cantidad'];
        $producto = $_POST['producto'];
        $fecha = date("d/m/Y");

        $sql3="SELECT * FROM tblproducts WHERE idproducts='$producto'";
        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);

        $cantidad_stock = $fila['cantidad'];

        $cantidad_final = intval($cantidad_stock) - intval($cantidad);

       

        
            $sql = "INSERT INTO consumo_interno (servidor, idproducto,cantidad,estado,fecha_creacion) VALUES ('$nombre','$producto','$cantidad','pendiente','$fecha')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $actsql = "UPDATE tblproducts SET cantidad='$cantidad_final' WHERE idproducts='$producto'";
            $stmtact = $conn->prepare($actsql);
            $stmtact->execute();
    
          
               header('Location: ../consumo_interno.php');
       
       
        
    }


    




?>