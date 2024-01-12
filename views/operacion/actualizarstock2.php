<?php
    include("../../php/dbconn.php");
    if(isset($_POST['actualizacion'])){
        $id = $_POST['idproducto'];
        $cantidad = $_POST['cantidad'];


        $sql = "UPDATE tblproducts SET cantidad='$cantidad' WHERE idproducts='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

           header('Location: ../stock2.php?pagina=1');
        
    }
// $id=$_GET['idproduct'];

    


    




?>