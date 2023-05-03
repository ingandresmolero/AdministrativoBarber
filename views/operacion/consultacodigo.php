<?php

    include("../../php/dbconn.php");
    if (isset($_POST['buscar'])) {;
        $codigo = $_POST['codigo'];

        //Obtienes los datos
        $sql = "SELECT * FROM stock  WHERE codigo = '$codigo'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $out = $stmt->fetch();

        $cantidad = $out['existencia'];
        

        if ($out > 0) {
            echo '
            <form action="retirarItem.php" method="post">
                <label>Codigo</label>
                <input value= "'.$out['codigo']. '" name="codigo2">
                
                <label>Nombre</label>
                <input value= "'.$out['nombre']. '" name="nombre">
                
                <label>Costo</label>
                <input value= "'.$out['costo']. '" name="costo">
                
                <label>Stock</label>
                <input value= "'.$out['existencia']. '" name="existencia">
                
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
  