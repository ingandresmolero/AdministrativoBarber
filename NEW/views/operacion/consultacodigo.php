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
                <form action="retirarItem.php" method="post">
                    <div class="input-item">
                        <label class="form-label" >Codigo</label>
                        <input class="form-control" value= "'.$out['codigo']. '" name="codigo2" disabled>
                    </div>
                    <div class="input-item">
                    <label class="form-label">Nombre Articulo</label>
                    <input class="form-control" value= "'.$out['nombre']. '" name="nombre" disabled>
                </div>
                <div class="input-item">
                <label class="form-label">Costo Promedio</label>
                <input class="form-control" value= "'.$out['costo']. '" name="costo" disabled>
            </div>
            <div class="input-item">
                        <label class="form-label">Stock</label>
                        <input class="form-control" value= "'.$out['existencia']. '" name="existencia" disabled>
                    </div>
                    <div class="input-item">
                    <label class="form-label">Nota Retiro</label>
                    <input class="form-control" value= "" placeholder="Nota de Retiro..." name="nota_retiro">
                </div>
                <div class="input-item">
                    <label class="form-label">Representante Retiro</label>
                    <input class="form-control" value= "" placeholder="Nota de Retiro..." name="repres_retiro">
                </div>
                   
                  
                    
                    <div class="input-item">
                        <label class="form-label">Monto Retiro </label>
                        <input class="form-control" placeholder="cantidad a retirar" name="monto_reti">
                    </div>
                    <div class="input-item">
                        <label class="form-label">Tasa del dia</label>
                        <input class="form-control" placeholder="Tasa" name="tasa">
                    </div>
                    <div class="input-item">
                        <label class="form-label">Cantidad </label>
                        <input class="form-control" placeholder="cantidad a retirar" name="cantidad">
                    </div>
                    <button class="btn-style-1" type="" name="retirar"> Retirar </button>
                </form>
            </div>
            ';
    
        } else {
            echo '<div class="container"><p class="alert-error">El codigo ingresado no existe.</p></div>';
        }
    }
