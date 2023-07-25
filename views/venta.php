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
                    <a class="btn btn-danger" href="lista_facturas.php">Volver </a>
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

                            <input type="text" name="barbero" value="<?php echo $barbero = $row1['assignedbarber']; ?>" class="d-none">
                            <div class="col-md-3">
                                <label class="form-label" for="">Nombre </label>
                                <input class="form-control" type="text" name="" placeholder='<?php echo $row1['Name']; ?>' disabled>
                            </div>

                            <!-- <div class="col-md-3">
                                <label class="form-label" for="">Telefono</label>
                                <input class="form-control" type="text" name="" placeholder="Telefono..." id="">
                            </div> -->
                            <div class="col-md-3">
                                <label class="form-label" for="">Cedula</label>
                                <input class="form-control" type="text" name="barbero" placeholder="<?php echo $row1['cedula']; ?>" disabled id="">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label" for="">Barbero</label>
                                <input class="form-control" type="text" name="barbero" placeholder="<?php echo $barbero; ?>" disabled id="">
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
                                <th>Barbero</th>
                                <th>Costo</th>

                                <th>Propina</th>
                                <th>Accion</th>
                            </tr>

                            <?php
                            $ret = mysqli_query($conexion, "SELECT tblservices.ServiceName,tblbarber.nombre,tblservices.Cost,tblassignedservice.propina FROM tblassignedservice INNER JOIN tblservices ON tblassignedservice.servicio = tblservices.ID INNER JOIN tblbarber ON tblassignedservice.idbarbero = tblbarber.idbarber WHERE tblassignedservice.invoice ='$billing'");
                            $cnt = 1;
                            $gtotal1 = 0;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                                <input type="text" name="estado" value="<?php echo $row['ServiceName']; ?>" class="d-none">
                                <input type="text" name="customer" value="<?php echo $row['nombre']; ?>" class="d-none">
                                <input type="text" name="usuario" value="<?php echo $row['Cost']; ?>" class="d-none">
                                <tr>
                                    <th><?php echo $cnt; ?></th>
                                    <td><?php echo $row['ServiceName'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $subtotal = $row['Cost'] ?></td>

                                    <td><input type="text" name="propina" value="" placeholder="<?php echo $row['propina'] ?>" class="form-control"></td>
                                    <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarservicio"></td>
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
                                    <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar"></td>

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
                        $tasasql = "SELECT * FROM tasabs";
                        $tasaconx = mysqli_query($conexion, $tasasql);
                        $fila2 = mysqli_fetch_array($tasaconx);
                        $tasa = $fila2['monto_bcv'];

                        ?>
                        <input type="text" value="<?php echo $tasa; ?>" name="tasa" class="d-none">




                </section>
            </div>


            <div class="d-flex justify-content-evenly mt-5">
                <?php if ($rol == 'manager') { ?>
                    <div class="col-3">
                        <p>Monto: <?php echo floatval($monto); ?> $</p>
                        <h4>Monto: <?php echo $montobs = floatval($monto * $tasa); ?> Bs.S</h4>
                        <hr>
                        <h4>IVA: <?php echo $montoiva = (($monto * $tasa) * 0.16); ?> Bs.S</h4>
                        <h4>Monto Total: <?php echo floatval($montobs + $montoiva); ?> Bs.s</h4>
                        <?php $montototal = floatval($monto); ?>
                        <input type="text" name="montototal" value="<?php echo $montototal; ?>" class="d-none">

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-auto">
                            <input type="submit" class="btn btn-success" name="totalizar" value="Totalizar">
                        </div>
                        <div class="col-md-auto">
                            <input type="submit" class="btn btn-warning" value="Guardar">
                        </div>
                        </form>
                    </div>
                <?php } else   if ($rol == 'admin') { ?>

                    <div class="col-3">
                        <h1>Monto: <?php echo floatval($monto); ?> $</h1>
                        <h3>Monto: <?php echo $montobs = floatval($monto * $tasa); ?> Bs.S</h3>
                        <hr>
                        <h3>IVA: <?php echo $montoiva = (($monto * $tasa) * 0.16); ?> Bs.S</h3>
                        <h2>Monto Total: <?php echo floatval($montobs + $montoiva); ?> Bs.s</h2>
                        <?php $montototal = floatval($monto); ?>
                        <input type="text" name="montototal" value="<?php echo $montototal; ?>" class="d-none">

                    </div>

                    
                    <div class="col-3 mx-3">
                        <label for="" class="form-label">Metodo de Pago</label>
                        <!-- TABLA DE METODOS PAGO -->
                        <table class="table table-bordered" width="100%" border="1">

                            <tr>
                                <th colspan="3">Detalle de Productos</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Metodo Pago</th>
                                <th>Monto</th>
                                <th>Accion</th>
                                <!-- <th>Costo</th> -->
                            </tr>

                            <?php
                            $ret = mysqli_query($conexion, "SELECT cuentas_cobrar.idcuenta, cuentas_cobrar.invoice,cuentas_cobrar.monto,metodos_pago.nombre FROM cuentas_cobrar JOIN metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo where invoice='$billing'");
                            $cnt = 1;
                            $gtotal4 = 0;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                 <input type="text" value="<?php echo $row['idcuenta']; ?>" name="idcuenta" class="d-none">
                                <tr>
                               
                                    <th><?php echo $cnt; ?></th>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $montototal = $row['monto'] ?></td>
                                    <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarmetodo"></td>

                                </tr>
                            <?php
                           $subtotal4 = floatval($montototal);
                           $gtotal4 += $subtotal4;
                                $cnt = $cnt + 1;

                             } ?>

                            <hr>



                        </table>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalmetodo">
                            Agregar Pago
                        </button>
                    </div>
            </div>

            <h1>SALDO FINAL: <?php
              $totalpago = ( $monto - $gtotal4  ); 
                             if($totalpago<0){
                                echo ($totalpago)*(-1);
                                echo '$ Abono';
                             }else{
                                echo $totalpago;
                             }
            ?> </h1>
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
        <?php }; ?>
        </section>


    </main>


    <!-- Modal SERVICIO -->
    <div class="modal fade" id="modalservicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Servicios</h1>
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
                        <label class="form-label" for="">Barbero</label>
                        <select name="idbarber" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from tblbarber";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idbarber'] . ">" . $row['nombre'] . "</option>";
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

    <!-- Modal PRODUCTOS -->
    <div class="modal fade" id="producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
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

    <!-- FIN MODAL PRODUCTOS -->

    <!-- Modal METODO PAGO -->
    <div class="modal fade" id="modalmetodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Metodos Pagos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarpago.php" method="post">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">

                        <label class="form-label" for="">Metodo Pago</label>
                        <select name="idmetodo" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from metodos_pago";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idmetodo'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-label" for="">cantidad</label>
                                <input type="number" name="monto_pago" class="form-control" placeholder="$ / BS">
                            </div>
                        </div>



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
    <!--FIN METODOS PAGOS MODAL -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>