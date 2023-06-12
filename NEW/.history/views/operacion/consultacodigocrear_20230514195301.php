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
            <div class="card container-sm mt-5">
            <h3>Ya existe el codigo</h3>

            </div>
            ';
    } else {
        echo '  
            <div id="test">
            
                <form action="crearCodigo.php" method="post">
                <div class="card justify-content-center">
                <h3>Creacion de Nuevo Codigo: </h3>
                <div class="col-sm">
                    <label for="" class="form-label">Codigo: </label>
                    <input type="text" class="form-control" value="' . $codigo . '" name="codigo2"  >
                </div>
                <div class="col-sm">
                    <label for="" class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="nombre" id="">
                </div>
                <div class="col-sm">
                    <label for="" class="form-label">Descripcion: </label>
                    <input type="text" class="form-control" name="descripcion" id="">
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="" class="form-label">Existencia: </label>
                        <input type="text" class="form-control" name="existencia" id="">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Unidad: </label>
                        <select class="form-select" name="unidad" id="">
                            <option value="kg">Kilogramos</option>
                            <option value="mt">Metros</option>
                            <option value="carrete">Carrete</option>
                        </select>
                    </div>
                </div>    
            <div class="col-sm">
            <label for="" class="form-label">Costo: </label>
            <input type="text" class="form-control" name="costo" id="">
        </div>
        <div class="col-sm mb-3">
            <label for="" class="form-label">Precio: </label>
            <input type="text" class="form-control" name="precio_1" id="">
        </div>
        <input type="submit" name="crear" class="btn btn-primary" value="Crear">
            </div>
            
                </form>
                </div>

            ';
    }
}
