<?php include("../../php/functions/validar.php"); ?>
<?php
include("../../php/dbconn.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../../css/styles.min.css">
    <title>Orden Retiro</title>
</head>

<body>
    <?php include("../assets/headersintasa.php"); ?>

    <main>
        <div class="container">
            <h1 class="page-heading">Orden de Salida</h1>

            <form action="" method="post" class="form-style-1">
                <div class="flex-element">
                    <label for="" class="form-label">Codigo:</label>
                    <div class="flex-item">
                        <input type="tex" class="form-control" name="codigo" id="">
                    </div>
                    <div class="flex-item">
                        <input type="submit" class="btn-style-1 margin-left" value="buscar" name="buscar">
                    </div>
                </div>
            </form>
            <?php include("../operacion/consultacodigo.php");?>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>