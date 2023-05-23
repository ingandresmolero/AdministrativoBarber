<?php

include("../php/functions/validar.php");

// include("../php/functions/tasa.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>System</title>
    <link rel="stylesheet" href="../css/styles.min.css">

</head>

<body>
    <?php
    include("assets/headersintasa.php");
    ?>
    <section class="container-sm">
        <div class="row justify-content-center mt-5 ">
            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Inventario</h5>
                        <a href="stock.php" class="btn btn-primary ">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Actualizar Tasa</h5>
                        <a href="tasa.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Operaciones</h5>
                        <a href="operaciones.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Lista de Facturas</h5>
                        <a href="lista_facturas.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Reportes</h5>
                        <a href="reportes.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>

                        <a href="usuarios.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Configuracion</h5>

                        <a href="configuracion.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- <div class="col-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">Facturacion</h5>

                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div> -->
        </div>




    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>