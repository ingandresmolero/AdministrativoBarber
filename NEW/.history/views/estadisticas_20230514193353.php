<?php
include("../php/functions/validar.php");

include("../php/functions/tasa.php");
include("../php/dbconn.php");

include("assets/header.php");

$sql_arti = "SELECT * FROM stock WHERE existencia > '0'";
$stmt_arti = $conn->prepare($sql_arti);
$stmt_arti->execute();
$total = 0;
$cantidad = 0;
$totalbs = 0;


while ($rows = $stmt_arti->fetch()) {

    $cantidad = $cantidad + $rows['existencia'];
    $total = $total + ($rows['costo'] * $rows['existencia']);
    $totalbs = $totalbs + ($rows['costo'] * $rows['existencia']);  // Sumar variable $total + resultado de la consulta
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Operaciones</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/styles.min.css">
</head>

<body>





    <div class="container-sm">
        <h1 class="page-heading">Vision de Empresa</h1>


        <button class="btn-invert-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">
            Total de Inversion en $
        </button>
        <button class="btn-invert-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">
            Total de Inversion en Bs.S
        </button>
        <button class="btn-invert-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseExample">
            Cantidad de Articulos
        </button>

        <div class="collapse" id="collapse1">
            <div class="card card-body">
                Total de Inversion <?php

                                    echo " $total "; ?>
            </div>
        </div>
        <div class="collapse" id="collapse2">
            <div class="card card-body">
                Total de Inversion en Bolivares: <?php $totalbs = $total * intval($tasadia);
                                                    echo "$totalbs Bs.S" ?>
            </div>
        </div>
        <div class="collapse" id="collapse3">
            <div class="card card-body">
                Total de articulos: <?php


                                    echo ($cantidad);
                                    ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</body>

</html>