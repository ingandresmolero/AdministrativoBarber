<?php
include("../../php/dbconn.php");
include("../../php/conex.php");
include("../../php/functions/tasa.php");
$fecha = date("d-m-Y");


$query  = "SELECT IFNULL(SUM(monto_total),0) as total FROM transacciones WHERE fecha_creacion = '$fecha' "; //total de operaciones
$query2 = "SELECT IFNULL(SUM(monto_total),0) as total FROM transacciones WHERE estatus = 'totalizado' and fecha_creacion = '$fecha'"; //total totalizado
$query3 = "SELECT IFNULL(SUM(monto_total),0) as total FROM transacciones WHERE estatus = 'abono' and fecha_creacion = '$fecha'"; //total de facturas con abono
$query4 = "SELECT IFNULL(SUM(monto_total),0) as total FROM transacciones WHERE estatus = 'restante' and fecha_creacion = '$fecha' "; //total de pendiente por pagar cliente
$Query5 = "SELECT IFNULL(SUM(monto),0) as total from vales where fecha = '$fecha' ;";
$Query6 = "SELECT IFNULL(SUM(propina),0) as total FROM tblassignedservice inner join tblservices on tblassignedservice.servicio = tblservices.ID inner join tblbarber on tblbarber.idbarber = tblassignedservice.idbarbero inner join transacciones on transacciones.idtransac = tblassignedservice.invoice where transacciones.fecha_creacion = '$fecha'";

$querymetodos  = "SELECT DISTINCT metodos_pago.idmetodo, sum(monto),metodos_pago.nombre , unidad FROM `cuentas_cobrar` inner join metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo   where cuentas_cobrar.fecha_creacion = '$fecha' GROUP BY (metodos_pago.idmetodo);";
$queryproductos = "SELECT nombre, sum(tblassignedproducts.cantidad) as cantidad, sum(monto) FROM `tblassignedproducts` inner join tblproducts on tblassignedproducts.id_products = tblproducts.idproducts GROUP BY nombre";
$queryServicios = "SELECT count(invoice), SUM(cantidad),sum(cost),sum(propina), tblbarber.nombre,tblbarber.porcentaje FROM `tblassignedservice` inner join tblservices on tblassignedservice.servicio = tblservices.ID inner join tblbarber on tblbarber.idbarber = tblassignedservice.idbarbero group by nombre,porcentaje";

$queryClienteEventual = "SELECT IFNULL(SUM(transacciones.monto_total),0) as total FROM `tblcustomers` inner join tblinvoice on tblcustomers.ID = tblinvoice.Userid inner join transacciones on transacciones.invoice = tblinvoice.BillingId WHERE Gender = 'eventual';";
$queryClienteVIP = "SELECT IFNULL(SUM(transacciones.monto_total),0) as total FROM `tblcustomers` inner join tblinvoice on tblcustomers.ID = tblinvoice.Userid inner join transacciones on transacciones.invoice = tblinvoice.BillingId WHERE Gender = 'vip';";
$queryClienteCortesia = "SELECT IFNULL(SUM(transacciones.monto_total),0) as total FROM `tblcustomers` inner join tblinvoice on tblcustomers.ID = tblinvoice.Userid inner join transacciones on transacciones.invoice = tblinvoice.BillingId WHERE Gender = 'cortesia';";
$queryClienteInterno = "SELECT IFNULL(SUM(transacciones.monto_total),0) as total FROM `tblcustomers` inner join tblinvoice on tblcustomers.ID = tblinvoice.Userid inner join transacciones on transacciones.invoice = tblinvoice.BillingId WHERE Gender = 'interno';";


$exequery  = $conn->prepare($query);
$exequery2 = $conn->prepare($query2);
$exequery3 = $conn->prepare($query3);
$exequery4 = $conn->prepare($query4);
$exequery5 = $conn->prepare($Query5);

$exequery6 = mysqli_query($conexion, $Query6);
$row6 = mysqli_fetch_array($exequery6);

$exequerymetodos  = $conn->prepare($querymetodos);
$exequeryproductos  = $conn->prepare($queryproductos);
$exequeryServicios  = $conn->prepare($queryServicios);

$exequeryeventual  = $conn->prepare($queryClienteEventual);
$exequeryvip  = $conn->prepare($queryClienteVIP);
$exequerycortesia  = $conn->prepare($queryClienteCortesia);
$exequeryinterno  = $conn->prepare($queryClienteInterno);



$exequery->execute();
$exequery2->execute();
$exequery3->execute();
$exequery4->execute();
$exequery5->execute();

$exequerymetodos->execute();
$exequeryproductos->execute();
$exequeryServicios->execute();


$exequeryeventual->execute();
$exequeryvip->execute();
$exequerycortesia->execute();
$exequeryinterno->execute();

$row1 = $exequery->fetch();
$row2 = $exequery2->fetch();
$row3 = $exequery3->fetch();
$row4 = $exequery4->fetch();
$row5 = $exequery5->fetch();

$roweventual = $exequeryeventual->fetch();
$rowvip = $exequeryvip->fetch();
$rowcortesia = $exequerycortesia->fetch();
$rowinterno = $exequeryinterno->fetch();

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
<!-- Incluye FileSaver.js desde una CDN -->
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<title>Cierre - Parcial</title>
</head>

<body>

    <?php include("headerscierre.php"); ?>

    <main>

        <section>

            <div class="container-sm mt-3 justify-content-center" id="prueba1">
                <form action="" method="POST">
                    <!-- <input type="submit" id="exportButton" name="ExpExc" class="text-light p-2 button header__input--button font rounded-5 border border-light" value="Exportar Excel" style="background-color: #89b11d "> -->

                    <!-- Boton de exportar excel -->

                    <div class="row align-content-center p-5 text-light p-3">

                        <button type="button" id="exportButton" class="text-light p-2 button header__input--button font rounded-5 border border-light" style="background-color: #89b11d">Exportar Excel</button>

                    </div>

                    <input type="text" class="d-none" name="idservicioasignado" value="<?php echo $idservicio ?>">
                    <input type="text" class="d-none" name="billing" value="<?php echo $row['invoice'] ?>">

                    <h3 class="text-light mb-4"><?php echo " Fecha: $fecha "; ?></h3>

                    <!-- Totales Generales -->
                    <div class="row m-3 bg-white border-2 shadow mb-5 rounded-5">

                        <div class=" rounded-top-5 text-white p-1 text-center" style="background-color: #89b11d;">

                            <h3>Totales Generales: </h3>

                        </div>

                        <div class="pb-3">

                            <table id="table1" class="table fw-semibold text-dark table-borded border-dark">
                                <thead class="fw-bold">
                                    <tr>
                                        <td>Total transacciones:</td>
                                        <td>Cuentas de Contado:</td>
                                        <td>Cuentas x cobrar:</td>
                                        <td>Cuentas x pagar:</td>
                                        <td>Vales: </td>
                                        <td>Propinas: </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td> $<?php echo $row1['total'] ?></td>
                                        <td> $<?php echo $row2['total'] ?></td>
                                        <td> $<?php echo $row3['total'] ?></td>
                                        <td> $<?php echo $row4['total'] ?></td>
                                        <td> $<?php echo $row5['total'] ?></td>
                                        <td> $<?php echo $row6['total'] ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <!-- <div class="col text-light">
                            <h2>Servicio</h2>
                            <h2><?php echo $row['ServiceName'] ?></h2>
                        </div> -->
                    </div>

                    <!-- Metodos de poago -->
                    ` <div class="row m-3 bg-white border-2 shadow mb-5 rounded-5">

                        <div class=" rounded-top-5 text-white p-1 text-center" style="background-color: #89b11d;">

                            <h3>Metodos pagos:</h3>

                        </div>

                        <div class="pb-3">

                            <table id="table2" class="table fw-semibold text-dark table-borded border-dark">
                                <thead>
                                    <tr class="=fw-bold">
                                        <th>Nombre</th>
                                        <th>Unidad</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>

                                <?php
                                while ($rowmetodos1 = $exequerymetodos->fetch()) {
                                ?>
                                    <div class="">
                                        <tbody>
                                            <tr class="">
                                                <td><?php echo $rowmetodos1['nombre']; ?></td>
                                                <td class="text-uppercase"> <?php echo $rowmetodos1['unidad']; ?></td>
                                                <td><?php echo $rowmetodos1['sum(monto)']; ?></td>

                                            </tr>
                                        </tbody>
                                    </div>
                                <?php

                                    $cnt = $cnt + 1;
                                } ?>



                            </table>

                        </div>

                    </div>

                    <!-- TIPO DE CLIENTES -->
                    <div class="row m-3 bg-white border-2 shadow mb-5 rounded-5">

                        <div class=" rounded-top-5 text-white p-1 text-center" style="background-color: #89b11d;">

                            <h3>Tipo Clientes</h3>

                        </div>

                        <div class="pb-3">

                            <table id="table3" class="table fw-semibold text-dark table-borded border-dark">
                                <thead>
                                    <tr class="=fw-bold">
                                        <th>Eventual</th>
                                        <th>VIP</th>
                                        <th>Cortesia</th>
                                        <th>Interno</th>
                                    </tr>
                                </thead>


                                <div class="">
                                    <tbody>

                                        <tr class="">
                                            <td> $ <?php echo $roweventual['total']; ?></td>
                                            <td> $ <?php echo $rowvip['total']; ?></td>
                                            <!-- <td> <?php echo $rowservicios['SUM(cantidad)']; ?></td> -->
                                            <td> $ <?php echo $rowcortesia['total'] ?></td>
                                            <td> $ <?php echo $rowinterno['total']; ?></td>


                                        </tr>
                                    </tbody>
                                </div>


                            </table>
                        </div>
                    </div>

                    <!-- Servicios -->
                    <div class="row m-3 bg-white border-2 shadow mb-5 rounded-5">

                        <div class=" rounded-top-5 text-white p-1 text-center" style="background-color: #89b11d;">

                            <h3>Servicios Realizados:</h3>

                        </div>

                        <div class="pb-3">

                            <table id="table4" class="table fw-semibold text-dark table-borded border-dark">
                                <thead>
                                    <tr class="=fw-bold">
                                        <th>Nombre</th>
                                        <th>Cantidad Servicios</th>
                                        <!-- <th>Cantidad</th> -->
                                        <th>Monto</th>
                                        <th>Monto con %</th>
                                        <th>Total Propinas</th>
                                    </tr>
                                </thead>

                                <?php
                                while ($rowservicios = $exequeryServicios->fetch()) {
                                ?>
                                    <div class="">
                                        <tbody>

                                            <tr class="">
                                                <td><?php echo $rowservicios['nombre']; ?></td>
                                                <td> <?php echo $rowservicios['count(invoice)']; ?></td>
                                                <!-- <td> <?php echo $rowservicios['SUM(cantidad)']; ?></td> -->
                                                <td> $<?php echo $rowservicios['sum(cost)'] ?></td>
                                                <td> $<?php echo $rowservicios['sum(cost)'] * ($rowservicios['porcentaje'] / 100); ?></td>
                                                <td> $<?php echo $rowservicios['sum(propina)']; ?></td>

                                            </tr>
                                        </tbody>
                                    </div>

                                <?php

                                    $cnt2 = $cnt2 + 1;
                                } ?>

                            </table>
                        </div>
                    </div>

                    <!-- Productos Vendidos -->
                    <div class="row m-3 bg-white border-2 shadow mb-5 rounded-5">

                        <div class=" rounded-top-5 text-white p-1 text-center" style="background-color: #89b11d;">

                            <h3>Productos vendidos:</h3>

                        </div>

                        <div class="pb-3">

                            <table id="table5" class="table fw-semibold text-dark table-borded border-dark">
                                <thead>
                                    <tr class="=fw-bold">
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>

                                <?php
                                while ($rowproductos = $exequeryproductos->fetch()) {
                                ?>
                                    <div class="">
                                        <tbody>

                                            <tr class="">
                                                <td><?php echo $rowproductos['nombre']; ?></td>
                                                <td> <?php echo $rowproductos['cantidad']; ?></td>
                                                <td>$ <?php echo $rowproductos['sum(monto)']; ?></td>
                                            </tr>
                                        </tbody>
                                    </div>

                                <?php

                                    $cnt3 = $cnt3 + 1;
                                } ?>

                            </table>
                        </div>

                    </div>

                    <!-- <div class="justify content-center mt-3">

                        <input type="submit" value="Guardar" class="rounded-4 text-light p-2" style="background-color: #89b11d;border: #84aa1d;" name="Guardar">

                    </div> -->

                </form>
            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- <script>
        document.getElementById("exportButton").addEventListener("click", function() {
            console.log("Export Button Clicked");

            // Obtener el contenido de la tabla
            var table = document.querySelector('section');
            var wb = XLSX.utils.table_to_book(table);

            // Descargar el archivo Excel
            XLSX.writeFile(wb, 'Reporte_' + new Date().toISOString() + '.xlsx');
        });
    </script> -->


    <!-- <script>
    document.getElementById("exportButton").addEventListener("click", function() {
        console.log("Export Button Clicked");

        // Obtener todas las tablas por su id
        var tableIds = ['table1', 'table2', 'table3','table4','table5']; // Agrega los id de tus tablas aquí
        var workbooks = [];

        tableIds.forEach(function(tableId, index) {
            var table = document.getElementById(tableId);
            var wb = XLSX.utils.table_to_book(table);

            // Asignar un nombre único a cada hoja
            var sheetName = 'Sheet ' + (index + 1);
            XLSX.utils.book_append_sheet(wb, wb.Sheets[wb.SheetNames[0]], sheetName);

            workbooks.push(wb);
        });

        // Combinar libros de trabajo en uno solo
        var combinedWorkbook = XLSX.utils.book_new();
        workbooks.forEach(function(wb) {
            // Aquí también asignamos nombres únicos para las hojas combinadas
            var combinedSheetName = 'Hoja ' + (workbooks.indexOf(wb) + 1);
            XLSX.utils.book_append_sheet(combinedWorkbook, wb.Sheets[wb.SheetNames[0]], combinedSheetName);
        });

        console.log("Libros de trabajo combinados:", combinedWorkbook);

        // Descargar el archivo Excel combinado
        XLSX.writeFile(combinedWorkbook, 'Reporte_' + new Date().toISOString() + '.xls');
    }); -->
    </script>



    <script>
        document.getElementById("exportButton").addEventListener("click", function() {
            console.log("Export Button Clicked");

            // Obtener todas las tablas por su id
            var tableIds = ['table1', 'table2', 'table3', 'table4', 'table5']; // Agrega los id de tus tablas aquí
            var workbooks = [];

            tableIds.forEach(function(tableId, index) {
                var table = document.getElementById(tableId);
                var wb = XLSX.utils.table_to_book(table);

                // Asignar un nombre único a la hoja
                var sheetName = 'Hoja ' + (index + 1);
                XLSX.utils.book_append_sheet(wb, wb.Sheets[wb.SheetNames[1]], sheetName);
            });

            // Descargar el archivo Excel combinado
            var combinedWorkbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(combinedWorkbook, {}, 'Hoja Combinada'); // Hoja vacía como marcador de posición

            workbooks.forEach(function(wb) {
                XLSX.utils.book_append_sheet(combinedWorkbook, wb.Sheets[wb.SheetNames[0]], 'Hoja Combinada');
            });

            // Eliminar la hoja vacía
            XLSX.utils.book_remove_sheet(combinedWorkbook, 'Hoja Combinada');

            console.log("Libro de trabajo combinado:", combinedWorkbook);

            // Descargar el archivo Excel combinado
            XLSX.writeFile(combinedWorkbook, 'Reporte_' + new Date().toISOString() + '.xls');
        });
    </script>



</body>