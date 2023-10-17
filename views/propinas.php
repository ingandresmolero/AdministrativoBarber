<?php
$idservicio = $_GET['idservicio'];

?>

<?php
include("../php/conex.php");
$sql = "SELECT * FROM tblassignedservice INNER JOIN tblbarber on tblassignedservice.idbarbero = tblbarber.idbarber INNER JOIN tblservices on tblassignedservice.servicio = tblservices.ID WHERE idservicioasignado='$idservicio'";
$consulta = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($consulta);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Propinas - <?php echo $idservicio ?></title>
</head>

<body>
    <?php include("../views/assets/headersintasa.php"); ?>

    <main>



        <section>
            <div class="container-sm mt-3 " id="prueba1">
                <form action="operacion/asignarpropina.php" method="post">
                <input type="text" class="d-none" name="idservicioasignado" value="<?php echo $idservicio ?>">
                <input type="text" class="d-none" name="billing" value="<?php echo $row['invoice'] ?>">
                    <div class="row">
                        <div class="col text-light">
                            <h2>Barbero</h2>
                            <h2><?php echo $row['nombre'] ?></h2>
                        </div>
                        <div class="col text-light">
                            <h2>Servicio</h2>
                            <h2><?php echo $row['ServiceName'] ?></h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label for="" class="form-label text-white">Propinas</label>
                            <input type="text" class="form-control" value="" name="propina" placeholder="$...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">

                            <label for="" class="form-label text-white">Detalles</label>
                            <input type="text" name="detalle" value="" id="" class="form-control">
                        </div>
                    </div>





                    <div class="col-md-3 mt-3">
                        <input type="submit" value="Guardar" class="btn btn-primary" name="Guardar">
                    </div>

                </form>
            </div>
        </section>



    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">

    </script>
</body>