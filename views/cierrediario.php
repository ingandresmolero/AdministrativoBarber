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
    <title>Activo Barbershop</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">

    <link rel="stylesheet" href="../css/styles.min.css">

</head>

<body id="dashboard">
    <?php
    include("assets/header.php");
    ?>
    <section class="container">

     

        
            <div class="elements">
                <a href="cierre/parcial.php" class="item">

                    <img src="../img/icons/tasa.png">
                    <p class="card-title">General</p>
                </a>

                <a href="lista_facturas.php" class="item">

                    <img src="../img/icons/inventario.png">
                    <p class="card-title">Historicos</p>
                </a>
               
            
            </div>
         
        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>