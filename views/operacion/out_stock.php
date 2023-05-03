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
    <title>Orden Retiro</title>
</head>

<body>
    <?php include("../assets/headersintasa.php"); ?>

    <main>



        <section>
            <div class="container-sm">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-3 ">
                            <label for="" class="form-label">Codigo:</label>
                            <input type="tex" class="form-control" name="codigo" id="">
                            <input type="submit" value="buscar" name="buscar">
                        </div>
                    </div>
            </div>
            </form>
            <?php include("../operacion/consultacodigo.php");
             
            ?>
            </div>
        </section>



    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>