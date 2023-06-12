<?php
include("../php/functions/validar.php");

include("../php/functions/tasa.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Operaciones</title>
    
</head>

<body class="operations">
    <?php
    include("assets/header.php");
    ?>
    <section class="container">
        
        <div class="elements">
           
            <a href="./operacion/add_stock.php" class="item">
                <img src="../img/icons/crear-codigo.png">
                <p class="card-title">Crear Codigo</p>
            </a>
                   
            <a href="./operacion/anadir_stock.php" class="item">
                <img src="../img/icons/orden-carga.png">
                <p class="card-title">Orden de Carga</p>
            </a>

            <a href="./operacion/out_stock.php" class="item">
                <img src="../img/icons/orden-retiro.png">
                <p class="card-title">Orden de Retiro</p>
            </a>

        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</body>

</html>