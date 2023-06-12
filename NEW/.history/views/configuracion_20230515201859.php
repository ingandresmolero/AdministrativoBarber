<?php include("../php/functions/validar.php");

include("../php/functions/tasa.php"); ?>
<?php
include("../php/dbconn.php");
include("../views/operacion/addparametros.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Parametros</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/styles.min.css">

</head>

<body id="page-configuracion">
    <?php include("assets/header.php"); ?>

    <main>
        <div class="container">
            <h1 class="page-heading">Configuracion de Empresa</h1>
            <div class="box">
                <form action="" method="post">
                    <div class="input-item">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="tex" class="form-control" name="nombre" id="">
                    </div>
                    <div class="input-item">
                        <label for="" class="form-label">Razon Social:</label>
                        <input type="tex" class="form-control" name="rif" id="">
                    </div>
                    <div class="input-item">
                        <label for="" class="form-label">Direccion:</label>
                        <input type="tex" class="form-control" name="direccion" id="">
                    </div>
                    <div class="input-item">
                        <label for="" class="form-label">Telefono:</label>
                        <input type="tex" class="form-control" name="telefono" id="">
                    </div>
                    <div class="input-item">
                        <label for="" class="form-label">No Control:</label>
                        <input type="tex" class="form-control" name="n_control" id="">
                    </div>

                    <input type="submit" class="btn btn-primary mb-3" value="Guardar" name="guardar">
                </form>
            </div>
        </div>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>