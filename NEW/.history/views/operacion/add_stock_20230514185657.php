<?php
include("../../php/functions/validar.php");
include("../../php/dbconn.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../img/favicon.png">
    <link rel="stylesheet" href="../../css/styles.min.css">
    <title>Crear Item</title>

</head>

<body>
    <?php include("../assets/headersintasa.php"); ?>

    <main>
        <div class="container" id="prueba1">
            <h1 class="page-heading">Creacion de Item</h1>
            <form action="" method="post" class="form-style-1">
                <div class="row mb-3">
                   
                    <div class="col-lg-3 ">

                        <input type="tex" class="form-control" name="codigo" id="" placeholder="Codigo...">
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" class="btn btn-primary" id="buscar" value="buscar" name="buscar">
                    </div>
                </div>
        </div>
        </div>
        </form>
        <?php include("../operacion/consultacodigocrear.php");

        ?>
        </div>

    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">

</script>

<script>
    // let boton = document.getElementById("buscar");
    // boton.addEventListener("click",function(){
    //     document.getElementById("prueba1").setAttribute("class"," visually-hidden");
    // });
</script>