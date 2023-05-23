<?php
include("../php/functions/validar.php");
include("../php/dbconn.php");
$id = $_GET['userid'];

$sql = "SELECT * FROM tblinvoice INNER JOIN tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.id='$id'";
$fecha = date("d/m/y");
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
    <title>Tasa</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>

<body>
    <?php include("assets/headersintasa.php");


    ?>

    <main>

        <section class="container-sm  card  p-3 shadow p-3 mb-5 bg-white rounded mt-5">
            <div class=" row ">
                <div class="col-md-3">
                    <input type="button" class="btn btn-danger" value="Volver">
                </div>
                <div class="col-md-6 justify-content-center">
                    <form action="" method="post">

                        <label for="" class="form-label">Numero de Atencion</label>
                        <input class="form-control col-sm-3" type="text" name="busqueda" id="tasa" placeholder='<?php echo $resultado['BillingId']; ?>' disabled>
                        <!-- <input type="submit" class="btn btn-success mb-3" value="Buscar" name="Buscar"> -->

                    </form>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Fecha</label>
                    <input class="form-control" type="text" name="" value="<?php echo $fecha; ?>" id="">
                </div>
            </div>
            <div class="">



                <!-- Datos Personales -->
                <section>

                    <form action="">
                        <div class="row">


                            <div class="col-md-3">
                                <label class="form-label" for="">Nombre </label>
                                <input class="form-control" type="text" name="" placeholder='<?php echo $resultado['Name']; ?>' disabled>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label" for="">Telefono</label>
                                <input class="form-control" type="text" name="" placeholder="Telefono..." id="">
                            </div>


                            <div class="col-md-3">
                                <label class="form-label" for="">Barbero</label>
                                <input class="form-control" type="text" name="" placeholder="<?php echo $resultado['assignedbarber']; ?>" disabled id="">
                            </div>
                        </div>
                        <!-- Cuentas X Cobrar -->
                        <hr>

                        <!-- Agregar Productos -->
                        <div class="container-fluid">
                            <div class="row">


                                <div class="col-sm-3">
                                    <label class="form-label" for="">Agregar Producto</label>
                                    <div class="d-flex">
                                        <input type="button" class="btn btn-primary" value="Consultar">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label class="form-label" for="">Agregar Servicio</label>
                                    <div class="d-flex">
                                        <input type="button" class="btn btn-primary" value="Consultar">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <hr>


                        <h2>Detalles</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Cant</th>


                                    <th scope="col">Total</th>
                                    <th scope="col">Cuadre</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql3="select tblservices.ServiceName,tblservices.Cost FROM  tblinvoice 
                                join tblservices on tblservices.ID=tblinvoice.ServiceId 
                                where tblinvoice.BillingId='$id'";
                                $ret = $conn->prepare($sql3);
                                $ret->execute();
                                $cnt = 1;
                                while ($row = $ret->fetch()) {
                                ?>

                                    <tr>
                                        <th><?php echo $cnt; ?></th>
                                        <td><?php echo $row['ServiceName'] ?></td>
                                        <td><?php echo $subtotal = $row['Cost'] ?></td>
                                    </tr>
                                <?php
                                    $cnt = $cnt + 1;
                                    $gtotal += $subtotal;
                                } ?>
                            </tbody>
                        </table>

                    </form>
                </section>
            </div>
            <div class="d-flex justify-content-start mt-5">
                <div class="col-3">
                    <h3>Monto: 0</h3>
                    <h3>IVA: 0</h3>
                    <h3>Monto Total: 0$ 0Bs.s</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto">
                    <a href="./lista_facturas.php" class="btn btn-success">TOTALIZAR</a>
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-warning" value="Guardar">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Recuperar">
                </div>

            </div>

        </section>


    </main>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>