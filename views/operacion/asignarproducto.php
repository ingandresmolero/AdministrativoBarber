<?php
    include("../../php/dbconn.php");

    if(isset($_POST['asignar'])){
        $producto = $_POST['product'];
        $cantidad = $_POST['cantidad'];
        $invoice = $_POST['invoice'];
        $sql3="SELECT * FROM tblproducts WHERE idproducts='$producto'";
        $stmtc= $conn->prepare($sql3);
        $fila=$stmtc->fetchColumn();
        $monto = $fila['precio'];

        $sql = "INSERT INTO tblassignedproducts (invoice, id_products, cantidad,monto) VALUES ('$invoice','$producto','$cantidad','$monto')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

      var_dump($stmtc);
        header('location:../venta.php?billing='.$invoice.'');
        
    }


    




?>