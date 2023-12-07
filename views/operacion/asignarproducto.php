<?php
    include("../../php/dbconn.php");
    include("../../php/conex.php");


    if(isset($_POST['asignar'])){
        $producto = $_POST['product'];
        $cantidad = $_POST['cantidad'];
        $invoice = $_POST['invoice'];
        $sql3="SELECT * FROM tblproducts WHERE idproducts='$producto'";
        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);
        
        $monto = $fila['precio'];
        $cantidad_stock = $fila['cantidad'];
        $monto_productos = $monto * $cantidad;

        $monto_final = intval($cantidad_stock) - intval($cantidad);

        $sql = "INSERT INTO tblassignedproducts (invoice, id_products, cantidad,monto) VALUES ('$invoice','$producto','$cantidad','$monto_productos')";
       
        $actsql = "UPDATE tblproducts SET cantidad='$monto_final' WHERE idproducts='$producto'";
        var_dump($actsql);

        $stmt = $conn->prepare($sql);
        $stmtact = $conn->prepare($actsql);
        $stmt->execute();
        $stmtact->execute();

        header('location:../venta.php?billing='.$invoice.'');
        
    }

    if(isset($_POST['asignar_interno'])){
        $producto = $_POST['product'];
        $cantidad = $_POST['cantidad'];
        $invoice = $_POST['invoice'];
        $sql3="SELECT * FROM tblproducts WHERE idproducts='$producto'";
        $stmtc= mysqli_query($conexion,$sql3);
        $fila = mysqli_fetch_array($stmtc);
        
        $monto = $fila['precio'];
        $cantidad_stock = $fila['cantidad'];
        $monto_productos = $monto * $cantidad;

        $monto_final = intval($cantidad_stock) - intval($cantidad);

        $sql = "INSERT INTO tblassignedproducts_intern( intern, id_products, cantidad, monto) VALUES ('$invoice','$producto','$cantidad','$monto_productos')";
       
        $actsql = "UPDATE tblproducts SET cantidad='$monto_final' WHERE idproducts='$producto'";
        var_dump($actsql);

        $stmt = $conn->prepare($sql);
        $stmtact = $conn->prepare($actsql);
        $stmt->execute();
        $stmtact->execute();

        header('location:../hoja_consumo.php?id='.$invoice.'');
        
    }


?>