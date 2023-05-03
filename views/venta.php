<?php include("../php/functions/validar.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Tasa</title>
</head>

<body>
    <?php include("assets/headersintasa.php"); ?>

    <main>
        <section>
            <div class="container-sm">

                <form action="" method="post">
                    <label class="form-label" for="">Cliente</label>
                    <div class="d-flex">
                        <input class="form-control col-sm-3" type="text" name="busqueda" id="tasa" placeholder="Cedula, nombre...">
                        <input type="submit" class="btn btn-primary mb-3" value="Guardar" name="guardar">
                    </div>
                </form>

                <!-- Datos Personales -->
                <section class="">

                    <form action="">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label" for="">Nombre</label>
                                <input class="form-control" type="text" name="" placeholder="Nombre Cliente" id="">
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="">Tipo </label>
                                <input class="form-control" type="text" name="" placeholder="Tipo Cliente" id="">
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="">Barbero</label>
                                <input class="form-control" type="text" name="" placeholder="Barbero Asignado" id="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <label class="form-label" for="">Servicio Asignado</label>
                                <div class="d-flex">
                                    <input class="form-control" type="text" name="" placeholder="Servicio asignado" id="">
                                    <input class="form-control" type="text" name="" placeholder="Precio" id="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="">Productos</label>
                                <input class="form-control" type="text" placeholder="Producto 1">
                                <input class="form-control" type="text" placeholder="precio 1">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
<div class="d-flex justify-content-end">
    <div class="col-3">
    <h3>Monto: </h3>
        <h3>IVA:</h3>
        <h3>Monto Total:    $   Bs.s</h3>
        <input type="submit" class="btn btn-success" value="TOTALIZAR">
    </div>

</div>
        
        </section>


    </main>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>