<?php
    include("../../php/dbconn.php");
    if(isset($_POST['Descarga'])){
        $id = $_POST['idproducto'];
        $stock = $_POST['stock'];
        $cantidad = $_POST['cantidad'];
        $total = $stock - $cantidad;


        $sql = "UPDATE tblproducts SET cantidad='$total' WHERE idproducts='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

           header('Location: ../Descarga.php?pagina=1');
        
    }
// $id=$_GET['idproduct'];

    


    




?>