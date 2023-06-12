<?php
include("../php/functions/validar.php");
include("../php/dbconn.php");
include("../php/conex.php");
$billing = $_GET['billing'];

$sql = "SELECT * FROM tblinvoice INNER JOIN tblcustomers on tblinvoice.Userid = tblcustomers.ID WHERE tblinvoice.BillingId='$billing'";
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
    <title>Venta</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>

<body>
    <?php include("assets/headersintasa.php");


    ?>

    <main>
        <?php
        $datosinvoice = "SELECT * FROM tblinvoice Join tblcustomers ON tblinvoice.UserId = tblcustomers.ID WHERE BillingId='$billing'";
        $stmt1 = $conn->prepare($datosinvoice);
        $stmt1->execute();
        $row1 = $stmt1->fetch();

        ?>

        <section class="container-sm  card  p-3 shadow p-3 mb-5 bg-white rounded mt-5">
            <div class=" row ">
                <div class="col-md-3">
                    <input type="button" class="btn btn-danger" value="Volver">
                </div>
                <div class="col-md-6 justify-content-center">
                    <form action="" method="post">

                        <label for="" class="form-label">Numero de Documento</label>
                        <input class="form-control col-sm-3" type="text" name="billing" id="tasa" placeholder='<?php echo $billing; ?>' disabled>
                        <!-- <input type="submit" class="btn btn-success mb-3" value="Buscar" name="Buscar"> -->

                    </form>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Fecha</label>
                    <input class="form-control" type="text" name="" value="<?php echo $row1['PostingDate'] ?>" id="">
                </div>
            </div>
            <div class="">



                <!-- Datos Personales -->
                <section>

                    <form action="operaciones-producto.php" method="POST">
                        <div class="row">


                            <div class="col-md-3">
                                <label class="form-label" for="">Nombre </label>
                                <input class="form-control" type="text" name="" placeholder='<?php echo $row1['Name']; ?>' disabled>
                            </div>

                            <!-- <div class="col-md-3">
                                <label class="form-label" for="">Telefono</label>
                                <input class="form-control" type="text" name="" placeholder="Telefono..." id="">
                            </div> -->


                            <div class="col-md-3">
                                <label class="form-label" for="">Barbero</label>
                                <input class="form-control" type="text" name="" placeholder="<?php echo $row1['assignedbarber']; ?>" disabled id="">
                            </div>
                        </div>
                        <!-- Cuentas X Cobrar -->
                        <hr>

                        <!-- Agregar Productos -->
                        <div class="container-fluid">
                            <div class="row">


                                <div class="col-sm-3">
                                    <label class="form-label" for="">Agregar Producto</label>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#producto">
                                        Nuevo Producto
                                    </button>
                                </div>

                                <div class="col-sm-3">
                                    <label class="form-label" for="">Agregar Servicio</label>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalservicio">
                                        Nuevo Servicio
                                    </button>
                                </div>

                            </div>

                        </div>
                        <hr>


                        <h2>Detalles</h2>
                        <h2>Servicios</h2>
                        <table class="table table-bordered mb-3" width="100%" border="1">
                            <tr>
                                <th colspan="3">Detalle de Servicios</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Nombre de Servicio</th>
                                <th>Costo</th>
                                <th>Accion</th>
                            </tr>

                            <?php
                            $ret = mysqli_query($conexion, "select tblservices.ServiceName,tblservices.Cost,tblinvoice.ServiceId  from  tblinvoice join tblservices on tblservices.ID=tblinvoice.ServiceId where tblinvoice.BillingId='$billing'");
                            $cnt = 1;
                            $gtotal1 = 0;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                                <input type="text" name="serviceid" value="<?php echo $row['ServiceId']; ?>" class="d-none">
                                <tr>
                                    <th><?php echo $cnt; ?></th>
                                    <td><?php echo $row['ServiceName'] ?></td>
                                    <td><?php echo $subtotal = $row['Cost'] ?></td>
                                    <td><input type="submit" value="Eliminar" name="eliminarservicio"></td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;

                                $gtotal1 +=  $subtotal;
                            }
                            $montoservicio = intval($gtotal1); ?>



                        </table>
                        <!-- AGREGAR PRODUCTO -->
                        <table class="table table-bordered" width="100%" border="1">

                            <tr>
                                <th colspan="3">Detalle de Productos</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Nombre de Articulo</th>
                                <th>Cantidad</th>
                                <th>Monto</th>
                                <th>Accion</th>
                                <!-- <th>Costo</th> -->
                            </tr>

                            <?php
                            $ret = mysqli_query($conexion, "SELECT tblassignedproducts.id_assigned, tblproducts.nombre,tblassignedproducts.cantidad, tblproducts.precio as precio FROM tblassignedproducts JOIN tblproducts on tblassignedproducts.id_products = tblproducts.idproducts where invoice='$billing'");
                            $cnt = 1;
                            $gtotal2 = 0;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <input type="text" value="<?php echo $row['id_assigned']; ?>" name="product" class="d-none">
                                <tr>
                                    <th><?php echo $cnt; ?></th>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $cantidad = $row['cantidad'] ?></td>
                                    <td><?php echo $subtotal = $row['precio'] ?></td>
                                    <td><input type="submit" value="Eliminar" name="eliminar"></td>

                                </tr>
                            <?php
                                $cnt = $cnt + 1;

                                $subtotal2 = floatval($subtotal) * floatval($cantidad);
                                $gtotal2 += $subtotal2;
                            }
                            $montoproducto = floatval($gtotal2);
                            $monto = floatval($montoproducto + $montoservicio);
                            ?>

                            <hr>



                        </table>
                        <!-- <input type="submit" name="procesar" value="Procesar "> -->



<?php
    $tasa="SELECT monto_bcv FROM tasabs";
    $stmt3=$conn->prepare($tasa);
    $fila1=$stmt3->fetch();
    $tasa=floatval($fila1['monto_bcv']);

?>





                </section>
            </div>
            <div class="d-flex justify-content-start mt-5">
                <div class="col-3">
                    <h3>Monto: <?php echo floatval($monto); ?> $</h3>
                    <h3>IVA: <?php echo $montoiva = (($monto * $tasa) *0.16);?></h3>
                    <h3>Monto Total: 0$ 0Bs.s</h3>
                </div>
            </div>
            </form>
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
    <!-- Modal -->
    <div class="modal fade" id="modalservicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="operacion/asignarservicio.php" method="post">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                        <label for="" class="form-label">Servicio</label>
                        <select name="idservice" class="form-control" id="service">


                            <?php
                            $consulta = "Select * from tblservices";
                            $list_product = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_array($list_product)) {
                                echo "	<option value=" . $row['ID'] . ">" . $row['ServiceName'] . "</option>";
                            };
                            ?>

                        </select>

                        
                        <!-- <label class="form-label" for="">Cantidad</label>
                        <input class="form-control" type="number" name="cantidad" id=""> -->
                        
                        

                        <input type="submit" class="btn btn-primary" name="asignarservicio" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarproducto.php" method="post">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                        <label for="" class="form-label">Producto</label>
                        <select name="product" class="form-control" id="product">


                            <?php
                            $consulta = "Select * from tblproducts";
                            $list_product = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_array($list_product)) {
                                echo "	<option value=" . $row['idproducts'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select>

                        
                        <label class="form-label" for="">Cantidad</label>
                        <input class="form-control" type="number" name="cantidad" id="">
                        
                        

                        <input type="submit" class="btn btn-primary" name="asignar" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>