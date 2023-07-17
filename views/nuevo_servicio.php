<?php
include("../php/functions/validar.php");
include("../php/dbconn.php");
include("../php/conex.php");

$fecha = date("d/m/Y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Venta</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>

<body>
    <?php include("assets/headersintasa.php");


    ?>

    <main>


        <section class="container-sm  card  p-3 shadow p-3 mb-5 bg-white rounded mt-5">
            <div class=" row ">
                <div class="col-md-3">
                    <a class="btn btn-danger" href="lista_facturas.php">Volver </a>
                </div>
                <div class="col-md-6 justify-content-center">
                    <form action="" method="post">


                </div>
               



                    <!-- Datos Personales -->
                    <section>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="" class="form-label">Nombre Cliente</label>
                                <input class="form-control col-sm-3" type="text" name="billing" id="tasa" placeholder=''>
                                <!-- <input type="submit" class="btn btn-success mb-3" value="Buscar" name="Buscar"> -->
                            </div>

                     
                        <div class="col-md-3">
                            <label for="" class="form-label">Fecha</label>
                            <input class="form-control" type="text" name="" value="<?php echo $fecha ?>" id="">
                        </div>
                </div>
                <div class="row">

                    <input type="text" name="barbero" value="<?php echo $barbero = $row1['assignedbarber']; ?>" class="d-none">
                    <div class="col-md-3">
                        <label class="form-label" for="">Tipo Cliente </label>
                        <select name="tipo_cliente" class="form-control" id="">
                            <option value="eventual">Eventual</option>
                            <option value="cortesia">Cortesia</option>
                            <option value="interno">Interno</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="">Barbero</label>
                        <select name="barbero" class="form-control" id="barbero">


                            <?php
                            $consulta = "Select * from tblbarber";
                            $list_barber = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idbarber'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="">Servicio</label>
                        <select name="idservice" class="form-control" id="service">


                            <?php
                            $consulta = "Select * from tblservices";
                            $list_product = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_array($list_product)) {
                                echo "	<option value=" . $row['ID'] . ">" . $row['ServiceName'] . "</option>";
                            };
                            ?>

                        </select>
                    </div>
                </div>
            

                


        <div class="row mt-3">
            <div class="col-md-auto">
                <input type="submit" class="btn btn-success" name="totalizar" value="Totalizar">
            </div>
            <div class="col-md-auto">
                <input type="submit" class="btn btn-warning" value="Guardar">
            </div>
            <!-- <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Recuperar">
                </div> -->
            </form>
        </div>

        </section>


    </main>
  


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>