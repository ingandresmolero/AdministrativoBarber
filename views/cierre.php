<?php
include("../php/functions/validar.php");
include("../php/dbconn.php");
include("../php/conex.php");
$billing = $_GET['billing'];

$sql = "SELECT * FROM tblinvoice INNER JOIN tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId='$billing'";
$fecha = date("Y-m-d");
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Cierre Diario</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>

<body>
    <?php include("assets/headersintasa.php");


    ?>

    <main>
        <div class="row">
            <div class="col">
                <h1>Datos de Cierre Diario</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="evaluarcierre.php" method="post">
                    <h2>Seleccion de Fecha:</h2>
                    <input type="date" name="fecha" class="form-control">
<button type="submit">Aceptar</button>
                </form>
            </div>

        </div>
    </main>

    <?php
        var_dump($_POST['fecha']);

?>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>