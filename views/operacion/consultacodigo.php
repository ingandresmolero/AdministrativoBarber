<?php

    include("../../php/dbconn.php");
    include("../../php/conex.php");
    if (isset($_POST['buscar'])) {;
        $codigo = $_POST['codigo'];

        //Obtienes los datos
        $sql = "SELECT * FROM tblproducts  WHERE idproducts LIKE '%$codigo%' OR nombre LIKE '%$codigo%' ";
        $stmt = mysqli_query($conexion,$sql);
        
        $out =mysqli_fetch_array($stmt);

        // $cantidad = $out['cantidad'];
       

        if ($out > 0) {
         
            echo '
            <form action="retirarItem.php" method="post">
                <label>Codigo</label>
                <input value= "'.$out['idproducts']. '" name="codigo2">
                
                <label>Nombre</label>
                <input value= "'.$out['nombre']. '" name="nombre">
                
                <label>Costo</label>
                <input value= "'.$out['precio']. '" name="costo">
                
                <label>Stock</label>
                <input value= "'.$out['cantidad']. '" name="existencia">
                
                <label>Cantidad </label>
                <input placeholder="cantidad a retirar" name="cantidad">
                <button type="" name="retirar"> Retirar </button>
            </form>
            ';
    
           

        } else {
            echo 'Este codigo no existe';
        }
    }
    ?>
  