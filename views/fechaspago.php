<?php
include("../php/functions/validar.php");
include("../php/dbconn.php");
include("../php/conex.php");
$id = $_GET['userid'];
$sql = "SELECT * FROM tbladmin where ID='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetch();




?>


<!-- <?php
        include("actualizarProducto.php");
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Editar Servicio</title>
</head>

<body>
    <?php include("./assets/headersintasa.php"); ?>

    <main>
        <div class="text-light">
            <h1>Pago de Servidor: <?php echo $resultado['AdminName'] ?></h1>
        </div>
        <form action="" method="post">
            <div class="row container-sm">
                <div class="col-sm text-light mt-3">
                    <h2>Fecha Desde</h2>
                    <input type="date" name="fecha_desde" class="form-control" id="">
                </div>
            </div>
            <div class="row mt-5 container-sm text-light">
                <div class="col-sm">
                    <h2>Fecha Hasta</h2>
                    <input type="date" name="fecha_hasta" class="form-control" id="">
                </div>
            </div>
            <input type="submit" value="Enviar" name="procesarfecha">
        </form>
    </main>
    <?php
    if (isset($_POST['procesarfecha'])) {
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];
        echo ' <div class="text-light fs-2 mt-5"> 
        <h2>Fechas a Procesar pago:</h2>
                <ul>
                    <li>Desde:' . $fecha_desde . ' </li>
                    <li>Hasta:' . $fecha_hasta . ' </li>
                </ul> 
                </div>
                <h2>De ser Correctas las fechas, Presiones el siguiente boton: <a class="table-btn" href="../views/procesarpago.php?userid='. $resultado['ID'] .'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'">Pago</a></h2>';
    };
    ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>