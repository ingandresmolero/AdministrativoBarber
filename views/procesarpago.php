<?php
error_reporting(0);
include("../php/functions/validar.php");
include("../php/dbconn.php");
include("../php/conex.php");
$id = $_GET['userid'];
$fecha_desde = $_GET['fecha_desde'];
$fecha_hasta = $_GET['fecha_hasta'];
// $fecha_desde = date('d/m/Y', strtotime($fecha_desde));
// $fecha_hasta = date('d/m/Y', strtotime($fecha_hasta));

$sql = "SELECT * FROM tbladmin where ID='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetch();


$selectusuario = "SELECT * FROM tbladmin WHERE ID='$id'";
$sqlusuario = $conn->prepare($selectusuario);
$sqlusuario->execute();
$listadousuario = $sqlusuario->fetch();

$tasasql = "SELECT * FROM tasabs";
$tasaconx = mysqli_query($conexion, $tasasql);
$fila2 = mysqli_fetch_array($tasaconx);
$tasa = $fila2['monto_bcv'];


$rol = $listadousuario['Role'];
$nombre = $listadousuario['AdminName'];
$montototal = 0;



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

<body style="background-color:#8b7070">
    <?php include("./assets/headersintasa.php"); ?>

    <main>
        <!-- INICIO DE VALIDACIONES DE USUARIO SECCION PRINCIPAL -->
        <section>
            <?php
            //VALIDACION DE USUARIO SOLO SERVIDORES PAGO SIN SUELDO
            if ($rol == 'servidor') {
                include("operacionespagosservidores.php");
            ?>
                <div class="container-sm text-dark bg-light mt-2 p-3">
                    <form action="operacionespagos.php" method="post">
                        <input type="text" class="d-none" name="rol" value="<?php $rol ?>">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Servidor:</label>
                                <input type="text" name="userid" value="<?php echo $id ?>" id="" class="d-none">
                                <input type="tex" name="nombreid" value="<?php echo $nombre ?>" id="" class="form-control" disabled>
                            </div>
                            <div class="">
                                <table class="fw-semibold  table table-striped table-hover text-dark ">
                                    <thead class="fw-bold">
                                        <tr>
                                            <!-- <td scope="col">Cantidad Servicios</td> -->
                                            <td scope="col">Total Facturado</td>
                                            <td scope="col">Monto Total(%)</td>
                                            <td scope="col">Porcentaje</td>
                                            <td scope="col">Propinas</td>
                                            <td scope="col">Consumo</td>
                                            <td scope="col">Vales</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                        <tr>
                                            <!-- <td><?php echo  $cantidad ?></td> -->
                                            <td>$ <?php echo  $total_facturado = $monto + $monto_interno ?></td>
                                            <td>$ <?php echo  $total = ($monto + $monto_interno) * ($porcentaje / 100) ?></td>
                                            <td>% <?php echo  $porcentaje ?></td>
                                            <td>$ <?php echo  $propinas ?></td>
                                            <td>$ <?php echo  $saldo_consumo ?></td>
                                            <td>$ <?php echo  $monto_vale  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="row"> <!--Tabla Pago USD -->
                            <div class="col">

                                <!-- TABLA DE METODOS PAGO DOLARES -->
                                <table class="fw-semibold  table table-striped table-hover text-dark p-2 " style="background-color: #dfff89a1;" width="100%" border="1">

                                    <tr>
                                        <th colspan="5">pagos USD</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Metodo Pago</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                        <th>Accion</th>
                                        <!-- <th>Costo</th> -->
                                    </tr>

                                    <?php
                                    $fecha_desde3 = $_GET['fecha_desde'];
                                    $fecha_hasta3 = $_GET['fecha_hasta'];
                                    $ret = mysqli_query($conexion, "SELECT * FROM `historicos_pago` join metodos_pago on metodos_pago.idmetodo = historicos_pago.idmetodo where metodos_pago.unidad = 'usd' and historicos_pago.idservidor='$id' and (historicos_pago.fecha BETWEEN '$fecha_desde' AND '$fecha_hasta')");
                                    $cnt = 1;
                                    $gtotal4 = 0;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <input type="text" value="<?php echo $id; ?>" name="idservidor" class="d-none">
                                        <input type="text" value="<?php echo $row['idhistorico']; ?>" name="idhistorico" class="d-none">
                                        <input type="text" name="fecha_desde3" value="<?php echo $fecha_desde3; ?>" class="d-none">
                                        <input type="text" name="fecha_hasta3" value="<?php echo $fecha_hasta3; ?>" class="d-none">
                                        <tr>

                                            <th><?php echo $cnt; ?></th>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['fecha'] ?></td>
                                            <td><?php echo $montototal = floatval($row['monto']) ?></td>
                                            <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarhistorico"></td>

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


                            <!--Tabla Pago Bs -->
                            <div class="col ">

                                <!-- TABLA DE METODOS PAGO BOLIVARES-->
                                <table class="fw-semibold  table table-striped table-hover text-dark " style="background-color: #d7e7ff;" width="100%" border="1">

                                    <tr>
                                        <th colspan="5">Pagos BS.S</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Metodo Pago</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                        <th>Accion</th>
                                        <!-- <th>Costo</th> -->
                                    </tr>

                                    <?php
                                    $fecha_desde3 = $_GET['fecha_desde'];
                                    $fecha_hasta3 = $_GET['fecha_hasta'];
                                    $ret = mysqli_query($conexion, "SELECT * FROM `historicos_pago` join metodos_pago on metodos_pago.idmetodo = historicos_pago.idmetodo where metodos_pago.unidad = 'bs' and historicos_pago.idservidor='$id' and (historicos_pago.fecha BETWEEN '$fecha_desde' AND '$fecha_hasta')");

                                    $gtotal5 = 0;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <input type="text" value="<?php echo $id; ?>" name="idservidor" class="d-none">
                                        <input type="text" value="<?php echo $row['idhistorico']; ?>" name="idhistorico" class="d-none">
                                        <input type="text" name="fecha_desde3" value="<?php echo $fecha_desde3; ?>" class="d-none">
                                        <input type="text" name="fecha_hasta3" value="<?php echo $fecha_hasta3; ?>" class="d-none">
                                        <tr class="text-dark">

                                            <th><?php echo $cnt; ?></th>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['fecha'] ?></td>
                                            <td><?php echo $montototalmostrar = floatval($row['monto'])  ?></td>

                                            <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarhistorico"></td>

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
                            <div class="pagos">
                                <div class="row">

                                    <div class="col">

                                        <ul>
                                            <!-- <li>Total de Servicios: <?php echo $total ?></li> -->
                                            <li>Total de Consumo: <?php echo $saldo_consumo ?></li>
                                            <li>Total de Vales: <?php echo $monto_vale ?></li>
                                            <!-- <li>Total de Propinas: <?php echo $propinas ?></li> -->
                                        </ul>
                                    </div>

                                    <div class="col align-end">

                                        <h1>Monto Total: <?php echo $montopago = ($total + $propinas) ?></h1>
                                        <h2 class="text-danger">Saldo Restante: <?php echo $saldorestante = ($saldo_consumo + $monto_vale) ?></h2>
                                        <input type="text" class="d-none" value="<?php echo $saldorestante ?>" name="saldo_pendiente">
                                        <h1>Monto Pagado: <?php echo $montopago = floatval($gtotal4 + $gtotal5) ?></h1>
                                        <input type="text" class="d-none" value="<?php echo $montopago ?>" name="totalcancelado">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <input type="submit" class="btn btn-success mb-3" value="Realizar Pago" name="totalizar">
                    </form>
                </div>

                <?php }
            //VALIDACION DE USUARIO SOLO SERVIDORES PAGO CON SUELDO
            else {
                if ($rol == 'admin' || $rol == 'manager') {
                    include("operacionespagosservidores.php");
                ?>
                    <div class="container-sm text-dark  mt-2 p-3 bg-light">
                        <form action="operacionespagos.php" method="post">
                            <input type="text" class="d-none" name="rol" value="<?php $rol ?>">
                            <input type="text" name="userid" value="<?php echo $id ?>" id="" class="d-none">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="" class="form-label">Servidor:</label>
                                    <!-- <input type="text" name="userid" value="<?php echo $id ?>" id="" class="d-none"> -->
                                    <input type="tex" name="nombreid" value="<?php echo $nombre ?>" id="" class="form-control" disabled>
                                </div>

                                <!-- <table class="table fw-semibold  table-borded border-dark text-dark">
                                        <thead class="fw-bold">
                                            <tr>
                                                 <td scope="col">Cantidad Servicios</td> 
                                                <td scope="col">Monto Total</td>
                                                <td scope="col">Propinas</td>
                                                <td scope="col">Consumo</td>
                                                <td scope="col">Vales</td>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            <tr>
                                                 <td><?php echo  $cantidad ?></td> 
                                                <td>$ <?php echo  $total = ($monto + $monto_interno) * ($porcentaje / 100) ?></td>
                                                <td>$ <?php echo  $propinas ?></td>
                                                <td>$ <?php echo  $saldo_consumo ?></td>
                                                <td>$ <?php echo  $monto_vale  ?></td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                            </div>

                        <?php  }; ?>

                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="">SUELDO:</label>
                                <input type="text" name="sueldo" id="sueldo" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="row"> <!--Tabla Pago USD -->
                                <div class="col">

                                    <!-- TABLA DE METODOS PAGO DOLARES -->
                                    <table class="fw-semibold  table table-striped table-hover text-dark p-2 " style="background-color: #dfff89a1;" width="100%" border="1">

                                        <tr>
                                            <th colspan="4">pagos USD</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Metodo Pago</th>
                                            <th>Monto</th>
                                            <th>Accion</th>
                                            <!-- <th>Costo</th> -->
                                        </tr>



                                        <?php
                                        $fecha_desde3 = $_GET['fecha_desde'];
                                        $fecha_hasta3 = $_GET['fecha_hasta'];
                                        $ret = mysqli_query($conexion, "SELECT * FROM `historicos_pago` join metodos_pago on metodos_pago.idmetodo = historicos_pago.idmetodo where metodos_pago.unidad = 'usd' and historicos_pago.idservidor='$id' and (historicos_pago.fecha BETWEEN '$fecha_desde' AND '$fecha_hasta')");
                                        $cnt = 1;
                                        $gtotal4 = 0;

                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <input type="text" value="<?php echo $id; ?>" name="idservidor" class="d-none">
                                            <input type="text" value="<?php echo $row['idhistorico']; ?>" name="idhistorico" class="d-none">
                                            <input type="text" name="fecha_desde3" value="<?php echo $fecha_desde3; ?>" class="d-none">
                                            <input type="text" name="fecha_hasta3" value="<?php echo $fecha_hasta3; ?>" class="d-none">

                                            <tr>

                                                <th><?php echo $cnt; ?></th>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $montototal = floatval($row['monto']) ?></td>
                                                <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarhistorico"></td>

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


                                <!--Tabla Pago Bs -->
                                <div class="col ">

                                    <!-- TABLA DE METODOS PAGO BOLIVARES-->
                                    <table class="fw-semibold  table table-striped table-hover text-dark " style="background-color: #d7e7ff;" width="100%" border="1">

                                        <tr>
                                            <th colspan="4">Pagos BS.S</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Metodo Pago</th>
                                            <th>Monto</th>
                                            <th>Accion</th>
                                            <!-- <th>Costo</th> -->
                                        </tr>

                                        <?php

                                        $ret = mysqli_query($conexion, "SELECT * FROM `historicos_pago` join metodos_pago on metodos_pago.idmetodo = historicos_pago.idmetodo where metodos_pago.unidad = 'bs' and historicos_pago.idservidor='$id' and (historicos_pago.fecha BETWEEN '$fecha_desde' AND '$fecha_hasta')");
                                        $cnt2 = 1;
                                        $gtotal5 = 0;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <input type="text" value="<?php echo $id; ?>" name="idservidor" class="d-none">
                                            <input type="text" value="<?php echo $row['idhistorico']; ?>" name="idhistorico" class="d-none">

                                            <tr class="text-dark">

                                                <th><?php echo $cnt; ?></th>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $montototalmostrar = floatval($row['monto'])  ?></td>

                                                <td><input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarhistorico"></td>

                                            </tr>
                                        <?php
                                            $subtotal5 = floatval($montototal);
                                            $gtotal5 += $subtotal5;
                                            $cnt2 = $cnt2 + 1;
                                        } ?>






                                    </table>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalmetodobs">
                                        Agregar Pago BS
                                    </button>
                                </div> <!-- Pago BS -->
                            </div>
                        </div>
                        <div class="pagos">
                            <div class="row">

                                <div class="col">

                                    <ul>
                                        <!-- <li>Total de Servicios: <?php echo $total ?></li> -->
                                        <li>Total de Consumo: <?php echo $saldo_consumo ?></li>
                                        <li>Total de Vales: <?php echo $monto_vale ?></li>
                                        <!-- <li>Total de Propinas: <?php echo $propinas ?></li> -->
                                    </ul>
                                </div>

                                <div class="col align-end">

                                    <h1>Monto Total: <?php echo $montopago = ($total + $propinas) ?></h1>
                                    <h2 class="text-danger">Saldo Restante: <?php echo $saldorestante = ($saldo_consumo + $monto_vale) ?></h2>
                                    <input type="text" class="d-none" value="<?php echo $saldorestante ?>" name="saldo_pendiente">
                                    <h1>Monto Pagado: <?php echo $montopago = ($gtotal4 + $gtotal5) ?></h1>
                                    <input type="text" class="d-none" value="<?php echo $montopago ?>" name="totalcancelado">
                                </div>
                            </div>

                            <?php
                            $fecha_pago1 = $_GET['fecha_desde'];
                            $fecha_pago2 = $_GET['fecha_hasta'];
                            ?>
                            <input type="text" name="fecha_pago1" value="<?php echo $fecha_pago1; ?>" class="d-none">
                            <input type="text" name="fecha_pago2" value="<?php echo $fecha_pago2; ?>" class="d-none">

                        </div>
                    </div>
                    <input type="submit" class="btn btn-success mb-3" value="Realizar Pago" name="totalizar">


                    </form>
                    </div>
                <?php } ?>
                <!-- CIERRE DE VALIDACIONES POR USUARIO -->
        </section>
        <!-- FINAL DE SECCION PRINCIPAL -->

        <!-- REGISTRAR PAGO -->
        <section>

        </section>

    </main>



    <!-- MODALES -->
    <!-- Modal METODO PAGO DOLARES -->
    <div class="modal fade" id="modalmetodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Metodos Pagos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarpagoservidores.php" method="post">
                        <input type="text" class="d-none" name="fecha_desde" value="<?php echo $fecha_desde ?>">
                        <input type="text" class="d-none" name="fecha_hasta" value="<?php echo $fecha_hasta ?>">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                        <input type="text" value="<?php echo $id ?>" name="idservidor" class="d-none">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/asignarpagoservidores.php" method="post">
                        <input type="text" class="d-none" name="fecha_desde" value="<?php echo $fecha_desde ?>">
                        <input type="text" class="d-none" name="fecha_hasta" value="<?php echo $fecha_hasta ?>">
                        <input type="text" name="invoice" value="<?php echo $billing; ?>" class="d-none">
                        <input type="text" value="<?php echo $id ?>" name="idservidor" class="d-none">
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
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>