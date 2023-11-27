<?php
include("../../php/dbconn.php");
include("../../php/functions/tasa.php");
$fecha = date("d-m-Y");

$query  = "SELECT SUM(monto_total) FROM transacciones; "; //total de operaciones
$query2 = "SELECT SUM(monto_total) FROM transacciones WHERE estatus = 'totalizado'"; //total totalizado
$query3 = "SELECT SUM(monto_total) FROM transacciones WHERE estatus = 'abono'"; //total de facturas con abono
$query4 = "SELECT SUM(monto_total) FROM transacciones WHERE estatus = 'restante' "; //total de pendiente por pagar cliente
$Query5 = "SELECT SUM(monto) from vales;";
$Query6 = "SELECT SUM(propina), tblbarber.nombre FROM `tblassignedservice` inner join tblservices on tblassignedservice.servicio = tblservices.ID inner join tblbarber on tblbarber.idbarber = tblassignedservice.idbarbero ";

$querymetodos  = "SELECT DISTINCT metodos_pago.idmetodo, sum(monto),metodos_pago.nombre , unidad FROM `cuentas_cobrar` inner join metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo GROUP by (metodos_pago.idmetodo) ";
$queryproductos = "SELECT nombre, sum(tblassignedproducts.cantidad) as cantidad, sum(monto) FROM `tblassignedproducts` inner join tblproducts on tblassignedproducts.id_products = tblproducts.idproducts GROUP by nombre";
$queryServicios = "SELECT count(invoice), SUM(cantidad),sum(cost),sum(propina), tblbarber.nombre FROM `tblassignedservice` inner join tblservices on tblassignedservice.servicio = tblservices.ID inner join tblbarber on tblbarber.idbarber = tblassignedservice.idbarbero group by nombre";

$exequery  = $conn->prepare($query);
$exequery2 = $conn->prepare($query2);
$exequery3 = $conn->prepare($query3);
$exequery4 = $conn->prepare($query4);
$exequery5 = $conn->prepare($Query5);
$exequery6 = $conn->prepare($Query6);

$exequerymetodos  = $conn->prepare($querymetodos);
$exequeryproductos  = $conn->prepare($queryproductos);
$exequeryServicios  = $conn->prepare($queryServicios);


$exequery->execute();
$exequery2->execute();
$exequery3->execute();
$exequery4->execute();
$exequery5->execute();
$exequery6->execute();

$exequerymetodos->execute();
$exequeryproductos->execute();
$exequeryServicios->execute();


$row1 = $exequery->fetch();
$row2 = $exequery2->fetch();
$row3 = $exequery3->fetch();
$row4 = $exequery4->fetch();
$row5 = $exequery5->fetch();
$row6 = $exequery6->fetch();




$cnt = 1;
$cnt2 = 1;
$cnt3 = 1;

?>



<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="../../css/styles.min.css">
<title>Cierre - Parcial - <?php echo $idservicio ?></title>
</head>

<body>
    <?php include("../../views/assets/headersintasa.php"); ?>

    <main>



        <section>
            <div class="container-sm mt-3 " id="prueba1">
                <form action="operacion/asignarpropina.php" method="post">
                    <input type="text" class="d-none" name="idservicioasignado" value="<?php echo $idservicio ?>">
                    <input type="text" class="d-none" name="billing" value="<?php echo $row['invoice'] ?>">



                    <!-- Totales Generales -->
                    <div class="row">
                        <h3>TASA: <?php echo "$tasadia Fecha: $tasafecha "; ?></h3>

                        <div class="col text-light shadow mb-5 mt-3">
                            <div class="row  text-light shadow mb-5 ">

                                <h3>Totales Generales: </h3>
                                <table class="table p-3">
                                    <thead class=" text-light">
                                        <tr>
                                            <td>Total transacciones:</td>
                                            <td>Cuentas totalizadas:</td>
                                            <td>Cuentas x cobrar:</td>
                                            <td>Cuentas x pagar:</td>
                                            <td>Vales: </td>
                                            <td>Propinas: </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-light">
                                            <td> <?php echo $row1['SUM(monto_total)'] ?></td>
                                            <td> $<?php echo $row2['SUM(monto_total)'] ?></td>
                                            <td> $<?php echo $row3['SUM(monto_total)'] ?></td>
                                            <td> $<?php echo $row4['SUM(monto_total)'] ?></td>
                                            <td> $<?php echo $row5['SUM(monto)'] ?></td>
                                            <td> $<?php echo $row6['SUM(propina)'] ?></td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <!-- <div class="col text-light">
                            <h2>Servicio</h2>
                            <h2><?php echo $row['ServiceName'] ?></h2>
                        </div> -->
                    </div>
                    <!-- Instrumentos de poago -->
                    <div class="row  text-light shadow mb-5 ">
                        <h3>Metodos pagos:</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Monto</th>
                                    <th>Unidad</th>
                                </tr>
                            </thead>

                            <?php
                            while ($rowmetodos1 = $exequerymetodos->fetch()) {
                            ?>
                                <div class="text-light">
                                    <tr class="text-light">
                                        <td><?php echo $rowmetodos1['nombre']; ?></td>
                                        <td> <?php echo $rowmetodos1['unidad']; ?></td>
                                        <td>Monto: <?php echo $rowmetodos1['sum(monto)']; ?></td>

                                    </tr>
                                </div>


                            <?php

                                $cnt = $cnt + 1;
                            } ?>


                        </table>
                    </div>

                    <!-- Servicios -->
                    <div class="row  text-light shadow mb-5 ">
                        <h3>Servicios Realizados:</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad Servicios</th>
                                    <th>Cantidad</th>
                                    <th>Monto</th>
                                    <th>Propinas x Servicios</th>
                                </tr>
                            </thead>

                            <?php
                            while ($rowservicios = $exequeryServicios->fetch()) {
                            ?>
                                <div class="text-light">
                                    <tr class="text-light">
                                        <td><?php echo $rowservicios['nombre']; ?></td>
                                        <td> <?php echo $rowservicios['count(invoice)']; ?></td>
                                        <td> <?php echo $rowservicios['SUM(cantidad)']; ?></td>
                                        <td> $<?php echo $rowservicios['sum(cost)']; ?></td>
                                        <td> $<?php echo $rowservicios['sum(propina)']; ?></td>

                                    </tr>
                                </div>


                            <?php

                                $cnt2 = $cnt2 + 1;
                            } ?>


                        </table>
                    </div>

                    <!-- Productos Vendidos -->
                    <div class="row  text-light shadow mb-5 ">
                        <h3>productos vendidos:</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Monto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>

                            <?php
                            while ($rowproductos = $exequeryproductos->fetch()) {
                            ?>
                                <div class="text-light">
                                    <tr class="text-light">
                                        <td><?php echo $rowproductos['nombre']; ?></td>
                                        <td> <?php echo $rowproductos['cantidad']; ?></td>
                                        <td>Monto: <?php echo $rowproductos['sum(monto)']; ?></td>

                                    </tr>
                                </div>


                            <?php

                                $cnt3 = $cnt3 + 1;
                            } ?>


                        </table>
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