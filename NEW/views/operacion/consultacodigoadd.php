<?php

    include("../../php/dbconn.php");
    if (isset($_POST['buscar'])) {;
        $codigo = $_POST['codigo'];

        //Obtienes los datos
        $sql = "SELECT * FROM stock  WHERE codigo = '$codigo'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $out = $stmt->fetch();

       
        

        if ($out > 0) {
            echo '
            <div class="box-bg medium-sz">
            
                <form action="agregarItem.php" method="post">
                    <div class="input-item">
                        <label class="form-label">Codigo</label>
                        <input class="form-control" value= "'.$out['codigo']. '" name="codigo2" disabled>
                    </div>
                    <div class="input-item">
                        <label class="form-label">Nombre Articulo</label>
                        <input class="form-control" value= "'.$out['nombre']. '" name="nombre" disabled>
                    </div>
                 
                    <div class="input-item">
                        <label class="form-label">Existencia Stock</label>
                        <input class="form-control" value= "'.$out['existencia']. '" name="existencia" disabled>
                    </div>
                    <div class="input-item">
                        <label class="form-label">Factura de Compra: </label>
                        <input class="form-control" placeholder="Numero de documento..." name="factura_com">
                    </div>
                    <div class="input-item">
                    <label class="form-label">Proveedor: </label>
                    <input class="form-control" placeholder="Numero de documento..." name="proveedor">
                </div>
                    
                    <div class="input-item">
                        <label class="form-label">Cantidad </label>
                        <input class="form-control" placeholder="cantidad a agregar" name="cantidad">
                    </div>
                    <div class="input-item">
                        <label class="form-label">Monto Compra </label>
                        <input class="form-control" placeholder="Monto $ ..." name="monto_com">
                    </div>
                    
                    <button type="" class="btn-style-1" name="agregar"> Agregar </button>
                </form>
            </div>
            ';

        } else {
            echo '<div class="container"><p class="alert-error">El codigo ingresado no existe.</p></div>';
        }
    }
    ?>
     <!-- <div class="input-item">
                        <label class="form-label">Costo</label>
                        <input class="form-control" value= "'.$out['costo']. '" name="costo">
                    </div> -->