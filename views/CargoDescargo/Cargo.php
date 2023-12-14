<?php
include("../php/functions/validar.php");
include("../php/dbconn.php");
include("../php/conex.php");
$billing = $_GET['billing'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Venta</title>
    <link rel="stylesheet" href="../../css/styles.min.css">
</head>

<body>
    <?php include("../cierre/headerscierre.php");


    ?>

    <main>


        <section class="container-sm  card  p-3 shadow p-3 mb-3 bg-white rounded mt-5">
            <div class=" row ">
                <div class="col-md-3">
                    <a class="btn btn-danger" href="lista_facturas.php">Volver </a>
                </div>
            </div>
            <div class="row justify-content-start mt-3">
                <div class="col-md-3 justify-content-center">
                    <form action="" method="post">

                        <label for="" class="form-label">Numero de Cargo</label>
                        <input class="form-control col-sm-3" type="text" name="billing" id="tasa" placeholder='' disabled>



                        <label for="" class="form-label">Numero de Factura</label>
                        <input class="form-control col-sm-3" type="text" name="billing" id="tasa" placeholder=''>





                        <label for="" class="form-label">Fecha</label>
                        <input class="form-control" type="text" name="" value="<?php echo $row1['PostingDate'] ?>" id="">

                    </form>
                </div>
                <div class="">



                    <!-- Datos Personales -->
                    <section>

                        <form action="operaciones-producto.php" method="POST">


                            <!-- Agregar Productos -->
                            <div class="container-fluid">
                                <div class="row">


                                    <div class="col-sm-3">
                                        <label class="form-label" for="">Agregar Producto</label>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#producto">
                                            Nuevo Producto
                                        </button>
                                    </div>

                                    <table class="table table-bordered" width="100%" border="1">

                                        <tr>
                                            <th colspan="5">Detalle de Productos</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre de Articulo</th>
                                            <th>Cantidad</th>
                                            <th>Monto</th>
                                            <th>+/-</th>
                                            <th>Accion</th>
                                            <!-- <th>Costo</th> -->
                                        </tr>

                                        <?php
                                        $ret = mysqli_query($conexion, "SELECT tblassignedproducts.id_assigned, tblproducts.nombre,tblassignedproducts.cantidad, tblproducts.precio as precio,tblproducts.idproducts as idproducto FROM tblassignedproducts JOIN tblproducts on tblassignedproducts.id_products = tblproducts.idproducts where invoice='$billing'");
                                        $cnt = 1;
                                        $gtotal2 = 0;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <input type="text" value="<?php echo $row['id_assigned']; ?>" name="product" class="d-none">
                                            <input type="text" value="<?php echo $row['idproducto']; ?>" name="idproducto" class="d-none">
                                            <input type="text" value="<?php echo $row['cantidad']; ?>" name="cantidad" class="d-none">
                                            <tr>
                                                <th><?php echo $cnt; ?></th>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $cantidad = $row['cantidad'] ?></td>
                                                <td><?php echo $totalproducto = (intval($row['precio']) * intval($row['cantidad'])) ?></td>
                                                <td class="d-none"><?php echo $subtotal = (intval($row['precio'])) ?></td>
                                                <td class="d-flex justify-content-evenly">
                                                    <input type="submit" class="btn btn-success" value="+" name="sumar">
                                                    <input type="submit" class="btn btn-warning" value="-" name="restar"></a>
                                                </td>
                                                <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar"></td>

                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;

                                            $subtotal2 = floatval($subtotal) * floatval($cantidad);
                                            $gtotal2 += $subtotal2;
                                        }

                                        ?>





                                    </table>

                                </div>

                            </div>
                            <hr>

                            <div class=" card shadow p-3 mb-3 bg-white rounded">
                                <h2>Detalles Servicios</h2>
                                <table class="table table-bordered mb-3" width="100%" border="1">
                                    <tr>
                                        <th colspan="7">Detalle de Servicios</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de Servicio</th>
                                        <th>Barbero</th>
                                        <th>Costo</th>
                                        <th>Propina</th>
                                        <th>Agregar</th>
                                        <th>Precio Libre</th>
                                        <th>Accion</th>
                                    </tr>

                                    <?php
                                    $ret = mysqli_query($conexion, "SELECT * FROM tblassignedservice INNER JOIN tblservices ON tblassignedservice.servicio = tblservices.ID INNER JOIN tblbarber ON tblassignedservice.idbarbero = tblbarber.idbarber WHERE tblassignedservice.invoice = '$billing'");
                                    $cntservicio = 1;
                                    $gtotal1 = 0;
                                    while ($row2 = mysqli_fetch_array($ret)) {
                                    ?>
                                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">

                                        <input type="text" name="idservicio2" value="<?php echo $row2['idservicioasignado']; ?>" class="d-none">
                                        <tr>
                                            <th><?php echo $cntservicio; ?></th>
                                            <!-- <th><?php echo $row2['idservicioasignado']; ?></th> -->
                                            <td><?php echo $row2['ServiceName'] ?></td>
                                            <td><?php echo $row2['nombre'] ?></td>

                                            <?php if ($rol == 'admin') { ?>

                                                <td><input type="text" name="preciolibremonto" value="" placeholder="<?php echo $subtotal = intval($row2['monto']) ?>" class="form-control"> </td>
                                            <?php } else { ?>
                                                <td><?php echo $subtotal = intval($row2['Cost']) ?></td>
                                            <?php } ?>


                                            <td><input type="text" name="propina" value="" placeholder="<?php echo $propina = $row2['propina'] ?>" class="form-control" disabled></td>
                                            <td><a class="btn btn-success" href="propinas.php?idservicio=<?php echo $row2['idservicioasignado'] ?>">+</a></td>
                                            <td> <input type="submit" name="preciolibre" value="Libre" class="btn btn-success"></td>
                                            <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarservicio"></td>
                                        </tr>
                                    <?php
                                        $cntservicio = $cntservicio + 1;

                                        $gtotal1 +=  $subtotal + $propina;
                                    }
                                    $montoservicio = intval($gtotal1); ?>



                                </table>
                                <!-- AGREGAR PRODUCTO -->
                                <table class="table table-bordered" width="100%" border="1">

                                    <tr>
                                        <th colspan="5">Detalle de Productos</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de Articulo</th>
                                        <th>Cantidad</th>
                                        <th>Monto</th>
                                        <th>+/-</th>
                                        <th>Accion</th>
                                        <!-- <th>Costo</th> -->
                                    </tr>

                                    <?php
                                    $ret = mysqli_query($conexion, "SELECT tblassignedproducts.id_assigned, tblproducts.nombre,tblassignedproducts.cantidad, tblproducts.precio as precio,tblproducts.idproducts as idproducto FROM tblassignedproducts JOIN tblproducts on tblassignedproducts.id_products = tblproducts.idproducts where invoice='$billing'");
                                    $cnt = 1;
                                    $gtotal2 = 0;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <input type="text" value="<?php echo $row['id_assigned']; ?>" name="product" class="d-none">
                                        <input type="text" value="<?php echo $row['idproducto']; ?>" name="idproducto" class="d-none">
                                        <input type="text" value="<?php echo $row['cantidad']; ?>" name="cantidad" class="d-none">
                                        <tr>
                                            <th><?php echo $cnt; ?></th>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $cantidad = $row['cantidad'] ?></td>
                                            <td><?php echo $totalproducto = (intval($row['precio']) * intval($row['cantidad'])) ?></td>
                                            <td class="d-none"><?php echo $subtotal = (intval($row['precio'])) ?></td>
                                            <td class="d-flex justify-content-evenly">
                                                <input type="submit" class="btn btn-success" value="+" name="sumar">
                                                <input type="submit" class="btn btn-warning" value="-" name="restar"></a>
                                            </td>
                                            <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar"></td>

                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;

                                        $subtotal2 = floatval($subtotal) * floatval($cantidad);
                                        $gtotal2 += $subtotal2;
                                    }

                                    ?>





                                </table>
                                <!-- <input type="submit" name="procesar" value="Procesar "> -->
                            </div>

                            <div class="card shadow p-3 mb-3">
                                <h2>Servicios Adicionales</h2>
                                <div class="row">
                                    <div class="col">

                                        <!-- TABLA DE Servicios adicionales-->
                                        <table class="table " width="100%" border="1">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Servicios Adicionales</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Metodo Pago</th>
                                                    <th>Monto</th>
                                                    <th>Accion</th>
                                                    <!-- <th>Costo</th> -->
                                                </tr>
                                            </thead>
                                            <?php
                                            $ret = mysqli_query($conexion, "SELECT  * FROM servicios_adicional JOIN tbladmin ON tbladmin.ID = servicios_adicional.id_usuario INNER JOIN metodos_pago on metodos_pago.idmetodo = servicios_adicional.id_metodo where id_billing='$billing' ");
                                            $cnt = 1;
                                            $gtotal7 = 0;
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                                <input type="text" value="<?php echo $row['idservicioadicional']; ?>" name="idservicioadicional" class="d-none">
                                                <tbody>
                                                    <tr>

                                                        <th><?php echo $cnt; ?></th>
                                                        <td><?php echo $row['AdminName'] ?></td>
                                                        <td><?php echo $montototaladicional = $row['monto']  ?></td>
                                                        <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminaradicional"></td>

                                                    </tr>

                                                <?php
                                                $cnt = $cnt + 1;
                                                $subtotal7 = floatval($montototaladicional);
                                                $gtotal7 += $subtotal7;
                                            }
                                            $montoproducto = floatval($gtotal2);
                                            $monto = floatval($montoproducto + $montoservicio + $gtotal7);
                                                ?>

                                                <hr>



                                        </table>

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaladicional">
                                            Agregar Servicio Adicional BS
                                        </button>
                                    </div> <!-- Servicio Adicional-->
                                </div>
                            </div>



                            <?php
                            $tasasql = "SELECT * FROM tasabs";
                            $tasaconx = mysqli_query($conexion, $tasasql);
                            $fila2 = mysqli_fetch_array($tasaconx);
                            $tasa = $fila2['monto_bcv'];

                            ?>
                            <input type="text" value="<?php echo $tasa; ?>" name="tasa" class="d-none">




                    </section>
                </div>


                <div class="justify-content-evenly mt-5">
                    <?php if ($rol == 'manager') { ?>
                        <div class="col-3">
                            <h1>Monto: <?php echo floatval($monto); ?> $</h1>
                            <h4>Monto: <?php echo $montobs = floatval($monto * $tasa); ?> Bs.S</h4>
                            <hr>
                            <h4>IVA: <?php echo $montoiva = (($monto * $tasa) * 0.16); ?> Bs.S</h4>
                            <h4>Monto Total: <?php echo floatval($montobs + $montoiva); ?> Bs.s</h4>
                            <?php $montototal = floatval($monto); ?>
                            <input type="text" name="montototal" value="<?php echo $montototal; ?>" class="d-none">

                        </div>

                        <div class="row mt-3">
                            <!-- <div class="col-md-auto">
                            <input type="submit" class="btn btn-success" name="totalizar" value="Totalizar">
                        </div> -->
                            <!-- <div class="col-md-auto">
                            <input type="submit" class="btn btn-warning" value="Guardar">
                        </div> -->
                            </form>
                        </div>
                    <?php } else   if ($rol == 'admin') { ?>



                        <div class="shadow p-3 mb-3 bg-white rounded">
                            <h2>Metodos Pagos</h2>

                            <div class="row  ">
                                <div class="col">

                                    <!-- TABLA DE METODOS PAGO DOLARES -->
                                    <table class="table table-bordered" width="100%" border="1">

                                        <tr>
                                            <th colspan="3">pagos USD</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Metodo Pago</th>
                                            <th>Monto</th>
                                            <th>Accion</th>
                                            <!-- <th>Costo</th> -->
                                        </tr>

                                        <?php
                                        $ret = mysqli_query($conexion, "SELECT cuentas_cobrar.idcuenta, metodos_pago.unidad ,cuentas_cobrar.invoice,cuentas_cobrar.monto,metodos_pago.nombre FROM cuentas_cobrar JOIN metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo where invoice='$billing' AND unidad='usd'");
                                        $cnt = 1;
                                        $gtotal4 = 0;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <input type="text" value="<?php echo $row['idcuenta']; ?>" name="idcuenta" class="d-none">
                                            <tr>

                                                <th><?php echo $cnt; ?></th>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $montototal = floatval($row['monto']) ?></td>
                                                <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarmetodo"></td>

                                            </tr>
                                        <?php
                                            $subtotal4 = floatval($montototal);
                                            $gtotal4 += $subtotal4;
                                            $cnt = $cnt + 1;
                                        } ?>




                                    </table>

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalmetodo">
                                        Agregar Pago $
                                    </button>

                                </div> <!-- Pago USD -->
                                <div class="col ">

                                    <!-- TABLA DE METODOS PAGO BOLIVARES-->
                                    <table class="table table-bordered" width="100%" border="1">

                                        <tr>
                                            <th colspan="3">Pagos BS.S</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Metodo Pago</th>
                                            <th>Monto</th>
                                            <th>Accion</th>
                                            <!-- <th>Costo</th> -->
                                        </tr>

                                        <?php
                                        $ret = mysqli_query($conexion, "SELECT cuentas_cobrar.idcuenta, metodos_pago.unidad,cuentas_cobrar.invoice,cuentas_cobrar.monto,metodos_pago.nombre FROM cuentas_cobrar JOIN metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo where invoice='$billing' AND unidad='bs'");
                                        $cnt = 1;
                                        $gtotal5 = 0;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <input type="text" value="<?php echo $row['idcuenta']; ?>" name="idcuenta" class="d-none">
                                            <tr>

                                                <th><?php echo $cnt; ?></th>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $montototalmostrar = floatval($row['monto'])  ?></td>
                                                <td class="d-none"><?php echo $montototal = $row['monto'] / $tasa ?>
                                                <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarmetodo"></td>

                                            </tr>
                                        <?php
                                            $subtotal5 = floatval($montototal);
                                            $gtotal5 += $subtotal5;
                                            $cnt = $cnt + 1;
                                        } ?>





                                    </table>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalmetodobs">
                                        Agregar Pago BS
                                    </button>
                                </div> <!-- Pago BS -->



                            </div>



                            <div class="row">
                                <div class="col">

                                    <!-- TABLA DE PAGOS ANTICIPADOS -->
                                    <table class="table table-bordered" width="100%" border="1">

                                        <tr>
                                            <th colspan="3">pago Abono</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Monto</th>
                                            <th>Accion</th>
                                            <!-- <th>Costo</th> -->
                                        </tr>

                                        <!-- HACER UNA TABLA PARA REGISTRAR LOS FONDOS UTILIZADOS -->


                                        <?php
                                        $ret = mysqli_query($conexion, "SELECT * FROM consumo_fondo  where invoice='$billing' ");
                                        $cntabono = 1;
                                        $gtotalabono = 0;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <input type="text" value="<?php echo $row['id_consumo']; ?>" name="idconsumo" class="d-none">
                                            <tr>

                                                <th><?php echo $cntabono; ?></th>

                                                <td><?php echo $montototalabono = floatval($row['aplicado']) ?></td>
                                                <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarabono"></td>

                                            </tr>
                                        <?php
                                            $subtotalabono = floatval($montototalabono);
                                            $gtotalabono += $subtotalaono;
                                            $cntabono = $cntabono + 1;
                                        } ?>




                                    </table>
                                    <?php if ($saldototal == 0) {
                                        echo '';
                                    } else if ($saldototal != 0) {
                                        echo ' <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalabono">
    Agregar Pago $
</button>';
                                    }  ?>


                                </div> <!-- Pago ABONOS -->
                            </div>

                        </div>


                        <div class="row text-end card shadow ">
                            <div class="col mt-3">
                                <h1>Monto a Cancelar: <?php echo floatval($monto); ?> $</h1>
                                <h3>Monto: <?php echo $montobs = floatval($monto * $tasa); ?> Bs.S</h3>
                                <hr>
                                <h3>IVA: <?php echo $montoiva = (($monto * $tasa) * 0.16); ?> Bs.S</h3>
                                <h2>Monto Total: <?php echo floatval($montobs + $montoiva); ?> Bs.s</h2>
                                <?php $montototal = floatval($monto); ?>
                                <input type="text" name="montototal" value="<?php echo $montototal; ?>" class="d-none">

                            </div>








                            <h1 style="color:red">SALDO FINAL: <?php

                                                                $totalpago = round(($monto - ($gtotal4 + $gtotal5)) - $montototalabono, 2, PHP_ROUND_HALF_ODD);
                                                                if ($totalpago < 0) {
                                                                    echo ($totalpago) * (-1);

                                                                    echo '$ Abono';
                                                                } else {
                                                                    echo $totalpago;
                                                                }
                                                                ?>
                                <h1 style="color:red">SAlDO FINAL BS: <?php
                                                                        $totalpago = floatval(($monto - ($gtotal4 + $gtotal5)) * $tasa);
                                                                        if ($totalpago < 0) {
                                                                            echo ($totalpago) * (-1);
                                                                        } else {
                                                                            echo $totalpago;
                                                                        }

                                                                        ?>

                        </div>
                        </h1>

                </div>
                <!-- DATOS A ENVIAR -->

                <input type="text" class="d-none" name="invoice" value="<?php echo $billing ?>">
                <input type="text" class="d-none" name="saldofinal" value="<?php echo $totalpagofinal = ($monto - ($gtotal4 + $gtotal5)) * (-1) ?>">
                <input type="text" class="d-none" value="<?php echo $tasa ?>">
                <input type="text" class="d-none" value="<?php echo $monto ?>" name="monto_cancelado">
                <input type="text" class="d-none" name="estatus" value="<?php if ($totalpago == '0') {

                                                                            echo 'Totalizado';
                                                                        } else {
                                                                            if ($totalpago < 0) {
                                                                                echo 'Abono';
                                                                            } else {
                                                                                echo 'Restante';
                                                                            }
                                                                        } ?>">


                <!-- DATOS A ENVIAR -->
                </h1>
                <div class="row mt-3">
                    <div class="col-md-auto">
                        <input type="submit" class="btn btn-success" name="totalizar" value="Totalizar">
                    </div>
                    <!-- <div class="col-md-auto">
                    <input type="submit" class="btn btn-warning" value="Guardar">
                </div> -->
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
                    <button type="button" class="btn-warning" data-bs-dismiss="modal" aria-label="Cerrar"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL SERVICIO -->

    <!-- Modal PRODUCTOS -->
    <div class="modal fade" id="producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
                    <button type="button" class="btn-gray" data-bs-dismiss="modal" aria-label="Cerrar"></button>
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
                        <input class="form-control" type="text" name="cantidad" id="">



                        <input type="submit" class="btn btn-primary" name="asignar" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    <!-- FIN MODAL PRODUCTOS -->

    <!-- Modal METODO PAGO DOLARES -->
    <div class="modal fade" id="modalmetodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Metodos Pagos</h1>
                    <button type="button" class="btn-gray" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarpago.php" method="post">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">

                        <label class="form-label" for="">Metodo Pago</label>
                        <select name="idmetodo" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from metodos_pago where unidad='usd'";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idmetodo'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select>


                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-label" for="">cantidad</label>
                                <input type="text" name="monto_pago" class="form-control" placeholder="$ / BS">
                            </div>
                        </div>


                        <label class="form-label" for="">Detalle</label>
                        <input type="text" name="detalles" value="" class="form-control mb-3">


                        <!-- <label class="form-label" for="">Cantidad</label>
                        <input class="form-control" type="number" name="cantidad" id=""> -->



                        <input type="submit" class="btn btn-primary" name="asignarmetodousd" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <!--FIN METODOS PAGOS MODAL DOLARES -->

    <!-- Modal METODO PAGO BS -->
    <div class="modal fade" id="modalmetodobs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Metodos Pagos Bolivares</h1>
                    <button type="button" class="btn-gray" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarpago.php" method="post">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">

                        <label class="form-label" for="">Metodo Pago</label>
                        <select name="idmetodo" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from metodos_pago where unidad='bs'";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idmetodo'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-label" for="">cantidad</label>
                                <input type="text" name="monto_pagobs" class="form-control" placeholder="$ / BS">
                            </div>
                        </div>

                        <input type="text" name="tasa" value="<?php echo $tasa ?>" class="d-none">


                        <!-- <label class="form-label" for="">Cantidad</label>
                        <input class="form-control" type="number" name="cantidad" id=""> -->

                        <label class="form-label" for="">Detalle</label>
                        <input type="text" name="detallesbs" value="" class="form-control mb-3">


                        <input type="submit" class="btn btn-primary" name="asignarmetodobs" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <!--FIN METODOS PAGOS MODAL BS -->


    <!-- Modal SERVICIO ADICIONAL INICIO -->
    <div class="modal fade" id="modaladicional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Servicio Adicional</h1>
                    <button type="button" class="btn-gray" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignaradicional.php" method="post">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">

                        <label class="form-label" for="">Metodo Pago</label>
                        <select name="idusuario" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from tbladmin ";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['ID'] . ">" . $row['AdminName'] . "</option>";
                            };
                            ?>

                        </select>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-label" for="">Monto</label>
                                <input type="text" name="monto_pago" class="form-control" placeholder="$ / BS">
                            </div>
                        </div>

                        <label class="form-label" for="">Metodo Pago</label>
                        <select name="idmetodo" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from metodos_pago ";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idmetodo'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select>


                        <input type="text" name="tasa" value="<?php echo $tasa ?>" class="d-none">


                        <!-- <label class="form-label" for="">Cantidad</label>
                        <input class="form-control" type="number" name="cantidad" id=""> -->

                        <label class="form-label" for="">Detalle</label>
                        <input type="text" name="detalles" value="" class="form-control mb-3">


                        <input type="submit" class="btn btn-primary" name="asignaradicional" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <!--FIN SERVICIOS ADICIONAL -->

    <!-- Modal PAGO ABONO -->
    <div class="modal fade" id="modalabono" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Servicio Adicional</h1>
                    <button type="button" class="btn-gray" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarabono.php" method="post">
                        <label for=""> Saldo: <?php echo $saldototal ?></label>
                        <input type="text" name="saldo" value="<?php echo $saldototal ?>" class="d-none">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-label" for="">Monto</label>
                                <input type="number" max="<?php echo $saldototal ?>" name="montoabono" class="form-control" value="<?php echo $saldototal ?>" placeholder="<?php echo $saldototal ?>">
                            </div>
                        </div>


                        <input type="submit" class="btn btn-primary" name="asignarabono" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <!--FIN PAGO ABONO-->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>